<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BidangTemuan extends Model
{
    use HasFactory;
    // protected $table = ['bidang_temuans'];
    protected $fillable = [
        'kode_bidang',
        'name_bidang',
    ];
}
