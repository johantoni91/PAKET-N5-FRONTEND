<?php

namespace App\Http\Controllers;

use App\API\PerangkatAPI;
use Carbon\Carbon;
use helper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;

class DeviceController extends Controller
{
    private $view = 'perangkat.index';
    private $title = 'Manajemen Perangkat';

    function index()
    {
        try {
            return view($this->view, [
                'view'        => $this->view,
                'title'       => $this->title,
                'data'        => Http::withToken(Session::get('data')['token'])->get(env('API_URL', '') . '/perangkat' . '/' . Session::get('data')['satker'])->json()['data'],
                'starterPack' => helper::starterPack()
            ]);
        } catch (\Throwable $th) {
            return redirect()->route('logout');
        }
    }

    function search()
    {
        $input = ['satker_name' => request('satker'), 'satker_type' => request('type'), 'profile' => session('data')['satker'], 'pagination' => request('pagination') ?? 5];
        $result = Http::withToken(session('data')['token'])->get(env('API_URL', '') . '/perangkat/search', $input)->json()['data'];
        return view($this->view, [
            'view'        => $this->view,
            'title'       => $this->title,
            'data'        => $result,
            'input'       => $input,
            'starterPack' => helper::starterPack()
        ]);
    }

    function update(Request $req, $id)
    {
        try {
            $input = [
                'user'      => $req->user,
                'password'  => $req->password
            ];
            $update = Http::withToken(Session::get('data')['token'])->post(env('API_URL', '') . '/perangkat' . '/' . $id . '/update', $input)->json();
            if ($update['status'] == true) {
                Alert::success('Berhasil', 'Data perangkat telah diubah');
                return back();
            }
        } catch (\Throwable $th) {
            Alert::error('Gagal', 'Data perangkat gagal diubah, cek kembali form pengisian');
            return back();
        }
    }

    function resetKiosK()
    {
        try {
            $reset = Http::withToken(Session::get('data')['token'])->get(env('API_URL', '') . '/perangkat/import');
            if ($reset['status'] == true) {
                Alert::success('Sukses', 'Berhasil melakukan reset ulang');
                return back();
            }
        } catch (\Throwable $th) {
            return redirect()->route('perangkat');
        }
    }

    function perangkat()
    {
        return view('perangkat.perangkat', [
            'view'        => 'perangkat.perangkat',
            'title'       => 'Manajemen Peralatan',
            'data'        => Http::withToken(Session::get('data')['token'])->get(env('API_URL', '') . '/perangkat/tm_hardware')->json()['data'],
            'starterPack' => helper::starterPack()
        ]);
    }

    function rincianPerangkat($id)
    {
        $perangkat = Http::withToken(Session::get('data')['token'])->get(env('API_URL', '') . '/perangkat/tm_hardware')->json()['data'];
        return view('perangkat.rincian', [
            'view'        => 'perangkat.rincian',
            'title'       => 'Data Peralatan',
            'id'          => $id,
            'perangkat'   => $perangkat,
            'starterPack' => helper::starterPack()
        ]);
    }

    function storeAlatSatker(Request $req, $id)
    {
        try {
            if (!$req->file('photo') && !$req->serial_number) {
                Alert::warning('Peringatan', 'Harap isi semua foto alat!');
                return back();
            }
            if (!$req->file('photo') || !$req->serial_number) {
                Alert::warning('Peringatan', 'Harap isi nomor seri pada alat!');
                return back();
            }

            $perangkat = Http::withToken(session('data')['token'])->get(env('API_URL', '') . '/perangkat' . '/' . $id . '/find')->json()['data'];
            for ($num = 0; $num < count($req->id_perangkat); $num++) {
                if (!$req->serial_number[$num]) {
                    Alert::warning('Peringatan', 'Harap isi semua nomor seri!');
                    return back();
                }
                $res = Http::withToken(session('data')['token'])
                    ->attach('photo', file_get_contents($req->file('photo')[$num]), $req->id_perangkat[$num] . '_' . $req->serial_number[$num] . '_' . Carbon::now()->format('dmY_His') . '.' . $req->file('photo')[$num]->getClientOriginalExtension())
                    ->post(env('API_URL', '') . '/perangkat/tc_hardware', [
                        'id_perangkat'  => $req->id_perangkat[$num],
                        'id_satker'     => $perangkat['satker'],
                        'serial_number' => $req->serial_number[$num]
                    ])->json();
            }
            if ($res['status'] == false) {
                Alert::error('Error', 'Gagal menyimpan data alat');
                return redirect()->route('perangkat');
            } else {
                Alert::success('Berhasil', 'Berhasil menyimpan data alat');
                return redirect()->route('perangkat');
            }
        } catch (\Throwable $th) {
            Alert::error('Error');
            return back();
        }
    }

