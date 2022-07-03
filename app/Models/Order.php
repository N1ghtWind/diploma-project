<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $casts = [
        'created_at' => 'date:Y-m-d H:i:s',
        'updated_at' => 'date:Y-m-d H:i:s',
    ];

    protected $fillable = [
        'paid_amount',
        'intent_id',
        'user_id',
        'status',
        'receipt_url',
        'delivery_status',
    ];


    public function products()
    {
        return $this->belongsToMany(Product::class,'product_order')
        ->withPivot('price','quantity');
    }

    public function products_with_trashed() {
        return $this->belongsToMany(Product::class,'product_order')
        ->withPivot('price','quantity')
        ->withTrashed();
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
