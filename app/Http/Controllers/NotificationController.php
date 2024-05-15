<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

class NotificationController extends Controller
{
    function index()
    {
        $notif = Http::withToken(session('data')['token'])->get(env('API_URL', '') . '/notif' . '/' . session('data')['satker'])->json()['data'];
        return response()->json([
            'count'  => count($notif),
            'view'  => view('partials.notification', compact('notif'))->render()
        ]);
    }

    function direct($id)
    {
        Http::withToken(session('data')['token'])->get(env('API_URL', '') . '/notif' . '/' . $id . '/destroy')->json();
        return redirect()->route('pengajuan');
    }

    function destroy($id)
    {
        Http::withToken(session('data')['token'])->get(env('API_URL', '') . '/notif' . '/' . $id . '/destroy')->json();
        $notif = Http::withToken(session('data')['token'])->get(env('API_URL', '') . '/notif')->json()['data'];
        return response()->json([
            'count'  => count($notif),
            'view'  => view('partials.notification', compact('notif'))->render()
        ]);
    }
}
