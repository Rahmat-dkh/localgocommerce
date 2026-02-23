<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index()
    {
        $vendor = auth()->user()->vendor;
        if (!$vendor) {
            abort(403, 'No Vendor Profile');
        }
        $products = $vendor->products()->with('category')->latest()->paginate(10);
        return view('vendor.products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('vendor.products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'description' => 'nullable|string',
            'weight' => 'required|numeric|min:0',
            'images.*' => 'nullable|image|max:2048',
        ]);

        $data = $request->except('images');
        $data['slug'] = Str::slug($request->name) . '-' . Str::random(5);
        $data['vendor_id'] = auth()->user()->vendor->id;

        $product = Product::create($data);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $key => $image) {
                $path = $image->store('products', 'public');

                // Save to ProductImages table
                \App\Models\ProductImage::create([
                    'product_id' => $product->id,
                    'image_path' => $path
                ]);

                // Use the first image as the main product image
                if ($key === 0) {
                    $product->update(['image' => $path]);
                }
            }
        }

        return redirect()->route('vendor.products.index')->with('success', 'Product created successfully.');
    }

    public function edit(Product $product)
    {
        if ($product->vendor_id != auth()->user()->vendor->id) {
            abort(403);
        }
        $categories = Category::all();
        return view('vendor.products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, Product $product)
    {
        if ($product->vendor_id != auth()->user()->vendor->id) {
            abort(403);
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'description' => 'nullable|string',
            'weight' => 'required|numeric|min:0',
            'images.*' => 'nullable|image|max:2048',
        ]);

        $data = $request->except('images');
        if ($request->name !== $product->name) {
            $data['slug'] = Str::slug($request->name) . '-' . Str::random(5);
        }

        $product->update($data);

        if ($request->hasFile('images')) {
            // Note: In a real app, you might want to delete old images or manage them differently.
            // For now, we append new images to the gallery.
            foreach ($request->file('images') as $key => $image) {
                $path = $image->store('products', 'public');

                \App\Models\ProductImage::create([
                    'product_id' => $product->id,
                    'image_path' => $path
                ]);

                // If the product has no main image yet, set the first one as main
                if (!$product->image && $key === 0) {
                    $product->update(['image' => $path]);
                }
            }
        }

        return redirect()->route('vendor.products.index')->with('success', 'Product updated successfully.');
    }

    public function destroy(Product $product)
    {
        if ($product->vendor_id != auth()->user()->vendor->id) {
            abort(403);
        }

        if ($product->image) {
            \Illuminate\Support\Facades\Storage::disk('public')->delete($product->image);
        }

        foreach ($product->images as $img) {
            \Illuminate\Support\Facades\Storage::disk('public')->delete($img->image_path);
        }

        $product->delete();

        return redirect()->route('vendor.products.index')->with('success', 'Product deleted.');
    }
}
