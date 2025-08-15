<?php

namespace App\Livewire\Products;

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

    // public function addToCart($productId)
    // {
    //     // Simulate adding to cart
    //     // In real application, you would add this to session or database
    //     session()->flash('message', 'Produk berhasil ditambahkan ke keranjang!');
        
    //     // Emit event for any listening components
    //     $this->dispatch('product-added', productId: $productId);
    // }

    public function getProducts()
    {
        // Mock data for demonstration
        // In real application, this would query your database
        $allProducts = collect([
            [
                'id' => 1,
                'name' => 'Lampu Gantung Bambu Premium',
                'slug' => 'lampu-gantung-bambu-premium',
                'description' => 'Lampu gantung elegan dengan anyaman bambu natural yang memberikan pencahayaan hangat untuk ruang tamu Anda.',
                'price' => 250000,
                'category' => 'dekorasi',
                'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRy4a09qhqr8Flb1-0h-1yjRUgtwgWKxzli8g&s',
                'is_featured' => true,
                'is_new' => false,
            ],
            [
                'id' => 2,
                'name' => 'Keranjang Anyaman Multifungsi',
                'slug' => 'keranjang-anyaman-multifungsi',
                'description' => 'Keranjang serbaguna dengan desain minimalis, perfect untuk penyimpanan atau dekorasi rumah modern.',
                'price' => 125000,
                'category' => 'perabotan',
                'image' => 'https://www.static-src.com/wcsstore/Indraprastha/images/catalog/full//catalog-image/100/MTA-112665592/no-brand_keranjang-bambu-kecil_full01-dd3b7e35.jpg',
                'is_featured' => false,
                'is_new' => true,
            ],
            [
                'id' => 3,
                'name' => 'Kursi Bambu Modern Ergonomis',
                'slug' => 'kursi-bambu-modern-ergonomis',
                'description' => 'Kursi ergonomis dengan finishing premium, kombinasi sempurna antara kenyamanan dan estetika.',
                'price' => 450000,
                'category' => 'furniture',
                'image' => 'https://i.ytimg.com/vi/CjVoAdlgUgU/hq720.jpg',
                'is_featured' => true,
                'is_new' => false,
            ],
            [
                'id' => 4,
                'name' => 'Nampan Bambu Set 3 Ukuran',
                'slug' => 'nampan-bambu-set-3-ukuran',
                'description' => 'Set nampan ukuran berbeda untuk kebutuhan harian, dari sajian teh hingga hidangan utama.',
                'price' => 175000,
                'category' => 'perabotan',
                'image' => 'https://media.dinomarket.com/docs/imgTD/2022-01/_SMine_1643098571718_250122150112_ll.jpg.jpg',
                'is_featured' => false,
                'is_new' => false,
            ],
            [
                'id' => 5,
                'name' => 'Meja Kopi Bambu Minimalis',
                'slug' => 'meja-kopi-bambu-minimalis',
                'description' => 'Meja kopi dengan desain minimalis yang cocok untuk ruang tamu modern atau tradisional.',
                'price' => 650000,
                'category' => 'furniture',
                'image' => 'https://picsum.photos/seed/table/400/300',
                'is_featured' => true,
                'is_new' => true,
            ],
            [
                'id' => 6,
                'name' => 'Tempat Pensil Bambu Carved',
                'slug' => 'tempat-pensil-bambu-carved',
                'description' => 'Tempat pensil dengan ukiran halus, ideal untuk meja kerja atau sebagai hadiah.',
                'price' => 75000,
                'category' => 'aksesoris',
                'image' => 'https://picsum.photos/seed/pencil/400/300',
                'is_featured' => false,
                'is_new' => false,
            ],
            [
                'id' => 7,
                'name' => 'Rak Buku Bambu 4 Tingkat',
                'slug' => 'rak-buku-bambu-4-tingkat',
                'description' => 'Rak buku dengan 4 tingkat yang kuat dan tahan lama, perfect untuk perpustakaan mini.',
                'price' => 890000,
                'category' => 'furniture',
                'image' => 'https://picsum.photos/seed/bookshelf/400/300',
                'is_featured' => false,
                'is_new' => true,
            ],
            [
                'id' => 8,
                'name' => 'Vas Bunga Bambu Artistic',
                'slug' => 'vas-bunga-bambu-artistic',
                'description' => 'Vas bunga dengan sentuhan artistik yang akan mempercantik sudut rumah Anda.',
                'price' => 95000,
                'category' => 'dekorasi',
                'image' => 'https://picsum.photos/seed/vase/400/300',
                'is_featured' => false,
                'is_new' => false,
            ],
            [
                'id' => 9,
                'name' => 'Set Mangkuk Bambu Keluarga',
                'slug' => 'set-mangkuk-bambu-keluarga',
                'description' => 'Set mangkuk untuk keluarga dengan berbagai ukuran, aman untuk makanan dan minuman.',
                'price' => 320000,
                'category' => 'perabotan',
                'image' => 'https://picsum.photos/seed/bowls/400/300',
                'is_featured' => true,
                'is_new' => false,
            ],
            [
                'id' => 10,
                'name' => 'Hiasan Dinding Bambu Geometris',
                'slug' => 'hiasan-dinding-bambu-geometris',
                'description' => 'Hiasan dinding dengan pola geometris yang memberikan accent point untuk ruangan.',
                'price' => 185000,
                'category' => 'dekorasi',
                'image' => 'https://picsum.photos/seed/wallart/400/300',
                'is_featured' => false,
                'is_new' => true,
            ],
            [
                'id' => 11,
                'name' => 'Kursi Bar Bambu Industrial',
                'slug' => 'kursi-bar-bambu-industrial',
                'description' => 'Kursi bar dengan gaya industrial yang unik, cocok untuk dapur atau bar mini.',
                'price' => 385000,
                'category' => 'furniture',
                'image' => 'https://picsum.photos/seed/barstool/400/300',
                'is_featured' => false,
                'is_new' => false,
            ],
            [
                'id' => 12,
                'name' => 'Gelas Bambu Eco-Friendly Set',
                'slug' => 'gelas-bambu-eco-friendly-set',
                'description' => 'Set gelas ramah lingkungan yang aman dan stylish untuk kebutuhan sehari-hari.',
                'price' => 145000,
                'category' => 'perabotan',
                'image' => 'https://picsum.photos/seed/glasses/400/300',
                'is_featured' => false,
                'is_new' => true,
            ],
        ]);

        // Apply search filter
        if ($this->search) {
            $allProducts = $allProducts->filter(function ($product) {
                return stripos($product['name'], $this->search) !== false || 
                       stripos($product['description'], $this->search) !== false;
            });
        }

        // Apply category filter
        if ($this->selectedCategory) {
            $allProducts = $allProducts->where('category', $this->selectedCategory);
        }

        // Apply price range filter
        if ($this->priceRange) {
            [$min, $max] = explode('-', $this->priceRange);
            $allProducts = $allProducts->filter(function ($product) use ($min, $max) {
                return $product['price'] >= $min && $product['price'] <= $max;
            });
        }

        // Apply sorting
        switch ($this->sortBy) {
            case 'price_low':
                $allProducts = $allProducts->sortBy('price');
                break;
            case 'price_high':
                $allProducts = $allProducts->sortByDesc('price');
                break;
            case 'name':
                $allProducts = $allProducts->sortBy('name');
                break;
            case 'popular':
                $allProducts = $allProducts->sortByDesc('is_featured');
                break;
            case 'newest':
            default:
                $allProducts = $allProducts->sortByDesc('is_new');
                break;
        }

        // Simulate pagination
        $perPage = 8;
        $currentPage = $this->getPage();
        $total = $allProducts->count();
        
        $items = $allProducts->skip(($currentPage - 1) * $perPage)->take($perPage)->values();

        return new \Illuminate\Pagination\LengthAwarePaginator(
            $items,
            $total,
            $perPage,
            $currentPage,
            [
                'path' => request()->url(),
                'pageName' => 'page',
            ]
        );
    }

    public function render()
    {
        return view('livewire.products.index', [
            'products' => $this->getProducts()
        ]);
    }
}
