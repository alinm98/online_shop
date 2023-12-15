<?php

namespace App\Providers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Contracts\Pagination\Paginator;
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
        view()->composer(['Admin.*'], function ($view) {
            $view->with([
                'buy_count_adminPanel' => \App\Models\Order::query()->where('confirm',null)->count()
            ]);
        });

        view()->composer(['Client.*'], function ($view) {
            $view->with([
                'categories_parents' => (new \App\Models\Category)->getParents(),
                'categories' => Category::all(),
                'products' => Product::all() ,
                'brands' => Brand::all(),
                'random_products' => Product::inRandomOrder()->take(20)->get(),
                'top_buy_products' => Product::orderBy('buy_count', 'desc')->take(20)->get(),
            ]);
        });

        \Illuminate\Pagination\Paginator::useBootstrap();
    }
}
