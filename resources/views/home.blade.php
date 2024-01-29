<x-app-layout>
  <x-slot name="header">
    <div class="h-[700px] grid place-items-center overflow-hidden">
      <img class="brightness-50 w-full h-full object-cover" src="{{ asset('img/hero_4.jpg') }}" alt="hero image">
      <div class="container absolute">
        <h1 class="mb-3 text-5xl font-semibold tracking-tight text-white ">
          Beasiswaku🎓
        </h1>
        <p class="mb-3 text-xl font-semibold tracking-tight text-white text-justify">
          Program beasiswa terbaik untuk mahasiswa Indonesia, dengan berbagai macam kategori beasiswa yang dapat dipilih sesuai dengan kebutuhan.
        </p>
        <x-tertiary-button href="{{ route('daftar') }}" class="px-8 py-3 mt-3">
          Daftar Sekarang
        </x-tertiary-button>
      </div>
    </div>
  </x-slot>
  <div class="container py-24">
    <h2 class="mb-8 text-5xl font-semibold tracking-tight text-gray-900">Program Beasiswa</h2>
    <div class="grid gap-6 lg:grid-cols-3">
      {{-- perulangan untuk data beasiswa dari database --}}
      @foreach ($beasiswas as $beasiswa)
        <div class="p-6 bg-white border border-gray-200 rounded-lg shadow">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-7 h-7 text-gray-500 mb-3">
            <path stroke-linecap="round" stroke-linejoin="round" d="M4.26 10.147a60.438 60.438 0 0 0-.491 6.347A48.62 48.62 0 0 1 12 20.904a48.62 48.62 0 0 1 8.232-4.41 60.46 60.46 0 0 0-.491-6.347m-15.482 0a50.636 50.636 0 0 0-2.658-.813A59.906 59.906 0 0 1 12 3.493a59.903 59.903 0 0 1 10.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.717 50.717 0 0 1 12 13.489a50.702 50.702 0 0 1 7.74-3.342M6.75 15a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Zm0 0v-3.675A55.378 55.378 0 0 1 12 8.443m-7.007 11.55A5.981 5.981 0 0 0 6.75 15.75v-1.5" />
          </svg>
          
          <a href="#">
              <h5 class="mb-2 text-2xl font-semibold tracking-tight text-gray-900">{{ $beasiswa->name }}</h5>
          </a>
          <p class="mb-4 font-normal text-gray-500">{{ $beasiswa->description }}</p>

          <p class="mb-2 font-semibold text-gray-500">Syarat mengambil beasiswa :</p>
          {{-- perulangan untuk array syarat dari data json --}}
          <ul class="mb-3 font-normal text-gray-500">
            @foreach (json_decode($beasiswa->syarat) as $syarat)
              <li>- {{ $syarat }}</li>
            @endforeach
          </ul>
        </div>
      @endforeach
    </div>
  </div>
</x-app-layout>