<?php

namespace App\Http\Controllers;

use App\API\PengajuanApi;
use App\Helpers\profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class NotificationController extends Controller
{
    function index()
    {
        $notif = Http::withToken(profile::getToken())->get(env('API_URL', '') . '/notif' . '/' . profile::getUser()['satker'])->json()['data'];
        return response()->json([
            'count'  => count($notif),
            'view'  => view('partials.notification', compact('notif'))->render()
        ]);
    }

    function direct($id)
    {
        Http::withToken(profile::getToken())->get(env('API_URL', '') . '/notif' . '/' . $id . '/destroy')->json();
        return redirect()->route('pengajuan');
    }

    function destroy($id)
    {
        Http::withToken(profile::getToken())->get(env('API_URL', '') . '/notif' . '/' . $id . '/destroy')->json();
        $notif = Http::withToken(profile::getToken())->get(env('API_URL', '') . '/notif')->json()['data'];
        return response()->json([
            'count'  => count($notif),
            'view'  => view('partials.notification', compact('notif'))->render()
        ]);
    }
}
