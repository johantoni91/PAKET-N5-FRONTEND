<?php

namespace App\API;

use Illuminate\Support\Facades\Http;

class Simkari
{
    public static function getPegawai()
    {
        try {
            return Http::withToken('adeyJhbGciOiJIUzI1NiJ9.eyJSb2xlIjoia2FtZGFsIiwiSXNzdWVyIjoibXlzaW1rYXJpIiwiVXNlcm5hbWUiOiJtYWxpZmNoYSIsImV4cCI6MTY5Mjc4Mzk5NywiaWF0IjoxNjkyNzgzOTk3fQ.fS7sAGH5yVsAAVTBhPoarA5us_Stut72vTCAggA6oNYyG')->get('https://mysimkari.kejaksaan.go.id/api/get-ccis')->json();
        } catch (\Throwable $th) {
            return response('Error', 400);
        }
    }
}
