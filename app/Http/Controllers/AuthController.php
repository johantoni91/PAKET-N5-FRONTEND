<?php

namespace App\Http\Controllers;

use App\API\PengajuanApi;
use App\API\PerangkatApi;
use App\API\SatkerApi;
use helper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Jenssegers\Agent\Agent;
use RealRashid\SweetAlert\Facades\Alert;

class AuthController extends Controller
{
    public function home()
    {
        try {
            $top = PengajuanApi::top()['data'];
            return view('index', [
                'data'              => Http::withToken(session('data')['token'])->get(env('API_URL', '') . '/dashboard' . '/' . Session::get('data')['satker'])->json()['data'],
                'title'             => 'Dashboard',
                'status_pengajuan'  => PengajuanApi::status(),
                'status_perangkat'  => PerangkatApi::status(),
                'top1'              => isset($top[0]) ? SatkerApi::satkerByCode($top[0]['kode_satker']) : 'NaN',
                'top_value1'        => isset($top[0]) ? $top[0]['count'] : 0,
                'top2'              => isset($top[1]) ? SatkerApi::satkerByCode($top[1]['kode_satker']) : 'NaN',
                'top_value2'        => isset($top[1]) ? $top[1]['count'] : 0,
                'top3'              => isset($top[2]) ? SatkerApi::satkerByCode($top[2]['kode_satker']) : 'NaN',
                'top_value3'        => isset($top[2]) ? $top[2]['count'] : 0,
                'top4'              => isset($top[3]) ? SatkerApi::satkerByCode($top[3]['kode_satker']) : 'NaN',
                'top_value4'        => isset($top[3]) ? $top[3]['count'] : 0,
                'top5'              => isset($top[4]) ? SatkerApi::satkerByCode($top[4]['kode_satker']) : 'NaN',
                'top_value5'        => isset($top[4]) ? $top[4]['count'] : 0,
                'starterPack'       => helper::starterPack()
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
        Session::forget('data');
        Session::forget('pegawai');
        return redirect('/login');
    }
}
