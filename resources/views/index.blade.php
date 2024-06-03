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
                            class="bg-white shadow-sm shadow-violet-800 dark:shadow-cyan-300 dark:bg-white rounded-md w-full relative mb-4">
                            <div class="flex-auto p-4">
                                <div class="flex justify-between xl:gap-x-2 items-cente">
                                    <div class="self-center">
                                        <p class="text-gray-800 font-semibold dark:text-black uppercase">Total Pengguna
                                        </p>
                                        <h3 class="text-center my-4 font-semibold text-[30px] dark:text-black">
                                            {{ $data['user'] }}</h3>
                                    </div>
                                    <div class="self-center">
                                        <i data-lucide="user" class=" h-16 w-16 stroke-green/30 font-bold"></i>
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
                            class="bg-white shadow-sm shadow-violet-800 dark:shadow-cyan-300 dark:bg-white rounded-md w-full relative mb-4">
                            <div class="flex-auto p-4">
                                <div class="flex justify-between xl:gap-x-2 items-cente">
                                    <div class="self-center">
                                        <p class="text-gray-800 font-semibold dark:text-black uppercase">Total Satker
                                        </p>
                                        <h3 class="text-center my-4 font-semibold text-[30px] dark:text-black">
                                            {{ $data['satker'] }}</h3>
                                    </div>
                                    <div class="self-center">
                                        <i data-lucide="building-2" class=" h-16 w-16 stroke-green/30"></i>
                                    </div>
                                </div>
                                {{-- <p class="truncate text-black"><span class="text-red-500"><i
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
                            class="bg-white shadow-sm shadow-violet-800 dark:shadow-cyan-300 dark:bg-white rounded-md w-full relative mb-4">
                            <div class="flex-auto p-4">
                                <div class="flex justify-between xl:gap-x-2 items-cente">
                                    <div class="self-center">
                                        <p class="text-gray-800 font-semibold dark:text-black uppercase">Total Pegawai
                                        </p>
                                        <h3 class="text-center my-4 font-semibold text-[30px] dark:text-black">
                                            {{ $data['pegawai'] }}</h3>
                                    </div>
                                    <div class="self-center">
                                        <i data-lucide="users" class=" h-16 w-16 stroke-green/30"></i>
                                    </div>
                                </div>
                                {{-- <p class="truncate text-black"><span class="text-red-500"><i
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
                            class="bg-white shadow-sm shadow-violet-800 dark:shadow-cyan-300 dark:bg-white rounded-md w-full relative mb-4">
                            <div class="flex-auto p-4">
                                <div class="flex justify-between xl:gap-x-2 items-cente">
                                    <div class="self-center">
                                        <p class="text-gray-800 font-semibold dark:text-black uppercase">Total Pengajuan
                                        </p>
                                        <h3 class="my-4 font-semibold text-[30px] dark:text-black text-center">
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
                            class="bg-white shadow-sm shadow-violet-800 dark:shadow-cyan-300 dark:bg-white rounded-md w-full relative mb-4">
                            <div class="flex-auto p-4">
                                <div class="flex justify-between xl:gap-x-2 items-cente">
                                    <div class="self-center">
                                        <p class="text-gray-800 font-semibold dark:text-black uppercase">Total Penilaian
                                        </p>
                                        <h3 class="my-4 font-semibold text-[30px] dark:text-black text-center">
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
                    <div class="p-4 col-span-1">
                        <canvas id="approval"></canvas>
                    </div>
                    <div class="col-span-1">
                        <canvas id="perangkat"></canvas>
                    </div>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-2 gap-2">
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
            type: 'line',
            data: {
                labels: ['ditolak', 'Proses', 'Verifikasi', 'disetujui'],
                datasets: [{
                    label: "Total Pengajuan",
                    backgroundColor: 'purple',
                    lineTension: 0.4,
                    data: [{{ $status_pengajuan['ditolak'] }}, {{ $status_pengajuan['proses'] }},
                        {{ $status_pengajuan['verifikasi'] }}, {{ $status_pengajuan['setuju'] }}
                    ],
                    borderWidth: 1.5,
                    borderColor: '#0077B6'
                }]
            },
            options: {
                maintainAspectRatio: false,
                responsive: true,
                plugins: {
                    legend: {
                        display: false,
                    },
                    title: {
                        display: false,
                    },
                },
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
            type: 'bar',
            data: {
                labels: ['Aktif', 'Nonaktif'],
                datasets: [{
                    label: "Total Perangkat",
                    data: [{{ $status_perangkat['aktif'] }}, {{ $status_perangkat['nonaktif'] }}],
                    borderWidth: 1.5,
                    borderColor: '#0077B6'
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
            type: 'polarArea',
            data: {
                labels: ["{{ $top1 }}", "{{ $top2 }}", "{{ $top3 }}",
                    "{{ $top4 }}", "{{ $top5 }}"
                ],
                datasets: [{
                    label: "Satker dengan pengajuan terbanyak",
                    data: [{{ $top_value1 }}, {{ $top_value2 }}, {{ $top_value3 }},
                        {{ $top_value4 }}, {{ $top_value5 }},
                    ],
                    borderWidth: 1.5,
                    borderColor: '#0077B6',
                    backgroundColor: ['#98FF98', '#abc123', '#c5cbe1', '#cc6666', '#fff'],
                }]
            },
            options: {
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
