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
                                <div class="border-b border-slate-200 dark:border-slate-700/40 dark:text-slate-300/70">
                                    <div class="flex flex-row justify-between">
                                        <h4 class="font-medium py-3 px-4 text-lg flex-1 self-center mb-2 md:mb-0">Layout
                                            Kartu</h4>
                                        <div class="p-5">
                                            <button type="button" id="batal"
                                                class="focus:outline-none bg-red-700 text-white border border-red-700 hover:bg-transparent hover:text-red-700 dark:bg-transparent dark:text-red-700 dark:hover:text-white dark:border-gray-700 dark:hover:bg-red-700 text-sm font-medium py-1 px-3 rounded w-24 hidden">
                                                Batalkan
                                            </button>
                                            <button type="button" id="tambah_kartu" data-modal-target="create"
                                                data-modal-toggle="create"
                                                class="focus:outline-none bg-primary-500 text-white border border-primary-500 hover:bg-transparent hover:text-primary-500 dark:bg-transparent dark:text-primary-500 dark:hover:text-white dark:border-gray-700 dark:hover:bg-primary-500 text-sm font-medium py-1 px-3 rounded w-24">
                                                + Kartu
                                            </button>
                                            @include('partials.modals.layout_kartu.create')
                                        </div>
                                    </div>
                                </div>
                                <div class="grid grid-cols-1 p-4 overflow-scroll">
                                    <div class="sm:-mx-6 lg:-mx-8">
                                        <div class="relative overflow-x-auto block w-full sm:px-6 lg:px-10">
                                            <div class="p-4 md:p-5 space-y-4">
                                                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                                                    <table
                                                        class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                                        <thead
                                                            class="text-xs text-gray-700 uppercase dark:text-gray-400 border-b-2 border-slate-500">
                                                            <tr class="text-center">
                                                                <th scope="col"
                                                                    class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                                                                    Kartu
                                                                </th>
                                                                <th scope="col" class="px-6 py-3">
                                                                    Permintaan Cetak
                                                                </th>
                                                                <th scope="col"
                                                                    class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                                                                    Jenis Kartu
                                                                </th>
                                                                <th scope="col" class="px-6 py-3">
                                                                    Tampilan
                                                                </th>
                                                                <th scope="col"
                                                                    class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                                                                    Aksi
                                                                </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($data['data'] as $item)
                                                                <tr
                                                                    class="text-center border-b border-gray-200 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                                                    <th scope="row"
                                                                        class="px-4 py-2 text-black whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                                                                        {{ $item['title'] }}
                                                                    </th>
                                                                    <td class="px-6 py-4 dark:text-white text-center">
                                                                        {{ $item['total'] }}
                                                                    </td>
                                                                    <td
                                                                        class="px-6 py-4 dark:text-white text-center bg-gray-50 dark:bg-gray-800">
                                                                        @if ($item['categories'] == 0)
                                                                            Kartu Acara
                                                                        @elseif($item['categories'] == 1)
                                                                            Kartu Identitas
                                                                        @elseif($item['categories'] == 2)
                                                                            Kartu Intel
                                                                        @endif
                                                                    </td>
                                                                    <td class="px-6 py-4 dark:text-white">
                                                                        <div class="flex flex-row gap-2 justify-center">
                                                                            <button
                                                                                data-modal-target="depan{{ $item['id'] }}"
                                                                                data-modal-toggle="depan{{ $item['id'] }}">
                                                                                <img src="{{ $item['front'] }}"
                                                                                    class="w-12 h-12 rounded-lg"
                                                                                    alt="">
                                                                            </button>
                                                                            @include('partials.modals.layout_kartu.front_bg')
                                                                            <button
                                                                                data-modal-target="belakang{{ $item['id'] }}"
                                                                                data-modal-toggle="belakang{{ $item['id'] }}">
                                                                                <img src="{{ $item['back'] }}"
                                                                                    class="w-12 h-12 rounded-lg"
                                                                                    alt="">
                                                                            </button>
                                                                            @include('partials.modals.layout_kartu.back_bg')
                                                                        </div>
                                                                    </td>
                                                                    <td
                                                                        class="px-6 py-4 dark:text-white text-center bg-gray-50 dark:bg-gray-800">
                                                                        <div class="flex flex-row gap-3 justify-center">
                                                                            <button
                                                                                data-modal-target="view{{ $item['id'] }}"
                                                                                data-modal-toggle="view{{ $item['id'] }}"
                                                                                class="text-black dark:text-white">
                                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                                    fill="none" viewBox="0 0 24 24"
                                                                                    stroke-width="1.5" stroke="currentColor"
                                                                                    class="w-6 h-6 hover:animate-spin">
                                                                                    <path stroke-linecap="round"
                                                                                        stroke-linejoin="round"
                                                                                        d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                                                                    <path stroke-linecap="round"
                                                                                        stroke-linejoin="round"
                                                                                        d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                                                                </svg>
                                                                            </button>
                                                                            @include('partials.modals.layout_kartu.view')
                                                                            <button
                                                                                data-modal-target="update{{ $item['id'] }}"
                                                                                data-modal-toggle="update{{ $item['id'] }}"
                                                                                class="text-blue-500">
                                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                                    fill="none" viewBox="0 0 24 24"
                                                                                    stroke-width="1.5" stroke="currentColor"
                                                                                    class="w-6 h-6 hover:animate-spin">
                                                                                    <path stroke-linecap="round"
                                                                                        stroke-linejoin="round"
                                                                                        d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                                                                </svg>
                                                                            </button>
                                                                            @include('partials.modals.layout_kartu.update')
                                                                            <a href="{{ route('layout.kartu.pdf', $item['id']) }}"
                                                                                class="text-black dark:text-white">
                                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                                    fill="none" viewBox="0 0 24 24"
                                                                                    stroke-width="1.5" stroke="currentColor"
                                                                                    class="w-6 h-6 hover:animate-spin">
                                                                                    <path stroke-linecap="round"
                                                                                        stroke-linejoin="round"
                                                                                        d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m2.25 0H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                                                                                </svg>
                                                                            </a>
                                                                            <button class="text-red-500"
                                                                                data-modal-target="delete{{ $item['id'] }}"
                                                                                data-modal-toggle="delete{{ $item['id'] }}">
                                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                                    fill="none" viewBox="0 0 24 24"
                                                                                    stroke-width="1.5"
                                                                                    stroke="currentColor"
                                                                                    class="w-6 h-6 hover:animate-spin">
                                                                                    <path stroke-linecap="round"
                                                                                        stroke-linejoin="round"
                                                                                        d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                                                                </svg>
                                                                            </button>
                                                                            @include('partials.modals.layout_kartu.delete')
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                    @if ($data['data'])
                                                        @include('partials.pagination')
                                                    @else
                                                        <div class="flex flex-row justify-center text-center py-3">
                                                            <small class="text-xs text-red-500 italic">Data
                                                                kosong /
                                                                tidak ditemukan</small>
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
                </div>
                @include('partials.footer')
            </div>
        </div>
    </div>
@endsection
