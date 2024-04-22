<section class="bg-white dark:bg-gray-900 antialiased">
    <div class="max-w-2xl mx-auto px-4">
        <div class="flex justify-between items-center">
            <h2 class="text-lg lg:text-2xl font-bold text-gray-900 dark:text-white">
                Komentar</h2>
        </div>
        @if (!$data['data'])
            <p class="text-center dark:text-white">--Belum ada komentar--</p>
        @else
            @foreach ($data['data'] as $rate)
                <article class="p-6 text-base bg-white rounded-lg dark:bg-gray-900">
                    <footer class="flex justify-between items-center mb-2">
                        <div class="flex items-center">
                            <p class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white font-semibold">
                                <img class="mr-2 w-6 h-6 rounded-full"
                                    src="{{ env('API_IMG_CMNT', '') . $rate['photo'] }}"
                                    alt="{{ $rate['name'] }}">{{ $rate['name'] }}
                            </p>
                            <p class="text-sm text-gray-600 dark:text-gray-400">
                                <time pubdate
                                    datetime="{{ \Carbon\Carbon::parse($rate['created_at'])->format('d-m-Y') }}"
                                    title="{{ \Carbon\Carbon::parse($rate['created_at'])->format('d-m-Y') }}">{{ \Carbon\Carbon::parse($rate['created_at'])->format('d F Y') }}</time>
                            </p>
                        </div>
                    </footer>
                    <div class="flex mb-2">
                        @if ($rate['stars'] == '0')
                            @for ($i = 0; $i <= 4; $i++)
                                <svg class="w-4 h-4 text-gray-400 me-1" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                    <path
                                        d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                </svg>
                            @endfor
                        @else
                            <svg class="w-4 h-4 {{ intval($rate['stars']) > 0 ? 'text-yellow-500' : 'text-gray-400' }} me-1"
                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                viewBox="0 0 22 20">
                                <path
                                    d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                            </svg>
                            <svg class="w-4 h-4 {{ intval($rate['stars']) > 1 ? 'text-yellow-500' : 'text-gray-400' }} me-1"
                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                viewBox="0 0 22 20">
                                <path
                                    d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                            </svg>
                            <svg class="w-4 h-4 {{ intval($rate['stars']) > 2 ? 'text-yellow-500' : 'text-gray-400' }} me-1"
                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                viewBox="0 0 22 20">
                                <path
                                    d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                            </svg>
                            <svg class="w-4 h-4 {{ intval($rate['stars']) > 3 ? 'text-yellow-500' : 'text-gray-400' }} me-1"
                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                viewBox="0 0 22 20">
                                <path
                                    d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                            </svg>
                            <svg class="w-4 h-4 {{ intval($rate['stars']) > 4 ? 'text-yellow-500' : 'text-gray-400' }} me-1"
                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                viewBox="0 0 22 20">
                                <path
                                    d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                            </svg>
                        @endif
                    </div>
                    <p class="text-gray-500 dark:text-gray-400">{{ $rate['comment'] }}</p>
                </article>
                <hr>
            @endforeach
            @include('partials.pagination')
        @endif
    </div>
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
