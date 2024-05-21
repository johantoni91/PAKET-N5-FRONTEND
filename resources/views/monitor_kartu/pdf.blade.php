<!DOCTYPE html>
<html>

<head>
    <style>
        .kartuver {
            height: 321.26px;
            width: 203.72px;
            border: 0.5px solid #4CAF50;
            border-radius: 8px;
            text-wrap: pretty;
            background-image: url({{ env('APP_IMG', '') . $kartu['front'] }});
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }

        .kartuverback {
            position: relative;
            height: 321.26px;
            width: 203.72px;
            border: 0.5px solid #4CAF50;
            border-radius: 8px;
            text-wrap: pretty;
            background-image: url({{ env('APP_IMG', '') . $kartu['back'] }});
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
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
            background-image: url({{ env('APP_IMG', '') . $kartu['front'] }});
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }

        .kartuhorback {
            position: relative;
            width: 321.26px;
            height: 203.72px;
            border: 0.5px solid #4CAF50;
            border-radius: 8px;
            text-wrap: pretty;
            background-image: url({{ env('APP_IMG', '') . $kartu['back'] }});
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
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
</head>

<body>

    @if ($kartu['orientation'] == '0')
        <div style="display: flex; flex-direction: row; gap: 8px;">
            <div id="kartu" class="kartuver">
                <img class="imglogover" src="{{ env('APP_IMG', '') . $kartu['icon'] }}">
                <p style="font-size: 9px; text-transform: uppercase; font-weight: bold; text-align: center;">
                    {{ $pegawai['nama_satker'] }}
                </p>
                @if ($kartu['profile'] == '1')
                    <img class="imgver" src="{{ $pegawai['foto_pegawai'] }}">
                @endif
                @if ($kartu['nama'] == '1')
                    <p style="font-size: 9px; text-transform: uppercase; font-weight: bold; text-align: center;">
                        {{ $pegawai['nama'] }}
                    </p>
                @endif
                <table class="tablever">
                    @if ($kartu['nip'] == '1')
                        <tr>
                            <td class="tdver">NIP </td>
                            <td class="tdver">: {{ $pegawai['nip'] }}</td>
                        </tr>
                    @endif
                    @if ($kartu['nrp'] == '1')
                        <tr>
                            <td class="tdver">NRP </td>
                            <td class="tdver">: {{ $pegawai['nrp'] }}</td>
                        </tr>
                    @endif
                    @if ($kartu['golongan'] == '1')
                        <tr>
                            <td class="tdver">Gol </td>
                            <td class="tdver">: {{ $pegawai['golpang'] }}</td>
                        </tr>
                    @endif
                </table>
                @if ($kartu['jabatan'] == '1')
                    <p style="font-size: 7px; text-transform: uppercase; text-align: center;">
                        {{ $pegawai['jabatan'] }}
                    </p>
                @endif
            </div>

            <div id="kartuback" class="kartuverback">
                <img class="imglogoverback" src="{{ $pengajuan['qrcode'] }}">
            </div>
        </div>

        <br>
    @else
        <div style="display: flex; flex-direction: row; gap: 8px;">
            <div id="kartu" class="kartuhor">
                <table class="divhead">
                    <tr>
                        <td>
                            <img class="imglogohor"
                                src="https://kejari-batanghari.kejaksaan.go.id/wp-content/uploads/2022/06/RI.png">
                        </td>
                        <td class="divheadtd" style="font-size: 9px; text-transform: uppercase; font-weight: bold;">
                            {{ $pegawai['nama_satker'] }}</td>
                    </tr>
                </table>
                <table class="divhead">
                    <tr>
                        <td rowspan="6">
                            @if ($kartu['profile'] == '1')
                                <img class="imghor" src="{{ $pegawai['foto_pegawai'] }}">
                            @endif
                        </td>
                        <td>
                            @if ($kartu['nama'] == '1')
                    <tr>
                        <td class="tdhor">&nbsp;&nbsp;&nbsp;&nbsp;Nama</td>
                        <td class="tdhor">:</td>
                        <td class="tdhor" style="text-transform: uppercase; font-weight: bold;">{{ $pegawai['nama'] }}
                        </td>
                    </tr>
    @endif
    @if ($kartu['nip'] == '1')
        <tr>
            <td class="tdhor">&nbsp;&nbsp;&nbsp;&nbsp;NIP</td>
            <td class="tdhor">:</td>
            <td class="tdhor">{{ $pegawai['nip'] }}</td>
        </tr>
    @endif
    @if ($kartu['nrp'] == '1')
        <tr>
            <td class="tdhor">&nbsp;&nbsp;&nbsp;&nbsp;NRP</td>
            <td class="tdhor">:</td>
            <td class="tdhor">{{ $pegawai['nrp'] }}</td>
        </tr>
    @endif
    @if ($kartu['golongan'] == '1')
        <tr>
            <td class="tdhor">&nbsp;&nbsp;&nbsp;&nbsp;Gol</td>
            <td class="tdhor">:</td>
            <td class="tdhor">{{ $pegawai['golpang'] }}</td>
        </tr>
    @endif
    @if ($kartu['jabatan'] == '1')
        <tr>
            <td class="tdhor">&nbsp;&nbsp;&nbsp;&nbsp;Jabatan</td>
            <td class="tdhor">:</td>
            <td class="tdhor">{{ $pegawai['jabatan'] }}</td>
        </tr>
    @endif
    </td>
    </tr>
    </table>

    <div id="kartuback" class="kartuhorback">
        <img class="imglogohorback" src="{{ $pengajuan['qrcode'] }}" alt="">
    </div>
    @endif
    </div>
    {{-- <button id="unduh" style="padding: 8px; border-radius: 1rem;">Unduh gambar kartu</button> --}}
</body>
{{-- <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="{{ asset('assets/js/html2canvas.min.js') }}"></script>
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
                        id: "{{ $kartu['id'] }}",
                        image1: res,
                        image2: test
                    }, function(data) {
                        console.log(data)
                    })
                })
            })

        })
    })
</script> --}}

</html>
