<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repos\AuthorRepo;
use App\Interfaces\AuthorInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //Register interfaces
        $this->app->bind('App\Interfaces\AuthorInterface',  'App\Repos\AuthorRepo' );
        $this->app->bind('App\Interfaces\ArticleInterface',  'App\Repos\ArticleRepo' );
    }
}
