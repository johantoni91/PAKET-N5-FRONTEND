<div id="create" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Tambah Pegawai
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
            <div class="p-4 md:p-5 space-y-4">
                <form method="post" action="{{ route('pegawai.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="flex flex-col mb-6">
                        <img src="https://placehold.co/400x400" id="photo" alt="new-photo"
                            class="mx-auto h-56 w-56 rounded-full inline-block justify-center my-3">
                        <input type="file" name="foto_pegawai" id="photo" accept="image/*" required
                            class="bg-gray-50 mx-auto text-sm block w-auto border border-gray-300 rounded-lg dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                            onchange="newPhoto(event)">
                        <small class="text-red-500 italic text-center mt-1">Harus sertakan foto!</small>
                        <script>
                            var newPhoto = function(event) {
                                var photo = document.getElementById("photo");
                                photo.src = URL.createObjectURL(event.target.files[0]);
                                photo.onload = function() {
                                    URL.revokeObjectURL(photo.src)
                                }
                            };
                        </script>
                    </div>
                    <div class="mb-6">
                        <label for="nama"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
                        <input type="text" id="nama" name="nama"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                    </div>
                    <div class="grid gap-6 mb-6 md:grid-cols-2">
                        <div>
                            <label for="nip"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NIP</label>
                            <input type="text" id="nip" name="nip"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                        </div>
                        <div>
                            <label for="nrp"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NRP</label>
                            <input type="text" id="nrp" name="nrp"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                        </div>
                        <div>
                            <label for="agama"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Agama</label>
                            <select id="agama" name="agama" required
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option value="Budha">Buddha</option>
                                <option value="Hindu">Hindu</option>
                                <option value="Islam">Islam</option>
                                <option value="Katolik">Katolik</option>
                                <option value="Kristen">Kristen</option>
                                <option value="Kristen_Ortodox">Kristen Ortodox</option>
                                <option value="Konghucu">Konghucu</option>
                                <option value="Shinto">Shinto</option>
                                <option value="lain_lain">Sesat</option>
                            </select>
                        </div>
                        <div>
                            <label for="tgl_lahir"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal
                                Lahir</label>
                            <input type="date" id="tgl_lahir" name="tgl_lahir" max="{{ now()->format('Y-m-d') }}"
                                required
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                        </div>
                        <div>
                            <label for="GOL_KD"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">GOL KD</label>
                            <input type="text" id="GOL_KD" name="GOL_KD"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                        </div>
                        <div>
                            <label for="jabatan"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jabatan</label>
                            <input type="text" id="jabatan" name="jabatan"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                        </div>
                        <div>
                            <label for="eselon"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Eselon</label>
                            <input type="text" id="eselon" name="eselon"
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
                            <input type="text" id="golongan" name="golongan"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                        </div>
                        <div>
                            <label for="nama_satker"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                                Satker</label>
                            <select id="nama_satker" name="nama_satker" required
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option selected disabled>-- Satker --</option>
                                @foreach ($satker as $item)
                                    <option value="{{ $item['satker_name'] }}">{{ strtoupper($item['satker_name']) }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label for="status_Pegawai"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status
                                Pegawai</label>
                            <select id="status_pegawai" name="status_pegawai"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option selected value="CPNS / PNS">CPNS / PNS</option>
                                <option value="CPNS">CPNS</option>
                                <option value="PNS">PNS</option>
                            </select>
                        </div>
                        <div>
                            <label for="jaksa_tu"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jaksa TU</label>
                            <select id="jaksa_tu" name="jaksa_tu"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option selected value="Jaksa">Jaksa</option>
                                <option value="Tu">TU</option>
                            </select>
                        </div>
                    </div>
                    <div>
                        <label for="struktural_non"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Struktural</label>
                        <select id="struktural_non" name="struktural_non"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option selected disabled>--Struktural --</option>
                            <option value="STRUKTURAL">STRUKTURAL</option>
                            <option value="NON">NON STRUKTURAL</option>
                        </select>
                    </div>
            </div>
            <!-- Modal footer -->
            <div
                class="flex justify-end items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                <button data-modal-hide="default-modal" type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Simpan</button>
            </div>
            </form>
        </div>
    </div>
</div>
<script>
    function keepOnlyNumbers(input) {
        return input.replace(/\D/g, "");
    }

    var inputField = document.getElementById("nip");
    var inputField2 = document.getElementById("nrp");

    inputField.addEventListener("input", function() {
        inputField.value = keepOnlyNumbers(inputField.value);
    });
    inputField2.addEventListener("input", function() {
        inputField2.value = keepOnlyNumbers(inputField2.value);
    });
</script>
