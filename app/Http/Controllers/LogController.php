<?php

namespace App\Http\Controllers;

use App\API\LogApi;
use App\Helpers\profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;

class LogController extends Controller
{
    function index()
    {
        try {
            $route1 = 'log';
            $route2 = 'search';
            $title = 'Log Aktivitas';
            $profile = profile::getUser();
            if ($profile['roles'] == 'superadmin') {
                $data = Http::withToken(profile::getToken())->get(env('API_URL', '') . '/log')->json()['data'];
                return view('log_activity.index', compact('title', 'data', 'profile', 'route1', 'route2'));
            }
            return redirect()->route('dashboard');
        } catch (\Throwable $th) {
            Alert::error('Kesalahan', $th->getMessage());
            Session::forget('user');
            return redirect()->route('logout');
        }
    }

    public function search(Request $req)
    {
        $title = 'Log Aktivitas';
        $profile = profile::getUser();
        $data = LogApi::search($req->category, $req->search)['data'];
        return view('log_activity.search', compact('title', 'data', 'profile'))->render();
    }
}
