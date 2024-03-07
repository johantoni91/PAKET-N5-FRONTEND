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
                                    <h1 class="font-medium text-3xl block dark:text-slate-100">Manajemen Pengajuan</h1>
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
                                            class="flex text-nowrap gap-2 flex-row focus:outline-none text-primary-500 hover:bg-primary-500 hover:text-white bg-transparent border border-primary-500 dark:bg-transparent dark:text-primary-500 dark:hover:text-white dark:border-gray-700 dark:hover:bg-primary-500 text-sm font-medium rounded justify-between py-1 px-2 align-bottom items-center">
                                            Cari Pengajuan <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                                            </svg>
                                        </button>
                                        @include('partials.modals.pegawai.search')
                                    </div>
                                </div><!--end header-title-->
                                <div class="grid grid-cols-1 p-4 overflow-scroll">
                                    <div class="sm:-mx-6 lg:-mx-8">
                                        <div class="relative overflow-x-auto block w-full sm:px-6 lg:px-10">
                                            <div class="flex flex-col gap-5 p-5">
                                                <div class="datatable_1">
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
                                                                        Pengajuan
                                                                    </th>
                                                                    <th scope="col"
                                                                        class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                                                                        Aksi
                                                                    </th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @if (!$data['data'])
                                                                    <tr>
                                                                        <th colspan="7">
                                                                            <p
                                                                                class="text-red-500 mt-3 text-center text-xs italic">
                                                                                Tidak
                                                                                ada data
                                                                                pegawai</p>
                                                                        </th>
                                                                    </tr>
                                                                @else
                                                                    @foreach ($data['data'] as $item)
                                                                        <tr
                                                                            class="border-b border-gray-200 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                                                            <th scope="row"
                                                                                class="px-4 py-2 text-black whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                                                                                <div class="flex flex-row">
                                                                                    <div class="p-5">
                                                                                        <img src="{{ $item['foto_pegawai'] }}"
                                                                                            class="w-10 h-10 items-center rounded-full shadow me-1 inline-block">
                                                                                    </div>
                                                                                    <div
                                                                                        class="flex flex-col justify-center text-wrap">
                                                                                        {{ $item['nama'] }}
                                                                                        <div class="text-start text-nowrap">
                                                                                            NIP :
                                                                                            {{ $item['nip'] ?? $item['nrp'] }}
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </th>
                                                                            <td
                                                                                class="px-6 py-4 dark:text-white text-center">
                                                                                <div class="inline-flex items-center">
                                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                                        fill="none" viewBox="0 0 24 24"
                                                                                        stroke-width="1.5"
                                                                                        stroke="currentColor"
                                                                                        class="w-6 text-red-500 mx-auto h-6">
                                                                                        <path stroke-linecap="round"
                                                                                            stroke-linejoin="round"
                                                                                            d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                                                                    </svg> <small class="text-red-500">Tidak
                                                                                        mengajukan</small>
                                                                                </div>
                                                                            </td>
                                                                            <td
                                                                                class="px-10 py-4 text-center dark:text-white bg-gray-50 dark:bg-gray-800">
                                                                                <button
                                                                                    data-modal-target="pengajuan{{ $item['nip'] ?? $item['nrp'] }}"
                                                                                    data-modal-toggle="pengajuan{{ $item['nip'] ?? $item['nrp'] }}">
                                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                                        fill="none" viewBox="0 0 24 24"
                                                                                        stroke-width="1.5"
                                                                                        stroke="currentColor"
                                                                                        class="w-6 hover:text-blue-500 dark:hover:text-blue-500 dark:text-white mx-auto h-6">
                                                                                        <path stroke-linecap="round"
                                                                                            stroke-linejoin="round"
                                                                                            d="M10.343 3.94c.09-.542.56-.94 1.11-.94h1.093c.55 0 1.02.398 1.11.94l.149.894c.07.424.384.764.78.93.398.164.855.142 1.205-.108l.737-.527a1.125 1.125 0 0 1 1.45.12l.773.774c.39.389.44 1.002.12 1.45l-.527.737c-.25.35-.272.806-.107 1.204.165.397.505.71.93.78l.893.15c.543.09.94.559.94 1.109v1.094c0 .55-.397 1.02-.94 1.11l-.894.149c-.424.07-.764.383-.929.78-.165.398-.143.854.107 1.204l.527.738c.32.447.269 1.06-.12 1.45l-.774.773a1.125 1.125 0 0 1-1.449.12l-.738-.527c-.35-.25-.806-.272-1.203-.107-.398.165-.71.505-.781.929l-.149.894c-.09.542-.56.94-1.11.94h-1.094c-.55 0-1.019-.398-1.11-.94l-.148-.894c-.071-.424-.384-.764-.781-.93-.398-.164-.854-.142-1.204.108l-.738.527c-.447.32-1.06.269-1.45-.12l-.773-.774a1.125 1.125 0 0 1-.12-1.45l.527-.737c.25-.35.272-.806.108-1.204-.165-.397-.506-.71-.93-.78l-.894-.15c-.542-.09-.94-.56-.94-1.109v-1.094c0-.55.398-1.02.94-1.11l.894-.149c.424-.07.765-.383.93-.78.165-.398.143-.854-.108-1.204l-.526-.738a1.125 1.125 0 0 1 .12-1.45l.773-.773a1.125 1.125 0 0 1 1.45-.12l.737.527c.35.25.807.272 1.204.107.397-.165.71-.505.78-.929l.15-.894Z" />
                                                                                        <path stroke-linecap="round"
                                                                                            stroke-linejoin="round"
                                                                                            d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                                                                    </svg>
                                                                                </button>
                                                                                @include('partials.modals.pengajuan.index')
                                                                            </td>
                                                                        </tr>
                                                                    @endforeach
                                                                @endif
                                                            </tbody>
                                                        </table>
                                                        @include('partials.pagination')
                                                    </div>
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
