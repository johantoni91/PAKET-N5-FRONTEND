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
                                        <form action="{{ route('profile.update', $profile['users_id']) }}"
                                            enctype="multipart/form-data" method="post">
                                            @csrf
                                            <div class="relative overflow-x-auto block w-full sm:px-6 lg:px-8">
                                                <div
                                                    class="flex flex-row lg:flex-nowrap xl:flex-nowrap flex-wrap items-center justify-evenly p-5">
                                                    <div class="flex flex-col">
                                                        <img src="{{ env('API_IMG', '') . $profile['users']['photo'] ?? '' }}"
                                                            id="new_photo" alt="new-photo"
                                                            class="mx-auto h-56 w-56 rounded-full inline-block justify-center my-3 shadow {{ $profile['users']['photo'] != null ? 'border-4 border-blue-300 shadow-blue-500 dark:border-white' : '' }} dark:shadow-white">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                            class="mx-auto h-56 w-56 rounded-full inline-block justify-center my-3 hidden"
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
                                                                value="{{ $profile['users']['nip'] }}"
                                                                class="{{ $profile['users']['nip'] != null ? 'bg-blue-200 border border-blue-300 shadow shadow-blue-200' : 'bg-gray-200 border border-gray-300 shadow' }} text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 
                                                            dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                        </div>
                                                        <div class="flex flex-row gap-5">
                                                            <p class="my-auto w-24 dark:text-white">NRP</p>
                                                            <input type="text" id="nrp" name="nrp"
                                                                value="{{ $profile['users']['nrp'] }}"
                                                                class="{{ $profile['users']['nrp'] != null ? 'bg-blue-200 border border-blue-300 shadow shadow-blue-200' : 'bg-gray-200 border border-gray-300 shadow' }} text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 
                                                            dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                        </div>
                                                        <div class="flex flex-row gap-5">
                                                            <p class="my-auto w-24 dark:text-white">Username</p>
                                                            <input type="text" id="username" name="username"
                                                                value="{{ $profile['users']['username'] }}" required
                                                                class="{{ $profile['users']['username'] != null ? 'bg-blue-200 border border-blue-300 shadow shadow-blue-200' : 'bg-gray-200 border border-gray-300 shadow' }} text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 
                                                            dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

                                                        </div>
                                                        <div class="flex flex-row gap-5">
                                                            <p class="my-auto w-24 dark:text-white">Name</p>
                                                            <input type="text" id="name" name="name"
                                                                value="{{ $profile['users']['name'] }}" required
                                                                class="{{ $profile['users']['name'] != null ? 'bg-blue-200 border border-blue-300 shadow shadow-blue-200' : 'bg-gray-200 border border-gray-300 shadow' }} text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 
                                                            dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

                                                        </div>
                                                        <div class="flex flex-row gap-5">
                                                            <p class="my-auto w-24 dark:text-white">Email</p>
                                                            <input type="email" id="email" name="email"
                                                                value="{{ $profile['users']['email'] }}" required
                                                                class="{{ $profile['users']['email'] != null ? 'bg-blue-200 border border-blue-300 shadow shadow-blue-200' : 'bg-gray-200 border border-gray-300 shadow' }} text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 
                                                                dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

                                                        </div>
                                                        <div class="flex flex-row gap-5">
                                                            <p class="my-auto w-24 dark:text-white">Telepon</p>
                                                            <input type="text" id="phone" name="phone"
                                                                value="{{ $profile['users']['phone'] }}"
                                                                class="{{ $profile['users']['phone'] != null ? 'bg-blue-200 border border-blue-300 shadow shadow-blue-200' : 'bg-gray-200 border border-gray-300 shadow' }} text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 
                                                                dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                        </div>
                                                        <div class="flex flex-row gap-5">
                                                            <p class="my-auto w-24 dark:text-white">Ubah password</p>
                                                            <input type="password" id="password" name="password"
                                                                class="bg-slate-200 border border-slate-300 shadow shadow-slate-200 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 
                                                                dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                            <div
                                                                class="absolute 2xl:right-20 bottom-24 max-[640px]:right-12 right-20">
                                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                    viewBox="0 0 24 24" stroke-width="1.5"
                                                                    stroke="currentColor"
                                                                    class="w-8 h-8 my-auto cursor-pointer eye hover:text-blue-500">
                                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                                        d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                                        d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                                                </svg>
                                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                    viewBox="0 0 24 24" stroke-width="1.5"
                                                                    stroke="currentColor"
                                                                    class="w-8 h-8 cursor-pointer my-auto eye-closed hidden hover:text-blue-500">
                                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                                        d="M3.98 8.223A10.477 10.477 0 0 0 1.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.451 10.451 0 0 1 12 4.5c4.756 0 8.773 3.162 10.065 7.498a10.522 10.522 0 0 1-4.293 5.774M6.228 6.228 3 3m3.228 3.228 3.65 3.65m7.894 7.894L21 21m-3.228-3.228-3.65-3.65m0 0a3 3 0 1 0-4.243-4.243m4.242 4.242L9.88 9.88" />
                                                                </svg>
                                                            </div>
                                                        </div>
                                                        <script>
                                                            $(".eye").on("click", function(e) {
                                                                $("#password").attr("type", "text");
                                                                $(".eye-closed").removeClass("hidden");
                                                                $(".eye").addClass("hidden");
                                                            });

                                                            $(".eye-closed").on("click", function(e) {
                                                                $("#password").attr("type", "password");
                                                                $(".eye").removeClass("hidden");
                                                                $(".eye-closed").addClass("hidden");
                                                            });
                                                        </script>
                                                    </div>
                                                </div>
                                                <div class="flex justify-end items-center pe-10">
                                                    <button type="submit"
                                                        class="inline-block rounded-lg focus:outline-none text-primary-500 hover:bg-blue-200 hover:text-gray-900 bg-transparent border border-blue-300 shadow shadow-blue-200 dark:bg-transparent dark:text-white dark:hover:text-white dark:border-gray-700 dark:hover:bg-blue-300 text-sm font-medium py-1 px-3 w-24 my-3">Simpan</button>
                                                </div>
                                            </div>
                                            @include('errors.profile')
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
