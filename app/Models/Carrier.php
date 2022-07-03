<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Carrier extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = [
        'success_deliveries',
        'is_online',
        'location',
        'contact',
        'bio',
        'phone',
    ];

    public function user()
    {
        return $this->morphOne(User::class, 'userable');
    }

    public function active_deliveries() {
        return $this->hasMany(ActiveDelivery::class);
    }
}
