<nav x-data="{ open: false, dropdown: false }" class="bg-purple-100 shadow mb-4">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-20 items-center">
            <h1 class="text-3xl font-semibold">Jewely</h1>

            <div class="hidden lg:flex space-x-8 font-semibold">
                <a href="{{ route('admin.home') }}" class="text-inherit hover:text-purple-600 no-underline">Home</a>
                <a href="#" class="text-inherit hover:text-purple-600 no-underline">About Us</a>
                <div x-data="{ dropdownOpen: false }" class="relative">
                    <button @click="dropdownOpen = !dropdownOpen" class="text-inherit hover:text-purple-600 flex items-center">
                        Custom
                        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>
                    <div x-show="dropdownOpen" @click.away="dropdownOpen = false"
                         class="absolute mt-2 py-2 w-40 bg-white border rounded shadow-xl z-20 flex flex-col space-y-2 items-center"> 
                        <a href="{{ route('admin.slider') }}" class="text-green-500 px-4 py-2 hover:bg-gray-100 no-underline">Slider</a>
                        <a href="{{ route('admin.rate') }}" class="text-green-500 px-4 py-2 hover:bg-gray-100 no-underline">Jewely Rate</a>
                        <a href="{{ route('admin.showCase') }}" class="text-green-500 px-4 py-2 hover:bg-gray-100 no-underline">ShowCase</a>
                    </div>
                </div>
                <a href="{{ route('contact.index') }}" class="text-inherit hover:text-purple-600 no-underline">Contact Us</a>
            <div class="flex justify-end items-center space-x-4">
            <a href="{{ route('admin.logout') }}" class="inline-block bg-red-100 text-red-700 px-4 py-1 rounded-full font-semibold hover:bg-red-200 hover:text-red-900 transition no-underline">Logout</a>
        </div>
            </div>

            <div class="lg:hidden">
                <button @click="open = !open">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                         viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    {{-- Mobile Dropdown --}}
    <div x-show="open" class="lg:hidden bg-gray-100 px-4 pb-4 font-semibold space-y-2 flex flex-col items-center">
        <a href="{{ route('admin.home') }}" class="text-inherit hover:text-purple-600 no-underline">Home</a>
        <a href="#" class="text-inherit hover:text-purple-600 no-underline">About Us</a>
        <div class="relative" x-data="{ dropdown: false }">
            <button @click="dropdown = !dropdown" class="flex items-center hover:text-purple-600">
                Custom
                <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M19 9l-7 7-7-7"/>
                </svg>
            </button>
            <div x-show="dropdown" @click.away="dropdown = false"
                 class="absolute left-0 mt-2 py-2 w-40 bg-white border rounded shadow-xl z-20 flex flex-col space-y-2 items-center">
                <a href="{{ route('admin.slider') }}" class="text-green-500 px-4 py-2 hover:bg-gray-100 no-underline">Slider</a>
                <a href="{{ route('admin.rate') }}" class="text-green-500 px-4 py-2 hover:bg-gray-100 no-underline">Jewely Rate</a>
                <a href="{{ route('admin.showCase') }}" class="text-green-500 px-4 py-2 hover:bg-gray-100 no-underline">ShowCase</a>
            </div>
        </div>
        <a href="{{ route('contact.index') }}" class="text-inherit hover:text-purple-600 no-underline">Contact Us</a>
            <a href="{{ route('admin.logout') }}" class="inline-block bg-red-100 text-red-700 px-4 py-1 rounded-full font-semibold hover:bg-red-200 hover:text-red-900 transition no-underline">
                Logout
            </a>
    </div>

       
</nav>

<script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
