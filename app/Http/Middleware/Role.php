<?php

namespace App\Http\Middleware;

use App\API\RoleApi;
use App\Helpers\profile;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        try {
            $access = json_decode(RoleApi::find(profile::getUser()['roles'])['route'], true);
            if (!in_array('akses', $access)) {
                return redirect()->route('error.404');
            }
            return $next($request);
        } catch (\Throwable $th) {
            Session::flush();
            Cookie::forget('token');
            return redirect()->route('login');
        }
    }
}
