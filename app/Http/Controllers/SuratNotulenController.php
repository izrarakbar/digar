<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SuratNotulen;
use App\Http\Requests\SuratNotulenRequest;


class SuratNotulenController extends Controller
{
    public function store(SuratNotulenRequest $request)
    {
        // Buat instance dari model SuratSe
        $suratNotulen = new SuratNotulen();
        $suratNotulen->nomor_surat = $request->nomor_surat;
        $suratNotulen->judul = $request->judul;
        $suratNotulen->pembuat_dokumen = $request->pembuat_dokumen;
        $suratNotulen->tanggal_surat = $request->tanggal_surat;
        $suratNotulen->ringkasan = $request->ringkasan;
        $suratNotulen->status = $request->status;

        // Cek apakah ada file yang di-upload
        if ($request->hasFile('file')) {
            $file = $request->file('file');  // Ambil file
            $fileName = time() . '_' . $file->getClientOriginalName();  // Nama file
            $filePath = $file->storeAs('uploads', $fileName, 'public'); // Simpan file

            // Simpan path file ke database
            $suratNotulen->file = '/storage/' . $filePath;
        }

        $suratNotulen->save();  // Simpan data ke database

        return redirect()->back()->with('success', 'Surat berhasil disimpan.');
    }
}
