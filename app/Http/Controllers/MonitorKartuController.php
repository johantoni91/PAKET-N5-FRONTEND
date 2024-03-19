<?php

namespace App\Http\Controllers;

use App\API\PengajuanApi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class MonitorKartuController extends Controller
{
    private $monitor_title  = 'Pengaturan Pengajuan Kartu';
    private $monitor_view   = 'monitor_kartu.index';

    public function index()
    {
        try {
            $data = PengajuanApi::get()['data'];
            return view($this->monitor_view, [
                'view'      => $this->monitor_view,
                'title'     => $this->monitor_title,
                'data'      => $data
            ]);
            return redirect()->route('dashboard');
        } catch (\Throwable $th) {
            Session::forget('user');
            return redirect()->route('logout');
        }
    }
}
