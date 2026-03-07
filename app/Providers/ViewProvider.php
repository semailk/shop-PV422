<?php

namespace App\Providers;

use App\Models\Category;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewProvider extends ServiceProvider
{

    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        $categories = Category::parent()->with('children')->get();

        View::composer('*', function ($view) use ($categories) {
            $view->with('categories', $categories);
        });
    }
}
