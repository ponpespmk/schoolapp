<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSantriRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'nama_santri'       => 'required',
            'nisn'              => 'required|unique:santris,nisn,' . $this->route('id') . ',id|max:10',
            'nism'              => 'required|unique:santris,nism,' . $this->route('id') . ',id|max:18',
            'nik'               => 'required|unique:santris,nik,' . $this->route('id') . ',id|max:16',
            'no_kk'             => 'required',
            'jenkel'            => 'required',
            'tempat_lahir'      => 'required',
            'tgl_lahir'         => 'required',
            'jml_saudara'       => 'required',
            'anak_ke'           => 'required',
            'kwn'               => 'required',
            'cita_cita'         => 'required',
            'hobi'              => 'required',
            'keb_khusus'        => 'required',
            'keb_disabilitas'   => 'required',
            'tgl_aktif'         => 'required',
            'apddk_diikuti'     => 'required',
            'kategori'          => 'required',
            'bansos'            => 'required',
            'pip'               => 'required',
            'status_keaktifan'  => 'required',
        ];
    }
}
