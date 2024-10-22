@props(['site' => null])
<nav style="background-color: {{ $site->primary_color ?? '#AD49E1' }}; box-shadow: 0 0 30px {{ $site->secondary_color ?? '#C453FE' }};"
    class=" shadow-lg rounded-lg sm:mx-12 mt-1 sm:mt-5 z-50 relative " x-data="{ isOpen: false }">

    <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
        <div class="relative flex h-16 items-center justify-between">
            <!-- Mobile Menu Button -->
            <div class="absolute inset-y-0 left-0 flex items-center md:hidden">
                <button type="button" @click="isOpen = !isOpen"
                    class="relative inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white"
                    aria-controls="mobile-menu" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>

                    <svg :class="{ 'hidden': isOpen, 'block': !isOpen }" class="block h-6 w-6" fill="none"
                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>

                    <svg :class="{ 'block': isOpen, 'hidden': !isOpen }" class="hidden h-6 w-6" fill="none"
                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <!-- Logo for Mobile (Center) -->
            <div class="flex justify-start ms-20 flex-1 md:hidden">
                <img class="h-12 w-auto" src="{{ Storage::url($site->logo) }}" alt="Your Company">
                <span class="ml-2 w-1 text-sm text-white font-semibold">{{ $site->universitas }}</span>
            </div>

            <!-- Logo for Desktop (Left) -->
            <div class="flex flex-shrink-0 items-center hidden md:flex">
                <img class="h-12 w-auto" src="{{ Storage::url($site->logo) }}" alt="Your Company">
                <span class="ml-2 md:w-[9rem] text-white font-semibold">{{ $site->universitas }}</span>
            </div>

            <!-- Menu Items (Center) -->
            <div class="hidden md:ml-12 md:block flex justify-center items-center flex-1">
                <div class="flex space-x-14 justify-center">
                    <a href="/" class="nav-link text-gray-300 hover:text-white transition ease-in-out">Home</a>
                    <a href="/#product"
                        class="nav-link text-gray-300 hover:text-white transition ease-in-out">Product</a>
                    <a href="/#contact"
                        class="nav-link text-gray-300 hover:text-white transition ease-in-out">Contact</a>
                </div>
            </div>

            <!-- Button Daftar (Right) -->
            <div class="absolute inset-y-0 right-0 flex items-center pr-2 md:static md:inset-auto md:ml-6 md:pr-0">
                <a href="/pendaftaran" style="background-color: {{ $site->secondary_color ?? '#7A1CAC' }}"
                    class="relative flex  text-white font-[600] rounded-lg px-5 py-2 hover:opacity-85 transition ease-in-out">
                    Daftar
                </a>
            </div>

        </div>
    </div>

    <!-- Mobile Menu (Dropdown) -->
    <div x-show="isOpen" class="md:hidden w-full" id="mobile-menu">
        <div class="space-y-1 px-2 pb-3 pt-2">
            <a href="/" style="background-color: {{ $site->secondary_color ?? '#7A1CAC' }}"
                class="block  px-3 py-2 text-base font-medium text-white">Home</a>
            <a href="#product" style="background-color: {{ $site->secondary_color ?? '#7A1CAC' }}"
                class="block  px-3 py-2 text-base font-medium text-white">Product</a>
            <a href="#contact" style="background-color: {{ $site->secondary_color ?? '#7A1CAC' }}"
                class="block px-3 py-2 text-base font-medium text-white">Contact</a>
        </div>
    </div>
</nav>
