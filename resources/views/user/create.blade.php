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
                                    <p class="ms-1 text-slate-600"> <a href="{{ route('user') }}"
                                            class="text-blue-600 font-semibold">Data Pengguna </a> > Pengguna baru</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="xl:w-full  min-h-[calc(100vh-138px)] relative pb-14">
                <div class="xl:w-full  min-h-[calc(100vh-138px)] relative pb-14">
                    <div class="grid md:grid-cols-12 lg:grid-cols-12 xl:grid-cols-12 gap-4 mb-4">
                        <div class="sm:col-span-12  md:col-span-12 lg:col-span-12 xl:col-span-12 xl:col-start-0">
                            <div
                                class="bg-white dark:bg-gray-900 border border-slate-200 dark:border-slate-700/40  rounded-md w-full relative mb-4">
                                <div
                                    class="border-b border-slate-200 dark:border-slate-700/40 py-3 px-4 dark:text-slate-300/70">
                                    <div class="flex-none md:flex">
                                        <h4 class="font-medium text-lg flex-1 self-center mb-2 md:mb-0">Buat user baru</h4>
                                    </div>
                                </div>
                                <div class="grid grid-cols-1 p-4 overflow-scroll">
                                    <div class="sm:-mx-6 lg:-mx-8">
                                        <div class="relative overflow-x-auto block w-full sm:px-6 lg:px-8">
                                            <form class="space-y-4" action="{{ route('user.store', [$role]) }}"
                                                method="post" enctype="multipart/form-data">
                                                @csrf
                                                <div class="flex flex-row profile items-center justify-evenly">
                                                    @if ($role == 'superadmin' || $role == 'admin')
                                                        <div class="flex flex-col">
                                                            <img src="" id="new_photo" alt="new-photo"
                                                                class="mx-auto h-56 w-56 rounded-full inline-block justify-center my-3 hidden">
                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                                class="mx-auto h-56 w-56 rounded-full inline-block justify-center my-3"
                                                                id="avatar1">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                                            </svg>
                                                            <input type="file" name="photo" id="photo"
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
                                                    @endif
                                                    <div
                                                        class="flex flex-col lg:ml-20 w-full justify-between p-4 leading-normal gap-3">
                                                        <div class="flex flex-row gap-5">
                                                            <label for="nip"
                                                                class="my-auto w-24 dark:text-white">NIP</label>
                                                            <input type="text" id="nip" name="nip"
                                                                value="{{ session('nip') ?? old('nip') }}"
                                                                class="bg-gray-200 border border-gray-300 shadow shadow-gray-200 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                            <script>
                                                                function keepOnlyNumbers(input) {
                                                                    return input.replace(/\D/g, "");
                                                                }
                                                                var inputField1 = document.getElementById("nip");
                                                                inputField1.addEventListener("input", function() {
                                                                    inputField1.value = keepOnlyNumbers(inputField1.value);
                                                                });
                                                            </script>
                                                        </div>
                                                        <div class="flex flex-row gap-5">
                                                            <label for="nrp"
                                                                class="my-auto w-24 dark:text-white">NRP</label>
                                                            <input type="text" id="nrp" name="nrp"
                                                                value="{{ session('nrp') ?? old('nrp') }}"
                                                                class="bg-gray-200 border border-gray-300 shadow shadow-gray-200 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                            <script>
                                                                function keepOnlyNumbers(input) {
                                                                    return input.replace(/\D/g, "");
                                                                }
                                                                var inputField2 = document.getElementById("nrp");
                                                                inputField2.addEventListener("input", function() {
                                                                    inputField2.value = keepOnlyNumbers(inputField2.value);
                                                                });
                                                            </script>
                                                        </div>
                                                        @if ($role == 'superadmin' || $role == 'admin')
                                                            <div class="flex flex-row gap-5">
                                                                <label for="username"
                                                                    class="my-auto w-24 dark:text-white">Username</label>
                                                                <input type="text" maxlength="20" id="username"
                                                                    name="username"
                                                                    value="{{ session('username') ?? old('username') }}"
                                                                    class="bg-gray-200 border border-gray-300 shadow shadow-gray-200 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

                                                            </div>
                                                            <div class="flex flex-row gap-5">
                                                                <label class="my-auto w-24 dark:text-white">Name</label>
                                                                <input type="text" id="name" name="name"
                                                                    value="{{ session('name') ?? old('name') }}"
                                                                    class="bg-gray-200 border border-gray-300 shadow shadow-gray-200 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                            </div>
                                                        @endif
                                                        <div class="flex flex-row gap-5">
                                                            <label class="my-auto w-24 dark:text-white">Email</label>
                                                            <input type="email" id="email" name="email"
                                                                value="{{ session('email') ?? old('email') }}"
                                                                class="bg-gray-200 border border-gray-300 shadow shadow-gray-200 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                        </div>
                                                        <div class="flex flex-row gap-5">
                                                            <label class="my-auto w-24 dark:text-white">Telepon</label>
                                                            <input type="text" id="phone" maxlength="14"
                                                                name="phone"
                                                                value="{{ session('phone') ?? old('phone') }}"
                                                                class="bg-gray-200 border border-gray-300 shadow shadow-gray-200 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                            <script>
                                                                function keepOnlyNumbers(input) {
                                                                    return input.replace(/\D/g, "");
                                                                }
                                                                var inputField3 = document.getElementById("phone");
                                                                inputField3.addEventListener("input", function() {
                                                                    inputField3.value = keepOnlyNumbers(inputField3.value);
                                                                });
                                                            </script>
                                                        </div>
                                                        <div class="flex flex-row gap-5">
                                                            <label class="my-auto w-24 dark:text-white">Password</label>
                                                            <input type="password" id="password" name="password"
                                                                class="bg-gray-200 border border-gray-300 shadow shadow-gray-200 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                        </div>
                                                        <div class="flex flex-row gap-2 ms-28">
                                                            <input type="checkbox" id="checkbox"
                                                                class="rounded-full shadow">
                                                            <label for="checkbox">Lihat password</label>
                                                        </div>
                                                        <script>
                                                            $(document).ready(function() {
                                                                $("#checkbox").change(function() {
                                                                    if (this.checked) {
                                                                        $("#password").attr("type", "text")
                                                                    } else {
                                                                        $("#password").attr("type", "password")
                                                                    }
                                                                });
                                                            })
                                                        </script>
                                                    </div>
                                                </div>
                                                <div class="flex flex-row justify-end">
                                                    <button type="submit"
                                                        class="w-24 me-4 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Simpan</button>
                                                </div>
                                            </form>
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
