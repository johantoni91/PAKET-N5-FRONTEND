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
                                        <h4 class="font-medium text-lg flex-1 self-center mb-2 md:mb-0">Profil</h4>
                                    </div>
                                </div><!--end header-title-->
                                <div class="grid grid-cols-1 p-4">
                                    <div class="sm:-mx-6 lg:-mx-8">
                                        <form action="{{ route('profile.update', $profile['profile']['users_id']) }}"
                                            enctype="multipart/form-data" method="post">
                                            @csrf
                                            <div class="overflow-x-auto block w-full sm:px-6 lg:px-8">
                                                <div class="flex flex-row profile items-center justify-evenly p-5">
                                                    <div class="flex flex-col">
                                                        <img src="{{ env('API_IMG', '') . $profile['profile']['users']['photo'] ?? '' }}"
                                                            id="new_photo" alt="new-photo"
                                                            class="mx-auto h-56 w-56 rounded-full inline-block justify-center my-3 shadow {{ $profile['profile']['users']['photo'] != null ? 'border-4 border-blue-300 shadow-blue-500 dark:border-white' : 'hidden' }} dark:shadow-white">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                            class="mx-auto h-56 w-56 rounded-full inline-block justify-center my-3 dark:text-white {{ $profile['profile']['users']['photo'] != null ? 'hidden' : '' }}"
                                                            id="avatar">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                                        </svg>
                                                        <input type="file" name="photo" id="photo" accept="image/*"
                                                            class="bg-gray-50 my-3 mx-auto text-sm block w-auto border border-gray-300 rounded-lg dark:bg-gray-700 dark:border-gray-600 shadow dark:shadow-white dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                            onchange="update(event)">
                                                        <script>
                                                            var update = function(event) {
                                                                var new_photo = document.getElementById("new_photo");
                                                                var avatar = document.getElementById("avatar");
                                                                new_photo.src = URL.createObjectURL(event.target.files[0]);
                                                                new_photo.onload = function() {
                                                                    console.log(URL.revokeObjectURL(new_photo.src))
                                                                    URL.revokeObjectURL(new_photo.src);
                                                                    new_photo.classList.remove("hidden");
                                                                    avatar.classList.add("hidden");
                                                                };
                                                            };
                                                        </script>
                                                    </div>
                                                    <div
                                                        class="flex flex-col lg:ml-20 w-full justify-between p-4 leading-normal gap-3">
                                                        <div class="flex flex-row gap-5">
                                                            <p class="my-auto w-24 dark:text-white">NIP</p>
                                                            <input type="text" id="nip" name="nip"
                                                                value="{{ $profile['profile']['users']['nip'] }}"
                                                                class="{{ $profile['profile']['users']['nip'] != null ? 'bg-blue-200 border border-blue-300 shadow shadow-blue-200' : 'bg-gray-200 border border-gray-300 shadow' }} text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 
                                                            dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                        </div>
                                                        <div class="flex flex-row gap-5">
                                                            <p class="my-auto w-24 dark:text-white">NRP</p>
                                                            <input type="text" id="nrp" name="nrp"
                                                                value="{{ $profile['profile']['users']['nrp'] }}"
                                                                class="{{ $profile['profile']['users']['nrp'] != null ? 'bg-blue-200 border border-blue-300 shadow shadow-blue-200' : 'bg-gray-200 border border-gray-300 shadow' }} text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 
                                                            dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                        </div>
                                                        <div class="flex flex-row gap-5">
                                                            <p class="my-auto w-24 dark:text-white">Username</p>
                                                            <input type="text" id="username" name="username"
                                                                value="{{ $profile['profile']['users']['username'] }}"
                                                                required
                                                                class="{{ $profile['profile']['users']['username'] != null ? 'bg-blue-200 border border-blue-300 shadow shadow-blue-200' : 'bg-gray-200 border border-gray-300 shadow' }} text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 
                                                            dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

                                                        </div>
                                                        <div class="flex flex-row gap-5">
                                                            <p class="my-auto w-24 dark:text-white">Name</p>
                                                            <input type="text" id="name" name="name"
                                                                value="{{ $profile['profile']['users']['name'] }}" required
                                                                class="{{ $profile['profile']['users']['name'] != null ? 'bg-blue-200 border border-blue-300 shadow shadow-blue-200' : 'bg-gray-200 border border-gray-300 shadow' }} text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 
                                                            dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

                                                        </div>
                                                        <div class="flex flex-row gap-5">
                                                            <p class="my-auto w-24 dark:text-white">Email</p>
                                                            <input type="email" id="email" name="email"
                                                                value="{{ $profile['profile']['users']['email'] }}"
                                                                required
                                                                class="{{ $profile['profile']['users']['email'] != null ? 'bg-blue-200 border border-blue-300 shadow shadow-blue-200' : 'bg-gray-200 border border-gray-300 shadow' }} text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 
                                                                dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

                                                        </div>
                                                        <div class="flex flex-row gap-5">
                                                            <p class="my-auto w-24 dark:text-white">Telepon</p>
                                                            <input type="text" id="phone" name="phone"
                                                                value="{{ $profile['profile']['users']['phone'] }}"
                                                                class="{{ $profile['profile']['users']['phone'] != null ? 'bg-blue-200 border border-blue-300 shadow shadow-blue-200' : 'bg-gray-200 border border-gray-300 shadow' }} text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 
                                                                dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                        </div>
                                                        <div class="flex flex-row items-center gap-5">
                                                            <p class="my-auto w-24 dark:text-white">Ubah password</p>
                                                            <input type="password" id="password" name="password"
                                                                class="bg-slate-200 border border-slate-300 shadow shadow-slate-200 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 
                                                                dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                        </div>
                                                        <div class="flex flex-row gap-2 ms-28">
                                                            <input type="checkbox" id="checkbox"
                                                                class="rounded-full shadow">
                                                            <label for="checkbox" class="dark:text-white">Lihat
                                                                password</label>
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
                                                <div class="flex justify-end items-center pe-10">
                                                    <button type="submit"
                                                        class="inline-block rounded-lg focus:outline-none text-primary-500 hover:bg-blue-200 hover:text-gray-900 bg-transparent border border-blue-300 shadow shadow-blue-200 dark:bg-transparent dark:text-white dark:hover:text-white dark:border-gray-700 dark:hover:bg-blue-300 text-sm font-medium py-1 px-3 w-24 my-3">Simpan</button>
                                                </div>
                                            </div>
                                        </form>
                                        <script>
                                            function keepOnlyNumbers(input) {
                                                return input.replace(/\D/g, "");
                                            }

                                            var inputField = document.getElementById("nip");
                                            var inputField1 = document.getElementById("phone");
                                            var inputField2 = document.getElementById("nrp");

                                            inputField.addEventListener("input", function() {
                                                inputField.value = keepOnlyNumbers(inputField.value);
                                            });
                                            inputField1.addEventListener("input", function() {
                                                inputField1.value = keepOnlyNumbers(inputField1.value);
                                            });
                                            inputField2.addEventListener("input", function() {
                                                inputField2.value = keepOnlyNumbers(inputField2.value);
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
