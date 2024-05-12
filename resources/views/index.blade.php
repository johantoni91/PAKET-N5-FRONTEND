@extends('partials.main')
@section('content')
    @include('partials.sidebar')
    @include('partials.topbar')
    <div class="ltr:flex flex-1 rtl:flex-row-reverse">
        <div class="page-wrapper relative ltr:ml-auto rtl:mr-auto rtl:ml-0 w-[calc(100%-260px)] px-4 pt-[64px] duration-300">
            <div class="xl:w-full">
                <div class="flex flex-wrap">
                    <div class="flex items-center py-4 w-full">
                        <div class="w-full">
                            <div class="">
                                <div class="flex flex-wrap justify-between">
                                    <div class="items-center ">
                                        <h1 class="font-medium text-3xl block dark:text-slate-100">Dashboard</h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="xl:w-full  min-h-[calc(100vh-138px)] relative pb-14">
                <div class="grid grid-cols-12 sm:grid-cols-12 md:grid-cols-12 lg:grid-cols-12 xl:grid-cols-12 gap-4">
                    <div class="col-span-12 sm:col-span-12 md:col-span-6 lg:col-span-3 xl:col-span-3">
                        <div
                            class="bg-white shadow-sm shadow-violet-800 dark:shadow-cyan-300 dark:bg-gray-900 rounded-md w-full relative mb-4">
                            <div class="flex-auto p-4">
                                <div class="flex justify-between xl:gap-x-2 items-cente">
                                    <div class="self-center">
                                        <p class="text-gray-800 font-semibold dark:text-slate-400 uppercase">Total Pengguna
                                        </p>
                                        <h3 class="text-center my-4 font-semibold text-[30px] dark:text-slate-200">
                                            {{ $data['user'] }}</h3>
                                    </div>
                                    <div class="self-center">
                                        <i data-lucide="user" class=" h-16 w-16 stroke-green/30"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="flex-auto p-0 overflow-hidden">
                                <div class="flex mb-0 h-full">
                                    <div class="w-full">
                                        <div class="apexchart-wrapper">
                                            <div id="dash_spark_1" class="chart-gutters"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-span-12 sm:col-span-12 md:col-span-6 lg:col-span-3 xl:col-span-3">
                        <div
                            class="bg-white shadow-sm shadow-violet-800 dark:shadow-cyan-300 dark:bg-gray-900 rounded-md w-full relative mb-4">
                            <div class="flex-auto p-4">
                                <div class="flex justify-between xl:gap-x-2 items-cente">
                                    <div class="self-center">
                                        <p class="text-gray-800 font-semibold dark:text-slate-400 uppercase">Total Satker
                                        </p>
                                        <h3 class="text-center my-4 font-semibold text-[30px] dark:text-slate-200">
                                            {{ $data['satker'] }}</h3>
                                    </div>
                                    <div class="self-center">
                                        <i data-lucide="building-2" class=" h-16 w-16 stroke-green/30"></i>
                                    </div>
                                </div>
                                {{-- <p class="truncate text-slate-400"><span class="text-red-500"><i
                                            class="mdi mdi-trending-down"></i>0.6%</span> Bounce Rate Weekly</p> --}}
                            </div>
                            <div class="flex-auto p-0 overflow-hidden">
                                <div class="flex mb-0 h-full">
                                    <div class="w-full">
                                        <div class="apexchart-wrapper">
                                            <div id="dash_spark_1" class="chart-gutters"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-span-12 sm:col-span-12 md:col-span-6 lg:col-span-3 xl:col-span-3">
                        <div
                            class="bg-white shadow-sm shadow-violet-800 dark:shadow-cyan-300 dark:bg-gray-900 rounded-md w-full relative mb-4">
                            <div class="flex-auto p-4">
                                <div class="flex justify-between xl:gap-x-2 items-cente">
                                    <div class="self-center">
                                        <p class="text-gray-800 font-semibold dark:text-slate-400 uppercase">Total Pegawai
                                        </p>
                                        <h3 class="text-center my-4 font-semibold text-[30px] dark:text-slate-200">
                                            {{ $data['pegawai'] }}</h3>
                                    </div>
                                    <div class="self-center">
                                        <i data-lucide="users" class=" h-16 w-16 stroke-green/30"></i>
                                    </div>
                                </div>
                                {{-- <p class="truncate text-slate-400"><span class="text-red-500"><i
                                            class="mdi mdi-trending-down"></i>0.6%</span> Bounce Rate Weekly</p> --}}
                            </div>
                            <div class="flex-auto p-0 overflow-hidden">
                                <div class="flex mb-0 h-full">
                                    <div class="w-full">
                                        <div class="apexchart-wrapper">
                                            <div id="dash_spark_1" class="chart-gutters"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-span-12 sm:col-span-12 md:col-span-6 lg:col-span-3 xl:col-span-3">
                        <div
                            class="bg-white shadow-sm shadow-violet-800 dark:shadow-cyan-300 dark:bg-gray-900 rounded-md w-full relative mb-4">
                            <div class="flex-auto p-4">
                                <div class="flex justify-between xl:gap-x-2 items-cente">
                                    <div class="self-center">
                                        <p class="text-gray-800 font-semibold dark:text-slate-400 uppercase">Total Pengajuan
                                        </p>
                                        <h3 class="my-4 font-semibold text-[30px] dark:text-slate-200 text-center">
                                            {{ $data['pengajuan'] }}
                                        </h3>
                                    </div>
                                    <div class="self-center">
                                        <i data-lucide="pen" class=" h-16 w-16 stroke-yellow-500/30"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-span-12 sm:col-span-12 md:col-span-6 lg:col-span-3 xl:col-span-3">
                        <div
                            class="bg-white shadow-sm shadow-violet-800 dark:shadow-cyan-300 dark:bg-gray-900 rounded-md w-full relative mb-4">
                            <div class="flex-auto p-4">
                                <div class="flex justify-between xl:gap-x-2 items-cente">
                                    <div class="self-center">
                                        <p class="text-gray-800 font-semibold dark:text-slate-400 uppercase">Total Penilaian
                                        </p>
                                        <h3 class="my-4 font-semibold text-[30px] dark:text-slate-200 text-center">
                                            {{ $data['rating'] }}
                                        </h3>
                                    </div>
                                    <div class="self-center">
                                        <i data-lucide="star" class=" h-16 w-16 stroke-yellow-500/30"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-2 gap-2">
                    <div class="col-span-1">
                        <canvas id="approval"></canvas>
                    </div>
                    <div class="col-span-1">
                        <canvas id="perangkat"></canvas>
                    </div>
                </div>
                <div class="grid grid-cols-1">
                    <div class="col-span-1">
                        <canvas id="top5"></canvas>
                    </div>
                </div>
                @include('partials.footer')
            </div>
        </div>
    </div>
    <script>
        const approval = document.getElementById('approval').getContext('2d');
        const perangkat = document.getElementById('perangkat').getContext('2d');
        const top5 = document.getElementById('top5').getContext('2d');
        new Chart(approval, {
            type: 'bar',
            data: {
                labels: ['ditolak', 'Proses', 'Verifikasi', 'disetujui'],
                datasets: [{
                    label: "Total Pengajuan",
                    data: [{{ $status_pengajuan['ditolak'] }}, {{ $status_pengajuan['proses'] }},
                        {{ $status_pengajuan['verifikasi'] }}, {{ $status_pengajuan['setuju'] }}
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
        new Chart(perangkat, {
            type: 'line',
            data: {
                labels: ['Aktif', 'Nonaktif'],
                datasets: [{
                    label: "Total Perangkat",
                    data: [{{ $status_perangkat['aktif'] }}, {{ $status_perangkat['nonaktif'] }}],
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
        new Chart(top5, {
            type: 'line',
            data: {
                labels: ['Aktif', 'Nonaktif'],
                datasets: [{
                    label: "Satker dengan pengajuan terbanyak",
                    data: [{{ $status_perangkat['aktif'] }}, {{ $status_perangkat['nonaktif'] }}],
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
    {{-- @push('scripts')
        <script src="{{ asset('assets/libs/apexcharts/apexcharts.min.js') }}"></script>
        <script src="{{ asset('assets/js/pages/analytics-index.init.js') }}"></script>
    @endpush --}}
@endsection
