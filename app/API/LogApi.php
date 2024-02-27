<?php

namespace App\API;

use App\Helpers\profile;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class LogApi
{
    public static function getLog()
    {
        try {
            $data = Http::withToken(profile::getToken())->get(env('API_URL', '') . '/log');
            return $data->json()['data'];
        } catch (\Throwable $th) {
            Session::forget('user');
            return redirect()->route('logout');
        }
    }
}
