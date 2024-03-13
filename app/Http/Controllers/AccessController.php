<?php

namespace App\Http\Controllers;

use App\API\RoleApi;
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
                'view'      => $this->view,
                'title'     => $this->title,
                'data'      => $data,
            ]);
            return redirect()->route('dashboard');
        } catch (\Throwable $th) {
            Session::forget('user');
            return redirect()->route('logout');
        }
    }

    function update(Request $req, $id)
    {
        $res = RoleApi::update($id, $req->roles);
        if ($res['status'] == true) {
            Alert::success('Berhasil', 'Akses role telah diubah!');
            return back();
        }
        Alert::error('Error', 'Gagal mengubah akses role');
        return back();
    }
}
