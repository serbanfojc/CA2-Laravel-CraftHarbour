<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Artisan extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'category',
        'bio',
        'town',
        'county',
        'email',
        'phone',
        'website',
        'cover_image',
        'is_approved',
        'avg_rating',
        'availability_status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function workshops()
    {
        return $this->hasMany(Workshop::class);
    }
}