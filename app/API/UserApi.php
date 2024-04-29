<?php

namespace App\API;

use App\Helpers\log;
use App\Helpers\profile;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Session;
use Jenssegers\Agent\Agent;

class UserApi
{
    public static function get()
    {
        return Http::withToken(Session::get('data')['token'])->get(env('API_URL', '') . '/users' . '/' . Session::get('data')['satker']);
    }

    public static function search($input)
    {
        return Http::withToken(Session::get('data')['token'])->get(env('API_URL', 'http://localhost:8001/api') . '/user/search', $input)->json();
    }

    public static function find($id)
    {
        return Http::withToken(Session::get('data')['token'])->post(env('API_URL', '') . '/user/' . $id, log::insert())->json();
    }

    public static function insert($photo, $data)
    {
        $agent = new Agent();
        if (!$photo == null) {
            return Http::attach('photo', file_get_contents($photo), mt_rand() . '.' . $photo->getClientOriginalExtension())
                ->post(env('API_URL', '') . '/register', [
                    'nip'               => $data['nip'],
                    'nrp'               => $data['nrp'],
                    'username'          => $data['username'],
                    'name'              => $data['name'],
                    'satker'            => $data['satker'],
                    'role'              => $data['role'],
                    'email'             => $data['email'],
                    'phone'             => $data['phone'],
                    'password'          => $data['password'],
                    'photo'             => $photo,
                    'users_id'          => Session::get('data')['id'],
                    'browser'           => $agent->browser(),
                    'browser_version'   => $agent->version($agent->browser()),
                    'os'                => $agent->platform(),
                    'ip_address'        => Request::ip(),
                    'mobile'            => $agent->device(),
                ])->json();
        }
        return Http::post(env('API_URL', '') . '/register', [
            'nip'               => $data['nip'],
            'nrp'               => $data['nrp'],
            'username'          => $data['username'],
            'name'              => $data['name'],
            'satker'            => $data['satker'],
            'role'              => $data['role'],
            'email'             => $data['email'],
            'phone'             => $data['phone'],
            'password'          => $data['password'],
            'photo'             => $photo,
            'users_id'          => Session::get('data')['id'],
            'browser'           => $agent->browser(),
            'browser_version'   => $agent->version($agent->browser()),
            'os'                => $agent->platform(),
            'ip_address'        => Request::ip(),
            'mobile'            => $agent->device(),
        ])->json();
    }

    public static function update($photo, $id, $data)
    {
        if (!$photo == null) {
            return Http::withToken(Session::get('data')['token'])->attach('photo', file_get_contents($photo), mt_rand() . '.' . $photo->getClientOriginalExtension())
                ->post(env('API_URL', '') . '/user' . '/' . $id . '/update', $data);
        } else {
            return Http::withToken(Session::get('data')['token'])->post(env('API_URL', '') . '/user' . '/' . $id . '/update', $data);
        }
    }

    public static function status($id, $status)
    {
        return Http::withToken(Session::get('data')['token'])->get(env('API_URL', '') . '/user' . '/' . $id . '/status' . '/' . $status);
    }

    public static function delete($id)
    {
        return Http::withToken(Session::get('data')['token'])->get(env('API_URL', '') . '/user' . '/' . $id . '/delete', log::insert());
    }
}
