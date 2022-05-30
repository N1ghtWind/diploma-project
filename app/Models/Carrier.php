<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carrier extends Model
{
    use HasFactory;

    protected $fillable = [
        'success_deliveries',
        'is_online',
        'location'
    ];

    public function user()
    {
        return $this->morphOne(User::class, 'userable');
    }
}
