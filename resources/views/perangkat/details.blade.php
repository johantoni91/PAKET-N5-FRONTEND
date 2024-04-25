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
    <div class="relative p-4 w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-md font-semibold text-gray-900 dark:text-white">
                    Details
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
                <ol class="relative border-s border-violet-800 dark:border-cyan-300">
                    <li class="mb-8 ms-6">
                        <span
                            class="absolute flex items-center justify-center w-6 h-6 rounded-full -start-3 bg-gradient-to-b from-violet-800 to-red-500 dark:bg-gradient-to-b dark:from-zinc-500 dark:to-cyan-300 text-white dark:text-black p-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="lucide lucide-monitor">
                                <rect width="20" height="14" x="2" y="3" rx="2" />
                                <line x1="8" x2="16" y1="21" y2="21" />
                                <line x1="12" x2="12" y1="17" y2="21" />
                            </svg>
                        </span>
                        <h3
                            class="flex justify-between items-center text-lg font-semibold text-gray-900 dark:text-white">
                            Monitor <span
                                class="text-end bg-blue-100 text-blue-800 text-sm font-medium px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">S/N
                                :{{ mt_rand() }}</span>
                        </h3>
                    </li>
                    <li class="mb-10 ms-6">
                        <span
                            class="absolute flex items-center justify-center w-6 h-6 rounded-full -start-3 bg-gradient-to-b from-violet-800 to-red-500 dark:bg-gradient-to-b dark:from-zinc-500 dark:to-cyan-300 text-white dark:text-black p-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="lucide lucide-printer">
                                <polyline points="6 9 6 2 18 2 18 9" />
                                <path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2" />
                                <rect width="12" height="8" x="6" y="14" />
                            </svg>
                        </span>
                        <h3
                            class="flex justify-between items-center text-lg font-semibold text-gray-900 dark:text-white">
                            Printer <span
                                class="text-end bg-blue-100 text-blue-800 text-sm font-medium px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">S/N
                                :{{ mt_rand() }}</span>
                        </h3>
                    </li>
                    <li class="mb-10 ms-6">
                        <span
                            class="absolute flex items-center justify-center w-6 h-6 rounded-full -start-3 bg-gradient-to-b from-violet-800 to-red-500 dark:bg-gradient-to-b dark:from-zinc-500 dark:to-cyan-300 text-white dark:text-black p-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="lucide lucide-radio-receiver">
                                <path d="M5 16v2" />
                                <path d="M19 16v2" />
                                <rect width="20" height="8" x="2" y="8" rx="2" />
                                <path d="M18 12h0" />
                            </svg>
                        </span>
                        <h3
                            class="flex justify-between items-center text-lg font-semibold text-gray-900 dark:text-white">
                            Hardware 1 <span
                                class="text-end bg-blue-100 text-blue-800 text-sm font-medium px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">S/N
                                :{{ mt_rand() }}</span>
                        </h3>
                    </li>
                    <li class="pb-3 ms-6 border-violet-800 dark:border-cyan-300">
                        <span
                            class="absolute flex items-center justify-center w-6 h-6 rounded-full -start-3 bg-gradient-to-b from-violet-800 to-red-500 dark:bg-gradient-to-b dark:from-zinc-500 dark:to-cyan-300 text-white dark:text-black p-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-radio-receiver">
                                <path d="M5 16v2" />
                                <path d="M19 16v2" />
                                <rect width="20" height="8" x="2" y="8" rx="2" />
                                <path d="M18 12h0" />
                            </svg>
                        </span>
                        <h3
                            class="flex justify-between items-center text-lg font-semibold text-gray-900 dark:text-white">
                            Hardware 2 <span
                                class="text-end bg-blue-100 text-blue-800 text-sm font-medium px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">S/N
                                :{{ mt_rand() }}</span>
                        </h3>
                    </li>
                </ol>
            </div>
        </div>
    </div>
</div>
