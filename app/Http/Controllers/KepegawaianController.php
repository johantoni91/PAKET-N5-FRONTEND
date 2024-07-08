<?php

namespace App\Http\Controllers;

use App\API\PegawaiApi;
use App\API\SatkerApi;
use App\API\Simkari;
use Carbon\Carbon;
use helper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class KepegawaianController extends Controller
{
    private $view = 'kepegawaian.index';
    private $title = 'Manajemen Pegawai';
    public function index()
    {
        try {
            $satker = Http::withToken(Session::get('data')['token'])->get(env('API_URL', '') . '/satker' . '/' . Session::get('data')['satker'] . '/code')->json()['data']['satker_name'];
            $data = PegawaiApi::get(Str::slug($satker))['data'];
            return view($this->view, [
                'view'        => $this->view,
                'title'       => $this->title,
                'satker'      => SatkerApi::getSatkerName()['data'],
                'data'        => $data,
                'starterPack' => helper::starterPack()
            ]);
        } catch (\Throwable $th) {
            return redirect()->route('logout');
        }
    }

    public function search()
    {
        try {
            $input = [
                'nama'       => request('nama'),
                'nip'        => request('nip'),
                'nrp'        => request('nrp'),
                'pagination' => request('pagination')
            ];
            if (!request()->all()) {
                Alert::warning('Peringatan', 'Mohon isi salah satu!');
                return back();
            } else {
                $res = PegawaiApi::search($input);
                if ($res['status'] = false) {
                    Alert::error('error', $res['message']);
                    return back();
                }
                return view($this->view, [
                    'view'        => $this->view,
                    'title'       => $this->title,
                    'satker'      => SatkerApi::getSatkerName()['data'],
                    'data'        => $res['data'],
                    'input'       => $input,
                    'starterPack' => helper::starterPack()
                ]);
            }
        } catch (\Throwable $th) {
            Alert::error('error');
            return back();
        }
    }

    function store(Request $req)
    {
        try {
            if ($req->nip == null && $req->nrp == null) {
                Alert::warning('Perhatian', 'Harap isi NRP / NIP !');
                return back();
            }

            $input = [
                'nama'           =>  $req->nama,
                'jabatan'        =>  $req->jabatan,
                'nip'            =>  $req->nip,
                'nrp'            =>  $req->nrp,
                'tgl_lahir'      =>  $req->tgl_lahir,
                'eselon'         =>  $req->eselon,
                'GOL_KD'         =>  $req->GOL_KD,
                'golpang'        =>  $req->golongan,
                'jaksa_tu'       =>  $req->jaksa_tu,
                'struktural_non' =>  $req->struktural_non,
                'jenis_kelamin'  =>  $req->jenis_kelamin,
                'nama_satker'    =>  $req->nama_satker,
                'agama'          =>  $req->agama,
                'status_pegawai' =>  $req->status_pegawai,
            ];

            $img = $req->file('foto_pegawai');
            $gambar = '';
            if ($req->nip && !$req->nrp) {
                $gambar = $req->nip . '_' . Carbon::now()->format('dmYhis') . '.' . $req->file('foto_pegawai')->getClientOriginalExtension();
            } elseif (!$req->nip && $req->nrp) {
                $gambar = $req->nrp . '_' . Carbon::now()->format('dmYhis') . '.' . $req->file('foto_pegawai')->getClientOriginalExtension();
            } elseif ($req->nip && $req->nrp) {
                $gambar = $req->nip . '_' . Carbon::now()->format('dmYhis') . '.' . $req->file('foto_pegawai')->getClientOriginalExtension();
            }
            $pegawai = PegawaiApi::insert($img, $gambar, $input)->json();
            if ($pegawai['status'] == true) {
                Alert::success('Berhasil', 'Berhasil menambahkan pegawai');
                return back();
            }
            Alert::warning('Gagal menambahkan pegawai', $pegawai['error']);
            return back();
        } catch (\Throwable $th) {
            Alert::error('Gagal menambahkan pegawai');
            return back();
        }
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
                if ($req->nip && !$req->nrp) {
                    $gambar = $req->nip . '_' . Carbon::now()->format('dmYhis') . '.' . $req->file('foto_pegawai')->getClientOriginalExtension();
                } elseif (!$req->nip && $req->nrp) {
                    $gambar = $req->nrp . '_' . Carbon::now()->format('dmYhis') . '.' . $req->file('foto_pegawai')->getClientOriginalExtension();
                } elseif ($req->nip && $req->nrp) {
                    $gambar = $req->nip . '_' . Carbon::now()->format('dmYhis') . '.' . $req->file('foto_pegawai')->getClientOriginalExtension();
                }
            }

            $pegawai = PegawaiApi::update($id, $img, $gambar, $input)->json();
            if ($pegawai['status'] == false) {
                Alert::warning('Gagal mengubah pegawai', $pegawai['error']);
                return back();
            }

            Alert::success('Berhasil', 'Berhasil mengubah pegawai');
            return back();
        } catch (\Throwable $th) {
            Alert::error('Terjadi Kesalahan');
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

    public function import()
    {
        try {
            $res = Simkari::getPegawai();
            if ($res) {
            }
            Alert::warning('Notifikasi', 'Terjadi kesalahan');
            return back();
        } catch (\Throwable $th) {
            Alert::error('Error', 'Terjadi kesalahan');
            return back();
        }
    }
}
