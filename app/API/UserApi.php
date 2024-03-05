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
        try {
            $data = Http::withToken(profile::getToken())->get(env('API_URL', '') . '/users', log::insert());
            return $data->json();
        } catch (\Throwable $th) {
            Session::forget('user');
            return redirect()->route('logout');
        }
    }

    public static function search($category, $search)
    {
        try {
            $response = Http::withToken(profile::getToken())->get(env('API_URL', 'http://localhost:8001/api') . '/user/search', [
                'category'  => $category,
                'search'    => $search
            ]);
            return $response->json();
        } catch (\Throwable $th) {
            return  ['error' => $th];
        }
    }

    public static function find($id)
    {
        try {
            $data = Http::withToken(profile::getToken())->post(env('API_URL', '') . '/user/' . $id, log::insert());
            return $data;
        } catch (\Throwable $th) {
            Session::forget('user');
            return redirect()->route('logout');
        }
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
                    'roles'             => $data['roles'],
                    'email'             => $data['email'],
                    'phone'             => $data['phone'],
                    'password'          => $data['password'],
                    'photo'             => $photo,
                    'users_id'          => profile::getUser()['id'],
                    'browser'           => $agent->browser(),
                    'browser_version'   => $agent->version($agent->browser()),
                    'os'                => $agent->platform(),
                    'ip_address'        => Request::ip(),
                    'mobile'            => $agent->device(),
                ]);
        }
        return Http::post(env('API_URL', '') . '/register', [
            'nip'               => $data['nip'],
            'nrp'               => $data['nrp'],
            'username'          => $data['username'],
            'name'              => $data['name'],
            'roles'             => $data['roles'],
            'email'             => $data['email'],
            'phone'             => $data['phone'],
            'password'          => $data['password'],
            'photo'             => $photo,
            'users_id'          => profile::getUser()['id'],
            'browser'           => $agent->browser(),
            'browser_version'   => $agent->version($agent->browser()),
            'os'                => $agent->platform(),
            'ip_address'        => Request::ip(),
            'mobile'            => $agent->device(),
        ]);
    }

    public static function update($photo, $id, $data)
    {
        if (!$photo == null) {
            return Http::withToken(profile::getToken())->attach('photo', file_get_contents($photo), mt_rand() . '.' . $photo->getClientOriginalExtension())
                ->post(env('API_URL', '') . '/user' . '/' . $id . '/update', $data);
        } else {
            return Http::withToken(profile::getToken())->post(env('API_URL', '') . '/user' . '/' . $id . '/update', $data);
        }
    }

    public static function status($id, $status)
    {
        return Http::withToken(profile::getToken())->get(env('API_URL', '') . '/user' . '/' . $id . '/status' . '/' . $status);
    }

    public static function delete($id)
    {
        return Http::withToken(profile::getToken())->get(env('API_URL', '') . '/user' . '/' . $id . '/delete', log::insert());
    }
}
