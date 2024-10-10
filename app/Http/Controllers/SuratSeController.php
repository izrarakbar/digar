<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SuratSe;
use App\Http\Requests\SuratSeRequest; // Menggunakan request yang telah dibuat

class SuratSeController extends Controller
{
    public function store(SuratSeRequest $request)
    {
        // Buat instance dari model SuratSe
        $suratSe = new SuratSe();
        $suratSe->nomor_surat = $request->nomor_surat;
        $suratSe->judul = $request->judul;
        $suratSe->pembuat_dokumen = $request->pembuat_dokumen;
        $suratSe->tanggal_surat = $request->tanggal_surat;
        $suratSe->ringkasan = $request->ringkasan;
        $suratSe->status = $request->status;

        // Cek apakah ada file yang di-upload
        if ($request->hasFile('file')) {
            $file = $request->file('file');  // Ambil file
            $fileName = $file->getClientOriginalName();  // Nama file asli
            $filePath = $file->storeAs('uploads', $fileName, 'public'); // Simpan file dengan nama asli
    
            // Simpan path file ke database
            $suratSe->file = '/storage/' . $filePath;
        }

        $suratSe->save();  // Simpan data ke database

        return redirect()->back()->with('success', 'Surat berhasil disimpan.');
    }
}
