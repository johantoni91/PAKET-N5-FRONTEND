<?php

namespace App\Http\Controllers;

use App\API\SatkerApi;
use App\Helpers\profile;
use Hamcrest\Core\Every;
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
            $profile = profile::getUser();
            if ($profile['roles'] == 'superadmin') {
                $data = SatkerApi::get();
                return view($this->view, [
                    'view'    => $this->view,
                    'title'   => $this->title,
                    'data'    => $data,
                    'profile' => $profile
                ]);
            }
            return redirect()->route('dashboard');
        } catch (\Throwable $th) {
            Alert::error('Kesalahan', $th->getMessage());
            Session::forget('user');
            return redirect()->route('logout');
        }
    }

    function search()
    {
        try {
            $profile = profile::getUser();
            $input = [
                'satker_name'    => request('satker'),
                'satker_type'    => request('type'),
                'satker_phone'   => request('phone'),
                'satker_email'   => request('email'),
                'satker_address' => request('address'),
            ];
            if (
                $input['satker_name'] == null &&
                $input['satker_type'] == null &&
                $input['satker_phone'] == null &&
                $input['satker_email'] == null &&
                $input['satker_address'] == null
            ) {
                Alert::warning('Peringatan', 'Mohon isi salah satu!');
                return back();
            }
            $data = SatkerApi::search($input);
            return view(
                $this->view,
                [
                    'view'    => $this->view,
                    'title'   => $this->title,
                    'data'    => $data,
                    'input'   => $input,
                    'profile' => $profile
                ]
            );
        } catch (\Throwable $th) {
            return $th->getMessage();
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
        session()->flash('status', 'Mengubah status satker ' . $satker->json()['data']['satker_name']);
        session()->flash('route', route('satker'));
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

            session()->flash('status', 'Mengubah data satker ' . $request->satker);
            session()->flash('route', route('satker'));
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
            session()->flash('status', 'Menambahkan satker ' . $request->satker);
            session()->flash('route', route('satker'));
            return redirect()->route('satker');
        } catch (\Throwable $th) {
            Alert::error('Kesalahan', $th->getMessage());
            Session::forget('user');
            return redirect()->route('logout');
        }
    }

    function destroy(Request $req)
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
