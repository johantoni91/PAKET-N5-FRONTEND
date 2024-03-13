<?php

namespace App\Http\Middleware;

use App\API\RoleApi;
use App\Helpers\profile;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
        if (in_array(request()->route($next($request)), json_decode(RoleApi::find(profile::getUser()['roles'])['route'], true))) {
            return $next($request);
        }
        return redirect(route('dashboard'));
    }
}
