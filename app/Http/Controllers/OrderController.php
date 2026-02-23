<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use App\Services\BiteshipService;

class OrderController extends Controller
{
    use \App\Traits\HandlesPaymentSuccess;

    public function checkout()
    {
        $cart = Session::get('cart', []);

        if (empty($cart)) {
            return redirect()->back()->with('error', 'Cart is empty');
        }

        $productIds = array_keys($cart);
        // Eager load vendor
        $products = Product::with('vendor')->whereIn('id', $productIds)->get();

        // Group products by Vendor
        // If product has no vendor (legacy), group under 'LocalGo' (null)
        $grouped = $products->groupBy(function ($item) {
            return $item->vendor_id ?? 'default';
        });

        $orderGroups = [];
        $grandTotal = 0;

        foreach ($grouped as $vendorId => $vendorProducts) {
            if ($vendorId === 'default') {
                $vendorName = 'LocalGo (Official)';
                $realVendorId = null;
                $vendor = null;
            } else {
                $vendor = $vendorProducts->first()->vendor;
                $vendorName = $vendor->shop_name ?? 'Unknown Vendor';
                $realVendorId = $vendorId;
            }

            $subtotal = 0;
            foreach ($vendorProducts as $product) {
                // Ensure quantity exists
                if (isset($cart[$product->id])) {
                    $qty = $cart[$product->id]['quantity'];
                    $subtotal += $product->price * $qty;
                    $product->cart_qty = $qty; // Attach temp property
                }
            }

            // Calculation Service Fee (Example: 2000 flat)
            $serviceFee = 2000;

            // Calculate Shipping with Biteship
            $rates = [];
            $shippingCost = 10000; // Default fallback

            $addressId = request('address_id');
            if ($addressId) {
                $userAddress = auth()->user()->addresses->find($addressId);
            } else {
                $userAddress = auth()->user()->addresses->where('is_primary', true)->first() ?? auth()->user()->addresses->first();
            }

            if ($vendor && $userAddress) {
                // Use vendor postal code if available, else fallback to user address
                $originPostalCode = $vendor->postal_code;
                if (!$originPostalCode) {
                    $vendorUserAddress = $vendor->user->addresses->where('is_primary', true)->first() ?? $vendor->user->addresses->first();
                    $originPostalCode = $vendorUserAddress ? $vendorUserAddress->postal_code : null;
                }

                if ($originPostalCode && $userAddress->postal_code) {
                    $biteship = new BiteshipService();
                    $items = [];
                    foreach ($vendorProducts as $prod) {
                        $items[] = [
                            'name' => $prod->name,
                            'price' => $prod->price,
                            'quantity' => $cart[$prod->id]['quantity'],
                            'weight' => $prod->weight > 0 ? (int) $prod->weight : 1000 // Weight in grams
                        ];
                    }

                    $couriers = $vendor->available_couriers ? implode(',', $vendor->available_couriers) : 'jne,sicepat,jnt,anteraja';

                    $rates = $biteship->getShippingRates(
                        ['postal_code' => $originPostalCode],
                        ['postal_code' => $userAddress->postal_code],
                        $items,
                        $couriers
                    );

                    if (!empty($rates)) {
                        // Pick cheapest
                        $shippingCost = collect($rates)->min('price');
                    }
                }
            } elseif ($vendorId === 'default' && $userAddress) {
                // Official Store (Admin) Shipping Calculation
                $adminVendor = \App\Models\Vendor::whereHas('user', function ($q) {
                    $q->where('role', 'admin');
                })->first();

                if ($adminVendor && $adminVendor->postal_code && $userAddress->postal_code) {
                    $vendor = $adminVendor; // Set for UI display if needed
                    $biteship = new BiteshipService();
                    $items = [];
                    foreach ($vendorProducts as $prod) {
                        $items[] = [
                            'name' => $prod->name,
                            'price' => $prod->price,
                            'quantity' => $cart[$prod->id]['quantity'],
                            'weight' => $prod->weight > 0 ? (int) $prod->weight : 1000
                        ];
                    }

                    $couriers = $adminVendor->available_couriers ? implode(',', $adminVendor->available_couriers) : 'jne,sicepat,jnt,anteraja';

                    $rates = $biteship->getShippingRates(
                        ['postal_code' => $adminVendor->postal_code],
                        ['postal_code' => $userAddress->postal_code],
                        $items,
                        $couriers
                    );

                    if (!empty($rates)) {
                        $shippingCost = collect($rates)->min('price');
                    }
                } else {
                    $shippingCost = 10000; // Final fallback
                }
            } elseif ($vendor) {
                $shippingCost = $vendor->flat_shipping_cost;
            } else {
                $shippingCost = 10000; // Default fallback for Admin product if no profile exists
            }

            $total = $subtotal + $serviceFee + $shippingCost;

            $orderGroups[] = [
                'vendor_id' => $realVendorId,
                'vendor_name' => $vendorName,
                'products' => $vendorProducts,
                'subtotal' => $subtotal,
                'service_fee' => $serviceFee,
                'shipping_cost' => $shippingCost,
                'available_rates' => $rates ?? [],
                'total' => $total
            ];

            $grandTotal += $total;
        }

        $addresses = auth()->user()->addresses;

        return view('checkout.index', compact('orderGroups', 'addresses', 'grandTotal', 'userAddress'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'address_id' => 'required|exists:addresses,id',
            'shipping_service' => 'nullable|array',
        ]);

        $cart = Session::get('cart', []);
        if (empty($cart))
            return redirect()->route('products.index');

        $productIds = array_keys($cart);
        $products = Product::whereIn('id', $productIds)->get();
        $grouped = $products->groupBy(function ($item) {
            return $item->vendor_id ?? 'default';
        });

        $address = \App\Models\Address::find($request->address_id);
        $paymentReference = 'ORD-' . strtoupper(Str::random(10));
        $grandTotal = 0;

        DB::beginTransaction();
        try {
            foreach ($grouped as $vendorId => $vendorProducts) {
                $realVendorId = ($vendorId === 'default') ? null : $vendorId;

                $subtotal = 0;
                foreach ($vendorProducts as $p) {
                    $qty = $cart[$p->id]['quantity'];
                    $subtotal += $p->price * $qty;
                }

                $serviceFee = 2000;

                // Calculate Shipping with Biteship (Re-calculate for safety)
                $vendor = $vendorProducts->first()->vendor;
                $courierCode = 'jne';
                $courierServiceCode = 'reg';
                $shippingCost = 10000; // Initialize with default

                if ($vendor && $address) {
                    $originPostalCode = $vendor->postal_code;
                    if (!$originPostalCode) {
                        $vendorUserAddress = $vendor->user->addresses->where('is_primary', true)->first() ?? $vendor->user->addresses->first();
                        $originPostalCode = $vendorUserAddress ? $vendorUserAddress->postal_code : null;
                    }

                    if ($originPostalCode && $address->postal_code) {
                        $biteship = new BiteshipService();
                        $items = [];
                        foreach ($vendorProducts as $prod) {
                            $items[] = [
                                'name' => $prod->name,
                                'price' => $prod->price,
                                'quantity' => $cart[$prod->id]['quantity'],
                                'weight' => $prod->weight > 0 ? (int) $prod->weight : 1000
                            ];
                        }

                        $couriers = $vendor->available_couriers ? implode(',', $vendor->available_couriers) : 'jne,sicepat,jnt,anteraja';

                        $rates = $biteship->getShippingRates(
                            ['postal_code' => $originPostalCode],
                            ['postal_code' => $address->postal_code],
                            $items,
                            $couriers
                        );

                        if (!empty($rates)) {
                            // Check if user selected a specific service
                            $selectedService = $request->input("shipping_service.$vendorId");
                            if ($selectedService) {
                                // Format: courier_code|courier_service_code|price
                                $parts = explode('|', $selectedService);
                                if (count($parts) === 3) {
                                    $courierCode = $parts[0];
                                    $courierServiceCode = $parts[1];
                                    $shippingCost = (int) $parts[2];
                                } else {
                                    $bestRate = collect($rates)->sortBy('price')->first();
                                    $courierCode = $bestRate['courier_code'];
                                    $courierServiceCode = $bestRate['courier_service_code'];
                                    $shippingCost = $bestRate['price'];
                                }
                            } else {
                                $bestRate = collect($rates)->sortBy('price')->first();
                                $courierCode = $bestRate['courier_code'];
                                $courierServiceCode = $bestRate['courier_service_code'];
                                $shippingCost = $bestRate['price'];
                            }
                        }
                    } else {
                        $shippingCost = $vendor->flat_shipping_cost;
                    }
                } elseif ($vendorId === 'default' && $address) {
                    // Official Store (Admin) Shipping Calculation
                    $adminVendor = \App\Models\Vendor::whereHas('user', function ($q) {
                        $q->where('role', 'admin');
                    })->first();

                    if ($adminVendor && $adminVendor->postal_code && $address->postal_code) {
                        $biteship = new BiteshipService();
                        $items = [];
                        foreach ($vendorProducts as $prod) {
                            $items[] = [
                                'name' => $prod->name,
                                'price' => $prod->price,
                                'quantity' => $cart[$prod->id]['quantity'],
                                'weight' => $prod->weight > 0 ? (int) $prod->weight : 1000
                            ];
                        }

                        $couriers = $adminVendor->available_couriers ? implode(',', $adminVendor->available_couriers) : 'jne,sicepat,jnt,anteraja';

                        $rates = $biteship->getShippingRates(
                            ['postal_code' => $adminVendor->postal_code],
                            ['postal_code' => $address->postal_code],
                            $items,
                            $couriers
                        );

                        if (!empty($rates)) {
                            $selectedService = $request->input("shipping_service.default");
                            if ($selectedService) {
                                $parts = explode('|', $selectedService);
                                if (count($parts) === 3) {
                                    $courierCode = $parts[0];
                                    $courierServiceCode = $parts[1];
                                    $shippingCost = (int) $parts[2];
                                }
                            } else {
                                $bestRate = collect($rates)->sortBy('price')->first();
                                $courierCode = $bestRate['courier_code'];
                                $courierServiceCode = $bestRate['courier_service_code'];
                                $shippingCost = $bestRate['price'];
                            }
                        }
                    }
                } elseif ($vendor) {
                    $shippingCost = $vendor->flat_shipping_cost;
                }

                $totalAmount = $subtotal + $serviceFee + $shippingCost;
                $grandTotal += $totalAmount;

                $order = Order::create([
                    'user_id' => auth()->id(),
                    'vendor_id' => $realVendorId,
                    'payment_reference' => $paymentReference,
                    'total_amount' => $totalAmount,
                    'status' => 'pending',
                    'shipping_address' => $address->address_line . ', ' . $address->city . ', ' . $address->province . ' - ' . $address->postal_code,
                    'phone' => $address->phone,
                    'service_fee' => $serviceFee,
                    'shipping_cost' => $shippingCost,
                    'shipping_courier' => $courierCode,
                    'shipping_service' => $courierServiceCode,
                ]);

                // Update user phone if empty
                if (!auth()->user()->phone && $address->phone) {
                    auth()->user()->update(['phone' => $address->phone]);
                }

                foreach ($vendorProducts as $p) {
                    OrderItem::create([
                        'order_id' => $order->id,
                        'product_id' => $p->id,
                        'vendor_id' => $realVendorId,
                        'quantity' => $cart[$p->id]['quantity'],
                        'price' => $p->price,
                    ]);
                }
            }

            // Clear Cart
            Session::forget('cart');
            DB::commit();

            // Midtrans Integration
            \Midtrans\Config::$serverKey = config('midtrans.server_key');
            \Midtrans\Config::$isProduction = config('midtrans.is_production');
            \Midtrans\Config::$isSanitized = config('midtrans.is_sanitized');
            \Midtrans\Config::$is3ds = config('midtrans.is_3ds');

            $params = [
                'transaction_details' => [
                    'order_id' => $paymentReference,
                    'gross_amount' => (int) $grandTotal,
                ],
                'customer_details' => [
                    'first_name' => auth()->user()->name,
                    'email' => auth()->user()->email,
                    'phone' => $address->phone,
                ],
            ];

            try {
                $snapToken = \Midtrans\Snap::getSnapToken($params);
                return view('checkout.payment', compact('snapToken', 'grandTotal', 'paymentReference'));
            } catch (\Exception $e) {
                // Determine if it is a configuration error
                if (empty(config('midtrans.server_key'))) {
                    return redirect()->route('orders.index')->with('success', 'Order placed successfully! Ref: ' . $paymentReference . '. (Midtrans Key missing, assuming COD/Manual)');
                }
                return redirect()->route('orders.index')->with('error', 'Order placed, but payment generation failed: ' . $e->getMessage());
            }

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Failed to create order: ' . $e->getMessage());
        }
    }

