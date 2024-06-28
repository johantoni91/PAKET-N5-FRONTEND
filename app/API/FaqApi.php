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

    public static function store($input, $image, $image_name = null)
    {
        try {
            if ($image_name == null) {
                return Http::withToken(Session::get('data')['token'])->post(env('API_URL', '') . self::$url . '/store', $input)->json();
            }
            return Http::withToken(Session::get('data')['token'])->attach('image', file_get_contents($image), $image_name)->post(env('API_URL', '') . self::$url . '/store', $input)->json();
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public static function update($id, $input, $image, $image_name = null)
    {
        try {
            if ($image_name == null) {
                return Http::withToken(Session::get('data')['token'])->post(env('API_URL', '') . self::$url . '/' . $id . '/update', $input)->json();
            }
            return Http::withToken(Session::get('data')['token'])->attach('image', file_get_contents($image), $image_name)->post(env('API_URL', '') . self::$url . '/' . $id . '/update', $input)->json();
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public static function destroy($id)
    {
        return Http::withToken(Session::get('data')['token'])->get(env('API_URL', '') . self::$url . '/' . $id . '/destroy');
    }
}
