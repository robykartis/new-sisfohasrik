<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class KodeBidang extends Model
{
    protected $table = 'kode_bidang';
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
