<?php

namespace App\Http\Controllers;

use App\API\PegawaiApi;
use App\API\PengajuanApi;
use App\Helpers\profile;
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
                'view'      => $this->view,
                'title'     => $this->title,
                'data'      => $data
            ]);
        } catch (\Throwable $th) {
            Session::forget('user');
            return redirect()->route('logout');
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
            ]
        );
    }

    function approve(Request $req)
    {
        $res = PengajuanApi::approve($req->id);
        if ($res['status'] == true) {
            return response()->json([
                'message' => 'Berhasil menyetujui pengajuan',
                'token'   => $res['data']['token']
            ], 200);
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
