<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class KepegawaianController extends Controller
{
    public function index()
    {
        try {
            $kepegawaian = KepegawaianApi::get();
            if ($kepegawaian->successful()) {
                return view('kepegawaian.index', compact('kepegawaian'));
            }
        } catch (\Throwable $th) {
            Alert::error('Error', $th->getMessage());
            return back();
        }
    }

    public function update(Request $req, $id)
    {
        try {
            $kepegawaian = KepegawaianApi::update($id);
            if ($kepegawaian) {
                session()->flash('notif', 'Mengubah user ' . $data['name']);
                return redirect()->to('kepegawaian.index');
            }
        } catch (\Throwable $th) {
            Alert::error('error', $th->getMessage());
            return back();
        }
    }

    public function delete($id)
    {
        try {
            $data = Kepegawaian::find($id);
            $kepegawaian = Kepegawaian::delete($id);
            session()->flash('notif', 'Menghapus user ' . $data['name']);
            Alert::success('Berhasil', 'Data pegawai berhasil dihapus');
            return back();
        } catch (\Throwable $th) {
            Alert::error('error', $th->getMessage());
            return back();
        }
    }
}
