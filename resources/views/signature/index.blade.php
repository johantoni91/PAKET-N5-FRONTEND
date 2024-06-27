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
                                        <h4 class="font-medium text-lg flex-1 self-center mb-2 md:mb-0">Tambah Tanda Tangan
                                        </h4>
                                    </div>
                                </div><!--end header-title-->
                                <div class="grid grid-cols-1 p-4">
                                    <div class="sm:-mx-6 lg:-mx-8">
                                        <form
                                            action="{{ $starterPack['tanda_tangan'] == '' ? route('signature.store') : route('signature.update') }}"
                                            enctype="multipart/form-data" method="post">
                                            @csrf
                                            <div class="overflow-x-auto block w-full sm:px-6 lg:px-8">
                                                <div class="flex flex-row profile items-center justify-evenly p-5">
                                                    <div class="flex flex-col">
                                                        <img src="{{ $starterPack['tanda_tangan'] == '' ? asset('assets/images/signature.jpg') : $starterPack['tanda_tangan']['signature'] }}"
                                                            id="new_photo" alt="new-photo"
                                                            class="mx-auto h-56 w-56 rounded-lg inline-block justify-center my-3 @error('signature') shadow shadow-red dark:shadow-red @enderror">
                                                        <input type="file" name="signature" id="signature"
                                                            accept="image/*" value="{{ old('signature') }}"
                                                            class="bg-gray-50 my-3 mx-auto text-sm block w-auto border border-gray-300 rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                            onchange="update(event)">
                                                        <script>
                                                            var update = function(event) {
                                                                var new_photo = document.getElementById("new_photo");
                                                                new_photo.src = URL.createObjectURL(event.target.files[0]);
                                                                new_photo.onload = function() {
                                                                    URL.revokeObjectURL(new_photo.src);
                                                                };
                                                            };
                                                        </script>
                                                        @error('signature')
                                                            <small class="text-red-500">{{ $message }}</small>
                                                        @enderror
                                                    </div>
                                                    <div
                                                        class="flex flex-col lg:ml-20 w-full justify-between p-4 leading-normal gap-3">
                                                        <div class="flex flex-row gap-5">
                                                            <p class="my-auto w-24 dark:text-white">NIP</p>
                                                            <input type="text" id="nip" name="nip" required
                                                                value="{{ $starterPack['tanda_tangan'] == '' ? old('nip') : $starterPack['tanda_tangan']['nip'] }}"
                                                                class="bg-gray-200 border border-gray-300 @error('nip') shadow shadow-red dark:shadow-red @enderror text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 
                                                            dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                        </div>
                                                        @error('nip')
                                                            <small class="text-red-500">{{ $message }}</small>
                                                        @enderror
                                                        <div class="flex flex-row gap-5">
                                                            <p class="my-auto w-24 dark:text-white">Nama</p>
                                                            <input type="text" id="nama" name="nama" required
                                                                value="{{ $starterPack['tanda_tangan'] == '' ? old('nama') : $starterPack['tanda_tangan']['nama'] }}"
                                                                class="bg-gray-200 border border-gray-300 @error('nama') shadow shadow-red dark:shadow-red @enderror text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 
                                                            dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                        </div>
                                                        @error('nama')
                                                            <small class="text-red-500">{{ $message }}</small>
                                                        @enderror
                                                        <div class="flex flex-row gap-5">
                                                            <p class="my-auto w-24 dark:text-white">Jabatan</p>
                                                            <input type="text" id="jabatan" name="jabatan" required
                                                                value="{{ $starterPack['tanda_tangan'] == '' ? old('jabatan') : $starterPack['tanda_tangan']['jabatan'] }}"
                                                                class="bg-gray-200 border border-gray-300 @error('jabatan') shadow shadow-red dark:shadow-red @enderror text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 
                                                            dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                        </div>
                                                        @error('jabatan')
                                                            <small class="text-red-500">{{ $message }}</small>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="flex justify-end items-center pe-10">
                                                    <button type="submit"
                                                        class="inline-block bg-gray-100 rounded-lg focus:outline-none hover:bg-blue-200 hover:text-gray-900 dark:border-gray-700 dark:hover:bg-blue-300 text-sm font-medium py-1 px-3 w-auto my-3">Simpan</button>
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
