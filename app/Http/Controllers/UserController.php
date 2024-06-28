<?php

namespace App\Http\Controllers;

use App\API\PegawaiApi;
use App\API\RoleApi;
use App\API\SatkerApi;
use App\API\UserApi;
use App\Exports\UserExport;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use helper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Request as FacadesRequest;
use Illuminate\Support\Facades\Session;
use Jenssegers\Agent\Agent;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    private $title = 'Manajemen Users';
    private $view  = 'user.index';

    public function index()
    {
        try {
            $data = UserApi::get()['data'];
            return view($this->view, [
                'view'        => $this->view,
                'title'       => $this->title,
                'data'        => $data,
                'roles'       => RoleApi::get()['data'],
                'starterPack' => helper::starterPack()
            ]);
        } catch (\Throwable $th) {
            return redirect()->route('logout');
        }
    }

    public function role(Request $req)
    {
        return redirect('/user' . '/' . $req->roles . '/create');
    }

    public function create($role)
    {
        return view('user.create', [
            'title'       => $this->title,
            'role'        => $role,
            'starterPack' => helper::starterPack()
        ]);
    }

    public function search()
    {
        try {
            $input = [
                'nip'       => request('nip'),
                'nrp'       => request('nrp'),
                'username'  => request('username'),
                'name'      => request('name'),
                'email'     => request('email'),
                'phone'     => request('phone'),
                'role'      => request('role') ?? session('data')['roles'],
                'status'    => request('status'),
                'page'      => request('page')
            ];
            $data = UserApi::search($input)['data'];
            return view(
                $this->view,
                [
                    'view'        => $this->view,
                    'title'       => $this->title,
                    'data'        => $data,
                    'input'       => $input,
                    'roles'       => RoleApi::get()['data'],
                    'starterPack' => helper::starterPack()
                ]
            );
        } catch (\Throwable $th) {
            Alert::warning('Terjadi kesalahan');
            return back();
        }
    }

    public function store(Request $request, $role)
    {
        if (!(($request->nip || $request->nrp) && $request->username && $request->name && $request->email && $request->phone && $request->password)) {
            Alert::error('Peringatan!', 'Harap isi semua form yang tersedia!');
            return back();
        }
        $pegawai = PegawaiApi::find($request->nip)['data'];
        if (!$pegawai) {
            Alert::warning('Peringatan', 'Pegawai tidak ditemukan, mohon masukkan NIP & NRP dengan benar');
            return back();
        }
        $satker = SatkerApi::findByName($pegawai['nama_satker']);
        $input = [
            'nip'       => $request->nip,
            'nrp'       => $request->nrp,
            'username'  => $request->username,
            'name'      => $request->name,
            'satker'    => $satker['satker_code'],
            'role'      => $role,
            'email'     => $request->email,
            'phone'     => $request->phone,
            'password'  => $request->password,
        ];
        if ($role == 'pegawai') {
            $input['username'] = $request->nip;
            $input['name'] = $pegawai['nama'];
        }
        if ($request->nip == null && $request->nrp == null) {
            Alert::error('Terjadi kesalahan', 'Mohon isi salah satu NIP / NRP atau dua-duanya');
            return back();
        } else {
            if ($pegawai['nama_satker'] != SatkerApi::satkerNameProfile() && session('data')['satker'] != '00') {
                Alert::warning('Peringatan', 'Pegawai tidak terdaftar pada satker ini!');
                return back();
            }
            $res = UserApi::insert($role == 'pegawai' ? null : $request->file('photo'), $input);
            if ($res['status'] == false) {
                Alert::warning('Peringatan', $res['message']);
                return back();
            }
            Alert::success('Berhasil', 'Berhasil menambah user');
            return redirect()->route('user');
        }
    }

    public function update(Request $request, $id)
    {
        try {
            if ($request->nip == null && $request->nrp == null) {
                Alert::error('Terjadi kesalahan', 'Mohon isi salah satu NIP / NRP atau dua-duanya');
                return back();
            }
            $agent = new Agent();
            $satker = SatkerApi::findByName($request->satker)['satker_code'];
            $data = [
                'nip'               => $request->nip,
                'nrp'               => $request->nrp,
                'username'          => $request->username,
                'name'              => $request->name,
                'email'             => $request->email,
                'phone'             => $request->phone,
                'satker'            => $satker,
                'roles'             => $request->roles,
                'photo'             => $request->file('photo'),
                'password'          => $request->password,
                'browser'           => $agent->browser(),
                'browser_version'   => $agent->version($agent->browser()),
                'os'                => $agent->platform(),
                'ip_address'        => FacadesRequest::ip(),
                'mobile'            => $agent->device(),
            ];

            $request->validate([
                'username'          => 'required',
                'name'              => 'required',
                'email'             => 'required|email:rfc,dns',
                'phone'             => 'required|numeric',
                'satker'            => 'required',
                'roles'             => 'required',
            ]);

            $res = UserApi::update($data['photo'], $id, $data);
            if ($res->failed()) {
                Alert::error('Gagal', 'User gagal diubah');
                return back();
            } else {
                if ($res->json()['status'] == false) {
                    Alert::error('Kesalahan', $res->json()['message'] . " Dengan username " . '"' . $res->json()['data']['username'] . '"');
                    return back();
                }
                Alert::success('Berhasil', 'User berhasil diubah');
                if (request()->routeIs('profile')) {
                    Alert::success('Berhasil', 'Mengubah data profil');
                    return back();
                }
                return back();
            }
        } catch (\Throwable $th) {
            Alert::error('Terjadi Kesalahan');
            return back();
        }
    }

    public function searchSatker($satker)
    {
        try {
            return response()->json([
                'data' => Http::withToken(Session::get('data')['token'])->post(env('API_URL', '') . '/satker/name', ['satker' => $satker])->json()['data']
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'data' => null
            ], 200);
        }
    }

    public function status($id, $status)
    {
        $res = UserApi::status($id, $status);
        if ($res->failed()) {
            Alert::error('Gagal', 'Gagal ubah status');
            return back();
        }
        Alert::success('Berhasil', 'Status telah diubah');
        return back();
    }

    public function destroy(Request $req)
    {
        try {
            $del = UserApi::delete($req->id);
            if (!$del->failed()) {
                Alert::success('Berhasil', 'User berhasil dihapus');
                return response($del->json()['message'], 200);
            } else {
                Alert::error('Terjadi kesalahan', $del->json()['error']);
                return response($del->json()['message'], 200);
            }
        } catch (\Throwable $th) {
            Alert::error('Terjadi kesalahan');
            return response('Terjadi kesalahan', 400);
        }
    }

    function excel()
    {
        return Excel::download(new UserExport, Carbon::now()->format('d_m_Y') . '.' . 'xlsx');
    }

    function pdf()
    {
        $data['list'] = UserApi::get()['data']['data'];
        $pdf = Pdf::loadView('exports.pdf.users', $data);
        return $pdf->download('Users' . Carbon::now()->format('dmY') . '.pdf');
    }
}
