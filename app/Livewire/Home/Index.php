<?php

namespace App\Livewire\Home;

use App\Models\Product;
use Livewire\Component;

class Index extends Component
{
    public function getProduct()
    {
        return Product::where('is_featured', true)
            ->orderByRaw('CASE WHEN original_price > price THEN 1 ELSE 0 END DESC')
            ->take(4)
            ->get();
    }

    public function render()
    {
        return view('livewire.home.index', [
            'products' => $this->getProduct()
        ]);
    }
}
