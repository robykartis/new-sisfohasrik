<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tindaklanjut extends Model
{
    protected $table = 'rekomendasi';
    protected $fillable = [
        'id_temuan',
        'status_tlhp',
        'tgl_tlhp',
        'kode_tlhp',
        'uraian_tlhp',
        'created_by',
        'created_by_id',
        'updated_by',
        'updated_by_id'
    ];
}
