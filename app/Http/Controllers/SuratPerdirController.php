<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SuratPerdir;
use App\Http\Requests\SuratPerdirRequest; // Menggunakan request yang telah dibuat

class SuratPerdirController extends Controller
{
    public function store(SuratPerdirRequest $request)
    {
        // Buat instance dari model SuratSe
        $suratPerdir = new SuratPerdir();
        $suratPerdir->nomor_surat = $request->nomor_surat;
        $suratPerdir->judul = $request->judul;
        $suratPerdir->pembuat_dokumen = $request->pembuat_dokumen;
        $suratPerdir->tanggal_surat = $request->tanggal_surat;
        $suratPerdir->ringkasan = $request->ringkasan;
        $suratPerdir->status = $request->status;

        // Cek apakah ada file yang di-upload
        if ($request->hasFile('file')) {
            $file = $request->file('file');  // Ambil file
            $fileName = time() . '_' . $file->getClientOriginalName();  // Nama file
            $filePath = $file->storeAs('uploads', $fileName, 'public'); // Simpan file

            // Simpan path file ke database
            $suratPerdir->file = '/storage/' . $filePath;
        }

        $suratPerdir->save();  // Simpan data ke database

        return redirect()->back()->with('success', 'Surat berhasil disimpan.');
    }
}
