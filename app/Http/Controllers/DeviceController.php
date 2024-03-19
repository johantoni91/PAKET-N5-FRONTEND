<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DeviceController extends Controller
{
    private $view = 'perangkat.index';
    private $title = 'Manajemen Perangkat';

    function index()
    {
        try {
            return view($this->view, [
                'view'      => $this->view,
                'title'     => $this->title
            ]);
            return redirect()->route('dashboard');
        } catch (\Throwable $th) {
            Session::forget('user');
            return redirect()->route('logout');
        }
    }
}
