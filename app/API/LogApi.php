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

    public static function search($category, $search)
    {
        try {
            $response = Http::withToken(profile::getToken())->get(env('API_URL', 'http://localhost:8001/api') . '/log/search', [
                'category'  => $category,
                'search'    => $search
            ]);
            return $response;
        } catch (\Throwable $th) {
            return  ['error' => $th];
        }
    }
}
