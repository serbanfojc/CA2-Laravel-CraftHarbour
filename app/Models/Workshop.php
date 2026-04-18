<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Workshop extends Model
{
    protected $fillable = [
        'artisan_id',
        'title',
        'description',
        'date',
        'start_time',
        'duration_hours',
        'price',
        'max_capacity',
        'is_active',
    ];

    public function artisan()
    {
        return $this->belongsTo(Artisan::class);
    }
}