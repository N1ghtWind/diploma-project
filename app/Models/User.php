<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use PHPUnit\Framework\MockObject\Verifiable;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class User extends Authenticatable implements MustVerifyEmail, HasMedia
{
    use HasApiTokens, HasFactory, Notifiable, InteractsWithMedia;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'email_verified_at',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'date:Y-d-m H:i:s',
        'created_at' => 'date:Y-d-m H:i:s',
        'updated_at' => 'date:Y-d-m H:i:s',

    ];

    public function userable()
    {
        return $this->morphTo();
    }

    public function medias() {
        return $this->getMedia();
    }

    public function is_company()
    {

        if ($this->userable === null) {
            return false;
        }

        return get_class($this->userable) === "App\Models\Company";
    }

    public function is_carrier()
    {
        if ($this->userable === null) {
            return false;
        }
        return get_class($this->userable) === "App\Models\Carrier";
    }

    public function is_admin()
    {

        if ($this->userable === null) {
            return false;
        }

        return get_class($this->userable) === "App\Models\Admin";
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function with_trashed_products() {
        return $this->hasMany(Product::class)->withTrashed();
    }

    public function address()
    {
        return $this->hasOne(Address::class);
    }
}
