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

                        <div class="sm:col-span-12  md:col-span-12 lg:col-span-12 xl:col-span-12 xl:col-start-0 ">
                            <div
                                class="bg-white dark:bg-gray-900 border border-slate-200 dark:border-slate-700/40  rounded-md w-full relative mb-4">
                                <div
                                    class="border-b border-slate-200 dark:border-slate-700/40 py-3 px-4 dark:text-slate-300/70">
                                    <div class="flex-none md:flex">
                                        <h4 class="font-medium text-lg flex-1 self-center mb-2 md:mb-0">Data Users</h4>
                                        <div class="gap-5">
                                            <a href="{{ route('excel.users') }}"
                                                class="inline-block focus:outline-none text-green-500 hover:bg-green-500 hover:text-white bg-transparent border border-green-500 dark:bg-transparent dark:text-primary-500 dark:hover:text-white dark:border-gray-700 dark:hover:bg-primary-500  text-sm font-medium py-1 px-3 rounded mb-1 lg:mb-0 csv">Export
                                                Excel</a>
                                            <a href="{{ route('pdf.users') }}"
                                                class="inline-block focus:outline-none text-red-400 hover:bg-red-500 hover:text-white bg-transparent border border-red-400 dark:bg-transparent dark:text-primary-500 dark:hover:text-white dark:border-gray-700 dark:hover:bg-primary-500  text-sm font-medium py-1 px-3 rounded mb-1 lg:mb-0 sql">Export
                                                PDF</a>
                                        </div>
                                    </div>
                                </div><!--end header-title-->
                                <div class="grid grid-cols-1 p-4">
                                    <div class="sm:-mx-6 lg:-mx-8">
                                        <div class="relative overflow-x-auto block w-full sm:px-6 lg:px-8">
                                            <button type="button" data-modal-target="create" data-modal-toggle="create"
                                                style="margin-left: 9px"
                                                class="inline-block focus:outline-none text-primary-500 hover:bg-primary-500 hover:text-white bg-transparent border border-primary-500 dark:bg-transparent dark:text-primary-500 dark:hover:text-white dark:border-gray-700 dark:hover:bg-primary-500  text-sm font-medium py-1 px-3 rounded mb-1 lg:mb-0">+
                                                User</button>
                                            <table class="w-full border-collapse" id="datatable_1">
                                                <thead class="bg-slate-100 dark:bg-slate-700/20">
                                                    <tr>
                                                        <th scope="col"
                                                            class="p-3 text-xs font-medium tracking-wider text-left text-gray-700 dark:text-gray-400 uppercase">
                                                            Nama
                                                        </th>
                                                        <th scope="col"
                                                            class="p-3 text-xs font-medium tracking-wider text-left text-gray-700 dark:text-gray-400 uppercase">
                                                            Username
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
                                                            Aksi
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($data as $item)
                                                        <tr
                                                            class="bg-white border-b border-dashed dark:bg-gray-900 dark:border-gray-700">
                                                            <td
                                                                class="p-3 text-sm font-medium whitespace-nowrap dark:text-white">
                                                                @if ($item['photo'])
                                                                    <img src="{{ env('API_IMG', '') . $item['photo'] }}"
                                                                        alt=""
                                                                        class="mr-2 h-8 rounded-full inline-block">{{ $item['name'] }}
                                                                @else
                                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                        viewBox="0 0 24 24" stroke-width="1.5"
                                                                        stroke="currentColor"
                                                                        class="w-6 h-6 mr-2 h-8 rounded-full inline-block">
                                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                                            d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                                                    </svg> {{ $item['name'] }}
                                                                @endif
                                                            </td>
                                                            <td
                                                                class="p-3 text-sm font-medium whitespace-nowrap dark:text-white">
                                                                {{ $item['username'] }}
                                                            </td>
                                                            <td
                                                                class="p-3 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                                                {{ $item['email'] }}
                                                            </td>
                                                            <td
                                                                class="p-3 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                                                {{ $item['phone'] }}
                                                            </td>
                                                            <td
                                                                class="p-3 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                                                <button type="button"
                                                                    data-modal-target="update{{ $item['id'] }}"
                                                                    data-modal-toggle="update{{ $item['id'] }}"><i
                                                                        class="icofont-edit text-lg text-gray-500 dark:text-gray-400"></i></button>
                                                                <button type="button"
                                                                    data-modal-target="delete{{ $item['id'] }}"
                                                                    data-modal-toggle="delete{{ $item['id'] }}"><i
                                                                        class="icofont-ui-delete text-lg text-red-500 dark:text-red-400"
                                                                        data-confirm-delete="true"></i></button>
                                                                @include('partials.modals.users')
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
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
