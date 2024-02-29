<?php

namespace App\Http\Controllers;

use App\API\UserApi;
use App\Helpers\profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AccessController extends Controller
{
    public function index()
    {
        try {
            $route1 = 'user';
            $route2 = 'search';
            $title = 'Manajemen Akses';
            $profile = profile::getUser();
            if ($profile['roles'] == 'superadmin') {
                $data = UserApi::get()['data'];
                return view('hak_akses.index', compact('title', 'data', 'profile', 'route1', 'route2'));
            }
            return redirect()->route('dashboard');
        } catch (\Throwable $th) {
            Session::forget('user');
            return redirect()->route('logout');
        }
    }
}
