<?php

namespace App\Http\Controllers;

use App\API\KartuApi;
use App\API\PengajuanApi;
use helper;
use Illuminate\Support\Facades\Http;
use RealRashid\SweetAlert\Facades\Alert;

class SmartCardController extends Controller
{
    private $view = 'smart_card.index';
    private $title = 'Smart Card';
    function index()
    {
        return view('smart_card.index', [
            'view'        => $this->view,
            'title'       => $this->title,
            'data'        => Http::withToken(session('data')['token'])->get(env('API_URL', '') . '/smart' . '/' . session('data')['satker'])->json()['data'],
            'kartu'       => KartuApi::getTitle(),
            'starterPack' => helper::starterPack()
        ]);
    }

    function search()
    {
        $input = [
            'nip'        => request('nip'),
            'nama'       => request('nama'),
            'kartu'      => request('kartu'),
            'waktu'      => request('waktu'),
            'pagination' => request('pagination'),
        ];
        $data = Http::withToken(session('data')['token'])->post(env('API_URL', '') . '/smart/search', $input)->json();
        if ($data['status'] == false) {
            Alert::error('Terjadi kesalahan', $data['message']);
            return back();
        }
        return view(
            $this->view,
            [
                'view'        => $this->view,
                'title'       => $this->title,
                'data'        => $data['data'],
                'kartu'       => KartuApi::getTitle(),
                'input'       => $input,
                'starterPack' => helper::starterPack()
            ]
        );
    }
}
