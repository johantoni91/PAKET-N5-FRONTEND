<div id="create" data-modal-backdrop="static" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full sm:max-w-sm md:max-w-md lg:max-w-lg xl:max-w-xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Tambah Role
                </h3>
                <button type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-hide="create">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-4">
                <form action="{{ route('akses.store') }}" method="post">
                    @csrf
                    <div class="mb-2">
                        <label for="roles" class="my-auto w-24 mb-1 dark:text-white">Nama role</label>
                        <input type="text" name="role"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </div>
                    <div class="mb-2">
                        <p class="dark:text-white">Akses</p>
                    </div>
                    <div
                        class="grid sm:grid-cols-1 md:grid-cols-1 lg:grid-cols-2 xl:grid-cols-2 border dark:border-white dark:text-white p-2 rounded-lg mb-2">
                        <div class="col-span-1">
                            <div class="flex flex-row mb-1 gap-1 items-center">
                                <input type="checkbox" name="roles[]" id="user" value="user"
                                    class="bg-slate-500 rounded border-0">
                                <label for="user" class="text-xs font-normal">Pengguna</label>
                            </div>
                            <div class="flex flex-row mb-1 gap-1 items-center">
                                <input type="checkbox" name="roles[]" id="satker" value="satker"
                                    class="bg-slate-500 rounded border-0">
                                <label class="text-xs font-normal" for="satker">Satker</label>
                            </div>
                            <div class="flex flex-row mb-1 gap-1 items-center">
                                <input type="checkbox" name="roles[]" id="pegawai" value="pegawai"
                                    class="bg-slate-500 rounded border-0">
                                <label class="text-xs font-normal" for="pegawai">Data
                                    Pegawai</label>
                            </div>
                            <div class="flex flex-row mb-1 gap-1 items-center">
                                <input type="checkbox" name="roles[]" id="integrasi" value="integrasi"
                                    class="bg-slate-500 rounded border-0">
                                <label class="text-xs font-normal text-wrap" for="integrasi">Integrasi
                                    Data Kepegawaian</label>
                            </div>
                        </div>
                        <div class="col-span-1">
                            <div class="flex flex-row mb-1 gap-1 items-center">
                                <input type="checkbox" name="roles[]" id="pengajuan" value="pengajuan"
                                    class="bg-slate-500 rounded border-0">
                                <label class="text-xs font-normal" for="pengajuan">Verifikasi</label>
                            </div>
                            <div class="flex flex-row mb-1 gap-1 items-center">
                                <input type="checkbox" name="roles[]" id="monitor_kartu" value="monitor.kartu"
                                    class="bg-slate-500 rounded border-0">
                                <label class="text-xs font-normal" for="monitor_kartu">Monitoring</label>
                            </div>
                            <div class="flex flex-row mb-1 gap-1 items-center">
                                <input type="checkbox" name="roles[]" id="layout_kartu" value="layout.kartu"
                                    class="bg-slate-500 rounded border-0">
                                <label class="text-xs font-normal text-wrap" for="layout_kartu">Pengaturan
                                    Layout Kartu</label>
                            </div>
                            <div class="flex flex-row mb-1 gap-1 items-center">
                                <input type="checkbox" name="roles[]" id="smart" value="smart"
                                    class="bg-slate-500 rounded border-0">
                                <label class="text-xs font-normal text-wrap" for="smart">Smart
                                    Card Unique Personal
                                    Identity</label>
                            </div>
                        </div>
                        <div class="col-span-1">
                            <div class="flex flex-row mb-1 gap-1 items-center">
                                <input type="checkbox" name="roles[]" id="perangkat" value="perangkat"
                                    class="bg-slate-500 rounded border-0">
                                <label class="text-xs font-normal text-wrap" for="perangkat">Management
                                    Perangkat</label>
                            </div>
                            <div class="flex flex-row mb-1 gap-1 items-center">
                                <input type="checkbox" name="roles[]" id="log_aktivitas" value="log"
                                    class="bg-slate-500 rounded border-0">
                                <label class="text-xs font-normal text-wrap" for="log_aktivitas">Log
                                    Aktivitas</label>
                            </div>
                            <div class="flex flex-row mb-1 gap-1 items-center">
                                <input type="checkbox" name="roles[]" id="faq" value="faq"
                                    class="bg-slate-500 rounded border-0">
                                <label class="text-xs font-normal" for="faq">FAQ</label>
                            </div>
                            <div class="flex flex-row mb-1 gap-1 items-center">
                                <input type="checkbox" name="roles[]" id="ulasan" value="rating"
                                    class="bg-slate-500 rounded border-0">
                                <label class="text-xs font-normal" for="ulasan">Ulasan</label>
                            </div>
                        </div>
                        <div class="col-span-1">
                            <div class="flex flex-row mb-1 gap-1 items-center">
                                <input type="checkbox" name="roles[]" id="assessment" value="assessment"
                                    class="bg-slate-500 rounded border-0">
                                <label class="text-xs font-normal" for="assessment">Assessment
                                    Security</label>
                            </div>
                            <div class="flex flex-row mb-1 gap-1 items-center">
                                <input type="checkbox" name="roles[]" id="hak_akses" value="akses"
                                    class="bg-slate-500 rounded border-0">
                                <label class="text-xs font-normal text-wrap" for="hak_akses">Hak
                                    Akses Aplikasi</label>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-row justify-end">
                        <button type="submit"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
