<?php


namespace App\API;

use App\Helpers\log;
use App\Helpers\profile;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Session;
use Jenssegers\Agent\Agent;

class PegawaiApi
{
    public static function get()
    {
        try {
            // return Http::withToken('adeyJhbGciOiJIUzI1NiJ9.eyJSb2xlIjoia2FtZGFsIiwiSXNzdWVyIjoibXlzaW1rYXJpIiwiVXNlcm5hbWUiOiJtYWxpZmNoYSIsImV4cCI6MTY5Mjc4Mzk5NywiaWF0IjoxNjkyNzgzOTk3fQ.fS7sAGH5yVsAAVTBhPoarA5us_Stut72vTCAggA6oNYyG')->get('https://mysimkari.kejaksaan.go.id/api/get-ccis')->json()['data'];
            $res = Http::withToken(profile::getToken())->get(env('API_URL', '') . '/pegawai')->json()['data'];
        } catch (\Throwable $th) {
            Session::forget('user');
            return redirect()->route('logout');
        }
    }
}
