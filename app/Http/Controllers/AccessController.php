<?php

namespace App\Http\Controllers;

use App\API\RoleApi;
use helper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use RealRashid\SweetAlert\Facades\Alert;

class AccessController extends Controller
{
    private $view = 'hak_akses.index';
    private $title = 'Manajemen Akses';
    function index()
    {
        try {
            $data = RoleApi::getWithPagination()['data'];
            return view($this->view, [
                'view'        => $this->view,
                'title'       => $this->title,
                'data'        => $data,
                'starterPack' => helper::starterPack()
            ]);
        } catch (\Throwable $th) {
            return redirect()->route('logout');
        }
    }

    function update(Request $req, $id)
    {
        try {
            $getRole = Http::withToken(session('data')['token'])->post(env('API_URL', '') . '/roles/find/id', ['id' => $id])->json()['data'];
            $arr = $req->roles;
            $getRole['role'] == 'superadmin' ? array_push($arr, 'akses') : '';
            if ($req->roles) {
                $change = RoleApi::update($id, $arr);
                if ($change['status'] == false) {
                    Alert::error($change['message']);
                    return back();
                }
                Alert::success($change['message']);
                return back();
            } else {
                Alert::error('Error', 'Gagal mengubah akses role / Mohon isi minimal 1 akses.');
                return back();
            }
        } catch (\Throwable $th) {
            Alert::error('Error', 'Gagal mengubah akses role / Mohon isi minimal 1 akses.');
            return back();
        }
    }

    function store(Request $req)
    {
        try {
            $res = RoleApi::store($req->all());
            if ($res['status'] == false) {
                Alert::error($res['message']);
                return back();
            }
            Alert::success($res['message']);
            return back();
        } catch (\Throwable $th) {
            Alert::error('Gagal');
            return back();
        }
    }
}
