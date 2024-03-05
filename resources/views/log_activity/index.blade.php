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

                            <div class="sm:col-span-12  md:col-span-12 lg:col-span-12 xl:col-span-12 xl:col-start-0 ">
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
                                                        class="flex flex-row focus:outline-none text-primary-500 hover:bg-primary-500 hover:text-white bg-transparent border border-primary-500 dark:bg-blue-500 dark:text-white dark:border-0 dark:hover:shadow-md dark:hover:shadow-blue-500 text-sm font-medium rounded justify-between gap-2 py-1 px-2 align-bottom items-center">
                                                        Cari <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                            class="w-4 h-4">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                                                        </svg>
                                                    </button>
                                                    @include('partials.modals.log_activity.search')
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="grid grid-cols-1 p-4">
                                        <div class="sm:-mx-6 lg:-mx-8">
                                            <div class="relative block w-full sm:px-6 lg:px-8">
                                                <div class="relative sm:rounded-lg">
                                                    <table
                                                        class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                                        <thead
                                                            class="text-xs text-center text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                                            <tr>
                                                                <th scope="col" class="px-6 py-3">
                                                                    USERNAME
                                                                </th>
                                                                <th scope="col" class="px-6 py-3">
                                                                    IP ADDRESS
                                                                </th>
                                                                <th scope="col" class="px-6 py-3">
                                                                    BROWSER
                                                                </th>
                                                                <th scope="col" class="px-6 py-3">
                                                                    BROWSER VERSION
                                                                </th>
                                                                <th scope="col" class="px-6 py-3">
                                                                    OS
                                                                </th>
                                                                <th scope="col" class="px-6 py-3">
                                                                    ACTIVITY
                                                                </th>
                                                                <th scope="col" class="px-6 py-3">
                                                                    TIME
                                                                </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($data['data'] as $item)
                                                                <tr
                                                                    class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700 text-center">
                                                                    <th scope="row"
                                                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                                        {{ $item['username'] }}
                                                                    </th>
                                                                    <td class="px-6 py-4">
                                                                        {{ $item['ip_address'] }}
                                                                    </td>
                                                                    <td class="px-6 py-4">
                                                                        {{ $item['browser'] }}
                                                                    </td>
                                                                    <td class="px-6 py-4">
                                                                        {{ $item['browser_version'] }}
                                                                    </td>
                                                                    <td class="px-6 py-4">
                                                                        {{ $item['os'] }}
                                                                    </td>
                                                                    <td class="px-6 py-4">
                                                                        {{ $item['log_detail'] }}
                                                                    </td>
                                                                    <td class="px-6 py-4">
                                                                        {{ date('d M Y', strtotime($item['created_at'])) }}
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                    @include('partials.pagination')
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
