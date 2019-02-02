<?php

namespace App\Providers;
use App\Custom\Helper;
use Illuminate\Support\ServiceProvider;

class HelpersProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        require_once app_path('Custom/Helpers.php');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('MyHelpSingle', function () {
            return new Helper();
        });

        $this->app->bind('MyHelpBind', function () {
            return new Helper();
        });
    }
}
