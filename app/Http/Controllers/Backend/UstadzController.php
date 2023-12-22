<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Ustadz;
use Carbon\Carbon;
use Illuminate\Http\Request;

class UstadzController extends Controller
{
    public function UstadzList(){

        $ustadz = Ustadz::latest()->get();
        return view('backend.ustadz.all_ustadz',compact('ustadz'));
    }// End Method

    public function AddUstadz(){

        return view('backend.ustadz.add_ustadz');
    }// End Method

    public function StoreUstadz(Request $request){

        $ustadz = Ustadz::create([
            'satminkal'     => $request->satminkal,
            'jabatan_utama' => $request->jabatan_utama,
            'nama'          => $request->nama,
            'nik'           => $request->nik,
            'tempat_lahir'  => $request->tempat_lahir,
            'tgl_lahir'     => Carbon::createFromFormat('m/d/Y', $request->tgl_lahir)->format('Y-m-d'),
            'jenkel'        => $request->jenkel,
            'no_hp'         => $request->no_hp,
            'tgl_gabung'    => Carbon::createFromFormat('m/d/Y', $request->tgl_gabung)->format('Y-m-d'),
        ]);

        $notification = array(
            'message'       => 'Data Ustadz/Ustadzah Create Successfully',
            'alert-type'    => 'success'
        );

        return redirect()->route('edit.ustadz', ['id' => $ustadz->id])->with($notification);

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
            $file->move(public_path('upload/ustadz_image/photo'), $filename);
            $data['pas_foto'] = $filename;

            // Delete the old file if it exists
            if ($oldPasFoto && file_exists(public_path('upload/ustadz_image/photo') . '/' . $oldPasFoto)) {
                unlink(public_path('upload/ustadz_image/photo') . '/' . $oldPasFoto);
            }
        }

        Ustadz::findOrFail($ustz)->update([

            'gelar_depan'           => $request->gelar_depan,
            'nama'                  => $request->nama,
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
            'tgl_lahir'             => Carbon::createFromFormat('m/d/Y', $request->tgl_lahir)->format('Y-m-d'),
            'gol_darah'             => $request->gol_darah,
            'pddk_terakhir'         => $request->pddk_terakhir,
            'prodi'                 => $request->prodi,
            'tgl_ijazah'            => Carbon::createFromFormat('m/d/Y', $request->tgl_ijazah)->format('Y-m-d'),
            'ibu_kandung'           => $request->ibu_kandung,
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

}
