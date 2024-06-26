<?php

namespace App\Http\Controllers;

use App\API\LogApi;
use helper;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;

class LogController extends Controller
{
    private $title = 'Log Aktivitas';
    private $view  = 'log_activity.index';
    function index()
    {
        try {
            $kolom = [
                'browser'           => LogApi::getColumn('browser'),
                'browser_version'   => LogApi::getColumn('browser_version'),
                'os'                => LogApi::getColumn('os'),
                'mobile'            => LogApi::getColumn('mobile')
            ];
            $data = Http::withToken(Session::get('data')['token'])->get(env('API_URL', '') . '/log' . '/' . session('data')['id'] . '/index')->json()['data'];
            return view($this->view, [
                'view'        => $this->view,
                'title'       => $this->title,
                'data'        => $data,
                'kolom'       => $kolom,
                'starterPack' => helper::starterPack()
            ]);
            return redirect()->route('dashboard');
        } catch (\Throwable $th) {
            return redirect()->route('logout');
        }
    }

    public function search()
    {
        $kolom = [
            'browser'           => LogApi::getColumn('browser'),
            'browser_version'   => LogApi::getColumn('browser_version'),
            'os'                => LogApi::getColumn('os'),
            'mobile'            => LogApi::getColumn('mobile')
        ];
        $input = [
            'username'        => request('username'),
            'ip_address'      => request('ip_address'),
            'browser'         => request('browser'),
            'browser_version' => request('browser_version'),
            'os'              => request('os'),
            'mobile'          => request('mobile'),
            'log_detail'      => request('log_detail'),
            'start'           => request('start'),
            'end'             => request('end')
        ];
        if (request('username') == null && request('ip_address') == null && request('browser') == null && request('browser_version') == null && request('os') == null && request('mobile') == null && request('log_detail') == null && request('start') == null && request('end') == null) {
            Alert::warning('Peringatan', 'Mohon isi salah satu!');
            return back();
        } elseif (request('username') == null || request('ip_address') == null || request('browser') == null || request('browser_version') == null || request('os') == null || request('mobile') == null || request('log_detail') == null || request('start') == null || request('end')) {
            $res = Http::withToken(Session::get('data')['token'])->get(env('API_URL', '') . '/log/search', $input)->json();
            $data = $res['data'];
            return view($this->view, [
                'view'        => $this->view,
                'title'       => $this->title,
                'input'       => $input,
                'data'        => $data,
                'kolom'       => $kolom,
                'starterPack' => helper::starterPack()
            ]);
        }
    }
}
