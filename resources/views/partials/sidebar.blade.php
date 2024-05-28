<div
    class="min-h-full z-40 fixed bg-gradient-to-b dark:bg-gradient-to-b dark:from-cyan-400 dark:to-cyan-900 {{ $starterPack['bg_light'] }} main-sidebar duration-300 group-data-[sidebar=dark]:bg-[#603dc3] group-data-[sidebar=brand]:bg-brand group-[.dark]:group-data-[sidebar=brand]:bg-[#603dc3]">
    <div class="area">
        <ul class="circles">
            @for ($i = 0; $i < 18; $i++)
                <li
                    class="bg-zinc-500/50 dark:bg-gradient-to-br dark:from-violet-800 dark:via-pink-600 dark:to-red-500 shadow-lg shadow-green-400 rounded-lg">
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
                            class="{{ request()->routeIs('dashboard') ? 'text-black bg-white dark:text-black font-semibold' : '' }} nav-link dark:text-black hover:text-black hover:bg-slate-100/50 rounded-md dark:hover:text-slate-200 flex items-center decoration-0 px-3 py-3 cursor-pointer group-data-[sidebar=dark]:hover:text-slate-200">
                            <span data-lucide="home" class="w-5 h-5 text-center me-2"></span>
                            <span>Beranda</span>
                        </a>
                        @foreach ($starterPack['routes'] as $item)
                            <a href="{{ $item == 'smart' ? '#' : route($item) }}"
                                class="{{ request()->routeIs($item) ? 'text-black bg-white dark:text-black font-semibold' : '' }} nav-link dark:text-black hover:text-black hover:bg-slate-100/50 my-1 rounded-md dark:hover:text-slate-200 flex items-center decoration-0 px-3 py-3 cursor-pointer group-data-[sidebar=dark]:hover:text-slate-200">
                                <span data-lucide="{{ $starterPack['icons'][$loop->iteration - 1] }}"
                                    class="w-5 h-5 text-center me-2"></span>
                                <span>{{ $starterPack['titles'][$loop->iteration - 1] }}</span>
                            </a>
                        @endforeach
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
