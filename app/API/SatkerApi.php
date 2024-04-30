<?php


namespace App\API;

use App\Helpers\log;
use App\Helpers\profile;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Session;
use Jenssegers\Agent\Agent;

class SatkerApi
{
    public static function get()
    {
        try {
            return Http::withToken(Session::get('data')['token'])->get(env('API_URL', '') . '/satker' . '/' . session('data')['satker'] . '/index')->json()['data'];
        } catch (\Throwable $th) {
            Session::forget('user');
            return redirect()->route('logout');
        }
    }

    public static function getCodeName()
    {
        return Http::withToken(Session::get('data')['token'])->get(env('API_URL', '') . '/satker/all')->json();
    }

    public static function getSatkerName()
    {
        try {
            return Http::withToken(Session::get('data')['token'])->get(env('API_URL', '') . '/satker_name');
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public static function find($id)
    {
        try {
            $data = Http::withToken(Session::get('data')['token'])->post(env('API_URL', '') . '/satker/' . $id, log::insert());
            return $data;
        } catch (\Throwable $th) {
            Session::forget('user');
            return redirect()->route('logout');
        }
    }

    public static function satkerNameProfile()
    {
        return Http::withToken(session('data')['token'])->get(env('API_URL', '') . '/satker' . '/' . session('data')['satker'] . '/code')->json()['data']['satker_name'];
    }

    public static function findByName($satker_name)
    {
        return Http::withToken(Session::get('data')['token'])->post(env('API_URL', '') . '/satker/find/name', ['satker' => $satker_name])->json()['data'];
    }

    public static function status($id, $status)
    {
        return Http::withToken(Session::get('data')['token'])->get(env('API_URL', '') . '/satker' . '/' . $id . '/status' . '/' . $status);
    }

    public static function delete($id)
    {
        return Http::withToken(Session::get('data')['token'])->get(env('API_URL', '') . '/satker' . '/' . $id . '/delete', log::insert());
    }

    public static function search($input)
    {
        try {
            return Http::withToken(Session::get('data')['token'])->get(env('API_URL', '') . '/satker/search', $input)->json()['data'];
        } catch (\Throwable $th) {
            return  ['error' => $th];
        }
    }

    public static function store($data)
    {
        $agent = new Agent();
        return Http::withToken(Session::get('data')['token'])->post(env('API_URL', '') . '/satker/store', [
            'satker'          => $data['satker'],
            'type'            => $data['type'],
            'phone'           => $data['phone'],
            'email'           => $data['email'],
            'address'         => $data['address'],
            'users_id'        => Session::get('data')['id'],
            'username'        => Session::get('data')['users']['username'],
            'browser'         => $agent->browser(),
            'browser_version' => $agent->version($agent->browser()),
            'os'              => $agent->platform(),
            'ip_address'      => Request::ip(),
            'mobile'          => $agent->device(),
        ]);
    }

    public static function update($id, $data)
    {
        $agent = new Agent();
        return Http::withToken(Session::get('data')['token'])->post(env('API_URL', '') . '/satker/' . $id . '/update', [
            'satker'          => $data['satker'],
            'type'            => $data['type'],
            'phone'           => $data['phone'],
            'email'           => $data['email'],
            'address'         => $data['address'],
            'users_id'        => Session::get('data')['id'],
            'username'        => Session::get('data')['users']['username'],
            'browser'         => $agent->browser(),
            'browser_version' => $agent->version($agent->browser()),
            'os'              => $agent->platform(),
            'ip_address'      => Request::ip(),
            'mobile'          => $agent->device(),
        ]);
    }
}
