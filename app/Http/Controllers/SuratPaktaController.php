<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SuratPakta;
use App\Http\Requests\SuratPaktaRequest;


class SuratPaktaController extends Controller
{
    public function store(SuratPaktaRequest $request)
    {
        // Buat instance dari model SuratSe
        $suratPakta = new SuratPakta();
        $suratPakta->nomor_surat = $request->nomor_surat;
        $suratPakta->judul = $request->judul;
        $suratPakta->pembuat_dokumen = $request->pembuat_dokumen;
        $suratPakta->tanggal_surat = $request->tanggal_surat;
        $suratPakta->ringkasan = $request->ringkasan;
        $suratPakta->status = $request->status;

        // Cek apakah ada file yang di-upload
        if ($request->hasFile('file')) {
            $file = $request->file('file');  // Ambil file
            $fileName = time() . '_' . $file->getClientOriginalName();  // Nama file
            $filePath = $file->storeAs('uploads', $fileName, 'public'); // Simpan file

            // Simpan path file ke database
            $suratPakta->file = '/storage/' . $filePath;
        }

        $suratPakta->save();  // Simpan data ke database

        return redirect()->back()->with('success', 'Surat berhasil disimpan.');
    }
}
