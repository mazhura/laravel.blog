<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Post;
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
        view()->composer('home.layouts.sidebar',function ($view){
            $view->with('popular_posts',Post::orderBy('views','desc')->limit(3)->get());

            $view->with('cats',Category::withCount('posts')->orderBy('posts_count','desc')->get());
        });
    }
}
