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
                                    <div class="flex flex-between">
                                        <h4 class="font-medium text-lg flex-1 self-center mb-2 md:mb-0">Pertanyaan & Jawaban
                                        </h4>

                                        <!-- Modal toggle -->
                                        <button data-modal-target="faq" data-modal-toggle="faq"
                                            class="focus:outline-none ms-2.5 text-primary-500 hover:bg-primary-500 hover:text-white bg-transparent border border-primary-500 dark:bg-transparent dark:text-primary-500 dark:hover:text-white dark:border-gray-700 dark:hover:bg-primary-500 text-sm font-medium py-1 px-3 rounded mb-1 w-24"
                                            type="button">
                                            Buat FAQ
                                        </button>
                                        @include('partials.modals.faq.create')
                                    </div>
                                </div>
                                <div class="grid grid-cols-1 p-4 overflow-scroll">
                                    <div class="sm:-mx-6 lg:-mx-8">
                                        <div class="relative overflow-x-auto block w-full sm:px-6 lg:px-10">
                                            <div class="p-4 md:p-5 space-y-4">
                                                <div id="accordion-flush" data-accordion="collapse"
                                                    data-active-classes="bg-white dark:bg-gray-900 text-gray-900 dark:text-white"
                                                    data-inactive-classes="text-gray-500 dark:text-gray-400">
                                                    @foreach ($data['data'] as $item)
                                                        <input type="hidden" value="{{ $item['id'] }}"
                                                            id="del{{ $item['id'] }}">
                                                        <h2 id="accordion-flush-heading-{{ $item['id'] }}">
                                                            <button type="button"
                                                                class="flex items-center justify-between w-full py-5 font-medium rtl:text-right text-gray-500 border-b border-gray-200 dark:border-gray-700 dark:text-gray-400 gap-3"
                                                                data-accordion-target="#accordion-flush-body-{{ $item['id'] }}"
                                                                aria-expanded="true"
                                                                aria-controls="accordion-flush-body-{{ $item['id'] }}">
                                                                <span
                                                                    class="flex flex-row gap-2 align-middle items-center"><svg
                                                                        xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                        viewBox="0 0 24 24" stroke-width="1.5"
                                                                        stroke="currentColor" class="w-6 h-6">
                                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                                            d="M9.879 7.519c1.171-1.025 3.071-1.025 4.242 0 1.172 1.025 1.172 2.687 0 3.712-.203.179-.43.326-.67.442-.745.361-1.45.999-1.45 1.827v.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 5.25h.008v.008H12v-.008Z" />
                                                                    </svg>
                                                                    {{ $item['question'] }}</span>
                                                                <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0"
                                                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                                    fill="none" viewBox="0 0 10 6">
                                                                    <path stroke="currentColor" stroke-linecap="round"
                                                                        stroke-linejoin="round" stroke-width="2"
                                                                        d="M9 5 5 1 1 5" />
                                                                </svg>
                                                            </button>
                                                        </h2>
                                                        <div id="accordion-flush-body-{{ $item['id'] }}" class="hidden"
                                                            aria-labelledby="accordion-flush-heading-{{ $item['id'] }}">
                                                            <div
                                                                class="py-2 flex flex-col justify-between border-b border-gray-200 dark:border-gray-700">
                                                                <div class="mb-3">
                                                                    <p class="text-gray-500 dark:text-gray-400">
                                                                        {{ $item['answer'] }}</p>
                                                                </div>
                                                                <div class="flex-row gap-x-3 self-end">
                                                                    <button data-modal-target="update{{ $item['id'] }}"
                                                                        data-modal-toggle="update{{ $item['id'] }}"
                                                                        class="text-blue-500 me-5">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            fill="none" viewBox="0 0 24 24"
                                                                            stroke-width="1.5" stroke="currentColor"
                                                                            class="w-8 h-8 p-0.5 hover:shadow rounded-full hover:shadow-blue-500">
                                                                            <path stroke-linecap="round"
                                                                                stroke-linejoin="round"
                                                                                d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                                                        </svg> Ubah
                                                                    </button>
                                                                    @include('partials.modals.faq.update')
                                                                    <button id="delete{{ $item['id'] }}"
                                                                        class="text-red-500"><svg
                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                            fill="none" viewBox="0 0 24 24"
                                                                            stroke-width="1.5" stroke="currentColor"
                                                                            class="w-8 h-8 p-0.5 hover:shadow rounded-full hover:shadow-red-500">
                                                                            <path stroke-linecap="round"
                                                                                stroke-linejoin="round"
                                                                                d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                                                        </svg> Hapus</button>
                                                                    <script>
                                                                        $(document).ready(function() {
                                                                            $("#delete{{ $item['id'] }}").on('click', function(e) {
                                                                                e.preventDefault()
                                                                                var id = $("#del{{ $item['id'] }}").val()
                                                                                Swal.fire({
                                                                                    title: "PERINGATAN",
                                                                                    text: "Apakah anda yakin menghapus FAQ {{ $item['question'] }} ?",
                                                                                    icon: "warning",
                                                                                    showCancelButton: true,
                                                                                    confirmButtonColor: "#3085d6",
                                                                                    cancelButtonColor: "#d33",
                                                                                    confirmButtonText: "Hapus"
                                                                                }).then((result) => {
                                                                                    if (result.isConfirmed) {
                                                                                        $.ajax({
                                                                                            url: "{{ route('faq.destroy') }}",
                                                                                            type: "POST",
                                                                                            headers: {
                                                                                                'X-CSRF-TOKEN': "{{ csrf_token() }}"
                                                                                            },
                                                                                            data: {
                                                                                                id: id
                                                                                            },
                                                                                            success: function(data) {
                                                                                                location.reload();
                                                                                            },
                                                                                            error: function(xhr) {

                                                                                            }
                                                                                        })
                                                                                    }
                                                                                });

                                                                            })
                                                                        })
                                                                    </script>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @include('partials.pagination')
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
