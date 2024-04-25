{{-- SEARCH PEGAWAI --}}
<div id="search" data-modal-backdrop="static" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-4xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Cari Pegawai
                </h3>
                <button type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-hide="search">
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
                <form class="space-y-4" action="{{ route('pegawai.search') }}" enctype="multipart/form-data">
                    <div class="flex flex-row lg:flex-nowrap xl:flex-nowrap flex-wrap items-center justify-evenly">
                        <div class="flex flex-col w-full justify-between p-4 leading-normal gap-3">
                            <div class="flex flex-row gap-5">
                                <label for="nip" class="my-auto w-24 dark:text-white">NIP</label>
                                <input type="text" id="nip" name="nip" value="{{ request('nip') ?? '' }}"
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
                                @yield('error_nip')
                            </div>
                            <div class="flex flex-row gap-5">
                                <label for="nrp" class="my-auto w-24 dark:text-white">NRP</label>
                                <input type="text" id="nrp" name="nrp" value="{{ request('nrp') ?? '' }}"
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
                                @yield('error_nrp')
                            </div>
                            <div class="flex flex-row gap-5">
                                <label for="nama" class="my-auto w-24 dark:text-white">Nama</label>
                                <input type="text" id="nama" name="nama" value="{{ request('nama') ?? '' }}"
                                    class="bg-gray-200 border border-gray-300 shadow shadow-gray-200 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            </div>
                            <div class="flex flex-row gap-5">
                                <label for="agama" class="my-auto w-24 dark:text-white">Agama</label>
                                <input type="text" id="agama" name="agama" value="{{ request('agama') ?? '' }}"
                                    class="bg-gray-200 border border-gray-300 shadow shadow-gray-200 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            </div>
                            <div class="flex flex-row gap-5">
                                <label for="jabatan" class="my-auto w-24 dark:text-white">Jabatan</label>
                                <input type="jabatan" id="jabatan" name="jabatan"
                                    value="{{ request('jabatan') ?? '' }}"
                                    class="bg-gray-200 border border-gray-300 shadow shadow-gray-200 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            </div>
                            <div class="flex flex-row gap-5">
                                <label for="jenis_kelamin" class="my-auto w-24 dark:text-white">Jenis Kelamin</label>
                                <select id="jenis_kelamin" name="jenis_kelamin"
                                    class="bg-gray-200 border border-gray-300 shadow shadow-gray-200 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    @if (!request()->routeIs('pegawai'))
                                        <option
                                            {{ request('jenis_kelamin') == '' || request('jenis_kelamin') == null ? 'selected' : '' }}
                                            disabled>-- Jenis Kelamin --</option>
                                        <option {{ request('jenis_kelamin') == 'L' ? 'selected' : '' }} value="L">
                                            Laki-laki</option>
                                        <option {{ request('jenis_kelamin') == 'P' ? 'selected' : '' }} value="P">
                                            Perempuan</option>
                                    @else
                                        <option selected disabled>-- Jenis Kelamin --</option>
                                        <option value="L">Laki-laki</option>
                                        <option value="P">Perempuan</option>
                                    @endif
                                </select>
                            </div>
                            @if ($starterPack['profile']['satker'] == '00')
                                <div class="flex flex-row gap-5">
                                    <label for="satker" class="my-auto w-24 dark:text-white">Satker</label>
                                    <input type="satker" id="satker" name="satker"
                                        value="{{ request('nama_satker') ?? '' }}"
                                        class="bg-gray-200 border border-gray-300 shadow shadow-gray-200 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                </div>
                            @endif
                            <div class="flex flex-row gap-5">
                                <label for="status" class="my-auto w-24 dark:text-white">Status Pegawai</label>
                                <input type="status" id="status" name="status"
                                    value="{{ request('status_pegawai') ?? '' }}"
                                    class="bg-gray-200 border border-gray-300 shadow shadow-gray-200 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-row justify-end">
                        <button type="submit"
                            class="w-24 me-4 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Cari</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
