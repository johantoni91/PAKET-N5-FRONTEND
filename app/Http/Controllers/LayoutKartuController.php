<?php

namespace App\Http\Controllers;

use App\Helpers\profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LayoutKartuController extends Controller
{
    private $title          = 'Layout Kartu';
    private $view           = 'layout_kartu.index';

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

    function grape()
    {
        return view('layout_kartu.partials.grapejs', [
            'view'      => 'layout_kartu.partials.grapejs',
            'title'     => $this->title
        ]);
    }
}
