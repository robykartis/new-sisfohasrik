<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Intervention\Image\Facades\Image;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'image', //baru
        'email',
        'level', //baru'
        'password',
    ];

    // function image($real_size = false)
    // {
    //     $thumbnail = $real_size ? '' : 'small_';

    //     if ($this->image && file_exists(public_path('images/akun/' . $thumbnail . $this->image)))
    //         return asset('images/akun/' . $thumbnail  . $this->image);
    //     else
    //         return asset('images/no_image.png');
    // }

    function delete_image()
    {
        if ($this->image && file_exists(public_path('images/akun/' . $this->image)))
            unlink(public_path('images/akun/' . $this->image));
        if ($this->image && file_exists(public_path('images/akun/smal/small_' . $this->image)))
            unlink(public_path('images/akun/smal/small_' . $this->image));
    }
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected function type(): Attribute
    {
        return new Attribute(
            get: fn ($value) =>  ["admin", "operator", "readonly"][$value],
        );
    }
}
