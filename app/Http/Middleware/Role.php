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
        $access = json_decode(RoleApi::find(profile::getUser()['roles'])['route'], true);
        dd(in_array('user', $access));
        // if (!(in_array('user', $access))) {
        //     return view('errors.404');
        // } elseif (!(in_array('log', $access))) {
        //     return view('errors.404');
        // } elseif (!(in_array('satker', $access))) {
        //     return view('errors.404');
        // } elseif (!(in_array('pegawai', $access))) {
        //     return view('errors.404');
        // } elseif (!(in_array('akses', $access))) {
        //     return view('errors.404');
        // } elseif (!(in_array('pengajuan', $access))) {
        //     return view('errors.404');
        // } elseif (!(in_array('layout.kartu', $access))) {
        //     return view('errors.404');
        // } elseif (!(in_array('monitor.kartu', $access))) {
        //     return view('errors.404');
        // } elseif (!(in_array('perangkat', $access))) {
        //     return view('errors.404');
        // } elseif (!(in_array('faq', $access))) {
        //     return view('errors.404');
        // } elseif (!(in_array('rating', $access))) {
        //     return view('errors.404');
        // } else {
        //     return $next($request);
        // }
    }
}
