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
            return Http::withToken(profile::getToken())->get(env('API_URL', '') . '/satker')->json()['data'];
        } catch (\Throwable $th) {
            Session::forget('user');
            return redirect()->route('logout');
        }
    }

    public static function find($id)
    {
        try {
            $data = Http::withToken(profile::getToken())->post(env('API_URL', '') . '/satker/' . $id, log::insert());
            return $data;
        } catch (\Throwable $th) {
            Session::forget('user');
            return redirect()->route('logout');
        }
    }

    public static function status($id, $status)
    {
        return Http::withToken(profile::getToken())->get(env('API_URL', '') . '/satker' . '/' . $id . '/status' . '/' . $status);
    }

    public static function delete($id)
    {
        return Http::withToken(profile::getToken())->get(env('API_URL', '') . '/satker' . '/' . $id . '/delete', log::insert());
    }

    public static function search($category, $search)
    {
        try {
            $response = Http::withToken(profile::getToken())->get(env('API_URL', '') . '/satker/search', [
                'category'  => $category,
                'search'    => $search
            ]);
            return $response->json();
        } catch (\Throwable $th) {
            return  ['error' => $th];
        }
    }

    public static function store($data)
    {
        $agent = new Agent();
        return Http::withToken(profile::getToken())->post(env('API_URL', '') . '/satker/store', [
            'satker'          => $data['satker'],
            'type'            => $data['type'],
            'phone'           => $data['phone'],
            'email'           => $data['email'],
            'address'         => $data['address'],
            'users_id'        => profile::getUser()['id'],
            'username'        => profile::getUser()['users']['username'],
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
        return Http::withToken(profile::getToken())->post(env('API_URL', '') . '/satker/' . $id . '/update', [
            'satker'          => $data['satker'],
            'type'            => $data['type'],
            'phone'           => $data['phone'],
            'email'           => $data['email'],
            'address'         => $data['address'],
            'users_id'        => profile::getUser()['id'],
            'username'        => profile::getUser()['users']['username'],
            'browser'         => $agent->browser(),
            'browser_version' => $agent->version($agent->browser()),
            'os'              => $agent->platform(),
            'ip_address'      => Request::ip(),
            'mobile'          => $agent->device(),
        ]);
    }
}
