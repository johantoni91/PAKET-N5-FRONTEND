<?php

namespace App\API;

use App\Helpers\log;
use App\Helpers\profile;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class LogApi
{
    public static function get()
    {
        try {
            $data = Http::withToken(Session::get('data')['token'])->get(env('API_URL', '') . '/log');
            return $data->json()['data'];
        } catch (\Throwable $th) {
            Session::forget('user');
            return redirect()->route('logout');
        }
    }

    public static function getColumn($column)
    {
        try {
            return Http::withToken(Session::get('data')['token'])->get(env('API_URL', '') . '/log/column', [
                'column'    => $column
            ])->json()['data'];
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    // public static function insert($input)
    // {
    //     $result = log::insert();
    //     $result['log_detail'] = $input;
    //     return Http::withToken(profile)
    // }
}
