@if ($item['status'] == 0)
    <div class="flex flex-row gap-1 justify-center items-center py-1 rounded-xl bg-red-800 dark:bg-cyan-300">
        <p class="text-white dark:text-black drop-shadow font-bold">Ditolak</p>
    </div>
@elseif($item['status'] == 1)
    <div
        class="flex flex-row gap-1 justify-center items-center px-2 py-1 rounded-xl bg-gradient-to-r from-violet-800 to-red-300 dark:from-zinc-500 dark:to-cyan-300">
        <svg class="animate-spin text-white dark:text-black" xmlns="http://www.w3.org/2000/svg" width="24"
            height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
            stroke-linejoin="round" class="lucide lucide-loader-circle">
            <path d="M21 12a9 9 0 1 1-6.219-8.56" />
        </svg>
        <p class="text-white dark:text-black drop-shadow font-bold">Mengajukan</p>
    </div>
@elseif($item['status'] == 2)
    <div class="flex flex-row gap-1 justify-center items-center py-1 rounded-xl bg-violet-800 dark:bg-cyan-300">
        <p class="text-white dark:text-black drop-shadow font-bold">Disetujui</p>
    </div>
@endif
