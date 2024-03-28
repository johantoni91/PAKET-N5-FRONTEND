<div id="create" tabindex="-1"
    class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-7xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-medium text-gray-900 dark:text-white">
                    Tampilan Kartu yang akan dibuat
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
                <div class="p-5 w-full">
                    <div class="flex flex-row gap-1">
                        <div class="flex flex-col w-full gap-1">
                            <h2 class="text-center">Depan</h2>
                            <div class="flex flex-col p-3 w-48 justify-center">
                                <div class="flex flex-row justify-center bg-slate-50 rounded-t-lg rounded-b-lg">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-24 h-24 mb-3">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                    </svg>
                                </div>
                                <div class="flex flex-row justify-center bg-slate-50">
                                    <div class="grid grid-cols-2 mb-3">
                                        <p class="font-semibold text-start">NIP</p>
                                        <p>Sampel</p>
                                    </div>
                                </div>
                                <div class="flex flex-row justify-center bg-slate-50">
                                    <div class="grid grid-cols-2 mb-3">
                                        <p class="font-semibold">Nama</p>
                                        <p>Sampel</p>
                                    </div>
                                </div>
                                <div class="flex flex-row justify-center bg-slate-50">
                                    <div class="grid grid-cols-2 mb-3">
                                        <p class="font-semibold">Golongan</p>
                                        <p>Sampel</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <h2 class="text-center">Belakang</h2>
                        <div class="relative flex flex-col w-48 gap-1">
                            <div class="flex flex-col justify-center h-full p-3">
                                <div class="flex flex-row justify-center bg-red-700 rounded-t-lg h-1/2">
                                </div>
                                <div class="flex flex-row justify-center bg-slate-50">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                                        <path fill="#BF2D5A" fill-opacity="1"
                                            d="M0,160L26.7,181.3C53.3,203,107,245,160,245.3C213.3,245,267,203,320,160C373.3,117,427,75,480,58.7C533.3,43,587,53,640,85.3C693.3,117,747,171,800,186.7C853.3,203,907,181,960,154.7C1013.3,128,1067,96,1120,85.3C1173.3,75,1227,85,1280,128C1333.3,171,1387,245,1413,282.7L1440,320L1440,0L1413.3,0C1386.7,0,1333,0,1280,0C1226.7,0,1173,0,1120,0C1066.7,0,1013,0,960,0C906.7,0,853,0,800,0C746.7,0,693,0,640,0C586.7,0,533,0,480,0C426.7,0,373,0,320,0C266.7,0,213,0,160,0C106.7,0,53,0,27,0L0,0Z">
                                        </path>
                                    </svg>
                                </div>
                                <div class="absolute" style="top: 50%; left: 50%;">
                                    <img src="{{ asset('assets/images/kejaksaan-logo.png') }}"
                                        class="w-12 h-12 rounded-full" alt="">
                                </div>
                                <div class="flex flex-row justify-center bg-slate-50 rounded-b-lg h-1/2">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal footer -->
            <div
                class="flex items-center p-4 md:p-5 space-x-3 rtl:space-x-reverse border-t border-gray-200 rounded-b dark:border-gray-600">
                <button data-modal-hide="create" type="button"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Buat</button>
                <button data-modal-hide="create" type="button"
                    class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Kembali</button>
            </div>
        </div>
    </div>
</div>
