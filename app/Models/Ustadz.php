<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ustadz extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function rombel()
    {
        return $this->hasOne(Rombel::class, 'ustadz_id');
    }

    public function asrama()
    {
        return $this->hasOne(Asrama::class, 'ustadz_id');
    }
}
