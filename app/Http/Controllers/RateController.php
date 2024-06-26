<?php

namespace App\Http\Controllers;

use helper;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;

class RateController extends Controller
{
    private $title = 'Rating OTENTIK';
    private $view  = 'rating.index';

    function index()
    {
        try {
            return view($this->view, [
                'view'        => $this->view,
                'data'        => Http::withToken(Session::get('data')['token'])->get(env('API_URL', '') . '/rate')->json()['data'],
                'additional'  => Http::withToken(Session::get('data')['token'])->get(env('API_URL', '') . '/rate/additional')->json()['data'],
                'title'       => $this->title,
                'starterPack' => helper::starterPack()
            ]);
        } catch (\Throwable $th) {
            return redirect()->route('logout');
        }
    }

    function search()
    {
        $input = [
            'name'    => request('name'),
            'stars'   => request('stars'),
            'comment' => request('comment'),
            'tanggal' => request('tanggal')
        ];
        $res = Http::withToken(session('data')['token'])->post(env('API_URL', '') . '/rate/search', $input)->json();
        if ($res['status'] == false) {
            Alert::error($res['message']);
            return back();
        }
        return view($this->view, [
            'view'        => $this->view,
            'data'        => $res['data'],
            'additional'  => Http::withToken(Session::get('data')['token'])->get(env('API_URL', '') . '/rate/additional')->json()['data'],
            'title'       => $this->title,
            'starterPack' => helper::starterPack()
        ]);
    }
}
