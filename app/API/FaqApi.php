<?php

namespace App\API;

use App\Helpers\profile;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class FaqApi
{
    private static $url = '/faq';
    public static function get()
    {
        try {
            return Http::withToken(Session::get('data')['token'])->get(env('API_URL', '') . self::$url)->json();
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public static function store($input)
    {
        try {
            return Http::withToken(Session::get('data')['token'])->post(env('API_URL', '') . self::$url . '/store', $input)->json();
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public static function update($id, $input)
    {
        try {
            return Http::withToken(Session::get('data')['token'])->post(env('API_URL', '') . self::$url . '/' . $id . '/update', $input)->json();
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public static function destroy($id)
    {
        return Http::withToken(Session::get('data')['token'])->get(env('API_URL', '') . self::$url . '/' . $id . '/destroy');
    }
}
