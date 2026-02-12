<?php

namespace App\Livewire;

use Livewire\Component;

class ProductReviews extends Component
{
    public $productId;
    public $rating = 5;
    public $comment = '';
    public $showForm = false;

    protected $rules = [
        'rating' => 'required|integer|min:1|max:5',
        'comment' => 'required|string|min:3',
    ];

    public function mount($productId)
    {
        $this->productId = $productId;
    }

    public function save()
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        $this->validate();

        \App\Models\Review::create([
            'user_id' => auth()->id(),
            'product_id' => $this->productId,
            'rating' => $this->rating,
            'comment' => $this->comment,
        ]);

        $this->reset(['rating', 'comment', 'showForm']);
        session()->flash('message', 'Review berhasil dikirim!');
    }

    public function deleteReview($id)
    {
        if (!auth()->check() || !auth()->user()->isAdmin()) {
            return;
        }

        $review = \App\Models\Review::findOrFail($id);
        $review->delete();

        session()->flash('message', 'Ulasan berhasil dihapus.');
    }

    public function render()
    {
        $product = \App\Models\Product::with('reviews.user')->findOrFail($this->productId);
        return view('livewire.product-reviews', [
            'product' => $product,
            'reviews' => $product->reviews()->latest()->get(),
        ]);
    }
}
