<?php

namespace Database\Seeders;

use App\Models\Orangtw;
use App\Models\Santri;
use App\Models\Tapel;
use App\Models\Ustadz;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ManageDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Ustadz::create([
            'tgl_gabung'    => Carbon::now(),
            'satminkal'     => 'Pondok',
            'nama_ustadz'   => 'Syukri Yanto',
            'gelar_belakang'=> 'S.Kom',
            'jabatan_utama' => 'IT',
            'nik'           => '1099292929292929',
            'tempat_lahir'  => 'Gunung Malintang',
            'tgl_lahir'     => Carbon::now(),
            'jenkel'        => 'l',
            'no_hp'         => '081266583335',
            'alamat'        => 'Batas Kota Padang Pariaman',
            'pddk_terakhir' => 'D4',
            'ibu_kandung'   => 'Ilis',
            'no_sk'         => 'SAL/01/VI-000/2023',
        ]);

        Ustadz::create([
            'tgl_gabung'    => Carbon::now(),
            'satminkal'     => 'Pondok',
            'nama_ustadz'   => 'Aditya Prasetya',
            'gelar_belakang'=> 'S.Kom',
            'jabatan_utama' => 'Guru',
            'nik'           => '21232132132',
            'tempat_lahir'  => 'Padang',
            'tgl_lahir'     => Carbon::now(),
            'jenkel'        => 'l',
            'no_hp'         => '081266583336',
        ]);

        DB::table('tapels')->insert([
            //Super Admin & Admin
            ['tahun' => '2023/2024', 'semester' => 'Ganjil'],
            ['tahun' => '2023/2024', 'semester' => 'Genap'],
            ['tahun' => '2024/2025', 'semester' => 'Ganjil'],
            ['tahun' => '2024/2025', 'semester' => 'Genap'],
            ['tahun' => '2025/2026', 'semester' => 'Ganjil'],
            ['tahun' => '2025/2026', 'semester' => 'Genap'],
        ]);

        DB::table('rombels')->insert([
            //Super Admin & Admin
            ['nama_rombel' => 'VII-1-SAL', 'tingkat' => 7, 'ustadz_id' => 1, 'tapel_id' => 1, 'nama_ruangan' => 'VII-1-PA-SAL', 'kurikulum' => 'Kurikulum 2013'],
        ]);


        // Seed data ke tabel 'asramas'
        DB::table('asramas')->insert([
            'nama_asrama' => 'Asrama Mandiri 01',
            'ustadz_id' => 1, // Ganti dengan id ustadz yang sesuai
            'created_at' => now(),
            'updated_at' => now(),
            // Tambahkan field lainnya sesuai kebutuhan
        ]);

        // Data Orang Santri - Tua/Wali
        // Set tanggal lahir ke 10 Desember 2021
        $tanggal_lahir = Carbon::create(2021, 12, 10);
        $tanggal_aktif = Carbon::create(2023, 12, 10);


        $santri = Santri::create([
            'nama_santri'       => 'Muhammad Atarrazka',
            'nisn'              => '0123456789',
            'nism'              => '012345678911121314',
            'kwn'               => 'wni',
            'nik'               => '0123456789101112',
            'tempat_lahir'      => 'Padang',
            'tgl_lahir'         => $tanggal_lahir,
            'jenkel'            => 'l',
            'jml_saudara'       => 3,
            'anak_ke'           => 2,
            'cita_cita'         => 'agamawan',
            'no_hp'             => '+62 | 85263401619',
            'email'             => 'matarrazka@gmail.com',
            'hobi'              => 'membaca',
            'keb_khusus'        => 1,
            'keb_disabilitas'   => 1,
            'no_kip'            => '0000000012',
            'no_kk'             => '0009999888777665',
            'asrama_id'         => 1,
            'rombel_id'         => 1,
            'apddk_diikuti'     => 2,
            'kategori'          => 'mampu',
            'tgl_aktif'         => $tanggal_aktif
        ]);
        $orangtua1 = Orangtw::create(['nama_orangtw' => 'Orangtua Ayah', 'hub_dsantri' => 'ayah']);
        $orangtua2 = Orangtw::create(['nama_orangtw' => 'Orangtua Ibu', 'hub_dsantri' => 'ibu']);
        $orangtua3 = Orangtw::create(['nama_orangtw' => 'Orangtua Wali', 'hub_dsantri' => 'wali']);

        // Melakukan relasi many-to-many
        $santri->orangtw ()->attach([$orangtua1->id, $orangtua2->id, $orangtua3->id]);


    }
}
