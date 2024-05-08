<?php

namespace App\Http\Controllers;

use helper;

class DashboardController extends Controller
{
    function inbox()
    {
        return view('inbox.index', [
            'title'       => 'Inbox',
            'starterPack' => helper::starterPack()
        ]);
    }
}
