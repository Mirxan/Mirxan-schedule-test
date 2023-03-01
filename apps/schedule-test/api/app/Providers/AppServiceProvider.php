<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Mixins\ResponseFactoryMixin;
use Illuminate\Routing\ResponseFactory;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        ResponseFactory::mixin(new ResponseFactoryMixin());
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
