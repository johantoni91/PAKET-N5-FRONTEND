@extends('kiosK.partials.main_menu')
@section('content_kios')
    <link rel="stylesheet" href="{{ asset('assets/css/kartu.css') }}">
    <div class="w-full h-[50%] flex flex-col justify-center items-center rounded-lg border border-gray-300">
        <div class="flex flex-row gap-3 justify-center items-center">
            @if ($pegawai['kartu']['orientation'] == '0')
                <div style="display: flex; flex-direction: row; gap: 8px;">
                    <div id="kartu" class="kartuver {{ $pegawai['kartu']['warna_teks'] }}"
                        style="background-image: url({{ env('APP_IMG', '') . $pegawai['kartu']['front'] }});
                    background-position: center;
                    background-repeat: no-repeat;
                    background-size: cover;">
                        <img class="imglogover" src="{{ env('APP_IMG', '') . $pegawai['kartu']['icon'] }}">
                        <p style="font-size: 9px; text-transform: uppercase; font-weight: bold; text-align: center;">
                            {{ $pegawai['pegawai']['nama_satker'] }}
                        </p>
                        @if ($pegawai['kartu']['profile'] == '1')
                            <img class="imgver" src="{{ asset('assets/images/5856.jpg') }}">
                        @endif
                        @if ($pegawai['kartu']['nama'] == '1')
                            <p style="font-size: 9px; text-transform: uppercase; font-weight: bold; text-align: center;">
                                Asep Ucup Udin Budi, S.Kom.
                            </p>
                        @endif
                        <table class="tablever">
                            @if ($pegawai['kartu']['nip'] == '1')
                                <tr>
                                    <td class="tdver">NIP </td>
                                    <td class="tdver">: {{ $pegawai['pegawai']['nip'] }}</td>
                                </tr>
                            @endif
                            @if ($pegawai['kartu']['nrp'] == '1')
                                <tr>
                                    <td class="tdver">NRP </td>
                                    <td class="tdver">: {{ $pegawai['pegawai']['nrp'] }}</td>
                                </tr>
                            @endif
                            @if ($pegawai['kartu']['golongan'] == '1')
                                <tr>
                                    <td class="tdver">Gol </td>
                                    <td class="tdver">: {{ $pegawai['pegawai']['golpang'] }}</td>
                                </tr>
                            @endif
                        </table>
                        @if ($pegawai['kartu']['jabatan'] == '1')
                            <p style="font-size: 7px; text-transform: uppercase; text-align: center;">
                                {{ $pegawai['pegawai']['jabatan'] }}
                            </p>
                        @endif
                    </div>

                    <div id="kartuback{{ $pegawai['kartu']['id'] }}"
                        class="kartuverback {{ $pegawai['kartu']['warna_teks'] }}"
                        style="background-image: url({{ env('APP_IMG', '') . $pegawai['kartu']['back'] }});
                    background-position: center;
                    background-repeat: no-repeat;
                    background-size: cover;">
                        <img class="w-24 h-24" src="{{ $pegawai['pengajuan']['barcode'] }}" alt="">
                        <div class="flex flex-col justify-center items-center gap-1">
                            <small>{{ $pegawai['ttd']['jabatan'] }}</small>
                            <img class="w-24 h-24" src="{{ $pegawai['ttd']['signature'] }}" alt="">
                            <small>{{ $pegawai['ttd']['nama'] }}</small>
                        </div>
                    </div>
                </div>

                <br>
            @else
                <div id="kartu" class="kartuhor {{ $pegawai['kartu']['warna_teks'] }}"
                    style="background-image: url({{ env('APP_IMG', '') . $pegawai['kartu']['front'] }});
                background-position: center;
                background-repeat: no-repeat;
                background-size: cover;">
                    <table class="divhead">
                        <tr>
                            <td>
                                <img class="imglogohor" width="50" height="50"
                                    src="{{ env('APP_IMG', '') . $pegawai['kartu']['icon'] }}">
                            </td>
                            <td class="divheadtd" style="font-size: 9px; text-transform: uppercase; font-weight: bold;">
                                {{ $pegawai['pegawai']['nama_satker'] }}</td>
                        </tr>
                    </table>
                    <table class="divhead">
                        <tr>
                            <td rowspan="6">
                                @if ($pegawai['kartu']['profile'] == '1')
                                    <img class="imghor" src="{{ $pegawai['pegawai']['foto_pegawai'] }}">
                                @endif
                            </td>
                            <td>
                                @if ($pegawai['kartu']['nama'] == '1')
                        <tr>
                            <td class="tdhor">&nbsp;&nbsp;&nbsp;&nbsp;Nama</td>
                            <td class="tdhor">:</td>
                            <td class="tdhor" style="text-transform: uppercase; font-weight: bold;">
                                {{ $pegawai['pegawai']['nama'] }}
                            </td>
                            </td>
                        </tr>
                        @if ($pegawai['kartu']['nip'] == '1')
                            <tr>
                                <td class="tdhor">&nbsp;&nbsp;&nbsp;&nbsp;NIP</td>
                                <td class="tdhor">:</td>
                                <td class="tdhor">{{ $pegawai['pegawai']['nip'] }}</td>
                            </tr>
                        @endif
                        @if ($pegawai['kartu']['nrp'] == '1')
                            <tr>
                                <td class="tdhor">&nbsp;&nbsp;&nbsp;&nbsp;NRP</td>
                                <td class="tdhor">:</td>
                                <td class="tdhor">{{ $pegawai['pegawai']['nrp'] }}</td>
                            </tr>
                        @endif
                        @if ($pegawai['kartu']['golongan'] == '1')
                            <tr>
                                <td class="tdhor">&nbsp;&nbsp;&nbsp;&nbsp;Gol</td>
                                <td class="tdhor">:</td>
                                <td class="tdhor">{{ $pegawai['pegawai']['golpang'] }}</td>
                            </tr>
                        @endif
                        @if ($pegawai['kartu']['jabatan'] == '1')
                            <tr>
                                <td class="tdhor">&nbsp;&nbsp;&nbsp;&nbsp;Jabatan</td>
                                <td class="tdhor">:</td>
                                <td class="tdhor" style="line-height: 1;text-align: left;">
                                    {{ $pegawai['pegawai']['jabatan'] }}</td>
                            </tr>
                        @endif
                        </td>
                        </tr>
                    </table>
                </div>
            @endif
            <div id="kartuback" class="kartuhorback {{ $pegawai['kartu']['warna_teks'] }} "
                style="background-image: url({{ env('APP_IMG', '') . $pegawai['kartu']['back'] }});
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;">
                <img class="w-24 h-24" src="{{ $pegawai['pengajuan']['barcode'] }}" alt="">
                <div class="flex flex-col justify-center items-center gap-1">
                    <small>{{ $pegawai['ttd']['jabatan'] }}</small>
                    <img class="w-24 h-24" src="{{ $pegawai['ttd']['signature'] }}" alt="">
                    <small>{{ $pegawai['ttd']['nama'] }}</small>
                </div>
            </div>
            @endif
        </div>
    </div>
@endsection
