<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActiveDelivery extends Model
{

    protected $fillable = [
        'order_id',
        'carrier_id',
        'delivery_status',
    ];

    use HasFactory;

    protected $casts = [
        'created_at' => 'date:Y-d-m H:i:s',
        'updated_at' => 'date:Y-d-m H:i:s',
    ];


    public function order() {
        return $this->belongsTo(Order::class);
    }

    public function carrier() {
        return $this->belongsTo(Carrier::class);
    }
}
