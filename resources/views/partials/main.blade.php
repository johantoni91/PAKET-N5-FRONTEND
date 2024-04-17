<!DOCTYPE html>
<html lang="en" class="scroll-smooth group" data-sidebar="brand" dir="ltr">
<meta charset="utf-8" />
<title>OTENTIK | {{ $title ?? '' }}</title>
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

<body data-sidebar-size="default" data-theme-layout="vertical" class="bg-[#EEF0FC] dark:bg-gray-900">
    @include('sweetalert::alert')
    @if (session('welcome'))
        <div style="position:fixed; z-index: 99; bottom: 2.5rem; right: 2.5rem;"
            class="flex flex-row items-center p-3 px-8 rounded-lg bg-purple-600 text-white dark:bg-slate-700 dark:text-white shadow-lg shadow-purple-600 dark:shadow-white">
            <span data-lucide="hand-metal" class="w-5 h-5"></span>
            <small>&nbsp; {{ session('welcome') }}</small>
        </div>
    @endif
    @yield('content')
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
