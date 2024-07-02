<div id="search" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                    Cari Pengajuan
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
            <form class="p-4 md:p-5" action="{{ route('monitor.kartu.search') }}" method="get">
                @csrf
                <div class="grid gap-4 mb-4 grid-cols-2">
                    <div class="col-span-2">
                        <label for="nip"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NIP</label>
                        <input type="text" name="nip" id="nip" value="{{ $input['nip'] ?? '' }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                    </div>
                    <div class="col-span-2">
                        <label for="nama"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
                        <input type="text" name="nama" id="nama" value="{{ $input['nama'] ?? '' }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                    </div>
                    <div class="col-span-2">
                        <label for="status"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status</label>
                        <select id="status" name="status"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            @if (!$input)
                                <option value="">Semua</option>
                                <option value="0">ditolak</option>
                                <option value="1">Proses</option>
                                <option value="2">diterima</option>
                            @else
                                <option {{ $input['status'] ? 'selected' : '' }} value="">Semua</option>
                                <option {{ $input['status'] == '0' ? 'selected' : '' }} value="0">ditolak</option>
                                <option {{ $input['status'] == '1' ? 'selected' : '' }} value="1">Proses</option>
                                <option {{ $input['status'] == '2' ? 'selected' : '' }} value="2">diterima</option>
                            @endif
                        </select>
                    </div>
                    <div class="col-span-2">
                        <label for="alasan"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alasan</label>
                        <select id="alasan" name="alasan"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            @if (!$input)
                                <option value="">Semua</option>
                                <option value="1">Baru</option>
                                <option value="2">Ganti Satker</option>
                                <option value="3">Hilang</option>
                            @else
                                <option {{ $input['alasan'] ? 'selected' : '' }} value="">Semua</option>
                                <option {{ $input['alasan'] == '0' ? 'selected' : '' }} value="0">Rusak</option>
                                <option {{ $input['alasan'] == '1' ? 'selected' : '' }} value="1">Baru</option>
                                <option {{ $input['alasan'] == '2' ? 'selected' : '' }} value="2">Ganti Satker
                                </option>
                                <option {{ $input['alasan'] == '3' ? 'selected' : '' }} value="3">Hilang</option>
                            @endif
                        </select>
                    </div>
                    <div class="col-span-2">
                        <label for="pagination"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Data per
                            halaman</label>
                        <input type="text" name="pagination" id="pagination"
                            value="{{ $input['pagination'] ?? '' }}" placeholder="5"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
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
