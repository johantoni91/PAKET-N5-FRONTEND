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
            $var = $this->helper($room['data']);
            return response()->json([
                'view'         => view('inbox.message', [
                    'data'     => $room['data'],
                    'receiver' => ucfirst($var),
                    'profile'  => session('data'),
                    'pegawai'  => session('pegawai'),
                ])->render()
            ]);
        } catch (\Throwable $th) {
            return response($th->getMessage(), 400);
        }
    }

    function send(Request $req)
    {
        $chat = Http::withToken(session('data')['token'])->post(env('API_URL', '') . '/inbox' . '/' . $req->room . '/chat', [
            'message' => $req->message,
            'from'    => session('data')['id']
        ])->json();
        $var = $this->helper($chat['data']);
        return response()->json([
            'view'         => view('inbox.message', [
                'data'     => $chat['data'],
                'receiver' => ucfirst($var),
                'profile'  => session('data'),
                'pegawai'  => session('pegawai'),
            ])->render()
        ], $chat['status'] ? 200 : 400);
    }

    function helper($var)
    {
        foreach ($var as $i) {
            if ($i['from'] != session('data')['id']) {
                return Http::withToken(session('data')['token'])->get(env('API_URL', '') . '/user' . '/' . $i['from'] . '/find')->json()['data']['name'];
            }
        }
    }
}
