<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lhp extends Model
{
    protected $table = 'lhp';
    protected $fillable = ['no_lhp', 'tgl_lhp', 'tahun', 'klarifikasi', 'obrik', 'created_by'];
}
