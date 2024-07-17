@extends('partials.main')
@section('content')
    @include('partials.sidebar')
    @include('partials.topbar')
    <div class="ltr:flex flex-1 rtl:flex-row-reverse">
        <div class="page-wrapper relative ltr:ml-auto rtl:mr-auto rtl:ml-0 w-[calc(100%-260px)] px-4 pt-[64px] duration-300">
            <div class="xl:w-full">
                <div class="flex flex-wrap">
                    <div class="flex items-center py-4 w-full">
                        <div class="w-full">
                            <div class="flex flex-wrap justify-between">
                                <div class="items-center ">
                                    <h1 class="font-medium text-3xl block dark:text-slate-100">{{ $title }}</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
                                        <div class="flex flex-row gap-1">
                                            <a href="{{ route('excel.users') }}"
                                                class="inline-block focus:outline-none text-green-500 hover:bg-green-500 hover:text-white bg-transparent border border-green-500 dark:bg-transparent dark:text-green-500 dark:hover:text-white dark:border-gray-700 dark:hover:bg-green-500 text-sm font-medium py-1 px-3 rounded mb-1 lg:mb-0 csv">Export
                                                Excel</a>
                                            <a href="{{ route('pdf.users') }}"
                                                class="inline-block focus:outline-none text-red-400 hover:bg-red-500 hover:text-white bg-transparent border border-red-400 dark:bg-transparent dark:text-red-500 dark:hover:text-white dark:border-gray-700 dark:hover:bg-red-500 text-sm font-medium py-1 px-3 rounded mb-1 lg:mb-0 sql">Export
                                                PDF</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="grid grid-cols-1 p-4">
                                    <div class="sm:-mx-6 lg:-mx-8">
                                        <div class="relative block w-full sm:px-6 lg:px-8">
                                            <div class="flex flex-row justify-between px-5 mb-5">
                                                @if (session('data')['roles'] == 'superadmin')
                                                    <button type="button" data-modal-target="create"
                                                        data-modal-toggle="create"
                                                        class="focus:outline-none dark:bg-gradient-to-r dark:from-slate-900 dark:via-slate-900 dark:to-[#3282B8] dark:hover:from-[#3282B8] dark:hover:via-slate-900 dark:hover:to-slate-900 bg-gradient-to-r from-white via-white to-[#F4CE14] hover:from-[#F4CE14] hover:via-white hover:to-white dark:text-white text-sm font-medium py-1 px-3 rounded">+
                                                        Users</button>
                                                    @include('user.partials.choose_role')
                                                @endif
                                                <div class="flex flex-row justify-center gap-2">
                                                    <button type="button" data-modal-target="search"
                                                        data-modal-toggle="search"
                                                        class="flex items-center gap-1 focus:outline-none dark:bg-gradient-to-r dark:from-slate-900 dark:via-slate-900 dark:to-[#3282B8] dark:hover:from-[#3282B8] dark:hover:via-slate-900 dark:hover:to-slate-900 bg-gradient-to-r from-white via-white to-[#F4CE14] hover:from-[#F4CE14] hover:via-white hover:to-white dark:text-white text-sm font-medium py-1 px-3 rounded">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                            class="w-4 h-4">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                                                        </svg> Cari Users
                                                    </button>
                                                    @include('user.modals.search')
                                                    @if (!request()->routeIs('user'))
                                                        <a href="{{ route('user') }}"
                                                            class="flex items-center gap-1 focus:outline-none dark:bg-gradient-to-r dark:from-slate-900 dark:via-slate-900 dark:to-[#3282B8] dark:hover:from-[#3282B8] dark:hover:via-slate-900 dark:hover:to-slate-900 bg-gradient-to-r from-white via-white to-[#F4CE14] hover:from-[#F4CE14] hover:via-white hover:to-white dark:text-white text-sm font-medium py-1 px-3 rounded">
                                                            Kembali
                                                        </a>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="flex flex-col gap-5">
                                                <div class="datatable_1">
                                                    <table
                                                        class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                                        <thead
                                                            class="bg-slate-200 dark:bg-slate-700 border-b-2 border-slate-500 text-xs text-center text-gray-700 uppercase dark:text-white">
                                                            <tr>
                                                                <th scope="col" class="px-6 py-3">
                                                                    Nama
                                                                </th>
                                                                <th scope="col" class="px-6 py-3">
                                                                    Email
                                                                </th>
                                                                <th scope="col" class="px-6 py-3">
                                                                    Telepon
                                                                </th>
                                                                <th scope="col" class="px-6 py-3">
                                                                    Role
                                                                </th>
                                                                <th scope="col" class="px-6 py-3">
                                                                    Aksi
                                                                </th>
                                                                <th scope="col" class="px-6 py-3">
                                                                    Status
                                                                </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($data['data'] as $item)
                                                                <tr
                                                                    class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                                                    <th
                                                                        class="px-4 py-2 text-black whitespace-nowrap dark:text-white">
                                                                        @if ($item['photo'])
                                                                            <img src="{{ env('API_IMG', '') . $item['photo'] }}"
                                                                                alt=""
                                                                                class="mr-2 h-6 rounded-full inline-block">{{ $item['name'] }}
                                                                        @else
                                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                                fill="none" viewBox="0 0 24 24"
                                                                                stroke-width="1.5" stroke="currentColor"
                                                                                class="w-6 h-6 mr-2 rounded-full inline-block">
                                                                                <path stroke-linecap="round"
                                                                                    stroke-linejoin="round"
                                                                                    d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                                                            </svg> {{ $item['name'] }}
                                                                        @endif
                                                                    </th>
                                                                    <td class="text-justify px-6 py-4 dark:text-white">
                                                                        {{ $item['email'] }}
                                                                    </td>
                                                                    <td
                                                                        class="text-center px-6 py-4 dark:text-white text-center">
                                                                        {{ $item['phone'] }}
                                                                    </td>
                                                                    <td class="text-justify px-6 py-4 dark:text-white">
                                                                        {{ $item['roles'] }}
                                                                    </td>
                                                                    <td
                                                                        class="text-center px-6 py-4 dark:text-white text-center">
                                                                        @if ($item['id'] != session('data')['id'])
                                                                            <button type="button"
                                                                                data-modal-target="update{{ $item['id'] }}"
                                                                                data-modal-toggle="update{{ $item['id'] }}"><i
                                                                                    class="align-baseline icofont-edit text-lg text-gray-500 dark:text-gray-400"></i></button>
                                                                            @include('user.modals.update')
                                                                        @endif
                                                                        @if ($item['id'] != $starterPack['profile']['id'])
                                                                            <input type="hidden"
                                                                                value="{{ $item['id'] }}"
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
                                                                                            text: "Apakah anda yakin menghapus user {{ $item['name'] }} ?",
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
                                                                    </td>
                                                                    <td>
                                                                        @if ($item['id'] == $starterPack['profile']['id'])
                                                                            <div
                                                                                class="align-baseline justify-center flex flex-row drop-shadow-green">
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
                                                                            </div>
                                                                        @else
                                                                            <a href="{{ route('user.status', [$item['id'], $item['status']]) }}"
                                                                                class="align-baseline justify-center flex flex-row {{ $item['status'] == '1' ? 'hover:drop-shadow-green' : 'hover:drop-shadow-red' }}">
                                                                                @if ($item['status'] == '1')
                                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                                        fill="none" viewBox="0 0 24 24"
                                                                                        stroke-width="1.5"
                                                                                        stroke="currentColor"
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
                                                                        @endif
                                                                    </td>

                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @include('partials.pagination')
                                    <small class="text-red-400">Klik icon status untuk mengubah
                                        status</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @include('partials.footer')
            </div>
        </div>
    </div>
@endsection
