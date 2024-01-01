<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Ustadz;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UstadzController extends Controller
{
    public function UstadzList(){

        $ustadzs = Ustadz::latest()->get();
        return view('backend.ustadz.all_ustadz',compact('ustadzs'));
    }// End Method

    public function AddUstadz(){

        return view('backend.ustadz.add_ustadz');
    }// End Method

    public function StoreUstadz(Request $request){
        // Validasi
        $request->validate([
            'nama_ustadz'   => 'required|max:64',
            'jenkel'        => 'required',
            'tempat_lahir'  => 'required',
            'tgl_lahir'     => 'required',
            'nik'           => 'required|unique:ustadzs,nik|max:16',
            'tgl_gabung'    => 'required|max:64',
            'satminkal'     => 'required',
            'jabatan_utama' => 'required',
            'no_hp'         => 'required',
        ]);

        // Simpan Data
        $ustadz = Ustadz::create([
            'nama_ustadz'   => $request->nama_ustadz,
            'jenkel'        => $request->jenkel,
            'tempat_lahir'  => $request->tempat_lahir,
            'tgl_lahir'     => $request->tgl_lahir,
            'nik'           => $request->nik,
            'tgl_gabung'    => $request->tgl_gabung,
            'satminkal'     => $request->satminkal,
            'jabatan_utama' => $request->jabatan_utama,
            'no_hp'         => $request->no_hp,
        ]);

        // Contoh penetapan nilai $redirectType
        $redirectType = $request->input('redirectType', 'all');

        // Menambahkan notifikasi SweetAlert
        Session::flash('swal', [
            'type'    => 'success',
            'message' => 'Data Ustad/Ustadzah berhasil disimpan!',
            'options' => [
                'confirmButtonText' => 'Lengkapi Sekarang',
                'cancelButtonText'  => 'Lengkapi Nanti',
                'reverseButtons'    => true,
            ],
        ]);

        // Menambahkan notifikasi Toastr
        Session::flash('message', [
            'type'      => 'success',
            'message'   => 'Data Ustad/Ustadzah berhasil disimpan!',
        ]);


        // Redirect sesuai pilihan
        if ($redirectType === 'edit') {
            return redirect()->route('edit.ustadz', ['id' => $ustadz->id]);
        } else {
            return redirect()->route('all.ustadz');
        }

    }// End Method

    public function EditUstadz($id){
        // Mengecek apakah $id kosong atau tidak
        if (empty($id)) {
            // Jalankan A karena $id kosong
            // Ambil data terakhir dari model
            $latestData = Ustadz::latest()->first();
            $ustadzs = Ustadz::findOrFail($latestData->id);
            return view('backend.ustadz.edit_ustadz',compact('ustadzs'));
        } else {
            // Jalankan B karena $id tidak kosong
            $ustadzs = Ustadz::findOrFail($id);
            return view('backend.ustadz.edit_ustadz',compact('ustadzs'));
        }

    }// End Method

    public function UpdateUstadz(Request $request){

        $ustz = $request->id;
        $data = [];

        // Get the current pas_foto value
        $oldPasFoto = Ustadz::findOrFail($ustz)->value('pas_foto');

        if ($request->file('pas_foto')) {
            $file = $request->file('pas_foto');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/images_ustadz/photo'), $filename);
            $data['pas_foto'] = $filename;

            // Delete the old file if it exists
            if ($oldPasFoto && file_exists(public_path('upload/images_ustadz/photo') . '/' . $oldPasFoto)) {
                unlink(public_path('upload/images_ustadz/photo') . '/' . $oldPasFoto);
            }
        }

        Ustadz::findOrFail($ustz)->update([

            'gelar_depan'           => $request->gelar_depan,
            'nama_ustadz'           => $request->nama_ustadz,
            'gelar_belakang'        => $request->gelar_belakan,
            'status_kepegawaian'    => $request->status_kepegawaian,
            'nik'                   => $request->nik,
            'nip'                   => $request->nip,
            'nipppk'                => $request->nipppk,
            'npk'                   => $request->npk,
            'nuptk'                 => $request->nuptk,
            'no_hp'                 => $request->no_hp,
            'email'                 => $request->email,
            'npwp'                  => $request->npwp,
            'jenkel'                => $request->jenkel,
            'tempat_lahir'          => $request->tempat_lahir,
            'tgl_lahir'             => $request->tgl_lahir,
            'gol_darah'             => $request->gol_darah,
            'pddk_terakhir'         => $request->pddk_terakhir,
            'prodi'                 => $request->prodi,
            'tgl_ijazah'            => $request->tgl_ijazah,
            'status_perkawinan'     => $request->status_perkawinan,
            'nama_suami_istri'      => $request->nama_suami_istri,
            'jml_anak'              => $request->jml_anak,
            'pas_foto'              => $data['pas_foto'] ?? null, // menggunakan null coalescing operator untuk mengatasi Undefined variable $data
        ]);

        $notification = array(
            'message'       => 'Data Diri Ustadz/Ustadzah berhasil di Update!',
            'alert-type'    => 'success'
        );

        return redirect()->back()->with($notification);

    }// End Method

    public function DeleteUstadz($id){

        Ustadz::findOrFail($id)->delete();

        $notification = array(
            'message'       => 'Data Ustadz berhasil di Hapus!',
            'alert-type'    => 'success'
        );

        return redirect()->back()->with($notification);

    }// End Method

}
