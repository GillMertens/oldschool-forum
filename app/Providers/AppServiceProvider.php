<?php

namespace App\Providers;

use App\Models\Tag;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Models\Category;

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
        // Using a closure based composer...
        View::composer('*', function ($view) {
            $categories = Category::all(); // Fetch categories from the database
            $tags = Tag::all(); // Fetch tags from the database
            $view->with(['categories' => $categories, 'tags' => $tags]); // Pass categories and tags to all views
        });
    }
}
