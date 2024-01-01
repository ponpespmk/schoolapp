<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Rombel;
use App\Models\Tapel;
use App\Models\Ustadz;
use Illuminate\Http\Request;

class RombelController extends Controller
{
    public function RombelList(Request $request){

        $tapels = Tapel::all();
        $selectedTapel = $request->input('tapel'); // Ambil nilai terpilih dari request

        $query = Rombel::with(['ustadz'])
            ->join('tapels', 'rombels.tapel_id', '=', 'tapels.id')
            ->select('rombels.*', 'tapels.tahun', 'tapels.semester');

        if ($selectedTapel) {
            $query->where('tapels.id', $selectedTapel);
        }

        $rombels = $query->get();

        // Simpan nilai terpilih dalam sesi
        session(['selectedTapel' => $selectedTapel]);


        return view('backend.santri.all_rombel',compact('rombels', 'tapels', 'selectedTapel'));


    }// End Method

    public function AddRombel(){

        $ustadzs = Ustadz::all();
        $tapels = Tapel::all();


        return view('backend.santri.add_rombel', compact('ustadzs', 'tapels'));

    }// End Method

    public function StoreRombel(Request $request){

        // Validasi Data
        $request->validate([
            'ustadz_id'     => 'required|unique:rombels,ustadz_id',
            'tapel_id'      => 'required',
            'tingkat'       => 'required',
            'nama_rombel'   => 'required|unique:rombels,nama_rombel',
            'nama_ruangan'  => 'required|unique:rombels,nama_ruangan',
            'kurikulum'     => 'required',
        ], [
            // ... Cuastom untuk pesan error pada <span>
            'ustadz_id.required'     => 'Nama Ustadz/Ustadzah wajib diisi.',
            'ustadz_id.unique'       => 'Nama Ustadz/Ustadzah sudah memiliki Rombel.',
            'tapel_id.required'      => 'Tahun Pelajaran wajib diisi.',
            'tingkat.required'       => 'Tingkat Kelas wajib diisi.',
            'nama_rombel.required'   => 'Nama Rombel wajib diisi.',
            'nama_rombel.unique'     => 'Nama Rombel sudah digunakan.',
            'nama_ruangan.required'  => 'Nama Ruangan wajib diisi.',
            'nama_ruangan.unique'    => 'Nama Ruangan sudah digunakan.',
            'kurikulum.required'     => 'Kurikulum wajib diisi.',
        ]);

        // Buat data rombels
        Rombel::create([
            'ustadz_id'     => $request->ustadz_id,
            'tapel_id'      => $request->tapel_id,
            'tingkat'       => $request->tingkat,
            'nama_rombel'   => $request->nama_rombel,
            'nama_ruangan'  => $request->nama_ruangan,
            'kurikulum'     => $request->kurikulum,
        ]);

        $notification = [
            'message'     => 'Data Ustadz/Ustadzah Create Successfully',
            'alert-type'  => 'success'
        ];

        return redirect()->route('all.rombel')->with($notification);

    }// End Method

    public function EditRombel($id){

        $ustadzs = Ustadz::all();
        $tapels = Tapel::all();

        $rombels = Rombel::findOrFail($id);
        return view('backend.santri.edit_rombel',compact('ustadzs', 'tapels', 'rombels'));

    }// End Method

    public function UpdateRombel(Request $request, $id)
    {
        // Validasi formulir
        $request->validate([
            'ustadz_id'     => 'required',
            'tapel_id'      => 'required',
            'tingkat'       => 'required',
            'nama_rombel'   => 'required|unique:rombels,nama_rombel,' . $id,
            'nama_ruangan'  => 'required|unique:rombels,nama_ruangan,' . $id,
            'kurikulum'     => 'required',
        ], [
            // ... Custom pesan error untuk <span>
            'ustadz_id.required'     => 'Nama Ustadz/Ustadzah wajib diisi.',
            'ustadz_id.unique'       => 'Nama Ustadz/Ustadzah sudah memiliki Rombel.',
            'tapel_id.required'      => 'Tahun Pelajaran wajib diisi.',
            'tingkat.required'       => 'Tingkat Kelas wajib diisi.',
            'nama_rombel.required'   => 'Nama Rombel wajib diisi.',
            'nama_rombel.unique'     => 'Nama Rombel sudah digunakan.',
            'nama_ruangan.required'  => 'Nama Ruangan wajib diisi.',
            'nama_ruangan.unique'    => 'Nama Ruangan sudah digunakan.',
            'kurikulum.required'     => 'Kurikulum wajib diisi.',
        ]);

        // Temukan data Rombel yang akan diperbarui
        $rombel = Rombel::findOrFail($id);

        // Perbarui data Rombel
        $rombel->update([
            'ustadz_id'     => $request->ustadz_id,
            'tapel_id'      => $request->tapel_id,
            'tingkat'       => $request->tingkat,
            'nama_rombel'   => $request->nama_rombel,
            'nama_ruangan'  => $request->nama_ruangan,
            'kurikulum'     => $request->kurikulum,
        ]);

        $notification = [
            'message'     => 'Data Rombel Berhasil Diperbarui',
            'alert-type'  => 'success'
        ];

        return redirect()->route('all.rombel')->with($notification);
    }

    public function DeleteRombel($id){

        Rombel::findOrFail($id)->delete();

        $notification = array(
            'message'       => 'Data Rombel berhasil di Hapus!',
            'alert-type'    => 'success'
        );

        return redirect()->back()->with($notification);

    }// End Method

}
