<button type="button" data-modal-target="progress{{ $item['id'] }}" data-modal-toggle="progress{{ $item['id'] }}"
    class="text-black hover:cursor-pointer dark:text-white drop-shadow-black dark:drop-shadow-white">
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
        class="lucide lucide-ellipsis cursor-hover">
        <circle cx="12" cy="12" r="1" />
        <circle cx="19" cy="12" r="1" />
        <circle cx="5" cy="12" r="1" />
    </svg></button>

<div id="progress{{ $item['id'] }}" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-lg max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-md font-semibold text-gray-900 dark:text-white">
                    {{ $item['nama'] }}
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
            <div class="p-4">
                <ol class="relative border-s border-violet-800 dark:border-cyan-300">
                    <li class="mb-8 ms-6">
                        <span
                            class="absolute flex items-center justify-center w-6 h-6 rounded-full -start-3 bg-gradient-to-b from-violet-800 to-red-500 dark:bg-gradient-to-b dark:from-zinc-500 dark:to-cyan-300 text-white dark:text-black p-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="lucide lucide-pencil-line">
                                <path d="M12 20h9" />
                                <path d="M16.5 3.5a2.12 2.12 0 0 1 3 3L7 19l-4 1 1-4Z" />
                                <path d="m15 5 3 3" />
                            </svg>
                        </span>
                        <h3 class="flex items-center text-lg font-semibold text-gray-900 dark:text-white">Melakukan
                            pengajuan<span
                                class="bg-blue-100 text-blue-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300 ms-3">{{ date('d M Y h:i:s', strtotime($item['created_at'])) }}</span>
                        </h3>
                    </li>
                    @if ($item['status'] == '0')
                        <li class="mb-10 ms-6">
                            <span
                                class="absolute flex items-center justify-center w-6 h-6 rounded-full -start-3 bg-red-500 p-1">
                                <p class="text-white">X</p>
                                </p>
                            </span>
                            <h3 class="flex items-center mb-1 text-lg font-semibold text-gray-900 dark:text-white">
                                Ditolak<span
                                    class="bg-blue-100 text-blue-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300 ms-3">{{ date('d M Y h:i:s', strtotime($item['updated_at'])) }}</span>
                            </h3>
                        </li>
                    @else
                        @if ($item['status'] == '1' && $item['approve_satker'] == '3')
                            <li class="mb-10 ms-6">
                                <span
                                    class="absolute flex items-center justify-center w-6 h-6 rounded-full -start-3 bg-gradient-to-b from-violet-800 to-red-500 dark:bg-gradient-to-b dark:from-zinc-500 dark:to-cyan-300 text-white dark:text-black p-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-clock">
                                        <circle cx="12" cy="12" r="10" />
                                        <polyline points="12 6 12 12 16 14" />
                                    </svg>
                                </span>
                                <h3
                                    class="flex flex-col justify-start text-start text-lg font-semibold text-gray-900 dark:text-white">
                                    Menunggu persetujuan dari
                                    {{ Illuminate\Support\Facades\Http::withToken(App\Helpers\profile::getToken())->get(env('API_URL', '') . '/satker' . '/' . substr($item['kode_satker'], 0, 4) . '/code')->json()['data']['satker_name'] }}
                                </h3>
                            </li>
                        @elseif ($item['status'] == '1' && $item['approve_satker'] == '2')
                            <li class="mb-5 ms-6">
                                <span
                                    class="absolute flex items-center justify-center w-6 h-6 rounded-full -start-3 bg-gradient-to-b from-violet-800 to-red-500 dark:bg-gradient-to-b dark:from-zinc-500 dark:to-cyan-300 text-white dark:text-black p-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="lucide lucide-check-check">
                                        <path d="M18 6 7 17l-5-5" />
                                        <path d="m22 10-7.5 7.5L13 16" />
                                    </svg>
                                </span>
                                <h3
                                    class="flex flex-col justify-start text-start text-lg font-semibold text-gray-900 dark:text-white">
                                    {{ Illuminate\Support\Facades\Http::withToken(App\Helpers\profile::getToken())->get(env('API_URL', '') . '/satker' . '/' . substr($item['kode_satker'], 0, 4) . '/code')->json()['data']['satker_name'] }}
                                    setuju
                                    <span
                                        class="bg-blue-100 text-blue-800 text-sm font-medium px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300 w-40">{{ date('d M Y h:i:s', strtotime($item['updated_at'])) }}</span>
                                </h3>
                            </li>
                            <li class="mb-10 ms-6">
                                <span
                                    class="absolute flex items-center justify-center w-6 h-6 rounded-full -start-3 bg-gradient-to-b from-violet-800 to-red-500 dark:bg-gradient-to-b dark:from-zinc-500 dark:to-cyan-300 text-white dark:text-black p-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-clock">
                                        <circle cx="12" cy="12" r="10" />
                                        <polyline points="12 6 12 12 16 14" />
                                    </svg>
                                </span>
                                <h3
                                    class="flex flex-col justify-start text-start text-lg font-semibold text-gray-900 dark:text-white">
                                    Menunggu persetujuan dari
                                    {{ Illuminate\Support\Facades\Http::withToken(App\Helpers\profile::getToken())->get(env('API_URL', '') . '/satker' . '/' . substr($item['kode_satker'], 0, 2) . '/code')->json()['data']['satker_name'] }}
                                </h3>
                            </li>
                        @elseif ($item['status'] == '2')
                            <li class="mb-10 ms-6">
                                <span
                                    class="absolute flex items-center justify-center w-6 h-6 rounded-full -start-3 bg-gradient-to-b from-violet-800 to-red-500 dark:bg-gradient-to-b dark:from-zinc-500 dark:to-cyan-300 text-white dark:text-black p-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="lucide lucide-check-check">
                                        <path d="M18 6 7 17l-5-5" />
                                        <path d="m22 10-7.5 7.5L13 16" />
                                    </svg>
                                </span>
                                <h3
                                    class="flex flex-col justify-start text-start text-lg font-semibold text-gray-900 dark:text-white">
                                    {{ Illuminate\Support\Facades\Http::withToken(App\Helpers\profile::getToken())->get(env('API_URL', '') . '/satker' . '/' . substr($item['kode_satker'], 0, 4) . '/code')->json()['data']['satker_name'] }}
                                    setuju
                                    <span
                                        class="bg-blue-100 text-blue-800 text-sm font-medium px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300 w-40">{{ date('d M Y h:i:s', strtotime($item['updated_at'])) }}</span>
                                </h3>
                            </li>
                            <li class="mb-10 ms-6">
                                <span
                                    class="absolute flex items-center justify-center w-6 h-6 rounded-full -start-3 bg-gradient-to-b from-violet-800 to-red-500 dark:bg-gradient-to-b dark:from-zinc-500 dark:to-cyan-300 text-white dark:text-black p-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="lucide lucide-check-check">
                                        <path d="M18 6 7 17l-5-5" />
                                        <path d="m22 10-7.5 7.5L13 16" />
                                    </svg>
                                </span>
                                <h3
                                    class="flex flex-col justify-start text-start text-lg font-semibold text-gray-900 dark:text-white">
                                    {{ Illuminate\Support\Facades\Http::withToken(App\Helpers\profile::getToken())->get(env('API_URL', '') . '/satker' . '/' . substr($item['kode_satker'], 0, 2) . '/code')->json()['data']['satker_name'] }}
                                    setuju
                                    <span
                                        class="bg-blue-100 text-blue-800 text-sm font-medium px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300 w-40">{{ date('d M Y h:i:s', strtotime($item['updated_at'])) }}</span>
                                </h3>
                            </li>
                            <li class="ms-6">
                                <span
                                    class="absolute flex items-center justify-center w-6 h-6 rounded-full -start-3 bg-gradient-to-b from-violet-800 to-red-500 dark:bg-gradient-to-b dark:from-zinc-500 dark:to-cyan-300 text-white dark:text-black p-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-clock">
                                        <circle cx="12" cy="12" r="10" />
                                        <polyline points="12 6 12 12 16 14" />
                                    </svg>
                                </span>
                                <h3
                                    class="flex flex-col justify-start text-start text-lg font-semibold text-gray-900 dark:text-white">
                                    Menunggu persetujuan dari
                                    {{ Illuminate\Support\Facades\Http::withToken(App\Helpers\profile::getToken())->get(env('API_URL', '') . '/satker/00/code')->json()['data']['satker_name'] }}
                                </h3>
                            </li>
                        @elseif ($item['status'] == '3')
                            <li class="mb-10 ms-6">
                                <span
                                    class="absolute flex items-center justify-center w-6 h-6 rounded-full -start-3 bg-gradient-to-b from-violet-800 to-red-500 dark:bg-gradient-to-b dark:from-zinc-500 dark:to-cyan-300 text-white dark:text-black p-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="lucide lucide-check-check">
                                        <path d="M18 6 7 17l-5-5" />
                                        <path d="m22 10-7.5 7.5L13 16" />
                                    </svg>
                                </span>
                                <h3
                                    class="flex flex-col justify-start text-start text-lg font-semibold text-gray-900 dark:text-white">
                                    {{ Illuminate\Support\Facades\Http::withToken(App\Helpers\profile::getToken())->get(env('API_URL', '') . '/satker' . '/' . substr($item['kode_satker'], 0, 4) . '/code')->json()['data']['satker_name'] }}
                                    setuju
                                    <span
                                        class="bg-blue-100 text-blue-800 text-sm font-medium px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300 w-40">{{ date('d M Y h:i:s', strtotime($item['updated_at'])) }}</span>
                                </h3>
                            </li>
                            <li class="mb-10 ms-6">
                                <span
                                    class="absolute flex items-center justify-center w-6 h-6 rounded-full -start-3 bg-gradient-to-b from-violet-800 to-red-500 dark:bg-gradient-to-b dark:from-zinc-500 dark:to-cyan-300 text-white dark:text-black p-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="lucide lucide-check-check">
                                        <path d="M18 6 7 17l-5-5" />
                                        <path d="m22 10-7.5 7.5L13 16" />
                                    </svg>
                                </span>
                                <h3
                                    class="flex flex-col justify-start text-start text-lg font-semibold text-gray-900 dark:text-white">
                                    {{ Illuminate\Support\Facades\Http::withToken(App\Helpers\profile::getToken())->get(env('API_URL', '') . '/satker' . '/' . substr($item['kode_satker'], 0, 2) . '/code')->json()['data']['satker_name'] }}
                                    setuju
                                    <span
                                        class="bg-blue-100 text-blue-800 text-sm font-medium px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300 w-40">{{ date('d M Y h:i:s', strtotime($item['updated_at'])) }}</span>
                                </h3>
                            </li>
                            <li class="pb-3 ms-6 border-b border-violet-800 dark:border-cyan-300">
                                <span
                                    class="absolute flex items-center justify-center w-6 h-6 rounded-full -start-3 bg-gradient-to-b from-violet-800 to-red-500 dark:bg-gradient-to-b dark:from-zinc-500 dark:to-cyan-300 text-white dark:text-black p-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="lucide lucide-check-check">
                                        <path d="M18 6 7 17l-5-5" />
                                        <path d="m22 10-7.5 7.5L13 16" />
                                    </svg>
                                </span>
                                <h3
                                    class="flex flex-col justify-start text-start text-lg font-semibold text-gray-900 dark:text-white">
                                    {{ Illuminate\Support\Facades\Http::withToken(App\Helpers\profile::getToken())->get(env('API_URL', '') . '/satker/00/code')->json()['data']['satker_name'] }}
                                    setuju
                                    <div class="flex flex-row gap-2">
                                        <span
                                            class="bg-blue-100 text-blue-800 text-sm font-medium px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300 w-40">{{ date('d M Y h:i:s', strtotime($item['updated_at'])) }}</span>
                                        <span
                                            class="bg-green-100 text-green-800 text-sm font-medium px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">Token
                                            : {{ $item['token'] }}</span>
                                    </div>
                                </h3>
                            </li>
                        @endif
                    @endif
                </ol>
            </div>
        </div>
    </div>
</div>
