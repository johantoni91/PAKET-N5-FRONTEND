<div id="create" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-5 w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Tambah Kartu
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

            <form action="{{ route('layout.kartu.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="p-4 space-y-4">
                    <div class="grid gap-4 mb-4 grid-cols-2">
                        <div class="col-span-2 mb-3">
                            <label for="title"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Kartu</label>
                            <input type="text" name="title" id="title"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                required>
                        </div>
                        <div class="col-span-2 mb-3 sm:col-span-1">
                            <label for="profil"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Foto profil</label>
                            <select id="profil" name="profil" required
                                class="bg-gray-50 mb-3 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                <option selected value="0">Tidak ditambahkan</option>
                                <option value="1">ditambahkan</option>
                            </select>
                        </div>
                        <div class="col-span-2 mb-3 sm:col-span-1">
                            <label for="kategori"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kategori</label>
                            <select id="kategori" name="kategori" required
                                class="bg-gray-50 mb-3 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                <option selected value="0">Kartu Acara</option>
                                <option value="1">Kartu Identitas</option>
                                <option value="2">Kartu Intel</option>
                            </select>
                        </div>
                        <div class="col-span-2 mb-3 flex flex-col justify-center">
                            <label for="icon"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Icon Kartu</label>
                            <img src="https://placehold.co/400" id="icon" alt="icon"
                                class="mx-auto h-24 w-24 rounded-full inline-block justify-center my-3">
                            <input type="file" name="icon" accept="image/*"
                                class="bg-gray-50 mx-auto text-sm block w-auto border border-gray-300 rounded-lg dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                onchange="bg(event)">
                            <script>
                                var bg = function(event) {
                                    var icon = document.getElementById("icon");
                                    icon.src = URL.createObjectURL(event.target.files[0]);
                                    icon.onload = function() {
                                        URL.revokeObjectURL(icon.src)
                                    }
                                };
                            </script>
                        </div>
                        <div class="col-span-2 mb-3 sm:col-span-1 flex flex-col justify-center">
                            <label for="depan"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Background
                                (depan)</label>
                            <img src="https://placehold.co/400x800" id="depan" alt="depan"
                                class="mx-auto h-24 w-24 rounded-lg inline-block justify-center my-3">
                            <input type="file" name="depan" accept="image/*"
                                class="bg-gray-50 mx-auto text-sm block w-auto border border-gray-300 rounded-lg dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
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
                        <div class="col-span-2 mb-3 sm:col-span-1 flex flex-col justify-center">
                            <label for="belakang"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Background
                                (belakang)</label>
                            <img src="https://placehold.co/400x800" id="belakang" alt="new-photo"
                                class="mx-auto h-24 w-24 rounded-lg inline-block justify-center my-3">
                            <input type="file" name="belakang" accept="image/*"
                                class="bg-gray-50 mx-auto text-sm block w-auto border border-gray-300 rounded-lg dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
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
                        <div class="col-span-2 mb-3 sm:col-span-1">
                            <label for="nip"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NIP</label>
                            <select id="nip" name="nip" required
                                class="bg-gray-50 mb-3 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                <option selected value="0">Tidak ditambahkan</option>
                                <option value="1">ditambahkan</option>
                            </select>
                            <label for="nrp"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NRP</label>
                            <select id="nrp" name="nrp" required
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                <option selected value="0">Tidak ditambahkan</option>
                                <option value="1">ditambahkan</option>
                            </select>
                        </div>
                        <div class="col-span-2 mb-3 sm:col-span-1">
                            <label for="golongan"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Golongan</label>
                            <select id="golongan" name="golongan" required
                                class="bg-gray-50 mb-3 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">

                                <option selected value="0">Tidak ditambahkan</option>
                                <option value="1">ditambahkan</option>
                            </select>
                            <label for="jabatan"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jabatan</label>
                            <select id="jabatan" name="jabatan" required
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">

                                <option selected value="0">Tidak ditambahkan</option>
                                <option value="1">ditambahkan</option>
                            </select>
                        </div>
                        <div class="col-span-2 mb-3">
                            <label for="orientation"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Orientasi</label>
                            <select id="orientation" name="orientation" required
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">

                                <option selected value="0">Potrait (Vertikal)</option>
                                <option value="1">Landscape (Horizontal)</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div
                    class="flex justify-end items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                    <button type="submit"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>
