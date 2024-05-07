<!DOCTYPE html>
<html lang="en" class="scroll-smooth group" data-sidebar="brand" dir="ltr">
<meta charset="utf-8" />
<title>OTENTIK | Example</title>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
<meta content="Tailwind Multipurpose Admin & Dashboard Template" name="description" />
<meta content="" name="Mannatthemes" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}" />

<link rel="stylesheet" href="{{ asset('assets/libs/icofont/icofont.min.css') }}">
<link href="{{ asset('assets/libs/flatpickr/flatpickr.min.css') }}" type="text/css" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('assets/css/tailwind.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
<link href="{{ asset('assets/libs/prismjs/themes/prism-twilight.min.css') }}" type="text/css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css" rel="stylesheet" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css" />
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
@vite('resources/css/app.css')

<body data-sidebar-size="default" data-theme-layout="vertical" class="dark:bg-gray-900"
    style="background-color: #EEF0FC;">
    <div style="padding: 1.25rem">
        <div
            style="display: flex; gap: 1.25rem; flex-direction: row; justify-content: space-evenly; align-items: center; font-size: 0.75rem; line-height: 1rem;">
            {{-- VERTIKAL --}}
            <div
                style="position: relative; width: 20rem; border: 2px solid black; border-radius: 0.375rem; background-color: white; text-align: center; padding-top: 0.5rem; padding-bottom: 0.5rem;">
                <img src="../assets/images/kejaksaan-logo.png" alt=""
                    style="width: 5rem; height: 5rem; margin: auto;">
                <p style="font-size: 90%; text-transform: uppercase; font-weight: 600;">KEJAKSAAN NEGERI KABUPATEN
                    PROBOLINGGO
                </p>
                <img src="../assets/images/5856.jpg" alt=""
                    style="width: 9.5rem; height: 10rem; margin-left: auto; margin-right: auto; border-radius: 0.375rem;">
                <div
                    style="display: flex; flex-direction: column; gap: 1.25rem; justify-content: center; align-items: center;">
                    <p style="font-weight: 700; font-size: 0.75rem; line-height: 1rem;">Johan Toni Wijaya, S.Kom.
                    </p>
                    <div class="grid grid-cols-2">
                        <p>1810631170189
                        </p>
                    </div>
                    <div class="grid grid-cols-2">
                        <p>NRP</p>
                        <p>1810631170189</p>
                    </div>
                    <p>Analis Pengelolaan Keuangan Apbn Ahli Pertama pada Kejaksaan Negeri Kabupaten Probolinggo</p>
                </div>
            </div>

            {{-- HORIZONTAL --}}
            <div class="border-2 border-black rounded-md bg-white p-2" style="width: 40rem;">
                <div class="flex flex-row items-center mb-5">
                    <img src="{{ asset('assets/images/kejaksaan-logo.png') }}" alt="" class="ms-5"
                        style="width: 5rem; height: 5rem;">
                    <p class="uppercase font-semibold text-center mx-auto">KEJAKSAAN NEGERI KABUPATEN PROBOLINGGO</p>
                </div>
                <div class="flex flex-row justify-between items-center">
                    <img src="{{ asset('assets/images/5856.jpg') }}" alt=""
                        style="width: 9.5rem; height: 10rem;">
                    <div class="flex flex-col gap-1">
                        <div class="grid grid-cols-2">
                            <div class="cols-span-1">
                                <p>Nama : </p>
                            </div>
                            <div class="cols-span-1">
                                <p>Johan Toni Wijaya, S.Kom.
                                </p>
                            </div>
                        </div>
                        <div class="grid grid-cols-2">
                            <div class="cols-span-1">
                                <p>NIP : </p>
                            </div>
                            <div class="cols-span-1">
                                <p>1810631170189
                                </p>
                            </div>
                        </div>
                        <div class="grid grid-cols-2">
                            <div class="cols-span-1">
                                <p>NRP : </p>
                            </div>
                            <div class="cols-span-1">
                                <p>123456789101112
                                </p>
                            </div>
                        </div>
                        <div class="grid grid-cols-2">
                            <div class="cols-span-1">
                                <p>Jabatan : </p>
                            </div>
                            <div class="cols-span-1">
                                <p class="text-wrap">Analis Pengelolaan Keuangan Apbn Ahli Pertama pada Kejaksaan Negeri
                                    Kabupaten Probolinggo
                                </p>
                            </div>
                        </div>
                        <div class="grid grid-cols-2">
                            <div class="cols-span-1">
                                <p>Gol : </p>
                            </div>
                            <div class="cols-span-1">
                                <p>Sena Wira / (III/d)
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.2/dist/chart.umd.min.js"></script>
    <script src="{{ asset('assets/libs/lucide/umd/lucide.min.js') }}"></script>
    <script src="{{ asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('assets/libs/flatpickr/flatpickr.min.js') }}"></script>
    <script src="{{ asset('assets/libs/@frostui/tailwindcss/frostui.js') }}"></script>
    <script src="{{ asset('assets/libs/prismjs/prism.js') }}"></script>
    <script src="{{ asset('assets/js/app.js') }}"></script>
</body>

</html>
