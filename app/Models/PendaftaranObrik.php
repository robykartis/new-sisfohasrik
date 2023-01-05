<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PendaftaranObrik extends Model
{
    use HasFactory;

    protected $table = 'pendaftaran_obriks';

    public function pendaftaran_obriks()
    {
        return $this->hasMany(PendaftaranObrik::class);
    }
    public function hasil_lhps()
    {
        return $this->hasMany(HasilLhp::class);
    }
}
