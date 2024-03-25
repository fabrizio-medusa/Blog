<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
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
    public function boot(): void
    {
        Paginator::useBootstrapFour();

        if(Schema::hasTable('categories')){
            $categories = Category::all();
            View::share(['categories' => $categories]);
        }

        if(Schema::hasTable('tags')){
            $tags = Tag::all();
            View::share(['tags' => $tags]);
        }
    }
}
