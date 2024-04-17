<section class="bg-white dark:bg-gray-900 antialiased">
    <div class="max-w-2xl mx-auto px-4">
        <div class="flex justify-between items-center">
            <h2 class="text-lg lg:text-2xl font-bold text-gray-900 dark:text-white">
                Komentar</h2>
        </div>
        @foreach ($data['data'] as $rate)
            <article class="p-6 text-base bg-white rounded-lg dark:bg-gray-900">
                <footer class="flex justify-between items-center mb-2">
                    <div class="flex items-center">
                        <p class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white font-semibold">
                            <img class="mr-2 w-6 h-6 rounded-full" src="{{ env('API_IMG_CMNT', '') . $rate['photo'] }}"
                                alt="{{ $rate['name'] }}">{{ $rate['name'] }}
                        </p>
                        <p class="text-sm text-gray-600 dark:text-gray-400">
                            <time pubdate datetime="{{ \Carbon\Carbon::parse($rate['created_at'])->format('d-m-Y') }}"
                                title="{{ \Carbon\Carbon::parse($rate['created_at'])->format('d-m-Y') }}">{{ \Carbon\Carbon::parse($rate['created_at'])->format('d F Y') }}</time>
                        </p>
                    </div>
                </footer>
                <div class="flex mb-2">
                    @include('rating.components.stars')
                </div>
                <p class="text-gray-500 dark:text-gray-400">{{ $rate['comment'] }}</p>
            </article>
            <hr>
        @endforeach
    </div>
    @include('partials.pagination')
</section>

{{-- <article class="p-6 mb-3 ml-6 lg:ml-12 text-base bg-white rounded-lg dark:bg-gray-900">
            <footer class="flex justify-between items-center mb-2">
                <div class="flex items-center">
                    <p class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white font-semibold">
                        <img class="mr-2 w-6 h-6 rounded-full"
                            src="{{ env('API_IMG', '') . $profile['profile']['users']['photo'] }}"
                            alt="Sumardi">Sumardi
                    </p>
                    <p class="text-sm text-gray-600 dark:text-gray-400">
                        <time pubdate datetime="2024-03-03" title="3 Maret 2024">3 Maret
                            2024</time>
                    </p>
                </div>

            </footer>
            <p class="text-gray-500 dark:text-gray-400">
                Dikembangkan lagi ya aplikasinya. Sudah bagus
                ini.👍🏻</p>
            <div class="flex items-center mt-4 space-x-4">
                <button type="button"
                    class="flex items-center text-sm text-gray-500 hover:underline dark:text-gray-400 font-medium">
                    <svg class="mr-1.5 w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 20 18">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5 5h5M5 8h2m6-3h2m-5 3h6m2-7H2a1 1 0 0 0-1 1v9a1 1 0 0 0 1 1h3v5l5-5h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1Z" />
                    </svg>
                    Balas
                </button>
            </div>
        </article> --}}
