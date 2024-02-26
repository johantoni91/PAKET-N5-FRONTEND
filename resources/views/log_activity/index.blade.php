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
                                    {{-- <ol class="list-reset flex text-sm">
                                    <li><button type="button" class="text-gray-500 dark:text-slate-400">Robotech</button></li>
                                    <li><span class="text-gray-500 dark:text-slate-400 mx-2">/</span></li>
                                    <li class="text-gray-500 dark:text-slate-400">Tables</li>
                                    <li><span class="text-gray-500 dark:text-slate-400 mx-2">/</span></li>
                                    <li class="text-primary-500 hover:text-primary-600 dark:text-primary-400">Datatable
                                    </li>
                                </ol> --}}
                                </div>
                                <div>
                                    <input type="date" name="date" id="date" value="{{ now()->format('Y-m-d') }}"
                                        class="rounded border-slate-200 dark:border-slate-700 dark:text-white dark:bg-slate-700">
                                </div>
                            </div>
                        </div>
                    </div>
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
                                            <h4 class="font-medium text-lg flex-1 self-center mb-2 md:mb-0">
                                                {{ $title }}
                                            </h4>
                                        </div>
                                    </div><!--end header-title-->
                                    <div class="grid grid-cols-1 p-4">
                                        <div class="sm:-mx-6 lg:-mx-8">
                                            <div class="relative overflow-x-auto block w-full sm:px-6 lg:px-8">
                                                <div class="flex flex-row md:gap-x-5 flex-wrap md:flex-nowrap mb-5">
                                                    <div>
                                                        <select id="category"
                                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm font-medium ms-2.5 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                            <option value="0" disabled selected>Cari
                                                                berdasarkan
                                                                kategori &nbsp; &nbsp;
                                                            </option>
                                                            <option value="username">Username</option>
                                                            <option value="ip_address">IP Address</option>
                                                            <option value="browser">Browser</option>
                                                            <option value="browser_version">Browser Version</option>
                                                            <option value="os">OS</option>
                                                            <option value="log_detail">Log Details</option>
                                                            <option value="created_at">Time Activity</option>
                                                        </select>
                                                    </div>
                                                    <input type="text" id="search" placeholder="Cari ..."
                                                        class="w-1/2 me-2.5 md:ms-0 ms-2.5 mt-3 md:mt-0 bg-gray-200 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                </div>
                                                <div class="flex flex-col gap-5">
                                                    <div class="datatable_1">
                                                        <table class="w-full border-collapse" id="datatable_1">
                                                            <thead class="bg-slate-100 dark:bg-slate-700/20">
                                                                <tr>
                                                                    <th scope="col"
                                                                        class="text-xs font-medium tracking-wider text-left text-gray-700 dark:text-gray-400 uppercase">
                                                                        No. &nbsp; &nbsp; &nbsp;
                                                                    </th>
                                                                    <th scope="col"
                                                                        class="p-3 text-xs font-medium tracking-wider text-left text-gray-700 dark:text-gray-400 uppercase">
                                                                        Username
                                                                    </th>
                                                                    <th scope="col"
                                                                        class="p-3 text-xs font-medium tracking-wider text-left text-gray-700 dark:text-gray-400 uppercase">
                                                                        IP Address
                                                                    </th>
                                                                    <th scope="col"
                                                                        class="p-3 text-xs font-medium tracking-wider text-left text-gray-700 dark:text-gray-400 uppercase">
                                                                        Browser
                                                                    </th>
                                                                    <th scope="col"
                                                                        class="p-3 text-xs font-medium tracking-wider text-left text-gray-700 dark:text-gray-400 uppercase">
                                                                        Browser Version
                                                                    </th>
                                                                    <th scope="col"
                                                                        class="p-3 text-xs font-medium tracking-wider text-left text-gray-700 dark:text-gray-400 uppercase">
                                                                        OS
                                                                    </th>
                                                                    <th scope="col"
                                                                        class="p-3 text-xs font-medium tracking-wider text-left text-gray-700 dark:text-gray-400 uppercase">
                                                                        Log Details
                                                                    </th>
                                                                    <th scope="col"
                                                                        class="p-3 text-xs font-medium tracking-wider text-left text-gray-700 dark:text-gray-400 uppercase">
                                                                        Time Activity
                                                                    </th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @if (!$data || $data == null)
                                                                    <small>Tidak ada log aktivitas di sini</small>
                                                                @else
                                                                    @foreach ($data as $item)
                                                                        <tr
                                                                            class="bg-white border-b border-dashed dark:bg-gray-900 dark:border-gray-700">
                                                                            <td
                                                                                class="p-3 text-sm text-center font-medium whitespace-nowrap dark:text-white">
                                                                                {{ $loop->iteration }}.
                                                                            </td>
                                                                            <td
                                                                                class="p-3 text-sm font-medium whitespace-nowrap dark:text-white">
                                                                                {{ $item['username'] }}
                                                                            </td>
                                                                            <td
                                                                                class="p-3 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                                                                {{ $item['ip_address'] }}
                                                                            </td>
                                                                            <td
                                                                                class="p-3 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                                                                {{ $item['browser'] }}
                                                                            </td>
                                                                            <td
                                                                                class="p-3 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                                                                {{ $item['browser_version'] }}
                                                                            </td>
                                                                            <td
                                                                                class="p-3 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                                                                {{ $item['os'] }}
                                                                            </td>
                                                                            <td
                                                                                class="p-3 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                                                                {{ $item['log_detail'] }}
                                                                            </td>
                                                                            <td>
                                                                                {{ date('d/m/Y', strtotime($item['created_at'])) }}
                                                                                <br>
                                                                                {{ date('H:i:s', strtotime($item['created_at'])) }}
                                                                                WIB
                                                                            </td>
                                                                        </tr>
                                                                    @endforeach
                                                                @endif
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <div class="datatable_2">

                                                    </div>
                                                </div>
                                            </div>
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
