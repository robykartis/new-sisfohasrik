<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penyebab extends Model
{
    protected $table = 'sebab';
    protected $fillable = [
        'id_temuan',
        'no_sebab',
        'uraian_sebab',
        'kode_sebab',
        'created_by',
        'created_by_id',
        'updated_by',
        'updated_by_id'
    ];
}
