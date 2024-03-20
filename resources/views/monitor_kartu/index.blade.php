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
                                    <div class="flex-row justify-between md:flex">
                                        <h4 class="font-medium text-lg flex-1 self-center mb-2 md:mb-0">Monitoring Kartu
                                        </h4>

                                    </div>
                                </div>
                                <div class="grid grid-cols-1 p-4 overflow-scroll">
                                    <div class="sm:-mx-6 lg:-mx-8">
                                        <div class="relative overflow-x-auto block w-full sm:px-6 lg:px-10">
                                            <div class="flex flex-col gap-5 p-5">
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
                                                                    Status
                                                                </th>
                                                                <th scope="col"
                                                                    class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                                                                    Pengajuan
                                                                </th>
                                                                <th scope="col" class="px-6 py-3">
                                                                    Aksi
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
                                                                        <td class="px-6 py-4 dark:text-white text-center">
                                                                            @include('pengajuan.partials.status')
                                                                        </td>
                                                                        <td
                                                                            class="px-10 py-4 text-center dark:text-white bg-gray-50 dark:bg-gray-800">
                                                                            {{ $item['kartu'] }}
                                                                        </td>
                                                                        <td class="px-6 py-4 dark:text-white text-center">
                                                                            @if ($item['status'] == 2 || $item['status'] == 3)
                                                                                <button data-modal-target="create"
                                                                                    data-modal-toggle="create"
                                                                                    class="text-blue-500 dark:text-blue-500 font-bold hover:animate-pulse">
                                                                                    Cetak
                                                                                </button>
                                                                                @include('monitor_kartu.tampilan_kartu')
                                                                            @else
                                                                                <h1 class="text-red-500 font-bold">-</h1>
                                                                            @endif
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                            @endif
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
                    </div>
                </div>
                @include('partials.footer')
            </div>
        </div>
    </div>
@endsection
