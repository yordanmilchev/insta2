<?php

namespace App\Providers;

use App\Components\AuthUserComponent;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;


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
        View::composer(['admin.layout', 'admin.profile', 'admin.settings', 'admin.news', 'admin.test'], function ($view) {
            $view->with('LoggedUserInfo', AuthUserComponent::getAuthUser());
        });
    }
}
