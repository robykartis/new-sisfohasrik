<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KlarifikasiObrik extends Model
{
    protected $table = 'klarifikasi_obrik';
    protected $primaryKey = 'id';
    // public $timestamps = false;
    protected $fillable = ['kode', 'nama', 'create_by'];
}
