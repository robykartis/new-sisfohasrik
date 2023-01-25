<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penarikansnd extends Model
{
    protected $table = 'penarikan_kerugian';
    protected $fillable = [
        'id_temuan',
        'jns_kerugian',
        'tgl_penarikan',
        'jml_penarikan_neg',
        'jml_penarikan_drh',
        'keterangan',
        'created_by',
        'created_by_id',
        'updated_by',
        'updated_by_id'
    ];
}
