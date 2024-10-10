<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratSe extends Model
{
    use HasFactory;

    protected $fillable = [
        'nomor_surat',
        'judul',
        'pembuat_dokumen',
        'tanggal_surat',
        'ringkasan',
        'status',
        'file',
    ];

    public $timestamps = true; // Ubah menjadi true jika kamu ingin menggunakan created_at dan updated_at
}
