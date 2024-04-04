<?php

namespace App\API;

use App\Helpers\profile;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;

class KartuApi
{
    private static $path = '/kartu';

    public static function get()
    {
        return Http::withToken(profile::getToken())->get(env('API_URL', '') . self::$path)->json();
    }

    public static function find($id)
    {
        return Http::withToken(profile::getToken())->get(env('API_URL', '') . self::$path . '/' . $id)->json();
    }

    public static function store($input, $ext_icon = null, $ext_front, $ext_back)
    {
        if ($ext_icon != null) {
            return Http::withToken(profile::getToken())
                ->attach('icon', file_get_contents($input['icon']), 'icon_card_' . $input['title'] . '_' . Carbon::now()->format('dmYhis') . '.' . $ext_icon)
                ->attach('front', file_get_contents($input['depan']), 'bg_front_card_' . $input['title'] . '_' . Carbon::now()->format('dmYhis') . '.' . $ext_front)
                ->attach('back', file_get_contents($input['belakang']), 'bg_back_card_' . $input['title'] . '_' . Carbon::now()->format('dmYhis') . '.' . $ext_back)
                ->post(env('API_URL', '') . self::$path . '/store', [
                    'icon'          => $input['icon'],
                    'title'         => $input['title'],
                    'profile'       => $input['profile'],
                    'categories'    => $input['kategori'],
                    'orientation'   => $input['orientation'],
                    'nip'           => $input['nip'],
                    'nrp'           => $input['nrp'],
                    'golongan'      => $input['golongan'],
                    'jabatan'       => $input['jabatan'],
                ])->json();
        } else {
            return Http::withToken(profile::getToken())
                ->attach('front', file_get_contents($input['depan']), 'bg_front_card_' . $input['title'] . '_' . Carbon::now()->format('dmYhis') . '.' . $ext_front)
                ->attach('back', file_get_contents($input['belakang']), 'bg_back_card_' . $input['title'] . '_' . Carbon::now()->format('dmYhis') . '.' . $ext_back)
                ->post(env('API_URL', '') . self::$path . '/store', [
                    'icon'          => $input['icon'],
                    'title'         => $input['title'],
                    'profile'       => $input['profile'],
                    'categories'    => $input['kategori'],
                    'orientation'   => $input['orientation'],
                    'nip'           => $input['nip'],
                    'nrp'           => $input['nrp'],
                    'golongan'      => $input['golongan'],
                    'jabatan'       => $input['jabatan'],
                ])->json();
        }
    }

    public static function update($id, $input, $ext_icon)
    {
        if ($ext_icon != null) {
            return Http::withToken(profile::getToken())
                ->attach('icon', file_get_contents($input['icon']), 'icon_card_' . $input['title'] . '_' . Carbon::now()->format('dmYhis') . '.' . $ext_icon)
                ->post(env('API_URL', '') . self::$path . '/' . $id . '/update', [
                    'title'         => $input['title'],
                    'profile'       => $input['profile'],
                    'categories'    => $input['kategori'],
                    'orientation'   => $input['orientation'],
                    'nip'           => $input['nip'],
                    'nrp'           => $input['nrp'],
                    'golongan'      => $input['golongan'],
                    'jabatan'       => $input['jabatan'],
                ])->json();
        } else {
            return Http::withToken(profile::getToken())
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
                ])->json();
        }
    }

    public static function destroy($id)
    {
        return Http::withToken(profile::getToken())->get(env('API_URL', '') . self::$path . '/' . $id . '/destroy')->json();
    }

    public static function findByTitle($title)
    {
        return http::withToken(profile::getToken())->post(env('API_URL', '') . self::$path . '/title', [
            'title' => $title
        ])->json();
    }
}
