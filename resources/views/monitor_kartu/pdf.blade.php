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
        }

        .kartuverback {
            position: relative;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            align-items: center;
            height: 321.26px;
            width: 203.72px;
            border: 0.5px solid #4CAF50;
            border-radius: 8px;
            text-wrap: pretty;
            font-size: .5em;
            line-height: 1;
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

        .ttdver {
            width: 20px;
            height: 20px;
            display: block;
            position: absolute;
            right: 20px;
            bottom: 20px;
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
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            align-items: center;
            width: 321.26px;
            height: 203.72px;
            border: 0.5px solid #4CAF50;
            border-radius: 8px;
            text-wrap: pretty;
            font-size: .5em;
            line-height: 1;
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
            width: 50px;
            height: 50px;
        }

        .ttdhor {
            width: 20px;
            height: 20px;
            display: block;
            position: absolute;
            right: 20px;
            bottom: 20px;
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

<body style="width: 100dvw; height:100dvh;">
    @if ($kartu['orientation'] == '0')
        <div style="display: flex; flex-direction: row; gap: 8px;">
            <div id="kartu{{ $kartu['id'] }}" class="kartuver {{ $kartu['warna_teks'] }}"
                style="background-image: url({{ env('APP_IMG', '') . $kartu['front'] }});
                background-position: center;
                background-repeat: no-repeat;
                background-size: cover;">
                <img class="imglogover" src="{{ env('APP_IMG', '') . $kartu['icon'] }}">
                <p style="font-size: 9px; text-transform: uppercase; font-weight: bold; text-align: center;">
                    {{ $pegawai['nama_satker'] }}
                </p>
                @if ($kartu['profile'] == '1')
                    <img class="imgver" src="{{ $pegawai['foto_pegawai'] ?? asset('assets/images/5856.jpg') }}">
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

            <div id="kartuback{{ $kartu['id'] }}" class="kartuverback {{ $kartu['warna_teks'] }}"
                style="background-image: url({{ env('APP_IMG', '') . $kartu['back'] }});
                background-position: center;
                background-repeat: no-repeat;
                background-size: cover;">
                <img style="width: 6rem; height: 6rem; margin-top:1rem;" src="{!! $pengajuan['barcode'] !!}" alt="">
                <div
                    style="display: flex; flex-direction: column; justify-content: center; align-items: center; gap: 0.25rem;">
                    <small>{{ $ttd['jabatan'] }}</small>
                    <img style="width: 6rem; height: 6rem; margin-bottom: 1rem;" src="{{ $ttd['signature'] }}"
                        alt="">
                    <small>{{ $ttd['nama'] }}</small>
                </div>
            </div>
        </div>
    @else
        <div id="kartu{{ $kartu['id'] }}" class="kartuhor {{ $kartu['warna_teks'] }}"
            style="margin-bottom: 1rem; background-image: url({{ env('APP_IMG', '') . $kartu['front'] }});
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;">
            <table class="divhead">
                <tr>
                    <td>
                        <img class="imglogohor" width="50" height="50"
                            src="{{ env('APP_IMG', '') . $kartu['icon'] }}">
                    </td>
                    <td class="divheadtd" style="font-size: 9px; text-transform: uppercase; font-weight: bold;">
                        {{ $pegawai['nama_satker'] }}</td>
                </tr>
            </table>
            <table class="divhead">
                <tr>
                    <td rowspan="6">
                        @if ($kartu['profile'] == '1')
                            <img class="imghor"
                                src="{{ $pegawai['foto_pegawai'] ?? asset('assets/images/5856.jpg') }}">
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
                        <td class="tdhor" style="line-height: 1;text-align: left;">{{ $pegawai['jabatan'] }}</td>
                    </tr>
                @endif
                </td>
                </tr>
            </table>
        </div>
    @endif
    <div id="kartuback{{ $kartu['id'] }}" class="kartuhorback {{ $kartu['warna_teks'] }} "
        style="background-image: url({{ env('APP_IMG', '') . $kartu['back'] }});
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;">
        <img style="width: 6rem; height: 6rem; margin-left: 1rem;" src="{{ asset('assets/images/qrcode.png') }}"
            alt="">
        <div style="display: flex; flex-direction: column; justify-content: center; align-items: center; gap: 0.25rem;">
            <small>{{ $ttd['jabatan'] }}</small>
            <img style="width: 6rem; height: 6rem; margin-right: 1rem;" src="{{ $ttd['signature'] }}" alt="">
            <small>{{ $ttd['nama'] }}</small>
        </div>
    </div>
    @endif
</body>

</html>
