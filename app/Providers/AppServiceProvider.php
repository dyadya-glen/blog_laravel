<?php

namespace App\Providers;

use App\Custom\MainMenu;
use Illuminate\Support\Facades\Cache;
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
//        View::composer('parts.header', function ($view) use ($mainMenu) {
//            return $view->with(['mainMenu' => $mainMenu->buildMenu()]);
//        });



        View::composer('parts.header', function ($view) use ($mainMenu){
            $data = Cache::remember('menu', env('CACHE_TIME', 0), function () use ($mainMenu){
                return $mainMenu->buildMenu();
            });
            return $view->with(['mainMenu' => $data]);
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
