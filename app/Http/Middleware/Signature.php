<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Signature
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
            if (session('data')['roles'] != 'admin') {
                return redirect()->route('error.404');
            } else {
                return $next($request);
            }
        } catch (\Throwable $th) {
            return redirect()->route('logout');
        }
    }
}
