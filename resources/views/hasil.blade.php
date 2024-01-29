<x-app-layout>
  <x-slot name="header">
    <div class="h-[400px] grid place-items-center overflow-hidden">
      <img class="brightness-50 w-full h-full object-cover" src="{{ asset('img/hero_4.jpg') }}" alt="hero image">
      <div class="container absolute">
        <h1 class="mb-3 text-5xl font-semibold tracking-tight text-white ">
          Hasil pendaftaran Beasiswa
        </h1>
      </div>
    </div>
  </x-slot>
  
  {{-- alert sucess --}}
  @if (session()->has('success'))
      <div id="alert-border" class="flex p-4 mb-4 text-green-800 border-t-4 border-green-300 bg-green-50" role="alert">
          <svg class="flex-shrink-0 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
          <div class="ml-3 text-sm font-medium">
              {{ session('success') }}
          </div>
          <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex h-8 w-8"  data-dismiss-target="#alert-border" aria-label="Close">
              <span class="sr-only">Dismiss</span>
              <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path  fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
          </button>
      </div>
  @endif
  <div class="relative container w-full overflow-x-auto mb-4">
    {{-- tabel hasil --}}
    <table class="w-full text-sm text-left text-gray-500">
        <thead class="text-xs text-gray-700 uppercase bg-gray-500">
            <tr class="text-white">
                <th scope="col" class="px-6 py-3">
                    Nama
                </th>
                <th scope="col" class="px-6 py-3">
                    NIM
                </th>
                <th scope="col" class="px-6 py-3">
                    IPK
                </th>
                <th scope="col" class="px-6 py-3">
                    Semester
                </th>
                <th scope="col" class="px-6 py-3">
                    Beasiswa
                </th>
                <th scope="col" class="px-6 py-3">
                    Status
                </th>
                <th scope="col" class="px-6 py-3">
                    Unduh berkas
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pendaftars as $pendaftar)
                <tr class="bg-white border-b">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                        {{ $pendaftar->nama }}
                    </th>
                    <td class="px-6 py-4">
                        {{ $pendaftar->nim }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $pendaftar->semester->ipk }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $pendaftar->semester->name }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $pendaftar->beasiswa->name }}
                    </td>
                    <td class="px-6 py-4">
                      <span class="text-sm py-1 px-3 lg:text-white lg:bg-yellow-300 rounded-full">{{ $pendaftar->status }}</span>
                    </td>
                    {{-- action unduh berkas --}}
                    <td class="px-6 py-4">
                      <a href="{{ url('/hasil/download', $pendaftar->id) }}" class="text-sm py-1 px-3 text-white bg-blue-500 hover:bg-blue-600 rounded-full">Download</a>
                    </td>
                    
                </tr>
            @endforeach
            
        </tbody>
    </table>
  </div>
</x-app-layout>