<?php

namespace App\Http\Controllers;

use App\Helpers\profile;
use helper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;

class DeviceController extends Controller
{
    private $view = 'perangkat.index';
    private $title = 'Manajemen Perangkat';

    function index()
    {
        try {
            return view($this->view, [
                'view'        => $this->view,
                'title'       => $this->title,
                'data'        => Http::withToken(profile::getToken())->get(env('API_URL', '') . '/perangkat' . '/' . profile::getUser()['satker'])->json()['data'],
                'starterPack' => helper::starterPack()
            ]);
            return redirect()->route('dashboard');
        } catch (\Throwable $th) {
            Session::forget('user');
            return redirect()->route('logout');
        }
    }

    function update(Request $req, $id)
    {
        try {
            $input = [
                'user'      => $req->user,
                'password'  => $req->password,
                'satker'    => $req->satker
            ];
            $update = Http::withToken(profile::getToken())->post(env('API_URL', '') . '/perangkat' . '/' . $id . '/update', $input)->json();
            if ($input['status'] == true) {
                Alert::success('Berhasil', 'Data perangkat telah diubah');
                return back();
            }
        } catch (\Throwable $th) {
            Alert::error('Gagal', 'Data perangkat gagal diubah, cek kembali form pengisian');
            return back();
        }
    }

    function resetKiosK()
    {
        try {
            $reset = Http::withToken(profile::getToken())->get(env('API_URL', '') . '/perangkat/import');
            if ($reset['status'] == true) {
                Alert::success('Sukses', 'Berhasil melakukan reset ulang');
                return back();
            }
        } catch (\Throwable $th) {
            return redirect()->route('perangkat');
        }
    }
}
