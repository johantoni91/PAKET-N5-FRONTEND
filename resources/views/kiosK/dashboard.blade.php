@extends('kiosK.partials.main')
@section('kiosk')
    <div class="bg-slate-200 flex flex-row gap-5 justify-center items-center" style="width: 100dvw; height: 100dvh;">
        <a href="{{ route('kios.token') }}"
            class="flex flex-col gap-2 w-28 h-28 justify-center items-center text-center rounded-lg shadow-lg">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="lucide lucide-printer">
                <path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2" />
                <path d="M6 9V3a1 1 0 0 1 1-1h10a1 1 0 0 1 1 1v6" />
                <rect x="6" y="14" width="12" height="8" rx="1" />
            </svg>
            <p>Cetak</p>
        </a>
        <a href="#"
            class="flex flex-col gap-2 w-28 h-28 justify-center items-center text-center rounded-lg shadow-lg">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="lucide lucide-credit-card">
                <rect width="20" height="14" x="2" y="5" rx="2" />
                <line x1="2" x2="22" y1="10" y2="10" />
            </svg>
            <p>Kartu</p>
        </a>
        <a href="#"
            class="flex flex-col gap-2 w-28 h-28 justify-center items-center text-center rounded-lg shadow-lg">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="lucide lucide-user">
                <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2" />
                <circle cx="12" cy="7" r="4" />
            </svg>
            <p>Lihat</p>
        </a>
    </div>
@endsection
