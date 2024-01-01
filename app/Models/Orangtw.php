<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orangtw extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function santri()
    {
        return $this->belongsToMany(Santri::class);
    }
}
