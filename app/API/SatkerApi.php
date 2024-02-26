<?php


namespace App\API;

use App\Helpers\log;
use App\Helpers\profile;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Session;
use Jenssegers\Agent\Agent;

class SatkerApi
{
    private $path = '/satker';

    public static function get()
    {
        try {
            $data = Http::withToken(profile::getToken())->get(env('API_URL', '') . self::$path);
            return $data->json()['data'];
        } catch (\Throwable $th) {
            Session::forget('user');
            return redirect()->route('logout');
        }
    }
}
