<?php

namespace App\Livewire\Components;

use App\Models\Product;
use Livewire\Component;

class ProductCard extends Component
{
    public Product $product;
    
    public string $buttonLabel;
    
    public function mount(string $buttonLabel = 'Lihat')
    {
        $this->buttonLabel = $buttonLabel;
    }

    public function render()
    {
        return view('livewire.components.product-card');
    }
}
