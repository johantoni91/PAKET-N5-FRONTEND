<?php

namespace App\Http\Controllers;

use App\Helpers\profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class KartuController extends Controller
{
    private $title          = 'Layout Kartu';
    private $view           = 'kartu.index';
    private $monitor_title  = 'Monitoring Kartu';
    private $monitor_view   = 'kartu.monitoring.index';

    public function index()
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

    public function monitor()
    {
        try {
            return view($this->monitor_view, [
                'view'      => $this->monitor_view,
                'title'     => $this->monitor_title
            ]);
            return redirect()->route('dashboard');
        } catch (\Throwable $th) {
            Session::forget('user');
            return redirect()->route('logout');
        }
    }
}
