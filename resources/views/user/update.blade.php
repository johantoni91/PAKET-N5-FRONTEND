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
                                        <h4 class="font-medium text-lg flex-1 self-center mb-2 md:mb-0">Profil
                                            [{{ $item['users']['name'] }}]</h4>
                                    </div>
                                </div><!--end header-title-->
                                <div class="grid grid-cols-1 p-4">
                                    <div class="sm:-mx-6 lg:-mx-8">
                                        <form action="{{ route('user.update', [$item['users_id']]) }}" method="post"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="relative overflow-x-auto block w-full sm:px-6 lg:px-8">
                                                <div
                                                    class="flex flex-row lg:flex-nowrap xl:flex-nowrap flex-wrap items-center justify-evenly">
                                                    <div class="flex flex-col">
                                                        <img src="{{ $item['users']['photo'] != null ? env('API_IMG', '') . $item['users']['photo'] : 'https://placehold.co/400' }}"
                                                            id="photo{{ $item['id'] }}" alt="photos"
                                                            class="mx-auto h-56 w-56 rounded-full inline-block justify-center my-3">
                                                        <input type="file" name="photo" id="photos{{ $item['id'] }}"
                                                            accept="image/*"
                                                            class="bg-gray-50 mx-auto text-sm block w-auto border border-gray-300 rounded-lg dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                                            onchange="loadFile{{ $item['id'] }}(event)">
                                                        <script>
                                                            var loadFile{{ $item['id'] }} = function(event) {
                                                                var photo = document.getElementById("photo{{ $item['id'] }}");
                                                                photo.src = URL.createObjectURL(event.target.files[0]);
                                                                photo.onload = function() {
                                                                    URL.revokeObjectURL(photo.src)
                                                                }
                                                            };
                                                        </script>
                                                    </div>
                                                    <div
                                                        class="flex flex-col lg:ml-20 w-full justify-between p-4 leading-normal gap-3">
                                                        <div class="flex flex-row gap-5">
                                                            <label for="nip{{ $item['id'] }}"
                                                                class="my-auto w-24">NIP</label>
                                                            <input type="text" id="nip{{ $item['id'] }}"
                                                                name="nip" value="{{ $item['users']['nip'] }}"
                                                                class="bg-gray-200 border border-gray-300 shadow shadow-gray-200 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                            <script>
                                                                function keepOnlyNumbers(input) {
                                                                    return input.replace(/\D/g, "");
                                                                }
                                                                var inputField0 = document.getElementById("nip{{ $item['id'] }}");
                                                                inputField0.addEventListener("input", function() {
                                                                    inputField0.value = keepOnlyNumbers(inputField0.value);
                                                                });
                                                            </script>
                                                            @yield('error_nip')
                                                        </div>
                                                        <div class="flex flex-row gap-5">
                                                            <label for="nrp{{ $item['id'] }}"
                                                                class="my-auto w-24">NRP</label>
                                                            <input type="text" id="nrp{{ $item['id'] }}"
                                                                name="nrp" value="{{ $item['users']['nrp'] }}"
                                                                class="bg-gray-200 border border-gray-300 shadow shadow-gray-200 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                            <script>
                                                                function keepOnlyNumbers(input) {
                                                                    return input.replace(/\D/g, "");
                                                                }
                                                                var inputField8 = document.getElementById("nrp{{ $item['id'] }}");
                                                                inputField8.addEventListener("input", function() {
                                                                    inputField8.value = keepOnlyNumbers(inputField8.value);
                                                                });
                                                            </script>
                                                            @yield('error_nrp')
                                                        </div>
                                                        <div class="flex flex-row gap-5">
                                                            <label for="username{{ $item['id'] }}"
                                                                class="my-auto w-24">Username</label>
                                                            <input type="text" id="username{{ $item['id'] }}"
                                                                name="username" value="{{ $item['users']['username'] }}"
                                                                class="bg-gray-200 border border-gray-300 shadow shadow-gray-200 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                            @yield('error_username')
                                                        </div>
                                                        <div class="flex flex-row gap-5">
                                                            <label for="name{{ $item['id'] }}"
                                                                class="my-auto w-24">Name</label>
                                                            <input type="text" id="name{{ $item['id'] }}"
                                                                name="name" value="{{ $item['users']['name'] }}"
                                                                class="bg-gray-200 border border-gray-300 shadow shadow-gray-200 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

                                                            @yield('error_name')
                                                        </div>
                                                        <div class="flex flex-row gap-5">
                                                            <label for="roles{{ $item['id'] }}"
                                                                class="my-auto w-24">Pilih
                                                                roles</label>
                                                            <select id="roles{{ $item['id'] }}" name="roles" required
                                                                class="bg-gray-200 border border-gray-300 shadow shadow-gray-200 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                                <option
                                                                    {{ $item['roles'] == 'superadmin' ? 'selected' : '' }}
                                                                    value="superadmin">
                                                                    Superadmin</option>
                                                                <option {{ $item['roles'] == 'admin' ? 'selected' : '' }}
                                                                    value="admin">Admin
                                                                </option>
                                                                <option {{ $item['roles'] == 'pegawai' ? 'selected' : '' }}
                                                                    value="pegawai">
                                                                    Pegawai
                                                                </option>
                                                            </select>

                                                            @yield('error_roles')
                                                        </div>
                                                        <div class="flex flex-row gap-5">
                                                            <label for="email{{ $item['id'] }}"
                                                                class="my-auto w-24">Email</label>
                                                            <input type="email" id="email{{ $item['id'] }}"
                                                                name="email" value="{{ $item['users']['email'] }}"
                                                                class="bg-gray-200 border border-gray-300 shadow shadow-gray-200 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

                                                            @yield('error_email')
                                                        </div>
                                                        <div class="flex flex-row gap-5">
                                                            <label for="phone{{ $item['id'] }}"
                                                                class="my-auto w-24">Telepon</label>
                                                            <input type="text" id="phone{{ $item['id'] }}"
                                                                name="phone" value="{{ $item['users']['phone'] }}"
                                                                class="bg-gray-200 border border-gray-300 shadow shadow-gray-200 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                            <script>
                                                                function keepOnlyNumbers(input) {
                                                                    return input.replace(/\D/g, "");
                                                                }
                                                                var inputField11 = document.getElementById("phone{{ $item['id'] }}");
                                                                inputField11.addEventListener("input", function() {
                                                                    inputField11.value = keepOnlyNumbers(inputField11.value);
                                                                });
                                                            </script>
                                                            @yield('error_phone')
                                                        </div>
                                                        <div class="flex flex-row gap-5">
                                                            <label for="password{{ $item['id'] }}"
                                                                class="my-auto w-24">Password</label>
                                                            <input type="password" id="password{{ $item['id'] }}"
                                                                name="password"
                                                                class="bg-gray-200 border border-gray-300 shadow shadow-gray-200 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                            <div
                                                                class="absolute sm:right-[6dvw] md:right-[5.5dvw] lg:right-[5.5dvw] xl:right-[5dvw] 2xl:right-[3.5dvw] right-[5dvw] sm:bottom-[6.3dvh] md:bottom-[6.3dvh] lg:bottom-[6.3dvh] xl:bottom-[6.3dvh] 2xl:bottom-[6.3dvh]">
                                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                    viewBox="0 0 24 24" stroke-width="1.5"
                                                                    stroke="currentColor"
                                                                    class="w-8 h-8 my-auto cursor-pointer eye{{ $item['id'] }} hover:text-blue-500">
                                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                                        d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                                        d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                                                </svg>
                                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                    viewBox="0 0 24 24" stroke-width="1.5"
                                                                    stroke="currentColor"
                                                                    class="w-8 h-8 cursor-pointer my-auto eye-closed{{ $item['id'] }} hidden hover:text-blue-500">
                                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                                        d="M3.98 8.223A10.477 10.477 0 0 0 1.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.451 10.451 0 0 1 12 4.5c4.756 0 8.773 3.162 10.065 7.498a10.522 10.522 0 0 1-4.293 5.774M6.228 6.228 3 3m3.228 3.228 3.65 3.65m7.894 7.894L21 21m-3.228-3.228-3.65-3.65m0 0a3 3 0 1 0-4.243-4.243m4.242 4.242L9.88 9.88" />
                                                                </svg>
                                                            </div>
                                                            <script>
                                                                $(document).ready(function() {
                                                                    $(".eye{{ $item['id'] }}").on("click", function(event) {
                                                                        event.stopPropagation()
                                                                        $("#password{{ $item['id'] }}").attr("type", "text");
                                                                        $(".eye-closed{{ $item['id'] }}").removeClass("hidden");
                                                                        $(".eye{{ $item['id'] }}").addClass("hidden");
                                                                    });

                                                                    $(".eye-closed{{ $item['id'] }}").on("click", function(event) {
                                                                        event.stopPropagation()
                                                                        $("#password{{ $item['id'] }}").attr("type", "password");
                                                                        $(".eye{{ $item['id'] }}").removeClass("hidden");
                                                                        $(".eye-closed{{ $item['id'] }}").addClass("hidden");
                                                                    });
                                                                });
                                                            </script>
                                                            @yield('error_password')
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="flex flex-row justify-between">
                                                    <a href="{{ route('user.index') }}"
                                                        class="w-24 me-4 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Kembali</a>
                                                    <button type="submit"
                                                        class="w-24 me-4 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Simpan</button>
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
