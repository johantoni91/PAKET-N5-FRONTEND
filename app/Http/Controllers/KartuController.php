<?php

namespace App\Http\Controllers;

use App\Helpers\profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class KartuController extends Controller
{
    public function index()
    {
        try {
            $route1 = 'user';
            $route2 = 'search';
            $title = 'Layout Kartu';
            $profile = profile::getUser();
            if ($profile['roles'] == 'superadmin') {
                return view('kartu.index', compact('title', 'profile', 'route1', 'route2'));
            }
            return redirect()->route('dashboard');
        } catch (\Throwable $th) {
            Session::forget('user');
            return redirect()->route('logout');
        }
    }
}
