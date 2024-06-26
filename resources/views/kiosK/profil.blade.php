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
            background-image: url({{ $kartu['front'] }});
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
            background-image: url({{ $kartu['back'] }});
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
            background-image: url({{ $kartu['front'] }});
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
            background-image: url({{ $kartu['back'] }});
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
    <div style="display: flex; flex-direction: row; gap: 8px;">
        <div class="kartuhor">
            <table class="divhead">
                <tr>
                    <td>
                        <img class="imglogohor"
                            src="https://kejari-batanghari.kejaksaan.go.id/wp-content/uploads/2022/06/RI.png">
                    </td>
                    <td class="divheadtd" style="font-size: 9px; text-transform: uppercase; font-weight: bold;">
                        KEJAKSAAN
                        NEGERI KABUPATEN PROBOLINGGO</td>
                </tr>
            </table>
            <table class="divhead">
                <tr>
                    <td rowspan="6">
                        @if ($kartu['profile'] == '1')
                            <img class="imghor" src="https://spmb.stis.ac.id/images/pasfoto-2-color.jpg">
                        @endif
                    </td>
                    <td>
                        @if ($kartu['nama'] == '1')
                <tr>
                    <td class="tdhor">&nbsp;&nbsp;&nbsp;&nbsp;Nama</td>
                    <td class="tdhor">:</td>
                    <td class="tdhor" style="text-transform: uppercase; font-weight: bold;">JOHAN TONI WIJAYA</td>
                </tr>
                @endif
                @if ($kartu['nip'] == '1')
                    <tr>
                        <td class="tdhor">&nbsp;&nbsp;&nbsp;&nbsp;NIP</td>
                        <td class="tdhor">:</td>
                        <td class="tdhor">199909092022011001</td>
                    </tr>
                @endif
                @if ($kartu['nrp'] == '1')
                    <tr>
                        <td class="tdhor">&nbsp;&nbsp;&nbsp;&nbsp;NRP</td>
                        <td class="tdhor">:</td>
                        <td class="tdhor">00234577</td>
                    </tr>
                @endif
                @if ($kartu['golongan'] == '1')
                    <tr>
                        <td class="tdhor">&nbsp;&nbsp;&nbsp;&nbsp;Gol</td>
                        <td class="tdhor">:</td>
                        <td class="tdhor">Penata Muda (III/a)</td>
                    </tr>
                @endif
                @if ($kartu['jabatan'] == '1')
                    <tr>
                        <td class="tdhor">&nbsp;&nbsp;&nbsp;&nbsp;Jabatan</td>
                        <td class="tdhor">:</td>
                        <td class="tdhor">Analis Pengelolaan Keuangan Apbn Ahli Pertama pada Kejaksaan Negeri Kabupaten
                            Probolinggo</td>
                    </tr>
                @endif
                </td>
                </tr>
            </table>
        </div>

        <div class="kartuhorback">
            <img class="imglogohorback" src="{{ asset('assets/images/qrcode.png') }}" alt="">
        </div>
</body>

</html>
