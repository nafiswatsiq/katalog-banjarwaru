<a href="{{ route('products.show', $product->slug) }}" class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition duration-300">
    <div class="flex flex-col md:flex-row">
        <div class="relative md:w-1/3 overflow-hidden">
            <img 
                src="{{ $product->getMediaCollection()->first()->getUrl() }}" 
                alt="{{ $product->name }}" 
                class="w-full h-64 md:h-full object-cover hover:scale-110 transition duration-300"
                loading="lazy"
            >
            @if($product->is_featured)
                <div class="absolute top-4 right-4 bg-green-800 text-white px-3 py-1 rounded-full text-sm">
                    Unggulan
                </div>
            @endif
            @if($product->created_at > now()->subDays(7))
                <div class="absolute top-4 left-4 bg-amber-600 text-white px-3 py-1 rounded-full text-sm">
                    Baru
                </div>
            @endif
        </div>
        <div class="p-6 md:w-2/3 flex flex-col justify-between">
            <div>
                <div class="flex items-center text-sm text-gray-500 mb-2">
                    <i class="fas fa-tag mr-1"></i>
                    <span>{{ ucfirst($product->getCategoryNameAttribute()) }}</span>
                </div>
                <h3 class="text-2xl font-semibold text-gray-800 mb-3">{{ $product->name }}</h3>
                <p class="text-gray-600 mb-4 leading-relaxed">{!! $product->description !!}</p>
            </div>
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                <div class="flex items-center space-x-4">
                    @if(isset($product->original_price) && $product->original_price > $product->price)
                        <span class="text-3xl font-bold text-red-600">
                            Rp {{ number_format($product->price ?? 0, 0, ',', '.') }}
                        </span>
                        <span class="text-xl text-gray-500 line-through">
                            Rp {{ number_format($product->original_price, 0, ',', '.') }}
                        </span>
                        <span class="bg-red-100 text-red-800 px-2 py-1 rounded-full text-sm font-medium">
                            Hemat {{ round((($product->original_price - $product->price) / $product->original_price) * 100) }}%
                        </span>
                    @else
                        <span class="text-3xl font-bold text-amber-600">
                            Rp {{ number_format($product->price ?? 0, 0, ',', '.') }}
                        </span>
                    @endif
                </div>
                <button 
                    class="bg-green-800 text-white px-6 py-3 rounded-lg hover:bg-green-900 transition duration-300 flex items-center justify-center space-x-2"
                >
                    <div>
                        <i class="fas fa-eye"></i>
                        <span>{{ $buttonLabel }}</span>
                    </div>
                </button>
            </div>
        </div>
    </div>
</a>