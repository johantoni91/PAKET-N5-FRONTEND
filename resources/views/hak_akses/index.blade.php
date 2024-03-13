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
                                        {{-- <button type="button" data-modal-target="create" data-modal-toggle="create"
                                            class="flex text-nowrap gap-2 flex-row focus:outline-none text-primary-500 hover:bg-primary-500 hover:text-white bg-transparent border border-primary-500 dark:bg-transparent dark:text-primary-500 dark:hover:text-white dark:border-gray-700 dark:hover:bg-primary-500 text-sm font-medium rounded justify-between py-1 px-2 align-bottom items-center">
                                            + Peran
                                            </svg>
                                        </button>
                                        @include('partials.modals.access.create') --}}
                                        {{-- <button type="button" data-modal-target="create" data-modal-toggle="create"
                                            class="flex text-nowrap gap-2 flex-row focus:outline-none text-primary-500 hover:bg-primary-500 hover:text-white bg-transparent border border-primary-500 dark:bg-transparent dark:text-primary-500 dark:hover:text-white dark:border-gray-700 dark:hover:bg-primary-500 text-sm font-medium rounded justify-between py-1 px-2 align-bottom items-center">
                                            + Menu
                                            </svg>
                                        </button>
                                        @include('partials.modals.access.create') --}}
                                    </div>
                                </div>
                                <div class="grid grid-cols-1 p-4 overflow-scroll">
                                    <div class="sm:-mx-6 lg:-mx-8">
                                        <div class="relative overflow-x-auto block w-full sm:px-6 lg:px-10">
                                            <div class="flex flex-row justify-between">
                                                {{-- <button data-modal-target="info" data-modal-toggle="info"
                                                    class="ms-5 inline-flex justify-evenly text-blue-500 items-center align-middle hover:border hover:border-blue-500 font-medium rounded-lg text-sm py-1 px-2 text-center dark:hover:border-blue-500"
                                                    type="button">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                        class="w-6 h-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="m11.25 11.25.041-.02a.75.75 0 0 1 1.063.852l-.708 2.836a.75.75 0 0 0 1.063.853l.041-.021M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9-3.75h.008v.008H12V8.25Z" />
                                                    </svg> &nbsp;
                                                    Info
                                                </button>
                                                @include('partials.modals.access.info') --}}
                                                {{-- <form action="" class="flex flex-row gap-2 items-center">
                                                    <button title="Tambah Peran" id="tambah_peran"
                                                        class="p-2 rounded-lg hover:border hover:border-blue-500 dark:hover:border dark:hover:border-blue-500 text-blue-500 dark:text-white">Tambah
                                                        Peran</button>
                                                    <label for="peran" id="label_peran" style="text-wrap: nowrap;"
                                                        class="self-end text-nowrap hidden mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                                                        Peran :</label>
                                                    <input type="text" name="peran" id="peran"
                                                        class="hidden bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg p-1 block w-full dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                        required>
                                                    <button title="Tambah Peran" id="tambah"
                                                        class="hidden p-1 rounded-lg hover:border hover:border-blue-500 dark:hover:border dark:hover:border-blue-500 text-blue-500 dark:text-white">+</button>
                                                    <script>
                                                        $(document).ready(function() {
                                                            $("#tambah_peran").on('click', function(e) {
                                                                e.preventDefault()
                                                                document.querySelector("#peran").classList.remove('hidden')
                                                                document.querySelector("#tambah").classList.remove('hidden')
                                                                document.querySelector("#label_peran").classList.remove('hidden')
                                                                document.querySelector("#tambah_peran").classList.add('hidden')
                                                            })
                                                        })
                                                    </script>
                                                </form> --}}
                                            </div>
                                            <div class="flex flex-col gap-5 p-5">
                                                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                                                    <table
                                                        class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                                        <thead
                                                            class="text-xs text-gray-700 uppercase dark:text-gray-400 border-b-2 border-slate-500">
                                                            <tr class="text-center">
                                                                <th scope="col" class="px-6 py-3">
                                                                    Peran
                                                                </th>
                                                                <th scope="col"
                                                                    class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                                                                    Menu / Akses
                                                                </th>
                                                                <th scope="col" class="px-6 py-3">
                                                                    Aksi
                                                                </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($data as $item)
                                                                <form action="{{ route('akses.update', $item['id']) }}"
                                                                    method="post">
                                                                    @csrf
                                                                    @php
                                                                        $val = $item['route'];
                                                                        $route = null;
                                                                        if ($val) {
                                                                            $route = json_decode($item['route'], true);
                                                                        } else {
                                                                            $route = null;
                                                                        }
                                                                    @endphp
                                                                    <tr
                                                                        class="border-b border-gray-200 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                                                        <td class="px-6 py-4 dark:text-white text-center">
                                                                            {{ $item['role'] }}
                                                                        </td>
                                                                        <th scope="row"
                                                                            class="px-4 py-2 text-black whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                                                                            <div
                                                                                class="flex flex-row gap-3 justify-center items-center align-middle">
                                                                                <div
                                                                                    class="flex flex-row gap-1 items-center">
                                                                                    <input type="checkbox" name="roles[]"
                                                                                        id="user{{ $item['id'] }}"
                                                                                        value="user"
                                                                                        {{ $route == null ? '' : (in_array('user', $route) ? 'checked' : '') }}
                                                                                        class="bg-slate-500 rounded border-0">
                                                                                    <label for="user{{ $item['id'] }}"
                                                                                        class="text-xs font-normal">Users</label>
                                                                                </div>
                                                                                <div
                                                                                    class="flex flex-row gap-1 items-center">
                                                                                    <input type="checkbox" name="roles[]"
                                                                                        id="satker{{ $item['id'] }}"
                                                                                        value="satker"
                                                                                        {{ $route == null ? '' : (in_array('satker', $route) ? 'checked' : '') }}
                                                                                        class="bg-slate-500 rounded border-0">
                                                                                    <label class="text-xs font-normal"
                                                                                        for="satker{{ $item['id'] }}">Satker</label>
                                                                                </div>
                                                                                <div
                                                                                    class="flex flex-row gap-1 items-center">
                                                                                    <input type="checkbox" name="roles[]"
                                                                                        id="pegawai{{ $item['id'] }}"
                                                                                        value="pegawai"
                                                                                        {{ $route == null ? '' : (in_array('pegawai', $route) ? 'checked' : '') }}
                                                                                        class="bg-slate-500 rounded border-0">
                                                                                    <label class="text-xs font-normal"
                                                                                        for="pegawai{{ $item['id'] }}">Pegawai</label>
                                                                                </div>
                                                                                <div
                                                                                    class="flex flex-row gap-1 items-center">
                                                                                    <input type="checkbox" name="roles[]"
                                                                                        id="pengajuan{{ $item['id'] }}"
                                                                                        value="pengajuan"
                                                                                        {{ $route == null ? '' : (in_array('pengajuan', $route) ? 'checked' : '') }}
                                                                                        class="bg-slate-500 rounded border-0">
                                                                                    <label class="text-xs font-normal"
                                                                                        for="pengajuan{{ $item['id'] }}">Pengajuan</label>
                                                                                </div>
                                                                                <div
                                                                                    class="flex flex-row gap-1 items-center">
                                                                                    <input type="checkbox" name="roles[]"
                                                                                        id="kartu{{ $item['id'] }}"
                                                                                        value="kartu"
                                                                                        {{ $route == null ? '' : (in_array('kartu', $route) ? 'checked' : '') }}
                                                                                        class="bg-slate-500 rounded border-0">
                                                                                    <label class="text-xs font-normal"
                                                                                        for="kartu{{ $item['id'] }}">Kartu</label>
                                                                                </div>
                                                                                <div
                                                                                    class="flex flex-row gap-1 items-center">
                                                                                    <input type="checkbox" name="roles[]"
                                                                                        id="hak_akses{{ $item['id'] }}"
                                                                                        value="akses"
                                                                                        {{ $route == null ? '' : (in_array('akses', $route) ? 'checked' : '') }}
                                                                                        class="bg-slate-500 rounded border-0">
                                                                                    <label class="text-xs font-normal"
                                                                                        for="hak_akses{{ $item['id'] }}">Hak
                                                                                        akses</label>
                                                                                </div>
                                                                                <div
                                                                                    class="flex flex-row gap-1 items-center">
                                                                                    <input type="checkbox" name="roles[]"
                                                                                        id="log_aktivitas{{ $item['id'] }}"
                                                                                        value="log"
                                                                                        {{ $route == null ? '' : (in_array('log', $route) ? 'checked' : '') }}
                                                                                        class="bg-slate-500 rounded border-0">
                                                                                    <label class="text-xs font-normal"
                                                                                        for="log_aktivitas{{ $item['id'] }}">Log
                                                                                        Aktivitas</label>
                                                                                </div>
                                                                                <div
                                                                                    class="flex flex-row gap-1 items-center">
                                                                                    <input type="checkbox" name="roles[]"
                                                                                        id="faq{{ $item['id'] }}"
                                                                                        value="faq"
                                                                                        {{ $route == null ? '' : (in_array('faq', $route) ? 'checked' : '') }}
                                                                                        class="bg-slate-500 rounded border-0">
                                                                                    <label class="text-xs font-normal"
                                                                                        for="faq{{ $item['id'] }}">FAQ</label>
                                                                                </div>
                                                                                <div
                                                                                    class="flex flex-row gap-1 items-center">
                                                                                    <input type="checkbox" name="roles[]"
                                                                                        id="ulasan{{ $item['id'] }}"
                                                                                        value="rating"
                                                                                        {{ $route == null ? '' : (in_array('rating', $route) ? 'checked' : '') }}
                                                                                        class="bg-slate-500 rounded border-0">
                                                                                    <label class="text-xs font-normal"
                                                                                        for="ulasan{{ $item['id'] }}">Ulasan</label>
                                                                                </div>
                                                                            </div>
                                                                        </th>
                                                                        <td>
                                                                            <div
                                                                                class="flex flex-row justify-center gap-2">
                                                                                <button type="submit"
                                                                                    title="Simpan Peran">
                                                                                    <i class="text-center text-blue-500"
                                                                                        data-lucide="save"></i>
                                                                                </button>
                                                                                {{-- <a href="#" title="Hapus Peran">
                                                                                <i class="text-center text-red-500"
                                                                                    data-lucide="trash-2"></i>
                                                                            </a> --}}
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                </form>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                    {{-- @include('partials.pagination') --}}
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
