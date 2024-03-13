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
                            <div class="flex flex-wrap justify-between">
                                <div class="items-center ">
                                    <h1 class="font-medium text-3xl block dark:text-slate-100">{{ $title }}</h1>
                                </div>
                                <a href="{{ route('monitor.kartu') }}"
                                    class="text-decoration-none text-nowrap bg-transparent dark:text-white flex flex-row gap-2 rounded-lg items-center px-1 hover:border-b-4 hover:border-blue-500">
                                    <span data-lucide="monitor"
                                        class="w-5 h-5 text-center text-slate-800 dark:text-slate-400"></span>
                                    <span>Monitoring Kartu</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="xl:w-full  min-h-[calc(100vh-138px)] relative pb-14">
                <div class="xl:w-full  min-h-[calc(100vh-138px)] relative pb-14">
                    <div class="grid md:grid-cols-12 lg:grid-cols-12 xl:grid-cols-12 gap-4 mb-4">

                        <div class="sm:col-span-12  md:col-span-12 lg:col-span-12 xl:col-span-12 xl:col-start-0 ">
                            <div
                                class="bg-white dark:bg-gray-900 border border-slate-200 dark:border-slate-700/40  rounded-md w-full relative mb-4">
                                <div class="border-b border-slate-200 dark:border-slate-700/40 dark:text-slate-300/70">
                                    <div class="flex-none md:flex">
                                        <h4 class="font-medium py-3 px-4 text-lg flex-1 self-center mb-2 md:mb-0">Layout
                                            Kartu</h4>
                                        <ul
                                            class="flex flex-wrap text-sm font-medium text-center text-gray-500 border-b border-gray-200 dark:border-gray-700 dark:text-gray-400">
                                            <li class="me-2">
                                                <a href="#" aria-current="page"
                                                    class="inline-block p-4 text-blue-600 bg-gray-100 rounded-t-lg active dark:bg-gray-800 dark:text-blue-500">Kartu
                                                    1</a>
                                            </li>
                                            <li class="me-2">
                                                <a href="#"
                                                    class="inline-block p-4 rounded-t-lg hover:text-gray-600 hover:bg-gray-50 dark:hover:bg-gray-800 dark:hover:text-gray-300">Kartu
                                                    2</a>
                                            </li>
                                            <li class="me-2">
                                                <a href="#"
                                                    class="inline-block p-4 rounded-t-lg hover:text-gray-600 hover:bg-gray-50 dark:hover:bg-gray-800 dark:hover:text-gray-300">Kartu
                                                    3</a>
                                            </li>
                                            <li class="me-2">
                                                <a href="#"
                                                    class="inline-block p-4 rounded-t-lg hover:text-gray-600 hover:bg-gray-50 dark:hover:bg-gray-800 dark:hover:text-gray-300">Kartu
                                                    4</a>
                                            </li>
                                        </ul>

                                        {{-- <button type="button" data-modal-target="create" data-modal-toggle="create"
                                            class="focus:outline-none text-black hover:text-blue-500 dark:text-primary-500 dark:hover:text-white dark:border-gray-700 dark:hover:bg-primary-500 text-sm font-medium py-1 px-3 rounded-lg">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M10.343 3.94c.09-.542.56-.94 1.11-.94h1.093c.55 0 1.02.398 1.11.94l.149.894c.07.424.384.764.78.93.398.164.855.142 1.205-.108l.737-.527a1.125 1.125 0 0 1 1.45.12l.773.774c.39.389.44 1.002.12 1.45l-.527.737c-.25.35-.272.806-.107 1.204.165.397.505.71.93.78l.893.15c.543.09.94.559.94 1.109v1.094c0 .55-.397 1.02-.94 1.11l-.894.149c-.424.07-.764.383-.929.78-.165.398-.143.854.107 1.204l.527.738c.32.447.269 1.06-.12 1.45l-.774.773a1.125 1.125 0 0 1-1.449.12l-.738-.527c-.35-.25-.806-.272-1.203-.107-.398.165-.71.505-.781.929l-.149.894c-.09.542-.56.94-1.11.94h-1.094c-.55 0-1.019-.398-1.11-.94l-.148-.894c-.071-.424-.384-.764-.781-.93-.398-.164-.854-.142-1.204.108l-.738.527c-.447.32-1.06.269-1.45-.12l-.773-.774a1.125 1.125 0 0 1-.12-1.45l.527-.737c.25-.35.272-.806.108-1.204-.165-.397-.506-.71-.93-.78l-.894-.15c-.542-.09-.94-.56-.94-1.109v-1.094c0-.55.398-1.02.94-1.11l.894-.149c.424-.07.765-.383.93-.78.165-.398.143-.854-.108-1.204l-.526-.738a1.125 1.125 0 0 1 .12-1.45l.773-.773a1.125 1.125 0 0 1 1.45-.12l.737.527c.35.25.807.272 1.204.107.397-.165.71-.505.78-.929l.15-.894Z" />
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                            </svg>
                                        </button> --}}
                                    </div>
                                </div>
                                <div class="grid grid-cols-2 p-4 overflow-scroll">
                                    <div class="sm:-mx-6 lg:-mx-8">
                                        <div class="relative overflow-x-auto block w-full sm:px-6 lg:px-10">
                                            <div class="p-4 md:p-5 space-y-4">
                                                <h2 class="text-center font-bold dark:text-white">DEPAN</h2>
                                                <div class="rounded-lg border p-4">
                                                    <div class="flex flex-col mb-5">
                                                        <img src="{{ asset('/assets/images/kejaksaan-logo.png') }}"
                                                            id="new_photo" alt="new-photo"
                                                            class="mx-auto h-56 w-56 rounded-full inline-block justify-center my-3">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                            class="mx-auto h-56 w-56 rounded-full inline-block justify-center my-3 dark:text-white"
                                                            id="avatar1">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                                        </svg>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="nip"
                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NIP</label>
                                                        <input type="text" id="nip" value="1810631170189"
                                                            class="bg-transparent border-0 border-b-2 text-center w-full border-gray-300 p-2 dark:text-white" />
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="nama"
                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
                                                        <input type="text" id="nama" value="Johan Toni Wijaya"
                                                            class="bg-transparent border-0 text-center border-b-2 w-full border-gray-300 p-2 dark:text-white" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="md:p-5 space-y-4">
                                        <h2 class="text-center font-bold dark:text-white">BELAKANG</h2>
                                        <div
                                            class="flex flex-col m-5 h-[95%] bg-red-700 justify-center items-center rounded-lg">
                                            <img src="{{ asset('/assets/images/qrcode.png') }}" id="new_photo"
                                                alt="new-photo"
                                                class="mx-auto h-56 w-56 rounded-full inline-block justify-center my-3">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @include('partials.footer')
            </div>
        </div>
    </div>
@endsection
