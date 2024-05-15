@extends('kiosK.partials.main')
@section('kiosk')
    <div
        class="relative bg-slate-200 flex flex-row gap-5 justify-center items-center"style="width: 100dvw; height:100dvh; background-position: center; background-repeat: no-repeat; background-size: cover; background-image: url({{ asset('assets/images/bg-kios.jpg') }});">
        <div class="relative w-1/2">
            <div class="flex flex-row justify-start items-center gap-2 ps-3 pt-1" style="width: 100dvw; height: 25dvh;">
                <img src="{{ asset('assets/images/kejaksaan-logo.png') }}" class="w-36 h-36" alt=""
                    style="margin-left:50px;">
                <div class="flex flex-col justify-start text-white" style="margin-left:50px; text-shadow: 0 1px 5px black;">
                    <h1 class="font-bold text-nowrap" style="font-size: 3em;">{{ $satker['satker_name'] }}</h1>
                    <h1 class="font-semibold" style="font-size: 1.5em;">{!! $satker['satker_address'] !!}</h1>
                </div>
            </div>
            <form action="{{ route('kios.token') }}" method="post">
                @csrf
                <input type="text" name="token" required placeholder="Masukkan token"
                    class="border-2 rounded-lg font-semibold shadow-lg w-full">
                <button type="submit" class="absolute right-2 top-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="lucide lucide-send-horizontal">
                        <path d="m3 3 3 9-3 9 19-9Z" />
                        <path d="M6 12h16" />
                    </svg>
                </button>
            </form>
        </div>
    </div>
@endsection
