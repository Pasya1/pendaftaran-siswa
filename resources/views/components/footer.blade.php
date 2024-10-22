@props(['site' => null])
<div style="background-color: {{ $site->secondary_color ?? '#7A1CAC' }}"
    class="flex flex-col bg-[#431B58] w-full h-[10rem] justify-between items-center">
    <!-- Bagian Logo dan Nama Universitas -->
    <div class="flex items-center mt-5 mx-5">
        <img src="{{ Storage::url($site->logo) }}" class="w-12 h-12" alt="">
        <p class="ml-2 w-[10rem] text-white font-semibold">{{ $site->universitas }}</p>


        <!-- Bagian Ikon Media Sosial -->
        <div class="flex space-x-4 lg:ms-[60rem] mt-2">
            <!-- Twitter -->
            <a href="https://twitter.com" target="_blank" class="text-blue-500 hover:text-blue-700">
                <img src="{{ asset('img/X Logo.png') }}" class="w-[0.9rem]" alt="">
            </a>

            <!-- Instagram -->
            <a href="https://instagram.com" target="_blank" class="text-pink-500 hover:text-pink-700">
                <img src="{{ asset('img/Logo Instagram.png') }}" alt="">
            </a>

            <!-- YouTube -->
            <a href="https://youtube.com" target="_blank" class="text-red-500 hover:text-red-700">
                <img src="{{ asset('img/Logo YouTube.png') }}" alt="">
            </a>

            <!-- LinkedIn -->
            <a href="https://linkedin.com" target="_blank" class="text-blue-700 hover:text-blue-900">
                <img src="{{ asset('img/LinkedIn.png') }}" alt="">
            </a>
        </div>
    </div>
    <!-- Nama Universitas di Tengah Bawah -->
    <p class="text-white text-sm mt-2 mb-4">© 2024 {{ $site->universitas }}</p>
</div>
