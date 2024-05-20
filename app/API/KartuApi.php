<?php

namespace App\API;

use Carbon\Carbon;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class KartuApi
{
    private static $path = '/kartu';

    public static function get()
    {
        return Http::withToken(Session::get('data')['token'])->get(env('API_URL', '') . self::$path)->json();
    }

    public static function getTitle()
    {
        return Http::withToken(session('data')['token'])->get(env('API_URL', '') . '/kartu/title')->json()['data'];
    }

    public static function find($id)
    {
        return Http::withToken(Session::get('data')['token'])->get(env('API_URL', '') . self::$path . '/' . $id)->json();
    }

    public static function store($input)
    {
        return Http::withToken(Session::get('data')['token'])
            ->post(env('API_URL', '') . self::$path . '/store', [
                'icon'          => $input['icon'],
                'title'         => $input['title'],
                'profile'       => $input['profile'],
                'categories'    => $input['kategori'],
                'orientation'   => $input['orientation'],
                'icon'          => $input['icon'],
                'front'         => $input['depan'],
                'back'          => $input['belakang'],
                'golongan'      => $input['golongan'],
                'jabatan'       => $input['jabatan'],
                'warna_teks'    => $input['warna_teks'],
                'nama'          => $input['nama'],
                'nip'           => $input['nip'],
                'nrp'           => $input['nrp'],
            ])->json();
    }

    public static function update($id, $input)
    {
        return Http::withToken(Session::get('data')['token'])
            ->post(env('API_URL', '') . self::$path . '/' . $id . '/update', [
                'icon'          => $input['icon'],
                'title'         => $input['title'],
                'profile'       => $input['profile'],
                'categories'    => $input['kategori'],
                'orientation'   => $input['orientation'],
                'nip'           => $input['nip'],
                'nrp'           => $input['nrp'],
                'golongan'      => $input['golongan'],
                'jabatan'       => $input['jabatan'],
                'warna_teks'    => $input['warna_teks']
            ])->json();
    }

    public static function destroy($id)
    {
        return Http::withToken(Session::get('data')['token'])->get(env('API_URL', '') . self::$path . '/' . $id . '/destroy')->json();
    }

    public static function findByTitle($title)
    {
        return http::withToken(Session::get('data')['token'])->post(env('API_URL', '') . self::$path . '/title', [
            'title' => $title
        ])->json();
    }
}
