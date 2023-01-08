<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Obrik extends Model
{
    protected $table = 'obrik';
    protected $primaryKey = 'id';
    protected $fillable = [
        'tahun', 'klarifikasi', 'kode', 'induk', 'nama', 'created_by'
    ];
}
