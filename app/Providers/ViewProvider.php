<?php

namespace App\Providers;

use App\Models\Category;
use Illuminate\Support\Facades\Schema;
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
        if (Schema::hasTable('categories')) {
            $categories = Category::query()->select(['id', 'name'])->get();
            View::share('categories', $categories);
        }
    }
}
