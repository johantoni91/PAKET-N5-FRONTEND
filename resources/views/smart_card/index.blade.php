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
                                <div class="items-center">
                                    <h1 class="font-medium text-3xl block dark:text-slate-100">{{ $title }}</h1>
                                </div>
                                @if (!request()->routeIs('smart'))
                                    <a href="{{ route('smart') }}"
                                        class="focus:outline-none dark:bg-gradient-to-r dark:from-slate-900 dark:via-slate-900 dark:to-[#3282B8] dark:hover:from-[#3282B8] dark:hover:via-slate-900 dark:hover:to-slate-900 bg-gradient-to-r from-slate-100 via-slate-100 to-[#F4CE14] hover:from-[#F4CE14] hover:via-slate-100 hover:to-slate-100 dark:text-white text-sm font-medium py-1 px-3 rounded">Kembali
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="xl:w-full  min-h-[calc(100vh-138px)] relative">
                <div class="xl:w-full  min-h-[calc(100vh-138px)] relative pb-14">
                    <div class="grid md:grid-cols-12 lg:grid-cols-12 xl:grid-cols-12 gap-4 mb-4">
                        <div
                            class="sm:col-span-12  md:col-span-12 lg:col-span-12 xl:col-span-12 xl:col-start-0 overflow-x-auto shadow-lg">
                            <div class="relative overflow-x-auto shadow-md rounded-lg">
                                {{-- <div class="flex flex-row justify-between px-5">
                                    <button type="button" data-modal-target="search" data-modal-toggle="search"
                                        class="flex items-center gap-1 focus:outline-none dark:bg-gradient-to-r dark:from-slate-900 dark:via-slate-900 dark:to-[#3282B8] dark:hover:from-[#3282B8] dark:hover:via-slate-900 dark:hover:to-slate-900 bg-gradient-to-r from-slate-100 via-slate-100 to-[#F4CE14] hover:from-[#F4CE14] hover:via-slate-100 hover:to-slate-100 dark:text-white text-sm font-medium py-1 px-3 rounded">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="2" stroke="currentColor" class="w-4 h-4">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                                        </svg> Cari
                                    </button>
                                    @include('layout_kartu.partials.search')
                                </div> --}}
                                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                    <thead
                                        class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                        <tr class="text-center">
                                            <th scope="col" class="px-6 py-3">
                                                Nama
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Satuan Kerja
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Jenis Kartu
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Kode Unik
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Status
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data['data'] as $i)
                                            <tr
                                                class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                                <th scope="row"
                                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                    {{ Illuminate\Support\Facades\Http::withToken($starterPack['profile']['token'])->get(env('API_URL', '') . '/pegawai' . '/' . $i['nip'] . '/find')->json()['data']['nama'] }}
                                                </th>
                                                <td class="px-6 py-4 text-center">
                                                    {{ Illuminate\Support\Facades\Http::withToken(session('data')['token'])->get(env('API_URL', '') . '/satker' . '/' . $i['kode_satker'] . '/code')->json()['data']['satker_name'] }}
                                                </td>
                                                <td class="px-6 py-4 text-center">
                                                    {{ Illuminate\Support\Facades\Http::withToken(session('data')['token'])->get(env('API_URL', '') . '/kartu' . '/' . $i['kartu'])->json()['data']['title'] }}
                                                </td>
                                                <td class="px-6 py-4 text-center">
                                                    {{ $i['uid_kartu'] }}
                                                </td>
                                                <td class="px-6 py-4 text-center drop-shadow-green text-green-500">
                                                    Aktif
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
                @include('partials.footer')
            </div>
        </div>
    </div>
@endsection
