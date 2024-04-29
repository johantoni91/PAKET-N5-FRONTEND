<?php

namespace App\Http\Controllers;

use App\API\UserApi;
use App\Helpers\profile;
use App\Http\Requests\ProfileRequest;
use helper;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;
use Jenssegers\Agent\Agent;

class ProfileController extends Controller
{
    function index()
    {
        $title = 'Profil User';
        $satker = Http::withToken(Session::get('data')['token'])->get(env('API_URL', '') . '/satker' . '/' . Session::get('data')['satker'] . '/code')->json()['data'];
        $starterPack = helper::starterPack();
        return view('profile.index', compact('title', 'satker', 'starterPack'));
    }

    function update(ProfileRequest $request, $id)
    {
        if ($request->nip == null && $request->nrp == null) {
            Alert::error('Terjadi kesalahan', 'Mohon isi salah satu NIP / NRP atau dua-duanya');
            return back();
        }
        $agent = new Agent();
        $data = [
            'nip'               => $request->nip,
            'nrp'               => $request->nrp,
            'username'          => $request->username,
            'name'              => $request->name,
            'email'             => $request->email,
            'phone'             => $request->phone,
            'photo'             => $request->file('photo'),
            'password'          => $request->password,
            'browser'           => $agent->browser(),
            'browser_version'   => $agent->version($agent->browser()),
            'os'                => $agent->platform(),
            'ip_address'        => Request::ip(),
            'mobile'            => $agent->device(),
        ];

        $res = UserApi::update($data['photo'], $id, $data);
        if ($res->failed()) {
            Alert::error('Gagal', 'User gagal diubah');
            return back();
        }

        Alert::success('Berhasil', 'Berhasil mengubah data profil');
        Session::flush();
        Session::put('user', $res->json()['data']);
        session()->flash('status', 'Mengubah data profil');
        session()->flash('route', route('profile'));
        return back();
    }
}
