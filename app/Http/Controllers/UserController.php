<?php

namespace App\Http\Controllers;

use App\API\UserApi;
use App\Exports\UserExport;
use App\Helpers\profile;
use App\Http\Requests\UserRequest;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request as FacadesRequest;
use Illuminate\Support\Facades\Session;
use Jenssegers\Agent\Agent;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    public function index()
    {
        try {
            $route1 = 'user';
            $route2 = 'search';
            $title = 'Manajemen User';
            $profile = profile::getUser();
            if ($profile['roles'] == 'superadmin') {
                $data = UserApi::get()['data'];
                return view('user.index', compact('title', 'data', 'profile', 'route1', 'route2'));
            }
            return redirect()->route('dashboard');
        } catch (\Throwable $th) {
            Session::forget('user');
            return redirect()->route('logout');
        }
    }

    public function search(Request $req)
    {
        $title = 'Manajemen User';
        $profile = profile::getUser();
        $data = UserApi::search($req->category, $req->search)['data'];
        return view('user.search', compact('title', 'data', 'profile'))->render();
    }

    public function store(UserRequest $request)
    {
        $data = [
            'nip'       => $request->nip,
            'nrp'       => $request->nrp,
            'username'  => $request->username,
            'name'      => $request->name,
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
                return redirect()->route('user.index');
            }

            Alert::success('Berhasil', 'Berhasil menambah user');
            session()->flash('status', 'Menambahkan user ' . $request->username);
            session()->flash('route', route('user.index'));
            return redirect()->route('user.index');
        }
    }

    public function updateView($id)
    {
        try {
            $data = UserApi::find($id)->json();
            if ($data['status'] == true) {
                $item = $data['data'];
                $title = 'Ubah User';
                $profile = profile::getUser();
                return view('user.update', compact('title', 'item', 'profile'));
            } else {
                Alert::error('Error', $data->json()['message']);
                return redirect()->to('user.index');
            }
        } catch (\Throwable $th) {
            Alert::error('Error', $th->getMessage());
            return redirect()->to('user.index');
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
            session()->flash('route', route('user.index'));
            if (request()->routeIs('profile')) {
                Alert::success('Berhasil', 'Mengubah data profil');
                return back();
            }
            return redirect()->route('user.index');
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
        session()->flash('route', route('user.index'));
        return redirect()->route('user.index');
    }

    public function destroy(Request $req)
    {
        try {
            $user = UserApi::find($req->id)->json();
            $del = UserApi::delete($req->id);
            if (!$del->failed()) {
                Alert::success('Berhasil', 'User berhasil dihapus');
                session()->flash('status', 'Menghapus user ' . $user['data']['users']['name']);
                session()->flash('route', route('user.index'));
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
        $data['list'] = UserApi::get();
        $pdf = Pdf::loadView('exports.pdf.users', $data);
        return $pdf->download('test.pdf');
    }
}
