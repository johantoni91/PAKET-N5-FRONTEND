<?php

use App\API\RoleApi;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class helper
{
    public static function starterPack(): array
    {
        if (session('data')['roles'] == 'superadmin') {
            $theme = [
                'sidebar' => 'bg-gradient-to-b from-lime-300 via-green-500 to-green-900 dark:from-yellow-300 dark:via-yellow-500 dark:to-black text-black dark:text-white',
                'bubble' => 'bg-gradient-to-br from-blue-500 to-blue-200 shadow shadow-blue-300 rounded-lg dark:bg-gradient-to-br dark:from-slate-500 dark:to-slate-200 dark:shadow-white',
                'button' => 'p-2 rounded-lg bg-gradient-to-br from-green-500 to-black hover:text-white dark:from-white dark:to-yellow-500 dark:hover:text-black dark:text-white'
            ];
        } elseif (session('data')['roles'] == 'admin') {
            $theme = [
                'sidebar' => 'bg-gradient-to-b from-slate-400 via-lime-400 to-green-700 dark:bg-gradient-to-b dark:from-black dark:via-lime-400 dark:to-yellow-500 text-black dark:text-white',
                'bubble' => 'bg-gradient-to-br from-blue-500 to-blue-200 shadow shadow-blue-300 rounded-lg dark:bg-gradient-to-br dark:from-slate-500 dark:to-slate-200 dark:shadow-white',
                'button' => 'p-2 rounded-lg bg-gradient-to-br from-green-500 to-black text-white dark:from-white dark:to-yellow-500 dark:text-black'
            ];
        } elseif (session('data')['roles'] == 'pegawai') {
            $theme = [
                'sidebar' => 'bg-gradient-to-b from-green-900 to-green-300 dark:from-white dark:via-yellow-500 dark:to-yellow-700 text-black',
                'bubble' => 'bg-gradient-to-br from-blue-500 to-blue-200 shadow shadow-blue-300 rounded-lg dark:bg-gradient-to-br dark:from-slate-500 dark:to-slate-200 dark:shadow-white',
                'button' => 'p-2 rounded-lg bg-gradient-to-br from-green-500 to-black text-white dark:from-white dark:to-yellow-500 dark:text-black'
            ];
        }

        if (session('data')['satker'] == "00") {
            $kode = '0';
        } elseif (preg_match('/^\d{2}$/', session('data')['satker']) && session('data')['satker'] != "00") {
            $kode = '1';
        } elseif (preg_match('/^\d{4}$/', session('data')['satker'])) {
            $kode = '2';
        } elseif (preg_match('/^\d{6}$/', session('data')['satker'])) {
            $kode = '3';
        }

        return [
            'profile'       => Session::get('data'),
            'kode'          => $kode,
            'routes'        => json_decode(RoleApi::find(Session::get('data')['roles'])['route'], true),
            'icons'         => json_decode(RoleApi::find(Session::get('data')['roles'])['icon'], true),
            'titles'        => json_decode(RoleApi::find(Session::get('data')['roles'])['title'], true),
            'tanda_tangan'  => Http::withToken(session('data')['token'])->get(env('API_URL', '') . '/signature' . '/' . session('data')['satker'])->json()['data'],
            'theme'         => $theme,
        ];
    }
}
