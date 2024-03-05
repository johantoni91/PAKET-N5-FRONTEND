@extends('partials.main')
@section('content')
    @include('partials.sidebar')
    @include('partials.topbar')
    <style>
        .datatable-input {
            border: 1px solid rgb(203 213 225 / .6);
            border-radius: 0.25rem;
        }
    </style>
    <div class="ltr:flex flex-1 rtl:flex-row-reverse">
        <div class="page-wrapper relative ltr:ml-auto rtl:mr-auto rtl:ml-0 w-[calc(100%-260px)] px-4 pt-[64px] duration-300">
            <div class="xl:w-full">
                <div class="flex flex-wrap">
                    <div class="flex items-center py-4 w-full">
                        <div class="w-full">
                            <div class="flex flex-wrap justify-between">
                                <div class="items-center ">
                                    <h1 class="font-medium text-3xl block dark:text-slate-100">{{ $title }}</h1>
                                    {{-- <ol class="list-reset flex text-sm">
                                    <li><button type="button" class="text-gray-500 dark:text-slate-400">Robotech</button></li>
                                    <li><span class="text-gray-500 dark:text-slate-400 mx-2">/</span></li>
                                    <li class="text-gray-500 dark:text-slate-400">Tables</li>
                                    <li><span class="text-gray-500 dark:text-slate-400 mx-2">/</span></li>
                                    <li class="text-primary-500 hover:text-primary-600 dark:text-primary-400">Datatable
                                    </li>
                                </ol> --}}
                                </div><!--end /div-->
                                {{-- <div>
                                    <input type="date" name="date" id="date" value="{{ now()->format('Y-m-d') }}"
                                        class="rounded-lg bg-blue-300 z-10 border-0 text-transparent focus:border-0 dark:border-slate-700 dark:text-white dark:bg-slate-700">
                                    <span
                                        class="absolute right-[3.3rem] top-[5.1rem] bg-blue-300 p-2 dark:text-white dark:bg-slate-700"
                                        id="now"></span>
                                </div>
                                <script>
                                    var dateString = $("#date").val();
                                    var date = new Date(dateString);

                                    var options = {
                                        year: 'numeric',
                                        month: 'long',
                                        day: 'numeric'
                                    };
                                    var humanDate = date.toLocaleDateString('id-ID', options);
                                    $("#now").text(humanDate);
                                    $(document).ready(function() {
                                        $("#date").on('change', function(e) {
                                            e.preventDefault()
                                            var dateString = $("#date").val();
                                            var date = new Date(dateString);

                                            var options = {
                                                year: 'numeric',
                                                month: 'long',
                                                day: 'numeric'
                                            };
                                            var humanDate = date.toLocaleDateString('id-ID', options);
                                            $("#now").text(humanDate);
                                        })
                                    })
                                </script> --}}
                            </div><!--end /div-->
                        </div><!--end /div-->
                    </div><!--end /div-->
                </div><!--end /div-->
            </div><!--end container-->
            <div class="xl:w-full  min-h-[calc(100vh-138px)] relative pb-14">
                <div class="xl:w-full  min-h-[calc(100vh-138px)] relative pb-14">
                    <div class="grid md:grid-cols-12 lg:grid-cols-12 xl:grid-cols-12 gap-4 mb-4">

                        <div class="sm:col-span-12  md:col-span-12 lg:col-span-12 xl:col-span-12 xl:col-start-0 ">
                            <div
                                class="bg-white dark:bg-gray-900 border border-slate-200 dark:border-slate-700/40  rounded-md w-full relative mb-4">
                                <div
                                    class="border-b border-slate-200 dark:border-slate-700/40 py-3 px-4 dark:text-slate-300/70">
                                    <div class="flex-none md:flex">
                                        <h4 class="font-medium text-lg flex-1 self-center mb-2 md:mb-0">Data Users</h4>
                                        <div class="gap-5">
                                            <a href="{{ route('excel.users') }}"
                                                class="inline-block focus:outline-none text-green-500 hover:bg-green-500 hover:text-white bg-transparent border border-green-500 dark:bg-transparent dark:text-green-500 dark:hover:text-white dark:border-gray-700 dark:hover:bg-green-500 text-sm font-medium py-1 px-3 rounded mb-1 lg:mb-0 csv">Export
                                                Excel</a>
                                            <a href="{{ route('pdf.users') }}"
                                                class="inline-block focus:outline-none text-red-400 hover:bg-red-500 hover:text-white bg-transparent border border-red-400 dark:bg-transparent dark:text-red-500 dark:hover:text-white dark:border-gray-700 dark:hover:bg-red-500 text-sm font-medium py-1 px-3 rounded mb-1 lg:mb-0 sql">Export
                                                PDF</a>
                                        </div>
                                    </div>
                                </div><!--end header-title-->
                                <div class="grid grid-cols-1 p-4 overflow-scroll">
                                    <div class="sm:-mx-6 lg:-mx-8">
                                        <div class="relative overflow-x-auto block w-full sm:px-6 lg:px-8">
                                            <div class="flex flex-row justify-between px-5 mb-5">
                                                <button type="button" data-modal-target="create" data-modal-toggle="create"
                                                    class="focus:outline-none bg-primary-500 text-white border border-primary-500 dark:bg-transparent dark:text-primary-500 dark:hover:text-white dark:border-gray-700 dark:hover:bg-primary-500 text-sm font-medium py-1 px-3 rounded w-24">+
                                                    User</button>
                                                @include('partials.modals.user.createUser')
                                                <button type="button" data-modal-target="search" data-modal-toggle="search"
                                                    class="flex flex-row focus:outline-none text-primary-500 hover:bg-primary-500 hover:text-white bg-transparent border border-primary-500 dark:bg-transparent dark:text-primary-500 dark:hover:text-white dark:border-gray-700 dark:hover:bg-primary-500 text-sm font-medium rounded w-32 justify-around px-2 align-bottom items-center">
                                                    Cari User <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                        class="w-4 h-4">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                                                    </svg>
                                                </button>
                                                @include('partials.modals.pegawai.search')
                                            </div>
                                            <div class="flex flex-col gap-5">
                                                <div class="datatable_1">
                                                    <table class="table w-full border-collapse" width="100%"
                                                        id="datatable_1">
                                                        <thead class="bg-slate-100 dark:bg-slate-700/20">
                                                            <tr>
                                                                <th scope="col"
                                                                    class="p-3 text-xs font-medium tracking-wider text-left text-gray-700 dark:text-gray-400 uppercase">
                                                                    Nama
                                                                </th>
                                                                <th scope="col"
                                                                    class="p-3 text-xs font-medium tracking-wider text-left text-gray-700 dark:text-gray-400 uppercase">
                                                                    Email
                                                                </th>
                                                                <th scope="col"
                                                                    class="p-3 text-xs font-medium tracking-wider text-left text-gray-700 dark:text-gray-400 uppercase">
                                                                    Phone
                                                                </th>
                                                                <th scope="col"
                                                                    class="p-3 text-xs font-medium tracking-wider text-left text-gray-700 dark:text-gray-400 uppercase">
                                                                    Role
                                                                </th>
                                                                <th scope="col"
                                                                    class="p-3 text-xs font-medium tracking-wider text-left text-gray-700 dark:text-gray-400 uppercase">
                                                                    Aksi
                                                                </th>
                                                                <th scope="col"
                                                                    class="p-3 text-xs font-medium tracking-wider text-left text-gray-700 dark:text-gray-400 uppercase">
                                                                    Status
                                                                </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($data['data'] as $item)
                                                                <tr
                                                                    class="bg-white border-b border-dashed dark:bg-gray-900 dark:border-gray-700">
                                                                    <td
                                                                        class="align-baseline whitespace-nowrap p-3 text-sm font-medium dark:text-white">
                                                                        @if ($item['users']['photo'])
                                                                            <img src="{{ env('API_IMG', '') . $item['users']['photo'] }}"
                                                                                alt=""
                                                                                class="mr-2 h-6 rounded-full inline-block">{{ $item['users']['name'] }}
                                                                        @else
                                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                                fill="none" viewBox="0 0 24 24"
                                                                                stroke-width="1.5" stroke="currentColor"
                                                                                class="w-6 h-6 mr-2 rounded-full inline-block">
                                                                                <path stroke-linecap="round"
                                                                                    stroke-linejoin="round"
                                                                                    d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                                                            </svg> {{ $item['users']['name'] }}
                                                                        @endif
                                                                    </td>
                                                                    <td
                                                                        class="align-baseline whitespace-nowrap p-3 text-sm text-gray-500 dark:text-gray-400">
                                                                        {{ $item['users']['email'] }}
                                                                    </td>
                                                                    <td
                                                                        class="text-start align-baseline whitespace-nowrap p-3 text-sm text-gray-500 dark:text-gray-400">
                                                                        {{ $item['users']['phone'] }}
                                                                    </td>
                                                                    <td
                                                                        class="align-baseline whitespace-nowrap p-3 text-sm text-gray-500 dark:text-gray-400">
                                                                        {{ $item['roles'] }}
                                                                    </td>
                                                                    <td
                                                                        class="p-3 text-sm text-gray-500 dark:text-gray-400">
                                                                        <button type="button"
                                                                            data-modal-target="update{{ $item['id'] }}"
                                                                            data-modal-toggle="update{{ $item['id'] }}"><i
                                                                                class="align-baseline icofont-edit text-lg text-gray-500 dark:text-gray-400"></i></button>
                                                                        @if ($item['users_id'] != $profile['users_id'])
                                                                            <input type="hidden"
                                                                                value="{{ $item['users_id'] }}"
                                                                                id="del{{ $item['id'] }}">
                                                                            <button type="button"
                                                                                id="delete{{ $item['id'] }}"><i
                                                                                    class="align-baseline icofont-ui-delete text-lg text-red-500 dark:text-red-400"></i></button>
                                                                            <script>
                                                                                $(document).ready(function() {
                                                                                    $("#delete{{ $item['id'] }}").on('click', function(e) {
                                                                                        e.preventDefault()
                                                                                        var id = $("#del{{ $item['id'] }}").val()
                                                                                        Swal.fire({
                                                                                            title: "PERINGATAN",
                                                                                            text: "Apakah anda yakin menghapus user {{ $item['users']['name'] }} ?",
                                                                                            icon: "warning",
                                                                                            showCancelButton: true,
                                                                                            confirmButtonColor: "#3085d6",
                                                                                            cancelButtonColor: "#d33",
                                                                                            confirmButtonText: "Hapus"
                                                                                        }).then((result) => {
                                                                                            if (result.isConfirmed) {
                                                                                                $.ajax({
                                                                                                    url: "{{ route('user.destroy') }}",
                                                                                                    type: "POST",
                                                                                                    headers: {
                                                                                                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                                                                                                    },
                                                                                                    data: {
                                                                                                        id: id
                                                                                                    },
                                                                                                    success: function(data) {
                                                                                                        location.reload();
                                                                                                    },
                                                                                                    error: function(xhr) {

                                                                                                    }
                                                                                                })
                                                                                            }
                                                                                        });

                                                                                    })
                                                                                })
                                                                            </script>
                                                                        @endif
                                                                        @include('partials.modals.user.users')
                                                                    </td>
                                                                    <td>
                                                                        <a href="{{ route('user.status', [$item['users_id'], $item['status']]) }}"
                                                                            class="align-baseline flex flex-row {{ $item['status'] == '1' ? 'hover:drop-shadow-green' : 'hover:drop-shadow-red' }}">
                                                                            @if ($item['status'] == '1')
                                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                                    fill="none" viewBox="0 0 24 24"
                                                                                    stroke-width="1.5" stroke="currentColor"
                                                                                    class="w-6 h-6 text-green-500">
                                                                                    <path stroke-linecap="round"
                                                                                        stroke-linejoin="round"
                                                                                        d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                                                                </svg>
                                                                                <span
                                                                                    class="text-sm text-green-500 ms-2 mt-0.5">
                                                                                    Aktif</span>
                                                                            @else
                                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                                    fill="none" viewBox="0 0 24 24"
                                                                                    stroke-width="1.5"
                                                                                    stroke="currentColor"
                                                                                    class="w-6 h-6 text-red-500">
                                                                                    <path stroke-linecap="round"
                                                                                        stroke-linejoin="round"
                                                                                        d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                                                                </svg>
                                                                                <span
                                                                                    class="text-sm text-red-500 ms-2 mt-0.5">
                                                                                    Nonaktif</span>
                                                                            @endif
                                                                        </a>
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="datatable_2">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <small class="text-red-400">Klik icon status untuk mengubah
                                        status</small>
                                </div><!--end card-body-->
                            </div> <!--end card-->
                        </div><!--end col-->
                    </div>
                </div>
                @include('partials.footer')
            </div><!--end page-wrapper-->
        </div><!--end /div-->
    </div>
@endsection
