<?php

namespace App\Livewire\Components;

use App\Models\Store;
use Livewire\Component;

class StoreCard extends Component
{
    public Store $store;
    
    public function render()
    {
        return view('livewire.components.store-card');
    }
}
