<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SuratKpts;
use App\Http\Requests\SuratKptsRequest;


class SuratKptsController extends Controller
{
    public function store(SuratKptsRequest $request)
    {
        // Buat instance dari model SuratSe
        $suratKpts = new SuratKpts();
        $suratKpts->nomor_surat = $request->nomor_surat;
        $suratKpts->judul = $request->judul;
        $suratKpts->pembuat_dokumen = $request->pembuat_dokumen;
        $suratKpts->tanggal_surat = $request->tanggal_surat;
        $suratKpts->ringkasan = $request->ringkasan;
        $suratKpts->status = $request->status;

        // Cek apakah ada file yang di-upload
        if ($request->hasFile('file')) {
            $file = $request->file('file');  // Ambil file
            $fileName = time() . '_' . $file->getClientOriginalName();  // Nama file
            $filePath = $file->storeAs('uploads', $fileName, 'public'); // Simpan file

            // Simpan path file ke database
            $suratKpts->file = '/storage/' . $filePath;
        }

        $suratKpts->save();  // Simpan data ke database

        return redirect()->back()->with('success', 'Surat berhasil disimpan.');
    }
}
