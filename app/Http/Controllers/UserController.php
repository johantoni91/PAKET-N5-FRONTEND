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
    private $title = 'Manajemen Pengguna';
    private $view  = 'user.index';

    public function index()
    {
        $data = UserApi::get()['data'];
        return view($this->view, [
            'view'        => $this->view,
            'title'       => $this->title,
            'data'        => $data,
            'roles'       => RoleApi::get()['data'],
            'satker'      => Http::withToken(Session::get('data')['token'])->get(env('API_URL', '') . '/satker')->json()['data']['data'],
            'starterPack' => helper::starterPack()
        ]);
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
            'satker'      => Http::withToken(Session::get('data')['token'])->get(env('API_URL', '') . '/satker')->json()['data']['data'],
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
                'role'      => request('role'),
                'status'    => request('status'),
            ];
            if (
                $input['nip'] == null &&
                $input['nrp'] == null &&
                $input['username'] == null &&
                $input['name'] == null &&
                $input['email'] == null &&
                $input['phone'] == null &&
                $input['role'] == null &&
                $input['status'] == null
            ) {
                Alert::warning('Peringatan', 'Mohon isi salah satu!');
                return back();
            }
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
            Alert::warning('Kesalahan', $th->getMessage());
            return back();
        }
    }

    public function store(Request $request, $role)
    {
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

            $this->validate($request, [
                'nip'               => 'required',
                'nrp'               => 'required',
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

                if (Session::get('data')['users_id'] == $id) {
                    Session::flush();
                    Session::put('user', $res->json()['data']);
                }
                Alert::success('Berhasil', 'User berhasil diubah');
                if (request()->routeIs('profile')) {
                    Alert::success('Berhasil', 'Mengubah data profil');
                    return back();
                }
                return back();
            }
        } catch (\Throwable $th) {
            Alert::error('Terjadi Kesalahan', 'Mohon refresh halaman dan silahkan coba lagi');
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
            $user = UserApi::find($req->id)->json();
            $del = UserApi::delete($req->id);
            if (!$del->failed()) {
                Alert::success('Berhasil', 'User berhasil dihapus');
                session()->flash('status', 'Menghapus user ' . $user['data']['users']['name']);
                session()->flash('route', route('user'));
                return response($del->json()['message'], 200);
            } else {
                Alert::error('Terjadi kesalahan', $del->json()['error']);
                return response($del->json()['message'], 200);
            }
        } catch (\Throwable $th) {
            Alert::error('Terjadi kesalahan', $th->getMessage());
            return response($th->getMessage(), 400);
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
