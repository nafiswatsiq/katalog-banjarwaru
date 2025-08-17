<a href="{{ route('products.show', $product->slug) }}" class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition duration-300 transform hover:-translate-y-2">
    <div class="relative overflow-hidden">
        <img 
            src="{{ $product->getMediaCollection()->first()->getUrl() }}" 
            alt="{{ $product->name }}" 
            class="w-full h-64 object-cover hover:scale-110 transition duration-300"
            loading="lazy"
        >
        @if($product->is_featured)
            <div class="absolute top-4 right-4 bg-green-800 text-white px-3 py-1 rounded-full text-sm">
                Unggulan
            </div>
        @endif
        <div class="flex absolute top-4 left-4">
            @if(isset($product->original_price) && $product->original_price > $product->price)
                <div class="bg-red-600 text-white px-3 py-1 rounded-full text-sm">
                    Diskon {{ round((($product->original_price - $product->price) / $product->original_price) * 100) }}%
                </div>
            @endif
            @if($product->created_at > now()->subDays(7))
                <div class="bg-amber-600 text-white px-3 py-1 rounded-full text-sm">
                    Baru
                </div>
            @endif
        </div>
    </div>
    <div class="p-6">
        <div class="flex items-center text-sm text-gray-500 mb-2">
            <i class="fas fa-tag mr-1"></i>
            <span>{{ ucfirst($product->getCategoryNameAttribute()) }}</span>
        </div>
        <h3 class="text-xl font-semibold text-gray-800 mb-2 line-clamp-2">{{ $product->name }}</h3>
        <p class="text-gray-600 mb-4 line-clamp-2">{!! str($product->description)->limit(30) !!}</p>
        <div class="flex items-center justify-between">
            <div>
                @if(isset($product->original_price) && $product->original_price > $product->price)
                    <p class="line-through text-gray-500">Rp {{ number_format($product->original_price, 0, ',', '.') }}</p>
                @endif
                <p class="text-2xl font-bold text-amber-600">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
            </div>
            <button 
                class="bg-green-800 text-white px-4 py-2 rounded-lg hover:bg-green-900 transition duration-300 flex items-center space-x-2 cursor-pointer"
            >
                <div>
                    <i class="fas fa-eye"></i>
                    <span class="hidden sm:inline">{{ $buttonLabel }}</span>
                </div>
            </button>
        </div>
    </div>
</a>
