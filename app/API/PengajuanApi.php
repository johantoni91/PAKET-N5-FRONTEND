<?php

namespace App\API;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class PengajuanApi
{
    private static $path = '/pengajuan';

    public static function get()
    {
        return Http::withToken(Session::get('data')['token'])->get(env('API_URL', '') . '/pengajuan' . '/' . Session::get('data')['satker'] . '/index')->json();
    }

    public static function store($input, $file, $file_name)
    {
        if ($file != '') {
            return Http::withToken(Session::get('data')['token'])->attach('photo', file_get_contents($file), $file_name)->post(env('API_URL', '') . '/pengajuan/store', $input)->json();
        } else {
            return Http::withToken(Session::get('data')['token'])->post(env('API_URL', '') . '/pengajuan/store', $input)->json();
        }
    }

    public static function find($id)
    {
        return Http::withToken(Session::get('data')['token'])->get(env('API_URL', '') . self::$path . '/' . $id)->json();
    }

    public static function search($input)
    {
        return Http::withToken(Session::get('data')['token'])->get(env('API_URL', '') . self::$path . '/search', $input)->json();
    }

    public static function approve($id)
    {
        return Http::withToken(Session::get('data')['token'])->get(env('API_URL', '') . self::$path . '/' . $id . '/approve' . '/' . Session::get('data')['satker'])->json();
    }

    public static function reject($id)
    {
        return Http::withToken(Session::get('data')['token'])->get(env('API_URL', '') . self::$path . '/reject' . '/' . $id)->json();
    }

    public static function status()
    {
        return Http::withToken(session('data')['token'])->get(env('API_URL', '') . '/pengajuan/status')->json()['data'];
    }

    public static function top()
    {
        return http::withToken(session('data')['token'])->get(env('API_URL', '') . '/pengajuan/top')->json();
    }
}
