<?php

namespace App\API;

use App\Helpers\profile;
use Illuminate\Support\Facades\Http;

class FaqApi
{
    private static $url = '/faq';
    public static function get()
    {
        try {
            return Http::withToken(profile::getToken())->get(env('API_URL', '') . self::$url)->json();
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
}
