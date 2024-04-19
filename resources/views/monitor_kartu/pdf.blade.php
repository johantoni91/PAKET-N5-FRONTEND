<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{ $pegawai['foto_pegawai'] }}" />
    <title>Kartu {{ $pegawai['nama'] }}</title>
    <style>
        .cover {
            display: flex;
            padding: 1.25rem;
            flex-direction: row;
            gap: 1.25rem;
            width: 100%;
        }

        .card_1 {
            display: flex;
            padding: 1.25rem;
            flex-direction: column;
            gap: 0.75rem;
            justify-content: center;
            border-radius: 0.5rem;
            mix-blend-mode: difference;
        }

        .card_2 {
            flex-direction: column;
            gap: 0.75rem;
            justify-content: center;
            border-radius: 0.5rem;
            mix-blend-mode: difference;
        }

        .img_card_1 {
            display: flex;
            flex-direction: row;
            justify-content: center;
        }

        .mb-5 {
            margin-bottom: 1.25rem;
        }

        .p-2 {
            padding: 0.5rem;
        }

        .p-3 {
            table-layout: fixed;
        }

        .table-responsive {
            table-layout: auto;
        }

        .mx-auto {
            margin: auto;
        }

        .w-12 {
            width: 3rem;
        }

        .w-20 {
            width: 5rem;
        }

        .h-20 {
            height: 5rem;
        }

        .h-13 {
            height: 3rem;
        }

        .bg_front {
            background-position: center;
            background-size: cover;
            background-repeat: no-repeat;
            background-image: url({{ $kartu['front'] }})
        }

        .rounded-full {
            border-radius: 9999px;
        }

        .text-left {
            text-align: left;
        }

        .bg_back {
            background-position: center;
            background-size: cover;
            background-repeat: no-repeat;
            background-image: url({{ $kartu['back'] }})
        }
    </style>
</head>

<body>
    <div class="cover">
        <div class="card_1 bg_front"
            style="{{ $kartu['orientation'] == '0' ? 'width: 30dvw; height: 60dvh;' : 'height: 20dvw; width: 80dvh;' }}">
            <div class="img_card_1">
                <img src="{{ $kartu['icon'] }}" class="w-12 h-12 rounded-full" alt="">
            </div>
            @if ($kartu['profile'] == '1')
                <div class="img_card_1 mb-5">
                    <img src="{{ $pengajuan['photo'] }}" class="w-20 h-20 rounded-full" alt="">
                </div>
            @endif
            <div class="p-2">
                <table class="table-responsive mx-auto p-3">
                    <thead>
                        @if ($kartu['nip'] == '1')
                            <tr class="text-center">
                                <th>&nbsp; {{ $pegawai['nip'] }}</th>
                            </tr>
                        @endif
                        @if ($kartu['nrp'] == '1')
                            <tr class="text-center">
                                <th>&nbsp; {{ $pegawai['nrp'] }}</th>
                            </tr>
                        @endif
                        @if ($kartu['nama'] == '1')
                            <tr class="text-center">
                                <th>&nbsp; {{ $pegawai['nama'] }}</th>
                            </tr>
                        @endif
                        @if ($kartu['jabatan'] == '1')
                            <tr class="text-center">
                                <th>&nbsp; {{ $pegawai['jabatan'] }}</th>
                            </tr>
                        @endif
                        @if ($kartu['golongan'] == '1')
                            <tr class="text-center">
                                <th>&nbsp; {{ $pegawai['golpang'] }}</th>
                            </tr>
                        @endif
                    </thead>
                </table>
            </div>
        </div>
        <div class="card_2 bg_back"
            style="{{ $kartu['orientation'] == '0' ? 'width: 30dvw;' : 'height: 20dvw; width: 80dvh;' }}">

        </div>
    </div>
</body>

</html>
