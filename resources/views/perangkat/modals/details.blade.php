<button type="button" data-modal-target="progress{{ $item['id'] }}" data-modal-toggle="progress{{ $item['id'] }}"
    class="text-black dark:text-white drop-shadow-black dark:drop-shadow-white">
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
        class="lucide lucide-ellipsis cursor-hover">
        <circle cx="12" cy="12" r="1" />
        <circle cx="19" cy="12" r="1" />
        <circle cx="5" cy="12" r="1" />
    </svg></button>

<div id="progress{{ $item['id'] }}" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-md font-semibold text-gray-900 dark:text-white">
                    Rincian
                </h3>
                <button type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-hide="progress{{ $item['id'] }}">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="py-4 px-10">
                <ul class="max-w-md divide-y divide-gray-200 dark:divide-gray-700">
                    @if (Illuminate\Support\Facades\Http::withToken(session('data')['token'])->get(env('API_URL', '') . '/perangkat' . '/' . $item['satker'] . '/find/tools/tc_hardware')->json()['data'] == [])
                        <li class="py-3 sm:py-4">
                            <div class="flex text-start items-center space-x-4 rtl:space-x-reverse">
                                <div class="flex-1 min-w-0">
                                    <p class="text-sm text-center font-medium text-gray-900 truncate dark:text-white">
                                        Belum ada alat yang ditambahkan
                                    </p>
                                </div>
                            </div>
                        </li>
                    @else
                        @foreach (Illuminate\Support\Facades\Http::withToken(session('data')['token'])->get(env('API_URL', '') . '/perangkat' . '/' . $item['satker'] . '/find/tools/tc_hardware')->json()['data'] as $alat)
                            <li class="py-3 sm:py-4">
                                <div class="flex text-start items-center space-x-4 rtl:space-x-reverse">
                                    <div class="flex-shrink-0">
                                        <img class="w-20 h-20 rounded-lg"
                                            src="{{ $alat['photo'] ?? 'https://placehold.co/600x400' }}"
                                            alt="{{ Illuminate\Support\Str::slug($alat['photo']) }}">
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                            {{ Illuminate\Support\Facades\Http::withToken(session('data')['token'])->get(env('API_URL', '') . '/perangkat' . '/' . $alat['id_perangkat'] . '/find/tm_hardware')->json()['data']['perangkat'] }}
                                        </p>
                                        <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                            SN : {{ $alat['serial_number'] }}
                                        </p>
                                    </div>
                                    {{-- <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                            $3467
                        </div> --}}
                                </div>
                            </li>
                        @endforeach
                    @endif
                </ul>

            </div>
        </div>
    </div>
</div>
