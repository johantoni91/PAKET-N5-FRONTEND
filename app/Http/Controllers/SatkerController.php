<?php

namespace App\Http\Controllers;

use App\API\SatkerApi;
use App\Helpers\profile;
use helper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;

class SatkerController extends Controller
{
    function index()
    {
        try {
            $route1 = 'satker';
            $route2 = 'search';
            $title = 'Satuan Kerja';
            $profile = profile::getUser();
            if ($profile['roles'] == 'superadmin') {
                $data = SatkerApi::get();
                return view('satker.index', compact('title', 'data', 'profile', 'route1', 'route2'));
            }
            return redirect()->route('dashboard');
        } catch (\Throwable $th) {
            Alert::error('Kesalahan', $th->getMessage());
            Session::forget('user');
            return redirect()->route('logout');
        }
    }

    public function status($id, $status)
    {
        $res = SatkerApi::status($id, $status);
        if ($res->failed()) {
            Alert::error('Gagal', 'Gagal ubah status');
            return back();
        }
        $satker = SatkerApi::find($id);
        Alert::success('Berhasil', 'Status telah diubah');
        session()->flash('status', 'Mengubah status satker ' . $satker->json()['data']['satker_name']);
        session()->flash('route', route('satker'));
        return redirect()->route('satker');
    }

    public function store(Request $request)
    {
        try {
            $data = [
                'satker'  => $request->satker,
                'type'    => $request->type,
                'phone'   => $request->phone,
                'email'   => $request->email,
                'address' => $request->address,
            ];
            SatkerApi::store($data);
            Alert::success('Berhasil', 'Berhasil menambahkan satker');
            session()->flash('status', 'Menambahkan satker ' . $request->satker);
            session()->flash('route', route('satker'));
            return redirect()->route('satker');
        } catch (\Throwable $th) {
            Alert::error('Kesalahan', $th->getMessage());
            Session::forget('user');
            return redirect()->route('logout');
        }
    }

    public function destroy(Request $req)
    {
        try {
            $user = SatkerApi::find($req->id)->json();
            $del = SatkerApi::delete($req->id);
            if (!$del->failed()) {
                Alert::success('Berhasil', 'Satker berhasil dihapus');
                session()->flash('status', 'Menghapus satker ' . $user['data']['satker_name']);
                session()->flash('route', route('satker'));
                return response($del->json()['message'], 200);
            } else {
                Alert::error('Terjadi kesalahan', $del->json()['error']);
                return response($del->json()['message'], 200);
            }
        } catch (\Throwable $th) {
            Alert::error('Terjadi kesalahan', $th->getMessage());
            return response($th->getMessage(), 400);
        }
    }
}
