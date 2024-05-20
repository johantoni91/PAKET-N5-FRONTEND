@extends('partials.main')
@section('content')
    <style>
        .stars {
            position: fixed;
            top: -15rem;
            right: -15rem;
            width: 100%;
            height: 120%;
            transform: rotate(-45deg);
        }

        .star {
            --star-color: var(--primary-color);
            --star-tail-length: 6em;
            --star-tail-height: 2px;
            --star-width: calc(var(--star-tail-length) / 6);
            --fall-duration: 9s;
            --tail-fade-duration: var(--fall-duration);
            position: absolute;
            top: var(--top-offset);
            left: 0;
            width: var(--star-tail-length);
            height: var(--star-tail-height);
            color: var(--star-color);
            background: linear-gradient(45deg, currentColor, transparent);
            border-radius: 50%;
            filter: drop-shadow(0 0 6px currentColor);
            transform: translate3d(104em, 0, 0);
            animation: fall var(--fall-duration) var(--fall-delay) linear infinite, tail-fade var(--tail-fade-duration) var(--fall-delay) ease-out infinite;
        }

        @media screen and (max-width: 750px) {
            .star {
                animation: fall var(--fall-duration) var(--fall-delay) linear infinite;
            }
        }

        .star:nth-child(1) {
            --star-tail-length: 5.65em;
            --top-offset: 1.01vh;
            --fall-duration: 7.36s;
            --fall-delay: 3.34s;
        }

        .star:nth-child(2) {
            --star-tail-length: 5.45em;
            --top-offset: 81.36vh;
            --fall-duration: 8.221s;
            --fall-delay: 9.382s;
        }

        .star:nth-child(3) {
            --star-tail-length: 6.29em;
            --top-offset: 45.53vh;
            --fall-duration: 10.793s;
            --fall-delay: 5.674s;
        }

        .star:nth-child(4) {
            --star-tail-length: 6.13em;
            --top-offset: 68.39vh;
            --fall-duration: 7.963s;
            --fall-delay: 9.326s;
        }

        .star:nth-child(5) {
            --star-tail-length: 7.17em;
            --top-offset: 79.37vh;
            --fall-duration: 10.031s;
            --fall-delay: 9.014s;
        }

        .star:nth-child(6) {
            --star-tail-length: 7.05em;
            --top-offset: 47.85vh;
            --fall-duration: 8.311s;
            --fall-delay: 4.71s;
        }

        .star:nth-child(7) {
            --star-tail-length: 5.9em;
            --top-offset: 97.46vh;
            --fall-duration: 8.177s;
            --fall-delay: 6.986s;
        }

        .star:nth-child(8) {
            --star-tail-length: 7.22em;
            --top-offset: 45.82vh;
            --fall-duration: 9.627s;
            --fall-delay: 0.868s;
        }

        .star:nth-child(9) {
            --star-tail-length: 5.74em;
            --top-offset: 63.14vh;
            --fall-duration: 10.936s;
            --fall-delay: 8.121s;
        }

        .star:nth-child(10) {
            --star-tail-length: 7.07em;
            --top-offset: 28.6vh;
            --fall-duration: 6.471s;
            --fall-delay: 8.761s;
        }

        .star:nth-child(11) {
            --star-tail-length: 6.26em;
            --top-offset: 26.53vh;
            --fall-duration: 11.754s;
            --fall-delay: 5.449s;
        }

        .star:nth-child(12) {
            --star-tail-length: 7.03em;
            --top-offset: 42.85vh;
            --fall-duration: 11.791s;
            --fall-delay: 1.238s;
        }

        .star:nth-child(13) {
            --star-tail-length: 6.9em;
            --top-offset: 82.09vh;
            --fall-duration: 8.792s;
            --fall-delay: 0.383s;
        }

        .star:nth-child(14) {
            --star-tail-length: 7.42em;
            --top-offset: 21.8vh;
            --fall-duration: 8.014s;
            --fall-delay: 8.689s;
        }

        .star:nth-child(15) {
            --star-tail-length: 6.19em;
            --top-offset: 97.62vh;
            --fall-duration: 6.635s;
            --fall-delay: 5.414s;
        }

        .star:nth-child(16) {
            --star-tail-length: 5.35em;
            --top-offset: 34.99vh;
            --fall-duration: 9.77s;
            --fall-delay: 0.241s;
        }

        .star:nth-child(17) {
            --star-tail-length: 5.58em;
            --top-offset: 5.37vh;
            --fall-duration: 11.041s;
            --fall-delay: 0.932s;
        }

        .star:nth-child(18) {
            --star-tail-length: 6.74em;
            --top-offset: 99.99vh;
            --fall-duration: 8.686s;
            --fall-delay: 5.528s;
        }

        .star:nth-child(19) {
            --star-tail-length: 7.32em;
            --top-offset: 18.42vh;
            --fall-duration: 11.775s;
            --fall-delay: 4.886s;
        }

        .star:nth-child(20) {
            --star-tail-length: 5.69em;
            --top-offset: 77.72vh;
            --fall-duration: 10.481s;
            --fall-delay: 4.571s;
        }

        .star:nth-child(21) {
            --star-tail-length: 6.17em;
            --top-offset: 71.17vh;
            --fall-duration: 11.027s;
            --fall-delay: 7.385s;
        }

        .star:nth-child(22) {
            --star-tail-length: 5.67em;
            --top-offset: 13.95vh;
            --fall-duration: 9.619s;
            --fall-delay: 7.729s;
        }

        .star:nth-child(23) {
            --star-tail-length: 7.34em;
            --top-offset: 33.95vh;
            --fall-duration: 7.431s;
            --fall-delay: 5.263s;
        }

        .star:nth-child(24) {
            --star-tail-length: 6.5em;
            --top-offset: 77.69vh;
            --fall-duration: 10.381s;
            --fall-delay: 9.089s;
        }

        .star:nth-child(25) {
            --star-tail-length: 6.97em;
            --top-offset: 71.98vh;
            --fall-duration: 10.016s;
            --fall-delay: 9.417s;
        }

        .star:nth-child(26) {
            --star-tail-length: 6.68em;
            --top-offset: 41.49vh;
            --fall-duration: 7.489s;
            --fall-delay: 2.808s;
        }

        .star:nth-child(27) {
            --star-tail-length: 7.2em;
            --top-offset: 51.69vh;
            --fall-duration: 7.492s;
            --fall-delay: 0.901s;
        }

        .star:nth-child(28) {
            --star-tail-length: 5.83em;
            --top-offset: 27.42vh;
            --fall-duration: 8.648s;
            --fall-delay: 7.586s;
        }

        .star:nth-child(29) {
            --star-tail-length: 5.5em;
            --top-offset: 70.52vh;
            --fall-duration: 9.243s;
            --fall-delay: 9.808s;
        }

        .star:nth-child(30) {
            --star-tail-length: 5.93em;
            --top-offset: 12.78vh;
            --fall-duration: 7.615s;
            --fall-delay: 4.902s;
        }

        .star:nth-child(31) {
            --star-tail-length: 5.65em;
            --top-offset: 19.84vh;
            --fall-duration: 11.323s;
            --fall-delay: 4.827s;
        }

        .star:nth-child(32) {
            --star-tail-length: 6.89em;
            --top-offset: 39.05vh;
            --fall-duration: 6.61s;
            --fall-delay: 0.651s;
        }

        .star:nth-child(33) {
            --star-tail-length: 7.33em;
            --top-offset: 33.92vh;
            --fall-duration: 8.472s;
            --fall-delay: 7.009s;
        }

        .star:nth-child(34) {
            --star-tail-length: 5.24em;
            --top-offset: 44.54vh;
            --fall-duration: 7.732s;
            --fall-delay: 5.181s;
        }

        .star:nth-child(35) {
            --star-tail-length: 6.77em;
            --top-offset: 70.03vh;
            --fall-duration: 9.179s;
            --fall-delay: 8.504s;
        }

        .star:nth-child(36) {
            --star-tail-length: 5.52em;
            --top-offset: 40vh;
            --fall-duration: 7.326s;
            --fall-delay: 2.318s;
        }

        .star:nth-child(37) {
            --star-tail-length: 5.06em;
            --top-offset: 25.83vh;
            --fall-duration: 9.761s;
            --fall-delay: 6.239s;
        }

        .star:nth-child(38) {
            --star-tail-length: 6.65em;
            --top-offset: 34.29vh;
            --fall-duration: 7.06s;
            --fall-delay: 4.352s;
        }

        .star:nth-child(39) {
            --star-tail-length: 6.7em;
            --top-offset: 39.21vh;
            --fall-duration: 8.302s;
            --fall-delay: 9.988s;
        }

        .star:nth-child(40) {
            --star-tail-length: 5.18em;
            --top-offset: 36.94vh;
            --fall-duration: 10.936s;
            --fall-delay: 3.938s;
        }

        .star:nth-child(41) {
            --star-tail-length: 7.4em;
            --top-offset: 86.17vh;
            --fall-duration: 10.121s;
            --fall-delay: 7.885s;
        }

        .star:nth-child(42) {
            --star-tail-length: 5.81em;
            --top-offset: 1.7vh;
            --fall-duration: 6.996s;
            --fall-delay: 6.206s;
        }

        .star:nth-child(43) {
            --star-tail-length: 5.76em;
            --top-offset: 35.56vh;
            --fall-duration: 6.848s;
            --fall-delay: 4.828s;
        }

        .star:nth-child(44) {
            --star-tail-length: 6.59em;
            --top-offset: 19.48vh;
            --fall-duration: 6.291s;
            --fall-delay: 3.891s;
        }

        .star:nth-child(45) {
            --star-tail-length: 6.86em;
            --top-offset: 79.53vh;
            --fall-duration: 8.747s;
            --fall-delay: 9.592s;
        }

        .star:nth-child(46) {
            --star-tail-length: 5.97em;
            --top-offset: 95.5vh;
            --fall-duration: 6.912s;
            --fall-delay: 8.168s;
        }

        .star:nth-child(47) {
            --star-tail-length: 5.02em;
            --top-offset: 73.05vh;
            --fall-duration: 10.609s;
            --fall-delay: 5.621s;
        }

        .star:nth-child(48) {
            --star-tail-length: 5.82em;
            --top-offset: 40.77vh;
            --fall-duration: 9.49s;
            --fall-delay: 0.976s;
        }

        .star:nth-child(49) {
            --star-tail-length: 6.6em;
            --top-offset: 66.78vh;
            --fall-duration: 7.654s;
            --fall-delay: 9.05s;
        }

        .star:nth-child(50) {
            --star-tail-length: 7.26em;
            --top-offset: 25.19vh;
            --fall-duration: 7.276s;
            --fall-delay: 0.22s;
        }

        .star::before,
        .star::after {
            position: absolute;
            content: "";
            top: 0;
            left: calc(var(--star-width) / -2);
            width: var(--star-width);
            height: 100%;
            background: linear-gradient(45deg, transparent, currentColor, transparent);
            border-radius: inherit;
            animation: blink 2s linear infinite;
        }

        .star::before {
            transform: rotate(45deg);
        }

        .star::after {
            transform: rotate(-45deg);
        }

        @keyframes fall {
            to {
                transform: translate3d(-30em, 0, 0);
            }
        }

        @keyframes tail-fade {

            0%,
            50% {
                width: var(--star-tail-length);
                opacity: 1;
            }

            70%,
            80% {
                width: 0;
                opacity: 0.4;
            }

            100% {
                width: 0;
                opacity: 0;
            }
        }

        @keyframes blink {
            50% {
                opacity: 0.6;
            }
        }
    </style>
    <div class="relative flex flex-col justify-center min-h-screen overflow-hidden">
        <div class="stars" style="z-index: -1">
            <div class="star bg-orange-800 text-orange dark:bg-white text-white"></div>
            <div class="star bg-orange-800 text-orange dark:bg-white text-white"></div>
            <div class="star bg-orange-800 text-orange dark:bg-white text-white"></div>
            <div class="star bg-orange-800 text-orange dark:bg-white text-white"></div>
            <div class="star bg-orange-800 text-orange dark:bg-white text-white"></div>
            <div class="star bg-orange-800 text-orange dark:bg-white text-white"></div>
            <div class="star bg-orange-800 text-orange dark:bg-white text-white"></div>
            <div class="star bg-orange-800 text-orange dark:bg-white text-white"></div>
            <div class="star bg-orange-800 text-orange dark:bg-white text-white"></div>
            <div class="star bg-orange-800 text-orange dark:bg-white text-white"></div>
            <div class="star bg-orange-800 text-orange dark:bg-white text-white"></div>
            <div class="star bg-orange-800 text-orange dark:bg-white text-white"></div>
            <div class="star bg-orange-800 text-orange dark:bg-white text-white"></div>
            <div class="star bg-orange-800 text-orange dark:bg-white text-white"></div>
            <div class="star bg-orange-800 text-orange dark:bg-white text-white"></div>
            <div class="star bg-orange-800 text-orange dark:bg-white text-white"></div>
            <div class="star bg-orange-800 text-orange dark:bg-white text-white"></div>
            <div class="star bg-orange-800 text-orange dark:bg-white text-white"></div>
            <div class="star bg-orange-800 text-orange dark:bg-white text-white"></div>
            <div class="star bg-orange-800 text-orange dark:bg-white text-white"></div>
            <div class="star bg-orange-800 text-orange dark:bg-white text-white"></div>
            <div class="star bg-orange-800 text-orange dark:bg-white text-white"></div>
            <div class="star bg-orange-800 text-orange dark:bg-white text-white"></div>
            <div class="star bg-orange-800 text-orange dark:bg-white text-white"></div>
            <div class="star bg-orange-800 text-orange dark:bg-white text-white"></div>
            <div class="star bg-orange-800 text-orange dark:bg-white text-white"></div>
            <div class="star bg-orange-800 text-orange dark:bg-white text-white"></div>
            <div class="star bg-orange-800 text-orange dark:bg-white text-white"></div>
            <div class="star bg-orange-800 text-orange dark:bg-white text-white"></div>
            <div class="star bg-orange-800 text-orange dark:bg-white text-white"></div>
            <div class="star bg-orange-800 text-orange dark:bg-white text-white"></div>
            <div class="star bg-orange-800 text-orange dark:bg-white text-white"></div>
            <div class="star bg-orange-800 text-orange dark:bg-white text-white"></div>
            <div class="star bg-orange-800 text-orange dark:bg-white text-white"></div>
            <div class="star bg-orange-800 text-orange dark:bg-white text-white"></div>
            <div class="star bg-orange-800 text-orange dark:bg-white text-white"></div>
            <div class="star bg-orange-800 text-orange dark:bg-white text-white"></div>
            <div class="star bg-orange-800 text-orange dark:bg-white text-white"></div>
            <div class="star bg-orange-800 text-orange dark:bg-white text-white"></div>
            <div class="star bg-orange-800 text-orange dark:bg-white text-white"></div>
            <div class="star bg-orange-800 text-orange dark:bg-white text-white"></div>
            <div class="star bg-orange-800 text-orange dark:bg-white text-white"></div>
            <div class="star bg-orange-800 text-orange dark:bg-white text-white"></div>
            <div class="star bg-orange-800 text-orange dark:bg-white text-white"></div>
            <div class="star bg-orange-800 text-orange dark:bg-white text-white"></div>
            <div class="star bg-orange-800 text-orange dark:bg-white text-white"></div>
            <div class="star bg-orange-800 text-orange dark:bg-white text-white"></div>
            <div class="star bg-orange-800 text-orange dark:bg-white text-white"></div>
            <div class="star bg-orange-800 text-orange dark:bg-white text-white"></div>
            <div class="star bg-orange-800 text-orange dark:bg-white text-white"></div>
        </div>
        <div
            class="w-[80%] m-auto bg-white dark:bg-slate-800/60 rounded shadow-lg ring-2 ring-slate-300/50 dark:ring-slate-700/50 sm:max-w-md">
            <div class="text-center p-6 bg-slate-900 rounded-t">
                <a href="{{ route('login') }}"><img src="assets/images/kejaksaan-logo.png" alt=""
                        class="w-20 h-20 mx-auto mb-2"></a>
                <h3 class="font-semibold text-white text-xxl mb-1">OTENTIK</h3>
                <p class="text-xs text-slate-400">KEJAKSAAN REPUBLIK INDONESIA</p>
            </div>

            <form class="p-6" method="POST" action="{{ route('login.form') }}" data-toggle="validator">
                {{ csrf_field() }}
                <div>
                    <label for="username" class="font-medium text-sm text-slate-600 dark:text-slate-400">Username</label>
                    <input type="username" id="username" name="username"
                        class="form-input w-full rounded-md mt-1 border border-slate-300/60 dark:border-slate-700 dark:text-slate-300 bg-transparent px-3 py-2 focus:outline-none focus:ring-0 placeholder:text-slate-400/70 placeholder:font-normal placeholder:text-sm hover:border-slate-400 focus:border-primary-500 dark:focus:border-primary-500  dark:hover:border-slate-700"
                        placeholder="Masukkan Username" value="superadmin" required>
                </div>
                <div class="mt-4">
                    <label for="password" class="font-medium text-sm text-slate-600 dark:text-slate-400">Password</label>
                    <input type="password" id="password" name="password"
                        class="form-input w-full rounded-md mt-1 border border-slate-300/60 dark:border-slate-700 dark:text-slate-300 bg-transparent px-3 py-2 focus:outline-none focus:ring-0 placeholder:text-slate-400/70 placeholder:font-normal placeholder:text-sm hover:border-slate-400 focus:border-primary-500 dark:focus:border-primary-500  dark:hover:border-slate-700"
                        placeholder="Masukkan Password" value="123" required>
                </div>
                <!-- <a href="#" class="text-xs font-medium text-brand-500 underline ">Forget Password?</a> -->
                <div class="block mt-3">
                    <label class="custom-label block dark:text-slate-300">
                        <div
                            class="bg-white dark:bg-slate-700  border border-slate-200 dark:border-slate-600 rounded w-4 h-4  inline-block leading-4 text-center -mb-[3px]">
                            <input type="checkbox" class="hidden">
                            <i class="fas fa-check hidden text-xs text-slate-700 dark:text-slate-200"></i>
                        </div>
                        Remember me
                    </label>
                </div>
                <div class="mt-4">
                    <button
                        class="w-full px-2 py-2 tracking-wide text-white transition-colors duration-200 transform bg-brand-500 rounded hover:bg-brand-600 focus:outline-none focus:bg-brand-600">
                        Login
                    </button>
                </div>
            </form>
            <!-- <p class="mb-5 text-sm font-medium text-center text-slate-500"> Don't have an account? <a href="auth-register.html"
                                                                                                                                    class="font-medium text-brand-500 hover:underline">Sign up</a>
                                                                                                                                </p> -->
        </div>
    </div>
@endsection
