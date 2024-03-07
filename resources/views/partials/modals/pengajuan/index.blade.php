<div id="pengajuan{{ $item['nip'] ?? $item['nrp'] }}" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                    Pengajuan
                </h3>
                <button type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-toggle="pengajuan{{ $item['nip'] ?? $item['nrp'] }}">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <form class="p-4 md:p-5" action="{{ route('satker.store') }}" method="post">
                @csrf
                <ul
                    class="w-48 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                    <li class="w-full border-b border-gray-200 rounded-t-lg dark:border-gray-600">
                        <div class="flex items-center ps-3">
                            <input id="kartu1" type="checkbox" value="kartu1"
                                class="rounded bg-slate-400 border-0 dark:bg-transparent dark:border dark:text-black">
                            <label for="kartu1"
                                class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Kartu
                                1</label>
                        </div>
                    </li>
                    <li class="w-full border-b border-gray-200 rounded-t-lg dark:border-gray-600">
                        <div class="flex items-center ps-3">
                            <input id="kartu2" type="checkbox" value="kartu2"
                                class="rounded bg-slate-400 border-0 dark:bg-transparent dark:border dark:text-black">
                            <label for="kartu2"
                                class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Kartu
                                2</label>
                        </div>
                    </li>
                    <li class="w-full border-b border-gray-200 rounded-t-lg dark:border-gray-600">
                        <div class="flex items-center ps-3">
                            <input id="kartu3" type="checkbox" value="kartu3"
                                class="rounded bg-slate-400 border-0 dark:bg-transparent dark:border dark:text-black">
                            <label for="kartu3"
                                class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Kartu
                                3</label>
                        </div>
                    </li>
                    <li class="w-full border-b border-gray-200 rounded-t-lg dark:border-gray-600">
                        <div class="flex items-center ps-3">
                            <input id="kartu4" type="checkbox" value="kartu4"
                                class="rounded bg-slate-400 border-0 dark:bg-transparent dark:border dark:text-black">
                            <label for="kartu4"
                                class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Kartu
                                4</label>
                        </div>
                    </li>
                </ul>
                <div class="flex flex-row justify-end py-2 mt-2 border-t-2 border-black">
                    <button type="submit"
                        class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