    function updateRincianPerangkatView($id)
    {
        $tools = Http::withToken(session('data')['token'])->get(env('API_URL', '') . '/perangkat' . '/' . $id . '/find/tools/tc_hardware')->json()['data'];
        return view('perangkat.update_rincian', [
            'view'        => 'perangkat.rincian',
            'title'       => 'Data Peralatan',
            'id'          => $id,
            'perangkat'   => $tools,
            'starterPack' => helper::starterPack()
        ]);
    }

    function updateRincianPerangkatSatker(Request $req, $id)
    {
        try {
            for ($num = 0; $num < count($req->id_perangkat); $num++) {
                if (!$req->serial_number[$num]) {
                    Alert::warning('Peringatan', 'Harap isi semua nomor seri!');
                    return back();
                }
                if (isset($req->file('photo')[$num])) {
                    $res = Http::withToken(session('data')['token'])
                        ->attach('photo', file_get_contents($req->file('photo')[$num]), $req->id_perangkat[$num] . '_' . $req->serial_number[$num] . '_' . Carbon::now()->format('dmY_His') . '.' . $req->file('photo')[$num]->getClientOriginalExtension())
                        ->post(env('API_URL', '') . '/perangkat' . '/' . $req->id[$num] . '/update/tc_hardware', [
                            'id_perangkat'  => $req->id_perangkat[$num],
                            'id_satker'     => $id,
                            'serial_number' => $req->serial_number[$num]
                        ])->json();
                } else {
                    $res = Http::withToken(session('data')['token'])
                        ->post(env('API_URL', '') . '/perangkat' . '/' . $req->id[$num] . '/update/tc_hardware', [
                            'id_perangkat'  => $req->id_perangkat[$num],
                            'id_satker'     => $id,
                            'serial_number' => $req->serial_number[$num],
                            'photo'         => $req->file('photo')
                        ])->json();
                }
            }
            if ($res['status'] == false) {
                Alert::error('Error', 'Gagal mengubah data alat');
                return redirect()->route('perangkat');
            } else {
                Alert::success('Berhasil', 'Berhasil mengubah data alat');
                return redirect()->route('perangkat');
            }
        } catch (\Throwable $th) {
            Alert::error('Error');
            return back();
        }
    }

    function storeAlat(Request $req)
    {
        $store = Http::withToken(session('data')['token'])->post(env('API_URL', '') . '/perangkat/tm_hardware', ['perangkat' => $req->perangkat])->json();
        if ($store['status'] == false) {
            Alert::error('Gagal', $store['message']);
            return back();
        }
        Alert::success('Sukses', 'Berhasil menambahkan alat!');
        return back();
    }

    function updateAlat(Request $req, $id)
    {
        $update = Http::withToken(session('data')['token'])->post(env('API_URL', '') . '/perangkat' . '/' . $id . '/update/tm_hardware', ['perangkat' => $req->perangkat, 'status' => $req->status])->json();
        if ($update['status'] == false) {
            Alert::error('Gagal', $update['message']);
            return back();
        }
        Alert::success('Berhasil', 'Alat berhasil diubah!');
        return back();
    }

    function destroyAlat($id)
    {
        $destroy = PerangkatAPI::alatGet(env('API_URL', '') . '/perangkat' . '/' . $id . '/destroy/tm_hardware');
        if ($destroy['status'] == false) {
            Alert::error('Gagal', $destroy['message']);
            return back();
        }
        Alert::success('Berhasil', 'Alat berhasil diubah!');
        return back();
    }
}
