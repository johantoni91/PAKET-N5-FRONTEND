<?php

namespace App\Providers;

use App\API\RoleApi;
use App\Helpers\profile;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
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
        View::composer('*', function ($view) {
            $view->with('profile', [
                'profile' => request()->routeIs('login') ? '' : profile::getUser(),
                'routes'  => request()->routeIs('login') ? '' : json_decode(RoleApi::find(profile::getUser()['roles'])['route'], true),
                'icons'   => request()->routeIs('login') ? '' : json_decode(RoleApi::find(profile::getUser()['roles'])['icon'], true),
                'titles'  => request()->routeIs('login') ? '' : json_decode(RoleApi::find(profile::getUser()['roles'])['title'], true)
            ]);
        });
    }
}
