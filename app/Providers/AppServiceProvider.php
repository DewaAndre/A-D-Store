<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\Admin;
use Illuminate\Auth\EloquentUserProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        // Menambahkan validasi custom untuk nomor telepon
        Validator::extend('phone', function ($attribute, $value, $parameters, $validator) {
            // Validasi nomor telepon dengan format 10 digit
            return preg_match('/^[0-9]{10}$/', $value);
        });

        // Menambahkan provider untuk guard admin
        Auth::provider('admins', function ($app, array $config) {
            // Provider untuk menggunakan model Admin
            return new EloquentUserProvider($app['hash'], Admin::class);
        });
    }
}

