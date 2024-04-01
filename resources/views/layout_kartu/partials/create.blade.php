@extends('partials.main')
@section('content')
    @include('partials.grapejs')
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
                                    <ol class="list-reset flex text-sm">
                                        <li>
                                            <a href="{{ route('layout.kartu') }}" data-tooltip-target="tooltip-bottom"
                                                data-tooltip-placement="bottom"
                                                class="text-blue-500 dark:text-slate-400">Layout Kartu</a>
                                            <div id="tooltip-bottom" role="tooltip"
                                                class="absolute z-50 invisible inline-block px-3 py-2 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                                Kembali ke layout kartu
                                                <div class="tooltip-arrow" data-popper-arrow></div>
                                            </div>
                                        </li>
                                        <li><span class="text-gray-500 dark:text-slate-400 mx-2">/</span></li>
                                        <li class="text-gray-500 dark:text-slate-400">Ubah kartu
                                            {{ $data['data']['title'] }}</li>
                                    </ol>
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
                                <div class="border-b border-slate-200 dark:border-slate-700/40 dark:text-slate-300/70">
                                    <div class="flex flex-row justify-between">
                                        <h4 class="font-medium py-3 px-4 text-lg flex-1 self-center mb-2 md:mb-0">Pengaturan
                                            Kartu {{ $data['data']['title'] }}</h4>
                                        <div class="p-5">
                                            <button type="button" id="batal"
                                                class="focus:outline-none bg-red-700 text-white border border-red-700 hover:bg-transparent hover:text-red-700 dark:bg-transparent dark:text-red-700 dark:hover:text-white dark:border-gray-700 dark:hover:bg-red-700 text-sm font-medium py-1 px-3 rounded w-24 hidden">
                                                Batalkan
                                            </button>
                                            <button type="button" id="tambah_kartu"
                                                class="focus:outline-none bg-primary-500 text-white border border-primary-500 hover:bg-transparent hover:text-primary-500 dark:bg-transparent dark:text-primary-500 dark:hover:text-white dark:border-gray-700 dark:hover:bg-primary-500 text-sm font-medium py-1 px-3 rounded w-24">
                                                Simpan
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="grid grid-cols-1 p-4 overflow-scroll">
                                    <div class="sm:-mx-6 lg:-mx-8">
                                        <div class="relative overflow-x-auto block w-full sm:px-6 lg:px-10">
                                            <div class="p-4 md:p-5 space-y-4">
                                                <div class="flex flex-col gap-2">
                                                    <h1 class="font-bold mb-3 text-center dark:text-white">Posisi Tampilan
                                                        kartu</h1>
                                                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                                                        <table
                                                            class="table-auto w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 w-42">
                                                            <thead
                                                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                                                <tr class="border-b-2 border-gray-600 dark:border-white">
                                                                    <th scope="col"
                                                                        class="px-6 py-3 border-r text-center">
                                                                        Atribut
                                                                    </th>
                                                                    <th scope="col"
                                                                        class="px-6 py-3 border-r text-center">
                                                                        Status
                                                                    </th>
                                                                    <th scope="col" class="px-6 py-3 text-center">
                                                                        Keterangan
                                                                    </th>
                                                                </tr>
                                                            </thead>
                                                            @include('layout_kartu.partials.komponen')
                                                        </table>
                                                    </div>
                                                    <h1 class="font-bold mb-3 text-center dark:text-white">Tampilan
                                                        kartu</h1>
                                                    @include('layout_kartu.kartu')
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
    @include('layout_kartu.partials.script')
@endsection
