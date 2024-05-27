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
                'data'        => Http::withToken(session('data')['token'])->get(env('API_URL', '') . '/integrasi')->json()['data'],
                'starterPack' => helper::starterPack()
            ]);
        } catch (\Throwable $th) {
            return redirect()->route('logout');
        }
    }

    function store(Request $req)
    {
        $insert = Http::withToken(session('data')['token'])->post(env('API_URL', '') . '/integrasi/store', ['link' => $req->link])->json();
        if ($insert['status'] == false) {
            Alert::warning('Pemberitahuan', $insert['message']);
            return back();
        }
        Alert::success('Pemberitahuan', $insert['message']);
        return back();
    }

    function update(Request $req, $id)
    {
        $insert = Http::withToken(session('data')['token'])->post(env('API_URL', '') . '/integrasi' . '/' . $id . '/update', ['link' => $req->link])->json();
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

    function importAuthView()
    {
        return view('integrasi.import', [
            'title'       => 'Link Integrasi',
            'starterPack' => helper::starterPack()
        ]);
    }

    function import(Request $req)
    {
        try {
            $data = Http::withToken(session('data')['token'])->post(env('API_URL', '') . '/integration', ['link' => $req->link]);
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
            return response()->json([
                'error' => $th->getMessage()
            ], 400);
        }
    }
}
