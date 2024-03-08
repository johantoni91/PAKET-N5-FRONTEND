<?php

namespace App\API;

use App\Helpers\profile;
use Illuminate\Support\Facades\Http;

class RoleApi
{
    public static function get()
    {
        try {
            return Http::withToken(profile::getToken())->get(env('API_URL', '') . '/roles')->json();
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
}
