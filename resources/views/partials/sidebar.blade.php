<div
    class="min-h-full dark:bg-slate-100 z-[99]  fixed inset-y-0 print:hidden bg-gradient-to-t from-[#6f3dc3] from-10% via-[#603dc3] via-40% to-[#5c3dc3] to-100% dark:bg-[#603dc3] main-sidebar duration-300 group-data-[sidebar=dark]:bg-[#603dc3] group-data-[sidebar=brand]:bg-brand group-[.dark]:group-data-[sidebar=brand]:bg-[#603dc3]">
    <div
        class="text-center border-b bg-[#603dc3] border-r h-[64px] flex justify-center items-center brand-logo dark:bg-[#603dc3] dark:border-slate-700/40 group-data-[sidebar=dark]:bg-[#603dc3] group-data-[sidebar=dark]:border-slate-700/40 group-data-[sidebar=brand]:bg-brand group-[.dark]:group-data-[sidebar=brand]:bg-[#603dc3] group-data-[sidebar=brand]:border-slate-700/40">
        <a href="{{ route('dashboard') }}" class="logo">
            <span>
                <img src="{{ asset('assets/images/kejaksaan-logo.png') }}" alt="logo-small"
                    class="logo-sm h-8 align-middle inline-block">
            </span>
            <span>
                <img src="{{ asset('assets/images/otentik.png') }}" alt="logo-large"
                    class="logo-lg h-[28px] logo-light hidden dark:inline-block ms-1 group-data-[sidebar=dark]:inline-block group-data-[sidebar=brand]:inline-block">
                <img src="{{ asset('assets/images/logo.png') }}" alt="logo-large"
                    class="logo-lg h-[28px] logo-dark inline-block dark:hidden ms-1 group-data-[sidebar=dark]:hidden group-data-[sidebar=brand]:hidden">
            </span>
        </a>
    </div>
    <div class="border-r pb-14 h-[100vh] dark:bg-[#603dc3] dark:border-slate-700/40 group-data-[sidebar=dark]:border-slate-700/40 group-data-[sidebar=brand]:border-slate-700/40"
        data-simplebar>
        <div class="p-4 block">
            <ul class="navbar-nav">
                <li
                    class="uppercase text-[11px]  text-primary-500 dark:text-primary-400 mt-0 leading-4 mb-2 group-data-[sidebar=dark]:text-primary-400 group-data-[sidebar=brand]:text-primary-300">
                    <span
                        class="text-[9px] text-slate-600 dark:text-slate-500 group-data-[sidebar=dark]:text-slate-500 group-data-[sidebar=brand]:text-slate-400">Menu
                        Utama</span>
                </li>
                <li>
                    <div id="parent-accordion" data-fc-type="accordion">
                        <a href="#"
                            class="nav-link hover:bg-transparent hover:text-black  rounded-md dark:hover:text-slate-200   flex items-center  decoration-0 px-3 py-3 cursor-pointer group-data-[sidebar=dark]:hover:text-slate-200 group-data-[sidebar=brand]:hover:text-slate-200 "
                            data-fc-type="collapse" data-fc-parent="parent-accordion">
                            <span data-lucide="home"
                                class="w-5 h-5 text-center text-slate-800 dark:text-slate-400 me-2 group-data-[sidebar=dark]:text-slate-400 group-data-[sidebar=brand]:text-slate-400"></span>
                            <span>Admin</span>
                            <i
                                class="icofont-thin-down ms-auto inline-block text-[14px] transform transition-transform duration-300 text-slate-800 dark:text-slate-400 group-data-[sidebar=dark]:text-slate-400 group-data-[sidebar=brand]:text-slate-400 fc-collapse-open:rotate-180 "></i>
                        </a>

                        <div id="Admin-flush" class="hidden  overflow-hidden">
                            <ul class="nav flex-col flex flex-wrap ps-0 mb-0 ms-2">
                                <li class="nav-item relative block">
                                    <a href="{{ route('dashboard') }}"
                                        class="nav-link  hover:text-primary-500  rounded-md dark:hover:text-primary-500 relative   flex items-center decoration-0 px-3 py-3 group-data-[sidebar=brand]:hover:text-slate-200">
                                        <i
                                            class="icofont-dotted-right me-2 text-slate-600 text-[8px] group-data-[sidebar=brand]:text-slate-400 "></i>
                                        Dashboard
                                    </a>
                                </li>
                                <li class="nav-item relative block">
                                    <a href="{{ route('user.index') }}"
                                        class="nav-link  hover:text-primary-500  rounded-md dark:hover:text-primary-500 relative   flex items-center decoration-0 px-3 py-3 group-data-[sidebar=brand]:hover:text-slate-200">
                                        <i
                                            class="icofont-dotted-right me-2 text-slate-600 text-[8px] group-data-[sidebar=brand]:text-slate-400 "></i>
                                        Manajemen User
                                    </a>
                                </li>
                                <li class="nav-item relative block">
                                    <a href="{{ route('log') }}"
                                        class="nav-link  hover:text-primary-500  rounded-md dark:hover:text-primary-500 relative   flex items-center decoration-0 px-3 py-3 group-data-[sidebar=brand]:hover:text-slate-200">
                                        <i
                                            class="icofont-dotted-right me-2 text-slate-600 text-[8px] group-data-[sidebar=brand]:text-slate-400"></i>
                                        Log Aktivitas
                                    </a>
                                </li>
                            </ul>
                        </div>
                        {{-- <div
                            class="border-b border-dashed dark:border-slate-700/40 my-3 group-data-[sidebar=dark]:border-slate-700/40 group-data-[sidebar=brand]:border-slate-700/40">
                        </div>
                        <div
                            class="text-[9px] text-slate-600 dark:text-slate-500 group-data-[sidebar=dark]:text-slate-500 group-data-[sidebar=brand]:text-slate-400">
                            Pengaturan
                        </div>
                        <div data-fc-type="collapse" data-fc-parent="parent-accordion">
                            <a href="#"
                                class="nav-link hover:bg-transparent hover:text-black  rounded-md dark:hover:text-slate-200   flex items-center  decoration-0 px-3 py-3 cursor-pointer group-data-[sidebar=dark]:hover:text-slate-200 group-data-[sidebar=brand]:hover:text-slate-200">
                                <span data-lucide="box"
                                    class="w-5 h-5 text-center text-slate-800 me-2 dark:text-slate-400 group-data-[sidebar=dark]:text-slate-400 group-data-[sidebar=brand]:text-slate-400"></span>
                                <span>UI Kit</span>
                                <i
                                    class="icofont-thin-down fc-collapse-open:rotate-180 ms-auto inline-block text-[14px] transform transition-transform duration-300 text-slate-800 dark:text-slate-400 group-data-[sidebar=dark]:text-slate-400 group-data-[sidebar=brand]:text-slate-400"></i>
                            </a>
                        </div>
                        <div class="hidden  overflow-hidden">
                            <ul class="nav flex-col flex flex-wrap ps-0 mb-0 ms-2" id="UI_Kit-accordion"
                                data-fc-type="accordion">
                                <li>
                                    <div id="UI_Elements" data-fc-type="collapse" data-fc-parent="UI_Kit-accordion">
                                        <a href="#"
                                            class="nav-link hover:bg-transparent hover:text-black  rounded-md dark:hover:text-slate-200   flex items-center  decoration-0 px-3 py-3 cursor-pointer group-data-[sidebar=dark]:hover:text-slate-200 group-data-[sidebar=brand]:hover:text-slate-200"
                                            aria-expanded="false" aria-controls="UI_Elements-flush">
                                            <i
                                                class="icofont-dotted-right me-2 text-slate-600 text-[8px] group-data-[sidebar=brand]:text-slate-400"></i>
                                            <span>UI Elements</span>
                                            <i
                                                class="icofont-thin-down ms-auto inline-block text-[14px] transform transition-transform duration-300 text-slate-800 dark:text-slate-400 group-data-[sidebar=dark]:text-slate-400 group-data-[sidebar=brand]:text-slate-400 fc-collapse-open:rotate-180"></i>
                                        </a>
                                    </div>
                                    <div id="UI_Elements-flush" class=" hidden  overflow-hidden "
                                        aria-labelledby="UI_Elements">
                                        <ul class="nav flex-col flex flex-wrap ps-0 mb-0 ms-2">
                                            <li class="nav-item relative block">
                                                <a href="ui-alerts.html"
                                                    class="nav-link  hover:text-primary-500  rounded-md dark:hover:text-primary-500 relative group-data-[sidebar=brand]:hover:text-slate-200   flex items-center decoration-0 px-3 py-3">
                                                    <i
                                                        class="icofont-dotted-right me-2 text-slate-600 text-[8px] group-data-[sidebar=brand]:text-slate-400"></i>
                                                    Alerts
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </div> --}}
                    </div>
                </li>
            </ul>
            {{-- <div class="rounded-md py-4 px-3 mt-12  mb-4 relative bg-primary-300/10 text-center">
                <a href="javascript: void(0);" class="float-right close-btn text-slate-400">
                    <i class="mdi mdi-close"></i>
                </a>
                <h5
                    class="my-3 text-lg font-medium text-slate-700 dark:text-slate-300 group-data-[sidebar=dark]:text-slate-300 group-data-[sidebar=brand]:text-slate-300">
                    Sistem Informasi Otentikasi Kartu Identitas Personil</h5>
                <p class="mb-3 text-sm text-slate-400">We Design and Develop Clean and High Quality Web Applications
                </p>
                <button
                    class="px-2 py-1 mb-2 text-orange-400 hover:text-white border border-orange-300 hover:bg-orange-300 focus:outline-none  rounded text-sm  text-center dark:border-orange-300 dark:text-orange-300 dark:hover:text-white dark:hover:bg-orange-300 ">Upgrade
                    your plan</button>

            </div> --}}
        </div>
    </div>
</div>
