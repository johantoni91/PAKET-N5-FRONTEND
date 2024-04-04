<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kartu {{ $kartu['title'] }}</title>
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
            border-width: 2px;
            border-color: #F87171;
            border-style: double;
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06);
            width: 30dvw;
            height: 60dvh;
            mix-blend-mode: difference;
        }

        .card_2 {
            flex-direction: column;
            gap: 0.75rem;
            justify-content: center;
            border-radius: 0.5rem;
            border-width: 2px;
            border-color: #F87171;
            border-style: double;
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06);
            width: 30dvw;
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
        <div class="card_1 bg_front">
            <div class="img_card_1">
                <img src="{{ asset('assets/images/kejaksaan-logo.png') }}" class="w-12 h-12" alt="">
            </div>
            <div class="img_card_1 mb-5">
                <img src="{{ $kartu['icon'] }}" class="w-20 h-20 rounded-full" alt="">
            </div>
            <div class="p-2">
                <table class="table-responsive mx-auto p-3">
                    <thead>
                        <tr class="text-left">
                            <th>NIP</th>
                            <th>&nbsp; 199612022022031011</th>
                        </tr>
                        <tr class="text-left">
                            <th>NRP</th>
                            <th>&nbsp; 123456</th>
                        </tr>
                        <tr class="text-left">
                            <th>NAMA</th>
                            <th>&nbsp; Johan Toni Wijaya, S.Kom.</th>
                        </tr>
                        <tr class="text-left">
                            <th>JABATAN</th>
                            <th>&nbsp; Pengolah Data Intelijen</th>
                        </tr>
                        <tr class="text-left">
                            <th>GOLONGAN</th>
                            <th>&nbsp; Jaksa Muda (III/A)</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
        <div class="card_2 bg_back">

        </div>
    </div>
</body>

</html>
