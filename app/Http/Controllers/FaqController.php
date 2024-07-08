<?php

namespace App\Http\Controllers;

use App\API\FaqApi;
use Carbon\Carbon;
use helper;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class FaqController extends Controller
{
    private $view = 'faq.index';
    private $title = 'Frequently Asked Question';

    function index()
    {
        try {
            $data = FaqApi::get()['data'];
            return view($this->view, [
                'view'        => $this->view,
                'title'       => $this->title,
                'data'        => $data,
                'starterPack' => helper::starterPack()
            ]);
        } catch (\Throwable $th) {
            return redirect()->route('logout');
        }
    }

    function store(Request $req)
    {
        try {
            $input = [
                'question'   => $req->question,
                'answer'     => $req->answer,
            ];
            if ($req->hasFile('lampiran')) {
                $image = $req->file('lampiran');
                $image_name = Carbon::now()->format('d_m_y_h_i_s') . '.' . $req->file('lampiran')->getClientOriginalExtension();
            }
            $res = FaqApi::store($input, $image, $image_name);
            if ($res['status'] == true) {
                Alert::success('Berhasil', 'FAQ telah ditambahkan');
                return redirect()->route('faq');
            }
        } catch (\Throwable $th) {
            Alert::error('Error');
            return back();
        }
    }

    function update(Request $req, $id)
    {
        try {
            $image = null;
            $image_name = null;
            $input = [
                'question'   => $req->question,
                'answer'     => $req->answer,
            ];
            if ($req->hasFile('lampiran')) {
                $image = $req->file('lampiran');
                $image_name = Carbon::now()->format('d_m_y_h_i_s') . '.' . $req->file('lampiran')->getClientOriginalExtension();
            }
            $res = FaqApi::update($id, $input, $image, $image_name);
            if ($res['status'] == true) {
                Alert::success('Berhasil', 'FAQ telah diubah');
                return redirect()->route('faq');
            }
        } catch (\Throwable $th) {
            dd($th->getMessage());
            Alert::error('Error');
            return back();
        }
    }

    function destroy(Request $req)
    {
        $res = FaqApi::destroy($req->id)->json();
        if ($res['status'] == true) {
            Alert::success('Berhasil', $res['message']);
            return response($res['message'], 200);
        }
        Alert::success('Gagal', $res['message']);
        return response($res['message'], 400);
    }
}
