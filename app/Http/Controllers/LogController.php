<?php

namespace App\Http\Controllers;

use App\Helpers\profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;

class LogController extends Controller
{
    function index()
    {
        try {
            $title = 'Log Aktivitas';
            $profile = profile::getUser();
            if ($profile['roles'] == 'superadmin') {
                $data = Http::withToken(profile::getToken())->get(env('API_URL', '') . '/log')->json()['data'];
                return view('log_activity.index', compact('title', 'data', 'profile'));
            }
            return redirect()->route('dashboard');
        } catch (\Throwable $th) {
            Alert::error('Kesalahan', $th->getMessage());
            Session::forget('user');
            return redirect()->route('logout');
        }
    }
}
