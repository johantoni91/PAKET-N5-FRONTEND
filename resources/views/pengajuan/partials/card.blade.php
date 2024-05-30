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

<div class="flex flex-row gap-3 justify-center items-center">
    @if ($item['orientation'] == '0')
        <div style="display: flex; flex-direction: row; gap: 8px;">
            <div id="kartu{{ $item['id'] }}" class="kartuver {{ $item['warna_teks'] }}"
                style="background-image: url({{ env('APP_IMG', '') . $item['front'] }});
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;">
                <img class="imglogover" src="{{ env('APP_IMG', '') . $item['icon'] }}">
                <p style="font-size: 9px; text-transform: uppercase; font-weight: bold; text-align: center;">
                    KEJAKSAAN AGUNG REPUBLIK INDONESIA
                </p>
                @if ($item['profile'] == '1')
                    <img class="imgver" src="{{ asset('assets/images/5856.jpg') }}">
                @endif
                @if ($item['nama'] == '1')
                    <p style="font-size: 9px; text-transform: uppercase; font-weight: bold; text-align: center;">
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

            <div id="kartuback{{ $item['id'] }}" class="kartuverback {{ $item['warna_teks'] }}"
                style="background-image: url({{ env('APP_IMG', '') . $item['back'] }});
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;">
                <img class="w-24 h-24" src="{{ asset('assets/images/qrcode.png') }}" alt="">
                <div class="flex flex-col justify-center items-center gap-1">
                    <small>{{ $starterPack['tanda_tangan'] == '' ? 'ABCDE' : $starterPack['tanda_tangan']['jabatan'] }}</small>
                    <img class="w-24 h-24"
                        src="{{ $starterPack['tanda_tangan'] == '' ? asset('assets/images/signature.jpg') : $starterPack['tanda_tangan']['signature'] }}"
                        alt="">
                    <small>{{ $starterPack['tanda_tangan'] == '' ? 'FULAN BIN FULAN' : $starterPack['tanda_tangan']['nama'] }}</small>
                </div>
            </div>
        </div>

        <br>
    @else
        <div id="kartu{{ $item['id'] }}" class="kartuhor {{ $item['warna_teks'] }}"
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
                    <td class="divheadtd" style="font-size: 9px; text-transform: uppercase; font-weight: bold;">
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
    <div id="kartuback{{ $item['id'] }}" class="kartuhorback {{ $item['warna_teks'] }} "
        style="background-image: url({{ env('APP_IMG', '') . $item['back'] }});
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;">
        <img class="w-24 h-24" src="{{ asset('assets/images/qrcode.png') }}" alt="">
        <div class="flex flex-col justify-center items-center gap-1">
            <small>{{ $starterPack['tanda_tangan'] == '' ? 'ABCDE' : $starterPack['tanda_tangan']['jabatan'] }}</small>
            <img class="w-24 h-24"
                src="{{ $starterPack['tanda_tangan'] == '' ? asset('assets/images/signature.jpg') : $starterPack['tanda_tangan']['signature'] }}"
                alt="">
            <small>{{ $starterPack['tanda_tangan'] == '' ? 'FULAN BIN FULAN' : $starterPack['tanda_tangan']['nama'] }}</small>
        </div>
    </div>
    @endif
</div>
