<?php

namespace App\Livewire\Products;

use Livewire\Component;

class Show extends Component
{
    public $productId;
    public $product;
    public $quantity = 1;
    public $activeTab = 'description';
    public $isInWishlist = false;
    public $relatedProducts = [];

    public function mount($slug)
    {
        $this->productId = $slug;
        $this->loadProduct();
        $this->loadRelatedProducts();
    }

    public function loadProduct()
    {
        // Mock data for demonstration
        // In real application, this would query your database
        $this->product = [
            'id' => $this->productId,
            'name' => 'Lampu Gantung Bambu Premium',
            'description' => 'Lampu gantung elegan dengan anyaman bambu natural yang memberikan pencahayaan hangat dan nyaman untuk ruang tamu Anda. Dibuat dengan teknik anyaman tradisional yang telah diturunkan turun-temurun.',
            'detailed_description' => 'Produk kerajinan bambu premium ini dibuat dengan keahlian tinggi oleh pengrajin lokal yang berpengalaman. Setiap detail dikerjakan dengan teliti untuk menghasilkan produk berkualitas tinggi yang tahan lama dan indah dipandang. Bambu yang digunakan telah melalui proses pengeringan dan pengawetan khusus untuk memastikan ketahanan terhadap rayap dan kelembaban.',
            'price' => 250000,
            'original_price' => 300000,
            'category' => 'dekorasi',
            'rating' => 4.8,
            'reviews_count' => 23,
            'stock' => 15,
            'images' => [
                'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRy4a09qhqr8Flb1-0h-1yjRUgtwgWKxzli8g&s',
                'https://www.static-src.com/wcsstore/Indraprastha/images/catalog/full//catalog-image/100/MTA-112665592/no-brand_keranjang-bambu-kecil_full01-dd3b7e35.jpg',
            ],
            'features' => [
                'Bahan bambu pilihan berkualitas tinggi',
                'Finishing natural yang tahan lama',
                'Desain minimalis dan elegan',
                'Ramah lingkungan dan sustainable',
                'Mudah dipasang dan dirawat'
            ],
            'specifications' => [
                'Material' => 'Bambu Natural',
                'Dimensi' => '40cm x 30cm x 25cm',
                'Berat' => '1.2 kg',
                'Warna' => 'Natural Bambu',
                'Garansi' => '1 Tahun'
            ],
            'detailed_specifications' => [
                'Dimensi & Berat' => [
                    'Panjang' => '40 cm',
                    'Lebar' => '30 cm',
                    'Tinggi' => '25 cm',
                    'Berat' => '1.2 kg',
                    'Diameter Lubang' => '3 cm'
                ],
                'Material & Finishing' => [
                    'Bahan Utama' => 'Bambu Pilihan',
                    'Finishing' => 'Natural Oil',
                    'Warna' => 'Natural Bambu',
                    'Perlakuan' => 'Anti Rayap & Jamur',
                    'Durabilitas' => 'Tahan 5+ Tahun'
                ]
            ],
            'care_instructions' => [
                'Bersihkan dengan kain lembab secara berkala',
                'Hindari terkena air berlebihan',
                'Letakkan di tempat yang tidak terkena sinar matahari langsung',
                'Gunakan poles kayu alami untuk perawatan rutin',
                'Simpan di tempat dengan kelembaban sedang'
            ],
            'reviews' => [
                [
                    'name' => 'Sari Indah',
                    'rating' => 5,
                    'date' => '15 Januari 2025',
                    'comment' => 'Produk sangat bagus! Kualitas bambu premium dan finishing-nya rapi sekali. Sangat puas dengan pembelian ini.'
                ],
                [
                    'name' => 'Budi Santoso',
                    'rating' => 5,
                    'date' => '12 Januari 2025',
                    'comment' => 'Lampu gantung ini benar-benar memberikan nuansa natural yang indah di ruang tamu. Pengiriman cepat dan aman.'
                ],
                [
                    'name' => 'Maya Putri',
                    'rating' => 4,
                    'date' => '8 Januari 2025',
                    'comment' => 'Bagus sekali, sesuai ekspektasi. Hanya saja agak susah pasang fitting lampunya, tapi overall puas.'
                ]
            ]
        ];
    }

    public function loadRelatedProducts()
    {
        // Mock related products
        $this->relatedProducts = [
            [
                'id' => 2,
                'name' => 'Keranjang Anyaman Multifungsi',
                'description' => 'Keranjang serbaguna dengan desain minimalis',
                'price' => 125000,
                'image' => 'https://www.static-src.com/wcsstore/Indraprastha/images/catalog/full//catalog-image/100/MTA-112665592/no-brand_keranjang-bambu-kecil_full01-dd3b7e35.jpg'
            ],
            [
                'id' => 3,
                'name' => 'Kursi Bambu Modern',
                'description' => 'Kursi ergonomis dengan finishing premium',
                'price' => 450000,
                'image' => 'https://www.static-src.com/wcsstore/Indraprastha/images/catalog/full//catalog-image/100/MTA-112665592/no-brand_keranjang-bambu-kecil_full01-dd3b7e35.jpg'
            ],
            [
                'id' => 4,
                'name' => 'Nampan Bambu Set',
                'description' => 'Set nampan ukuran berbeda untuk kebutuhan harian',
                'price' => 175000,
                'image' => 'https://www.static-src.com/wcsstore/Indraprastha/images/catalog/full//catalog-image/100/MTA-112665592/no-brand_keranjang-bambu-kecil_full01-dd3b7e35.jpg'
            ],
            [
                'id' => 5,
                'name' => 'Vas Bunga Artistik',
                'description' => 'Vas bunga dengan sentuhan artistik yang indah',
                'price' => 95000,
                'image' => 'https://www.static-src.com/wcsstore/Indraprastha/images/catalog/full//catalog-image/100/MTA-112665592/no-brand_keranjang-bambu-kecil_full01-dd3b7e35.jpg'
            ]
        ];
    }

    public function increaseQuantity()
    {
        if ($this->quantity < ($this->product['stock'] ?? 15)) {
            $this->quantity++;
        }
    }

    public function decreaseQuantity()
    {
        if ($this->quantity > 1) {
            $this->quantity--;
        }
    }

    public function addToCart()
    {
        // Simulate adding to cart with quantity
        session()->flash('message', "Berhasil menambahkan {$this->quantity} {$this->product['name']} ke keranjang!");
        
        // Emit event for cart update
        $this->dispatch('product-added-to-cart', [
            'productId' => $this->productId,
            'quantity' => $this->quantity,
            'productName' => $this->product['name']
        ]);
    }

    public function buyNow()
    {
        // Simulate buy now process
        session()->flash('message', 'Mengarahkan ke halaman checkout...');
        
        // In real application, redirect to checkout
        // return redirect()->route('checkout');
    }

    public function toggleWishlist()
    {
        $this->isInWishlist = !$this->isInWishlist;
        
        $message = $this->isInWishlist 
            ? 'Produk berhasil ditambahkan ke wishlist!' 
            : 'Produk berhasil dihapus dari wishlist!';
            
        session()->flash('message', $message);
    }

    public function render()
    {
        return view('livewire.products.show');
    }
}