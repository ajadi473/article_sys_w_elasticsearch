<?php

namespace App\Providers;

use App\Repository\Eloquent\SearchRepository;
use App\Repository\Eloquent\EloquentSearchRepository;
use App\Articles;

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
        $this->app->bind(SearchRepository::class, EloquentSearchRepository::class);
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
