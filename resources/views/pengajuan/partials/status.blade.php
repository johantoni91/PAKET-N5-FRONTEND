@if ($item['status'] == 0)
    <div class="relative h-5 rounded-full bg-gray-200 dark:bg-slate-500">
        <div class="h-full animate-pulse rounded-full bg-red-500" style="width: 100%">
            <span class="absolute inset-0 flex items-center justify-center text-xs font-semibold text-white">Pengajuan
                ditolak</span>
        </div>
    </div>
@elseif($item['status'] == 1)
    <div class="relative h-5 rounded-full bg-gray-200 dark:bg-slate-500">
        <div class="h-full animate-pulse rounded-full bg-gradient-to-r from-green-500 to-blue-500" style="width: 40%">
            <span class="absolute inset-0 flex items-center justify-start text-xs font-semibold text-white">&nbsp;
                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Mengajukan</span>
        </div>
    </div>
@elseif($item['status'] == 2)
    <div class="relative h-5 rounded-full bg-gray-200 dark:bg-slate-500">
        <div class="h-full animate-pulse rounded-full bg-gradient-to-r from-green-500 to-blue-500" style="width: 70%">
            <span class="absolute inset-0 flex items-center justify-center text-xs font-semibold text-white">Proses
                pencetakan</span>
        </div>
    </div>
@elseif($item['status'] == 3)
    <div class="relative h-5 rounded-full bg-gray-200 dark:bg-slate-500">
        <div class="h-full rounded-full bg-gradient-to-r from-green-500 to-blue-500" style="width: 100%">
            <span class="absolute inset-0 flex items-center justify-center text-xs font-semibold text-white">Telah
                dicetak</span>
        </div>
    </div>
@endif
