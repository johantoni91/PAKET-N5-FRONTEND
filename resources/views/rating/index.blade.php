@extends('partials.main')
@section('content')
    @include('partials.sidebar')
    @include('partials.topbar')
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.2/dist/chart.umd.min.js"></script>
    <div class="ltr:flex flex-1 rtl:flex-row-reverse">
        <div class="page-wrapper relative ltr:ml-auto rtl:mr-auto rtl:ml-0 w-[calc(100%-260px)] px-4 pt-[64px] duration-300">
            <div class="xl:w-full">
                <div class="flex flex-wrap">
                    <div class="flex items-center py-4 w-full">
                        <div class="w-full">
                            <div class="flex flex-wrap justify-between">
                                <div class="items-center ">
                                    <h1 class="font-medium text-3xl block dark:text-slate-100">Rating Aplikasi</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="xl:w-full  min-h-[calc(100vh-138px)] relative pb-14">
                    <div class="xl:w-full  min-h-[calc(100vh-138px)] relative pb-14">
                        <div class="grid md:grid-cols-12 lg:grid-cols-12 xl:grid-cols-12 gap-4 mb-4">

                            <div class="sm:col-span-12  md:col-span-12 lg:col-span-12 xl:col-span-12 xl:col-start-0 ">
                                <div
                                    class="bg-white dark:bg-gray-900 border border-slate-200 dark:border-slate-700/40  rounded-md w-full relative mb-4">
                                    <div
                                        class="border-b border-slate-200 dark:border-slate-700/40 py-3 px-5 dark:text-slate-300/70">
                                        <div class="flex-none md:flex">
                                            <h4 class="font-medium text-lg flex-1 self-center mb-2 md:mb-0">
                                                Penilaian
                                            </h4>
                                        </div>
                                    </div>
                                    <div class="grid grid-cols-2 p-4">
                                        <div class="sm:-mx-6 lg:-mx-8 flex flex-col">
                                            <div class="relative block w-full sm:px-6 lg:px-8">
                                                <div class="flex justify-between items-center p-4">
                                                    <h2 class="text-lg lg:text-2xl font-bold text-gray-900 dark:text-white">
                                                        Rating</h2>
                                                </div>
                                                <div class="relative sm:rounded-lg p-5">
                                                    <div class="flex items-center mb-2">
                                                        <svg class="w-4 h-4 text-yellow-300 me-1" aria-hidden="true"
                                                            xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                            viewBox="0 0 22 20">
                                                            <path
                                                                d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                                        </svg>
                                                        <svg class="w-4 h-4 text-yellow-300 me-1" aria-hidden="true"
                                                            xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                            viewBox="0 0 22 20">
                                                            <path
                                                                d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                                        </svg>
                                                        <svg class="w-4 h-4 text-yellow-300 me-1" aria-hidden="true"
                                                            xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                            viewBox="0 0 22 20">
                                                            <path
                                                                d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                                        </svg>
                                                        <svg class="w-4 h-4 text-yellow-300 me-1" aria-hidden="true"
                                                            xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                            viewBox="0 0 22 20">
                                                            <path
                                                                d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                                        </svg>
                                                        <svg class="w-4 h-4 text-gray-300 me-1 dark:text-gray-500"
                                                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                            fill="currentColor" viewBox="0 0 22 20">
                                                            <path
                                                                d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                                        </svg>
                                                        <p
                                                            class="ms-1 text-sm font-medium text-gray-500 dark:text-gray-400">
                                                            4.95</p>
                                                        <p
                                                            class="ms-1 text-sm font-medium text-gray-500 dark:text-gray-400">
                                                            out of</p>
                                                        <p
                                                            class="ms-1 text-sm font-medium text-gray-500 dark:text-gray-400">
                                                            5</p>
                                                    </div>
                                                    <p class="text-sm font-medium text-gray-500 dark:text-gray-400">1,745
                                                        global ratings</p>
                                                    <div class="flex items-center mt-4">
                                                        <a href="#"
                                                            class="text-sm font-medium text-blue-600 dark:text-blue-500 hover:underline">5
                                                            star</a>
                                                        <div class="w-2/4 h-5 mx-4 bg-gray-200 rounded dark:bg-gray-700">
                                                            <div class="h-5 bg-yellow-300 rounded" style="width: 70%"></div>
                                                        </div>
                                                        <span
                                                            class="text-sm font-medium text-gray-500 dark:text-gray-400">70%</span>
                                                    </div>
                                                    <div class="flex items-center mt-4">
                                                        <a href="#"
                                                            class="text-sm font-medium text-blue-600 dark:text-blue-500 hover:underline">4
                                                            star</a>
                                                        <div class="w-2/4 h-5 mx-4 bg-gray-200 rounded dark:bg-gray-700">
                                                            <div class="h-5 bg-yellow-300 rounded" style="width: 17%"></div>
                                                        </div>
                                                        <span
                                                            class="text-sm font-medium text-gray-500 dark:text-gray-400">17%</span>
                                                    </div>
                                                    <div class="flex items-center mt-4">
                                                        <a href="#"
                                                            class="text-sm font-medium text-blue-600 dark:text-blue-500 hover:underline">3
                                                            star</a>
                                                        <div class="w-2/4 h-5 mx-4 bg-gray-200 rounded dark:bg-gray-700">
                                                            <div class="h-5 bg-yellow-300 rounded" style="width: 8%"></div>
                                                        </div>
                                                        <span
                                                            class="text-sm font-medium text-gray-500 dark:text-gray-400">8%</span>
                                                    </div>
                                                    <div class="flex items-center mt-4">
                                                        <a href="#"
                                                            class="text-sm font-medium text-blue-600 dark:text-blue-500 hover:underline">2
                                                            star</a>
                                                        <div class="w-2/4 h-5 mx-4 bg-gray-200 rounded dark:bg-gray-700">
                                                            <div class="h-5 bg-yellow-300 rounded" style="width: 4%"></div>
                                                        </div>
                                                        <span
                                                            class="text-sm font-medium text-gray-500 dark:text-gray-400">4%</span>
                                                    </div>
                                                    <div class="flex items-center mt-4">
                                                        <a href="#"
                                                            class="text-sm font-medium text-blue-600 dark:text-blue-500 hover:underline">1
                                                            star</a>
                                                        <div class="w-2/4 h-5 mx-4 bg-gray-200 rounded dark:bg-gray-700">
                                                            <div class="h-5 bg-yellow-300 rounded" style="width: 1%"></div>
                                                        </div>
                                                        <span
                                                            class="text-sm font-medium text-gray-500 dark:text-gray-400">1%</span>
                                                    </div>
                                                </div>
                                                <div>
                                                    <div class="flex justify-center items-center p-4">
                                                        <h2
                                                            class="text-lg lg:text-2xl font-bold text-gray-900 dark:text-white">
                                                            Grafik Penilaian</h2>
                                                    </div>
                                                    <canvas id="myChart" class="pe-6"></canvas>
                                                    <script>
                                                        const ctx = document.getElementById('myChart');

                                                        new Chart(ctx, {
                                                            type: 'line',
                                                            data: {
                                                                labels: ['1', '2', '3', '4', '5'],
                                                                datasets: [{
                                                                    label: 'Rating',
                                                                    data: [17, 70, 140, 297, 1221],
                                                                    borderWidth: 2,
                                                                }]
                                                            },
                                                            options: {
                                                                scales: {
                                                                    y: {
                                                                        beginAtZero: false
                                                                    }
                                                                }
                                                            }
                                                        });
                                                    </script>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="sm:-mx-6 lg:-mx-8">
                                            <div class="relative block w-full sm:px-6 lg:px-8">
                                                <div class="relative sm:rounded-lg">
                                                    <div class="flex items-center">
                                                        <section class="bg-white dark:bg-gray-900 antialiased">
                                                            <div class="max-w-2xl mx-auto px-4">
                                                                <div class="flex justify-between items-center">
                                                                    <h2
                                                                        class="text-lg lg:text-2xl font-bold text-gray-900 dark:text-white">
                                                                        Komentar</h2>
                                                                </div>
                                                                <article
                                                                    class="p-6 text-base bg-white rounded-lg dark:bg-gray-900">
                                                                    <footer class="flex justify-between items-center mb-2">
                                                                        <div class="flex items-center">
                                                                            <p
                                                                                class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white font-semibold">
                                                                                <img class="mr-2 w-6 h-6 rounded-full"
                                                                                    src="{{ env('API_IMG', '') . '101322984.jpeg' }}"
                                                                                    alt="johan-toni">Johan Toni
                                                                            </p>
                                                                            <p
                                                                                class="text-sm text-gray-600 dark:text-gray-400">
                                                                                <time pubdate datetime="2024-03-03"
                                                                                    title="3 Maret 2024">3 Maret
                                                                                    2024</time>
                                                                            </p>
                                                                        </div>
                                                                    </footer>
                                                                    <p class="text-gray-500 dark:text-gray-400">Keren dah
                                                                        aplikasinya</p>
                                                                    <div class="flex items-center mt-4 space-x-4">
                                                                        <button type="button"
                                                                            class="flex items-center text-sm text-gray-500 hover:underline dark:text-gray-400 font-medium">
                                                                            <svg class="mr-1.5 w-3.5 h-3.5"
                                                                                aria-hidden="true"
                                                                                xmlns="http://www.w3.org/2000/svg"
                                                                                fill="none" viewBox="0 0 20 18">
                                                                                <path stroke="currentColor"
                                                                                    stroke-linecap="round"
                                                                                    stroke-linejoin="round"
                                                                                    stroke-width="2"
                                                                                    d="M5 5h5M5 8h2m6-3h2m-5 3h6m2-7H2a1 1 0 0 0-1 1v9a1 1 0 0 0 1 1h3v5l5-5h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1Z" />
                                                                            </svg>
                                                                            Balas
                                                                        </button>
                                                                    </div>
                                                                </article>
                                                                <article
                                                                    class="p-6 mb-3 ml-6 lg:ml-12 text-base bg-white rounded-lg dark:bg-gray-900">
                                                                    <footer class="flex justify-between items-center mb-2">
                                                                        <div class="flex items-center">
                                                                            <p
                                                                                class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white font-semibold">
                                                                                <img class="mr-2 w-6 h-6 rounded-full"
                                                                                    src="{{ env('API_IMG', '') . $profile['users']['photo'] }}"
                                                                                    alt="Yan">Yan
                                                                            </p>
                                                                            <p
                                                                                class="text-sm text-gray-600 dark:text-gray-400">
                                                                                <time pubdate datetime="2024-03-03"
                                                                                    title="3 Maret 2024">3 Maret
                                                                                    2024</time>
                                                                            </p>
                                                                        </div>

                                                                    </footer>
                                                                    <p class="text-gray-500 dark:text-gray-400">Gausah
                                                                        bohong kau jo!</p>
                                                                    <div class="flex items-center mt-4 space-x-4">
                                                                        <button type="button"
                                                                            class="flex items-center text-sm text-gray-500 hover:underline dark:text-gray-400 font-medium">
                                                                            <svg class="mr-1.5 w-3.5 h-3.5"
                                                                                aria-hidden="true"
                                                                                xmlns="http://www.w3.org/2000/svg"
                                                                                fill="none" viewBox="0 0 20 18">
                                                                                <path stroke="currentColor"
                                                                                    stroke-linecap="round"
                                                                                    stroke-linejoin="round"
                                                                                    stroke-width="2"
                                                                                    d="M5 5h5M5 8h2m6-3h2m-5 3h6m2-7H2a1 1 0 0 0-1 1v9a1 1 0 0 0 1 1h3v5l5-5h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1Z" />
                                                                            </svg>
                                                                            Balas
                                                                        </button>
                                                                    </div>
                                                                </article>
                                                                <article
                                                                    class="p-6 mb-3 text-base bg-white border-t border-gray-200 dark:border-gray-700 dark:bg-gray-900">
                                                                    <footer class="flex justify-between items-center mb-2">
                                                                        <div class="flex items-center">
                                                                            <p
                                                                                class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white font-semibold">
                                                                                <img class="mr-2 w-6 h-6 rounded-full"
                                                                                    src="https://flowbite.com/docs/images/people/profile-picture-3.jpg"
                                                                                    alt="Johan_second_account">Jo sec
                                                                                account
                                                                            </p>
                                                                            <p
                                                                                class="text-sm text-gray-600 dark:text-gray-400">
                                                                                <time pubdate datetime="2022-03-05"
                                                                                    title="5 Maret 2024">5 Maret
                                                                                    2024</time>
                                                                            </p>
                                                                        </div>
                                                                    </footer>
                                                                    <p class="text-gray-500 dark:text-gray-400">Mantab
                                                                        aplikasinya.</p>
                                                                    <div class="flex items-center mt-4 space-x-4">
                                                                        <button type="button"
                                                                            class="flex items-center text-sm text-gray-500 hover:underline dark:text-gray-400 font-medium">
                                                                            <svg class="mr-1.5 w-3.5 h-3.5"
                                                                                aria-hidden="true"
                                                                                xmlns="http://www.w3.org/2000/svg"
                                                                                fill="none" viewBox="0 0 20 18">
                                                                                <path stroke="currentColor"
                                                                                    stroke-linecap="round"
                                                                                    stroke-linejoin="round"
                                                                                    stroke-width="2"
                                                                                    d="M5 5h5M5 8h2m6-3h2m-5 3h6m2-7H2a1 1 0 0 0-1 1v9a1 1 0 0 0 1 1h3v5l5-5h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1Z" />
                                                                            </svg>
                                                                            Balas
                                                                        </button>
                                                                    </div>
                                                                </article>
                                                            </div>
                                                        </section>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @include('partials.footer')
                    </div>
                </div>
            </div>
        @endsection
