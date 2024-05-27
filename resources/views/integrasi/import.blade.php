@extends('partials.main')
@section('content')
    @include('partials.sidebar')
    @include('partials.topbar')
    <style>
        .container {
            position: relative;
            max-width: 850px;
            width: 100%;
            background: #fff;
            padding: 40px 30px;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
            perspective: 2700px;
        }

        .container .cover {
            position: absolute;
            top: 0;
            left: 50%;
            height: 100%;
            width: 50%;
            z-index: 98;
            transition: all 1s ease;
            transform-origin: left;
            transform-style: preserve-3d;
        }

        .container #flip:checked~.cover {
            transform: rotateY(-180deg);
        }

        .container .cover .front,
        .container .cover .back {
            position: absolute;
            top: 0;
            left: 0;
            height: 100%;
            width: 100%;
        }

        .cover .back {
            transform: rotateY(180deg);
            backface-visibility: hidden;
        }

        .container .cover::before,
        .container .cover::after {
            content: '';
            position: absolute;
            height: 100%;
            width: 100%;
            background: #7d2ae8;
            opacity: 0.5;
            z-index: 12;
        }

        .container .cover::after {
            opacity: 0.3;
            transform: rotateY(180deg);
            backface-visibility: hidden;
        }

        .container .cover img {
            position: absolute;
            height: 100%;
            width: 100%;
            object-fit: cover;
            z-index: 10;
        }

        .container .cover .text {
            position: absolute;
            z-index: 130;
            height: 100%;
            width: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .cover .text .text-1,
        .cover .text .text-2 {
            font-size: 26px;
            font-weight: 600;
            color: #fff;
            text-align: center;
        }

        .cover .text .text-2 {
            font-size: 15px;
            font-weight: 500;
        }

        .container .forms {
            height: 100%;
            width: 100%;
            background: #fff;
        }

        .container .form-content {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .form-content .login-form,
        .form-content .signup-form {
            width: calc(100% / 2 - 25px);
        }

        .forms .form-content .title {
            position: relative;
            font-size: 24px;
            font-weight: 500;
            color: #333;
        }

        .forms .form-content .title:before {
            content: '';
            position: absolute;
            left: 0;
            bottom: 0;
            height: 3px;
            width: 25px;
            background: #7d2ae8;
        }

        .forms .signup-form .title:before {
            width: 20px;
        }

        .forms .form-content .input-boxes {
            margin-top: 30px;
        }

        .forms .form-content .input-box {
            display: flex;
            align-items: center;
            height: 50px;
            width: 100%;
            margin: 10px 0;
            position: relative;
        }

        .form-content .input-box input {
            height: 100%;
            width: 100%;
            outline: none;
            border: none;
            padding: 0 30px;
            font-size: 16px;
            font-weight: 500;
            border-bottom: 2px solid rgba(0, 0, 0, 0.2);
            transition: all 0.3s ease;
        }

        .form-content .input-box input:focus,
        .form-content .input-box input:valid {
            border-color: #7d2ae8;
        }

        .form-content .input-box i {
            position: absolute;
            color: #7d2ae8;
            font-size: 17px;
        }

        .forms .form-content .text {
            font-size: 14px;
            font-weight: 500;
            color: #333;
        }

        .forms .form-content .text a {
            text-decoration: none;
        }

        .forms .form-content .text a:hover {
            text-decoration: underline;
        }

        .forms .form-content .button {
            color: #fff;
            margin-top: 40px;
        }

        .forms .form-content .button input {
            color: #fff;
            background: #7d2ae8;
            border-radius: 6px;
            padding: 0;
            cursor: pointer;
            transition: all 0.4s ease;
        }

        .forms .form-content .button input:hover {
            background: #5b13b9;
        }

        .forms .form-content label {
            color: #5b13b9;
            cursor: pointer;
        }

        .forms .form-content label:hover {
            text-decoration: underline;
        }

        .forms .form-content .login-text,
        .forms .form-content .sign-up-text {
            text-align: center;
            margin-top: 25px;
        }

        .container #flip {
            display: none;
        }

        @media (max-width: 730px) {
            .container .cover {
                display: none;
            }

            .form-content .login-form,
            .form-content .signup-form {
                width: 100%;
            }

            .form-content .signup-form {
                display: none;
            }

            .container #flip:checked~.forms .signup-form {
                display: block;
            }

            .container #flip:checked~.forms .login-form {
                display: none;
            }
        }
    </style>
    <div id="status"
        class="hidden absolute flex flex-row justify-start items-center gap-1 w-48 h-12 bottom-5 right-5 py-3 px-2 text-green-800">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-blocks">
            <rect width="7" height="7" x="14" y="3" rx="1" />
            <path d="M10 21V8a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-5a1 1 0 0 0-1-1H3" />
        </svg>
        <div id="progress" class="h-5 bg-green-800 rounded-full" style="width: 30%"></div>
    </div>
    <div class="ltr:flex flex-1 rtl:flex-row-reverse">
        <div
            class="page-wrapper relative ltr:ml-auto rtl:mr-auto rtl:ml-0 w-[calc(100%-260px)] px-4 pt-[64px] duration-300">
            <div class="xl:w-full">
                <div class="flex flex-wrap">
                    <div class="flex items-center py-4 w-full">
                        <div class="w-full">
                            <div class="flex flex-wrap justify-between">
                                <div class="items-center ">
                                    <h1 class="font-medium text-3xl block dark:text-slate-100">Integrasi Data Pegawai</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="xl:w-full min-h-[calc(100vh-138px)] pb-14">
                <div class="container">
                    <input type="checkbox" id="flip">
                    <div class="cover">
                        <div class="front">
                            <img src="{{ asset('assets/images/auth.jpg') }}" alt="">
                        </div>
                    </div>
                    <div class="forms">
                        <div class="form-content">
                            <div class="login-form">
                                <div class="title">Autentikasi</div>
                                <form action="#">
                                    <div class="input-boxes">
                                        <div class="input-box">
                                            <input type="text" placeholder="Link" required>
                                        </div>
                                        <div class="input-box">
                                            <input type="text" placeholder="Username" required>
                                        </div>
                                        <div class="input-box">
                                            <input type="text" placeholder="Password" required>
                                        </div>
                                        <div class="input-box">
                                            <i class="fas fa-lock"></i>
                                            <input type="text" placeholder="Token (Opsional)" required>
                                        </div>
                                        <div class="button input-box">
                                            <input type="submit" value="Kirim">
                                        </div>
                                        <div class="text sign-up-text">
                                            <label for="flip">Integrasi tanpa
                                                autentikasi</label>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="signup-form">
                                <div class="title">Non Autentikasi</div>
                                <form action="#">
                                    <div class="input-boxes">
                                        <div class="input-box">
                                            <i class="fas fa-user"></i>
                                            <input type="text" placeholder="Link" required>
                                        </div>
                                        <div class="button input-box">
                                            <input type="submit" value="Kirim">
                                        </div>
                                        <div class="text sign-up-text">
                                            <label for="flip">Autentikasi</label>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @include('partials.footer')
            </div>
        </div>
    </div>
@endsection
