<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use helper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use RealRashid\SweetAlert\Facades\Alert;

class AssessmentController extends Controller
{
    function index()
    {
        try {
            return view('assessment.index', [
                'view'        => 'assessment.index',
                'title'       => 'Assessment Security',
                'data'        => Http::withToken(session('data')['token'])->get(env('API_URL', '') . '/assessment')->json()['data'],
                'starterPack' => helper::starterPack()
            ]);
        } catch (\Throwable $th) {
            return redirect()->route('logout');
        }
    }

    function store(Request $req)
    {
        $req->validate([
            'judul' => 'required',
            'file'  => 'required|file|max:3072|mimes:pdf'
        ], [
            'judul.required' => 'Judul dokumen tidak boleh kosong!',
            'file.required' => 'Dokumen harus disertakan!',
            'file.max'      => 'Ukuran dokumen maksimal 3MB',
            'file.mimes'    => 'Dokumen harus berupa PDF!'
        ]);
        $assessment = Http::withToken(session('data')['token'])->attach('dokumen', file_get_contents($req->file('file')), session('data')['nip'] . '_' . session('data')['satker'] . '_' . Carbon::now()->format('d_m_Y') . '.' . $req->file('file')->getClientOriginalExtension())
            ->post(env('API_URL', '') . '/assessment/store', [
                'title' => $req->judul,
                'nip'   => session('data')['nip'],
                'satker' => session('data')['satker'],
            ])->json();
        if ($assessment['status'] == false) {
            Alert::error('Gagal', $assessment['message']);
            return back();
        }
        Alert::success('Berhasil', $assessment['message']);
        return back();
    }

    function destroy($id)
    {
        $assessment = Http::withToken(session('data')['token'])->get(env('API_URL', '') . '/assessment' . '/' . $id . '/destroy')->json();
        if ($assessment['status'] == false) {
            Alert::error('Gagal', $assessment['message']);
            return back();
        }
        Alert::success('Berhasil', $assessment['message']);
        return back();
    }
}
