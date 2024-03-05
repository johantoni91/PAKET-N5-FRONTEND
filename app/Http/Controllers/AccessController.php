<?php

namespace App\Http\Controllers;

use App\API\UserApi;
use App\Helpers\profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AccessController extends Controller
{
    private $view = 'hak_akses.index';
    private $title = 'Manajemen Akses';
    public function index()
    {
        try {
            $profile = profile::getUser();
            if ($profile['roles'] == 'superadmin') {
                $data = UserApi::get()['data'];
                return view($this->view, [
                    'view'      => $this->view,
                    'title'     => $this->title,
                    'data'      => $data,
                    'profile'   => $profile,
                ]);
            }
            return redirect()->route('dashboard');
        } catch (\Throwable $th) {
            Session::forget('user');
            return redirect()->route('logout');
        }
    }
}
