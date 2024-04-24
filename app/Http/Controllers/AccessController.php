<?php

namespace App\Http\Controllers;

use App\API\RoleApi;
use helper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;

class AccessController extends Controller
{
    private $view = 'hak_akses.index';
    private $title = 'Manajemen Akses';
    function index()
    {
        try {
            $data = RoleApi::get()['data'];
            return view($this->view, [
                'view'        => $this->view,
                'title'       => $this->title,
                'data'        => $data,
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
        if ($req->roles) {
            RoleApi::update($id, $req->roles);
            Alert::success('Berhasil', 'Akses role telah diubah!');
            return back();
        } else {
            Alert::error('Error', 'Gagal mengubah akses role / Mohon isi minimal 1 akses.');
            return back();
        }
    }
}
