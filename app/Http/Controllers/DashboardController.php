<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\API\UserApi;
use helper;
use Illuminate\Support\Facades\Http;

class DashboardController extends Controller
{
    function inbox()
    {
        try {
            return view('inbox.index', [
                'title'             => 'Inbox',
                'users'             => UserApi::all()->json()['data'],
                'starterPack'       => helper::starterPack()
            ]);
        } catch (\Throwable $th) {
            return redirect()->route('logout');
        }
    }

    function getRoom(Request $req)
    {
        try {
            $room = Http::withToken(session('data')['token'])->get(env('API_URL', '') . '/inbox' . '/' . session('data')['id'] . '/room' . '/' . $req->user2)->json();
            return response()->json([
                'view'          => view('inbox.message', [
                    'data'      => $room['data'],
                    'profile'   => session('data'),
                    'pegawai'   => session('pegawai'),
                ])->render()
            ]);
        } catch (\Throwable $th) {
            return response('Gagal', 400);
        }
    }

    function send(Request $req)
    {
        $chat = Http::withToken(session('data')['token'])->post(env('API_URL', '') . '/inbox' . '/' . $req->room . '/chat', [
            'message' => $req->message,
            'from'    => session('data')['id']
        ])->json();
        return response()->json([
            'view'          => view('inbox.message', [
                'data'      => $chat['data'],
                'profile'   => session('data'),
                'pegawai'   => session('pegawai'),
            ])->render()
        ], $chat['status'] ? 200 : 400);
    }
}
