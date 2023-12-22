<?php

namespace Database\Seeders;

use App\Models\Ustadz;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ManageDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Ustadz::create([
            'tgl_gabung'    => Carbon::now(),
            'satminkal'      => 'Pondok',
            'nama'          => 'Syukri Yanto',
            'gelar_belakang'=> 'S.Kom',
            'jabatan_utama' => 'IT',
            'nik'           => '1099292929292929',
            'tempat_lahir'  => 'Gunung Malintang',
            'tgl_lahir'     => Carbon::now(),
            'jenkel'        => 'l',
            'no_hp'         => '081266583335',
        ]);
    }
}
