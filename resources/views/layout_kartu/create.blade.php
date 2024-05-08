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
                                    <p class="ms-1 text-slate-600"> <a href="{{ route('layout.kartu') }}"
                                            class="text-blue-600 font-semibold">Data Kartu </a> > Buat Kartu Baru
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
                                <div class="border-b border-slate-200 dark:border-slate-700/40 dark:text-slate-300/70">
                                    <div class="flex flex-row justify-between">
                                        <h4 class="font-medium py-3 px-4 text-lg flex-1 self-center mb-2 md:mb-0">Membuat
                                            Kartu Baru</h4>
                                    </div>
                                </div>
                                <div class="grid grid-cols-1 p-4 overflow-scroll">
                                    <div class="sm:-mx-6 lg:-mx-8">
                                        <div class="relative overflow-x-auto block w-full sm:px-6 lg:px-10">
                                            <div class="p-4 md:p-5 space-y-4">
                                                <form action="{{ route('layout.kartu.store') }}" method="post"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="p-4 space-y-4">
                                                        <div class="grid gap-2 grid-cols-3">
                                                            <div class="col-span-1">
                                                                <label for="title"
                                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                                                                    Kartu</label>
                                                                <input type="text" name="title" id="title"
                                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                                    required>
                                                            </div>
                                                            <div class="col-span-1">
                                                                <label for="orientasi"
                                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Orientasi</label>
                                                                <select id="orientasi" name="orientasi" required
                                                                    class="bg-gray-50 mb-3 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                                                    <option selected value="0">Vertikal
                                                                    </option>
                                                                    <option value="1">Horizontal</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-span-1">
                                                                <label for="kategori"
                                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kategori</label>
                                                                <select id="kategori" name="kategori" required
                                                                    class="bg-gray-50 mb-3 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                                                    <option selected value="0">Kartu Acara</option>
                                                                    <option value="1">Kartu Identitas</option>
                                                                    <option value="2">Kartu Intel</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-span-1 mb-5">
                                                                <label for="profil"
                                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Foto
                                                                    profil</label>
                                                                <select id="profil" name="profil" required
                                                                    class="bg-gray-50 mb-3 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                                                    <option selected value="0">Tidak ditambahkan
                                                                    </option>
                                                                    <option value="1">ditambahkan</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-span-2 mb-5">
                                                            </div>
                                                            <div class="col-span-1 flex flex-col">
                                                                <label for="icon"
                                                                    class="block mb-2 text-sm text-start font-medium text-gray-900 dark:text-white">Ikon
                                                                    Kartu</label>
                                                                <img src="{{ asset('assets/images/kejaksaan-logo.png') }}"
                                                                    id="icon" alt="icon"
                                                                    class="h-24 w-24 rounded-lg my-3 self-center">
                                                                <input type="file" name="icon" accept="image/*"
                                                                    required
                                                                    class="bg-gray-50 text-sm block w-auto border border-gray-300 rounded-lg dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                                                    onchange="background(event)">
                                                                <script>
                                                                    var background = function(event) {
                                                                        var icon = document.getElementById("icon");
                                                                        icon.src = URL.createObjectURL(event.target.files[0]);
                                                                        icon.onload = function() {
                                                                            URL.revokeObjectURL(icon.src)
                                                                        }
                                                                    };
                                                                </script>
                                                            </div>
                                                            <div class="col-span-1 flex flex-col">
                                                                <label for="depan"
                                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Latar
                                                                    depan</label>
                                                                <img src="{{ asset('assets/images/kejaksaan-logo.png') }}"
                                                                    id="depan" alt="depan"
                                                                    class="h-24 w-24 rounded-lg self-center my-3">
                                                                <input type="file" name="depan" accept="image/*"
                                                                    required
                                                                    class="bg-gray-50 text-sm block w-auto border border-gray-300 rounded-lg dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                                                    onchange="front(event)">
                                                                <script>
                                                                    var front = function(event) {
                                                                        var depan = document.getElementById("depan");
                                                                        depan.src = URL.createObjectURL(event.target.files[0]);
                                                                        depan.onload = function() {
                                                                            URL.revokeObjectURL(depan.src)
                                                                        }
                                                                    };
                                                                </script>
                                                            </div>
                                                            <div class="col-span-1 flex flex-col">
                                                                <label for="belakang"
                                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Latar
                                                                    belakang</label>
                                                                <img src="{{ asset('assets/images/kejaksaan-logo.png') }}"
                                                                    id="belakang" alt="new-photo"
                                                                    class="h-24 w-24 rounded-lg self-center my-3">
                                                                <input type="file" name="belakang" accept="image/*"
                                                                    required
                                                                    class="bg-gray-50 text-sm block w-auto border border-gray-300 rounded-lg dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                                                    onchange="back(event)">
                                                                <script>
                                                                    var back = function(event) {
                                                                        var belakang = document.getElementById("belakang");
                                                                        belakang.src = URL.createObjectURL(event.target.files[0]);
                                                                        belakang.onload = function() {
                                                                            URL.revokeObjectURL(belakang.src)
                                                                        }
                                                                    };
                                                                </script>
                                                            </div>
                                                            <div class="col-span-3 mt-5 dark:text-white">
                                                                <p>Identitas</p>
                                                            </div>
                                                            <div class="col-span-3">
                                                                <hr>
                                                            </div>
                                                            <div class="col-span-1">
                                                                <label for="nip"
                                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NIP</label>
                                                                <select id="nip" name="nip" required
                                                                    class="bg-gray-50 mb-3 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                                                    <option selected value="0">Tidak ditambahkan
                                                                    </option>
                                                                    <option value="1">ditambahkan</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-span-1">
                                                                <label for="nrp"
                                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NRP</label>
                                                                <select id="nrp" name="nrp" required
                                                                    class="bg-gray-50 mb-3 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                                                    <option selected value="0">Tidak ditambahkan
                                                                    </option>
                                                                    <option value="1">ditambahkan</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-span-1">
                                                                <label for="nama"
                                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
                                                                <select id="nama" name="nama" required
                                                                    class="bg-gray-50 mb-3 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                                                    <option selected value="0">Tidak ditambahkan
                                                                    </option>
                                                                    <option value="1">ditambahkan</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-span-1">
                                                                <label for="golongan"
                                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Golongan</label>
                                                                <select id="golongan" name="golongan" required
                                                                    class="bg-gray-50 mb-3 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                                                    <option selected value="0">Tidak ditambahkan
                                                                    </option>
                                                                    <option value="1">ditambahkan</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-span-1">
                                                                <label for="jabatan"
                                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jabatan</label>
                                                                <select id="jabatan" name="jabatan" required
                                                                    class="bg-gray-50 mb-3 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                                                    <option selected value="0">Tidak ditambahkan
                                                                    </option>
                                                                    <option value="1">ditambahkan</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="flex justify-end gap-5 items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                                                        <button type="submit"
                                                            class="focus:outline-none bg-gradient-to-r from-violet-800 to-red-500 text-white dark:bg-gradient-to-r dark:from-zinc-500 dark:to-cyan-300 dark:text-white text-sm font-medium py-2 px-3 rounded hover:from-red-500 hover:to-violet-800 dark:hover:from-cyan-300 dark:hover:to-zinc-500">
                                                            Buat</button>
                                                    </div>
                                                </form>
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
