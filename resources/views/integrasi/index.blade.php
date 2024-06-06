@extends('partials.main')
@section('content')
    @include('partials.sidebar')
    @include('partials.topbar')
    <div id="status"
        class="hidden absolute flex flex-row justify-start items-center gap-1 w-48 h-12 bottom-5 right-5 py-3 px-2 text-green-800">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-blocks">
            <rect width="7" height="7" x="14" y="3" rx="1" />
            <path d="M10 21V8a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-5a1 1 0 0 0-1-1H3" />
        </svg>
        <div id="progress" class="h-5 bg-green-800 rounded-full" style="width: 30%"></div>
    </div>
    <div class="ltr:flex flex-1 rtl:flex-row-reverse">
        <div
            class="page-wrapper relative ltr:ml-auto rtl:mr-auto rtl:ml-0 w-[calc(100%-260px)] px-4 pt-[64px] duration-300">
            <div class="xl:w-full">
                <div class="flex flex-wrap">
                    <div class="flex items-center py-4 w-full">
                        <div class="w-full">
                            <div class="flex flex-wrap justify-between">
                                <div class="items-center ">
                                    <h1 class="font-medium text-3xl block dark:text-slate-100">Integrasi Data Pegawai</h1>
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
                                        <h4 class="font-medium text-lg flex-1 self-center mb-2 md:mb-0">Data Integrasi</h4>
                                    </div>
                                </div>
                                <div class="grid grid-cols-1 p-4 overflow-scroll">
                                    <div class="sm:-mx-6 lg:-mx-8">
                                        <div class="relative overflow-x-auto block w-full sm:px-6 lg:px-10">
                                            <div class="flex justify-start items-center mb-3">
                                                <button data-modal-target="create" data-modal-toggle="create"
                                                    class="focus:outline-none bg-gradient-to-r from-violet-800 to-red-500 text-white dark:bg-gradient-to-r dark:from-zinc-500 dark:to-cyan-300 dark:text-white text-sm font-medium py-1 px-3 rounded hover:from-red-500 hover:to-violet-800 dark:hover:from-cyan-300 dark:hover:to-zinc-500">Tambah
                                                </button>
                                                @include('integrasi.modals.create')
                                            </div>
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
                                                                        No.
                                                                    </th>
                                                                    <th scope="col" class="px-6 py-3">
                                                                        URL
                                                                    </th>
                                                                    <th scope="col"
                                                                        class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                                                                        Autentikasi
                                                                    </th>
                                                                    <th scope="col" class="px-6 py-3">
                                                                        Aksi
                                                                    </th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @if (!$data)
                                                                    <tr>
                                                                        <th colspan="7">
                                                                            <p
                                                                                class="text-red-500 mt-3 text-center text-xs italic my-2">
                                                                                Tidak
                                                                                ada data</p>
                                                                        </th>
                                                                    </tr>
                                                                @else
                                                                    @foreach ($data['data'] as $item)
                                                                        <tr
                                                                            class="border-b border-gray-200 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                                                            <th scope="row"
                                                                                class="px-4 py-2 text-black text-center whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                                                                                {{ $loop->iteration }}
                                                                            </th>
                                                                            <td class="px-6 py-4 dark:text-white">
                                                                                <div class="flex flex-col gap-2">
                                                                                    {{ $item['url'] }}
                                                                                </div>
                                                                            </td>
                                                                            <td
                                                                                class="px-6 py-4 dark:text-white bg-gray-50 dark:bg-gray-800 text-center">
                                                                                <button
                                                                                    data-modal-target="type{{ $item['id'] }}"
                                                                                    data-modal-toggle="type{{ $item['id'] }}"
                                                                                    class="border rounded-lg p-2 hover:shadow hover:shadow-violet-500 dark:hover:shadow dark:hover:shadow-teal-500">
                                                                                    @if ($item['type'] == 'auth')
                                                                                        Dasar (Basic Auth)
                                                                                    @elseif($item['type'] == 'token')
                                                                                        Token
                                                                                    @else
                                                                                        Tanpa Autentikasi
                                                                                    @endif
                                                                                </button>
                                                                                @include('integrasi.modals.type')
                                                                            </td>
                                                                            <td
                                                                                class="px-6 py-4 dark:text-white text-center">
                                                                                <button
                                                                                    data-modal-target="update{{ $item['id'] }}"
                                                                                    data-modal-toggle="update{{ $item['id'] }}"
                                                                                    class="text-blue-600 hover:text-blue-400">
                                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                                        fill="none" viewBox="0 0 24 24"
                                                                                        stroke-width="1.5"
                                                                                        stroke="currentColor"
                                                                                        class="w-6 h-6">
                                                                                        <path stroke-linecap="round"
                                                                                            stroke-linejoin="round"
                                                                                            d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                                                                    </svg>
                                                                                </button>
                                                                                @include('integrasi.modals.update')
                                                                                <button
                                                                                    data-modal-target="delete{{ $item['id'] }}"
                                                                                    data-modal-toggle="delete{{ $item['id'] }}"
                                                                                    class="text-red-600 hover:text-red-400">
                                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                                        fill="none" viewBox="0 0 24 24"
                                                                                        stroke-width="1.5"
                                                                                        stroke="currentColor"
                                                                                        class="w-6 h-6">
                                                                                        <path stroke-linecap="round"
                                                                                            stroke-linejoin="round"
                                                                                            d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                                                                    </svg>
                                                                                </button>
                                                                                @include('integrasi.modals.delete')
                                                                                <button
                                                                                    onclick="importPegawai{{ $item['id'] }}()"
                                                                                    class="text-black dark:text-white">
                                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                                        width="24" height="24"
                                                                                        viewBox="0 0 24 24" fill="none"
                                                                                        stroke="currentColor"
                                                                                        stroke-width="2"
                                                                                        stroke-linecap="round"
                                                                                        stroke-linejoin="round"
                                                                                        class="lucide lucide-arrow-down-to-line">
                                                                                        <path d="M12 17V3" />
                                                                                        <path d="m6 11 6 6 6-6" />
                                                                                        <path d="M19 21H5" />
                                                                                    </svg>
                                                                                </button>
                                                                                <script>
                                                                                    function handleEvent(e) {
                                                                                        $("#status").removeClass('hidden')
                                                                                        Swal.fire({
                                                                                            title: "PERINGATAN",
                                                                                            text: "Mohon tunggu dan jangan beranjak ke halaman lain!",
                                                                                            icon: "warning",
                                                                                            showCancelButton: false,
                                                                                            showConfirmButton: false
                                                                                        });
                                                                                        if (e.type == 'loadstart') {
                                                                                            $("#progress").css('width', '20%')
                                                                                        } else if (e.type == 'progress') {
                                                                                            $("#progress").css('width', '50%')
                                                                                        } else if (e.type == 'load') {
                                                                                            $("#progress").css('width', '90%')
                                                                                        } else if (e.type == 'loadend') {
                                                                                            if (e.target.status == 200) {
                                                                                                $("#progress").css('width', '100%')
                                                                                                Swal.fire({
                                                                                                    title: "Pemberitahuan",
                                                                                                    text: "Berhasil mengintegrasikan data pegawai, silahkan cek data pegawai",
                                                                                                    icon: "success"
                                                                                                });
                                                                                                $("#status").addClass('hidden')
                                                                                            } else {
                                                                                                $("#status").addClass('hidden')
                                                                                                Swal.fire({
                                                                                                    title: "Pemberitahuan",
                                                                                                    text: "Gagal mengintegrasikan data pegawai. Mohon agar link dicek kembali.",
                                                                                                    icon: "error"
                                                                                                });
                                                                                            }
                                                                                        }
                                                                                    }

                                                                                    function addListeners(xhr) {
                                                                                        xhr.addEventListener("loadstart", handleEvent);
                                                                                        xhr.addEventListener("load", handleEvent);
                                                                                        xhr.addEventListener("loadend", handleEvent);
                                                                                        xhr.addEventListener("progress", handleEvent);
                                                                                        xhr.addEventListener("error", handleEvent);
                                                                                        xhr.addEventListener("abort", handleEvent);
                                                                                    }

                                                                                    function runXHR(url) {
                                                                                        const xhr{{ $item['id'] }} = new XMLHttpRequest();
                                                                                        addListeners(xhr{{ $item['id'] }});
                                                                                        xhr{{ $item['id'] }}.open("POST", "{{ route('integrate') }}", true);
                                                                                        xhr{{ $item['id'] }}.setRequestHeader("Content-Type", "application/json");
                                                                                        xhr{{ $item['id'] }}.setRequestHeader("X-CSRF-TOKEN", "{{ csrf_token() }}");
                                                                                        xhr{{ $item['id'] }}.send(JSON.stringify({
                                                                                            id: url
                                                                                        }));
                                                                                        return xhr{{ $item['id'] }};
                                                                                    }

                                                                                    function importPegawai{{ $item['id'] }}() {
                                                                                        runXHR("{{ $item['id'] }}")
                                                                                    }
                                                                                </script>
                                                                            </td>
                                                                        </tr>
                                                                    @endforeach
                                                                @endif
                                                            </tbody>
                                                        </table>
                                                        @if ($data)
                                                            @include('partials.pagination')
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
                </div>
                @include('partials.footer')
            </div>
        </div>
    </div>
@endsection
