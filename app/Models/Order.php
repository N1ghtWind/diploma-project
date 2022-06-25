<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'paid_amount',
        'intent_id',
        'user_id',
        'status',
        'receipt_url',

    ];


    public function products()
    {
        return $this->belongsToMany(Product::class,'product_order')
        ->withPivot('price','quantity');
    }
}
