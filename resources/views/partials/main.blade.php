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
<link href="{{ asset('assets/libs/prismjs/themes/prism-twilight.min.css') }}" type="text/css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css" rel="stylesheet" />
<link rel="stylesheet" href="https://cdn.datatables.net/2.0.0/css/dataTables.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css" />
<link rel="stylesheet" href="{{ asset('assets/css/table.css') }}">
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<style>
    #dt-length-0 {
        width: 4.5rem;
    }
</style>
@vite('resources/css/app.css')

<body data-layout-mode="light" data-sidebar-size="default" data-theme-layout="vertical"
    class="bg-[#EEF0FC] dark:bg-gray-900">
    @include('sweetalert::alert')
    @if (session('welcome'))
        <div
            class=" flex flex-row items-center fixed z-50 p-3 px-8 bottom-10 right-10 rounded-lg bg-purple-600 text-white dark:bg-slate-700 dark:text-white shadow-lg shadow-purple-600 dark:shadow-white">
            <span data-lucide="hand-metal" class="w-5 h-5"></span>
            <small>&nbsp; {{ session('welcome') }}</small>
        </div>
    @endif
    @yield('content')
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
<script src="https://cdn.datatables.net/2.0.0/js/dataTables.min.js"></script>
<script src="https://cdn.datatables.net/2.0.0/js/dataTables.tailwindcss.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="
https://cdn.jsdelivr.net/npm/chart.js@4.4.2/dist/chart.umd.min.js
"></script>
<script src="{{ asset('assets/libs/lucide/umd/lucide.min.js') }}"></script>
<script src="{{ asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
<script src="{{ asset('assets/libs/flatpickr/flatpickr.min.js') }}"></script>
<script src="{{ asset('assets/libs/@frostui/tailwindcss/frostui.js') }}"></script>
<script src="{{ asset('assets/libs/prismjs/prism.js') }}"></script>
<script src="{{ asset('assets/js/app.js') }}"></script>
<script src="{{ asset('assets/js/pages/datatables.init.js') }}"></script>
@stack('scripts')
</body>

</html>
