<?php

namespace App\API;

use App\Helpers\profile;
use Illuminate\Support\Facades\Http;

class RoleApi
{
    private static $path = '/roles';

    public static function get()
    {
        try {
            return Http::withToken(profile::getToken())->get(env('API_URL', '') . self::$path)->json();
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public static function find($role)
    {
        try {
            return Http::withToken(profile::getToken())->get(env('API_URL', '') . self::$path . '/find', ['role' => $role])->json();
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public static function update($id, $input)
    {
        try {
            $arr = [];
            $icon = [
                in_array('user', $input) ? 'user' : null,
                in_array('satker', $input) ? 'book-open' : null,
                in_array('pegawai', $input) ? 'laugh' : null,
                in_array('pengajuan', $input) ? 'pen' : null,
                in_array('kartu', $input) ? 'credit-card' : null,
                in_array('akses', $input) ? 'key-square' : null,
                in_array('log', $input) ? 'history' : null,
                in_array('faq', $input) ? 'help-circle' : null,
                in_array('rating', $input) ? 'star' : null,
            ];
            $title = [
                in_array('user', $input) ? 'Manajemen User' : null,
                in_array('satker', $input) ? 'Satuan Kerja' : null,
                in_array('pegawai', $input) ? 'Pegawai' : null,
                in_array('pengajuan', $input) ? 'Pengajuan' : null,
                in_array('kartu', $input) ? 'Kartu' : null,
                in_array('akses', $input) ? 'Hak Akses' : null,
                in_array('log', $input) ? 'Log Aktivitas' : null,
                in_array('faq', $input) ? 'FAQ' : null,
                in_array('rating', $input) ? 'Ulasan' : null,
            ];
            $icons = array_filter($icon);
            $titles = array_filter($title);
            $array_icon = [];
            $array_title = [];
            foreach ($icons as $i) {
                $array_icon[] = $i;
            }

            foreach ($titles as $i) {
                $array_title[] = $i;
            }
            if ($input) {
                $arr = [
                    'route' => json_encode($input),
                    'icon'  => json_encode($array_icon),
                    'title' => json_encode($array_title)
                ];
            } else {
                $arr = [
                    'route' => null,
                    'icon'  => null,
                    'title' => null
                ];
            }
            return Http::withToken(profile::getToken())->post(env('API_URL', '') . self::$path . '/' . $id . '/update', $arr)->json();
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
}
