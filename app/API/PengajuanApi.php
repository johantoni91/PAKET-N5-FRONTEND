<?php

namespace App\API;

use App\Helpers\profile;
use Illuminate\Support\Facades\Http;

class PengajuanApi
{
    private static $path = '/pengajuan';

    public static function get()
    {
        return Http::withToken(profile::getToken())->get(env('API_URL', '') . '/pengajuan' . '/' . profile::getUser()['satker'] . '/index')->json();
    }

    public static function store($input, $file, $file_name)
    {
        if ($file != '') {
            return Http::withToken(profile::getToken())->attach('photo', file_get_contents($file), $file_name)->post(env('API_URL', '') . '/pengajuan/store', $input)->json();
        } else {
            return Http::withToken(profile::getToken())->post(env('API_URL', '') . '/pengajuan/store', $input)->json();
        }
    }

    public static function find($id)
    {
        return Http::withToken(profile::getToken())->get(env('API_URL', '') . self::$path . '/' . $id)->json();
    }

    public static function search($input)
    {
        return Http::withToken(profile::getToken())->get(env('API_URL', '') . self::$path . '/search', $input)->json();
    }

    public static function approve($id)
    {
        return Http::withToken(profile::getToken())->get(env('API_URL', '') . self::$path . '/' . $id . '/approve' . '/' . profile::getUser()['satker'])->json();
    }

    public static function reject($id)
    {
        return Http::withToken(profile::getToken())->get(env('API_URL', '') . self::$path . '/reject' . '/' . $id)->json();
    }
}
