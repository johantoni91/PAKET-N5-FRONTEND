@extends('partials.main')
@section('content')
    @include('partials.sidebar')
    @include('partials.topbar')
    <div class="ltr:flex flex-1 rtl:flex-row-reverse">
        <div class="page-wrapper relative ltr:ml-auto rtl:mr-auto rtl:ml-0 w-[calc(100%-260px)] px-4 pt-[64px] duration-300">
            @error('nip')
                <div class="absolute p-2 z-[99] rounded-lg bg-red-900 shadow shadow-red-900 text-white top-20 right-3">
                    {{ $message }}
                </div>
            @enderror
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
                                        <button type="button" data-modal-target="search" data-modal-toggle="search"
                                            class="flex items-center gap-1 focus:outline-none dark:bg-gradient-to-r dark:from-slate-900 dark:via-slate-900 dark:to-[#3282B8] dark:hover:from-[#3282B8] dark:hover:via-slate-900 dark:hover:to-slate-900 bg-gradient-to-r from-white via-white to-[#F4CE14] hover:from-[#F4CE14] hover:via-white hover:to-white dark:text-white text-sm font-medium py-1 px-3 rounded">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="2" stroke="currentColor" class="w-4 h-4">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                                            </svg> Cari Pengajuan
                                        </button>
                                        @include('pengajuan.modals.search')
                                        @if (!request()->routeIs('pengajuan'))
                                            <a href="{{ route('pengajuan') }}"
                                                class="ms-3 flex items-center gap-1 focus:outline-none dark:bg-gradient-to-r dark:from-slate-900 dark:via-slate-900 dark:to-[#3282B8] dark:hover:from-[#3282B8] dark:hover:via-slate-900 dark:hover:to-slate-900 bg-gradient-to-r from-white via-white to-[#F4CE14] hover:from-[#F4CE14] hover:via-white hover:to-white dark:text-white text-sm font-medium py-1 px-3 rounded">
                                                Kembali
                                            </a>
                                        @endif
                                    </div>
                                </div>
                                <div class="grid grid-cols-1 p-4">
                                    <div class="sm:-mx-6 lg:-mx-8">
                                        <div class="relative block w-full sm:px-6 lg:px-10">
                                            <button type="button" data-modal-target="create" data-modal-toggle="create"
                                                class="focus:outline-none dark:bg-gradient-to-r dark:from-slate-900 dark:via-slate-900 dark:to-[#3282B8] dark:hover:from-[#3282B8] dark:hover:via-slate-900 dark:hover:to-slate-900 bg-gradient-to-r from-white via-white to-[#F4CE14] hover:from-[#F4CE14] hover:via-white hover:to-white dark:text-white text-sm font-medium py-1 px-3 rounded">
                                                Pengajuan</button>
                                            @include('pengajuan.modals.create')
                                            <div class="flex flex-col gap-5 p-5">
                                                <div class="datatable_1">
                                                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                                                        <table
                                                            class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                                            <thead
                                                                class="text-xs text-gray-700 uppercase dark:text-gray-400 border-b-2 border-slate-500">
                                                                <tr class="text-center">
                                                                    <th class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                                                                        Nama
                                                                    </th>
                                                                    <th class="px-6 py-3">
                                                                        Satker
                                                                    </th>
                                                                    <th class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                                                                        Pengajuan
                                                                    </th>
                                                                    <th class="px-6 py-3">
                                                                        Alasan
                                                                    </th>
                                                                    <th class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                                                                        Persetujuan
                                                                    </th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @if (!$data)
                                                                    <tr>
                                                                        <th colspan="5">
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
                                                                                class="px-4 py-2 text-black bg-gray-50 dark:text-white dark:bg-gray-800">
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
                                                                                class="px-6 py-4 dark:text-white text-center font-bold">
                                                                                {{ Illuminate\Support\Facades\Http::withToken($starterPack['profile']['token'])->get(env('API_URL', '') . '/satker' . '/' . $item['kode_satker'] . '/code')->json()['data']['satker_name'] }}
                                                                            </td>
                                                                            <td
                                                                                class="px-6 py-4 dark:text-white text-center font-bold bg-gray-50 dark:bg-gray-800">
                                                                                {{ Illuminate\Support\Facades\Http::withToken($starterPack['profile']['token'])->get(env('API_URL', '') . '/kartu' . '/' . $item['kartu'])->json()['data']['title'] }}
                                                                            </td>
                                                                            <td
                                                                                class="px-6 py-4 dark:text-white text-center font-bold">
                                                                                @if ($item['alasan'] == '0')
                                                                                    Rusak
                                                                                @elseif($item['alasan'] == '1')
                                                                                    Baru
                                                                                @elseif($item['alasan'] == '2')
                                                                                    Ganti satker
                                                                                @elseif($item['alasan'] == '3')
                                                                                    Hilang
                                                                                @endif
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
                                                    </div>
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
    <script>
        function keepOnlyNumbers(input) {
            return input.replace(/\D/g, "");
        }
        var inputField = document.getElementById("nip");
        inputField.addEventListener("input", function() {
            inputField.value = keepOnlyNumbers(inputField.value);
        });
    </script>
@endsection
