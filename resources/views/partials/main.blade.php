<!DOCTYPE html>
<html lang="IN" class="scroll-smooth group" data-sidebar="brand" dir="ltr">
<meta charset="utf-8" />
<title>OTENTIK | {{ $title ?? '' }}</title>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
<meta content="Johan Toni Wijaya" name="description" />
<meta content="" name="Johan" />
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
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.2/dist/chart.umd.min.js"></script>
@vite('resources/css/app.css')

<body data-sidebar-size="default" data-theme-layout="vertical"
    class="{{ request()->routeIs('login') ? 'bg-gradient-to-b from-[#1A4D2E] via-[#4F6F52] to-[#E8DFCA] dark:bg-gradient-to-b dark:from-[#1B262C] dark:via-[#0F4C75] dark:to-[#3282B8]' : 'bg-slate-100 dark:bg-slate-900' }}">
    @include('sweetalert::alert')
    @yield('content')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.2/dist/chart.umd.min.js"></script>
    <script src="{{ asset('assets/js/pages/analytics-index.init.js') }}"></script>
    <script src="{{ asset('assets/libs/lucide/umd/lucide.min.js') }}"></script>
    <script src="{{ asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('assets/libs/flatpickr/flatpickr.min.js') }}"></script>
    <script src="{{ asset('assets/libs/@frostui/tailwindcss/frostui.js') }}"></script>
    <script src="{{ asset('assets/libs/prismjs/prism.js') }}"></script>
    <script src="{{ asset('assets/js/app.js') }}"></script>
    <script src="{{ asset('assets/js/html2canvas.min.js') }}"></script>
    <script>
        $(function() {
            if (window.innerWidth < 1025) {
                $("body").attr("data-sidebar-size", "collapsed")
            } else {
                $("body").attr("data-sidebar-size", "default")
            }
        })
    </script>
    {{-- @vite('resources/js/app.js') --}}
</body>

</html>
