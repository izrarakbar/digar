<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SuratPemberitahuan;
use App\Http\Requests\SuratPemberitahuanRequest;

class SuratPemberitahuanController extends Controller
{
    public function store(SuratPemberitahuanRequest $request)
    {
        // Buat instance dari model SuratPemberitahuan
        $suratpemberitahuan = new Suratpemberitahuan();
        $suratpemberitahuan->nomor_surat = $request->nomor_surat;
        $suratpemberitahuan->judul = $request->judul;
        $suratpemberitahuan->pembuat_dokumen = $request->pembuat_dokumen;
        $suratpemberitahuan->tanggal_surat = $request->tanggal_surat;
        $suratpemberitahuan->ringkasan = $request->ringkasan;
        $suratpemberitahuan->status = $request->status;

        // Cek apakah ada file yang di-upload
        if ($request->hasFile('file')) {
            $file = $request->file('file');  // Ambil file
            $fileName = time() . '_' . $file->getClientOriginalName();  // Nama file
            $filePath = $file->storeAs('uploads', $fileName, 'public'); // Simpan file

            // Simpan path file ke databaPemberitahuan
            $suratpemberitahuan->file = '/storage/' . $filePath;
        }

        $suratpemberitahuan->save();  // Simpan data ke databaPemberitahuan

        return redirect()->back()->with('success', 'Surat berhasil disimpan.');
    }
}
