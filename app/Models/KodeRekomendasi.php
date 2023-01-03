<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KodeRekomendasi extends Model
{
    use HasFactory;
    protected $fillable = [
        'kode_rekomendasi',
        'name_rekomendasi',
    ];
}
