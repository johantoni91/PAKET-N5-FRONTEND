<?php

use App\API\RoleApi;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class helper
{
    public static function starterPack(): array
    {
        return [
            'profile'       => Session::get('data'),
            'routes'        => json_decode(RoleApi::find(Session::get('data')['roles'])['route'], true),
            'icons'         => json_decode(RoleApi::find(Session::get('data')['roles'])['icon'], true),
            'titles'        => json_decode(RoleApi::find(Session::get('data')['roles'])['title'], true),
            'tanda_tangan'  => Http::withToken(session('data')['token'])->get(env('API_URL', '') . '/signature' . '/' . session('data')['satker'])->json()['data'],
            'bg_light'      => (session('data')['roles'] == 'superadmin') ? 'from-sky-400 to-sky-900' : ((session('data')['roles'] == 'admin') ? 'from-amber-400 to-amber-900' :
                'from-rose-400 to-rose-700'),
            'bg_dark'       => (session('data')['roles'] == 'superadmin') ? 'dark:from-cyan-400 dark:to-cyan-900' : ((session('data')['roles'] == 'admin') ? 'dark:from-teal-400 dark:to-teal-900' :
                'dark:from-orange-600 dark:to-orange-900')
        ];
    }
}
