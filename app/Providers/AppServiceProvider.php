<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

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
        // Paginator::useBootstrap();
        
        // 以下、どちらか使用
        Paginator::useBootstrapFive();
        // Paginator::useBootstrapFour();
        
        // https化
        \URL::forceScheme('https');
        
        // ページネーション対応
        // $this->app['request']->server->set('HTTPS','on');
    }
}
