<?php

namespace App\Http\Controllers;

use helper;
use App\Helpers\profile;
use App\API\PengajuanApi;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PengajuanController extends Controller
{
    private $view = 'pengajuan.index';
    private $title = 'Manajemen Pengajuan';

    function index()
    {
        $data = PengajuanApi::get()['data'];
        return view($this->view, [
            'view'        => $this->view,
            'title'       => $this->title,
            'data'        => $data,
            'starterPack' => helper::starterPack()
        ]);
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
            ]
        );
    }

    function approve(Request $req)
    {
        $res = PengajuanApi::approve($req->id);
        if (
            preg_match('/^\d{4}$/', profile::getUser()['satker']) ||
            preg_match('/^\d{2}$/', profile::getUser()['satker']) ||
            (preg_match('/^\d{2}$/', profile::getUser()['satker']) && profile::getUser()['satker'] != "00")
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
