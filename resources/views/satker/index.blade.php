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
                                    <h1 class="font-medium text-3xl block dark:text-slate-100">Satker</h1>
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
                                            <h4 class="font-medium text-lg flex-1 self-center mb-2 md:mb-0">Data Satuan
                                                Kerja</h4>
                                            @if (!request()->routeIs('satker'))
                                                <div class="flex flex-row justify-end">
                                                    <a href="{{ route('satker') }}"
                                                        class="py-1 px-2 rounded-lg flex flex-row items-center justify-center gap-2 text-blue-500 dark:text-blue-500 dark:text-blue-500 dark:hover:text-white dark:border-blue-500 dark:hover:bg-blue-500 dark:hover:shadow dark:hover:shadow-white hover:bg-blue-500 hover:text-white border border-blue-500">
                                                        Filter <i data-lucide="search-x"></i>
                                                    </a>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="grid grid-cols-1 p-4 overflow-scroll">
                                        <div class="sm:-mx-6 lg:-mx-8">
                                            <div class="relative overflow-x-auto block w-full sm:px-6 lg:px-8">
                                                <div class="flex flex-col gap-3 mb-5">
                                                    <div class="flex flex-row justify-between px-5">
                                                        {{-- <button type="button" data-modal-target="create"
                                                            data-modal-toggle="create"
                                                            class="focus:outline-none bg-primary-500 text-white border border-primary-500 dark:bg-transparent dark:text-primary-500 dark:hover:text-white dark:border-gray-700 dark:hover:bg-primary-500 text-sm font-medium py-1 px-3 rounded w-24">+
                                                            Satker</button>
                                                        @include('partials.modals.satker.create') --}}
                                                        <div class="justify-end">
                                                            <button type="button" data-modal-target="search"
                                                                data-modal-toggle="search"
                                                                class="flex flex-row focus:outline-none text-primary-500 hover:bg-primary-500 hover:text-white bg-transparent border border-primary-500 dark:bg-transparent dark:text-primary-500 dark:hover:text-white dark:border-gray-700 dark:hover:bg-primary-500 text-sm font-medium rounded w-32 justify-between py-1 px-2 align-bottom items-center">
                                                                Cari Satker <svg xmlns="http://www.w3.org/2000/svg"
                                                                    fill="none" viewBox="0 0 24 24" stroke-width="2"
                                                                    stroke="currentColor" class="w-4 h-4">
                                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                                        d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                                                                </svg>
                                                            </button>
                                                            @include('partials.modals.satker.search')
                                                        </div>
                                                    </div>
                                                    <div class="flex flex-col gap-5">
                                                        <div class="datatable_1">
                                                            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                                                                <table
                                                                    class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                                                    <thead
                                                                        class="text-xs border-b-2 border-slate-500 text-center text-gray-700 uppercase dark:text-gray-400">
                                                                        <tr>
                                                                            <th scope="col"
                                                                                class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                                                                                Satker
                                                                            </th>
                                                                            <th scope="col" class="px-6 py-3">
                                                                                Telepon
                                                                            </th>
                                                                            <th scope="col"
                                                                                class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                                                                                Email
                                                                            </th>
                                                                            <th scope="col" class="px-6 py-3">
                                                                                Alamat
                                                                            </th>
                                                                            <th scope="col"
                                                                                class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                                                                                URL
                                                                            </th>
                                                                            <th scope="col" class="px-6 py-3">
                                                                                Aksi
                                                                            </th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        @foreach ($data['data'] as $item)
                                                                            <tr
                                                                                class="border-b border-gray-200 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                                                                <th scope="row"
                                                                                    class="px-4 py-2 text-black whitespace-nowrap text-wrap bg-gray-50 dark:text-white dark:bg-gray-800">
                                                                                    {{ $item['satker_name'] }}
                                                                                </th>
                                                                                <td
                                                                                    class="text-center px-6 py-4 dark:text-white">
                                                                                    {{ $item['satker_phone'] }}
                                                                                </td>
                                                                                <td
                                                                                    class="text-center px-6 py-4 dark:text-white bg-gray-50 dark:bg-gray-800">
                                                                                    {{ $item['satker_email'] }}
                                                                                </td>
                                                                                <td
                                                                                    class="text-center px-6 py-4 dark:text-white text-justify">
                                                                                    {{ $item['satker_address'] }}
                                                                                </td>
                                                                                <td
                                                                                    class="text-center px-6 py-4 dark:text-white bg-gray-50 dark:bg-gray-800">
                                                                                    {{ $item['satker_url'] }}
                                                                                </td>
                                                                                <td class="px-6 py-4 dark:text-white">
                                                                                    <div
                                                                                        class="flex flex-row justify-evenly gap-2">
                                                                                        {{-- <button type="button"
                                                                                            data-modal-target="update{{ $item['satker_id'] }}"
                                                                                            data-modal-toggle="update{{ $item['satker_id'] }}"><i
                                                                                                class="align-baseline text-center icofont-edit text-lg hover:text-black dark:text-gray-400 text-blue-500"></i></button>
                                                                                        @include('partials.modals.satker.update') --}}
                                                                                        <input type="hidden"
                                                                                            value="{{ $item['satker_id'] }}"
                                                                                            id="del{{ $item['satker_id'] }}">
                                                                                        <button type="button"
                                                                                            id="delete{{ $item['satker_id'] }}"><i
                                                                                                class="align-baseline text-center icofont-ui-delete text-lg text-red-500 dark:text-red-400 hover:text-black"></i></button>
                                                                                        <script>
                                                                                            $(document).ready(function() {
                                                                                                $("#delete{{ $item['satker_id'] }}").on('click', function(e) {
                                                                                                    e.preventDefault()
                                                                                                    var id = $("#del{{ $item['satker_id'] }}").val()
                                                                                                    Swal.fire({
                                                                                                        title: "PERINGATAN",
                                                                                                        text: "Apakah anda yakin menghapus satker ?",
                                                                                                        icon: "warning",
                                                                                                        showCancelButton: true,
                                                                                                        confirmButtonColor: "#3085d6",
                                                                                                        cancelButtonColor: "#d33",
                                                                                                        confirmButtonText: "Hapus"
                                                                                                    }).then((result) => {
                                                                                                        if (result.isConfirmed) {
                                                                                                            $.ajax({
                                                                                                                url: "{{ route('satker.destroy') }}",
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
                                                                                    </div>
                                                                                </td>
                                                                            </tr>
                                                                        @endforeach
                                                                    </tbody>
                                                                </table>
                                                                @if ($data['data'])
                                                                    @include('partials.pagination')
                                                                @else
                                                                    <div
                                                                        class="flex flex-row justify-center text-center py-3">
                                                                        <small class="text-xs text-red-500 italic">Data
                                                                            kosong /
                                                                            tidak ditemukan</small>
                                                                    </div>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @include('partials.footer')
                    </div><!--end page-wrapper-->
                </div>
            </div>
        @endsection
