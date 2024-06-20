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
                                    <h1 class="font-medium text-3xl block dark:text-slate-100">Manajemen Peran Pengguna</h1>
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
                                        <h4 class="font-medium text-lg flex-1 self-center mb-2 md:mb-0">Peran Pengguna</h4>
                                        <button type="button" data-modal-target="create" data-modal-toggle="create"
                                            class="focus:outline-none bg-gradient-to-r from-violet-800 to-red-500 text-white dark:bg-gradient-to-r dark:from-zinc-500 dark:to-cyan-300 dark:text-white text-sm font-medium py-1 px-3 rounded hover:from-red-500 hover:to-violet-800 dark:hover:from-cyan-300 dark:hover:to-zinc-500">+
                                            Role</button>
                                        @include('hak_akses.create')
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
                                                            class="text-xs text-gray-700 uppercase dark:text-gray-400 border-b-2 border-slate-500 bg-gray-100 dark:bg-gray-500">
                                                            <tr class="text-center">
                                                                <th scope="col" class="px-6 py-3">
                                                                    Peran
                                                                </th>
                                                                <th scope="col" class="px-6 py-3">
                                                                    Menu / Akses
                                                                </th>
                                                                <th scope="col" class="px-6 py-3">
                                                                    Aksi
                                                                </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($data as $item)
                                                                <tr
                                                                    class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                                                    <form action="{{ route('akses.update', $item['id']) }}"
                                                                        method="post">
                                                                        @csrf
                                                                        @php
                                                                            $val = $item['route'];
                                                                            $route = null;
                                                                            if ($val) {
                                                                                $route = json_decode(
                                                                                    $item['route'],
                                                                                    true,
                                                                                );
                                                                            } else {
                                                                                $route = null;
                                                                            }
                                                                        @endphp
                                                                        <td class="px-6 py-4 text-center">
                                                                            {{ $item['role'] }}
                                                                        </td>
                                                                        <th scope="row"
                                                                            class="px-4 py-2 whitespace-nowrap">
                                                                            <div
                                                                                class="grid sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 overflow-x-scroll">
                                                                                @include('hak_akses.menus')
                                                                            </div>
                                                                        </th>
                                                                        <td>
                                                                            <div class="flex flex-row justify-center gap-2">
                                                                                <button type="submit" title="Simpan Peran">
                                                                                    <i class="text-center text-blue-500"
                                                                                        data-lucide="save"></i>
                                                                                </button>
                                                                            </div>
                                                                        </td>
                                                                    </form>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                                @if (request()->routeIs('pegawai.search'))
                                                    <div class="flex flex-row justify-end">
                                                        <a href="{{ route('pegawai') }}"
                                                            class="p-2 rounded-lg flex flex-row justify-between text-blue-500 dark:text-blue-500 dark:text-blue-500 dark:hover:text-white dark:border-blue-500 dark:hover:bg-blue-500 dark:hover:shadow dark:hover:shadow-white hover:bg-blue-500 hover:text-white border border-blue-500"><svg
                                                                xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                                class="w-6 h-6">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15M12 9l-3 3m0 0 3 3m-3-3h12.75" />
                                                            </svg> Kembali
                                                        </a>
                                                    </div>
                                                @endif
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
