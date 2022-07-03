<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Admin extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;


    protected $fillable = [
        'first_name',
        'last_name',
    ];

    public function user()
    {
        return $this->morphOne(User::class, 'userable');
    }
}
