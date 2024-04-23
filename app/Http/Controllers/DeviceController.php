<?php

namespace App\Http\Controllers;

use App\Helpers\profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;

class DeviceController extends Controller
{
    private $view = 'perangkat.index';
    private $title = 'Manajemen Perangkat';

    function index()
    {
        try {
            return view($this->view, [
                'view'      => $this->view,
                'title'     => $this->title,
                'data'      => Http::withToken(profile::getToken())->get(env('API_URL', '') . '/perangkat')->json()['data']
            ]);
            return redirect()->route('dashboard');
        } catch (\Throwable $th) {
            Session::forget('user');
            return redirect()->route('logout');
        }
    }

    function resetKiosK()
    {
        $reset = Http::withToken(profile::getToken())->get(env('API_URL', '') . '/perangkat/import');
        if ($reset['status'] == true) {
            Alert::success('Sukses', 'Berhasil melakukan reset ulang');
            return back();
        }
    }
}
