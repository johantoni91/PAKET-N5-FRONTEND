<div
    class="min-h-full dark:bg-slate-100 z-40 fixed print:hidden bg-gradient-to-b from-violet-800 to-red-500 dark:bg-[#603dc3] main-sidebar duration-300 group-data-[sidebar=dark]:bg-[#603dc3] group-data-[sidebar=brand]:bg-brand group-[.dark]:group-data-[sidebar=brand]:bg-[#603dc3]">
    <div class="text-center h-[64px] flex justify-center items-center dark:bg-zinc-500">
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
    <div class="border-r pb-14 h-[100vh] dark:bg-gradient-to-b dark:from-zinc-500 dark:to-cyan-300 dark:text-white group-data-[sidebar=dark]:border-slate-700/40 group-data-[sidebar=brand]:border-slate-700/40"
        data-simplebar>
        <div class="p-4 block">
            <ul class="navbar-nav">
                <li
                    class="uppercase text-[11px]  text-primary-500 dark:text-primary-400 mt-0 leading-4 mb-2 group-data-[sidebar=dark]:text-primary-400 group-data-[sidebar=brand]:text-primary-300">
                    <span class="text-[9px] text-white dark:text-black font-semibold">Menu</span>
                </li>
                <li>
                    <div id="parent-accordion" data-fc-type="accordion">
                        <a href="{{ route('dashboard') }}"
                            class="nav-link dark:text-black hover:text-black rounded-md dark:hover:text-slate-200 flex items-center decoration-0 px-3 py-3 cursor-pointer group-data-[sidebar=dark]:hover:text-slate-200">
                            <span data-lucide="home" class="w-5 h-5 text-center me-2"></span>
                            <span>Beranda</span>
                        </a>
                        @foreach ($profile['routes'] as $item)
                            <a href="{{ route($item) }}"
                                class="nav-link dark:text-black hover:text-black rounded-md dark:hover:text-slate-200 flex items-center decoration-0 px-3 py-3 cursor-pointer group-data-[sidebar=dark]:hover:text-slate-200">
                                <span data-lucide="{{ $profile['icons'][$loop->iteration - 1] }}"
                                    class="w-5 h-5 text-center me-2"></span>
                                <span>{{ $profile['titles'][$loop->iteration - 1] }}</span>
                            </a>
                        @endforeach
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
