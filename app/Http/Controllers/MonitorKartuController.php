<?php

namespace App\Http\Controllers;

use App\API\KartuApi;
use App\API\PegawaiApi;
use App\API\PengajuanApi;
use App\Events\NotificationEvent;
use App\Helpers\profile;
use Barryvdh\DomPDF\Facade\Pdf;
use Dompdf\Dompdf;
use Dompdf\Options;
use Carbon\Carbon;
use helper;
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
                'view'        => $this->monitor_view,
                'title'       => $this->monitor_title,
                'data'        => $data,
                'starterPack' => helper::starterPack()
            ]);
            return redirect()->route('dashboard');
        } catch (\Throwable $th) {
            Session::forget('user');
            return redirect()->route('logout');
        }
    }

    function pdf($id, $nip, $title)
    {
        try {
            return view('monitor_kartu.pdf', [
                'pegawai'   => Http::withToken(profile::getToken())->get(env('API_URL', '') . '/pegawai' . '/' . $nip)->json()['data'],
                'kartu'     => KartuApi::findByTitle($title)['data'],
                'pengajuan' => PengajuanApi::find($id)['data']
            ]);
        } catch (\Throwable $th) {
            Alert::error('Error', 'Terjadi kesalahan');
            return back();
        }
    }

    public function print(Request $req, $id, $title)
    {
        try {
            $pengajuan = PengajuanApi::find($id)['data'];
            $pegawai = Http::withToken(profile::getToken())->get(env('API_URL', '') . '/pegawai' . '/' . $pengajuan['nip'])->json()['data'];
            if ($req->token == $pengajuan['token']) {
                $dataPengajuan = Http::withToken(profile::getToken())->get(env('API_URL', '') . '/pengajuan' . '/' . $id . '/print')->json();
                $kartu = Http::withToken(profile::getToken())->post(env('API_URL', '') . '/kartu/title', ['title' => $title])->json()['data'];
                if ($dataPengajuan['status'] == true) {
                    $pdf = Pdf::loadView('monitor_kartu.pdf', compact('pegawai', 'kartu', 'pengajuan'));
                    $pdf->download('Kartu_' . $kartu['title'] . '.pdf');
                    Alert::success('Berhasil', 'Kartu telah dicetak');
                    return back();
                }
                Alert::error('Gagal', $dataPengajuan['error']);
                return back();
            }
        } catch (\Throwable $th) {
            Alert::error('Gagal', 'Kartu gagal dicetak', $th->getMessage());
            return back();
        }
    }
}
