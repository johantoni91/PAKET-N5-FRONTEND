<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Session;

class profile
{
    public static function getUser()
    {
        $sesi = Session::get('user')['user'];
        if (!$sesi) {
            return redirect()->route('logout');
        }
        return $sesi;
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
