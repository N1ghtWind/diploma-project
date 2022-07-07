<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Laravel\Scout\Searchable;
use Illuminate\Support\Str;


class Product extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia, Searchable, SoftDeletes;

    protected $fillable = [
        'name',
        'description',
        'price',
        'quantity_unit',
        'user_id',
        'category_id',
        'status',
    ];

    protected $casts = [
        'created_at' => 'date:Y-d-m H:i:s',
        'updated_at' => 'date:Y-d-m H:i:s',
    ];

    public function orders()
    {
        return $this->belongsToMany(Order::class, 'product_order');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function with_trashed()
    {
        return $this->withTrashed();
    }

    public function toSearchableArray()
    {
        return [
            'name' => $this->name,
            'description' => $this->description,
            'price' => $this->price,
            'quantity_unit' => $this->quantity_unit,
            'created_at' => Carbon::parse($this->created_at)->format('Y-m-d H:i:s'),
        ];
    }

    public function limit_description()
    {

        return Str::limit($this->description, 40);
    }




}
