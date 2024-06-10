<?php

namespace App\Http\Controllers;

use App\Jobs\ImportJob;
use helper;
use Illuminate\Http\Request;

class SmartCardController extends Controller
{
    function index()
    {
        return view('smart_card.index', [
            'title'       => 'Smart Card',
            'starterPack' => helper::starterPack()
        ]);
    }
}
