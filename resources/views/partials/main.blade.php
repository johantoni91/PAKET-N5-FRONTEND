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
<script src="{{ asset('assets/libs/lucide/umd/lucide.min.js') }}"></script>
<script src="{{ asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
<script src="{{ asset('assets/libs/flatpickr/flatpickr.min.js') }}"></script>
<script src="{{ asset('assets/libs/@frostui/tailwindcss/frostui.js') }}"></script>
<script src="{{ asset('assets/libs/prismjs/prism.js') }}"></script>
<script src="{{ asset('assets/js/app.js') }}"></script>
<script src="{{ asset('assets/js/pages/datatables.init.js') }}"></script>
@stack('scripts')
@if (isset($route1) && isset($route2))
    <script>
        let table = new DataTable("#datatable_1", {
            responsive: true,
            language: {
                url: "//cdn.datatables.net/plug-ins/1.13.7/i18n/id.json",
            },
        });

        $(document).ready(function() {
            $("label[for='dt-length-0']").addClass('dark:text-white');
            $("label[for='dt-search-0']").addClass('dark:text-white');
            $('#datatable_1_info').addClass('dark:text-white');
            $("#datatable_1_wrapper .justify-self-end").removeClass("col-start-2");
            $("#datatable_1_wrapper .justify-self-end").addClass("col-start-3");
            $('#search').addClass('hidden')
            $('#category').on('change', function() {
                if ($(this).val() != '0') {
                    $('#search').removeClass('hidden')
                }
            })

            $('#search').keyup(function() {
                var search = $(this).val();
                var category = $('#category').val();
                $.get("{{ route($route1 . '.' . $route2) }}", {
                    category: category,
                    search: search
                }, function(data) {
                    if ($('#search').val() != '') {
                        $('.datatable_1').addClass('hidden')
                        $('.datatable_2').removeClass('hidden')
                        $('.datatable_2').html(data)
                    } else {
                        $('.datatable_1').removeClass('hidden')
                        $('.datatable_2').addClass('hidden')
                    }
                });
            });
        })
    </script>
@else
    <script>
        let table = new DataTable("#datatable_1", {
            responsive: true,
            fixedColumns: true,
            autoWidth: true,
            autoFill: true,
            language: {
                url: "//cdn.datatables.net/plug-ins/1.13.7/i18n/id.json",
            },
        });

        $(document).ready(function() {
            $("label[for='dt-length-0']").addClass('dark:text-white');
            $("label[for='dt-search-0']").addClass('dark:text-white');
            $('#datatable_1_info').addClass('dark:text-white')
            $('#search').addClass('hidden')
            $('#category').on('change', function() {
                if ($(this).val() != '0') {
                    $('#search').removeClass('hidden')
                }
            })
        })
    </script>
@endif
</body>

</html>
