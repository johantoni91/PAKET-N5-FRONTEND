<?php

namespace App\Http\Controllers;

use App\API\KartuApi;
use App\Helpers\profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;

class LayoutKartuController extends Controller
{
    private $title          = 'Layout Kartu';
    private $view           = 'layout_kartu.index';

    public function index()
    {
        try {
            $kartu = KartuApi::get()['data'];
            return view($this->view, [
                'view'      => $this->view,
                'title'     => $this->title,
                'data'      => $kartu
            ]);
            return redirect()->route('dashboard');
        } catch (\Throwable $th) {
            Session::forget('user');
            return redirect()->route('logout');
        }
    }

    public function store(Request $req)
    {
        try {
            KartuApi::store($req->title);
            Alert::success('Berhasil', 'Kartu telah ditambahkan');
            return back();
        } catch (\Throwable $th) {
            Alert::error('Gagal', 'Kartu aggal ditambahkan');
            return back();
        }
    }

    public function update(Request $req, $id)
    {
        try {
            KartuApi::update($id, $req->title);
            Alert::success('Berhasil', 'Kartu berhasil diubah');
            return back();
        } catch (\Throwable $th) {
            Alert::error('Gagal', 'Kartu gagal diubah');
            return back();
        }
    }

    public function destroy(Request $req)
    {
        try {
            $kartu = KartuApi::destroy($req->id);
            if ($kartu['status'] == true) {
                Alert::success('Berhasil', 'Kartu berhasil dihapus');
                return response($kartu->json()['message'], 200);
            } else {
                Alert::error('Terjadi kesalahan', $kartu->json()['error']);
                return response($kartu->json()['message'], 200);
            }
        } catch (\Throwable $th) {
            Alert::error('Terjadi kesalahan', $th->getMessage());
            return response($th->getMessage(), 400);
        }
    }

    public function test($id)
    {
        try {
            $kartu = Http::withToken(profile::getToken())->get(env('API_URL', '') . '/kartu/' . $id)->json()['data'];
            return view('test', [
                'id'    => $id,
                'title' => $kartu['title'],
                'kartu' => Http::get(env('API_URL', '') . '/kartu/' . $id . '/load-kartu')->json()['data']
            ]);
        } catch (\Throwable $th) {
            Alert::error('Terjadi kesalahan', $th->getMessage());
            return back();
        }
    }
}
