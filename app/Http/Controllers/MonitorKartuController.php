<?php

namespace App\Http\Controllers;

use App\API\PengajuanApi;
use App\Events\NotificationEvent;
use App\Helpers\profile;
use Barryvdh\DomPDF\Facade\Pdf;
use Dompdf\Dompdf;
use Dompdf\Options;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;

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

    function pdf(Request $req, $id, $kartu)
    {
        try {
            $pengajuan = PengajuanApi::find($id)['data'];
            if ($req->token == $pengajuan['token']) {
                $dataPengajuan = Http::withToken(profile::getToken())->get(env('API_URL', '') . '/pengajuan' . '/' . $id . '/print')->json();
                $dataKartu = Http::withToken(profile::getToken())->get(env('API_URL', '') . '/kartu' . '/' . $kartu . '/title')->json();
                if ($dataPengajuan['status'] == true) {
                    Alert::success('Berhasil', 'Kartu telah dicetak');
                    return back();
                }
                Alert::error('Gagal', $dataPengajuan['error']);
                return back();
            }
        } catch (\Throwable $th) {
            Alert::error('Gagal', 'Kartu gagal dicetak');
            return back();
        }
    }
}
