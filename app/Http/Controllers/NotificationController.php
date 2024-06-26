<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

class NotificationController extends Controller
{
    function index() // Notif Pengajuan
    {
        $notif = Http::withToken(session('data')['token'])->get(env('API_URL', '') . '/notif' . '/' . session('data')['satker'])->json()['data'];
        return response()->json([
            'count'  => count($notif),
            'view'  => view('partials.notification', compact('notif'))->render()
        ]);
    }

    function check()
    {
        $notif = Http::withToken(session('data')['token'])->get(env('API_URL', '') . '/notif' . '/' . session('data')['nip'] . '/find')->json()['data'];
        return response()->json([
            'notif' => count($notif),
            'view'  => view('partials.notification', compact('notif'))->render()
        ]);
    }

    function direct($id)
    {
        Http::withToken(session('data')['token'])->get(env('API_URL', '') . '/notif' . '/' . $id . '/destroy')->json();
        return redirect()->route('pengajuan');
    }

    function message() // Notif Chat
    {
        $notif = Http::withToken(session('data')['token'])->get(env('API_URL', '') . '/notif' . '/' . session('data')['id'] . '/message')->json()['data'];
        return response()->json([
            'count' => count($notif)
        ]);
    }

    function directMessage($id) // Redirect to chat page
    {
        Http::withToken(session('data')['token'])->get(env('API_URL', '') . '/inbox' . '/' . $id . '/read')->json();
        return redirect()->route('inbox');
    }

    function truncate()
    {
        $res = Http::withToken(session('data')['token'])->get(env('API_URL', '') . '/notif/truncate')->json();
        if ($res['status'] == false) {
            return response()->json(['success' => false]);
        }
        return response()->json(['success' => true]);
    }
}
