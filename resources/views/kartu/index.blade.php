@extends('partials.main')
@section('content')
    @include('partials.sidebar')
    @include('partials.topbar')
    <style>
        .datatable-input {
            border: 1px solid rgb(203 213 225 / .6);
            border-radius: 0.25rem;
        }
    </style>
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
                                    <div class="flex-none md:flex">
                                        <h4 class="font-medium text-lg flex-1 self-center mb-2 md:mb-0">Layout Kartu</h4>
                                    </div>
                                </div><!--end header-title-->
                                <div class="grid grid-cols-1 p-4 overflow-scroll">
                                    <div class="sm:-mx-6 lg:-mx-8">
                                        <div class="relative overflow-x-auto block w-full sm:px-6 lg:px-10">
                                            <div class="p-4 md:p-5 space-y-4">
                                                <form>
                                                    <div class="flex flex-col mb-5">
                                                        <img src="" id="new_photo" alt="new-photo"
                                                            class="mx-auto h-56 w-56 rounded-full inline-block justify-center my-3 hidden">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                            class="mx-auto h-56 w-56 rounded-full inline-block justify-center my-3 dark:text-white"
                                                            id="avatar1">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                                        </svg>
                                                        <input type="file" name="foto_pegawai" id="photo"
                                                            accept="image/*"
                                                            class="bg-gray-50 mx-auto text-sm block w-auto border border-gray-300 rounded-lg dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                                            onchange="update(event)">
                                                        <script>
                                                            var update = function(event) {
                                                                var new_photo = document.getElementById("new_photo");
                                                                var avatar1 = document.getElementById("avatar1");
                                                                new_photo.src = URL.createObjectURL(event.target.files[0]);
                                                                new_photo.onload = function() {
                                                                    URL.revokeObjectURL(new_photo.src)
                                                                    avatar1.classList.add("hidden");
                                                                    new_photo.classList.remove("hidden");
                                                                }
                                                            };
                                                        </script>
                                                    </div>
                                                    <div class="grid gap-6 mb-6 md:grid-cols-2">
                                                        <div>
                                                            <label for="nip"
                                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NIP</label>
                                                            <input type="text" id="nip"
                                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                                                        </div>
                                                        <div>
                                                            <label for="nrp"
                                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NRP</label>
                                                            <input type="text" id="nrp"
                                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                                                        </div>
                                                        <div>
                                                            <label for="agama"
                                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Agama</label>
                                                            <input type="text" id="agama"
                                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                                                        </div>
                                                        <div>
                                                            <label for="tgl_lahir"
                                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal
                                                                Lahir</label>
                                                            <input type="date" id="tgl_lahir"
                                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                                                        </div>
                                                        <div>
                                                            <label for="gol_kd"
                                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">GOL
                                                                KD</label>
                                                            <input type="tel" id="gol_kd"
                                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                                                        </div>
                                                        <div>
                                                            <label for="jabatan"
                                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jabatan</label>
                                                            <input type="url" id="jabatan"
                                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                                                        </div>
                                                        <div>
                                                            <label for="eselon"
                                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Eselon</label>
                                                            <input type="number" id="eselon"
                                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                                                        </div>
                                                        <div>
                                                            <label for="jenis Kelamin"
                                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis
                                                                Kelamin</label>
                                                            <select id="jenis_kelamin" name="jenis_kelamin" required
                                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                                <option selected disabled>-- Jenis Kelamin --</option>
                                                                <option value="L">Laki-laki</option>
                                                                <option value="P">Perempuan</option>
                                                            </select>
                                                        </div>
                                                        <div>
                                                            <label for="golongan"
                                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Golongan</label>
                                                            <input type="number" id="golongan"
                                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                                                        </div>
                                                        <div>
                                                            <label for="nama_satker"
                                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Satker</label>
                                                            <input type="url" id="nama_satker"
                                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                                                        </div>
                                                        <div>
                                                            <label for="status_Pegawai"
                                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status
                                                                Pegawai</label>
                                                            <input type="number" id="status_Pegawai"
                                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                                                        </div>
                                                        <div>
                                                            <label for="jaksa_tu"
                                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jaksa
                                                                TU</label>
                                                            <input type="url" id="jaksa_tu"
                                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <label for="struktural_non"
                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Struktural</label>
                                                        <select id="struktural_non" name="struktural_non" required
                                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                            <option selected disabled>--Struktural --</option>
                                                            <option value="STRUKTURAL">STRUKTURAL</option>
                                                            <option value="NON">NON STRUKTURAL</option>
                                                        </select>
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
