<?php

namespace App\Http\Controllers;

use App\Helpers\profile;
use helper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class RateController extends Controller
{
    private $title = 'Rating OTENTIK';
    private $view  = 'rating.index';

    function index()
    {
        return view($this->view, [
            'view'        => $this->view,
            'data'        => Http::withToken(profile::getToken())->get(env('API_URL', '') . '/rate')->json()['data'],
            'additional'  => Http::withToken(profile::getToken())->get(env('API_URL', '') . '/rate/additional')->json()['data'],
            'title'       => $this->title,
            'starterPack' => helper::starterPack()
        ]);
    }
}
