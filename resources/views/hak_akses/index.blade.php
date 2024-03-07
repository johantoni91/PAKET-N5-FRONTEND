{{-- {{ dd($data) }} --}}
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
                                            class="flex text-nowrap gap-2 flex-row focus:outline-none text-primary-500 hover:bg-primary-500 hover:text-white bg-transparent border border-primary-500 dark:bg-transparent dark:text-primary-500 dark:hover:text-white dark:border-gray-700 dark:hover:bg-primary-500 text-sm font-medium rounded justify-between py-1 px-2 align-bottom items-center">
                                            + Peran
                                            </svg>
                                        </button>
                                        @include('partials.modals.access.create')
                                    </div>
                                </div>
                                <div class="grid grid-cols-1 p-4 overflow-scroll">
                                    <div class="sm:-mx-6 lg:-mx-8">
                                        <div class="relative overflow-x-auto block w-full sm:px-6 lg:px-10">
                                            <button data-modal-target="info" data-modal-toggle="info"
                                                class="ms-5 inline-flex justify-evenly text-blue-500 items-center align-middle hover:border hover:border-blue-500 font-medium rounded-lg text-sm py-1 px-2 text-center dark:hover:border-blue-500"
                                                type="button">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="m11.25 11.25.041-.02a.75.75 0 0 1 1.063.852l-.708 2.836a.75.75 0 0 0 1.063.853l.041-.021M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9-3.75h.008v.008H12V8.25Z" />
                                                </svg> &nbsp;
                                                Info
                                            </button>
                                            @include('partials.modals.access.info')
                                            <div class="flex flex-col gap-5 p-5">
                                                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                                                    <table
                                                        class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                                        <thead
                                                            class="text-xs text-gray-700 uppercase dark:text-gray-400 border-b-2 border-slate-500">
                                                            <tr class="text-center">
                                                                <th scope="col"
                                                                    class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                                                                    Menu
                                                                </th>
                                                                <th scope="col" class="px-6 py-3">
                                                                    Peran
                                                                </th>
                                                                <th scope="col" class="px-6 py-3">
                                                                    Aksi
                                                                </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr
                                                                class="border-b border-gray-200 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                                                <th scope="row"
                                                                    class="px-4 py-2 text-black whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                                                                    <div
                                                                        class="flex flex-row gap-3 justify-center items-center align-middle">
                                                                        <div class="flex flex-row gap-1 items-center">
                                                                            <input type="checkbox" name="users"
                                                                                id="users"
                                                                                class="bg-slate-500 rounded border-0">
                                                                            <label for="users"
                                                                                class="text-xs font-normal">Users</label>
                                                                        </div>
                                                                        <div class="flex flex-row gap-1 items-center">
                                                                            <input type="checkbox" name="satker"
                                                                                id="satker"
                                                                                class="bg-slate-500 rounded border-0">
                                                                            <label class="text-xs font-normal"
                                                                                for="satker">Satker</label>
                                                                        </div>
                                                                        <div class="flex flex-row gap-1 items-center">
                                                                            <input type="checkbox" name="pegawai"
                                                                                id="pegawai"
                                                                                class="bg-slate-500 rounded border-0">
                                                                            <label class="text-xs font-normal"
                                                                                for="pegawai">Pegawai</label>
                                                                        </div>
                                                                        <div class="flex flex-row gap-1 items-center">
                                                                            <input type="checkbox" name="pengajuan"
                                                                                id="pengajuan"
                                                                                class="bg-slate-500 rounded border-0">
                                                                            <label class="text-xs font-normal"
                                                                                for="pengajuan">Pengajuan</label>
                                                                        </div>
                                                                        <div class="flex flex-row gap-1 items-center">
                                                                            <input type="checkbox" name="kartu"
                                                                                id="kartu"
                                                                                class="bg-slate-500 rounded border-0">
                                                                            <label class="text-xs font-normal"
                                                                                for="kartu">Kartu</label>
                                                                        </div>
                                                                        <div class="flex flex-row gap-1 items-center">
                                                                            <input type="checkbox" name="hak_akses"
                                                                                id="hak_akses"
                                                                                class="bg-slate-500 rounded border-0">
                                                                            <label class="text-xs font-normal"
                                                                                for="hak_akses">Hak akses</label>
                                                                        </div>
                                                                    </div>
                                                                </th>
                                                                <td class="px-6 py-4 dark:text-white text-center">
                                                                    Superadmin
                                                                </td>
                                                                <td>
                                                                    <div class="flex flex-row justify-center gap-2">
                                                                        <i class="text-center text-blue-500"
                                                                            data-lucide="save"></i>
                                                                        <i class="text-center text-red-500"
                                                                            data-lucide="trash-2"></i>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr
                                                                class="border-b border-gray-200 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                                                <th scope="row"
                                                                    class="px-4 py-2 text-black whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                                                                    <div
                                                                        class="flex flex-row gap-3 justify-center items-center align-middle">
                                                                        <div class="flex flex-row gap-1 items-center">
                                                                            <input type="checkbox" name="users"
                                                                                id="users"
                                                                                class="bg-slate-500 rounded border-0">
                                                                            <label for="users"
                                                                                class="text-xs font-normal">Users</label>
                                                                        </div>
                                                                        <div class="flex flex-row gap-1 items-center">
                                                                            <input type="checkbox" name="satker"
                                                                                id="satker"
                                                                                class="bg-slate-500 rounded border-0">
                                                                            <label class="text-xs font-normal"
                                                                                for="satker">Satker</label>
                                                                        </div>
                                                                        <div class="flex flex-row gap-1 items-center">
                                                                            <input type="checkbox" name="pegawai"
                                                                                id="pegawai"
                                                                                class="bg-slate-500 rounded border-0">
                                                                            <label class="text-xs font-normal"
                                                                                for="pegawai">Pegawai</label>
                                                                        </div>
                                                                        <div class="flex flex-row gap-1 items-center">
                                                                            <input type="checkbox" name="pengajuan"
                                                                                id="pengajuan"
                                                                                class="bg-slate-500 rounded border-0">
                                                                            <label class="text-xs font-normal"
                                                                                for="pengajuan">Pengajuan</label>
                                                                        </div>
                                                                        <div class="flex flex-row gap-1 items-center">
                                                                            <input type="checkbox" name="kartu"
                                                                                id="kartu"
                                                                                class="bg-slate-500 rounded border-0">
                                                                            <label class="text-xs font-normal"
                                                                                for="kartu">Kartu</label>
                                                                        </div>
                                                                        <div class="flex flex-row gap-1 items-center">
                                                                            <input type="checkbox" name="hak_akses"
                                                                                id="hak_akses"
                                                                                class="bg-slate-500 rounded border-0">
                                                                            <label class="text-xs font-normal"
                                                                                for="hak_akses">Hak akses</label>
                                                                        </div>
                                                                    </div>
                                                                </th>
                                                                <td class="px-6 py-4 dark:text-white text-center">
                                                                    Pegawai
                                                                </td>
                                                                <td>
                                                                    <div class="flex flex-row justify-center gap-2">
                                                                        <i class="text-center text-blue-500"
                                                                            data-lucide="save"></i>
                                                                        <i class="text-center text-red-500"
                                                                            data-lucide="trash-2"></i>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    @include('partials.pagination')
                                                </div>
                                                @if (request()->routeIs('pegawai.search'))
                                                    <div class="flex flex-row justify-end">
                                                        <a href="{{ route('pegawai') }}"
                                                            class="p-2 rounded-lg flex flex-row justify-between text-blue-500 dark:text-blue-500 dark:text-blue-500 dark:hover:text-white dark:border-blue-500 dark:hover:bg-blue-500 dark:hover:shadow dark:hover:shadow-white hover:bg-blue-500 hover:text-white border border-blue-500"><svg
                                                                xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                viewBox="0 0 24 24" stroke-width="1.5"
                                                                stroke="currentColor" class="w-6 h-6">
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
