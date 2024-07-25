<?php

namespace App\Http\Controllers;

use App\API\SatkerApi;
use helper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;

class SatkerController extends Controller
{
    private $view  = 'satker.index';
    private $title = 'Satuan Kerja';

    function index()
    {
        try {
            $data = SatkerApi::get();
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

    function search()
    {
        try {
            $pagination = request('pagination') ?? 5;
            if ($pagination > 100) {
                Alert::warning('Peringatan', 'Data yang akan ditampilkan adalah batas maksimum (100)');
                $pagination = 100;
            }
            $input = [
                'satker_name' => request('satker'),
                'satker_type' => request('type'),
                'pagination'  => $pagination
            ];
            $data = SatkerApi::search($input);
            return view(
                $this->view,
                [
                    'view'    => $this->view,
                    'title'   => $this->title,
                    'data'    => $data,
                    'input'   => $input,
                    'starterPack' => helper::starterPack()
                ]
            );
        } catch (\Throwable $th) {
            Alert::warning('Peringatan', 'Mohon masukkan nama satker maupun tipe satker dengan benar!');
            return back();
        }
    }

    function status($id, $status)
    {
        $res = SatkerApi::status($id, $status);
        if ($res->failed()) {
            Alert::error('Gagal', 'Gagal ubah status');
            return back();
        }
        $satker = SatkerApi::find($id);
        Alert::success('Berhasil', 'Status telah diubah');
        return redirect()->route('satker');
    }

    function update(Request $request, $id)
    {
        $data = [
            'satker'            => $request->satker,
            'type'              => $request->type,
            'phone'             => $request->phone,
            'email'             => $request->email,
            'address'           => $request->address,
        ];

        $res = SatkerApi::update($id, $data);

        if ($res->failed()) {
            Alert::error('Gagal', 'satker gagal diubah');
            return back();
        } else {
            if ($res->json()['status'] == false) {
                Alert::error('Kesalahan', $res->json()['message'] . " Dengan satker " . '"' . $res->json()['data']['satker_name'] . '"');
                return back();
            }

            Alert::success('Berhasil', 'Satker berhasil diubah');
            if (request()->routeIs('profile')) {
                Alert::success('Berhasil', 'Mengubah data satker');
                return back();
            }
            return redirect()->route('satker');
        }
    }

    function store(Request $request)
    {
        try {
            $data = [
                'satker'  => strtoupper($request->satker),
                'type'    => $request->type,
                'phone'   => $request->phone,
                'email'   => $request->email,
                'address' => $request->address,
            ];
            SatkerApi::store($data);
            Alert::success('Berhasil', 'Berhasil menambahkan satker');
            return redirect()->route('satker');
        } catch (\Throwable $th) {
            Alert::error('Kesalahan');
            Session::forget('user');
            return redirect()->route('logout');
        }
    }

    function destroy(Request $req)
    {
        try {
            $del = SatkerApi::delete($req->id);
            if (!$del->failed()) {
                Alert::success('Berhasil', 'Satker berhasil dihapus');
                return response($del->json()['message'], 200);
            } else {
                Alert::error('Terjadi kesalahan', $del->json()['error']);
                return response($del->json()['message'], 200);
            }
        } catch (\Throwable $th) {
            Alert::error('Terjadi kesalahan');
            return response($th->getMessage(), 400);
        }
    }
}
