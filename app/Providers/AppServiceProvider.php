<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\TodoListItem;

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
        // Share $todoListItems with all views that use layouts.app
        View::composer('layouts.app', function ($view) {
            $todoListItems = TodoListItem::latest()->take(4)->get();
            $view->with('todoListItems', $todoListItems);
        });
    }
}

