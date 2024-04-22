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
                <div class="flex justify-center {{ $item['orientation'] == '0' ? 'flex-row' : 'flex-col' }} gap-2 p-5">
                    <div style="background-position: center;
                    background-size: cover;
                    background-repeat: no-repeat;
                    background-image: url({{ $item['front'] }})"
                        class="flex flex-col justify-center gap-3 {{ $item['orientation'] == '0' ? ' w-[30dvw] h-[60dvh]' : 'h-[20dvw] w-[80dvh]' }} rounded-lg shadow p-5">
                        <div class="flex flex-row justify-center">
                            <img src="{{ $item['icon'] }}" class="w-24 h-24 rounded-full" alt="">
                        </div>
                        @if ($item['profile'] == '1')
                            <div class="flex flex-row justify-center mb-5">
                                <img src="https://placehold.co/400" draggable="true" class="w-24 h-24 rounded-full"
                                    alt="">
                            </div>
                        @endif
                        <div class="relative p-2">
                            <table class="table-responsive mx-auto p-3 text-white mix-blend-exclusion">
                                <thead>
                                    @if ($item['nip'] == '1')
                                        <tr class="text-left">
                                            <th>&nbsp; 199612022022031011</th>
                                        </tr>
                                    @endif
                                    @if ($item['nrp'] == '1')
                                        <tr class="text-left">
                                            <th>&nbsp; 123456</th>
                                        </tr>
                                    @endif
                                    @if ($item['nama'] == '1')
                                        <tr class="text-left">
                                            <th>&nbsp; Johan Toni Wijaya, S.Kom.</th>
                                        </tr>
                                    @endif
                                    @if ($item['jabatan'] == '1')
                                        <tr class="text-left">
                                            <th>&nbsp; Pengolah Data Intelijen</th>
                                        </tr>
                                    @endif
                                    @if ($item['golongan'] == '1')
                                        <tr class="text-left">
                                            <th>&nbsp; Jaksa Muda (III/A)</th>
                                        </tr>
                                    @endif
                                </thead>
                            </table>
                        </div>
                    </div>
                    <div class="flex-col justify-center gap-3 {{ $item['orientation'] == '0' ? ' w-[30dvw] h-[60dvh]' : 'h-[20dvw] w-[80dvh]' }} rounded-lg shadow"
                        style="background-position: center;
                        background-size: cover;
                        background-repeat: no-repeat;
                        background-image: url({{ $item['back'] }})">

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
