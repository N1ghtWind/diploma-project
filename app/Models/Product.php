<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Product extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;
    protected $fillable = [
        'name',
        'description',
        'price',
        'quantity_unit',
    ];

    protected $casts = [
        'created_at' => 'datetime:Y.m.d H:i:s',
        'updated_at' => 'datetime:Y.m.d H:i:s',
    ];

    public function orders()
    {
        return $this->belongsToMany(Order::class);
    }




}
