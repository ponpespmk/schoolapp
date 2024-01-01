<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateSantriRequest;
use App\Models\Santri;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SantriController extends Controller
{
    public function SantriList(){

        // Mengambil data santri dengan relasi asrama dan rombels
        $santris = Santri::with(['asrama', 'rombel'])->get();

        // Mengirim data ke view
        return view('backend.santri.all_santri', compact('santris'));

    }// End Method

    public function StoreSantri(Request $request){
        // Validasi Data
        $request->validate([
            'apddk_diikuti' => 'required',
            'nisn'          => 'required|unique:santris,nisn|max:10',
            'nama_santri'   => 'required|max:64',
            'jenkel'        => 'required',
            'tempat_lahir'  => 'required',
            'tgl_lahir'     => 'required',
            'kategori'      => 'required',
            'tgl_aktif'     => 'required',
        ], [
            // ... Cuastom untuk pesan error pada <span>
            'apddk_diikuti'         => 'aktifitas pendidikan wajib diisi.',
            'nisn.required'         => 'nisn wajib diisi.', 'nisn.unique' => 'nisn sudah terdaftar.', 'nisn.max' => 'nisn max 10 karakter.',
            'nama_santri.required'  => 'nama santri wajib diisi.', 'nama_santri.max' => 'nama max 64 karakter.',
            'jenkel'                => 'jenis kelamin wajib diisi.',
            'tempat_lahir'          => 'tempat lahir wajib diisi.',
            'tgl_lahir'             => 'tgl. lahir wajib diisi.',
            'kategori'              => 'kategori wajib diisi.',
            'tgl_aktif'             => 'tgl. aktif wajib diisi.',
        ]);

        // Simpan data ke DB
        $santri = Santri::create([
            'apddk_diikuti' => $request->apddk_diikuti,
            'nisn'          => $request->nisn,
            'nama_santri'   => $request->nama_santri,
            'jenkel'        => $request->jenkel,
            'tempat_lahir'  => $request->tempat_lahir,
            'tgl_lahir'     => $request->tgl_lahir,
            'kategori'      => $request->kategori,
            'tgl_aktif'     => $request->tgl_aktif,
            // 'tgl_lahir'  => Carbon::createFromFormat('dd/mm/yyyy', $request->tgl_lahir)->format('Y-m-d'),

        ]);

        // Contoh penetapan nilai $redirectType
        $redirectType = $request->input('redirectType', 'all');

        // Menambahkan notifikasi SweetAlert
        Session::flash('swal', [
            'type'    => 'success',
            'message' => 'Data Santri berhasil disimpan!',
            'options' => [
                'confirmButtonText' => 'Lengkapi Sekarang',
                'cancelButtonText'  => 'Lengkapi Nanti',
                'reverseButtons'    => true,
            ],
        ]);

        // Menambahkan notifikasi Toastr
        Session::flash('message', [
            'type'      => 'success',
            'message'   => 'Data Santri berhasil disimpan!',
        ]);


        // Redirect sesuai pilihan
        if ($redirectType === 'edit') {
            return redirect()->route('edit.santri', ['id' => $santri->id]);
        } else {
            return redirect()->route('all.santri');
        }

    }// End Method

    public function EditSantri($id){
        // Handling Jika User menekan Tombol "Lengkapi Sekarang" pada SweetAlert maka halaman akan diarahkan ke edit_santri dengan membawa $id yang terakhir

        // Mengecek apakah $id kosong atau tidak
        if (empty($id)) {
            // Jalankan A karena $id kosong
            // Ambil data terakhir dari model
            $latestData = Santri::latest()->first();
            $santris = Santri::findOrFail($latestData->id);
            return view('backend.santri.edit_santri',compact('santris'));
        } else {
            // Jalankan B karena $id tidak kosong
            $santris = Santri::findOrFail($id);
            return view('backend.santri.edit_santri',compact('santris'));
        }

    }// End Method

    public function UpdateSantri(UpdateSantriRequest  $request)
    {
        $id = $request->id;
        $santri = Santri::find($request->id);
        // $santri = Santri::find($this->route('santri'));
        // $santri = Santri::find($id);

        if ($request->file('pas_foto')) {
            $file = $request->file('pas_foto');
            @unlink(public_path('upload/images_santri/foto/' . $santri->pas_foto));
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/images_santri/foto'), $filename);
            $santri['pas_foto'] = $filename;
        }

        // Validasi Menggunakan UpdateSantriRequest

        // Simpan data ke DB
        Santri::findOrFail($id)->update([
            'pas_foto'          => $santri['pas_foto'], // atau $request->pas_foto tergantung cara Anda mengaksesnya
            'nama_santri'       => $request->nama_santri,
            'nisn'              => $request->nisn,
            'nism'              => $request->nism,
            'nik'               => $request->nik,
            'no_kk'             => $request->no_kk,
            'no_kip'            => $request->no_kip,
            'jenkel'            => $request->jenkel,
            'tempat_lahir'      => $request->tempat_lahir,
            'tgl_lahir'         => $request->tgl_lahir,
            'jml_saudara'       => $request->jml_saudara,
            'anak_ke'           => $request->anak_ke,
            'kwn'               => $request->kwn,
            'cita_cita'         => $request->cita_cita,
            'hobi'              => $request->hobi,
            'keb_khusus'        => $request->keb_khusus,
            'keb_disabilitas'   => $request->keb_disabilitas,
            'no_hp'             => $request->no_hp,
            'email'             => $request->email,
            'tgl_aktif'         => $request->tgl_aktif,
            'apddk_diikuti'     => $request->apddk_diikuti,
            'kategori'          => $request->kategori,
            'bansos'            => $request->bansos,
            'pip'               => $request->pip,
            'status_keaktifan'  => $request->status_keaktifan,
            'tgl_nonaktif'      => $request->tgl_nonaktif,
            'tgl_lulus'         => $request->tgl_lulus,
            'tgl_mutasi'        => $request->tgl_mutasi,
            'alasan_nadanm'     => $request->alasan_nadanm,
        ]);

        // Menambahkan notifikasi Toastr
        Session::flash('message', [
            'type'      => 'success',
            'message'   => 'Data Santri berhasil Update!',
        ]);

        return redirect()->back();
    }// End Method


    public function DeleteSantri($id){

        Santri::findOrFail($id)->delete();

        // Menambahkan notifikasi Toastr
        Session::flash('message', [
            'type'      => 'success',
            'message'   => 'Data Santri berhasil DIHAPUS!',
        ]);
        return redirect()->back();

    }
}

