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
                            class="bg-white shadow-sm shadow-orange-800 dark:shadow-cyan-300 dark:bg-white/30 rounded-md w-full relative mb-4">
                            <div class="flex-auto p-4">
                                <div class="flex justify-between xl:gap-x-2 items-center">
                                    <div class="self-center">
                                        <p class="text-gray-800 font-semibold dark:text-white uppercase">Total Pengguna
                                        </p>
                                        <h3 class="text-center my-4 font-semibold text-[30px] dark:text-white">
                                            {{ $data['user'] }}</h3>
                                    </div>
                                    <div class="self-center">
                                        <i data-lucide="user" class=" h-16 w-16 stroke-green font-bold"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-span-12 sm:col-span-12 md:col-span-6 lg:col-span-3 xl:col-span-3">
                        <div
                            class="bg-white shadow-sm shadow-orange-800 dark:shadow-cyan-300 dark:bg-white/30 rounded-md w-full relative mb-4">
                            <div class="flex-auto p-4">
                                <div class="flex justify-between xl:gap-x-2 items-center">
                                    <div class="self-center">
                                        <p class="text-gray-800 font-semibold dark:text-white uppercase">Total Satker
                                        </p>
                                        <h3 class="text-center my-4 font-semibold text-[30px] dark:text-white">
                                            {{ $data['satker'] }}</h3>
                                    </div>
                                    <div class="self-center">
                                        <i data-lucide="building-2" class=" h-16 w-16 stroke-green"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-span-12 sm:col-span-12 md:col-span-6 lg:col-span-3 xl:col-span-3">
                        <div
                            class="bg-white shadow-sm shadow-orange-800 dark:shadow-cyan-300 dark:bg-white/30 rounded-md w-full relative mb-4">
                            <div class="flex-auto p-4">
                                <div class="flex justify-between xl:gap-x-2 items-center">
                                    <div class="self-center">
                                        <p class="text-gray-800 font-semibold dark:text-white uppercase">Total Pegawai
                                        </p>
                                        <h3 class="text-center my-4 font-semibold text-[30px] dark:text-white">
                                            {{ $data['pegawai'] }}</h3>
                                    </div>
                                    <div class="self-center">
                                        <i data-lucide="users" class=" h-16 w-16 stroke-green"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-span-12 sm:col-span-12 md:col-span-6 lg:col-span-3 xl:col-span-3">
                        <div
                            class="bg-white shadow-sm shadow-orange-800 dark:shadow-cyan-300 dark:bg-white/30 rounded-md w-full relative mb-4">
                            <div class="flex-auto p-4">
                                <div class="flex justify-between xl:gap-x-2 items-center">
                                    <div class="self-center">
                                        <p class="text-gray-800 font-semibold dark:text-white uppercase">Total Pengajuan
                                        </p>
                                        <h3 class="my-4 font-semibold text-[30px] dark:text-white text-center">
                                            {{ $data['pengajuan'] }}
                                        </h3>
                                    </div>
                                    <div class="self-center">
                                        <i data-lucide="pen" class=" h-16 w-16 stroke-yellow-500"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-span-12 sm:col-span-12 md:col-span-6 lg:col-span-3 xl:col-span-3">
                        <div
                            class="bg-white shadow-sm shadow-orange-800 dark:shadow-cyan-300 dark:bg-white/30 rounded-md w-full relative mb-4">
                            <div class="flex-auto p-4">
                                <div class="flex justify-between xl:gap-x-2 items-center">
                                    <div class="self-center">
                                        <p class="text-gray-800 font-semibold dark:text-white uppercase">Total Penilaian
                                        </p>
                                        <h3 class="my-4 font-semibold text-[30px] dark:text-white text-center">
                                            {{ $data['rating'] }}
                                        </h3>
                                    </div>
                                    <div class="self-center">
                                        <i data-lucide="star" class=" h-16 w-16 stroke-yellow-500"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex flex-row flex-wrap justify-between gap-3 items-center my-5">
                    <div
                        class="p-4 w-full lg:w-[30%] h-90 rounded-lg shadow shadow-orange-800 dark:shadow-cyan-300 dark:text-white">
                        <h3 class="text-center font-semibold mb-1 dark:text-white">Persetujuan</h3>
                        <div class="w-full h-full" id="approval"></div>
                    </div>
                    <div
                        class="p-4 w-full lg:w-[30%] h-90 rounded-lg shadow shadow-orange-800 dark:shadow-cyan-300 dark:text-white">
                        <h3 class="text-center font-semibold mb-1 dark:text-white">Status Perangkat</h3>
                        <div class="w-full h-full" id="perangkat"></div>
                    </div>
                    <div
                        class="p-4 w-full lg:w-[30%] h-90 rounded-lg shadow shadow-orange-800 dark:shadow-cyan-300 dark:text-white">
                        <h3 class="text-center font-semibold mb-1 dark:text-white">Pengajuan Terbanyak</h3>
                        <div class="w-full h-full" id="top5"></div>
                    </div>
                </div>
                @include('partials.footer')
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script>
        var approval = {
            series: [{
                name: "Persetujuan",
                data: [{{ $status_pengajuan['ditolak'] }}, {{ $status_pengajuan['proses'] }},
                    {{ $status_pengajuan['verifikasi'] }}, {{ $status_pengajuan['setuju'] }}
                ]
            }],
            grid: {
                show: false,
                xaxis: {
                    lines: {
                        show: false
                    }
                },
                yaxis: {
                    lines: {
                        show: false
                    }
                },
            },
            chart: {
                type: 'area',
                height: 300,
                zoom: {
                    enabled: false
                }
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                curve: 'straight'
            },

            labels: ['ditolak', 'Proses', 'Verifikasi', 'disetujui'],
        };
        var chart = new ApexCharts(document.querySelector("#approval"), approval);
        chart.render();

        var perangkat = {
            series: [{
                name: "Status",
                data: [{{ $status_perangkat['aktif'] }}, {{ $status_perangkat['nonaktif'] }}]
            }],
            grid: {
                show: false
            },
            chart: {
                type: 'area',
                height: 300,
                zoom: {
                    enabled: false
                }
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                curve: 'straight'
            },

            labels: ['Aktif', 'Nonaktif']
        };
        var chart = new ApexCharts(document.querySelector("#perangkat"), perangkat);
        chart.render();


        var options = {
            series: [{
                name: "Top",
                data: [{{ $top_value1 }}, {{ $top_value2 }}, {{ $top_value3 }}, {{ $top_value4 }},
                    {{ $top_value5 }}
                ]
            }],
            grid: {
                show: false
            },
            chart: {
                type: 'area',
                height: 300,
                zoom: {
                    enabled: true
                }
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                curve: 'straight'
            },

            labels: ["{{ $top1 }}", "{{ $top2 }}", "{{ $top3 }}",
                "{{ $top4 }}", "{{ $top5 }}"
            ]
        };
        var chart = new ApexCharts(document.querySelector("#top5"), options);
        chart.render();
    </script>
@endsection
