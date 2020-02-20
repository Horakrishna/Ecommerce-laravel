<?php

namespace App\Providers;
use View;
use App\Category;
use App\Product;
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
        //View::share('name','Akhy moni roy');
        // View::composer('*',function($view){
        //     $view->with('name','Akhy moni roy');
        // });

        View::composer('front-end.includes.header', function($view){
            $view->with('categories',Category::where('publication_status',1)->get());
        });

        View::composer('front-end.master', function($view){
            $view->with('categoryProducts',Product::where('publication_stutus',1)->get());
        });
    }
}
