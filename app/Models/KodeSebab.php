<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KodeSebab extends Model
{
    protected $table = 'kode_sebab';
    protected $primaryKey = 'id';
    // public $timestamps = false;
    protected $fillable = [
        'kode',
        'nama',
        'created_by',
        'created_by_id',
        'updated_by',
        'updated_by_id'
    ];
}
