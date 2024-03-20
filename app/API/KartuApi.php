<?php

namespace App\API;

use App\Helpers\profile;
use Illuminate\Support\Facades\Http;

class KartuApi
{
    private static $path = '/kartu';

    public static function get()
    {
        return Http::withToken(profile::getToken())->get(env('API_URL', '') . self::$path)->json();
    }

    public static function store($title)
    {
        return Http::withToken(profile::getToken())->post(env('API_URL', '') . self::$path . '/store', [
            'title' => $title
        ])->json();
    }

    public static function update($id, $title)
    {
        return Http::withToken(profile::getToken())->post(env('API_URL', '') . self::$path . '/' . $id . '/update', ['title' => $title])->json();
    }

    public static function destroy($id)
    {
        return Http::withToken(profile::getToken())->get(env('API_URL', '') . self::$path . '/' . $id . '/destroy')->json();
    }
}
