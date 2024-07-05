<?php


namespace App\API;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Session;
use Jenssegers\Agent\Agent;

class PegawaiApi
{
    public static function get($satker)
    {
        return Http::withToken(Session::get('data')['token'])->get(env('API_URL', '') . '/pegawai/index' . '/' . $satker)->json();
    }

    public static function search($input)
    {
        return Http::withToken(Session::get('data')['token'])->get(env('API_URL', '') . '/pegawai' . '/' . session('data')['satker'] . '/search', $input)->json();
    }

    public static function find($nip)
    {
        return Http::withToken(Session::get('data')['token'])->get(env('API_URL', '') . '/pegawai' . '/' . $nip . '/find');
    }

    public static function destroy($nip)
    {
        try {
            return Http::withToken(Session::get('data')['token'])->get(env('API_URL', '') . '/pegawai/' . $nip . '/destroy')->json();
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public static function insert($foto, $gambar, $input)
    {
        try {
            return Http::withToken(Session::get('data')['token'])->attach('photo', file_get_contents($foto), $gambar)
                ->post(env('API_URL', '') . '/pegawai/store', self::arr($input));
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public static function update($id, $img, $gambar, $input)
    {
        try {
            $var = self::arr($input);
            if ($img) {
                return Http::withToken(Session::get('data')['token'])->attach('photo', file_get_contents($img), $gambar)
                    ->post(env('API_URL', '') . '/pegawai/' . $id . '/update', $var);
            } else {
                $var['photo'] = $img;
                return Http::withToken(Session::get('data')['token'])->post(env('API_URL', '') . '/pegawai/' . $id . '/update', $var);
            }
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    private static function arr($input): array
    {
        $agent = new Agent();
        return [
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
            'users_id'        => Session::get('data')['id'],
            'username'        => Session::get('data')['username'],
            'browser'         => $agent->browser(),
            'browser_version' => $agent->version($agent->browser()),
            'os'              => $agent->platform(),
            'ip_address'      => Request::ip(),
            'mobile'          => $agent->device(),
        ];
    }
}
