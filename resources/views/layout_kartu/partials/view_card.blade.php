<div id="look{{ $item['id'] }}" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-4xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Tambah Pegawai
                </h3>
                <button type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-hide="look{{ $item['id'] }}">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="overflow-x-scroll p-4 md:p-5 space-y-4">
                <style>
                    .kartuver {
                        height: 321.26px;
                        width: 203.72px;
                        border: 0.5px solid #4CAF50;
                        border-radius: 8px;
                        text-wrap: pretty;
                    }

                    .kartuverback {
                        position: relative;
                        height: 321.26px;
                        width: 203.72px;
                        border: 0.5px solid #4CAF50;
                        border-radius: 8px;
                        text-wrap: pretty;
                    }

                    .imglogover {
                        width: 45px;
                        height: 45px;
                        display: block;
                        margin-left: auto;
                        margin-right: auto;
                        margin-top: 10px;
                    }

                    .imglogoverback {
                        width: 80px;
                        height: 80px;
                        display: block;
                        position: absolute;
                        left: 60px;
                        top: 115px;
                    }

                    .imgver {
                        width: 75.6px;
                        height: 113.39px;
                        display: block;
                        border-radius: 6px;
                        margin-left: auto;
                        margin-right: auto;
                    }

                    .tablever {
                        width: 150px;
                        display: block;
                        margin-left: auto;
                        margin-right: auto;
                    }

                    .tdver {
                        width: 150px;
                        font-size: 9px;
                        margin-left: auto;
                        margin-right: auto;
                    }

                    .kartuhor {
                        width: 321.26px;
                        height: 203.72px;
                        border: 0.5px solid #4CAF50;
                        border-radius: 8px;
                        text-wrap: pretty;
                    }

                    .kartuhorback {
                        position: relative;
                        width: 321.26px;
                        height: 203.72px;
                        border: 0.5px solid #4CAF50;
                        border-radius: 8px;
                        text-wrap: pretty;
                    }

                    .divhead {
                        padding: 5px;
                        width: 300px;
                        display: block;
                        margin-left: auto;
                        margin-right: auto;
                    }

                    .divheadtd {
                        width: 300px;
                        margin-left: auto;
                        margin-right: auto;
                    }

                    .imglogohor {
                        width: 45px;
                        height: 45px;
                        display: block;
                        margin-left: auto;
                        margin-right: auto;
                    }

                    .imglogohorback {
                        width: 100px;
                        height: 100px;
                        display: block;
                        position: absolute;
                        left: 110px;
                        top: 50px;
                    }

                    .imghor {
                        width: 75.6px;
                        height: 113.39px;
                        display: block;
                        border-radius: 6px;
                        margin-left: auto;
                        margin-right: auto;
                    }

                    .tablehor {
                        width: 150px;
                        display: block;
                        margin-left: auto;
                        margin-right: auto;
                    }

                    .tdhor {
                        vertical-align: text-top;
                        text-align: justify;
                        font-size: 9px;
                        margin-left: auto;
                        margin-right: auto;
                    }
                </style>
                <div class="flex flex-row gap-3 justify-center items-center">
                    @if ($item['orientation'] == '0')
                        <div style="display: flex; flex-direction: row; gap: 8px;">
                            <div id="kartu" class="kartuver"
                                style="background-image: url({{ env('APP_IMG', '') . $item['front'] }});
                            background-position: center;
                            background-repeat: no-repeat;
                            background-size: cover;">
                                <img class="imglogover" src="{{ env('APP_IMG', '') . $item['icon'] }}">
                                <p
                                    style="font-size: 9px; text-transform: uppercase; font-weight: bold; text-align: center;">
                                    KEJAKSAAN AGUNG REPUBLIK INDONESIA
                                </p>
                                @if ($item['profile'] == '1')
                                    <img class="imgver" src="{{ asset('assets/images/5856.jpg') }}">
                                @endif
                                @if ($item['nama'] == '1')
                                    <p
                                        style="font-size: 9px; text-transform: uppercase; font-weight: bold; text-align: center;">
                                        Asep Ucup Udin Budi, S.Kom.
                                    </p>
                                @endif
                                <table class="tablever">
                                    @if ($item['nip'] == '1')
                                        <tr>
                                            <td class="tdver">NIP </td>
                                            <td class="tdver">: 199909092022011001</td>
                                        </tr>
                                    @endif
                                    @if ($item['nrp'] == '1')
                                        <tr>
                                            <td class="tdver">NRP </td>
                                            <td class="tdver">: 00234577</td>
                                        </tr>
                                    @endif
                                    @if ($item['golongan'] == '1')
                                        <tr>
                                            <td class="tdver">Gol </td>
                                            <td class="tdver">: Penata Muda (III/a)</td>
                                        </tr>
                                    @endif
                                </table>
                                @if ($item['jabatan'] == '1')
                                    <p style="font-size: 7px; text-transform: uppercase; text-align: center;">
                                        Analis Pengelolaan Keuangan Apbn Ahli Pertama pada Kejaksaan Agung Republik
                                        Indonesia
                                    </p>
                                @endif
                            </div>

                            <div id="kartuback" class="kartuverback"
                                style="background-image: url({{ env('APP_IMG', '') . $item['back'] }});
                            background-position: center;
                            background-repeat: no-repeat;
                            background-size: cover;">
                                <img class="imglogoverback" src="{{ asset('assets/images/qrcode.png') }}">
                            </div>
                        </div>

                        <br>
                    @else
                        <div id="kartu" class="kartuhor"
                            style="background-image: url({{ env('APP_IMG', '') . $item['front'] }});
                        background-position: center;
                        background-repeat: no-repeat;
                        background-size: cover;">
                            <table class="divhead">
                                <tr>
                                    <td>
                                        <img class="imglogohor" width="50" height="50"
                                            src="{{ env('APP_IMG', '') . $item['icon'] }}">
                                    </td>
                                    <td class="divheadtd"
                                        style="font-size: 9px; text-transform: uppercase; font-weight: bold;">
                                        KEJAKSAAN
                                        NEGERI KABUPATEN PROBOLINGGO</td>
                                </tr>
                            </table>
                            <table class="divhead">
                                <tr>
                                    <td rowspan="6">
                                        @if ($item['profile'] == '1')
                                            <img class="imghor" src="{{ asset('assets/images/5856.jpg') }}">
                                        @endif
                                    </td>
                                    <td>
                                        @if ($item['nama'] == '1')
                                <tr>
                                    <td class="tdhor">&nbsp;&nbsp;&nbsp;&nbsp;Nama</td>
                                    <td class="tdhor">:</td>
                                    <td class="tdhor" style="text-transform: uppercase; font-weight: bold;">JOHAN
                                        TONI
                                        WIJAYA
                                    </td>
                                </tr>
                                @if ($item['nip'] == '1')
                                    <tr>
                                        <td class="tdhor">&nbsp;&nbsp;&nbsp;&nbsp;NIP</td>
                                        <td class="tdhor">:</td>
                                        <td class="tdhor">199909092022011001</td>
                                    </tr>
                                @endif
                                @if ($item['nrp'] == '1')
                                    <tr>
                                        <td class="tdhor">&nbsp;&nbsp;&nbsp;&nbsp;NRP</td>
                                        <td class="tdhor">:</td>
                                        <td class="tdhor">00234577</td>
                                    </tr>
                                @endif
                                @if ($item['golongan'] == '1')
                                    <tr>
                                        <td class="tdhor">&nbsp;&nbsp;&nbsp;&nbsp;Gol</td>
                                        <td class="tdhor">:</td>
                                        <td class="tdhor">Penata Muda (III/a)</td>
                                    </tr>
                                @endif
                                @if ($item['jabatan'] == '1')
                                    <tr>
                                        <td class="tdhor">&nbsp;&nbsp;&nbsp;&nbsp;Jabatan</td>
                                        <td class="tdhor">:</td>
                                        <td class="tdhor" style="line-height: 1;text-align: left;">Analis Pengelolaan
                                            Keuangan Apbn Ahli
                                            Pertama pada Kejaksaan
                                            Negeri
                                            Kabupaten
                                            Probolinggo</td>
                                    </tr>
                                @endif
                                </td>
                                </tr>
                            </table>
                        </div>
                    @endif
                    <div id="kartuback" class="kartuhorback"
                        style="background-image: url({{ env('APP_IMG', '') . $item['back'] }});
                    background-position: center;
                    background-repeat: no-repeat;
                    background-size: cover;">
                        <img class="imglogohorback" src="{{ asset('assets/images/qrcode.png') }}" alt="">
                    </div>
                    @endif
                </div>
                <button id="unduh" class="bg-slate-200 p-2 rounded-lg mb-3 dark:bg-black dark:text-white">Siap untuk
                    pengajuan</button>
            </div>
        </div>
        <script>
            $(function() {
                $("#unduh").on('click', function() {
                    const a = html2canvas(document.getElementById("kartu")).then(function(canvas) {
                        const image1 = canvas.toDataURL("image/png", 1.0);
                        return image1
                    });

                    a.then(res => {
                        const b = html2canvas(document.getElementById("kartuback")).then(function(
                            canvas) {
                            const image2 = canvas.toDataURL("image/png", 1.0);
                            return image2
                        });
                        b.then(test => {
                            $.post("{{ route('layout.kartu.store.card') }}", {
                                _token: "{{ csrf_token() }}",
                                id: "{{ $item['id'] }}",
                                image1: res,
                                image2: test
                            }, function(data) {
                                console.log(data)
                            })
                        })
                    })

                })
            })
        </script>
    </div>
</div>
