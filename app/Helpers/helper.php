<?php

use App\API\RoleApi;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class helper
{
    public static function starterPack(): array
    {
        $bg_light = '';
        $bg_dark = '';
        if (session('data')['roles'] == 'superadmin') {
            $bg_light = 'from-sky-400 to-sky-900';
            $bg_dark = 'dark:from-cyan-400 dark:to-cyan-900';
        } elseif (session('data')['roles'] == 'admin') {
            $bg_light = 'from-fuchsia-400 to-fuchsia-900';
            $bg_dark = 'dark:from-teal-400 dark:to-teal-900';
        } elseif (session('data')['roles'] == 'pegawai') {
            $bg_light = 'from-green-400 to-yellow-500';
            $bg_dark = 'dark:from-orange-600 dark:to-orange-900';
        }
        return [
            'profile'       => Session::get('data'),
            'routes'        => json_decode(RoleApi::find(Session::get('data')['roles'])['route'], true),
            'icons'         => json_decode(RoleApi::find(Session::get('data')['roles'])['icon'], true),
            'titles'        => json_decode(RoleApi::find(Session::get('data')['roles'])['title'], true),
            'tanda_tangan'  => Http::withToken(session('data')['token'])->get(env('API_URL', '') . '/signature' . '/' . session('data')['satker'])->json()['data'],
            'bg_light'      => $bg_light,
            'bg_dark'       => $bg_dark
        ];
    }
}
