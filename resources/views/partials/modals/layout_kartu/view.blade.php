<style>
    .bg-front {
        background-position: center;
        background-size: cover;
        background-repeat: no-repeat;
        background-image: url({{ $item['front'] }})
    }

    .bg-back {
        background-position: center;
        background-size: cover;
        background-repeat: no-repeat;
        background-image: url({{ $item['back'] }})
    }
</style>
<div id="view{{ $item['id'] }}" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-5 w-full max-w-4xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    {{ $item['title'] }}
                </h3>
                <button type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-hide="view{{ $item['id'] }}">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <div class="p-4 space-y-4">
                <div class="flex flex-row gap-5 w-full p-5">
                    <div
                        class="flex flex-col justify-center gap-3 w-[30dvw] h-[60dvh] rounded-lg shadow bg-front p-5 border-double border-2 border-red-400">
                        <div class="flex flex-row justify-center">
                            <img src="{{ $item['icon'] }}" class="w-24 h-24 rounded-full" alt="">
                        </div>
                        <div class="flex flex-row justify-center mb-5">
                            <img src="https://placehold.co/400" class="w-24 h-24 rounded-full" alt="">
                        </div>
                        <div class="p-2">
                            <table class="table-responsive mx-auto p-3 text-white mix-blend-exclusion">
                                <thead>
                                    <tr class="text-left">
                                        <th>NIP</th>
                                        <th>&nbsp; 199612022022031011</th>
                                    </tr>
                                    <tr class="text-left">
                                        <th>NRP</th>
                                        <th>&nbsp; 123456</th>
                                    </tr>
                                    <tr class="text-left">
                                        <th>NAMA</th>
                                        <th>&nbsp; Johan Toni Wijaya, S.Kom.</th>
                                    </tr>
                                    <tr class="text-left">
                                        <th>JABATAN</th>
                                        <th>&nbsp; Pengolah Data Intelijen</th>
                                    </tr>
                                    <tr class="text-left">
                                        <th>GOLONGAN</th>
                                        <th>&nbsp; Jaksa Muda (III/A)</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                    <div
                        class="flex-col justify-center gap-3 w-[30dvw] rounded-lg shadow bg-back border-2 border-double border-red-400">

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
