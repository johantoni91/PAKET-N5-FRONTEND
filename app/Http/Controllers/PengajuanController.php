<?php

namespace App\Http\Controllers;

use App\API\KartuApi;
use helper;
use App\API\PengajuanApi;
use App\Helpers\log;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use RealRashid\SweetAlert\Facades\Alert;

class PengajuanController extends Controller
{
    private $view = 'pengajuan.admin';
    private $title = 'Manajemen Pengajuan';

    function index()
    {
        try {
            if (session('data')['roles'] != 'superadmin' && preg_match('/^\d{6}$/', session('data')['satker'])) {
                return view('pengajuan.index', [
                    'title'         => 'Form Pengajuan',
                    'kartu'         => KartuApi::get(),
                    'starterPack'   => helper::starterPack()
                ]);
            } else {
                $data = PengajuanApi::get()['data'];
                return view($this->view, [
                    'view'        => $this->view,
                    'title'       => $this->title,
                    'data'        => $data,
                    'kartu'       => KartuApi::getTitle(),
                    'starterPack' => helper::starterPack()
                ]);
            }
        } catch (\Throwable $th) {
            return redirect()->route('logout');
        }
    }

    function store(Request $req)
    {
        $nama_gambar = '';
        $req->validate([
            'nip'    => 'required|numeric',
            'kartu'  => 'required',
            'reason' => 'required',
        ], [
            'nip.required'    => 'NIP tidak boleh kosong!',
            'nip.numeric'     => 'NIP harus berupa angka!',
            'kartu.required'  => 'Kartu tidak boleh kosong!',
            'reason.required' => 'Berikan alasan yang konkrit!',
        ]);

        if ($req->reason != 1) {
            if (!$req->hasFile('lampiran')) {
                Alert::warning('Wajib tambahkan bukti!');
                return back();
            }
            $nama_gambar = $req->nip . '_' . Carbon::now()->format('dmYhis') . '.' . $req->file('lampiran')->getClientOriginalExtension();
            $req->file('lampiran')->move('pengajuan', $nama_gambar);
        }

        $input = [
            'log'         => log::insert(),
            'nip'         => $req->nip,
            'satker_code' => session('data')['satker'],
            'kartu'       => $req->kartu,
            'alasan'      => $req->reason,
            'photo'       => $req->reason == 1 ? '' : $nama_gambar
        ];
        $pengajuan = Http::withToken(session('data')['token'])->post(env('API_URL', '') . '/pengajuan/store', $input)->json();
        if ($pengajuan['status'] == true) {
            Alert::success('Berhasil', 'Pengajuan berhasil dikirim');
            return redirect()->route('monitor.kartu');
        } else {
            Alert::error('Gagal', $pengajuan['message']);
            return back();
        }
    }

    function search()
    {
        $input = [
            'nip'    => request('nip'),
            'nama'    => request('nama'),
            'status'   => request('status')
        ];
        if (
            $input['nip'] == null &&
            $input['nama'] == null &&
            $input['status'] == null
        ) {
            Alert::warning('Peringatan', 'Mohon isi salah satu!');
            return back();
        }
        $data = PengajuanApi::search($input)['data'];
        return view(
            $this->view,
            [
                'view'        => $this->view,
                'title'       => $this->title,
                'data'        => $data,
                'kartu'       => KartuApi::getTitle(),
                'input'       => $input,
                'starterPack' => helper::starterPack()
            ]
        );
    }

    function approve(Request $req)
    {
        $res = PengajuanApi::approve($req->id);
        if ($res['status'] == false) {
            return response($res['message'], 400);
        } else {
            return response()->json([
                'message' => 'Berhasil menyetujui pengajuan',
                'token'   => $res['data']['token']
            ], 200);
        }
    }

    function reject(Request $req)
    {
        $res = PengajuanApi::reject($req->id);
        if ($res['status'] == true) {
            return response('Berhasil menolak pengajuan', 200);
        }
        return response('Gagal menolak pengajuan', 400);
    }
}
