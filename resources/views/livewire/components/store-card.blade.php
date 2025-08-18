<a href="{{ route('store.show', $store->slug) }}" class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition duration-300 transform hover:-translate-y-2 block">
    <div class="relative overflow-hidden">
        <img 
            src="{{ $store->getFirstMediaUrl('store_images') ?: asset('assets/images/store-placeholder.jpg') }}" 
            alt="{{ $store->name }}" 
            class="w-full h-48 object-cover hover:scale-110 transition duration-300"
            loading="lazy"
        >
        <div class="absolute top-4 right-4 bg-green-800 text-white px-3 py-1 rounded-full text-sm">
            {{ $store->productCount() ?? 0 }} Produk
        </div>
    </div>
    
    <div class="p-6">
        
        <h3 class="text-xl font-semibold text-gray-800 mb-2 line-clamp-1">{{ $store->name }}</h3>
        
        <p class="text-gray-600 mb-3 line-clamp-2 text-sm leading-relaxed">
            {{ Str::limit($store->description, 100) }}
        </p>
        
        <div class="space-y-2 mb-4">
            <div class="flex items-center text-sm text-gray-600">
                <i class="fas fa-map-marker-alt mr-2 text-gray-400"></i>
                <span class="line-clamp-1">{{ Str::limit($store->address, 50) }}</span>
            </div>
            
            @if($store->whatsapp)
                <div class="flex items-center text-sm text-gray-600">
                    <i class="fab fa-whatsapp mr-2 text-green-500"></i>
                    <span>{{ $store->whatsapp }}</span>
                </div>
            @endif
        </div>
        
        <div class="flex items-center justify-end">
            <div class="flex items-center space-x-2 text-green-800">
                <span class="text-sm font-medium">Kunjungi Toko</span>
                <i class="fas fa-arrow-right text-xs"></i>
            </div>
        </div>
    </div>
</a>