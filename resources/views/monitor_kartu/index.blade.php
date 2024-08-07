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
                                        @if (!request()->routeIs('monitor.kartu'))
                                            <div class="flex flex-row justify-end">
                                                <a href="{{ route('monitor.kartu') }}"
                                                    class="focus:outline-none dark:bg-gradient-to-r dark:from-slate-900 dark:via-slate-900 dark:to-[#3282B8] dark:hover:from-[#3282B8] dark:hover:via-slate-900 dark:hover:to-slate-900 bg-gradient-to-r from-white via-white to-[#F4CE14] hover:from-[#F4CE14] hover:via-white hover:to-white dark:text-white text-sm font-medium py-1 px-3 rounded">Kembali
                                                </a>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="grid grid-cols-1 p-4">
                                    <div class="sm:-mx-6 lg:-mx-8">
                                        <div class="relative block w-full sm:px-6 lg:px-10">
                                            <button type="button" data-modal-target="search" data-modal-toggle="search"
                                                class="flex items-center gap-1 focus:outline-none dark:bg-gradient-to-r dark:from-slate-900 dark:via-slate-900 dark:to-[#3282B8] dark:hover:from-[#3282B8] dark:hover:via-slate-900 dark:hover:to-slate-900 bg-gradient-to-r from-white via-white to-[#F4CE14] hover:from-[#F4CE14] hover:via-white hover:to-white dark:text-white text-sm font-medium py-1 px-3 rounded">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                    stroke-width="2" stroke="currentColor" class="w-4 h-4">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                                                </svg> Cari Pengajuan
                                            </button>
                                            @include('monitor_kartu.modals.search')
                                            <div class="flex flex-col gap-5 p-5">
                                                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                                                    <table
                                                        class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                                        <thead
                                                            class="bg-slate-200 dark:bg-slate-700 border-b-2 border-slate-500 text-xs text-center text-gray-700 uppercase dark:text-white">
                                                            <tr class="text-center">
                                                                <th scope="col" class="px-6 py-3">
                                                                    Nama
                                                                </th>
                                                                <th scope="col" class="px-6 py-3">
                                                                    Satker
                                                                </th>
                                                                <th scope="col" class="px-6 py-3">
                                                                    Status
                                                                </th>
                                                                <th scope="col" class="px-6 py-3">
                                                                    Aksi
                                                                </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @if (!$data)
                                                                <tr>
                                                                    <th colspan="4">
                                                                        <p
                                                                            class="text-red-500 mt-3 text-center text-xs italic">
                                                                            Tidak ada pengajuan</p>
                                                                    </th>
                                                                </tr>
                                                            @else
                                                                @foreach ($data['data'] as $item)
                                                                    <tr
                                                                        class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                                                        <th scope="row"
                                                                            class="px-4 py-2 text-black whitespace-nowrap dark:text-white">
                                                                            <div
                                                                                class="flex flex-col justify-center text-wrap">
                                                                                {{ Illuminate\Support\Facades\Http::withToken($starterPack['profile']['token'])->get(env('API_URL', '') . '/pegawai' . '/' . $item['nip'] . '/find')->json()['data']['nama'] }}
                                                                                <div class="text-start text-nowrap">
                                                                                    NIP :
                                                                                    {{ $item['nip'] }}
                                                                                </div>
                                                                            </div>
                                                                        </th>
                                                                        <td
                                                                            class="px-6 py-4 dark:text-white text-center align-baseline">
                                                                            {{ Illuminate\Support\Facades\Http::withToken(session('data')['token'])->get(env('API_URL', '') . '/satker' . '/' . $item['kode_satker'] . '/code')->json()['data']['satker_name'] }}
                                                                        </td>
                                                                        <td
                                                                            class="px-6 py-4 dark:text-white text-center align-baseline">
                                                                            @include('pengajuan.partials.status')
                                                                        </td>
                                                                        <td class="px-6 py-4 dark:text-white text-center">
                                                                            <a target="__blank"
                                                                                href="{{ route('monitor.kartu.pdf', [$item['id'], $item['nip'], $item['kartu']]) }}"
                                                                                class="flex flex-row gap-1 justify-center items-center text-black dark:text-white font-bold hover:animate-pulse"><svg
                                                                                    xmlns="http://www.w3.org/2000/svg"
                                                                                    fill="none" viewBox="0 0 24 24"
                                                                                    stroke-width="1.5" stroke="currentColor"
                                                                                    class="w-6 h-6">
                                                                                    <path stroke-linecap="round"
                                                                                        stroke-linejoin="round"
                                                                                        d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m5.231 13.481L15 17.25m-4.5-15H5.625c-.621 0-1.125.504-1.125 1.125v16.5c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Zm3.75 11.625a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
                                                                                </svg>
                                                                                Lihat
                                                                            </a>
                                                                            {{-- <button
                                                                                        data-modal-target="token{{ $item['id'] }}"
                                                                                        data-modal-toggle="token{{ $item['id'] }}"
                                                                                        class="font-bold hover:animate-pulse">
                                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                                            fill="none"
                                                                                            viewBox="0 0 24 24"
                                                                                            stroke-width="1.5"
                                                                                            stroke="currentColor"
                                                                                            class="w-6 h-6">
                                                                                            <path stroke-linecap="round"
                                                                                                stroke-linejoin="round"
                                                                                                d="M6.72 13.829c-.24.03-.48.062-.72.096m.72-.096a42.415 42.415 0 0 1 10.56 0m-10.56 0L6.34 18m10.94-4.171c.24.03.48.062.72.096m-.72-.096L17.66 18m0 0 .229 2.523a1.125 1.125 0 0 1-1.12 1.227H7.231c-.662 0-1.18-.568-1.12-1.227L6.34 18m11.318 0h1.091A2.25 2.25 0 0 0 21 15.75V9.456c0-1.081-.768-2.015-1.837-2.175a48.055 48.055 0 0 0-1.913-.247M6.34 18H5.25A2.25 2.25 0 0 1 3 15.75V9.456c0-1.081.768-2.015 1.837-2.175a48.041 48.041 0 0 1 1.913-.247m10.5 0a48.536 48.536 0 0 0-10.5 0m10.5 0V3.375c0-.621-.504-1.125-1.125-1.125h-8.25c-.621 0-1.125.504-1.125 1.125v3.659M18 10.5h.008v.008H18V10.5Zm-3 0h.008v.008H15V10.5Z" />
                                                                                        </svg>
                                                                                    </button> --}}
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                            @endif
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @if ($data)
                                        @include('partials.pagination')
                                    @endif
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
