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
                                        <h4 class="font-medium text-lg flex-1 self-center mb-2 md:mb-0">Data Pengajuan</h4>
                                        @if ($data['data'])
                                            <button type="button" data-modal-target="search" data-modal-toggle="search"
                                                class="flex text-nowrap gap-2 flex-row focus:outline-none text-primary-500 hover:bg-primary-500 hover:text-white bg-transparent border border-primary-500 dark:bg-transparent dark:text-primary-500 dark:hover:text-white dark:border-gray-700 dark:hover:bg-primary-500 text-sm font-medium rounded justify-between py-1 px-2 align-bottom items-center">
                                                Cari Pengajuan <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                    class="w-4 h-4">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                                                </svg>
                                            </button>
                                            @include('partials.modals.pengajuan.search')
                                        @endif
                                    </div>
                                </div>
                                <div class="grid grid-cols-1 p-4 overflow-scroll">
                                    <div class="sm:-mx-6 lg:-mx-8">
                                        <div class="relative overflow-x-auto block w-full sm:px-6 lg:px-10">
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
                                                                        Pengajuan
                                                                    </th>
                                                                    <th scope="col"
                                                                        class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                                                                        Persetujuan
                                                                    </th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @if (!$data['data'])
                                                                    <tr>
                                                                        <th colspan="3">
                                                                            <p
                                                                                class="text-red-500 mt-3 text-center text-xs italic">
                                                                                Tidak ada pengajuan</p>
                                                                        </th>
                                                                    </tr>
                                                                @else
                                                                    @foreach ($data['data'] as $item)
                                                                        <tr
                                                                            class="border-b border-gray-200 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                                                            <th scope="row"
                                                                                class="px-4 py-2 text-black whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                                                                                <div
                                                                                    class="flex flex-col justify-center text-wrap">
                                                                                    {{ $item['nama'] }}
                                                                                    <div class="text-start text-nowrap">
                                                                                        NIP :
                                                                                        {{ $item['nip'] }}
                                                                                    </div>
                                                                                </div>
                                                                            </th>
                                                                            <td
                                                                                class="px-6 py-4 dark:text-white text-center font-bold">
                                                                                {{ $item['kartu'] }}
                                                                            </td>
                                                                            <td
                                                                                class="px-10 py-4 text-center dark:text-white bg-gray-50 dark:bg-gray-800">
                                                                                @include('pengajuan.partials.aksi')
                                                                            </td>
                                                                        </tr>
                                                                    @endforeach
                                                                @endif
                                                            </tbody>
                                                        </table>
                                                        @if (!$data['data'])
                                                            @include('partials.pagination')
                                                        @endif
                                                    </div>
                                                </div>
                                                @if (!request()->routeIs('pengajuan'))
                                                    <div class="flex flex-row justify-end">
                                                        <a href="{{ route('pengajuan') }}"
                                                            class="p-2 rounded-lg flex flex-row justify-between text-blue-500 dark:text-blue-500 dark:text-blue-500 dark:hover:text-white dark:border-blue-500 dark:hover:bg-blue-500 dark:hover:shadow dark:hover:shadow-white hover:bg-blue-500 hover:text-white border border-blue-500"><svg
                                                                xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                                class="w-6 h-6">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15M12 9l-3 3m0 0 3 3m-3-3h12.75" />
                                                            </svg> Kembali
                                                        </a>
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
                @include('partials.footer')
            </div>
        </div>
    </div>
@endsection
