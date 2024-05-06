<?php

namespace App\Http\Controllers;

use helper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Jenssegers\Agent\Agent;
use RealRashid\SweetAlert\Facades\Alert;

class AuthController extends Controller
{
    public function home()
    {
        try {
            return view('index', [
                'data'          => Http::withToken(Session::get('data')['token'])->get(env('API_URL', '') . '/dashboard' . '/' . Session::get('data')['satker'])->json()['data'],
                'title'         => 'Dashboard',
                'starterPack'   => helper::starterPack()
            ]);
        } catch (\Throwable $th) {
            return redirect()->route('logout');
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
                Alert::warning('Pemberitahuan', $res->json()['message']);
                return back();
            }

            $data = $res->json();
            if ($data['status'] == true) {
                Session::put('data', $data['data']['user']);
                Session::put('pegawai', $data['data']['pegawai']);
                return redirect()->route('dashboard');
            } else {
                Alert::warning('Peringatan', 'Data invalid');
                return back();
            }
        } catch (\Throwable $th) {
            $this->logout();
        }
    }

    public function logout()
    {
        Session::flush();
        return redirect('/login');
    }
}
