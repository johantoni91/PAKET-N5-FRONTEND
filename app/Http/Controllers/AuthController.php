<?php

namespace App\Http\Controllers;

use App\Helpers\profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Jenssegers\Agent\Agent;
use RealRashid\SweetAlert\Facades\Alert;

class AuthController extends Controller
{
    public function home()
    {
        $title = 'Dashboard';
        $profile = profile::getUser();
        return view("index", compact('title', 'profile'));
    }

    public function loginPage()
    {
        if (Http::get(env('SET_API', ''))->status() == 500) {
            Alert::error('Error', 'Server sedang bermasalah');
            return view('errors.500');
        }

        if (Session::has('user')) {
            return redirect()->route('dashboard');
        }

        $title = 'Login';
        // $profile = profile::getUser();
        return view('auth.login', compact('title'));
    }

    public function login(Request $request)
    {
        $agent = new Agent();
        $res = Http::post(env('API_URL', '') . '/login', [
            'username' => $request->input('username'),
            'password' => $request->input('password'),
            'browser' => $agent->browser(),
            'browser_version' => $agent->version($agent->browser()),
            'os' => $agent->platform(),
            'ip_address' => $request->ip(),
            'mobile' => $agent->device(),
        ]);

        if ($res->status() == 500) {
            Alert::error('Error', 'Server sedang bermasalah');
            return view('errors.500');
        }

        if (!$res->successful()) {
            Alert::error('Gagal', 'Login gagal');
            return back();
        }

        if ($res->json()['status'] == false) {
            Alert::warning('Akun nonaktif', $res->json()['message']);
            return back();
        }

        $data = $res->json();
        Session::put('user', $data['data']);

        if ($request->remember == 1) {
            Cookie::make('token', $data['token'], 60 * 60 * 24);
        }
        return redirect()->route('dashboard');
    }

    public function logout()
    {
        if (Cookie::has('token')) {
            Cookie::forget('token');
        }
        Session::flush();
        return redirect('/login');
    }
}
