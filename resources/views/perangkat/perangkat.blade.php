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
                                    <p class="ms-1 text-slate-600"> <a href="{{ route('perangkat') }}"
                                            class="text-blue-600 font-semibold">Data Perangkat </a> > Peralatan
                                    </p>
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
                                        <h4 class="font-medium text-lg flex-1 self-center mb-2 md:mb-0">Data Peralatan
                                        </h4>
                                        <a href="{{ route('perangkat') }}"
                                            class="pt-2 px-3 border align-bottom border-b-0 dark:border-slate-700/40 rounded-t-md -mb-3 hover:bg-gradient-to-b hover:from-violet-800 hover:to-red-500 hover:text-white dark:hover:bg-gradient-to-b dark:hover:from-cyan-300 dark:hover:to-zinc-500">Perangkat
                                        </a>
                                    </div>
                                </div>
                                <div class="grid grid-cols-1 p-4 overflow-scroll">
                                    <div class="sm:-mx-6 lg:-mx-8">
                                        <div class="relative overflow-x-auto block w-full sm:px-6 lg:px-10">
                                            <div class="flex justify-start items-center mb-3">
                                                <button type="button" data-modal-target="create" data-modal-toggle="create"
                                                    class="focus:outline-none bg-gradient-to-r from-violet-800 to-red-500 text-white dark:bg-gradient-to-r dark:from-zinc-500 dark:to-cyan-300 dark:text-white text-sm font-medium py-1 px-3 rounded hover:from-red-500 hover:to-violet-800 dark:hover:from-cyan-300 dark:hover:to-zinc-500">Tambah
                                                </button>
                                                @include('perangkat.modals.create_tool')
                                            </div>
                                            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                                                <table
                                                    class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                                    <tbody>
                                                        @foreach ($data as $item)
                                                            <tr
                                                                class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                                                <th scope="row"
                                                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                                    <div class="flex flex-col gap-2">
                                                                        <p>
                                                                            {{ $item['perangkat'] }}
                                                                        </p>
                                                                        <p>{{ $item['status'] == '1' ? 'Aktif' : 'Nonaktif' }}
                                                                        </p>
                                                                    </div>
                                                                </th>
                                                                <td class="px-6 py-4 text-end">
                                                                    <button data-modal-target="update{{ $item['id'] }}"
                                                                        data-modal-toggle="update{{ $item['id'] }}"
                                                                        class="text-blue-600 hover:text-blue-400">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            fill="none" viewBox="0 0 24 24"
                                                                            stroke-width="1.5" stroke="currentColor"
                                                                            class="w-6 h-6">
                                                                            <path stroke-linecap="round"
                                                                                stroke-linejoin="round"
                                                                                d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                                                        </svg>
                                                                    </button>
                                                                    @include('perangkat.modals.update_tool')
                                                                    <button data-modal-target="delete{{ $item['id'] }}"
                                                                        data-modal-toggle="delete{{ $item['id'] }}"
                                                                        class="text-red-600 hover:text-red-400">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            fill="none" viewBox="0 0 24 24"
                                                                            stroke-width="1.5" stroke="currentColor"
                                                                            class="w-6 h-6">
                                                                            <path stroke-linecap="round"
                                                                                stroke-linejoin="round"
                                                                                d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                                                        </svg>
                                                                    </button>
                                                                    @include('perangkat.modals.delete_tool')
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
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
