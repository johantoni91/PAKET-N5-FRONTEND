@extends('kiosK.partials.main')
@section('kiosk')
    <div class="relative"
        style="width: 100dvw; height:100dvh; background-position: center; background-repeat: no-repeat; background-size: cover; background-image: url({{ asset('assets/images/bg-kios.jpg') }});">
        <div class="flex flex-col justify-start">
            <div class="flex flex-col">
                <div class="flex flex-row justify-start items-center gap-2 ps-3 pt-1" style="width: 100%; height: 25dvh;">
                    <img src="{{ asset('assets/images/kejaksaan-logo.png') }}" class="w-36 h-36" alt=""
                        style="margin-left:50px;">
                    <div class="flex flex-col justify-start text-white"
                        style="margin-left:50px; text-shadow: 0 1px 5px black;">
                        <h1 class="font-bold text-nowrap" style="font-size: 3em;">{{ $satker['satker_name'] }}</h1>
                        <h1 class="font-semibold" style="font-size: 1.5em;">{!! $satker['satker_address'] !!}</h1>
                    </div>
                </div>
            </div>
            <div class="grid grid-cols-2">
                <div class="cols-span-1 p-5">
                    <div id="default-carousel" class="relative w-full h-[80%] shadow shadow-green-500"
                        data-carousel="slide">
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
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M5 1 1 5l4 4" />
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
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 9 4-4-4-4" />
                                </svg>
                                <span class="sr-only">Next</span>
                            </span>
                        </button>
                    </div>
                </div>
                <div class="cols-span-1 p-5 flex flex-col gap-2 justify-start overflow-hidden"
                    style="padding-left: 2rem; padding-right: 2rem;">
                    <form id="checkToken" action="{{ route('kios.token') }}" method="post">
                        @csrf
                        <div class="flex flex-row gap-2 items-center justify-start">
                            <input type="text" id="token" name="token" class="w-full border rounded-lg">
                            <button type="submit" class="rounded-lg p-2 bg-lime-500">Kirim</button>
                        </div>
                    </form>
                    <div id="scan" class="self-center overflow-hidden rounded-lg shadow shadow-green"
                        style="width: 60%; height: 80%">
                    </div>
                </div>
            </div>
            <div style="width: 100dvw; height:15dvh; background-position: center; background-size: cover; background-image: url({{ asset('assets/images/bg-footer.jpg') }});"
                class="absolute bottom-0 p-3 text-center rounded-lg">
            </div>
        </div>
    </div>
    <script src="{{ asset('assets/js/html5-qrcode.min.js') }}"></script>
    <script>
        let html5QrcodeScanner = new Html5QrcodeScanner("scan", {
            fps: 10,
            qrbox: 300
        });

        const onScanSuccess = (decodedText, decodedResult) => {
            $("#token").val(decodedText)
            $("#checkToken").submit()
        }

        const onScanError = (error) => {
            Swal.fire({
                title: "Error",
                text: error,
                icon: "error"
            });
        }

        document.addEventListener('DOMContentLoaded', () => {
            html5QrcodeScanner.render(onScanSuccess);
        });
    </script>
@endsection
