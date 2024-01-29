<?php

namespace App\Http\Controllers;

use App\Models\Pendaftar;
use App\Http\Requests\StorePendaftarRequest;
use App\Http\Requests\UpdatePendaftarRequest;
use App\Models\Beasiswa;
use App\Models\Semester;
use Illuminate\Http\Request;

class PendaftarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('daftar', [
            'semesters' => Semester::all(),
            'beasiswas' => Beasiswa::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validasi data
        $validated = $request->validate([
            'nama' => 'required',
            'nim' => 'required | numeric | digits_between:8,8',
            'nomor_hp' => 'required | numeric | digits_between:10,13',
            'email' => 'required | email | email:rfc,dns',
            'semester_id' => 'required',
            'beasiswa_id' => 'required',
            'ipk' => 'required',
            'berkas' => 'file | mimes:pdf,jpg,png',
        ]);

        // mengubah status menjadi "menunggu"
        $validated['status'] = 'Belum diverifikasi';

        // menyimpan berkas ke storage
        $validated['berkas'] = $request->file('berkas')->storeAs('berkas', time() . '.' . $request->file('berkas')->extension());

        // menyimpan data ke database
        Pendaftar::create($validated);

        // mengembalikan view daftar
        return redirect()->route('hasil')->with('success', 'Data berhasil disimpan');
    }
}
