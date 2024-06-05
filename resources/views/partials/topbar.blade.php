<nav id="topbar"
    class="topbar border-b  dark:border-slate-700/40  fixed inset-x-0  duration-300
     block print:hidden z-50">
    <div
        class="mx-0 flex max-w-full flex-wrap items-center lg:mx-auto relative top-[50%] start-[50%] transform -translate-x-1/2 -translate-y-1/2">
        <div class="ltr:mx-2  rtl:mx-2">
            <button id="toggle-menu-hide" class="button-menu-mobile flex rounded-full md:me-0 relative">
                <!-- <i class="ti ti-chevrons-left text-3xl  top-icon"></i> -->
                <i data-lucide="menu" class="top-icon w-5 h-5 dark:text-white"></i>
            </button>
        </div>
        <div class="order-1 ltr:ms-auto rtl:ms-0 rtl:me-auto flex items-center md:order-2">
            @if (session('data')['roles'] == 'admin')
                <div class="ltr:me-2 ltr:md:me-4 rtl:me-0 rtl:ms-2 rtl:lg:me-0 rtl:md:ms-4">
                    <a href="{{ route('signature') }}" class="flex rounded-full md:me-0 relative">
                        <span data-lucide="pen-line" class="top-icon w-5 h-5 dark:text-white"></span>
                    </a>
                </div>
            @endif
            <div class="ltr:me-2 ltr:md:me-4 rtl:me-0 rtl:ms-2 rtl:lg:me-0 rtl:md:ms-4">
                <a href="{{ route('inbox') }}" class="flex rounded-full md:me-0 relative">
                    <span data-lucide="mail" class="top-icon w-5 h-5 dark:text-white"></span>
                </a>
            </div>
            <div class="ltr:me-2 ltr:md:me-4 rtl:me-0 rtl:ms-2 rtl:lg:me-0 rtl:md:ms-4">
                <button id="toggle-theme" class="flex rounded-full md:me-0 relative">
                    <span data-lucide="moon" class="top-icon w-5 h-5 dark"></span>
                    <span data-lucide="sun" class="top-icon w-5 h-5 light hidden dark:text-white"></span>
                </button>
            </div>
            <div class="ltr:me-2 ltr:lg:me-4 rtl:me-0 rtl:ms-2 rtl:lg:me-0 rtl:md:ms-4 dropdown relative">
                <button type="button" class="dropdown-toggle flex rounded-full md:me-0" id="Notifications"
                    aria-expanded="false" data-fc-autoclose="both" data-fc-type="dropdown">
                    <span data-lucide="bell" class="top-icon w-5 h-5 dark:text-white"></span>
                    <small class="bg-yellow-500 rounded-full px-1.5 font-bold dark:text-white"
                        style="position: absolute; top: -10px; right: -5px;" id="notif_count"></small>
                </button>

                <div class="left-auto right-0 z-50 my-1 hidden w-64
            list-none divide-y h-52 divide-gray-100 rounded border border-slate-700/10
           text-base shadow dark:divide-gray-600 bg-white
            dark:bg-slate-800"
                    id="navNotifications" data-simplebar>
                    <ul class="py-1" id="notif" aria-labelledby="navNotifications">
                        <script>
                            $(function() {
                                setInterval(() => {
                                    $.get("{{ route('notif') }}", function(data) {
                                        if (data.count != 0) {
                                            $("#notif_count").html(data.count)
                                            $("#notif").html(data.view)
                                        }
                                    })
                                }, 8000);
                            })
                        </script>
                    </ul>
                </div>
            </div>
            <div class="me-2  dropdown relative">
                <button type="button"
                    class="dropdown-toggle flex items-center rounded-full text-sm
            focus:bg-none focus:ring-0 dark:focus:ring-0 md:me-0"
                    id="user-profile" aria-expanded="false" data-fc-autoclose="both" data-fc-type="dropdown">
                    @if ($starterPack['profile']['photo'])
                        <img src="{{ Illuminate\Support\Facades\Http::get(env('API_IMG', '') . $starterPack['profile']['photo'])->failed() ? asset('assets/images/5856.jpg') : env('API_IMG', '') . $starterPack['profile']['photo'] }}"
                            alt="" class="h-8 w-8 rounded-full">
                    @else
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="h-8 w-8 rounded-full dark:text-white">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                        </svg>
                    @endif

                    <span class="ltr:ms-2 rtl:ms-0 rtl:me-2 hidden text-left xl:block">
                        <span
                            class="block font-medium text-slate-600 dark:text-gray-300">{{ ucfirst($starterPack['profile']['username']) }}</span>
                    </span>
                </button>

                <div class="left-auto right-0 z-50 my-1 hidden list-none
            divide-y divide-gray-100 rounded border border-slate-700/10
            text-base shadow dark:divide-gray-600 bg-white dark:bg-slate-800 w-40"
                    id="navUserdata">

                    <ul class="py-1" aria-labelledby="navUserdata">
                        <li>
                            <a href="{{ route('profile') }}"
                                class="flex items-center py-2 px-3 text-sm text-gray-700 hover:bg-gray-50
                  dark:text-gray-200 dark:hover:bg-gray-900/20
                  dark:hover:text-white">
                                <span data-lucide="user"
                                    class="w-4 h-4 inline-block text-slate-800 dark:text-slate-400 me-2"></span>
                                Profil</a>
                        </li>
                        <li>
                            <a href="{{ route('logout') }}"
                                class="flex items-center py-2 px-3 text-sm text-red-500 hover:bg-gray-50 hover:text-red-600
                            dark:text-red-500 dark:hover:bg-gray-900/20
                            dark:hover:text-red-500">
                                <span data-lucide="power"
                                    class="w-4 h-4 inline-block text-red-500 dark:text-red-500 me-2"></span>
                                Keluar</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</nav>
