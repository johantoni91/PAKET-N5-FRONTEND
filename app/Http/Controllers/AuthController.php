<?php

namespace App\Http\Controllers;

use App\Helpers\profile;
use helper;
use Illuminate\Support\Str;
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
        try {
            $title       = 'Dashboard';
            $satker      = Http::withToken(profile::getToken())->get(env('API_URL', '') . '/satker' . '/' . profile::getUser()['satker'] . '/code')->json()['data']['satker_name'];
            $starterPack = helper::starterPack();
            $data        = Http::withToken(profile::getToken())->get(env('API_URL', '') . '/dashboard' . '/' . profile::getUser()['satker'] . '/' . Str::slug($satker))->json()['data'];
            return view("index", compact('title', 'starterPack', 'data'));
        } catch (\Throwable $th) {
            $this->logout();
        }
    }

    public function loginPage()
    {
        try {
            if (Http::get(env('SET_API', ''))->status() == 500) {
                Alert::error('Error', 'Server sedang bermasalah');
                return view('errors.500');
            }

            if (Session::has('user')) {
                return redirect()->route('dashboard');
            }

            $title = 'Login';
            return view('auth.login', compact('title'));
        } catch (\Throwable $th) {
            Alert::error('Server bermasalah', $th->getMessage());
            return view('errors.500');
        }
    }

    public function login(Request $request)
    {
        try {
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
            session()->flash('welcome', 'Selamat datang ' . $data['data']['user']['users']['username'] . '!');
            return redirect()->route('dashboard');
        } catch (\Throwable $th) {
            Alert::error('Error', 'Server sedang bermasalah');
            return view('errors.500');
        }
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
