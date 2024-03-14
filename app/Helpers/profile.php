<?php

namespace App\Helpers;

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
}
