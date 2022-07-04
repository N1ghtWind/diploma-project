<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        Blade::if('admin', function () {
            return User::find(auth()?->user()?->id)?->is_admin();
        });

        Blade::if('user', function () {
            if (auth()?->user()?->userable === null) return true;
        });

        Blade::if('carrier', function () {
            return User::find(auth()?->user()?->id)?->is_carrier();
        });

        Blade::if('company', function () {
            return  User::find(auth()?->user()?->id)?->is_company();
        });
    }
}
