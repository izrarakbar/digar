<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SuratNotulenRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nomor_surat' => 'required|string',
            'judul' => 'required|string',
            'pembuat_dokumen' => 'required|string',
            'tanggal_surat' => 'required|date',
            'ringkasan' => 'required|string',
            'status' => 'required|string',
            'file' => 'required|file|mimes:pdf,doc,docx|max:2048',
        ];
    }
}
