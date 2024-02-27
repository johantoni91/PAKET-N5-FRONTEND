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
}
