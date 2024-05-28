<?php

namespace App\Http\Controllers;

use helper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use RealRashid\SweetAlert\Facades\Alert;

class TandaTanganController extends Controller
{
    function index()
    {
        return view('signature.index', [
            'starterPack'   => helper::starterPack(),
            'title'         => 'Tanda Tangan'
        ]);
    }
    function store(Request $req)
    {
        $req->validate([
            'signature' => 'required',
            'nip'       => 'required',
            'nama'      => 'required',
            'jabatan'   => 'required',
        ], [
            'signature.required'    => 'Tanda Tangan wajib diisi',
            'nip.required'          => 'NIP wajib diisi',
            'nama.required'         => 'Nama wajib diisi',
            'jabatan.required'      => 'Jabatan wajib diisi',
        ]);
        $res = Http::withToken(session('data')['token'])
            ->attach('signature', file_get_contents($req->file('signature')), session('data')['satker'] . '_signature.' . $req->file('signature')->getClientOriginalExtension())
            ->post(env('API_URL', '') . '/signature/store', [
                'satker'    => session('data')['satker'],
                'nip'       => $req->nip,
                'nama'      => strtoupper($req->nama),
                'jabatan'   => strtoupper($req->jabatan),
            ])->json();
        if ($res['status'] == false) {
            Alert::error('Pemberitahuan', $res['message']);
            return back();
        } else {
            Alert::success('Pemberitahuan', $res['message']);
            return back();
        }
    }

    function update(Request $req)
    {
        $req->validate([
            'nip'              => 'required',
            'nama'             => 'required',
            'jabatan'          => 'required',
        ], [
            'nip.required'     => 'NIP wajib diisi',
            'nama.required'    => 'Nama wajib diisi',
            'jabatan.required' => 'Jabatan wajib diisi',
        ]);
        $input = [
            'satker'           => session('data')['satker'],
            'nip'              => $req->nip,
            'nama'             => strtoupper($req->nama),
            'jabatan'          => strtoupper($req->jabatan),
        ];
        if (!$req->hasFile('signature')) {
            $input['signature'] = '';
            $res = Http::withToken(session('data')['token'])->post(env('API_URL', '') . '/signature/update', $input)->json();
        } else {
            $res = Http::withToken(session('data')['token'])
                ->attach('signature', file_get_contents($req->file('signature')), session('data')['satker'] . '_signature.' . $req->file('signature')->getClientOriginalExtension())
                ->post(env('API_URL', '') . '/signature/update', $input)->json();
        }
        if ($res['status'] == false) {
            Alert::error($res['message']);
            return back();
        } else {
            Alert::success($res['message']);
            return back();
        }
    }

    function destroy()
    {
        $res = Http::withToken(session('data')['token'])->get(env('API_URL', '') . '/signature' . '/' . session('data')['satker'] . '/destroy')->json();
        if ($res['status'] == false) {
            Alert::error('Pemberitahuan', $res['message']);
            return back();
        } else {
            Alert::success('Pemberitahuan', $res['message']);
            return back();
        }
    }
}
