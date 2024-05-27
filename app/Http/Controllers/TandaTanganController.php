<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use RealRashid\SweetAlert\Facades\Alert;

class TandaTanganController extends Controller
{
    function store(Request $req)
    {
        if (!$req->hasFile('signature')) {
            Alert::error('Peringatan!', 'Harap isi gambar tanda tangan anda!');
            return back();
        }
        $res = Http::withToken(session('data')['token'])
            ->attach('signature', file_get_contents($req->file('signature')), session('data')['satker'] . '_signature.' . $req->file('signature')->getClientOriginalExtension())
            ->post(env('API_URL', '') . '/signature/store', ['satker' => session('data')['satker']])->json();
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
        if (!$req->hasFile('signature')) {
            return back();
        }
        $res = Http::withToken(session('data')['token'])
            ->attach('signature', file_get_contents($req->file('signature')), session('data')['satker'] . '_signature.' . $req->file('signature')->getClientOriginalExtension())
            ->post(env('API_URL', '') . '/signature/update', ['satker' => session('data')['satker']])->json();
        if ($res['status'] == false) {
            Alert::error('Pemberitahuan', $res['message']);
            return back();
        } else {
            Alert::success('Pemberitahuan', $res['message']);
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
