<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

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
        Schema::defaultStringLength(191); // Cela permet de contourner l'erreur  SQLSTATE[42000]: Syntax error or access violation: 1071 La clé est trop longue.
        // Longueur maximale: 1000 (SQL: alter table `users` add unique `users_email_unique`(`email`)) lors de la migration
    }
}
