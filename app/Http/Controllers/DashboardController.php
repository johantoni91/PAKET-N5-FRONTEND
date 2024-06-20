<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\API\UserApi;
use helper;
use Illuminate\Support\Facades\Http;
use RealRashid\SweetAlert\Facades\Alert;

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
        $room = Http::withToken(session('data')['token'])->get(env('API_URL', '') . '/inbox' . '/' . session('data')['id'] . '/room' . '/' . $req->user2)->json();
        dd($room);
        return response()->json([
            'view'          => view('inbox.message', [
                'data'      => $room['data'],
                'profile'   => session('data'),
                'pegawai'   => session('pegawai'),
            ])->render()
        ]);
    }

    function send(Request $req)
    {
        $chat = Http::withToken(session('data')['token'])->post(env('API_URL', '') . '/inbox' . '/' . $req->room . '/chat', [
            'message' => $req->message,
            'from'    => session('data')['id']
        ])->json();
        if ($chat['status'] == false) {
            Alert::error('Gagal', $chat['message']);
            return back();
        } else {
            return back();
        }
    }
    public function store(Request $request)
    {
        $nfcData = $request->input('data');
        return response()->json(['message' => 'NFC data received', 'data' => $nfcData]);
    }
}
