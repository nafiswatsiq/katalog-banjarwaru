<?php

namespace App\Livewire\Products;

use App\Models\Category;
use App\Models\Product;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    #[Url(as: 'search')]
    public $search = '';

    #[Url(as: 'category')]
    public $selectedCategory = '';

    #[Url(as: 'price')]
    public $priceRange = '';

    #[Url(as: 'sort')]
    public $sortBy = 'newest';

    #[Url(as: 'view')]
    public $viewType = 'grid';

    public function mount()
    {
        // Initialize any default values if needed
    }

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function updatedSelectedCategory()
    {
        $this->resetPage();
    }

    public function updatedPriceRange()
    {
        $this->resetPage();
    }

    public function updatedSortBy()
    {
        $this->resetPage();
    }

    public function clearAllFilters()
    {
        $this->reset(['search', 'selectedCategory', 'priceRange']);
        $this->resetPage();
    }

    public function getProducts()
    {
        $query = Product::with('category');

        // Apply search filter
        if ($this->search) {
            $query->where(function ($q) {
                $q->where('name', 'like', '%' . $this->search . '%')
                  ->orWhere('description', 'like', '%' . $this->search . '%');
            });
        }

        // Apply category filter
        if ($this->selectedCategory) {
            $query->whereHas('category', function ($q) {
                $q->where('slug', $this->selectedCategory);
            });
        }

        // Apply price range filter
        if ($this->priceRange) {
            [$min, $max] = explode('-', $this->priceRange);
            $query->whereBetween('price', [$min, $max]);
        }

        // Apply sorting
        switch ($this->sortBy) {
            case 'discount':
                $query->orderByRaw('CASE WHEN original_price > price THEN 1 ELSE 0 END DESC');
                break;
            case 'price_low':
                $query->orderBy('price', 'asc');
                break;
            case 'price_high':
                $query->orderBy('price', 'desc');
                break;
            case 'name':
                $query->orderBy('name', 'asc');
                break;
            case 'popular':
                $query->orderBy('is_featured', 'desc');
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
        return view('livewire.products.index', [
            'products' => $this->getProducts(),
            'categories' => Category::all(),
        ]);
    }
}
