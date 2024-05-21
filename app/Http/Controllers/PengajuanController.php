<?php

namespace App\Http\Controllers;

use App\API\KartuApi;
use helper;
use App\API\PengajuanApi;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;

class PengajuanController extends Controller
{
    private $view = 'pengajuan.index';
    private $title = 'Manajemen Pengajuan';

    function index()
    {
        try {
            $data = PengajuanApi::get()['data'];
            return view($this->view, [
                'view'        => $this->view,
                'title'       => $this->title,
                'data'        => $data,
                'kartu'       => KartuApi::getTitle(),
                'starterPack' => helper::starterPack()
            ]);
        } catch (\Throwable $th) {
            return redirect()->route('logout');
        }
    }

    function store(Request $req)
    {
        $img = '';
        $nama_gambar = '';
        $input = [
            'nip'         => $req->nip,
            'nama'        => $req->nama,
            'satker_code' => Session::get('data')['satker'],
            'kartu'       => $req->kartu
        ];

        if ($req->hasFile('photo')) {
            $img = $req->file('photo');
            $nama_gambar = $req->nip . '_' . Carbon::now()->format('dmYhis') . '.' . $req->file('photo')->getClientOriginalExtension();
        } else {
            $input['photo'] = null;
        }

        $pengajuan = PengajuanApi::store($input, $img, $nama_gambar);
        if ($pengajuan['status'] == true) {
            Alert::success('Berhasil', 'Pengajuan berhasil dikirim');
            return back();
        } else {
            dd($pengajuan);
            Alert::error('Gagal', 'Pengajuan gagal dikirim');
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
                'view'    => $this->view,
                'title'   => $this->title,
                'data'    => $data,
                'input'   => $input,
                'starterPack' => helper::starterPack()
            ]
        );
    }

    function approve(Request $req)
    {
        $res = PengajuanApi::approve($req->id);
        if (
            preg_match('/^\d{4}$/', Session::get('data')['satker']) ||
            preg_match('/^\d{2}$/', Session::get('data')['satker']) ||
            (preg_match('/^\d{2}$/', Session::get('data')['satker']) && Session::get('data')['satker'] != "00")
        ) {
            $output = [
                'message' => 'Berhasil menyetujui pengajuan'
            ];
        } else {
            $output = [
                'message' => 'Berhasil menyetujui pengajuan',
                'token'   => $res['data']['token']
            ];
        }
        if ($res['status'] == true) {
            return response()->json($output, 200);
        }
        return response('Gagal menyetujui pengajuan', 400);
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
