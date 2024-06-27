<div
    class="min-h-full z-40 fixed dark:bg-gradient-to-b dark:from-[#1B262C] dark:via-[#0F4C75] dark:to-[#3282B8] bg-gradient-to-b from-[#F4CE14] to-[#379777] main-sidebar duration-300 group-data-[sidebar=dark]:bg-[#603dc3] group-data-[sidebar=brand]:bg-brand group-[.dark]:group-data-[sidebar=brand]:bg-[#603dc3]">
    <div class="area">
        <ul class="circles">
            @for ($i = 0; $i < 18; $i++)
                <li class="{{ $starterPack['theme']['bubble'] }}">
                </li>
            @endfor
        </ul>
    </div>
    <div class="text-center h-[64px] flex justify-center items-center">
        <a href="{{ route('dashboard') }}" class="logo">
            <span>
                <img src="{{ asset('assets/images/kejaksaan-logo.png') }}" alt="logo-small"
                    class="logo-sm h-8 align-middle inline-block">
            </span>
            <span>
                <img src="{{ asset('assets/images/otentik.png') }}" alt="logo-large"
                    class="logo-lg h-[28px] logo-light hidden dark:inline-block ms-1 group-data-[sidebar=dark]:inline-block group-data-[sidebar=brand]:inline-block">
                <img src="{{ asset('assets/images/logo.png') }}" alt="logo-large"
                    class="logo-lg h-[28px] logo-dark inline-block dark:hidden invert-0 ms-1 group-data-[sidebar=dark]:hidden group-data-[sidebar=brand]:hidden">
            </span>
        </a>
    </div>
    <div class="border-r pb-14 h-[100vh] dark:text-white group-data-[sidebar=dark]:border-slate-700/40 group-data-[sidebar=brand]:border-slate-700/40"
        data-simplebar>
        <div class="p-4 block">
            <ul class="navbar-nav">
                <li>
                    <div id="parent-accordion" data-fc-type="accordion">
                        <a href="{{ route('dashboard') }}"
                            class="{{ request()->routeIs('dashboard') ? 'text-black bg-white dark:text-black font-bold' : '' }} nav-link text-black dark:text-white hover:font-semibold hover:bg-slate-100/50 rounded-md dark:hover:text-black flex items-center decoration-0 px-3 py-3 cursor-pointer group-data-[sidebar=dark]:hover:text-slate-200">
                            <span data-lucide="home" class="w-5 h-5 text-center me-2"></span>
                            <span>Beranda</span>
                        </a>
                        @foreach ($starterPack['routes'] as $item)
                            @if (!$loop->count >= 9)
                                <a href="{{ route($item) }}"
                                    class="{{ request()->routeIs($item) ? 'text-black bg-white dark:text-black font-bold' : '' }} nav-link text-black dark:text-white hover:font-semibold hover:bg-slate-100/50 my-1 rounded-md dark:hover:text-black flex items-center decoration-0 px-3 py-3 cursor-pointer group-data-[sidebar=dark]:hover:text-slate-200">
                                    <span data-lucide="{{ $starterPack['icons'][$loop->iteration - 1] }}"
                                        class="w-5 h-5 text-center me-2"></span>
                                    <span>{{ $starterPack['titles'][$loop->iteration - 1] }}</span>
                                </a>
                            @else
                                @if ($loop->index <= 9)
                                    <a href="{{ route($item) }}"
                                        class="{{ request()->routeIs($item) ? 'text-black bg-white dark:text-black font-bold' : '' }} nav-link text-black dark:text-white hover:font-semibold hover:bg-slate-100/50 my-1 rounded-md dark:hover:text-black flex items-center decoration-0 px-3 py-3 cursor-pointer group-data-[sidebar=dark]:hover:text-slate-200">
                                        <span data-lucide="{{ $starterPack['icons'][$loop->iteration - 1] }}"
                                            class="w-5 h-5 text-center me-2"></span>
                                        <span>{{ $starterPack['titles'][$loop->iteration - 1] }}</span>
                                    </a>
                                @elseif($loop->index > 10 && $loop->last == false)

                                @elseif($loop->last)
                                    <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown"
                                        class="w-full nav-link dark:text-white text-black hover:bg-slate-100/50 rounded-md dark:hover:text-black flex items-center decoration-0 px-3 py-3 cursor-pointer group-data-[sidebar=dark]:hover:text-slate-200"
                                        type="button"><span data-lucide="wrench"
                                            class="w-5 h-5 text-center me-2"></span> Tambahan
                                        <svg class="w-2.5 h-2.5 ms-auto" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="m1 1 4 4 4-4" />
                                        </svg>
                                    </button>
                                @endif

                                <!-- Dropdown menu -->
                                <div id="dropdown"
                                    class="z-10 bg-slate-100 hidden shadow-lg shadow-[#0F4C75] divide-y divide-gray-100 rounded-lg shadow w-full dark:bg-slate-900">
                                    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                                        aria-labelledby="dropdownDefaultButton">
                                        @foreach ($starterPack['routes'] as $i)
                                            @if ($loop->index > 9)
                                                <li>
                                                    <a href="{{ route($i) }}"
                                                        class="{{ request()->routeIs($item) ? 'text-black dark:text-black font-semibold' : '' }} nav-link text-black dark:text-white hover:text-black hover:bg-slate-100/50 my-1 rounded-md dark:hover:text-slate-200 flex items-center decoration-0 px-3 py-3 cursor-pointer group-data-[sidebar=dark]:hover:text-slate-200">
                                                        <span
                                                            data-lucide="{{ $starterPack['icons'][$loop->iteration - 1] }}"
                                                            class="w-5 h-5 text-center me-2"></span>
                                                        <span>{{ $starterPack['titles'][$loop->iteration - 1] }}</span></a>
                                                </li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
