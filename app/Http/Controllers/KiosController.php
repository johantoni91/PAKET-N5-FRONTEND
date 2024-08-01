<?php

namespace App\Http\Controllers;

use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;

class KiosController extends Controller
{
    function loginPage()
    {
        // $output = shell_exec("pip3 install pyzbar opencv-python");
        // dd($output);
        return view('kiosK.login');
    }

    function login(Request $req)
    {
        $login = Http::post(env('API_URL', '') . '/login-kios', [
            'user'      => $req->username,
            'password'  => $req->password
        ])->json();

        if ($login['status'] == false) {
            Alert::warning('Gagal masuk', $login['message']);
            return back();
        }
        Session::put('kios', $login['data']);
        return redirect()->route('kios.dashboard');
    }

    function dashboard()
    {
        try {
            $satker = Http::withToken(session('kios')['serial_number'])->get(env('API_URL', '') . '/satker' . '/' . session('kios')['id_satker'] . '/code-kios')->json()['data'];
            return view('kiosK.dashboard', compact('satker'));
        } catch (\Throwable $th) {
            Session::forget('kios');
            return redirect()->route('kios');
        }
    }

    function tokenPage()
    {
        try {
            $satker = Http::withToken(session('kios')['serial_number'])->get(env('API_URL', '') . '/satker' . '/' . session('kios')['id_satker'] . '/code-kios')->json()['data'];
            return view('kiosK.cetak.token', compact('satker'));
        } catch (\Throwable $th) {
            Session::forget('kios');
            return redirect()->route('kios');
        }
    }

    function token(Request $req)
    {
        try {
            $check = Http::withToken(session('kios')['serial_number'])->post(env('API_URL', '') . '/kios/check-token', ['token' => $req->token])->json();
            if ($check['status'] == false) {
                Alert::warning('Peringatan', 'Token yang anda masukkan salah!');
                return back();
            }
            Alert::success('Pemberitahuan', 'Kartu telah diverifikasi, kartu sedang dicetak.');
            return back();
        } catch (\Throwable $th) {
            Alert::error('Terjadi kesalahan');
            return back();
        }
    }

    function verifikasi($token)
    {
        try {
            $check = Http::withToken(session('kios')['serial_number'])->post(env('API_URL', '') . '/kios/check-token', ['token' => $token])->json();
            if ($check['status'] == false) {
                return redirect()->route('kios.token');
            }
            return view('kiosK.cetak.verifikasi', [
                'token' => $token
            ]);
        } catch (\Throwable $th) {
            Session::forget('kios');
            return redirect()->route('kios');
        }
    }

    function storeVerifikasi(Request $req, $token)
    {
        $img = $req->photo;
        $image_parts = explode(";base64,", $img);
        $image_base64 = base64_decode($image_parts[1]);
        $res = Http::withToken(session('kios')['serial_number'])
            ->attach('photo', $image_base64, uniqid() . '.png')
            ->post(env('API_URL', '') . '/kios/verifikasi', ['token' => $token])->json();
        if ($res['status'] == false) {
            Alert::warning('Terjadi kesalahan', 'Mohon verifikasi ulang');
            return back();
        }
        Alert::success('Berhasil');
        return redirect()->route('kios.kartu', $token);
    }

    function kartu($token)
    {
        try {
            $data = Http::withToken(session('kios')['serial_number'])->get(env('API_URL', '') . '/kios' . '/' . $token . '/kartu')->json()['data'];
            return view('kiosK.dummy.kartu', [
                'pengajuan'  => $data['pengajuan'],
                'pegawai'    => $data['pegawai'],
                'kartu'      => $data['kartu']
            ]);
        } catch (\Throwable $th) {
            Session::forget('kios');
            return redirect()->route('kios');
        }
    }

    function checkTokenPage()
    {
        try {
            try {
                $satker = Http::withToken(session('kios')['serial_number'])->get(env('API_URL', '') . '/satker' . '/' . session('kios')['id_satker'] . '/code-kios')->json()['data'];
                return view('kiosK.kartu.check_token', compact('satker'));
            } catch (\Throwable $th) {
                Session::forget('kios');
                return redirect()->route('kios');
            }
        } catch (\Throwable $th) {
            Alert::error('Terjadi kesalahan');
            return back();
        }
    }

    function checkToken(Request $req)
    {
        try {
            $check = Http::withToken(session('kios')['serial_number'])->post(env('API_URL', '') . '/kios/check-token', ['token' => $req->token])->json();
            if ($check['status'] == false) {
                Alert::warning('Peringatan', 'Token yang anda masukkan salah!');
                return back();
            }
            return redirect()->route('kios.rfid.page', $req->token);
        } catch (\Throwable $th) {
            Alert::error('Terjadi kesalahan');
            return back();
        }
    }

    function nfc()
    {
        try {
            $path = base_path('public/assets/python/script.py');
            $output = shell_exec("python3 $path");
            return response()->json([
                'data' => $output
            ]);
        } catch (\Throwable $th) {
            return response('Gagal', 400);
        }
    }

    function rfidPage($token)
    {
        try {
            $check = Http::withToken(session('kios')['serial_number'])->post(env('API_URL', '') . '/kios/check-token', ['token' => $token])->json();
            if ($check['status'] == false) {
                return redirect()->route('kios.dashboard');
            }
            $satker = Http::withToken(session('kios')['serial_number'])->get(env('API_URL', '') . '/satker' . '/' . session('kios')['id_satker'] . '/code-kios')->json()['data'];
            return view('kiosK.kartu.scan_rfid', ['satker' => $satker, 'token' => $token]);
        } catch (\Throwable $th) {
            Session::forget('kios');
            return redirect()->route('kios');
        }
    }

    function rfidStore(Request $req)
    {
        try {
            $res = Http::withToken(session('kios')['serial_number'])->post(env('API_URL', '') . '/nfc/store', ['token' => $req->token, 'uid' => $req->rfid])->json();
            if ($res['status'] == false) {
                Alert::warning('Peringatan', $res['message']);
                return back();
            }
            return redirect()->route('kios.profil', $res['data']['uid_kartu']);
        } catch (\Throwable $th) {
            Alert::error('Gagal');
            return back();
        }
    }

    function profil($uid)
    {
        try {
            $satker = Http::withToken(session('kios')['serial_number'])->get(env('API_URL', '') . '/satker' . '/' . session('kios')['id_satker'] . '/code-kios')->json()['data'];
            $info = Http::withToken(session('kios')['serial_number'])->get(env('API_URL', '') . '/nfc' . '/' . $uid . '/pegawai')->json();
            if ($info['status'] == false) {
                Alert::error('Kartu tidak terdaftar, infokan admin satker anda.');
                return redirect()->route('kios.dashboard');
            }
            $pegawai = $info['data'];
            return view('kiosK.profile.index', compact('pegawai', 'satker'));
        } catch (\Throwable $th) {
            Alert::error('Kartu tidak terdaftar, infokan admin satker anda.');
            return redirect()->route('kios.dashboard');
        }
    }
}
