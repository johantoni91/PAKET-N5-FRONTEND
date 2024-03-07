<?php

namespace App\Http\Controllers;

use App\API\LogApi;
use App\Helpers\profile;
use Carbon\Carbon;
use Illuminate\Http\Request;
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

            $profile = profile::getUser();
            $kolom = [
                'browser'           => LogApi::getColumn('browser'),
                'browser_version'   => LogApi::getColumn('browser_version'),
                'os'                => LogApi::getColumn('os'),
                'mobile'            => LogApi::getColumn('mobile')
            ];
            if ($profile['roles'] == 'superadmin') {
                $data = Http::withToken(profile::getToken())->get(env('API_URL', '') . '/log')->json()['data'];
                return view($this->view, [
                    'view'     => $this->view,
                    'title'    => $this->title,
                    'data'     => $data,
                    'profile'  => $profile,
                    'kolom'    => $kolom
                ]);
            }
            return redirect()->route('dashboard');
        } catch (\Throwable $th) {
            Alert::error('Kesalahan', $th->getMessage());
            Session::forget('user');
            return redirect()->route('logout');
        }
    }

    public function search()
    {
        $profile = profile::getUser();
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
            $res = Http::withToken(profile::getToken())->get(env('API_URL', '') . '/log/search', $input)->json();
            $data = $res['data'];
            return view($this->view, [
                'view'     => $this->view,
                'title'    => $this->title,
                'data'     => $data,
                'profile'  => $profile,
                'kolom'    => $kolom
            ]);
        }
    }
}
