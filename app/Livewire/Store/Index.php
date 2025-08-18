<?php

namespace App\Livewire\Store;

use App\Models\Store;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    #[Url(as: 'search')]
    public $search = '';

    #[Url(as: 'sort')]
    public $sortBy = 'newest';

    public function mount()
    {
        // Initialize any default values if needed
    }

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function updatedSortBy()
    {
        $this->resetPage();
    }

    public function clearSearch()
    {
        $this->reset(['search']);
        $this->resetPage();
    }

    public function getStores()
    {
        $query = Store::query();

        // Apply search filter
        if ($this->search) {
            $query->where(function ($q) {
                $q->where('name', 'like', '%' . $this->search . '%')
                  ->orWhere('description', 'like', '%' . $this->search . '%')
                  ->orWhere('address', 'like', '%' . $this->search . '%');
            });
        }

        // Apply sorting
        switch ($this->sortBy) {
            case 'name':
                $query->orderBy('name', 'asc');
                break;
            case 'oldest':
                $query->orderBy('created_at', 'asc');
                break;
            case 'newest':
            default:
                $query->orderBy('created_at', 'desc');
                break;
        }
        
        return $query->paginate(12);
    }

    public function render()
    {
        return view('livewire.store.index', [
            'stores' => $this->getStores(),
        ]);
    }
}