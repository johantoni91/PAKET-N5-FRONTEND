<?php

namespace App\Helpers;

use App\API\RoleApi;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;

class profile
{
    public static function getUser()
    {
        try {
            $sesi = Session::get('user')['user'];
            if (!$sesi) {
                return redirect()->route('logout');
            }
            return $sesi;
        } catch (\Throwable $th) {
            Alert::error('Error', 'Server sedang bermasalah');
            return view('errors.500');
        }
    }

    public static function getToken()
    {
        $sesi = Session::get('user')['token']['token'];
        if (!$sesi) {
            return redirect()->route('logout');
        }
        return $sesi;
    }

    public static function access()
    {
        $access = json_decode(RoleApi::find(profile::getUser()['roles'])['route'], true);
        if (!(in_array('user', $access))) {
            return view('errors.404');
        } elseif (!(in_array('log', $access))) {
            return view('errors.404');
        } elseif (!(in_array('satker', $access))) {
            return view('errors.404');
        } elseif (!(in_array('pegawai', $access))) {
            return view('errors.404');
        } elseif (!(in_array('akses', $access))) {
            return view('errors.404');
        } elseif (!(in_array('pengajuan', $access))) {
            return view('errors.404');
        } elseif (!(in_array('layout.kartu', $access))) {
            return view('errors.404');
        } elseif (!(in_array('monitor.kartu', $access))) {
            return view('errors.404');
        } elseif (!(in_array('perangkat', $access))) {
            return view('errors.404');
        } elseif (!(in_array('faq', $access))) {
            return view('errors.404');
        } elseif (!(in_array('rating', $access))) {
            return view('errors.404');
        }
    }
}
