<div>
    <!-- Breadcrumb Navigation -->
    <section class="bg-gray-50 py-4">
        <div class="container mx-auto lg:px-10 px-4">
            <nav class="flex items-center space-x-2 text-sm text-gray-600">
                <a href="{{ route('home') }}" class="hover:text-green-800 transition duration-300">
                    <i class="fas fa-home"></i>
                    Beranda
                </a>
                <i class="fas fa-chevron-right text-gray-400"></i>
                <a href="{{ route('products.index') }}" class="hover:text-green-800 transition duration-300">
                    Produk
                </a>
                <i class="fas fa-chevron-right text-gray-400"></i>
                <span class="text-gray-800 font-medium">{{ $product->name ?? 'Produk' }}</span>
            </nav>
        </div>
    </section>

    <!-- Product Detail Section -->
    <section class="py-12 bg-white">
        <div class="container mx-auto lg:px-10 px-4">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
                <!-- Product Images Gallery -->
                <div 
                    x-data="{
                        zoomOpen: false,
                        activeIndex: 0,
                        images: @js($product->getMediaCollection()->map->getUrl()->toArray()),
                        openZoom(idx) { this.activeIndex = idx; this.zoomOpen = true; },
                        closeZoom() { this.zoomOpen = false; }
                    }"
                    x-init="
                        window.addEventListener('swiper-slide-changed', e => { activeIndex = e.detail.index });
                    "
                    @keydown.window.escape="closeZoom()"
                    class="space-y-4"
                >
                    <!-- Main Image Swiper -->
                    <div class="relative">
                        <div class="swiper product-gallery-main rounded-xl overflow-hidden shadow-lg">
                            <div class="swiper-wrapper">
                                @foreach($product->getMediaCollection() ?? [] as $index => $image)
                                    <div class="swiper-slide" @click="$dispatch('set-active', {{ $index }})">
                                        <img 
                                            src="{{ $image->getUrl() }}" 
                                            alt="{{ $product['name'] }} - Gambar {{ $index + 1 }}" 
                                            class="w-full h-96 lg:h-[500px] object-cover"
                                        >
                                    </div>
                                @endforeach
                            </div>
                            <!-- Navigation buttons ... -->
                            <div class="swiper-button-next !text-white bg-green-800 bg-opacity-50 rounded-full !w-11 h-10 after:text-sm">
                                <i class="fas fa-chevron-right"></i>
                            </div>
                            <div class="swiper-button-prev !text-white bg-green-800 bg-opacity-50 rounded-full !w-11 h-10 after:text-sm">
                                <i class="fas fa-chevron-left"></i>
                            </div>

                            <!-- Zoom icon -->
                            <button 
                                class="absolute flex items-center top-4 right-4 bg-white bg-opacity-80 text-gray-700 p-2 rounded-full hover:bg-opacity-100 transition duration-300 z-10"
                                @click="openZoom(activeIndex)"
                            >
                                <i class="fas fa-search-plus"></i>
                            </button>
                        </div>
                    </div>
                    <!-- Thumbnail Swiper ... -->
                    <div class="swiper product-gallery-thumbs">
                        <div class="swiper-wrapper">
                            @foreach($product->getMediaCollection() ?? [] as $index => $image)
                                <div class="swiper-slide">
                                    <img 
                                        src="{{ $image->getUrl() }}" 
                                        alt="{{ $product['name'] }} - Thumbnail {{ $index + 1 }}" 
                                        class="w-full h-20 object-cover rounded-lg cursor-pointer border-2 border-transparent hover:border-green-800 transition duration-300"
                                    >
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Modal Zoom -->
                    <div 
                        x-show="zoomOpen" 
                        x-transition 
                        class="fixed inset-0 z-50 flex items-center justify-center bg-[#000000d0]"
                        style="display: none;"
                    >
                        <div class="relative" @click.outside="closeZoom()">
                            <img :src="images[activeIndex]" class="lg:h-[80vh] h-auto max-w-[90vw] rounded-xl shadow-2xl border-4 border-white" alt="Zoomed Image">
                            <button 
                                class="absolute top-2 right-2 bg-white bg-opacity-80 text-gray-700 p-2 rounded-full hover:bg-opacity-100 transition"
                                @click="closeZoom()"
                            >
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Product Information -->
                <div class="space-y-6">
                    <!-- Product Title & Category -->
                    <div>
                        <div class="flex items-center space-x-2 text-green-800 mb-2">
                            <i class="fas fa-tag"></i>
                            <span class="text-sm font-medium uppercase tracking-wide">{{ ucfirst($product->getCategoryNameAttribute() ?? 'Kategori') }}</span>
                        </div>
                        <h1 class="text-3xl lg:text-4xl font-bold text-gray-800 mb-4">{{ $product->name ?? 'Nama Produk' }}</h1>

                        <!-- Rating & Reviews -->
                        <div class="flex items-center space-x-4 mb-4">
                        </div>
                    </div>

                    <!-- Price -->
                    <div class="border-t border-b border-gray-200 py-6">
                        <div class="flex lg:flex-row flex-col-reverse lg:items-center space-x-4 gap-y-3">
                            @if(isset($product->original_price) && $product->original_price > $product->price)
                                <div>
                                    <span class="text-3xl lg:text-4xl font-bold text-red-600">
                                        Rp {{ number_format($product->price ?? 0, 0, ',', '.') }}
                                    </span>
                                    <span class="text-xl text-gray-500 line-through">
                                        Rp {{ number_format($product->original_price, 0, ',', '.') }}
                                    </span>
                                </div>
                                <span class="bg-red-100 text-red-800 px-2 py-1 rounded-full text-sm font-medium w-fit">
                                    Hemat {{ round((($product->original_price - $product->price) / $product->original_price) * 100) }}%
                                </span>
                            @else
                                <span class="text-3xl lg:text-4xl font-bold text-green-800">
                                    Rp {{ number_format($product->price ?? 0, 0, ',', '.') }}
                                </span>
                            @endif
                        </div>
                    </div>

                    <!-- Product Description -->
                    <div>
                        <h3 class="text-xl font-semibold text-gray-800 mb-3">Deskripsi Produk</h3>
                        <div class="text-gray-600 leading-relaxed mb-4 prose">
                            {!! str($product->description ?? 'Deskripsi produk akan ditampilkan di sini. Produk kerajinan bambu berkualitas tinggi dengan finishing premium.')->sanitizeHtml() !!}
                        </div>
                        
                        <!-- Product Features -->
                        @if(isset($product->features))
                            <div class="space-y-2">
                                <h4 class="font-medium text-gray-800">Keunggulan:</h4>
                                <ul class="space-y-1">
                                    @foreach($product->getFeatureListAttribute() as $feature)
                                        <li class="flex items-center text-gray-600">
                                            <i class="fas fa-check text-green-600 mr-2"></i>
                                            {{ $feature }}
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>

                    <!-- Action Buttons -->
                    <div class="space-y-4">
                        
                        <div class="grid grid-cols-2 gap-4">
                            <a target="_blank" href="https://wa.me/62{{ $product->store->whatsapp }}?text=Halo%20saya%20tertarik%20dengan%20produk%20{{ urlencode($product->name) }}">
                                <button 
                                    class="w-full bg-green-800 text-white py-4 rounded-lg text-lg font-semibold hover:bg-green-900 transition duration-300 flex items-center justify-center space-x-2"
                                >
                                    <div>
                                        <i class="fab fa-whatsapp mr-2"></i>
                                        <span>Order Produk</span>
                                    </div>
                                </button>
                            </a>
                            <a href="{{ $product->store->location }}" target="_blank" rel="noopener noreferrer" class="w-full">
                                <button 
                                    class="w-full h-full bg-amber-600 text-white py-3 rounded-lg font-semibold hover:bg-amber-700 transition duration-300 flex items-center justify-center space-x-2"
                                >
                                    <i class="fas fa-map-marker-alt"></i>
                                    <span>Lihat Lokasi</span>
                                </button>
                            </a>
                        </div>
                    </div>

                    <!-- Product Specifications -->
                    @if(isset($product->specifications))
                        <div class="border-t border-gray-200 pt-6">
                            <h3 class="text-xl font-semibold text-gray-800 mb-4">Spesifikasi</h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                @foreach($product->getSpecificationListAttribute() as $key => $value)
                                    <div class="flex justify-between py-2 border-b border-gray-100">
                                        <span class="text-gray-600">{{ $key }}</span>
                                        <span class="font-medium text-gray-800">{{ $value }}</span>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    <!-- Share Product -->
                    <div class="border-t border-gray-200 pt-6">
                        <h3 class="text-lg font-semibold text-gray-800 mb-3">Bagikan Produk</h3>
                        <div class="flex flex-wrap items-center gap-4">
                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ route('products.show', $product->slug) }}" target="_blank" rel="noopener noreferrer">
                                <button class="flex items-center space-x-2 bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition duration-300">
                                    <i class="fab fa-facebook-f"></i>
                                    <span>Facebook</span>
                                </button>
                            </a>
                            <a href="https://api.whatsapp.com/send?text={{ route('products.show', $product->slug) }}" target="_blank" rel="noopener noreferrer">
                                <button class="flex items-center space-x-2 bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition duration-300">
                                    <i class="fab fa-whatsapp"></i>
                                    <span>WhatsApp</span>
                                </button>
                            </a>
                            <div  x-data="{
                                copyText: '{{ route('products.show', $product->slug) }}',
                                copyNotification: false,
                                copyToClipboard() {
                                    navigator.clipboard.writeText(this.copyText);
                                    this.copyNotification = true;
                                    let that = this;
                                    setTimeout(function(){
                                        that.copyNotification = false;
                                    }, 3000);
                                }
                            }">
                                <button @click="copyToClipboard();" class="flex items-center space-x-2 bg-gray-600 text-white px-4 py-2 rounded-lg hover:bg-gray-700 transition duration-300">
                                    <i x-show="!copyNotification" class="fas fa-link"></i>
                                    <span x-show="!copyNotification">Salin Link</span>
                                    <i x-show="copyNotification" class="fas fa-check-circle"></i>
                                    <span x-show="copyNotification">Tersalin!</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Product Tabs Section -->
    <section class="py-12 bg-gray-50">
        <div class="container mx-auto lg:px-10 px-4">
            <div class="flex lg:flex-row flex-col gap-4">
                <a href="{{ route('store.show', $product->store->slug) }}" class="w-20 h-20 rounded-full overflow-hidden">
                    <img src="{{ $product->store->getFirstMediaUrl('store_images') }}" alt="Product Tabs Icon" class="w-auto h-full object-cover">
                </a>
                <div>
                    <a href="{{ route('store.show', $product->store->slug) }}" class="text-xl font-semibold text-gray-800 hover:underline">{{ $product->store->name }}</a>
                    <p class="text-gray-600">{{ $product->store->description }}</p>
                    <p class="mt-2 text-gray-600">WhatsApp: {{ $product->store->whatsapp }}</p>
                    <p class=" text-gray-600">Alamat: {{ $product->store->address }}</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Related Products -->
    <section class="py-12 bg-white">
        <div class="container mx-auto lg:px-10 px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-800 mb-4">Produk Terkait</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">
                    Produk lain yang mungkin Anda sukai
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                @foreach($relatedProducts ?? [] as $relatedProduct)
                    <livewire:components.product-card 
                        :product="$relatedProduct" 
                        :buttonLabel="'Lihat'"
                        wire:key="product-card-{{ $relatedProduct->id }}"
                    />
                @endforeach
            </div>
        </div>
    </section>
</div>