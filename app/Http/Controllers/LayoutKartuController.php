<?php

namespace App\Http\Controllers;

use App\API\KartuApi;
use Carbon\Carbon;
use helper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
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
            $kartu = KartuApi::getWithPagination()['data'];
            return view($this->view, [
                'view'        => $this->view,
                'title'       => $this->title,
                'data'        => $kartu,
                'starterPack' => helper::starterPack()
            ]);
        } catch (\Throwable $th) {
            return redirect()->route('logout');
        }
    }

    public function search()
    {
        $input = [
            'categories' => request('categories'),
            'title'      => request('title'),
            'pagination' => request('pagination') ?? 5
        ];
        $res = Http::withToken(session('data')['token'])->post(env('API_URL', '') . '/kartu/search', $input)->json()['data'];
        return view($this->view, [
            'view'        => $this->view,
            'title'       => $this->title,
            'data'        => $res,
            'input'       => $input,
            'starterPack' => helper::starterPack()
        ]);
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
            $this->validate($req, [
                'icon'      => 'required',
                'depan'     => 'required',
                'belakang'  => 'required'
            ]);
            $filename_icon = 'icon_card_' . $req->title . '_' . Carbon::now()->format('dmYhis') . '.' . $req->file('icon')->getClientOriginalExtension();
            $filename_depan = 'bg_front_card_' . $req->title . '_' . Carbon::now()->format('dmYhis') . '.' . $req->file('depan')->getClientOriginalExtension();
            $filename_belakang = 'bg_back_card_' . $req->title . '_' . Carbon::now()->format('dmYhis') . '.' . $req->file('belakang')->getClientOriginalExtension();

            $input = [
                'title'       => $req->title,
                'icon'        => $filename_icon,
                'depan'       => $filename_depan,
                'belakang'    => $filename_belakang,
                'profile'     => $req->profil,
                'kategori'    => $req->kategori,
                'orientation' => $req->orientasi,
                'nama'        => "1",
                'nip'         => $req->nip,
                'nrp'         => $req->nrp,
                'golongan'    => $req->golongan,
                'jabatan'     => $req->jabatan,
                'warna_teks'  => $req->warna
            ];
            $req->file('icon')->move('kartu', $filename_icon);
            $req->file('depan')->move('kartu', $filename_depan);
            $req->file('belakang')->move('kartu', $filename_belakang);
            $kartu = KartuApi::store($input);
            if ($kartu['status'] == false) {
                Alert::error('Gagal', $kartu['message']);
                return back();
            }
            Alert::success('Berhasil', 'Kartu telah ditambahkan');
            return redirect()->route('layout.kartu');
        } catch (\Throwable $th) {
            Alert::error('Gagal');
            return back();
        }
    }

    public function update(Request $req, $id)
    {
        try {
            $kartu = Http::withToken(session('data')['token'])->get(env('API_URL', '') . '/kartu' . '/' . $id)->json()['data'];
            $filename_icon = '';
            if ($req->hasFile('icon')) {
                $filename_icon = 'icon_card_' . $req->title . '_' . Carbon::now()->format('dmYhis') . '.' . $req->file('icon')->getClientOriginalExtension();
                if (File::exists(public_path('kartu/' . $kartu['icon']))) {
                    unlink(public_path('kartu/' . $kartu['icon']));
                }
                $req->file('icon')->move('kartu', $filename_icon);
            }
            $input = [
                'title'       => $req->title,
                'icon'        => $filename_icon == '' ? $kartu['icon'] : $filename_icon,
                'profile'     => $req->profil,
                'kategori'    => $req->kategori,
                'orientation' => $req->orientation,
                'nip'         => $req->nip,
                'nrp'         => $req->nrp,
                'golongan'    => $req->golongan,
                'jabatan'     => $req->jabatan,
                'warna_teks'  => $req->warna
            ];
            $kartu = KartuApi::update($id, $input);
            if ($kartu['status'] == true) {
                Alert::success('Berhasil', 'Kartu telah diubah');
                return back();
            }
        } catch (\Throwable $th) {
            Alert::error('Gagal', 'Kartu gagal diubah');
            return back();
        }
    }

    public function frontBg(Request $req, $id)
    {
        try {
            $this->validate($req, [
                'depan'     => 'required'
            ]);
            $kartu = Http::withToken(Session::get('data')['token'])->get(env('API_URL', '') . '/kartu' . '/' . $id)->json()['data'];
            if (File::exists(public_path('kartu/' . $kartu['front']))) {
                unlink(public_path('kartu/' . $kartu['front']));
            }
            $filename_depan = 'bg_front_card_' . $req->title . '_' . Carbon::now()->format('dmYhis') . '.' . $req->file('depan')->getClientOriginalExtension();
            $req->file('depan')->move('kartu', $filename_depan);

            Http::withToken(Session::get('data')['token'])->post(env('API_URL', '') . '/kartu' . '/' . $id . '/front', ["front" => $filename_depan])->json();
            Alert::success('Berhasil', 'Latar depan telah diubah');
            return back();
        } catch (\Throwable $th) {
            Alert::error('Gagal');
            return back();
        }
    }

    public function backBg(Request $req, $id)
    {
        try {
            $this->validate($req, [
                'belakang'  => 'required'
            ]);
            $kartu = Http::withToken(Session::get('data')['token'])->get(env('API_URL', '') . '/kartu' . '/' . $id)->json()['data'];
            if (File::exists(public_path('kartu/' . $kartu['back']))) {
                unlink(public_path('kartu/' . $kartu['back']));
            }
            $filename_belakang = 'bg_back_card_' . $req->title . '_' . Carbon::now()->format('dmYhis') . '.' . $req->file('belakang')->getClientOriginalExtension();
            $req->file('belakang')->move('kartu', $filename_belakang);

            Http::withToken(Session::get('data')['token'])->post(env('API_URL', '') . '/kartu' . '/' . $id . '/back', ['back' => $filename_belakang])->json();
            Alert::success('Berhasil', 'Latar belakang telah diubah');
            return back();
        } catch (\Throwable $th) {
            Alert::error('Gagal');
            return back();
        }
    }

    public function destroy($id)
    {
        try {
            $kartu = Http::withToken(Session::get('data')['token'])->get(env('API_URL', '') . '/kartu' . '/' . $id)->json()['data'];
            if (File::exists(public_path('kartu/' . $kartu['icon']))) {
                unlink(public_path('kartu/' . $kartu['icon']));
            }
            if (File::exists(public_path('kartu/' . $kartu['front']))) {
                unlink(public_path('kartu/' . $kartu['front']));
            }
            if (File::exists(public_path('kartu/' . $kartu['back']))) {
                unlink(public_path('kartu/' . $kartu['back']));
            }
            $hapus = KartuApi::destroy($id);
            if ($hapus['status'] == true) {
                Alert::success('Berhasil', 'Kartu berhasil dihapus');
                return back();
            } else {
                Alert::error('Terjadi kesalahan', $hapus->json()['error']);
                return back();
            }
        } catch (\Throwable $th) {
            $hapus = KartuApi::destroy($id);
            Alert::success('Berhasil dihapus');
            return back();
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
            Alert::error('Terjadi kesalahan');
            return back();
        }
    }

    public function pdf($id)
    {
        $kartu = KartuApi::find($id)['data'];
        return view('layout_kartu.pdf', ['kartu' => $kartu, 'starterPack' => helper::starterPack()]);
    }

    public function storeCard(Request $req)
    {
        try {
            $var = json_encode([
                'depan'     => $req->image1,
                'belakang'  => $req->image2
            ]);
            $kartu = Http::withToken(session('data')['token'])->post(env('API_URL', '') . '/kartu' . '/' . $req->id . '/card', ['card' => $var])->json();
            $kartu_all = KartuApi::getWithPagination()['data'];
            if ($kartu['status'] == true) {
                return response()->json([
                    'view'    => view($this->view, [
                        'view'        => $this->view,
                        'title'       => $this->title,
                        'data'        => $kartu_all,
                        'starterPack' => helper::starterPack()
                    ]),
                    'message' => 'Kartu berhasil disimpan',
                    'kartu'   => $kartu['data']
                ], 200);
            } else {
                return response()->json([
                    'message' => 'Kartu gagal disimpan',
                    'error'   => $kartu['message']
                ], 400);
            }
        } catch (\Throwable $th) {
            return response('Terjadi kesalahan')->json([
                'message' => 'Terjadi kesalahan'
            ], 400);
        }
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
