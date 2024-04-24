<?php

namespace App\Http\Controllers;

use App\API\RoleApi;
use App\API\SatkerApi;
use App\API\UserApi;
use App\Exports\UserExport;
use App\Helpers\profile;
use App\Http\Requests\UserRequest;
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
    private $title = 'Manajemen User';
    private $view  = 'user.index';

    public function index()
    {
        $data = UserApi::get()['data'];
        return view($this->view, [
            'view'        => $this->view,
            'title'       => $this->title,
            'data'        => $data,
            'satker'      => SatkerApi::getCodeName()['data'],
            'roles'       => RoleApi::get()['data'],
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
                    'starterPack' => helper::starterPack()
                ]
            );
        } catch (\Throwable $th) {
            Alert::warning('Kesalahan', $th->getMessage());
            return back();
        }
    }

    public function store(UserRequest $request)
    {
        $data = [
            'nip'       => $request->nip,
            'nrp'       => $request->nrp,
            'username'  => $request->username,
            'name'      => $request->name,
            'satker'    => $request->satker,
            'roles'     => $request->roles,
            'email'     => $request->email,
            'phone'     => $request->phone,
            'password'  => $request->password,
        ];
        if ($request->nip == null && $request->nrp == null) {
            Alert::error('Terjadi kesalahan', 'Mohon isi salah satu NIP / NRP atau dua-duanya');
            session()->flash('error', $data);
            return back();
        } else {
            $photo = $request->file('photo');

            $res = UserApi::insert($photo, $data);
            if ($res->failed()) {
                Alert::error('Gagal', $res->json()['message']);
                return redirect()->route('user');
            }

            Alert::success('Berhasil', 'Berhasil menambah user');
            session()->flash('status', 'Menambahkan user ' . $request->username);
            session()->flash('route', route('user'));
            return redirect()->route('user');
        }
    }

    public function update(Request $request, $id)
    {
        if ($request->nip == null && $request->nrp == null) {
            Alert::error('Terjadi kesalahan', 'Mohon isi salah satu NIP / NRP atau dua-duanya');
            return back();
        }
        $agent = new Agent();
        $data = [
            'nip'               => $request->nip,
            'nrp'               => $request->nrp,
            'username'          => $request->username,
            'name'              => $request->name,
            'email'             => $request->email,
            'phone'             => $request->phone,
            'satker'            => $request->satker,
            'roles'             => $request->roles,
            'photo'             => $request->file('photo'),
            'password'          => $request->password,
            'browser'           => $agent->browser(),
            'browser_version'   => $agent->version($agent->browser()),
            'os'                => $agent->platform(),
            'ip_address'        => FacadesRequest::ip(),
            'mobile'            => $agent->device(),
        ];

        $res = UserApi::update($data['photo'], $id, $data);

        if ($res->failed()) {
            Alert::error('Gagal', 'User gagal diubah');
            return back();
        } else {
            if ($res->json()['status'] == false) {
                Alert::error('Kesalahan', $res->json()['message'] . " Dengan username " . '"' . $res->json()['data']['username'] . '"');
                return back();
            }

            if (profile::getUser()['users_id'] == $id) {
                Session::flush();
                Session::put('user', $res->json()['data']);
            }
            Alert::success('Berhasil', 'User berhasil diubah');

            session()->flash('status', 'Mengubah data user ' . $request->username);
            session()->flash('route', route('user'));
            if (request()->routeIs('profile')) {
                Alert::success('Berhasil', 'Mengubah data profil');
                return back();
            }
            return redirect()->route('user');
        }
    }

    public function status($id, $status)
    {
        $res = UserApi::status($id, $status);
        if ($res->failed()) {
            Alert::error('Gagal', 'Gagal ubah status');
            return back();
        }
        $user = UserApi::find($id);
        Alert::success('Berhasil', 'Status telah diubah');
        session()->flash('status', 'Mengubah status user ' . $user->json()['data']['users']["username"]);
        session()->flash('route', route('user'));
        return redirect()->route('user');
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
