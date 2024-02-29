<?php

namespace App\Http\Controllers;

use App\Helpers\profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;

class PaginationController extends Controller
{
    function pagination($view, $link, $title)
    {
        try {
            $profile = profile::getUser();
            if ($profile['roles'] == 'superadmin') {
                $data = Http::withToken(profile::getToken())->get(decrypt($link))->json()['data'];
                return view($view, compact('title', 'data', 'profile'));
            }
            return redirect()->route('dashboard');
        } catch (\Throwable $th) {
            Alert::error('Error', $th->getMessage());
            return back();
        }
    }

    // function paginationSearch($view, $link, $title, $nama, $jabatan, $nip, $nrp, $jenis_kelamin, $nama_satker, $agama, $status_pegawai)
    // {
    //     try {
    //         $profile = profile::getUser();
    //         if ($profile['roles'] == 'superadmin') {
    //             $data = Http::withToken(profile::getToken())->post(decrypt($link), [
    //                 'nama'              => $nama,
    //                 'jabatan'           => $jabatan,
    //                 'nip'               => $nip,
    //                 'nrp'               => $nrp,
    //                 'jenis_kelamin'     => $jenis_kelamin,
    //                 'nama_satker'       => $nama_satker,
    //                 'agama'             => $agama,
    //                 'status_pegawai'    => $status_pegawai
    //             ])->json()['data'];
    //             return view($view, compact('title', 'data', 'profile'));
    //         }
    //         return redirect()->route('dashboard');
    //     } catch (\Throwable $th) {
    //         Alert::error('Error', $th->getMessage());
    //         return back();
    //     }
    // }
}
