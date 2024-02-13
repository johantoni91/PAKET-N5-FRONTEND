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
                                </div><!--end /div-->
                                <div class="flex items-center">
                                    <div
                                        class="today-date leading-5 mt-2 lg:mt-0 form-input w-auto rounded-md border inline-block border-primary-500/60 dark:border-primary-500/60 text-primary-500 bg-transparent px-3 py-1 focus:outline-none focus:ring-0 placeholder:text-slate-400/70 placeholder:font-normal placeholder:text-sm hover:border-primary-400 focus:border-primary-500 dark:focus:border-primary-500  dark:hover:border-slate-700">
                                        <input type="text" class="dash_date border-0 focus:border-0 focus:outline-none"
                                            readonly>
                                    </div>
                                </div><!--end /div-->
                            </div><!--end /div-->
                        </div><!--end /div-->
                    </div><!--end /div-->
                </div><!--end /div-->
            </div><!--end container-->
            <div class="xl:w-full  min-h-[calc(100vh-138px)] relative pb-14">
                <div class="xl:w-full  min-h-[calc(100vh-138px)] relative pb-14">
                    <div class="grid md:grid-cols-12 lg:grid-cols-12 xl:grid-cols-12 gap-4 mb-4">

                        <div class="sm:col-span-12  md:col-span-12 lg:col-span-8 xl:col-span-12 xl:col-start-0 ">
                            <div
                                class="bg-white dark:bg-gray-900 border border-slate-200 dark:border-slate-700/40  rounded-md w-full relative mb-4">
                                <div
                                    class="border-b border-slate-200 dark:border-slate-700/40 py-3 px-4 dark:text-slate-300/70">
                                    <div class="flex-none md:flex">
                                        <h4 class="font-medium text-lg flex-1 self-center mb-2 md:mb-0">Log Aktivitas</h4>
                                    </div>
                                </div><!--end header-title-->
                                <div class="grid grid-cols-1 p-4">
                                    <div class="sm:-mx-6 lg:-mx-8">
                                        <div class="relative overflow-x-auto block w-full sm:px-6 lg:px-8">

                                            <table class="w-full border-collapse" id="datatable_1">
                                                <thead class="bg-slate-100 dark:bg-slate-700/20">
                                                    <tr>
                                                        <th scope="col"
                                                            class="p-3 text-xs font-medium tracking-wider text-left text-gray-700 dark:text-gray-400 uppercase">
                                                            Username
                                                        </th>
                                                        <th scope="col"
                                                            class="p-3 text-xs font-medium tracking-wider text-left text-gray-700 dark:text-gray-400 uppercase">
                                                            Ip Address
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
                                                    @foreach ($data as $item)
                                                        <tr
                                                            class="bg-white border-b border-dashed dark:bg-gray-900 dark:border-gray-700">
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
                                                                {{ date('d m Y H:i:s', strtotime($item['created_at'])) }}
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                            {{-- <a href="#"
                                                class="inline-block focus:outline-none text-primary-500 hover:bg-primary-500 hover:text-white bg-transparent border border-gray-200 dark:bg-transparent dark:text-primary-500 dark:hover:text-white dark:border-gray-700 dark:hover:bg-primary-500  text-sm font-medium py-1 px-3 rounded mb-1 lg:mb-0 csv">Export
                                                Excel</a>
                                            <a href="#"
                                                class="inline-block focus:outline-none text-primary-500 hover:bg-primary-500 hover:text-white bg-transparent border border-gray-200 dark:bg-transparent dark:text-primary-500 dark:hover:text-white dark:border-gray-700 dark:hover:bg-primary-500  text-sm font-medium py-1 px-3 rounded mb-1 lg:mb-0 sql">Export
                                                PDF</a> --}}
                                        </div>
                                    </div>
                                </div><!--end card-body-->

                                <div id="Datatable-1"
                                    class="transition-all duration-500 overflow-hidden bg-slate-50 dark:bg-slate-900 hidden">
                                    <div class="grid">
                                        <pre class="max-h-96 overflow-auto rounded-lg">
                                </pre>
                                    </div>
                                </div>
                            </div> <!--end card-->
                        </div><!--end col-->
                    </div>
                </div>
                @include('partials.footer')
            </div><!--end page-wrapper-->
        </div><!--end /div-->
    </div>
@endsection
