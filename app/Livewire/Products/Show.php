<?php

namespace App\Livewire\Products;

use App\Models\Product;
use Livewire\Component;

class Show extends Component
{
    public $product;
    public $relatedProducts = [];

    public function mount($slug)
    {
        $this->loadProduct($slug);
        $this->loadRelatedProducts();
    }

    public function loadProduct(string $slug)
    {
        $this->product = Product::with(['category', 'store'])->where('slug', $slug)->firstOrFail();
    }

    public function loadRelatedProducts()
    {
        $this->relatedProducts = Product::where('category_id', $this->product->category_id)
            ->where('id', '!=', $this->product->id)
            ->inRandomOrder()
            ->take(4)
            ->get();
    }

    public function render()
    {
        return view('livewire.products.show');
    }
}