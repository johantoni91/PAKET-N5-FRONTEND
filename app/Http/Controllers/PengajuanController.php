<?php

namespace App\Http\Controllers;

use App\API\PegawaiApi;
use App\Helpers\profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PengajuanController extends Controller
{
    private $view = 'pengajuan.index';
    private $title = 'Manajemen Pengajuan Kartu';
    public function index()
    {
        try {
            if (profile::getUser()['roles'] == 'superadmin') {
                $data = PegawaiApi::get()['data'];
                return view($this->view, [
                    'view'      => $this->view,
                    'profile'   => profile::getUser(),
                    'title'     => $this->title,
                    'data'      => $data
                ]);
            }
            return redirect()->route('dashboard');
        } catch (\Throwable $th) {
            Session::forget('user');
            return redirect()->route('logout');
        }
    }
}
