<?php

namespace App\Providers;

use App\Custom\MainMenu;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(MainMenu $mainMenu)
    {
        //View::share('mainMenu', $mainMenu->buildMenu());
        View::share('title', 'Блог');
        View::composer('*', function ($view) use ($mainMenu) {
            return $view->with(['mainMenu' => $mainMenu->buildMenu()]);
            //return $view->with('mainMenu', $mainMenu->buildMenu());
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
