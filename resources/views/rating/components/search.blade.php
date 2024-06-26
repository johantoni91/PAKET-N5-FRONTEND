<div id="search" data-modal-backdrop="static" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">

        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">

            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Filter Penilaian
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
                <form class="max-w-md mx-auto" action="{{ route('rating.search') }}">
                    <div class="relative z-0 w-full mb-5 group">
                        <div class="relative mb-6">
                            <p class="dark:text-white">Penilaian</p>
                            <label for="stars" class="sr-only">Penilaian</label>
                            <input id="stars" type="range" value="{{ $input['stars'] ?? '' }}" min="1"
                                max="5" name="stars"
                                class="w-full h-2 bg-gradient-to-r from-[#F4CE14] to-[#379777] dark:bg-gradient-to-r dark:from-[#1B262C] dark:via-[#0F4C75] dark:to-[#3282B8] rounded-lg appearance-none cursor-pointer">
                            <span
                                class="text-sm text-yellow-900 drop-shadow-green dark:drop-shadow-red absolute start-0 -bottom-6">⭐️</span>
                            <span
                                class="text-sm text-yellow-900 drop-shadow-green dark:drop-shadow-red absolute start-1/4 -translate-x-1/4 -bottom-6">⭐️⭐️</span>
                            <span
                                class="text-sm text-yellow-900 drop-shadow-green dark:drop-shadow-red absolute start-2/4 -translate-x-2/4 -bottom-6">⭐️⭐️⭐️</span>
                            <span
                                class="text-sm text-yellow-900 drop-shadow-green dark:drop-shadow-red absolute start-3/4 -translate-x-3/4 -bottom-6">⭐️⭐️⭐️⭐️</span>
                            <span
                                class="text-sm text-yellow-900 drop-shadow-green dark:drop-shadow-red absolute end-0 -bottom-6">⭐️⭐️⭐️⭐️⭐️</span>
                        </div>
                    </div>
                    <div class="relative z-0 w-full mb-5 mt-10 group">
                        <input type="text" id="nama" name="name" placeholder=" "
                            value="{{ $input['name'] ?? '' }}"
                            class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" />
                        <label for="nama"
                            class="absolute text-sm text-gray-500 dark:text-white duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-700 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Nama</label>
                    </div>
                    <div class="relative z-0 w-full mb-5 group">
                        <textarea id="comment" placeholder=" " value="{{ $input['comment'] ?? '' }}"
                            class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                            name="comment">{{ $input['comment'] ?? '' }}</textarea>
                        <label for="comment"
                            class="absolute text-sm text-gray-500 dark:text-white duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-700 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Komentar</label>
                    </div>
                    <div class="relative z-0 w-full mb-5 group">
                        <input value="{{ $input['start'] ?? '' }}" type="datetime-local" name="tanggal" placeholder=" "
                            value="{{ $input['start'] ?? '' }}"
                            class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" />
                        <label for="tanggal"
                            class="absolute text-sm text-gray-500 dark:text-white duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-700 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">tanggal</label>
                    </div>
                    <div class="flex flex-row justify-end">
                        <button type="submit"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Cari</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
