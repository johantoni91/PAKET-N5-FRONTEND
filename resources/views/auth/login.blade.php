@extends('partials.main')
@section('content')
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <div class="relative flex flex-col justify-center min-h-screen overflow-hidden z-[99]">
        <div class="stars" style="z-index: -1">
            @for ($i = 0; $i < 50; $i++)
                <div class="star bg-yellow-400 text-yellow dark:bg-white dark:text-white"></div>
            @endfor
        </div>
        <div class="absolute top-5 right-5 text-cyan-700 dark:text-yellow">
            <button id="toggle-theme" class="flex rounded-full md:me-0 relative">
                <span data-lucide="moon" class="top-icon w-8 h-8 dark"></span>
                <span data-lucide="sun" class="top-icon w-8 h-8 light hidden"></span>
            </button>
        </div>
        <div
            class="w-[80%] m-auto bg-[#B6C4B6]/60 dark:bg-slate-800/60 rounded-lg shadow-md shadow-yellow-500 dark:shadow-white sm:max-w-md">
            <div
                class="text-center p-6 bg-[#E8DFCA]/60 dark:bg-slate-900/60 border-b border-[#E8DFCA]/60 dark:border-slate-900/60 rounded-t">
                <a href="{{ route('login') }}"><img src="assets/images/kejaksaan-logo.png" alt=""
                        class="w-20 h-20 mx-auto mb-2"></a>
                <h3 class="font-semibold dark:text-white text-xxl mb-1">OTENTIK</h3>
                <p class="text-xs dark:text-white">KEJAKSAAN REPUBLIK INDONESIA</p>
            </div>

            <form class="p-6" method="POST" action="{{ route('login.form') }}" data-toggle="validator">
                {{ csrf_field() }}
                <div>
                    <label for="username" class="font-medium text-sm dark:text-white">Username</label>
                    <input type="username" id="username" name="username"
                        class="form-input w-full rounded-md mt-1 border border-slate-300/60 dark:border-slate-700 dark:text-slate-300 bg-transparent px-3 py-2 focus:outline-none focus:ring-0 placeholder:text-slate-400/70 placeholder:font-normal placeholder:text-sm hover:border-slate-400 focus:border-primary-500 dark:focus:border-primary-500  dark:hover:border-slate-700"
                        placeholder="Masukkan Username" value="superadmin" required>
                </div>
                <div class="mt-4">
                    <label for="password" class="font-medium text-sm dark:text-white">Password</label>
                    <input type="password" id="password" name="password"
                        class="form-input w-full rounded-md mt-1 border border-slate-300/60 dark:border-slate-700 dark:text-slate-300 bg-transparent px-3 py-2 focus:outline-none focus:ring-0 placeholder:text-slate-400/70 placeholder:font-normal placeholder:text-sm hover:border-slate-400 focus:border-primary-500 dark:focus:border-primary-500  dark:hover:border-slate-700"
                        placeholder="Masukkan Password" value="123" required>
                </div>
                <div class="mt-4">
                    <button
                        class="w-full px-2 py-2 font-semibold tracking-wide dark:text-white transition-colors duration-200 transform bg-[#4F6F52]/60 dark:bg-slate-900/60 dark:hover:bg-slate-900/40 hover:bg-[#4F6F52]/40 rounded focus:outline-none">
                        Login
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
