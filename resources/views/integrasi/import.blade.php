<style>
    .Loading {
        position: relative;
        display: inline-block;
        width: 100%;
        height: 18px;
        background: #f1f1f1;
        box-shadow: inset 0 0 5px rgba(0, 0, 0, .2);
        border-radius: 4px;
        overflow: hidden;
    }

    .Loading:after {
        content: '';
        position: absolute;
        left: 0;
        width: 0;
        height: 100%;
        border-radius: 4px;
        box-shadow: 0 0 5px rgba(0, 0, 0, .2);
        animation: load 5s forwards;
    }

    @keyframes load {
        0% {
            width: 0;
            background: red;
        }

        25% {
            width: 40%;
            background: #a0d2eb;
        }

        50% {
            width: 60%;
            background: #ffa8b6;
        }

        75% {
            width: 75%;
            background: #d0bdf4;
        }

        100% {
            width: 100%;
            background: green;
        }
    }
</style>
<?php
$checkToken = Session::get('token');

$client = new \GuzzleHttp\Client();
$url_target = api_core('integrasi/status');
if ($checkToken) {
    try {
        $result = $client->request('GET', $url_target, [
            'verify' => false,
            'headers' => ['Authorization' => "Bearer {$checkToken}"],
        ]);
        $apiRes = json_decode($result->getBody());
        $statusintegrasi = $apiRes->data->data;
    } catch (ClientException $e) {
        $response = $e->getResponse();
        $res = $response->getBody()->getContents();
        $apiCatch = json_decode($res);
        return redirect()->back();
    }
}
?>
<title>{{ env('APP_NAME') }} | {{ $title }}</title>
<x-app-layout :assets="$assets ?? []">
    @include('partials.components.blankpagewithtitle-open')

    <!-- isi konten -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <ul class="nav nav-tabs mb-3">
                        <li class="nav-item">
                            <button class="nav-link link-integrasi active"> <i class="fa-solid fa-user-tie fa-fw"></i>
                                Data Pegawai</button>
                        </li>
                    </ul>
                    <hr>

                    <div class="alert alert-info" role="alert">
                        <p class="mb-0">
                            <i class="fa-solid fa-lightbulb"></i> Silakan klik tombol tarik data untuk perbarui data <i>
                                " <span class="title">Pegawai</span> "</i>
                        </p>
                    </div>

                    <form id="upload-form" class="upload-form" method="post">
                        <div class="text-center" style="margin-top: 50px;">
                            <div class="col">
                                <button class="btn btn-md btn-primary mt-3 " type="submit" id="tarik-data"><i
                                        class="fas fa-download"></i> Tarik data </button>
                            </div>
                        </div>
                    </form>
                    <br>
                    <div class="row text-center">
                        <div class="col" id="frameLoading">
                        </div>
                    </div>
                    <br>
                    <div class="row text-center">
                        <div class="col">
                            <div id="response-sync"></div>
                        </div>
                    </div>
                    <h5>Detail Sinkronisasi : </h5>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered" id="tableDT" width="100%">
                            <thead>
                                <tr class="bg-primary">
                                    <th style="color:white;">Jumlah Simkari</th>
                                    <th style="color:white;">Jumlah Sparkis</th>
                                    <th style="color:white;">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $statusintegrasi->jumlahSimkari }} Pegawai</td>
                                    <td>{{ $statusintegrasi->jumlahSparkis }} Pegawai</td>
                                    <td><span
                                            class="badge {{ $statusintegrasi->status == 'Sama' ? 'bg-success' : 'bg-danger' }}">{{ $statusintegrasi->status }}</span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('partials.components.blankpagewithtitle-close')
</x-app-layout>



<scrpt>
    <script type="text/javascript">
        $('.link-integrasi').click(function() {
            $('.link-integrasi').removeClass('active');
            $(this).addClass('active');
            var title = $(this).text();
            $('.title').text(title);
        });


        jQuery(document).on('submit', '#upload-form', function(e) {
            $('#frameLoading').html('');
            $('#response-sync').html('');
            var modul = $('.title').text();

            var data = new FormData();
            data.append("type", modul);

            e.preventDefault();
            $.ajax({
                type: 'get',
                url: 'integrasi-data/pegawai',
                data: data,
                contentType: false,
                cache: false,
                processData: false,
                dataType: 'json',

                beforeSend: function() {
                    $('#frameLoading').append(
                        '<div class="Loading"></div><br><div class="loading-data"><b><i>Loading Data . . . . .</i></b></div>'
                    );
                },

                success: function(response) {
                    console.log(response);
                    var message = response.pesan;
                    var result = response.status;

                    if (result == 200) {
                        $('#upload-form')[0].reset();
                        const myTimeout = setTimeout(syncResponse, 5000);
                        const reset = setTimeout(syncReset, 8000);

                        function syncResponse() {
                            $('.loading-data').html('');
                            $('#response-sync').html('<p style="color:#28A74B;"><i>' + message +
                                '</i></p>');
                            $('.log-sync').addClass('badge badge-primary');
                        }

                        function syncReset() {
                            $('#frameLoading').html('');
                            $('#response-sync').html('');
                        }
                    } else if (result == 'failed') {
                        $('.loading-data').html('');
                        $('#response-sync').html('<p style="color:#EA4335;"><i>' + message +
                            '</i></p>');
                    }
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);

                    function syncResponse() {
                        $('.loading-data').html('');
                        $('#response-sync').html(
                            '<p style="color:#28A74B;"><i>Integrasi Data Gagal</i></p>');
                        $('.log-sync').addClass('badge badge-danger');
                    }

                    function syncReset() {
                        $('#frameLoading').html('');
                        $('#response-sync').html('');
                    }
                },
                // complete: function() {
                //     alert('Data integrasi belum tersedia');
                // }
            });
        });
    </script>
