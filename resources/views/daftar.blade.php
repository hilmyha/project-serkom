<x-app-layout>
  <x-slot name="header">
    <div class="h-[400px] grid place-items-center overflow-hidden">
      <img class="brightness-50 w-full h-full object-cover" src="{{ asset('img/hero_4.jpg') }}" alt="hero image">
      <div class="container absolute">
        <h1 class="mb-3 text-5xl font-semibold tracking-tight text-white ">
          Daftar Beasiswa
        </h1>
      </div>
    </div>
  </x-slot>
  
  <div class="p-4 container">
    <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg">
        <div class="mb-4 p-6 overflow-hidden rounded bg-white">
            {{-- action untuk save data daftar beasiswa menggunakan method post dan multipart/form-data untuk upload file berkas --}}
            <form action="{{ route('daftar.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                    <div class="grid gap-4">
                        <div class="w-full">
                            <x-input-label for="nama" value="Nama" />
                            <x-text-input id="nama" name="nama" type="text" value="{{ old('nama') }}" placeholder="Name" />
                            {{-- tampilkan error untuk request yang terkait --}}
                            <x-input-error :messages="$errors->get('nama')" class="mt-2" />
                        </div>
                        <div class="w-full">
                            <x-input-label for="nim" value="NIM" />
                            <x-text-input id="nim" name="nim" type="number" value="{{ old('nim') }}" placeholder="NIM"/>
                            {{-- tampilkan error untuk request yang terkait --}}
                            <x-input-error :messages="$errors->get('nim')" class="mt-2" />
                        </div>
                        <div class="lg:col-span-2">
                            <x-input-label for="nomor_hp" value="Nomor HP" />
                            <x-text-input id="nomor_hp" name="nomor_hp" type="number" value="{{ old('nomor_hp') }}" placeholder="Nomor HP" />
                            {{-- tampilkan error untuk request yang terkait --}}
                            <x-input-error :messages="$errors->get('nomor_hp')" class="mt-2" />
                        </div>
                        <div class="lg:col-span-2">
                            <x-input-label for="email" value="Email" />
                            <x-text-input id="email" name="email" type="email" value="{{ old('email') }}" placeholder="Email" />
                            {{-- tampilkan error untuk request yang terkait --}}
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>
                        <div class="w-full">
                            <x-input-label for="semester" value="Semester" />
                            <select name="semester_id" id="semester" class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" onchange="updateIPK()">
                                @foreach ($semesters as $semester)
                                    @if (old('semester_id') == $semester->id)
                                        <option value="{{ $semester->id }}" selected>{{ $semester->name }}</option>
                                    @else
                                        <option value="{{ $semester->id }}">{{ $semester->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                            {{-- tampilkan error untuk request yang terkait --}}
                            <x-input-error :messages="$errors->get('semester')" class="mt-2" />
                        </div>
                        <div class="w-full">
                            <x-input-label for="ipk" value="IPK" />
                            <x-text-input id="ipk" name="ipk" type="text" value="{{ old('ipk') }}" placeholder="IPK" autocomplete="ipk" readonly />
                            {{-- tampilkan error untuk request yang terkait --}}
                            <x-input-error :messages="$errors->get('ipk')" class="mt-2" />
                        </div>
                        <div class="w-full">
                            <x-input-label for="beasiswa" value="Beasiswa" />
                            <select name="beasiswa_id" id="beasiswa" class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                                @foreach ($beasiswas as $beasiswa)
                                    @if (old('beasiswa_id') == $beasiswa->id)
                                        <option value="{{ $beasiswa->id }}" selected>{{ $beasiswa->name }}</option>
                                    @else
                                        <option value="{{ $beasiswa->id }}">{{ $beasiswa->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                            {{-- tampilkan error untuk request yang terkait --}}
                            <x-input-error :messages="$errors->get('beasiswa')" class="mt-2" />
                        </div>
                        <div class="w-full">
                            <x-input-label for="berkas" value="Berkas" />
                            {{-- <x-text-input id="berkas" name="berkas" type="file" value="{{ old('berkas') }}" placeholder="berkas" /> --}}
                            <input class="w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50" name="berkas" value="{{ old('berkas') }}" id="berkas" type="file">
                            {{-- tampilkan error untuk request yang terkait --}}
                            <x-input-error :messages="$errors->get('berkas')" class="mt-2" />
                            <span class="text-xs text-red-500">* File harus berupa pdf, jpg, png</span>
                        </div>
                    </div>
                    <x-primary-button type="submit" class="mt-4 mr-2 transition">Submit</x-primary-button>
                    <x-secondary-button onclick="resetForm()" class="mt-4 transition">Cancel</x-secondary-button>
            </form>

        </div>
    </div>
  </div>
  <script>
    // hapus semua input dengan tombol cancel
    function resetForm() {
        // menghapus semua input
        document.getElementById("nama").value = "";
        document.getElementById("nim").value = "";
        document.getElementById("nomor_hp").value = "";
        document.getElementById("email").value = "";
        document.getElementById("ipk").value = "";
        document.getElementById("berkas").value = "";
    }


    // menampilkan ipk
    var ipkValues = <?php echo json_encode($semesters); ?>;
    // menampilkan ipk
    function updateIPK() {
        // mendapatkan id semester
        var selectedSemesterId = document.getElementById("semester").value;
        // mencari semester yang dipilih
        var selectedSemester = ipkValues.find(function(semester) {
            // mencocokan id semester
            return semester.id == selectedSemesterId;
        });
        // menampilkan ipk
        if (selectedSemester) {
            // menampilkan ipk
            document.getElementById("ipk").value = selectedSemester.ipk;
            // menampilkan beasiswa
            if (selectedSemester.ipk < 3) {
                // menampilkan beasiswa
                document.getElementById("beasiswa").disabled = true;
                const berkas = document.getElementById("berkas");
                berkas.disabled = true;
                berkas.addClassName = "hidden";
                // menampilkan tombol
                const tombol = document.getElementById("simpan");
                tombol.disabled = true;
            }else{
                // menampilkan beasiswa
                const beasiswa = document.getElementById("beasiswa");
                beasiswa.disabled = false;
                beasiswa.focus();
                // menampilkan berkas
                const berkas = document.getElementById("berkas");
                berkas.disabled = false;
                // menampilkan tombol
                const tombol = document.getElementById("simpan");
                tombol.disabled = false;
            }
        }
    }
  </script>
</x-app-layout>