<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KodeTemuan extends Model
{
    use HasFactory;
    // protected $table = ['kode_temuans'];
    protected $fillable = [
        'kode',
        'name',
    ];
}
