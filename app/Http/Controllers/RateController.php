<?php

namespace App\Http\Controllers;

use App\Helpers\profile;
use Illuminate\Http\Request;

class RateController extends Controller
{
    private $title = 'Rating OTENTIK';
    private $view  = 'rating.index';

    function index()
    {
        return view($this->view, [
            'view'      => $this->view,
            'title'     => $this->title,
            'profile'   => profile::getUser()
        ]);
    }
}
