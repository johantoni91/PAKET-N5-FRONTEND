<?php

namespace App\Providers;

use App\API\RoleApi;
use App\Helpers\profile;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use RealRashid\SweetAlert\Facades\Alert;

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
            try {
                if (!request()->routeIs('login')) {
                    $profile = profile::getUser();
                    if (!$profile) {
                        return redirect()->route('logout');
                    }
                    $view->with('profile', [
                        'profile' => $profile,
                        'routes'  => json_decode(RoleApi::find(profile::getUser()['roles'])['route'], true),
                        'icons'   => json_decode(RoleApi::find(profile::getUser()['roles'])['icon'], true),
                        'titles'  => json_decode(RoleApi::find(profile::getUser()['roles'])['title'], true)
                    ]);
                }
            } catch (\Throwable $th) {
                return view('errors.500');
            }
        });
    }
}
