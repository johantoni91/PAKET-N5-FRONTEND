@extends('kiosK.partials.main')
@section('kiosk')
    <div class="relative grid grid-cols-2"
        style="width: 100dvw; height:100dvh; background-position: center; background-repeat: no-repeat; background-size: cover; background-image: url({{ asset('assets/images/bg-kios.jpg') }});">
        <div class="relative cols-span-1 flex flex-col">
            <div class="flex flex-row justify-start items-center gap-2 ps-3 pt-1" style="width: 100dvw; height: 25dvh;">
                <img src="{{ asset('assets/images/kejaksaan-logo.png') }}" class="w-36 h-36" alt=""
                    style="margin-left:50px;">
                <div class="flex flex-col justify-start text-white" style="margin-left:50px; text-shadow: 0 1px 5px black;">
                    <h1 class="font-bold text-nowrap" style="font-size: 3em;">{{ $satker['satker_name'] }}</h1>
                    <h1 class="font-semibold" style="font-size: 1.5em;">{!! $satker['satker_address'] !!}</h1>
                </div>
            </div>
            <div class="absolute flex flex-col justify-center items-center h-full" style="width:100%; padding-left:50px;">
                <div id="default-carousel" class="relative w-full shadow shadow-green-500" data-carousel="slide"
                    style="height: 50dvh;">
                    <!-- Carousel wrapper -->
                    <div class="relative overflow-hidden rounded-lg" style="height: 100%">
                        <!-- Item 1 -->
                        <div class="hidden duration-700 ease-in-out" data-carousel-item>
                            <img src="{{ asset('assets/images/justice1.jpg') }}"
                                class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                                alt="...">
                        </div>
                        <!-- Item 2 -->
                        <div class="hidden duration-700 ease-in-out" data-carousel-item>
                            <img src="{{ asset('assets/images/justice2.jpg') }}"
                                class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                                alt="...">
                        </div>
                        <!-- Item 3 -->
                        <div class="hidden duration-700 ease-in-out" data-carousel-item>
                            <img src="{{ asset('assets/images/justice3.jpg') }}"
                                class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                                alt="...">
                        </div>
                    </div>
                    <!-- Slider indicators -->
                    <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse">
                        <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1"
                            data-carousel-slide-to="0"></button>
                        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2"
                            data-carousel-slide-to="1"></button>
                        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3"
                            data-carousel-slide-to="2"></button>
                    </div>
                    <!-- Slider controls -->
                    <button type="button"
                        class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                        data-carousel-prev>
                        <span
                            class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                            <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 1 1 5l4 4" />
                            </svg>
                            <span class="sr-only">Previous</span>
                        </span>
                    </button>
                    <button type="button"
                        class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                        data-carousel-next>
                        <span
                            class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                            <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m1 9 4-4-4-4" />
                            </svg>
                            <span class="sr-only">Next</span>
                        </span>
                    </button>
                </div>

            </div>
        </div>
        <div class="cols-span-1 flex flex-col justify-center items-center gap-5 "
            style="padding-left: 5rem; padding-right: 5rem;">
            {{-- <div class="flex flex-row flex-wrap xl:flex-nowrap gap-10 justify-center"> --}}
            <div class="flex flex-row items-center justify-start w-full shadow-lg shadow-black rounded-lg">
                <a href="{{ route('kios.token') }}"
                    class="self-start flex flex-col gap-2 justify-center items-center text-center rounded-lg bg-green-200/50 shadow shadow-green-500 hover:bg-white hover:text-black shadow-lg"
                    style="min-width: 200px; height:175px;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="lucide lucide-printer mt-auto">
                        <path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2" />
                        <path d="M6 9V3a1 1 0 0 1 1-1h10a1 1 0 0 1 1 1v6" />
                        <rect x="6" y="14" width="12" height="8" rx="1" />
                    </svg>
                    <p class="mt-auto uppercase font-bold" style="font-size: 1.4em;">Cetak</p>
                </a>
                <p class="ms-5 me-3" style="font-size: 1.7em;">Menu ini digunakan untuk melakukan pencetakan kartu pegawai.
                </p>
            </div>
            <div class="flex flex-row items-center justify-end w-full shadow-lg shadow-black rounded-lg">
                <p class="me-5 ms-3 text-end" style="font-size: 1.7em;">Menu ini digunakan untuk melakukan pemindaian
                    kartu pegawai.</p>
                <a href="#"
                    class="self-end flex flex-col gap-2 justify-center items-center text-center rounded-lg bg-green-200/50 shadow shadow-green-500 hover:bg-white hover:text-black shadow-lg"
                    style="min-width: 200px; height:175px;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="lucide lucide-credit-card mt-auto">
                        <rect width="20" height="14" x="2" y="5" rx="2" />
                        <line x1="2" x2="22" y1="10" y2="10" />
                    </svg>
                    <p class="mt-auto uppercase font-bold" style="font-size: 1.4em;">Kartu</p>
                </a>
            </div>
            <div class="flex flex-row items-center justify-start w-full shadow-lg shadow-black rounded-lg">
                <a href="#"
                    class="self-start flex flex-col gap-2 justify-center items-center text-center rounded-lg bg-green-200/50 shadow shadow-green-500 hover:bg-white hover:text-black shadow-lg"
                    style="min-width: 200px; height:175px;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="lucide lucide-user mt-auto">
                        <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2" />
                        <circle cx="12" cy="7" r="4" />
                    </svg>
                    <p class="mt-auto uppercase font-bold" style="font-size: 1.4em;">Lihat</p>
                </a>
                <p class="ms-5 me-3" style="font-size: 1.7em;">Menu ini digunakan untuk melihat data pegawai.</p>
            </div>
            {{-- </div> --}}
        </div>

        <div style="width: 100dvw; height:15dvh; background-position: center; background-size: cover; background-image: url({{ asset('assets/images/bg-footer.jpg') }});"
            class="absolute bottom-0 left-0 p-3 text-center rounded-lg">
        </div>
        {{-- <div class="flex flex-col justify-start text-white" style="margin-left:50px; text-shadow: 0 1px 5px black;">
        </div> --}}
    </div>

    {{-- <div class="relative flex flex-col gap-1 justify-center items-center"
        style="width: 100dvw; height: 100dvh; background-position: center; background-repeat: no-repeat; background-size: cover; background-image: url({{ asset('assets/images/17545.jpg') }});">
        <div class="absolute top-0 left-0 flex flex-row justify-center p-5 items-center overflow-hidden"
            style="width: 100dvw; height:20dvh;">
            <img src="{{ asset('assets/images/kejaksaan-logo.png') }}" class="" style="width: 150px; height:150px;"
                alt="">
            <div class="flex flex-col">
                <h1 class="font-bold ms-10" style="font-size: 3.5em;">{{ $satker['satker_name'] }}</h1>
                <h1 class="font-semibold text-center">{!! $satker['satker_address'] !!}</h1>
            </div>
        </div>
        <div class="flex flex-row gap-10 justify-center">
            <a href="{{ route('kios.token') }}"
                class="flex flex-col gap-2 justify-center items-center text-center rounded-lg bg-white shadow-lg"
                style="width: 20dvw; height:40dvh;">
                <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="lucide lucide-printer mt-auto">
                    <path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2" />
                    <path d="M6 9V3a1 1 0 0 1 1-1h10a1 1 0 0 1 1 1v6" />
                    <rect x="6" y="14" width="12" height="8" rx="1" />
                </svg>
                <p class="mt-auto" style="font-size: 3em;">Cetak</p>
            </a>
            <a href="#"
                class="flex flex-col gap-2 justify-center items-center text-center rounded-lg bg-white shadow-lg"
                style="width: 20dvw; height:40dvh;">
                <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="lucide lucide-credit-card mt-auto">
                    <rect width="20" height="14" x="2" y="5" rx="2" />
                    <line x1="2" x2="22" y1="10" y2="10" />
                </svg>
                <p class="mt-auto" style="font-size: 3em;">Kartu</p>
            </a>
            <a href="#"
                class="flex flex-col gap-2 justify-center items-center text-center rounded-lg bg-white shadow-lg"
                style="width: 20dvw; height:40dvh;">
                <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="lucide lucide-user mt-auto">
                    <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2" />
                    <circle cx="12" cy="7" r="4" />
                </svg>
                <p class="mt-auto" style="font-size: 3em;">Lihat</p>
            </a>
        </div>
    </div> --}}
@endsection
