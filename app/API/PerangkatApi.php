<?php

namespace App\API;

use Illuminate\Support\Facades\Http;

class PerangkatApi
{
    public static function alatPost($url, $request = null)
    {
        return Http::withToken(session('data')['token'])->post($url, $request)->json();
    }

    public static function alatGet($url, $request = null)
    {
        return Http::withToken(session('data')['token'])->get($url, $request)->json();
    }

    public static function status()
    {
        return Http::withToken(session('data')['token'])->get(env('API_URL', '') . '/perangkat/status')->json()['data'];
    }
}
