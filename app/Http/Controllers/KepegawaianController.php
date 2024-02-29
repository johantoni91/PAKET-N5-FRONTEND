<?php

namespace App\Http\Controllers;

use App\API\PegawaiApi;
use App\Helpers\profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;
use RealRashid\SweetAlert\Facades\Alert;

class KepegawaianController extends Controller
{
    private $title = 'Manajemen Pegawai';

    public function index()
    {
        try {
            if (profile::getUser()['roles'] == 'superadmin') {
                $data = PegawaiApi::get()['data'];
                return view('kepegawaian.index', [
                    'title'     => $this->title,
                    'profile'   => profile::getUser(),
                    'data'      => $data
                ]);
            }
            return redirect()->route('dashboard');
        } catch (\Throwable $th) {
            Session::forget('user');
            return redirect()->route('logout');
        }
    }

    public function search(Request $req)
    {
        try {
            $input = [
                'nama'              => $req->nama,
                'jabatan'           => $req->jabatan,
                'nip'               => $req->nip,
                'nrp'               => $req->nrp,
                'jenis_kelamin'     => $req->jenis_kelamin,
                'nama_satker'       => $req->satker,
                'agama'             => $req->agama,
                'status_pegawai'    => $req->status
            ];
            if ($req->nama == null && $req->jabatan == null && $req->nip == null && $req->nrp == null && $req->jenis_kelamin == null && $req->nama_satker == null && $req->agama == null && $req->status_pegawai == null) {
                Alert::warning('Peringatan', 'Mohon isi salah satu!');
                return back();
            } elseif ($req->nama == null || $req->jabatan == null || $req->nip == null || $req->nrp == null || $req->jenis_kelamin == null || $req->nama_satker == null || $req->agama == null || $req->status_pegawai == null) {
                $res = PegawaiApi::search($input);
                if ($res['status'] = false) {
                    Alert::error('error', $res['message']);
                    return back();
                }
                $data = $res['data'];

                if (profile::getUser()['roles'] == 'superadmin') {
                    return view('kepegawaian.index', [
                        'title'     => $this->title,
                        'profile'   => profile::getUser(),
                        'data'      => $data,
                        'input'     => $input
                    ]);
                }
                return redirect()->route('dashboard');
            }
        } catch (\Throwable $th) {
            Alert::error('error', $th->getMessage());
            return back();
        }
    }

    // public function destroy(Request $req)
    // {
    //     try {
    //         $user = PegawaiApi::find($req->id)->json();
    //         $del = PegawaiApi::delete($req->id);
    //         if (!$del->failed()) {
    //             Alert::success('Berhasil', 'User berhasil dihapus');
    //             session()->flash('status', 'Menghapus user ' . $user['data']['users']['name']);
    //             session()->flash('route', route('user.index'));
    //             return response($del->json()['message'], 200);
    //         } else {
    //             Alert::error('Terjadi kesalahan', $del->json()['error']);
    //             return response($del->json()['message'], 200);
    //         }
    //     } catch (\Throwable $th) {
    //         Alert::error('Terjadi kesalahan', $th->getMessage());
    //         return response($th->getMessage(), 400);
    //     }
    // }
}