    /**
     * Fallback for local development or delayed webhooks.
     * Verifies payment status with Midtrans when user returns to the site.
     */
    public function finish(Request $request)
    {
        $orderId = $request->get('order_id');
        if (!$orderId) {
            return redirect()->route('orders.index');
        }

        // Initialize Midtrans
        \Midtrans\Config::$serverKey = config('midtrans.server_key');
        \Midtrans\Config::$isProduction = config('midtrans.is_production');

        try {
            $status = \Midtrans\Transaction::status($orderId);
            $orders = Order::where('payment_reference', $orderId)->get();

            if ($orders->isNotEmpty()) {
                if ($status['transaction_status'] == 'settlement' || $status['transaction_status'] == 'capture') {
                    $this->processPaymentSuccess($orders, 'Midtrans Verification (Finish Redirect)');
                    return redirect()->route('orders.index')->with('success', 'Pembayaran berhasil dikonfirmasi! Pesanan Anda sedang diproses.');
                }
            }
        } catch (\Exception $e) {
            Log::error('Midtrans Finish Error: ' . $e->getMessage());
        }

        return redirect()->route('orders.index')->with('info', 'Kami sedang memproses pembayaran Anda. Silakan cek status pesanan secara berkala.');
    }

    public function index()
    {
        $orders = auth()->user()->orders()->with(['items.product', 'vendor'])->orderBy('created_at', 'desc')->get();
        return view('orders.index', compact('orders'));
    }

    public function show(Order $order)
    {
        // Security check: only the owner can view
        if ($order->user_id !== auth()->id()) {
            abort(403);
        }

        $order->load(['items.product', 'vendor']);
        return view('orders.show', compact('order'));
    }
}
