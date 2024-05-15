<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;

class ImportJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $link;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($link)
    {
        $this->link = $link;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        try {
            return Http::get($this->link)->json()['data'];
            // for ($i = 0; $i <= count($data); $i++) {
            //     $res = Http::withToken(session('data')['token'])->post(env('API_URL', '') . '/integration', [
            //         "nama"           => $data[$i]['nama'],
            //         "jabatan"        => $data[$i]['jabatan'],
            //         "nip"            => $data[$i]['nip'],
            //         "nrp"            => $data[$i]['nrp'],
            //         "tgl_lahir"      => $data[$i]['tgl_lahir'],
            //         "eselon"         => $data[$i]['eselon'],
            //         "jenis_kelamin"  => $data[$i]['jenis_kelamin'],
            //         "GOL_KD"         => $data[$i]['GOL_KD'],
            //         "golpang"        => $data[$i]['golpang'],
            //         "foto_pegawai"   => $data[$i]['foto_pegawai'],
            //         "nama_satker"    => $data[$i]['nama_satker'],
            //         "agama"          => $data[$i]['agama'],
            //         "status_pegawai" => $data[$i]['status_pegawai'],
            //         "jaksa_tu"       => $data[$i]['jaksa_tu'],
            //         "struktural_non" => $data[$i]['struktural_non']
            //     ])->json();
            // }
            // return response()->json([
            //     'data'      => $data,
            //     'status'    => 'Berhasil ditambahkan'
            // ], 200);
            // return response()->json([
            //     'nama'      => $res['nama'],
            //     'status'    => 'Berhasil ditambahkan'
            // ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'error' => $th->getMessage()
            ], 400);
        }
    }
}
