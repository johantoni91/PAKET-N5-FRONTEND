<?php

namespace App\Http\Controllers;

use App\Jobs\ImportJob;
use helper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use RealRashid\SweetAlert\Facades\Alert;

class IntegrasiController extends Controller
{
    function index()
    {
        try {
            return view('integrasi.index', [
                'title'       => 'Integrasi Data Pegawai',
                'input'       => null,
                'data'        => Http::withToken(session('data')['token'])->get(env('API_URL', '') . '/integrasi')->json()['data'],
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
                'url'        => request('url'),
                'type'       => request('type'),
                'pagination' => $pagination
            ];
            $res = Http::withToken(session('data')['token'])->post(env('API_URL', '') . '/integrasi/search', $input)->json();
            return view('integrasi.index', [
                'title'       => 'Integrasi Data Pegawai',
                'input'       => $input,
                'data'        => $res['data'],
                'starterPack' => helper::starterPack()
            ]);
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }
    }

    function store(Request $req, $param)
    {
        try {
            $req->validate([
                'link'  => 'required'
            ], [
                'link.required' => 'Tautan tidak boleh kosong!'
            ]);

            $input = [
                'link'  => $req->link,
                'type'  => $param
            ];
            if ($param == 'auth') {
                $req->validate([
                    'username'  => 'required',
                    'password'  => 'required',
                ], [
                    'username.required' => 'Username tidak boleh kosong !',
                    'password.required' => 'Password tidak boleh kosong !',
                ]);
                $input['username'] = $req->username;
                $input['password'] = $req->password;
            } elseif ($param == 'token') {
                $req->validate([
                    'token'  => 'required'
                ], [
                    'token.required' => 'Username tidak boleh kosong !',
                ]);
                $input['token'] = $req->token;
            }
            $data = Http::withToken(session('data')['token'])->post(env('API_URL', '') . '/integrasi/store', $input)->json();
            if ($data['status'] == false) {
                return response()->json([
                    'message'   => $data['message']
                ], 400);
            }
            Alert::success($data['message']);
            return redirect()->route('integrasi');
        } catch (\Throwable $th) {
            Alert::error('Gagal');
            return back();
        }
    }

    function updateType(Request $req, $id)
    {
        $updateType = Http::withToken(session('data')['token'])->post(env('API_URL', '') . '/integrasi' . '/' . $id . '/update/type', [
            'type'  => $req->type
        ])->json();
        if ($updateType['status'] == false) {
            Alert::error($updateType['message']);
            return back();
        }
        Alert::success($updateType['message']);
        return back();
    }

    function update(Request $req, $id)
    {
        $insert = Http::withToken(session('data')['token'])->post(env('API_URL', '') . '/integrasi' . '/' . $id . '/update', [
            'link'     => $req->link,
            'username' => $req->username ?? '',
            'password' => $req->password ?? '',
            'token'    => $req->token ?? '',
        ])->json();
        if ($insert['status'] == false) {
            Alert::warning('Pemberitahuan', $insert['message']);
            return back();
        }
        Alert::success('Pemberitahuan', $insert['message']);
        return back();
    }

    function destroy($id)
    {
        $destroy = Http::withToken(session('data')['token'])->get(env('API_URL', '') . '/integrasi' . '/' . $id . '/destroy')->json();
        if ($destroy['status'] == false) {
            Alert::warning('Pemberitahuan', $destroy['message']);
            return back();
        }
        Alert::success('Pemberitahuan', $destroy['message']);
        return back();
    }

    function importView($params)
    {
        if (decrypt($params) == 'auth') {
            $subtitle = 'Tautan Integrasi dengan autentikasi dasar';
        } elseif (decrypt($params) == 'token') {
            $subtitle = 'Tautan Integrasi dengan autentikasi berbasis token';
        } else {
            $subtitle = 'Tautan Integrasi tanpa autentikasi';
        }
        return view('integrasi.import', [
            'title'       => 'Link Integrasi',
            'type'        => decrypt($params),
            'subtitle'    => $subtitle,
            'starterPack' => helper::starterPack()
        ]);
    }

    function import(Request $req)
    {
        try {
            $data = Http::withToken(session('data')['token'])->post(env('API_URL', '') . '/integration', ['id' => $req->id]);
            if ($data->successful()) {
                return response()->json([
                    'message'   => $data['message']
                ], 200);
            } else {
                return response()->json([
                    'message'   => $data['message']
                ], 400);
            }
        } catch (\Throwable $th) {
            return response('Gagal', 400);
        }
    }
}
