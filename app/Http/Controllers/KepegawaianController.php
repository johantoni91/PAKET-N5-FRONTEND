<?php

namespace App\Http\Controllers;

use App\API\PegawaiApi;
use App\Helpers\profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;

class KepegawaianController extends Controller
{
    public function index()
    {
        try {
            $route1 = 'pegawai';
            $route2 = 'search';
            $title = 'Managemen Pegawai';
            $profile = profile::getUser();
            if ($profile['roles'] == 'superadmin') {
                $data = PegawaiApi::get();
                return view('kepegawaian.index', compact('title', 'data', 'profile', 'route1', 'route2'));
            }
            return redirect()->route('dashboard');
        } catch (\Throwable $th) {
            Alert::error('Kesalahan', $th->getMessage());
            Session::forget('user');
            return redirect()->route('logout');
        }
    }

    // public function update(Request $req, $id)
    // {
    //     try {
    //         $kepegawaian = KepegawaianApi::update($id);
    //         if ($kepegawaian) {
    //             session()->flash('notif', 'Mengubah user ' . $data['name']);
    //             return redirect()->to('kepegawaian.index');
    //         }
    //     } catch (\Throwable $th) {
    //         Alert::error('error', $th->getMessage());
    //         return back();
    //     }
    // }

    // public function delete($id)
    // {
    //     try {
    //         $data = Kepegawaian::find($id);
    //         $kepegawaian = Kepegawaian::delete($id);
    //         session()->flash('notif', 'Menghapus user ' . $data['name']);
    //         Alert::success('Berhasil', 'Data pegawai berhasil dihapus');
    //         return back();
    //     } catch (\Throwable $th) {
    //         Alert::error('error', $th->getMessage());
    //         return back();
    //     }
    // }
}
