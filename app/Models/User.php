<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function artisan()
    {
        return $this->hasOne(Artisan::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function isArtisan()
    {
        return $this->role === 'artisan';
    }

    public function isAdmin()
    {
        return $this->role === 'admin';
    }
}