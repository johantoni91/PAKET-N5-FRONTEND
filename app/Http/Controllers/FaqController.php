<?php

namespace App\Http\Controllers;

use App\API\FaqApi;
use App\Helpers\profile;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    private $view = 'faq.index';
    function index()
    {
        $title = 'Frequently Asked Question';
        $profile = profile::getUser();
        $data = FaqApi::get()['data'];
        return view($this->view, [
            'view'      => $this->view,
            'title'     => $title,
            'profile'   => $profile,
            'data'      => $data
        ]);
    }
}
