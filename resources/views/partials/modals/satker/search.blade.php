<div id="search" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                    Cari Satuan Kerja
                </h3>
                <button type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-toggle="search">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <form class="p-4 md:p-5" action="{{ route('satker.search') }}" method="get">
                @csrf
                <div class="grid gap-4 mb-4 grid-cols-2">
                    <div class="col-span-2">
                        <label for="satker"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Satuan Kerja</label>
                        <input type="text" name="satker" id="satker" value="{{ $input['satker_name'] ?? '' }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <label for="phone"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Telepon</label>
                        <input type="text" name="phone" id="phone" value="{{ $input['satker_phone'] ?? '' }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="081234567890">
                    </div>
                    <script>
                        function keepOnlyNumbers(input) {
                            return input.replace(/\D/g, "");
                        }
                        var inputField = document.getElementById("phone");
                        inputField.addEventListener("input", function() {
                            inputField.value = keepOnlyNumbers(inputField.value);
                        });
                    </script>
                    <div class="col-span-2 sm:col-span-1">
                        <label for="tipe"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tipe</label>
                        <select id="tipe" name="type"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            @if (request()->routeIs('satker.search'))
                                @if (!$input['satker_type'])
                                    <option selected disabled>-- Pilih Tipe --</option>
                                    <option value="0">Kejagung</option>
                                    <option value="1">Kejati</option>
                                    <option value="2">Kejari</option>
                                    <option value="3">Cabjari</option>
                                    <option value="4">Badiklat</option>
                                @else
                                    <option {{ $input['satker_type'] == '0' ? 'selected' : '' }} value="0">Kejagung
                                    </option>
                                    <option {{ $input['satker_type'] == '1' ? 'selected' : '' }} value="1">Kejati
                                    </option>
                                    <option {{ $input['satker_type'] == '2' ? 'selected' : '' }} value="2">Kejari
                                    </option>
                                    <option {{ $input['satker_type'] == '3' ? 'selected' : '' }} value="3">Cabjari
                                    </option>
                                    <option {{ $input['satker_type'] == '4' ? 'selected' : '' }} value="4">Badiklat
                                    </option>
                                @endif
                            @else
                                <option selected disabled>-- Pilih Tipe --</option>
                                <option value="0">Kejagung</option>
                                <option value="1">Kejati</option>
                                <option value="2">Kejari</option>
                                <option value="3">Cabjari</option>
                                <option value="4">Badiklat</option>
                            @endif
                        </select>
                    </div>
                    <div class="col-span-2">
                        <label for="email"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                        <input type="email" name="email" id="email" value="{{ $input['satker_email'] ?? '' }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="test@gmail.com">
                    </div>
                    <div class="col-span-2">
                        <label for="alamat"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat</label>
                        <input type="text" id="address" name="address" value="{{ $input['satker_address'] ?? '' }}"
                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </div>
                </div>
                <div class="flex flex-row justify-end">
                    <button type="submit"
                        class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Cari
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
