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
            $title = 'Manajemen User';
            $profile = profile::getUser();
            if ($profile['roles'] == 'superadmin') {
                $data = UserApi::get();
                return view('user.index', compact('title', 'data', 'profile'));
            }
            return redirect()->route('dashboard');
        } catch (\Throwable $th) {
            Session::forget('user');
            return redirect()->route('logout');
        }
    }

    public function store(UserRequest $request)
    {
        if ($request->nip == null && $request->nrp == null) {
            Alert::error('Terjadi kesalahan', 'Mohon isi salah satu NIP / NRP atau dua-duanya');
            return back();
        }
        $photo = $request->file('photo');
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

    public function destroy($id)
    {
        try {
            $del = UserApi::delete($id);
            if (!$del->failed()) {
                Alert::success('Berhasil', 'User berhasil dihapus');
                session()->flash('status', 'Menghapus user ' . $id);
                session()->flash('route', route('user.index'));
                return redirect()->route('user.index');
            }
            Alert::error('Terjadi kesalahan', $del->json()['error']);
            return back();
        } catch (\Throwable $th) {
            Alert::error('Terjadi kesalahan', $th->getMessage());
            return back();
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
