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
                                    <h1 class="font-medium text-3xl block dark:text-slate-100">Manajemen Role Users</h1>
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
                                        <h4 class="font-medium text-lg flex-1 self-center mb-2 md:mb-0">Role Users</h4>
                                        <button type="button" data-modal-target="create" data-modal-toggle="create"
                                            class="focus:outline-none dark:bg-gradient-to-r dark:from-slate-900 dark:via-slate-900 dark:to-[#3282B8] dark:hover:from-[#3282B8] dark:hover:via-slate-900 dark:hover:to-slate-900 bg-gradient-to-r from-white via-white to-[#F4CE14] hover:from-[#F4CE14] hover:via-white hover:to-white dark:text-white text-sm font-medium py-1 px-3 rounded">+
                                            Role</button>
                                        @include('hak_akses.create')
                                    </div>
                                </div>
                                <div class="grid grid-cols-1 p-4">
                                    <div class="sm:-mx-6 lg:-mx-8">
                                        <div class="relative block w-full sm:px-6 lg:px-10">
                                            <div class="flex flex-row justify-end">
                                                @if (!request()->routeIs('akses'))
                                                    <a href="{{ route('akses') }}"
                                                        class="focus:outline-none dark:bg-gradient-to-r dark:from-slate-900 dark:via-slate-900 dark:to-[#3282B8] dark:hover:from-[#3282B8] dark:hover:via-slate-900 dark:hover:to-slate-900 bg-gradient-to-r from-white via-white to-[#F4CE14] hover:from-[#F4CE14] hover:via-white hover:to-white dark:text-white text-sm font-medium py-1 px-3 rounded">Kembali
                                                    </a>
                                                @endif
                                            </div>
                                            <div class="flex flex-col gap-5 p-5">
                                                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                                                    <table
                                                        class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                                        <thead
                                                            class="text-xs text-gray-700 uppercase dark:text-gray-400 border-b-2 border-gray-100 dark:border-gray-500 bg-gray-100 dark:bg-gray-500">
                                                            <tr class="text-center">
                                                                <th scope="col" class="px-6 py-3">
                                                                    Role
                                                                </th>
                                                                <th scope="col"
                                                                    class="px-6 py-3 border-x-2 border-gray-100 dark:border-gray-500">
                                                                    Hak Akses
                                                                </th>
                                                                <th scope="col" class="px-6 py-3">
                                                                    Aksi
                                                                </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($data['data'] as $item)
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
                                                                            class="px-4 py-2 whitespace-nowrap border-x-2 border-gray-100 dark:border-gray-500">
                                                                            <div
                                                                                class="grid sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 overflow-x-scroll">
                                                                                @include('hak_akses.menus')
                                                                            </div>
                                                                        </th>
                                                                        <td>
                                                                            <div class="flex flex-row justify-center gap-2">
                                                                                <button type="submit" title="Simpan Role">
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
                                                @include('partials.pagination')
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
