<?php

namespace App\Http\Controllers;

use helper;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

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
}
