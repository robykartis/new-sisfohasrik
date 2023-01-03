<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KodeTlhp extends Model
{
    use HasFactory;
    protected $fillable = [
        'kode_tlhp',
        'name_tlhp',
    ];
}
