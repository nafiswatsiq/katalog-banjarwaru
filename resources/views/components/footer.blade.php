<footer id="kontak" class="bg-gray-800 text-white py-16">
    <div class="container mx-auto lg:px-10 px-4">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            <!-- Company Info -->
            <div class="col-span-1 md:col-span-2">
                <h3 class="text-2xl font-bold mb-4">{{ config('app.name') }}</h3>
                <p class="text-gray-300 mb-6 leading-relaxed">
                    Menghadirkan keindahan dan fungsi melalui kerajinan bambu berkualitas tinggi. 
                    Setiap produk dibuat dengan penuh dedikasi oleh pengrajin lokal berpengalaman.
                </p>
                <div class="flex space-x-4">
                    <a href="#" class="bg-green-800 px-3 py-2.5 rounded-full hover:bg-green-700 transition duration-300 flex items-center">
                        <i class="fab fa-instagram text-xl"></i>
                    </a>
                    <a href="#" class="bg-green-800 px-3 py-2.5 rounded-full hover:bg-green-700 transition duration-300 flex items-center">
                        <i class="fab fa-facebook text-xl"></i>
                    </a>
                    <a href="#" class="bg-green-800 px-3 py-2.5 rounded-full hover:bg-green-700 transition duration-300 flex items-center">
                        <i class="fab fa-pinterest text-xl"></i>
                    </a>
                    <a href="#" class="bg-green-800 px-3 py-2.5 rounded-full hover:bg-green-700 transition duration-300 flex items-center">
                        <i class="fab fa-whatsapp text-xl"></i>
                    </a>
                </div>
            </div>
            
            <!-- Quick Links -->
            <div>
                <h4 class="text-xl font-semibold mb-4">Link Cepat</h4>
                <ul class="space-y-3">
                    <li><a href="#beranda" class="text-gray-300 hover:text-white transition duration-300">Beranda</a></li>
                    <li><a href="#koleksi" class="text-gray-300 hover:text-white transition duration-300">Koleksi Produk</a></li>
                    <li><a href="#tentang" class="text-gray-300 hover:text-white transition duration-300">Tentang Kami</a></li>
                    <li><a href="#kontak" class="text-gray-300 hover:text-white transition duration-300">Kontak</a></li>
                    <li><a href="#" class="text-gray-300 hover:text-white transition duration-300">FAQ</a></li>
                </ul>
            </div>
            
            <!-- Contact Info -->
            <div>
                <h4 class="text-xl font-semibold mb-4">Kontak Kami</h4>
                <div class="space-y-3">
                    <div class="flex items-start space-x-3">
                        <i class="fas fa-map-marker-alt text-green-400 mt-1"></i>
                        <p class="text-gray-300">Jl. Perintis Kemerdekaan No. 484<br>Banjarwaru, Kec Nusawungu, Cilacap</p>
                    </div>
                    <div class="flex items-center space-x-3">
                        <i class="fas fa-phone text-green-400"></i>
                        <p class="text-gray-300">+62 812-3456-7890</p>
                    </div>
                    <div class="flex items-center space-x-3">
                        <i class="fas fa-envelope text-green-400"></i>
                        <p class="text-gray-300">banjarwarupemdes@gmail.com</p>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Bottom Footer -->
        <div class="border-t border-gray-700 mt-12 pt-8 text-center">
            <p class="text-gray-300">
                © 2025 {{ config('app.name') }}. All Rights Reserved.
            </p>
        </div>
    </div>
</footer>