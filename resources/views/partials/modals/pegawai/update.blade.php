<div id="update{{ $item['nip'] ?? $item['nrp'] }}" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-2xl max-h-full">
        <form method="post" action="{{ route('pegawai.update', $item['nip'] ?? $item['nrp']) }}"
            enctype="multipart/form-data">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Ubah Pegawai
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="update{{ $item['nip'] ?? $item['nrp'] }}">
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
                    @csrf
                    <div class="flex flex-col mb-5">
                        <img src="{{ $item['foto_pegawai'] }}" id="foto{{ $item['nip'] ?? $item['nrp'] }}"
                            alt="new-photo"
                            class="{{ $item['foto_pegawai'] ? 'dark:shadow dark:shadow-blue-300' : '' }} mx-auto h-56 w-56 rounded-full inline-block justify-center my-3">
                        <input type="file" name="foto_pegawai" id="photo" accept="image/*"
                            class="{{ $item['foto_pegawai'] ? 'bg-blue-300 dark:bg-blue-300 dark:text-black' : 'bg-gray-50 dark:text-black' }} mx-auto text-sm block w-auto border border-gray-300 rounded-lg dark:border-gray-500"
                            onchange="update{{ $item['nip'] ?? $item['nrp'] }}(event)">
                    </div>
                    <div class="mb-3">
                        <label for="nama"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
                        <input type="text" name="nama" id="nama" value="{{ $item['nama'] }}"
                            class="{{ $item['nama'] ? 'bg-blue-300 dark:bg-blue-300 dark:text-black' : 'bg-gray-50' }} border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                    </div>
                    <div class="grid gap-6 mb-6 md:grid-cols-2">
                        <div>
                            <label for="nip"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NIP</label>
                            <input type="text" name="nip" id="nip" value="{{ $item['nip'] }}"
                                class="{{ $item['nip'] ? 'bg-blue-300 dark:bg-blue-300 dark:text-black' : 'bg-gray-50' }} border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:focus:ring-blue-500 dark:focus:border-blue-500" />
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
                        <div>
                            <label for="nrp"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NRP</label>
                            <input type="text" name="nrp" id="nrp" value="{{ $item['nrp'] }}"
                                class="{{ $item['nrp'] ? 'bg-blue-300 dark:bg-blue-300 dark:text-black' : 'bg-gray-50' }} border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                            <script>
                                function keepOnlyNumbers(input) {
                                    return input.replace(/\D/g, "");
                                }
                                var inputField1 = document.getElementById("nrp");
                                inputField1.addEventListener("input", function() {
                                    inputField1.value = keepOnlyNumbers(inputField1.value);
                                });
                            </script>
                        </div>
                        <div>
                            <label for="agama"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Agama</label>
                            <select id="agama" name="agama"
                                class="{{ $item['agama'] ? 'bg-blue-300 dark:bg-blue-300 dark:text-black' : 'bg-gray-50' }} border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option {{ $item['agama'] == 'Islam' ? 'selected' : '' }} value="Islam">Islam
                                </option>
                                <option {{ $item['agama'] == 'Kristen' ? 'selected' : '' }} value="Kristen">Kristen
                                </option>
                                <option {{ $item['agama'] == 'Katolik' ? 'selected' : '' }} value="Katolik">Katolik
                                </option>
                                <option {{ $item['agama'] == 'Budha' ? 'selected' : '' }} value="Budha">Budha
                                </option>
                                <option {{ $item['agama'] == 'Hindu' ? 'selected' : '' }} value="Hindu">Hindu
                                </option>
                                <option
                                    {{ $item['agama'] == 'Berkepercayaan kepada Tuhan Yang Maha Esa (lain-lain)' ? 'selected' : '' }}
                                    value="Berkepercayaan kepada Tuhan Yang Maha Esa (lain-lain)">Berkepercayaan kepada
                                    Tuhan Yang Maha Esa (lain-lain)
                                </option>
                                <option {{ $item['agama'] == null ? 'selected' : '' }}>Belum pilih agama
                                </option>
                            </select>
                        </div>
                        <div>
                            <label for="tgl_lahir"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal
                                Lahir</label>
                            <input type="date" name="tgl_lahir" id="tgl_lahir" value="{{ $item['tgl_lahir'] }}"
                                class="{{ $item['tgl_lahir'] ? 'bg-blue-300 dark:bg-blue-300 dark:text-black' : 'bg-gray-50' }} border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                        </div>
                        <div>
                            <label for="GOL_KD"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">GOL KD</label>
                            <input type="text" name="GOL_KD" id="GOL_KD" value="{{ $item['GOL_KD'] }}"
                                class="{{ $item['GOL_KD'] ? 'bg-blue-300 dark:bg-blue-300 dark:text-black' : 'bg-gray-50' }} border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                        </div>
                        <div>
                            <label for="jabatan"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jabatan</label>
                            <input type="text" name="jabatan" id="jabatan" value="{{ $item['jabatan'] }}"
                                class="{{ $item['jabatan'] ? 'bg-blue-300 dark:bg-blue-300 dark:text-black' : 'bg-gray-50' }} border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                        </div>
                        <div>
                            <label for="eselon"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Eselon</label>
                            <input type="text" name="eselon" id="eselon" value="{{ $item['eselon'] }}"
                                class="{{ $item['eselon'] ? 'bg-blue-300 dark:bg-blue-300 dark:text-black' : 'bg-gray-50' }} border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                        </div>
                        <div>
                            <label for="jenis Kelamin"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis
                                Kelamin</label>
                            <select id="jenis_kelamin" name="jenis_kelamin"
                                class="{{ $item['jenis_kelamin'] ? 'bg-blue-300 dark:bg-blue-300 dark:text-black' : 'bg-gray-50' }} border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option {{ $item['jenis_kelamin'] == 'L' ? 'selected' : '' }} value="L">Laki-laki
                                </option>
                                <option {{ $item['jenis_kelamin'] == 'P' ? 'selected' : '' }} value="P">Perempuan
                                </option>
                            </select>
                        </div>
                        <div>
                            <label for="golpang"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Golongan</label>
                            <input type="text" name="golpang" id="golpang" value="{{ $item['golpang'] }}"
                                class="{{ $item['golpang'] ? 'bg-blue-300 dark:bg-blue-300 dark:text-black' : 'bg-gray-50' }} border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                        </div>
                        <div>
                            <label for="nama_satker"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Satker</label>
                            <input type="text" name="nama_satker" id="nama_satker"
                                value="{{ $item['nama_satker'] }}"
                                class="{{ $item['nama_satker'] ? 'bg-blue-300 dark:bg-blue-300 dark:text-black' : 'bg-gray-50' }} border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                        </div>
                        <div>
                            <label for="status_Pegawai"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status
                                Pegawai</label>
                            <input type="text" name="status_pegawai" id="status_Pegawai"
                                value="{{ $item['status_pegawai'] }}"
                                class="{{ $item['status_pegawai'] ? 'bg-blue-300 dark:bg-blue-300 dark:text-black' : 'bg-gray-50' }} border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                        </div>
                        <div>
                            <label for="jaksa_tu"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jaksa TU</label>
                            <input type="text" name="jaksa_tu" id="jaksa_tu" value="{{ $item['jaksa_tu'] }}"
                                class="{{ $item['jaksa_tu'] ? 'bg-blue-300 dark:bg-blue-300 dark:text-black' : 'bg-gray-50' }} border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                        </div>
                    </div>
                    <div>
                        <label for="struktural_non"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Struktural</label>
                        <select id="struktural_non" name="struktural_non"
                            class="{{ $item['struktural_non'] ? 'bg-blue-300 dark:bg-blue-300 dark:text-black' : 'bg-gray-50' }} border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option {{ $item['struktural_non'] == 'STRUKTURAL' ? 'selected' : '' }}
                                value="STRUKTURAL">
                                STRUKTURAL</option>
                            <option {{ $item['struktural_non'] == 'NON' ? 'selected' : '' }} value="NON">NON
                                STRUKTURAL</option>
                        </select>
                    </div>
                </div>
                <!-- Modal footer -->
                <div
                    class="flex justify-end items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                    <button data-modal-hide="default-modal" type="submit"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Ubah</button>
                </div>
            </div>
        </form>
    </div>
</div>
<script>
    var update{{ $item['nip'] ?? $item['nrp'] }} = function(event) {
        var foto = document.getElementById("foto{{ $item['nip'] ?? $item['nrp'] }}");
        foto.src = URL.createObjectURL(event.target.files[0]);
        foto.onload = function() {
            URL.revokeObjectURL(foto.src)
        }
    };
</script>
