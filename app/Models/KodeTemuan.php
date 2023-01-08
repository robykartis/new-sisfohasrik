<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KodeTemuan extends Model
{
    protected $table = 'kode_temuan';
    protected $primaryKey = 'id';
    // public $timestamps = false;
    protected $fillable = ['kode', 'nama', 'create_by'];
}
