<?php

namespace App\API;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class PengajuanApi
{
    private static $path = '/pengajuan';

    public static function get()
    {
        return Http::withToken(session('data')['token'])->get(env('API_URL', '') . '/pengajuan' . '/' . session('data')['satker'] . '/index')->json();
    }

    public static function store($input, $file, $file_name)
    {
        if ($file != '') {
            return Http::withToken(session('data')['token'])->attach('photo', file_get_contents($file), $file_name)->post(env('API_URL', '') . '/pengajuan/store', $input)->json();
        } else {
            return Http::withToken(session('data')['token'])->post(env('API_URL', '') . '/pengajuan/store', $input)->json();
        }
    }

    public static function find($id)
    {
        return Http::withToken(session('data')['token'])->get(env('API_URL', '') . self::$path . '/' . $id)->json();
    }

    public static function search($input)
    {
        return Http::withToken(session('data')['token'])->get(env('API_URL', '') . self::$path . '/search', $input)->json();
    }

    public static function approve($id)
    {
        $token = mt_rand();
        $generator = new \Picqer\Barcode\BarcodeGeneratorPNG();
        return Http::withToken(session('data')['token'])->post(
            env('API_URL', '') . self::$path . '/' . $id . '/approve' . '/' . session('data')['satker'],
            [
                'token'   => $token,
                'role'    => session('data')['roles'],
                'barcode' => 'data:image/png;base64,' . base64_encode($generator->getBarcode($token, $generator::TYPE_CODE_128)),
                'qrCode'  => 'data:image/png;base64,' . base64_encode(QrCode::format('png')->size(300)->merge(public_path('assets/images/favicon.ico'), 0.5, true)->generate($token))
            ]
        )->json();
    }

    public static function reject($id)
    {
        return Http::withToken(session('data')['token'])->get(env('API_URL', '') . self::$path . '/reject' . '/' . $id)->json();
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
