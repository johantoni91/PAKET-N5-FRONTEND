<?php

namespace App\Http\Controllers;

use App\API\PegawaiApi;
use App\API\SatkerApi;
use App\Helpers\profile;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;
use RealRashid\SweetAlert\Facades\Alert;

class KepegawaianController extends Controller
{
    private $view = 'kepegawaian.index';
    private $title = 'Manajemen Pegawai';
    public function index()
    {
        try {
            if (profile::getUser()['roles'] == 'superadmin') {
                $data = PegawaiApi::get()['data'];
                return view($this->view, [
                    'view'      => $this->view,
                    'profile'   => profile::getUser(),
                    'title'     => $this->title,
                    'satker'    => SatkerApi::getSatkerName()['data'],
                    'data'      => $data
                ]);
            }
            return redirect()->route('dashboard');
        } catch (\Throwable $th) {
            Session::forget('user');
            return redirect()->route('logout');
        }
    }

    public function search()
    {
        try {
            $input = [
                'nama'              => request('nama'),
                'jabatan'           => request('jabatan'),
                'nip'               => request('nip'),
                'nrp'               => request('nrp'),
                'jenis_kelamin'     => request('jenis_kelamin'),
                'nama_satker'       => request('satker'),
                'agama'             => request('agama'),
                'status_pegawai'    => request('status')
            ];
            if (request('nama') == null && request('jabatan') == null && request('nip') == null && request('nrp') == null && request('jenis_kelamin') == null && request('satker') == null && request('agama') == null && request('status_pegawai') == null) {
                Alert::warning('Peringatan', 'Mohon isi salah satu!');
                return back();
            } elseif (request('nama') == null || request('jabatan') == null || request('nip') == null || request('nrp') == null || request('jenis_kelamin') == null || request('satker') == null || request('agama') == null || request('status_pegawai') == null) {
                $res = PegawaiApi::search($input);
                if ($res['status'] = false) {
                    Alert::error('error', $res['message']);
                    return back();
                }
                if (profile::getUser()['roles'] == 'superadmin') {
                    return view($this->view, [
                        'view'      => $this->view,
                        'profile'   => profile::getUser(),
                        'title'     => $this->title,
                        'satker'    => SatkerApi::getSatkerName()['data'],
                        'data'      => $res['data']
                    ]);
                }
                return redirect()->route('dashboard');
            }
        } catch (\Throwable $th) {
            Alert::error('error', $th->getMessage());
            return back();
        }
    }

    function store(Request $req)
    {
        $img = $req->file('foto_pegawai');
        $gambar = $req->nip ?? $req->nrp . '_' . Carbon::now()->format('dmY') . '.' . $img->getClientOriginalExtension();
        $input = [
            'nama'           =>  $req->nama,
            'jabatan'        =>  $req->jabatan,
            'nip'            =>  $req->nip,
            'nrp'            =>  $req->nrp,
            'tgl_lahir'      =>  $req->tgl_lahir,
            'eselon'         =>  $req->eselon,
            'GOL_KD'         =>  $req->gol_kd,
            'golpang'        =>  $req->golongan,
            'jaksa_tu'       =>  $req->jaksa_tu,
            'struktural_non' =>  $req->struktural_non,
            'jenis_kelamin'  =>  $req->jenis_kelamin,
            'nama_satker'    =>  $req->nama_satker,
            'agama'          =>  $req->agama,
            'status_pegawai' =>  $req->status_pegawai,
        ];

        if ($req->nip == null && $req->nrp == null) {
            Alert::warning('Perhatian', 'Harap isi NRP / NIP !');
            return back();
        }
        $pegawai = PegawaiApi::insert($img, $gambar, $input)->json();
        if ($pegawai['status'] == true) {
            Alert::success('Berhasil', 'Berhasil menambahkan pegawai');
            session()->flash('status', 'Menambahkan satker ' . $req->nama);
            session()->flash('route', route('pegawai'));
            return back();
        }
        Alert::warning('Gagal menambahkan pegawai', $pegawai['error']);
        return back();
    }

    function update(Request $req, $id)
    {
        try {
            $img    = '';
            $gambar = '';
            $input = [
                'nama'           =>  $req->nama,
                'jabatan'        =>  $req->jabatan,
                'nip'            =>  $req->nip,
                'nrp'            =>  $req->nrp,
                'tgl_lahir'      =>  $req->tgl_lahir,
                'eselon'         =>  $req->eselon,
                'GOL_KD'         =>  $req->GOL_KD,
                'golpang'        =>  $req->golpang,
                'jaksa_tu'       =>  $req->jaksa_tu,
                'struktural_non' =>  $req->struktural_non,
                'jenis_kelamin'  =>  $req->jenis_kelamin,
                'nama_satker'    =>  $req->nama_satker,
                'agama'          =>  $req->agama,
                'status_pegawai' =>  $req->status_pegawai,
            ];

            if ($req->nip == null && $req->nrp == null) {
                Alert::warning('Perhatian', 'Harap isi NRP / NIP !');
                return back();
            }

            if ($req->hasFile('foto_pegawai')) {
                $img = $req->file('foto_pegawai');
                $gambar = $req->nip ?? $req->nrp . '_' . Carbon::now()->format('dmY') . '.' . $img->getClientOriginalExtension();
            }

            $pegawai = PegawaiApi::update($id, $img, $gambar, $input)->json();
            if ($pegawai['status'] == true) {
                Alert::success('Berhasil', 'Berhasil mengubah pegawai');
                session()->flash('status', 'mengubah pegawai ' . $req->nama);
                session()->flash('route', route('pegawai'));
                return back();
            }
            Alert::warning('Gagal mengubah pegawai', $pegawai['message']);
            return back();
        } catch (\Throwable $th) {
            Alert::error('Terjadi Kesalahan', $th->getMessage());
            return back();
        }
    }

    public function destroy($nip)
    {
        $res = PegawaiApi::destroy($nip);
        if ($res['status'] == false) {
            Alert::error('Error', 'Gagal menghapus pegawai');
            return back();
        }
        Alert::success('Berhasil', 'Pegawai telah dihapus');
        return back();
    }
}
