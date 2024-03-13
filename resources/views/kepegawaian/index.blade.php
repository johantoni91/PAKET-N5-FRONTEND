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
                                    <h1 class="font-medium text-3xl block dark:text-slate-100">Manajemen Data Pegawai</h1>
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
                                        <h4 class="font-medium text-lg flex-1 self-center mb-2 md:mb-0">Data Pegawai</h4>
                                        @if (!request()->routeIs('pegawai'))
                                            <div class="flex flex-row justify-end">
                                                <a href="{{ route('pegawai') }}"
                                                    class="py-1 px-2 rounded-lg flex flex-row items-center justify-center gap-2 text-blue-500 dark:text-blue-500 dark:text-blue-500 dark:hover:text-white dark:border-blue-500 dark:hover:bg-blue-500 dark:hover:shadow dark:hover:shadow-white hover:bg-blue-500 hover:text-white border border-blue-500">
                                                    Filter <i data-lucide="search-x"></i>
                                                </a>
                                            </div>
                                        @endif
                                    </div>
                                </div><!--end header-title-->
                                <div class="grid grid-cols-1 p-4 overflow-scroll">
                                    <div class="sm:-mx-6 lg:-mx-8">
                                        <div class="relative overflow-x-auto block w-full sm:px-6 lg:px-10">
                                            @if ($data)
                                                <div class="flex flex-row justify-between px-5">
                                                    <button type="button" data-modal-target="create"
                                                        data-modal-toggle="create"
                                                        class="focus:outline-none bg-primary-500 text-white border border-primary-500 dark:bg-transparent dark:text-primary-500 dark:hover:text-white dark:border-gray-700 dark:hover:bg-primary-500 text-sm font-medium py-1 px-3 rounded w-24">+
                                                        Pegawai</button>
                                                    @include('partials.modals.pegawai.create')
                                                    <button type="button" data-modal-target="search"
                                                        data-modal-toggle="search"
                                                        class="flex flex-row focus:outline-none text-primary-500 hover:bg-primary-500 hover:text-white bg-transparent border border-primary-500 dark:bg-transparent dark:text-primary-500 dark:hover:text-white dark:border-gray-700 dark:hover:bg-primary-500 text-sm font-medium rounded w-32 justify-between px-2 align-bottom items-center">
                                                        Cari Pegawai <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                            class="w-4 h-4">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                                                        </svg>
                                                    </button>
                                                    @include('partials.modals.pegawai.search')
                                                </div>
                                            @endif
                                            <div class="flex flex-col gap-5 p-5">
                                                <div class="datatable_1">
                                                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                                                        <table
                                                            class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                                            <thead
                                                                class="text-xs text-gray-700 uppercase dark:text-gray-400 border-b-2 border-slate-500">
                                                                <tr class="text-center">
                                                                    <th scope="col"
                                                                        class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                                                                        Nama
                                                                    </th>
                                                                    <th scope="col" class="px-6 py-3">
                                                                        Jabatan
                                                                    </th>
                                                                    <th scope="col"
                                                                        class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                                                                        Jenis Kelamin
                                                                    </th>
                                                                    <th scope="col" class="px-6 py-3">
                                                                        Golongan
                                                                    </th>
                                                                    <th scope="col"
                                                                        class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                                                                        Satker
                                                                    </th>
                                                                    <th scope="col" class="px-6 py-3">
                                                                        Status Pegawai
                                                                    </th>
                                                                    <th scope="col"
                                                                        class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                                                                        Aksi
                                                                    </th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @if (!$data)
                                                                    <tr>
                                                                        <th colspan="7">
                                                                            <p
                                                                                class="text-red-500 mt-3 text-center text-xs italic my-2">
                                                                                Tidak
                                                                                ada data
                                                                                pegawai / belum melakukan import data
                                                                                pegawai.</p>
                                                                        </th>
                                                                    </tr>
                                                                @else
                                                                    @foreach ($data['data'] as $item)
                                                                        <tr
                                                                            class="border-b border-gray-200 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                                                            <th scope="row"
                                                                                class="px-4 py-2 text-black whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                                                                                <div class="flex flex-row">
                                                                                    <div class="p-5">
                                                                                        <img src="{{ $item['foto_pegawai'] }}"
                                                                                            class="w-10 h-10 items-center rounded-full shadow me-1 inline-block">
                                                                                    </div>
                                                                                    <div
                                                                                        class="flex flex-col justify-center text-wrap">
                                                                                        {{ $item['nama'] }}
                                                                                        <div class="text-start text-nowrap">
                                                                                            NIP :
                                                                                            {{ $item['nip'] ?? $item['nrp'] }}
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </th>
                                                                            <td class="px-6 py-4 dark:text-white">
                                                                                {{ $item['jabatan'] }}
                                                                            </td>
                                                                            <td
                                                                                class="px-6 py-4 dark:text-white bg-gray-50 dark:bg-gray-800 text-center">
                                                                                {{ $item['jenis_kelamin'] }}
                                                                            </td>
                                                                            <td class="px-6 py-4 dark:text-white">
                                                                                {{ $item['golpang'] }}
                                                                            </td>
                                                                            <td
                                                                                class="px-6 py-4 dark:text-white bg-gray-50 dark:bg-gray-800 font-bold">
                                                                                {{ $item['nama_satker'] }}
                                                                            </td>
                                                                            <td class="px-6 py-4 dark:text-white">
                                                                                {{ $item['status_pegawai'] }}
                                                                            </td>
                                                                            <td
                                                                                class="px-10 py-4 dark:text-white bg-gray-50 dark:bg-gray-800">
                                                                                <div class="flex flex-row">
                                                                                    <button
                                                                                        data-modal-target="update{{ $item['nip'] ?? $item['nrp'] }}"
                                                                                        data-modal-toggle="update{{ $item['nip'] ?? $item['nrp'] }}"
                                                                                        class="text-blue-600 hover:text-blue-400">
                                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                                            fill="none"
                                                                                            viewBox="0 0 24 24"
                                                                                            stroke-width="1.5"
                                                                                            stroke="currentColor"
                                                                                            class="w-6 h-6">
                                                                                            <path stroke-linecap="round"
                                                                                                stroke-linejoin="round"
                                                                                                d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                                                                        </svg>
                                                                                    </button>
                                                                                    @include('partials.modals.pegawai.update')
                                                                                    <button
                                                                                        data-modal-target="delete{{ $item['nip'] ?? $item['nrp'] }}"
                                                                                        data-modal-toggle="delete{{ $item['nip'] ?? $item['nrp'] }}"
                                                                                        class="text-red-600 hover:text-red-400">
                                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                                            fill="none"
                                                                                            viewBox="0 0 24 24"
                                                                                            stroke-width="1.5"
                                                                                            stroke="currentColor"
                                                                                            class="w-6 h-6">
                                                                                            <path stroke-linecap="round"
                                                                                                stroke-linejoin="round"
                                                                                                d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                                                                        </svg>
                                                                                    </button>
                                                                                    @include('partials.modals.pegawai.delete')
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                    @endforeach
                                                                @endif
                                                            </tbody>
                                                        </table>
                                                        @if ($data)
                                                            @include('partials.pagination')
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
            </div>
        </div>
    </div>
@endsection
