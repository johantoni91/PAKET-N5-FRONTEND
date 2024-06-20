<div class="col-span-1">
    <div class="flex flex-row mb-1 gap-1 items-center">
        <input type="checkbox" name="roles[]" id="user{{ $item['id'] }}" value="user"
            {{ $route == null ? '' : (in_array('user', $route) ? 'checked' : '') }}
            class="bg-slate-500 rounded border-0">
        <label for="user{{ $item['id'] }}" class="text-xs font-normal">Pengguna</label>
    </div>
    <div class="flex flex-row mb-1 gap-1 items-center">
        <input type="checkbox" name="roles[]" id="satker{{ $item['id'] }}" value="satker"
            {{ $route == null ? '' : (in_array('satker', $route) ? 'checked' : '') }}
            class="bg-slate-500 rounded border-0">
        <label class="text-xs font-normal" for="satker{{ $item['id'] }}">Satker</label>
    </div>
    <div class="flex flex-row mb-1 gap-1 items-center">
        <input type="checkbox" name="roles[]" id="pegawai{{ $item['id'] }}" value="pegawai"
            {{ $route == null ? '' : (in_array('pegawai', $route) ? 'checked' : '') }}
            class="bg-slate-500 rounded border-0">
        <label class="text-xs font-normal" for="pegawai{{ $item['id'] }}">Data
            Pegawai</label>
    </div>
    <div class="flex flex-row mb-1 gap-1 items-center">
        <input type="checkbox" name="roles[]" id="integrasi{{ $item['id'] }}" value="integrasi"
            {{ $route == null ? '' : (in_array('integrasi', $route) ? 'checked' : '') }}
            class="bg-slate-500 rounded border-0">
        <label class="text-xs font-normal text-wrap" for="integrasi{{ $item['id'] }}">Integrasi
            Data Kepegawaian</label>
    </div>
</div>
<div class="col-span-1">
    <div class="flex flex-row mb-1 gap-1 items-center">
        <input type="checkbox" name="roles[]" id="pengajuan{{ $item['id'] }}" value="pengajuan"
            {{ $route == null ? '' : (in_array('pengajuan', $route) ? 'checked' : '') }}
            class="bg-slate-500 rounded border-0">
        <label class="text-xs font-normal" for="pengajuan{{ $item['id'] }}">Verifikasi</label>
    </div>
    <div class="flex flex-row mb-1 gap-1 items-center">
        <input type="checkbox" name="roles[]" id="monitor_kartu{{ $item['id'] }}" value="monitor.kartu"
            {{ $route == null ? '' : (in_array('monitor.kartu', $route) ? 'checked' : '') }}
            class="bg-slate-500 rounded border-0">
        <label class="text-xs font-normal" for="monitor_kartu{{ $item['id'] }}">Monitoring</label>
    </div>
    <div class="flex flex-row mb-1 gap-1 items-center">
        <input type="checkbox" name="roles[]" id="layout_kartu{{ $item['id'] }}" value="layout.kartu"
            {{ $route == null ? '' : (in_array('layout.kartu', $route) ? 'checked' : '') }}
            class="bg-slate-500 rounded border-0">
        <label class="text-xs font-normal text-wrap" for="layout_kartu{{ $item['id'] }}">Pengaturan
            Layout Kartu</label>
    </div>
    <div class="flex flex-row mb-1 gap-1 items-center">
        <input type="checkbox" name="roles[]" id="smart{{ $item['id'] }}" value="smart"
            {{ $route == null ? '' : (in_array('smart', $route) ? 'checked' : '') }}
            class="bg-slate-500 rounded border-0">
        <label class="text-xs font-normal text-wrap" for="smart{{ $item['id'] }}">Smart
            Card Unique Personal
            Identity</label>
    </div>
</div>
<div class="col-span-1">
    <div class="flex flex-row mb-1 gap-1 items-center">
        <input type="checkbox" name="roles[]" id="perangkat{{ $item['id'] }}" value="perangkat"
            {{ $route == null ? '' : (in_array('perangkat', $route) ? 'checked' : '') }}
            class="bg-slate-500 rounded border-0">
        <label class="text-xs font-normal text-wrap" for="perangkat{{ $item['id'] }}">Management
            Perangkat</label>
    </div>
    <div class="flex flex-row mb-1 gap-1 items-center">
        <input type="checkbox" name="roles[]" id="log_aktivitas{{ $item['id'] }}" value="log"
            {{ $route == null ? '' : (in_array('log', $route) ? 'checked' : '') }}
            class="bg-slate-500 rounded border-0">
        <label class="text-xs font-normal text-wrap" for="log_aktivitas{{ $item['id'] }}">Log
            Aktivitas</label>
    </div>
    <div class="flex flex-row mb-1 gap-1 items-center">
        <input type="checkbox" name="roles[]" id="faq{{ $item['id'] }}" value="faq"
            {{ $route == null ? '' : (in_array('faq', $route) ? 'checked' : '') }}
            class="bg-slate-500 rounded border-0">
        <label class="text-xs font-normal" for="faq{{ $item['id'] }}">FAQ</label>
    </div>
    <div class="flex flex-row mb-1 gap-1 items-center">
        <input type="checkbox" name="roles[]" id="ulasan{{ $item['id'] }}" value="rating"
            {{ $route == null ? '' : (in_array('rating', $route) ? 'checked' : '') }}
            class="bg-slate-500 rounded border-0">
        <label class="text-xs font-normal" for="ulasan{{ $item['id'] }}">Ulasan</label>
    </div>
</div>
<div class="col-span-1">
    <div class="flex flex-row mb-1 gap-1 items-center">
        <input type="checkbox" name="roles[]" id="assessment{{ $item['id'] }}" value="assessment"
            {{ $route == null ? '' : (in_array('assessment', $route) ? 'checked' : '') }}
            class="bg-slate-500 rounded border-0">
        <label class="text-xs font-normal" for="assessment{{ $item['id'] }}">Assessment
            Security</label>
    </div>
    <div class="flex flex-row mb-1 gap-1 items-center">
        <input type="checkbox" name="roles[]" {{ $item['role'] == 'superadmin' ? 'disabled' : '' }}
            id="hak_akses{{ $item['id'] }}" value="akses"
            {{ $route == null ? '' : (in_array('akses', $route) ? 'checked' : '') }}
            class="bg-slate-500 rounded border-0">
        <label class="text-xs font-normal text-wrap" for="hak_akses{{ $item['id'] }}">Hak
            Akses Aplikasi</label>
    </div>
</div>
