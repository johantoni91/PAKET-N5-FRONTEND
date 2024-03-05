{{-- CREATE NEW USER --}}
<div id="create" data-modal-backdrop="static" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-4xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Tambah User
                </h3>
                <button type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-hide="create">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-4 md:p-5">
                <form class="space-y-4" action="{{ route('user.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="flex flex-row lg:flex-nowrap xl:flex-nowrap flex-wrap items-center justify-evenly">
                        <div class="flex flex-col">
                            <img src="" id="new_photo" alt="new-photo"
                                class="mx-auto h-56 w-56 rounded-full inline-block justify-center my-3 hidden">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor"
                                class="mx-auto h-56 w-56 rounded-full inline-block justify-center my-3" id="avatar1">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                            </svg>
                            <input type="file" name="photo" id="photo" accept="image/*"
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
                        <div class="flex flex-col lg:ml-20 w-full justify-between p-4 leading-normal gap-3">
                            <div class="flex flex-row gap-5">
                                <label for="nip" class="my-auto w-24">NIP</label>
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
                                <label for="nrp" class="my-auto w-24">NRP</label>
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
                            <div class="flex flex-row gap-5">
                                <label for="username" class="my-auto w-24">Username</label>
                                <input type="text" maxlength="20" id="username" name="username"
                                    value="{{ session('username') ?? old('username') }}"
                                    class="bg-gray-200 border border-gray-300 shadow shadow-gray-200 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                @yield('error_username')
                            </div>
                            <div class="flex flex-row gap-5">
                                <label class="my-auto w-24">Name</label>
                                <input type="text" id="name" name="name"
                                    value="{{ session('name') ?? old('name') }}"
                                    class="bg-gray-200 border border-gray-300 shadow shadow-gray-200 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            </div>
                            <div class="flex flex-row gap-5">
                                <label for="roles" class="my-auto w-24">Pilih roles</label>
                                <select id="roles" name="roles" required
                                    class="bg-gray-200 border border-gray-300 shadow shadow-gray-200 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option selected disabled>-- Pilih Roles --</option>
                                    <option value="superadmin">Superadmin</option>
                                    <option value="admin">Admin</option>
                                    <option value="pegawai">Pegawai</option>
                                </select>
                            </div>
                            <div class="flex flex-row gap-5">
                                <label class="my-auto w-24">Email</label>
                                <input type="email" id="email" name="email"
                                    value="{{ session('email') ?? old('email') }}"
                                    class="bg-gray-200 border border-gray-300 shadow shadow-gray-200 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            </div>
                            <div class="flex flex-row gap-5">
                                <label class="my-auto w-24">Telepon</label>
                                <input type="text" id="phone" maxlength="14" name="phone"
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
                                <label class="my-auto w-24">Password</label>
                                <input type="password" id="password" name="password"
                                    class="bg-gray-200 border border-gray-300 shadow shadow-gray-200 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                @if (old('username') || old('name') || old('email') || old('phone'))
                                    <small class="text-red-500">Mohon isi kembali</small>
                                @endif
                                <div class="absolute right-10 bottom-24">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor"
                                        class="w-8 h-8 my-auto cursor-pointer eye hover:text-blue-500">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor"
                                        class="w-8 h-8 cursor-pointer my-auto eye-closed hidden hover:text-blue-500">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M3.98 8.223A10.477 10.477 0 0 0 1.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.451 10.451 0 0 1 12 4.5c4.756 0 8.773 3.162 10.065 7.498a10.522 10.522 0 0 1-4.293 5.774M6.228 6.228 3 3m3.228 3.228 3.65 3.65m7.894 7.894L21 21m-3.228-3.228-3.65-3.65m0 0a3 3 0 1 0-4.243-4.243m4.242 4.242L9.88 9.88" />
                                    </svg>
                                </div>
                                <script>
                                    $(document).ready(function() {
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
                                    });
                                </script>
                            </div>
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
