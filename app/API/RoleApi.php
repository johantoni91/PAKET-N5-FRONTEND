<?php

namespace App\API;

use App\Helpers\profile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class RoleApi
{
    private static $path = '/roles';

    public static function get()
    {
        try {
            return Http::withToken(Session::get('data')['token'])->get(env('API_URL', '') . self::$path)->json();
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public static function find($role)
    {
        try {
            return Http::withToken(Session::get('data')['token'])->get(env('API_URL', '') . self::$path . '/find', ['role' => $role])->json();
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public static function update($id, $input)
    {
        $icon = [
            in_array('user', $input) ? 'user' : null,
            in_array('satker', $input) ? 'book-open' : null,
            in_array('pegawai', $input) ? 'laugh' : null,
            in_array('integrasi', $input) ? 'workflow' : null,
            in_array('pengajuan', $input) ? 'pen' : null,
            in_array('monitor.kartu', $input) ? 'monitor' : null,
            in_array('layout.kartu', $input) ? 'credit-card' : null,
            in_array('smart', $input) ? 'fingerprint' : null,
            in_array('perangkat', $input) ? 'radio-receiver' : null,
            in_array('log', $input) ? 'history' : null,
            in_array('faq', $input) ? 'help-circle' : null,
            in_array('rating', $input) ? 'star' : null,
            in_array('assessment', $input) ? 'lock' : null,
            in_array('akses', $input) ? 'key-square' : null,
        ];
        $title = [
            in_array('user', $input) ? 'Pengguna' : null,
            in_array('satker', $input) ? 'Satuan Kerja' : null,
            in_array('pegawai', $input) ? 'Data Pegawai' : null,
            in_array('integrasi', $input) ? 'Integrasi Data Kepegawaian' : null,
            in_array('pengajuan', $input) ? 'Verifikasi' : null,
            in_array('monitor.kartu', $input) ? 'Monitoring' : null,
            in_array('layout.kartu', $input) ? 'Pengaturan Layout Kartu' : null,
            in_array('smart', $input) ? 'Smart Card Unique Personal Identity' : null,
            in_array('perangkat', $input) ? 'Management Perangkat' : null,
            in_array('log', $input) ? 'Log Aktivitas' : null,
            in_array('faq', $input) ? 'FAQ' : null,
            in_array('rating', $input) ? 'Ulasan' : null,
            in_array('assessment', $input) ? 'Assessment Security' : null,
            in_array('akses', $input) ? 'Hak Akses Aplikasi' : null,
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
        return Http::withToken(Session::get('data')['token'])->post(env('API_URL', '') . self::$path . '/' . $id . '/update', $arr)->json();
    }
}
