<?php

namespace App\Http\Controllers;

use App\Models\Pendaftar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HasilController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // menggambil data pendaftar yang belum dan sudah diverifikasi
        $pendaftars = Pendaftar::get();
        // mengembalikan view hasil
        return view('hasil', [
            'pendaftars' => $pendaftars,
        ]);
    }

    /**
     * Download the berkas of the specified resource.
     */
    public function download($id)
    {
        // mengambil data pendaftar berdasarkan id
        $berkas = Pendaftar::query()->findOrFail($id);
        // mengembalikan berkas
        return Storage::download($berkas->berkas);
    }
}   
