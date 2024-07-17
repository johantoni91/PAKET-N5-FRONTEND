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
                                    <h1 class="font-medium text-3xl block dark:text-slate-100">Riwayat Log Aktivitas</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="xl:w-full  min-h-[calc(100vh-138px)] relative pb-14">
                    <div class="xl:w-full  min-h-[calc(100vh-138px)] relative pb-14">
                        <div class="grid md:grid-cols-12 lg:grid-cols-12 xl:grid-cols-12 gap-4 mb-4">
                            <div class="sm:col-span-12  md:col-span-12 lg:col-span-12 xl:col-span-12 xl:col-start-0">
                                <div
                                    class="bg-white dark:bg-gray-900 border border-slate-200 dark:border-slate-700/40  rounded-md w-full relative mb-4">
                                    <div
                                        class="border-b border-slate-200 dark:border-slate-700/40 py-3 px-5 dark:text-slate-300/70">
                                        <div class="flex-none md:flex">
                                            <h4 class="font-medium text-lg flex-1 self-center mb-2 md:mb-0">
                                                Log Aktivitas
                                            </h4>
                                            <div class="flex flex-column sm:flex-row items-center justify-end">
                                                <div class="flex flex-row justify-between px-5">
                                                    <button type="button" data-modal-target="search"
                                                        data-modal-toggle="search"
                                                        class="flex items-center gap-1 focus:outline-none dark:bg-gradient-to-r dark:from-slate-900 dark:via-slate-900 dark:to-[#3282B8] dark:hover:from-[#3282B8] dark:hover:via-slate-900 dark:hover:to-slate-900 bg-gradient-to-r from-white via-white to-[#F4CE14] hover:from-[#F4CE14] hover:via-white hover:to-white dark:text-white text-sm font-medium py-1 px-3 rounded">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                            class="w-4 h-4">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                                                        </svg> Cari Log
                                                    </button>
                                                    @include('log_activity.search')
                                                </div>
                                                @if (!request()->routeIs('log'))
                                                    <div class="flex flex-row justify-end">
                                                        <a href="{{ route('log') }}"
                                                            class="flex items-center gap-1 focus:outline-none dark:bg-gradient-to-r dark:from-slate-900 dark:via-slate-900 dark:to-[#3282B8] dark:hover:from-[#3282B8] dark:hover:via-slate-900 dark:hover:to-slate-900 bg-gradient-to-r from-white via-white to-[#F4CE14] hover:from-[#F4CE14] hover:via-white hover:to-white dark:text-white text-sm font-medium py-1 px-3 rounded">
                                                            Kembali
                                                        </a>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="grid grid-cols-1 p-4">
                                        <div class="relative overflow-auto xl:overflow-hidden block w-full sm:px-6 lg:px-8">
                                            <div class="relative sm:rounded-lg">
                                                <table
                                                    class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                                    <thead
                                                        class="bg-slate-200 dark:bg-slate-700 border-b-2 border-slate-500 text-xs text-center text-gray-700 uppercase dark:text-white">
                                                        <tr>
                                                            <th scope="col" class="px-6 py-3">
                                                                Username
                                                            </th>
                                                            <th scope="col" class="px-6 py-3">
                                                                Alamat IP
                                                            </th>
                                                            <th scope="col" class="px-6 py-3">
                                                                Browser
                                                            </th>
                                                            <th scope="col" class="px-6 py-3">
                                                                Versi Browser
                                                            </th>
                                                            <th scope="col" class="px-6 py-3">
                                                                Sistem Operasi
                                                            </th>
                                                            <th scope="col" class="px-6 py-3">
                                                                Aktivitas
                                                            </th>
                                                            <th scope="col" class="px-6 py-3">
                                                                Waktu
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($data['data'] as $item)
                                                            <tr
                                                                class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                                                <th scope="row"
                                                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                                    {{ $item['username'] }}
                                                                </th>
                                                                <td class="px-6 py-4 text-center">
                                                                    {{ $item['ip_address'] }}
                                                                </td>
                                                                <td class="px-6 py-4 text-center">
                                                                    {{ $item['browser'] }}
                                                                </td>
                                                                <td class="px-6 py-4 text-center">
                                                                    {{ $item['browser_version'] }}
                                                                </td>
                                                                <td class="px-6 py-4 text-center">
                                                                    {{ $item['os'] }}
                                                                </td>
                                                                <td class="px-6 py-4">
                                                                    {{ $item['log_detail'] }}
                                                                </td>
                                                                <td class="px-6 py-4 text-center">
                                                                    {{ Carbon\Carbon::parse(strtotime($item['created_at']))->translatedFormat('l, d F Y') }}
                                                                    <br>
                                                                    {{ Carbon\Carbon::parse(strtotime($item['created_at']))->translatedFormat('H:i:s') }}
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    @include('partials.pagination')
                                </div>
                            </div>
                        </div>
                        @include('partials.footer')
                    </div>
                </div>
            </div>
        @endsection
