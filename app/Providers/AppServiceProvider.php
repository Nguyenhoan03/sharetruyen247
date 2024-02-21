<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\basecategory;
use App\Repositories\basecategoryInterface;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(basecategoryInterface::class, basecategory::class);
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
