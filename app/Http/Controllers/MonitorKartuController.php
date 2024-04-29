<?php

namespace App\Http\Controllers;

use App\API\KartuApi;
use App\API\PengajuanApi;
use Barryvdh\DomPDF\Facade\Pdf;
use helper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;

class MonitorKartuController extends Controller
{
    private $monitor_title  = 'Pengaturan Pengajuan Kartu';
    private $monitor_view   = 'monitor_kartu.index';

    function index()
    {
        try {
            $data = Http::withToken(Session::get('data')['token'])->get(env('API_URL', '') . '/monitor' . '/' . Session::get('data')['satker'])->json()['data'];
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
                'pegawai'   => Http::withToken(Session::get('data')['token'])->get(env('API_URL', '') . '/pegawai' . '/' . $nip)->json()['data'],
                'kartu'     => KartuApi::findByTitle($title)['data'],
                'pengajuan' => PengajuanApi::find($id)['data']
            ]);
        } catch (\Throwable $th) {
            Alert::error('Error', 'Terjadi kesalahan');
            return back();
        }
    }

    function print(Request $req, $id, $title)
    {
        try {
            $pengajuan = PengajuanApi::find($id)['data'];
            $pegawai = Http::withToken(Session::get('data')['token'])->get(env('API_URL', '') . '/pegawai' . '/' . $pengajuan['nip'])->json()['data'];
            if ($req->token == $pengajuan['token']) {
                $dataPengajuan = Http::withToken(Session::get('data')['token'])->get(env('API_URL', '') . '/pengajuan' . '/' . $id . '/print')->json();
                $kartu = Http::withToken(Session::get('data')['token'])->post(env('API_URL', '') . '/kartu/title', ['title' => $title])->json()['data'];
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
