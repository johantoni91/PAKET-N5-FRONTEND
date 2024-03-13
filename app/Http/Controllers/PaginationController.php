<?php

namespace App\Http\Controllers;

use App\API\LogApi;
use App\API\RoleApi;
use App\API\SatkerApi;
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
            $data = Http::withToken(profile::getToken())->get(decrypt($link))->json()['data'];
            $kolom = [
                'browser'           => LogApi::getColumn('browser'),
                'browser_version'   => LogApi::getColumn('browser_version'),
                'os'                => LogApi::getColumn('os'),
                'mobile'            => LogApi::getColumn('mobile')
            ];
            return view($view, [
                'view'      => $view,
                'data'      => $data,
                'profile'   => $profile,
                'title'     => $title,
                'kolom'     => $kolom,
                'satker'    => SatkerApi::getSatkerName()['data'],
                'roles'     => RoleApi::get()
            ]);
        } catch (\Throwable $th) {
            Alert::error('Error', $th->getMessage());
            return back();
        }
    }
}
