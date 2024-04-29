<?php

namespace App\Http\Controllers;

use App\API\LogApi;
use App\API\RoleApi;
use App\API\SatkerApi;
use App\Helpers\profile;
use helper;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;

class PaginationController extends Controller
{
    function pagination($view, $link, $title)
    {
        try {
            $profile = Session::get('data');
            $data = Http::withToken(Session::get('data')['token'])->get(decrypt($link))->json()['data'];
            $kolom = [
                'browser'           => LogApi::getColumn('browser'),
                'browser_version'   => LogApi::getColumn('browser_version'),
                'os'                => LogApi::getColumn('os'),
                'mobile'            => LogApi::getColumn('mobile')
            ];
            return view($view, [
                'view'        => $view,
                'data'        => $data,
                'profile'     => $profile,
                'title'       => $title,
                'kolom'       => $kolom,
                'satker'      => SatkerApi::getSatkerName()['data'],
                'roles'       => RoleApi::get(),
                'additional'  => Http::withToken(Session::get('data')['token'])->get(env('API_URL', '') . '/rate/additional')->json()['data'],
                'starterPack' => helper::starterPack()
            ]);
        } catch (\Throwable $th) {
            Alert::warning('Peringatan', 'Sudah awal / akhir halaman!');
            return back();
        }
    }
}
