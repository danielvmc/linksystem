<?php

namespace App\Providers;

use App\Quote;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        \Schema::defaultStringLength(191);
        view()->composer('layouts.nav', function ($view) {
            $view->with('quote', Quote::orderByRaw('RAND()')->get()['0']);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
