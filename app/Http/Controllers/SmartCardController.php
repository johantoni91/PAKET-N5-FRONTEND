<?php

namespace App\Http\Controllers;

use helper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SmartCardController extends Controller
{
    function index()
    {
        return view('smart_card.index', [
            'title'       => 'Smart Card',
            'data'        => Http::withToken(session('data')['token'])->get(env('API_URL', '') . '/smart' . '/' . session('data')['satker'])->json()['data'],
            'starterPack' => helper::starterPack()
        ]);
    }

    function search()
    {
        $input = [
            ''
        ];
    }
}
