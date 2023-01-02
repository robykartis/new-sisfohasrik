<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    protected $table = ['access_logs'];
    protected $fillable = ['email', 'level', 'log_time'];
}
