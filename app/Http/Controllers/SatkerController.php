<?php

namespace App\Http\Controllers;

use App\API\SatkerApi;
use App\Helpers\profile;
use helper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;

class SatkerController extends Controller
{
    function index()
    {
        try {
            $route1 = 'satker';
            $route2 = 'search';
            $title = 'Data Satuan Kerja';
            $profile = profile::getUser();
            if ($profile['roles'] == 'superadmin') {
                $data = Http::withToken(profile::getToken())->get(env('API_URL', '') . '/satker')->json()['data'];
                return view('satker.index', compact('title', 'data', 'profile', 'route1', 'route2'));
            }
            return redirect()->route('dashboard');
        } catch (\Throwable $th) {
            Alert::error('Kesalahan', $th->getMessage());
            Session::forget('user');
            return redirect()->route('logout');
        }
    }
}
