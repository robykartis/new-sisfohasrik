<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KlarifikasiObrik extends Model
{
    use HasFactory;
    protected $table = 'klarifikasi_obriks';
    protected $fillable = [
        'kode_obrik',
        'name_obrik',
    ];

    public function klarifikasi_obrik()
    {
        return $this->belongsTo(KlarifikasiObrik::class);
    }
}
