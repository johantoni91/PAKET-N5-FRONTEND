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
                                            @if (!request()->routeIs('rating'))
                                                <a href="{{ route('rating') }}"
                                                    class="ms-1 focus:outline-none bg-primary-500 text-white border border-primary-500 dark:bg-transparent dark:text-primary-500 dark:hover:text-white dark:border-gray-700 dark:hover:bg-primary-500 text-sm font-medium py-1 px-3 rounded">Kembali
                                                </a>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="grid md:grid-cols-2 gap-2 sm:grid-cols-1 p-4">
                                        <div class="sm:mx-6 lg:mx-8 flex flex-col">
                                            <div class="block m-auto w-full">
                                                <canvas id="graphOfRating"></canvas>
                                                <script>
                                                    const ctx = document.getElementById('graphOfRating').getContext('2d');

                                                    new Chart(ctx, {
                                                        type: 'line',
                                                        data: {
                                                            labels: ['⭐️1', '⭐️2', '⭐️3', '⭐️4', '⭐️5'],
                                                            datasets: [{
                                                                label: "Total {{ $additional['total_records'] }} penilaian",
                                                                data: [
                                                                    {{ $additional['stars']['1'] }},
                                                                    {{ $additional['stars']['2'] }},
                                                                    {{ $additional['stars']['3'] }},
                                                                    {{ $additional['stars']['4'] }},
                                                                    {{ $additional['stars']['5'] }}
                                                                ],
                                                                borderWidth: 1.5,
                                                                borderColor: '#A020F0'
                                                            }]
                                                        },
                                                        options: {
                                                            animations: {
                                                                tension: {
                                                                    duration: 4000,
                                                                    easing: 'easeInOut',
                                                                    from: 1,
                                                                    to: 0,
                                                                    loop: true
                                                                }
                                                            },
                                                            scales: {
                                                                x: {
                                                                    grid: {
                                                                        display: false
                                                                    }
                                                                },
                                                                y: {
                                                                    grid: {
                                                                        display: false
                                                                    }
                                                                }
                                                            }
                                                        }
                                                    });
                                                </script>
                                            </div>
                                        </div>
                                        <div class="sm:-mx-6 lg:-mx-8">
                                            <div class="relative block w-full sm:px-6 lg:px-8">
                                                <div class="relative sm:rounded-lg">
                                                    <div class="grid items-center">
                                                        @include('rating.components.comments')
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
