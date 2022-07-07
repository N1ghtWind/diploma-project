<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Company extends Model implements HasMedia
{

    use InteractsWithMedia;
    use HasFactory;


    protected $fillable = [
        'name',
        'company_logo',
    ];


    public function user()
    {
        return $this->morphOne(User::class, 'userable');
    }

    public function attachment()
    {
        return $this->media();
    }

    public function url() {
        return Storage::url($this->company_logo);
    }
}
