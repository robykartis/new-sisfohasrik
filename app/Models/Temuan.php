<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Temuan extends Model
{
    protected $table = 'temuan';
    protected $fillable = [
        'id_temuan',
        'id_lhp',
        'bidang_temuan',
        'no_temuan',
        'judul_temuan',
        'urian_temuan',
        'kode_temuan',
        'jml_rnd_neg',
        'jml_rnd_drh',
        'jml_snd_neg',
        'jml_snd_drh',
        'keterangan',
        'created_by',
        'created_by_id',
        'updated_by',
        'updated_by_id'
    ];
}
