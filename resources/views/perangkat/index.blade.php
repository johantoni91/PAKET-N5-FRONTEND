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
                                        <h4 class="font-medium text-lg flex-1 self-center mb-2 md:mb-0">Data Perangkat
                                        </h4>
                                        @if (session('data')['satker'] == '00')
                                            <div class="flex flex-row justify-evenly gap-2">
                                                <a href="{{ route('perangkat.perangkat') }}"
                                                    class="pt-2 px-3 border align-bottom border-b-0 dark:border-slate-700/40 rounded-t-md -mb-3 hover:bg-gradient-to-b hover:from-violet-800 hover:to-red-500 hover:text-white dark:hover:bg-gradient-to-b dark:hover:from-cyan-300 dark:hover:to-zinc-500">Peralatan
                                                </a>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="grid grid-cols-1 p-4 overflow-scroll">
                                    <div class="sm:-mx-6 lg:-mx-8">
                                        <div class="relative overflow-x-auto block w-full sm:px-6 lg:px-10">
                                            <div class="ms-5 flex flex-row justify-between py-1">
                                                @if (session('data')['satker'] == '00')
                                                    <div class="flex justify-start gap-2">
                                                        <div class="self-start">
                                                            <button type="button" data-modal-target="search"
                                                                data-modal-toggle="search"
                                                                class="focus:outline-none bg-gradient-to-r from-violet-800 to-red-500 text-white dark:bg-gradient-to-r dark:from-zinc-500 dark:to-cyan-300 dark:text-white text-sm font-medium mt-3 py-1 px-3 rounded hover:from-red-500 hover:to-violet-800 dark:hover:from-cyan-300 dark:hover:to-zinc-500">Cari
                                                                Perangkat
                                                            </button>
                                                            @include('perangkat.modals.search')
                                                        </div>
                                                    </div>
                                                @endif
                                                <div class="flex justify-end gap-2 me-5">
                                                    @if (session('data')['satker'] == '00')
                                                        <button type="button" data-modal-target="reset"
                                                            data-modal-toggle="reset"
                                                            class="focus:outline-none bg-gradient-to-r from-violet-800 to-red-500 text-white dark:bg-gradient-to-r dark:from-zinc-500 dark:to-cyan-300 dark:text-white text-sm font-medium mt-3 py-1 px-3 rounded hover:from-red-500 hover:to-violet-800 dark:hover:from-cyan-300 dark:hover:to-zinc-500">Reset
                                                            Perangkat
                                                        </button>
                                                        @include('perangkat.modals.reset')
                                                    @endif
                                                    @if (!request()->routeIs('perangkat'))
                                                        <a href="{{ route('perangkat') }}"
                                                            class="bg-gradient-to-r from-violet-800 to-red-500 text-white dark:bg-gradient-to-r dark:from-zinc-500 dark:to-cyan-300 dark:text-white text-sm font-medium mt-3 py-1 px-3 rounded hover:from-red-500 hover:to-violet-800 dark:hover:from-cyan-300 dark:hover:to-zinc-500">Kembali
                                                        </a>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="flex flex-col gap-5 p-5">
                                                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                                                    <table
                                                        class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                                        <thead
                                                            class="text-xs text-gray-700 uppercase dark:text-gray-400 border-b-2 border-slate-500">
                                                            <tr class="text-center">
                                                                <th scope="col"
                                                                    class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                                                                    Satker
                                                                </th>
                                                                <th scope="col" class="px-6 py-3">
                                                                    Status
                                                                </th>
                                                                <th scope="col"
                                                                    class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                                                                    Rincian
                                                                </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($data['data'] as $item)
                                                                @if (!$item)
                                                                    <tr class="text-center">Tidak ada perangkat</tr>
                                                                @else
                                                                    <tr
                                                                        class="border-b border-gray-200 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                                                        <th scope="row"
                                                                            class="px-4 py-2 text-black wrap-text bg-gray-50 dark:text-white dark:bg-gray-800">
                                                                            {{ Illuminate\Support\Facades\Http::withToken(session('data')['token'])->get(env('API_URL', '') . '/satker' . '/' . $item['satker'] . '/code')->json()['data']['satker_name'] }}
                                                                        </th>
                                                                        <td class="px-6 py-4 dark:text-white text-center">
                                                                            <div
                                                                                class="justify-center items-center gap-2 flex flex-row {{ $item['status'] == '1' ? 'drop-shadow-green' : 'drop-shadow-red' }}">
                                                                                @if ($item['status'] == '1')
                                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                                        fill="none" viewBox="0 0 24 24"
                                                                                        stroke-width="1.5"
                                                                                        stroke="currentColor"
                                                                                        class="w-6 h-6 text-green-500">
                                                                                        <path stroke-linecap="round"
                                                                                            stroke-linejoin="round"
                                                                                            d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                                                                    </svg>
                                                                                    <span
                                                                                        class="text-sm text-green-500 ms-2 mt-0.5">
                                                                                        Aktif</span>
                                                                                @else
                                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                                        fill="none" viewBox="0 0 24 24"
                                                                                        stroke-width="1.5"
                                                                                        stroke="currentColor"
                                                                                        class="w-6 h-6 text-red-500">
                                                                                        <path stroke-linecap="round"
                                                                                            stroke-linejoin="round"
                                                                                            d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                                                                    </svg>
                                                                                    <span
                                                                                        class="text-sm text-red-500 ms-2 mt-0.5">
                                                                                        Nonaktif</span>
                                                                                @endif
                                                                            </div>
                                                                        </td>
                                                                        <td
                                                                            class="px-6 py-4 dark:text-white bg-gray-50 dark:bg-gray-800">
                                                                            @if (session('data')['satker'] == '00')
                                                                                <div
                                                                                    class="flex flex-row justify-evenly items-center">
                                                                                    @include('perangkat.modals.details')
                                                                                    <button type="button"
                                                                                        data-modal-target="update{{ $item['id'] }}"
                                                                                        data-modal-toggle="update{{ $item['id'] }}"
                                                                                        class="text-black dark:text-white drop-shadow-black dark:drop-shadow-white">
                                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                                            width="24" height="24"
                                                                                            viewBox="0 0 24 24"
                                                                                            fill="none"
                                                                                            stroke="currentColor"
                                                                                            stroke-width="2"
                                                                                            stroke-linecap="round"
                                                                                            stroke-linejoin="round"
                                                                                            class="lucide lucide-user-round-search">
                                                                                            <circle cx="10"
                                                                                                cy="8" r="5" />
                                                                                            <path
                                                                                                d="M2 21a8 8 0 0 1 10.434-7.62" />
                                                                                            <circle cx="18"
                                                                                                cy="18" r="3" />
                                                                                            <path d="m22 22-1.9-1.9" />
                                                                                        </svg></button>
                                                                                    <a href="{{ Illuminate\Support\Facades\Http::withToken(session('data')['token'])->get(env('API_URL', '') . '/perangkat' . '/' . $item['satker'] . '/find/tools/tc_hardware')->json()['data']? route('perangkat.update.rincian', [$item['satker']]): route('perangkat.rincian', [$item['id']]) }}"
                                                                                        class="text-center text-blue-600 hover:text-blue-400">
                                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                                            width="24" height="24"
                                                                                            class="text-center mx-auto"
                                                                                            viewBox="0 0 24 24"
                                                                                            fill="none"
                                                                                            stroke="currentColor"
                                                                                            stroke-width="2"
                                                                                            stroke-linecap="round"
                                                                                            stroke-linejoin="round"
                                                                                            class="lucide lucide-settings">
                                                                                            <path
                                                                                                d="M12.22 2h-.44a2 2 0 0 0-2 2v.18a2 2 0 0 1-1 1.73l-.43.25a2 2 0 0 1-2 0l-.15-.08a2 2 0 0 0-2.73.73l-.22.38a2 2 0 0 0 .73 2.73l.15.1a2 2 0 0 1 1 1.72v.51a2 2 0 0 1-1 1.74l-.15.09a2 2 0 0 0-.73 2.73l.22.38a2 2 0 0 0 2.73.73l.15-.08a2 2 0 0 1 2 0l.43.25a2 2 0 0 1 1 1.73V20a2 2 0 0 0 2 2h.44a2 2 0 0 0 2-2v-.18a2 2 0 0 1 1-1.73l.43-.25a2 2 0 0 1 2 0l.15.08a2 2 0 0 0 2.73-.73l.22-.39a2 2 0 0 0-.73-2.73l-.15-.08a2 2 0 0 1-1-1.74v-.5a2 2 0 0 1 1-1.74l.15-.09a2 2 0 0 0 .73-2.73l-.22-.38a2 2 0 0 0-2.73-.73l-.15.08a2 2 0 0 1-2 0l-.43-.25a2 2 0 0 1-1-1.73V4a2 2 0 0 0-2-2z" />
                                                                                            <circle cx="12"
                                                                                                cy="12" r="3" />
                                                                                        </svg>
                                                                                    </a>
                                                                                </div>
                                                                            @else
                                                                                <button type="button"
                                                                                    data-modal-target="update{{ $item['id'] }}"
                                                                                    data-modal-toggle="update{{ $item['id'] }}"
                                                                                    class="text-black dark:text-white drop-shadow-black dark:drop-shadow-white">
                                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                                        width="24" height="24"
                                                                                        viewBox="0 0 24 24" fill="none"
                                                                                        stroke="currentColor"
                                                                                        stroke-width="2"
                                                                                        stroke-linecap="round"
                                                                                        stroke-linejoin="round"
                                                                                        class="lucide lucide-user-round-search">
                                                                                        <circle cx="10"
                                                                                            cy="8" r="5" />
                                                                                        <path
                                                                                            d="M2 21a8 8 0 0 1 10.434-7.62" />
                                                                                        <circle cx="18"
                                                                                            cy="18" r="3" />
                                                                                        <path d="m22 22-1.9-1.9" />
                                                                                    </svg></button>
                                                                                <a href="{{ Illuminate\Support\Facades\Http::withToken(session('data')['token'])->get(env('API_URL', '') . '/perangkat' . '/' . $item['satker'] . '/find/tools/tc_hardware')->json()['data']? route('perangkat.update.rincian', [$item['satker']]): route('perangkat.rincian', [$item['id']]) }}"
                                                                                    class="text-center text-blue-600 hover:text-blue-400">
                                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                                        width="24" height="24"
                                                                                        class="text-center mx-auto"
                                                                                        viewBox="0 0 24 24" fill="none"
                                                                                        stroke="currentColor"
                                                                                        stroke-width="2"
                                                                                        stroke-linecap="round"
                                                                                        stroke-linejoin="round"
                                                                                        class="lucide lucide-settings">
                                                                                        <path
                                                                                            d="M12.22 2h-.44a2 2 0 0 0-2 2v.18a2 2 0 0 1-1 1.73l-.43.25a2 2 0 0 1-2 0l-.15-.08a2 2 0 0 0-2.73.73l-.22.38a2 2 0 0 0 .73 2.73l.15.1a2 2 0 0 1 1 1.72v.51a2 2 0 0 1-1 1.74l-.15.09a2 2 0 0 0-.73 2.73l.22.38a2 2 0 0 0 2.73.73l.15-.08a2 2 0 0 1 2 0l.43.25a2 2 0 0 1 1 1.73V20a2 2 0 0 0 2 2h.44a2 2 0 0 0 2-2v-.18a2 2 0 0 1 1-1.73l.43-.25a2 2 0 0 1 2 0l.15.08a2 2 0 0 0 2.73-.73l.22-.39a2 2 0 0 0-.73-2.73l-.15-.08a2 2 0 0 1-1-1.74v-.5a2 2 0 0 1 1-1.74l.15-.09a2 2 0 0 0 .73-2.73l-.22-.38a2 2 0 0 0-2.73-.73l-.15.08a2 2 0 0 1-2 0l-.43-.25a2 2 0 0 1-1-1.73V4a2 2 0 0 0-2-2z" />
                                                                                        <circle cx="12"
                                                                                            cy="12" r="3" />
                                                                                    </svg>
                                                                                </a>
                                                                            @endif
                                                                            @include('perangkat.modals.update')
                                                                        </td>
                                                                    </tr>
                                                                @endif
                                                            @endforeach
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
