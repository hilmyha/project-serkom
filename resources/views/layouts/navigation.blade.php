<?php 

// navigation route list dengan array
$navRouteList = [
    'home' => [
        'name' => 'Home',
        'route' => route('home'),
    ],
    'daftar' => [
        'name' => 'Daftar Beasiswa',
        'route' => route('daftar'),
    ],
    'hasil' => [
        'name' => 'Hasil',
        'route' => route('hasil'),
    ],
    'grafik' => [
        'name' => 'Grafik',
        'route' => route('grafik'),
    ],
];

?>


<nav class="navbar border-gray-200 fixed w-full z-20 top-0 left-0 py-6 shadow-lg">
  <div class="container flex flex-wrap items-center justify-between">
      <a href="{{ route('home') }}" class="flex items-center">
          <span class="self-center text-2xl font-extrabold whitespace-nowrap">Beasiswaku🎓</span>
      </a>
      <div class="flex items-center lg:order-2">
          <button data-collapse-toggle="mobile-menu-2" type="button" class="inline-flex items-center p-2 ml-1 text-sm text-gray-500 rounded-lg lg:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200" aria-controls="mobile-menu-2" aria-expanded="false">
              <span class="sr-only">Open main menu</span>
              <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
          </button>
      </div>
      <div class="hidden justify-between items-center w-full lg:flex lg:w-auto lg:order-2" id="mobile-menu-2">
          <ul class="flex flex-col mt-4 font-medium lg:flex-row lg:space-x-6 lg:mt-0 items-center">
            @foreach ($navRouteList as $navRoute)
                <li>
                    <x-nav-link href="{{ $navRoute['route'] }}" :active="request()->routeIs($navRoute['name'])">
                        {{ $navRoute['name'] }}
                    </x-nav-link>
                </li>
            @endforeach
          </ul>
      </div>
  </div>
</nav>