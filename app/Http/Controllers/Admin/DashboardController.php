<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total_users' => \App\Models\User::count(),
            'total_products' => \App\Models\Product::count(),
            'total_categories' => \App\Models\Category::count(),
            'total_orders' => \App\Models\Order::count(),
            'total_visits' => \App\Models\Visit::count(),
            'total_messages' => \App\Models\Contact::count(),
            'unread_messages' => \App\Models\Contact::where('is_read', false)->count(),
            'total_pending_payouts' => \App\Models\Payout::where('status', 'pending')->count(),
            'recent_orders' => \App\Models\Order::with(['user', 'vendor', 'items.product'])->latest()->take(5)->get(),
            'recent_payouts' => \App\Models\Payout::with('vendor')->latest()->take(5)->get(),
            'sales_recap' => \App\Models\Order::where('status', 'completed')
                ->selectRaw('DATE(created_at) as date, COUNT(*) as total_orders, SUM(total_amount) as total_sales')
                ->groupBy('date')
                ->orderBy('date', 'desc')
                ->take(30)
                ->get(),
        ];

        return view('admin.dashboard', compact('stats'));
    }
}
