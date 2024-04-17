<?php

namespace App\Http\Controllers;

use App\Helpers\profile;
use Illuminate\Http\Request;
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
                'view'  => $this->view,
                'data'  => Http::withToken(profile::getToken())->get(env('API_URL', '') . '/rate')->json()['data'],
                'stars' => Http::withToken(profile::getToken())->get(env('API_URL', '') . '/rate/stars')->json()['data'],
                'title' => $this->title
            ]);
        } catch (\Throwable $th) {
            Session::forget('user');
            return redirect()->route('logout');
        }
    }
}
