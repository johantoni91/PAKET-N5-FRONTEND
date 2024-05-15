<?php

namespace App\Http\Controllers;

use App\API\PengajuanApi;
use App\API\UserApi;
use helper;

class DashboardController extends Controller
{
    function inbox()
    {
        try {
            return view('inbox.index', [
                'title'             => 'Inbox',
                'users'             => UserApi::get()->json()['data'],
                'starterPack'       => helper::starterPack()
            ]);
        } catch (\Throwable $th) {
            return redirect()->route('logout');
        }
    }
}
