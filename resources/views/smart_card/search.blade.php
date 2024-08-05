<div id="search" data-modal-backdrop="static" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-4xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Cari Smart Card
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
                <form class="space-y-4" action="{{ route('smart.search') }}">
                    <div class="flex flex-row lg:flex-nowrap xl:flex-nowrap flex-wrap items-center justify-evenly">
                        <div class="flex flex-col w-full justify-between p-4 leading-normal gap-3">
                            <div class="flex flex-row gap-5">
                                <label for="nip" class="my-auto w-24 dark:text-white">NIP</label>
                                <input type="text" id="nip" inputmode="numeric" name="nip"
                                    value="{{ request('nip') ?? '' }}"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                <script>
                                    function keepOnlyNumbers(input) {
                                        return input.replace(/\D/g, "");
                                    }
                                    var inputField = document.getElementById("nip");

                                    inputField.addEventListener("input", function() {
                                        inputField.value = keepOnlyNumbers(inputField.value);
                                    });
                                </script>
                            </div>
                            <div class="flex flex-row gap-5">
                                <label for="nama" class="my-auto w-24 dark:text-white">Nama</label>
                                <input type="text" id="nama" name="nama" value="{{ request('nama') ?? '' }}"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            </div>
                            <div class="flex flex-row gap-5">
                                <label for="kartu" class="my-auto w-24 dark:text-white">Kartu</label>
                                <select id="kartu" name="kartu"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                    <option selected disabled>Semua</option>
                                    @foreach ($kartu as $item)
                                        <option value="{{ $item['title'] }}"
                                            {{ request('kartu') == $item['title'] ? 'selected' : '' }}>
                                            {{ $item['title'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="flex flex-row gap-5">
                                <label for="waktu" class="my-auto w-24 dark:text-white">Waktu Terdaftar</label>
                                <input type="datetime-local" name="waktu" id="waktu"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            </div>
                            <div class="flex flex-row gap-5">
                                <label for="pagination" class="my-auto w-24 dark:text-white">Data Per Halaman</label>
                                <select id="pagination" name="pagination"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                    <option value="5">5</option>
                                    <option value="10">10</option>
                                    <option value="25">25</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                </select>
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
