@extends('partials.main')
@section('content')
    @include('partials.sidebar')
    @include('partials.topbar')
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
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
            </div><!--end container-->
            <div class="xl:w-full  min-h-[calc(100vh-138px)] relative pb-14">
                <div class="xl:w-full  min-h-[calc(100vh-138px)] relative pb-14">
                    <div class="grid md:grid-cols-12 lg:grid-cols-12 xl:grid-cols-12 gap-4 mb-4">

                        <div class="sm:col-span-12  md:col-span-12 lg:col-span-12 xl:col-span-12 xl:col-start-0 ">
                            <div
                                class="bg-white dark:bg-gray-900 border border-slate-200 dark:border-slate-700/40  rounded-md w-full relative mb-4">
                                <div
                                    class="border-b border-slate-200 dark:border-slate-700/40 py-3 px-4 dark:text-slate-300/70">
                                    <div class="flex-none md:flex">
                                        <h4 class="font-medium text-lg flex-1 self-center mb-2 md:mb-0">Form Pengajuan Kartu
                                        </h4>
                                    </div>
                                </div><!--end header-title-->
                                <div class="grid grid-cols-1 p-4">
                                    <div class="sm:-mx-6 lg:-mx-8">
                                        <form class="p-4 md:p-5" action="{{ route('pengajuan.store') }}" method="post"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="overflow-x-auto block w-full sm:px-6 lg:px-8">
                                                <div class="flex flex-row profile items-center justify-evenly p-5">
                                                    <div class="flex flex-col">
                                                        <img src="{{ asset('assets/images/card_placeholder.svg') }}"
                                                            id="card" alt="card"
                                                            class="mx-auto h-56 w-56 rounded-lg inline-block justify-center my-3">
                                                    </div>
                                                    <div
                                                        class="flex flex-col lg:ml-20 w-full justify-between p-4 leading-normal gap-3">
                                                        <div class="flex flex-row gap-5">
                                                            <p class="my-auto w-24 dark:text-white">NIP</p>
                                                            <input type="text" id="nip" name="nip"
                                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 
                                                            dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                        </div>
                                                        @error('nip')
                                                            <div class="flex flex-row gap-2 ms-28 text-red-500">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                        <div class="flex flex-row gap-5">
                                                            <p class="my-auto w-24 dark:text-white">Kartu</p>
                                                            <select id="kartu" name="kartu"
                                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                                                @foreach ($kartu['data'] as $i)
                                                                    <option value="{{ $i['id'] }}">{{ $i['title'] }}
                                                                        -
                                                                        {{ ($i['categories'] == '0' ? 'Kartu Acara' : $i['categories'] == '1') ? 'Kartu Identitas' : 'Kartu Intel' }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        @error('kartu')
                                                            <div class="flex flex-row gap-2 ms-28 text-red-500">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                        <div class="flex flex-row gap-5">
                                                            <p class="my-auto w-24 dark:text-white">Alasan</p>
                                                            <select id="alasan" name="reason"
                                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                                                <option value="0">Rusak</option>
                                                                <option value="1">Baru</option>
                                                                <option value="2">Ganti Satker</option>
                                                                <option value="3">Hilang</option>
                                                            </select>
                                                        </div>
                                                        <script>
                                                            $(function() {
                                                                $("#alasan").on('change', function() {
                                                                    if ($(this).val() != 1) {
                                                                        $("#input_photo").removeClass('hidden');
                                                                    } else {
                                                                        $("#input_photo").addClass('hidden');
                                                                    }
                                                                })
                                                            })
                                                        </script>
                                                        <div id="input_photo" class="flex flex-row gap-5">
                                                            <p class="my-auto w-24 dark:text-white">Bukti</p>
                                                            <input type="file" accept="image/*" name="photo"
                                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                                        </div>
                                                    </div>
                                                    @error('reason')
                                                        <div class="flex flex-row gap-2 ms-28 text-red-500">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="flex justify-end items-center pe-10">
                                                <button type="submit"
                                                    class="inline-block bg-gray-100 rounded-lg focus:outline-none hover:bg-blue-200 hover:text-gray-900 dark:border-gray-700 dark:hover:bg-blue-300 text-sm font-medium py-1 px-3 w-24 my-3">Ajukan</button>
                                            </div>
                                    </div>
                                    </form>
                                    <script>
                                        function keepOnlyNumbers(input) {
                                            return input.replace(/\D/g, "");
                                        }

                                        var inputField = document.getElementById("nip");

                                        inputField.addEventListener("input", function() {
                                            inputField.value = keepOnlyNumbers(inputField.value);
                                        });
                                    </script>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
