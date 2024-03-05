<?php

namespace App\Http\Controllers;

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
            if ($profile['roles'] == 'superadmin') {
                $data = Http::withToken(profile::getToken())->get(decrypt($link))->json()['data'];
                return view($view, [
                    'view' => $view,
                    'data' => $data,
                    'profile' => $profile,
                    'title' => $title,
                    'satker' => SatkerApi::getSatkerName()['data']
                ]);
            }
            return redirect()->route('dashboard');
        } catch (\Throwable $th) {
            Alert::error('Error', $th->getMessage());
            return back();
        }
    }
}
