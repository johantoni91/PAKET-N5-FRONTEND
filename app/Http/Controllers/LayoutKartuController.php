<?php

namespace App\Http\Controllers;

use App\API\KartuApi;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Dompdf\Dompdf;
use helper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;
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
                'view'        => $this->view,
                'title'       => $this->title,
                'data'        => $kartu,
                'starterPack' => helper::starterPack()
            ]);
        } catch (\Throwable $th) {
            Session::forget('user');
            return redirect()->route('logout');
        }
    }

    public function create()
    {
        return view('layout_kartu.create', [
            'view'        => 'layout_kartu.create',
            'title'       => $this->title,
            'starterPack' => helper::starterPack()
        ]);
    }

    public function find($id)
    {
        $kartu = KartuApi::find($id);
        if ($kartu['status'] == false) {
            Alert::error('Kesalahan', 'Terjadi kesalahan');
            return back();
        }
        return view('layout_kartu.partials.create', [
            'title'     => $this->title,
            'data'      => $kartu
        ]);
    }

    public function store(Request $req)
    {
        try {
            $input = [
                'title'       => $req->title,
                'icon'        => $req->file('icon'),
                'depan'       => $req->file('depan'),
                'belakang'    => $req->file('belakang'),
                'profile'     => $req->profil,
                'kategori'    => $req->kategori,
                'orientation' => $req->orientasi,
                'nama'        => $req->nama,
                'nip'         => $req->nip,
                'nrp'         => $req->nrp,
                'golongan'    => $req->golongan,
                'jabatan'     => $req->jabatan
            ];
            $kartu = KartuApi::store($input, $req->file('icon')->getClientOriginalExtension(), $req->file('depan')->getClientOriginalExtension(), $req->file('belakang')->getClientOriginalExtension());
            if ($kartu['status'] == false) {
                Alert::error('Gagal', $kartu['message']);
                return back();
            }
            Alert::success('Berhasil', 'Kartu telah ditambahkan');
            return redirect()->route('layout.kartu');
        } catch (\Throwable $th) {
            Alert::error('Gagal', 'Kartu gagal ditambahkan', $th->getMessage());
            return back();
        }
    }

    public function update(Request $req, $id)
    {
        try {
            $input = [
                'title'       => $req->title,
                'icon'        => $req->file('icon'),
                'profile'     => $req->profil,
                'kategori'    => $req->kategori,
                'orientation' => $req->orientation,
                'nip'         => $req->nip,
                'nrp'         => $req->nrp,
                'golongan'    => $req->golongan,
                'jabatan'     => $req->jabatan
            ];
            $ext_icon  = $req->hasFile('icon') ? $req->file('icon')->getClientOriginalExtension() : null;
            $kartu = KartuApi::update($id, $input, $ext_icon);
            if ($kartu['status'] == true) {
                Alert::success('Berhasil', 'Kartu telah diubah');
                return back();
            }
        } catch (\Throwable $th) {
            Alert::error('Gagal', 'Kartu gagal diubah', $th->getMessage());
            return back();
        }
    }

    public function frontBg(Request $req, $id)
    {
        try {
            $kartu = Http::withToken(Session::get('data')['token'])->get(env('API_URL', '') . '/kartu' . '/' . $id)->json()['data'];
            $res = Http::withToken(Session::get('data')['token'])
                ->attach('front', file_get_contents($req->file('depan')), 'bg_front_card_' . $kartu['title'] . '_' .
                    Carbon::now()->format('dmYhis') . '.' . $req->file('depan')->getClientOriginalExtension())
                ->post(env('API_URL', '') . '/kartu' . '/' . $id . '/front')->json();
            if ($res['status'] == true) {
                Alert::success('Berhasil', 'Latar depan telah diubah');
                return back();
            } else {
                Alert::error('Gagal', $res['error']);
                return back();
            }
        } catch (\Throwable $th) {
            Alert::error('Gagal', $th->getMessage());
            return back();
        }
    }

    public function backBg(Request $req, $id)
    {
        try {
            $kartu = Http::withToken(Session::get('data')['token'])->get(env('API_URL', '') . '/kartu' . '/' . $id)->json()['data'];
            $res = Http::withToken(Session::get('data')['token'])->attach('back', file_get_contents($req->file('belakang')), 'bg_front_card_' . $kartu['title'] . '_' . Carbon::now()->format('dmYhis') . '.' . $req->file('belakang')->getClientOriginalExtension())->post(env('API_URL', '') . '/kartu' . '/' . $id . '/back')->json();
            if ($res['status'] == true) {
                Alert::success('Berhasil', 'Latar belakang telah diubah');
                return back();
            } else {
                Alert::error('Gagal', $res['error']);
                return back();
            }
        } catch (\Throwable $th) {
            Alert::error('Gagal', $th->getMessage());
            return back();
        }
    }

    public function destroy($id)
    {
        try {
            $kartu = KartuApi::destroy($id);
            if ($kartu['status'] == true) {
                Alert::success('Berhasil', 'Kartu berhasil dihapus');
                return back();
            } else {
                Alert::error('Terjadi kesalahan', $kartu->json()['error']);
                return back();
            }
        } catch (\Throwable $th) {
            Alert::error('Terjadi kesalahan', $th->getMessage());
            return response($th->getMessage(), 400);
        }
    }

    public function test($id)
    {
        try {
            $kartu = Http::withToken(Session::get('data')['token'])->get(env('API_URL', '') . '/kartu/' . $id)->json()['data'];
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

    public function pdf($id)
    {
        $kartu = KartuApi::find($id)['data'];
        return view('layout_kartu.pdf', ['kartu' => $kartu]);
        // $pdf = Pdf::loadView('layout_kartu.pdf', ['kartu' => $kartu]);
        // return $pdf->download('Kartu_' . $kartu['title'] . '.pdf');
    }

    public function resultCard(Request $req)
    {
        return view('welcome', [
            'input' => $req->all()
        ]);
    }

    public function example()
    {
        return view('welcome');
    }
}
