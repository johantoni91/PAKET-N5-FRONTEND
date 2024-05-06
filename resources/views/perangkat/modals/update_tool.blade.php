<div id="update{{ $item['id'] }}" tabindex="-1"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <button type="button"
                class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                data-modal-hide="update{{ $item['id'] }}">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
            <form class="p-4 md:p-5" action="{{ route('perangkat.tm.update', [$item['id']]) }}" method="post">
                @csrf
                <div class="grid gap-4 mb-4 grid-cols-2">
                    <div class="col-span-2">
                        <label for="perangkat"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white text-start">Nama
                            alat</label>
                        <input type="text" name="perangkat" id="perangkat" value="{{ $item['perangkat'] }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                    </div>
                    <div class="flex flex-row gap-2 items-center justify-between">
                        <div>
                            <input id="aktif" type="radio" value="1" name="status" class="w-4 h-4"
                                {{ $item['status'] == '1' ? 'checked' : '' }}>
                            <label for="aktif"
                                class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Aktif</label>
                        </div>
                        <div>
                            <input id="nonaktif" type="radio" value="0" name="status" class="w-4 h-4"
                                {{ $item['status'] == '0' ? 'checked' : '' }}>
                            <label for="nonaktif"
                                class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Nonaktif</label>
                        </div>
                    </div>
                </div>
                <div class="flex justify-end">
                    <button type="submit"
                        class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Tambah
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
