<?php


namespace App\API;

use App\Helpers\log;
use App\Helpers\profile;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Session;
use Jenssegers\Agent\Agent;

class PegawaiApi
{
    public static function get()
    {
        try {
            return Http::withToken(profile::getToken())->get(env('API_URL', '') . '/pegawai')->json();
        } catch (\Throwable $th) {
            Session::forget('user');
            return redirect()->route('logout');
        }
    }

    public static function search($input)
    {
        try {
            $response = Http::withToken(profile::getToken())->get(env('API_URL', '') . '/pegawai/search', $input);
            return $response->json();
        } catch (\Throwable $th) {
            return  ['error' => $th];
        }
    }

    public static function find($id)
    {
        try {
            $data = Http::withToken(profile::getToken())->post(env('API_URL', '') . '/pegawai/' . $id, log::insert());
            return $data;
        } catch (\Throwable $th) {
            Session::forget('user');
            return redirect()->route('logout');
        }
    }

    public static function destroy($nip)
    {
        try {
            return Http::withToken(profile::getToken())->get(env('API_URL', '') . '/pegawai/' . $nip . '/destroy')->json();
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public static function insert($foto, $gambar, $input)
    {
        try {
            $agent = new Agent();
            return Http::withToken(profile::getToken())->attach('photo', file_get_contents($foto), $gambar)
                ->post(env('API_URL', '') . '/pegawai/store', [
                    'nip'               => $input['nip'],
                    'nrp'               => $input['nrp'],
                    'nama'              => $input['nama'],
                    'jabatan'           => $input['jabatan'],
                    'tgl_lahir'         => $input['tgl_lahir'],
                    'eselon'            => $input['eselon'],
                    'GOL_KD'            => $input['GOL_KD'],
                    'golpang'           => $input['golpang'],
                    'jenis_kelamin'     => $input['jenis_kelamin'],
                    'nama_satker'       => $input['nama_satker'],
                    'agama'             => $input['agama'],
                    'status_pegawai'    => $input['status_pegawai'],
                    'jaksa_tu'          => $input['jaksa_tu'],
                    'struktural_non'    => $input['struktural_non'],
                    'users_id'        => profile::getUser()['id'],
                    'username'        => profile::getUser()['users']['username'],
                    'browser'         => $agent->browser(),
                    'browser_version' => $agent->version($agent->browser()),
                    'os'              => $agent->platform(),
                    'ip_address'      => Request::ip(),
                    'mobile'          => $agent->device(),
                ]);
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public static function update($id, $img, $gambar, $input)
    {
        try {
            $agent = new Agent();
            if ($img) {
                return Http::withToken(profile::getToken())->attach('photo', file_get_contents($img), $gambar)
                    ->post(env('API_URL', '') . '/pegawai/' . $id . '/update', [
                        'nip'             => $input['nip'],
                        'nrp'             => $input['nrp'],
                        'nama'            => $input['nama'],
                        'jabatan'         => $input['jabatan'],
                        'tgl_lahir'       => $input['tgl_lahir'],
                        'eselon'          => $input['eselon'],
                        'GOL_KD'          => $input['GOL_KD'],
                        'golpang'         => $input['golpang'],
                        'jenis_kelamin'   => $input['jenis_kelamin'],
                        'nama_satker'     => $input['nama_satker'],
                        'agama'           => $input['agama'],
                        'status_pegawai'  => $input['status_pegawai'],
                        'jaksa_tu'        => $input['jaksa_tu'],
                        'struktural_non'  => $input['struktural_non'],
                        'users_id'        => profile::getUser()['id'],
                        'username'        => profile::getUser()['users']['username'],
                        'browser'         => $agent->browser(),
                        'browser_version' => $agent->version($agent->browser()),
                        'os'              => $agent->platform(),
                        'ip_address'      => Request::ip(),
                        'mobile'          => $agent->device(),
                    ]);
            } else {
                return Http::withToken(profile::getToken())->post(env('API_URL', '') . '/pegawai/' . $id . '/update', [
                    'nip'             => $input['nip'],
                    'nrp'             => $input['nrp'],
                    'nama'            => $input['nama'],
                    'jabatan'         => $input['jabatan'],
                    'tgl_lahir'       => $input['tgl_lahir'],
                    'eselon'          => $input['eselon'],
                    'GOL_KD'          => $input['GOL_KD'],
                    'golpang'         => $input['golpang'],
                    'jenis_kelamin'   => $input['jenis_kelamin'],
                    'nama_satker'     => $input['nama_satker'],
                    'photo'           => $img,
                    'agama'           => $input['agama'],
                    'status_pegawai'  => $input['status_pegawai'],
                    'jaksa_tu'        => $input['jaksa_tu'],
                    'struktural_non'  => $input['struktural_non'],
                    'users_id'        => profile::getUser()['id'],
                    'username'        => profile::getUser()['users']['username'],
                    'browser'         => $agent->browser(),
                    'browser_version' => $agent->version($agent->browser()),
                    'os'              => $agent->platform(),
                    'ip_address'      => Request::ip(),
                    'mobile'          => $agent->device(),
                ]);
            }
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
}
