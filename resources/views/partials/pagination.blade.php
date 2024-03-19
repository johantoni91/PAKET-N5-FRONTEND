<nav class="flex items-center flex-column flex-wrap md:flex-row justify-between p-4" aria-label="Table navigation">
    <span
        class="text-sm font-normal text-gray-500 dark:text-gray-400 mb-4 md:mb-0 block w-full md:inline md:w-auto">Menampilkan
        <span class="font-semibold text-gray-900 dark:text-white">{{ $data['from'] }}-{{ $data['to'] }}</span>
        dari
        <span class="font-semibold text-gray-900 dark:text-white">{{ $data['total'] }}</span>
        data</span>
    @if (reset($data['links'])['url'] != null || end($data['links'])['url'] != null)
        <ul class="inline-flex -space-x-px rtl:space-x-reverse text-sm h-8">
            @if ($data['prev_page_url'])
                <li>
                    <a href="{{ route('pagination', [$view, encrypt($data['first_page_url']), $title]) }}"
                        class="flex items-center justify-center px-3 h-8 ms-0 leading-tight text-gray-500 bg-white border border-gray-300 rounded-s-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                        << </a>
                </li>
                <li>
                    <a href="{{ route('pagination', [$view, encrypt($data['prev_page_url']), $title]) }}"
                        class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                        < </a>
                </li>
            @endif
            <li
                class="flex items-center justify-center px-3 h-8 text-blue-600 border border-gray-300 bg-blue-50 hover:bg-blue-100 hover:text-blue-700 dark:border-gray-700 dark:bg-gray-700 dark:text-white">
                {{ $data['current_page'] }}
            </li>
            @if ($data['next_page_url'])
                <li>
                    <a href="{{ route('pagination', [$view, encrypt($data['next_page_url']), $title]) }}"
                        class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                        > </a>
                </li>
                <li>
                    <a href="{{ route('pagination', [$view, encrypt($data['last_page_url']), $title]) }}"
                        class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 rounded-e-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                        >> </a>
                </li>
            @endif
        </ul>
    @endif
</nav>
