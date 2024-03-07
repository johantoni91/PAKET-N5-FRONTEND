<?php

namespace App\Http\Controllers;

use App\API\FaqApi;
use App\Helpers\profile;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class FaqController extends Controller
{
    private $view = 'faq.index';
    private $title = 'Frequently Asked Question';

    function index()
    {
        $profile = profile::getUser();
        $data = FaqApi::get()['data'];
        return view($this->view, [
            'view'      => $this->view,
            'title'     => $this->title,
            'profile'   => $profile,
            'data'      => $data
        ]);
    }

    function store(Request $req)
    {
        try {
            $input = [
                'question'  => $req->question,
                'answer'    => $req->answer
            ];
            $res = FaqApi::store($input);
            if ($res['status'] == true) {
                Alert::success('Berhasil', 'FAQ telah ditambahkan');
                return redirect()->route('faq');
            }
        } catch (\Throwable $th) {
            Alert::error('Error', $th->getMessage());
            return back();
        }
    }

    function update(Request $req, $id)
    {
        try {
            $input = [
                'question'  => $req->question,
                'answer'    => $req->answer
            ];
            $res = FaqApi::update($id, $input);
            if ($res['status'] == true) {
                Alert::success('Berhasil', 'FAQ telah diubah');
                return redirect()->route('faq');
            }
        } catch (\Throwable $th) {
            Alert::error('Error', $th->getMessage());
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
