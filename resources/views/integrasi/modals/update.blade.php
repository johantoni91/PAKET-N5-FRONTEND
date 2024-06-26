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
            <form class="p-4 md:p-5" action="{{ route('integrasi.update', [$item['id']]) }}" method="post">
                @csrf
                <div class="grid gap-4 mb-4 grid-cols-2 text-left mt-5">
                    <div class="col-span-2">
                        <label for="link"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tautan</label>
                        <input required type="text" name="link" id="link" value="{{ $item['url'] }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                    </div>
                    @if ($item['type'] != 'default')
                        @if ($item['type'] == 'auth')
                            <div class="col-span-2">
                                <label for="username{{ $item['id'] }}"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Username</label>
                                <input required type="text" name="username" id="username{{ $item['id'] }}"
                                    value="{{ $item['username'] }}"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            </div>
                        @elseif($item['type'] == 'token')
                            <div class="col-span-2">
                                <label for="token{{ $item['id'] }}"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Token</label>
                                <input required type="text" name="token" id="token{{ $item['id'] }}"
                                    value="{{ $item['token'] }}"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            </div>
                        @endif
                        @if ($item['type'] == 'auth')
                            <div class="col-span-2">
                                <label for="password{{ $item['id'] }}"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                                <input required type="text" name="password" id="password{{ $item['id'] }}"
                                    value="{{ $item['password'] }}"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            </div>
                        @endif
                    @endif
                </div>
                <div class="flex justify-end">
                    <button type="submit"
                        class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Ubah
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
