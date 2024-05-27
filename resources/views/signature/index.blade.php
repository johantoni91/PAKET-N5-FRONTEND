<div id="signature" data-modal-backdrop="static" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-bold text-gray-900 dark:text-white">
                    Tanda Tangan
                </h3>
                <button type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-hide="signature">
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
                <form
                    action="{{ $starterPack['tanda_tangan'] == null ? route('signature.store') : route('signature.update') }}"
                    enctype="multipart/form-data" method="post">
                    @csrf
                    <div class="overflow-x-auto block w-full">
                        <div class="flex flex-col gap-3 justify-center items-center">
                            <img src="{{ $starterPack['tanda_tangan']['signature'] ?? asset('assets/images/signature.jpg') }}"
                                id="signature_photo" class="w-32 h-32 rounded-lg" alt="">
                            <input type="file" name="signature" accept="image/*" class="dark:text-white"
                                onchange="sig(event)">
                            <script>
                                var sig = function(event) {
                                    var signa = document.getElementById("signature_photo");
                                    signa.src = URL.createObjectURL(event.target.files[0]);
                                    signa.onload = function() {
                                        URL.revokeObjectURL(signa.src)
                                    }
                                };
                            </script>
                        </div>
                        <div class="flex justify-between items-center px-3">
                            <a href="{{ route('signature.destroy') }}"
                                class="inline-block rounded-lg focus:outline-none text-red-500 hover:bg-red-200 hover:text-gray-900 bg-transparent border border-red-300 shadow shadow-red-200 dark:bg-transparent dark:text-white dark:hover:text-white dark:border-gray-700 dark:hover:bg-red-300 text-sm font-medium py-1 px-3">Hapus</a>
                            <button type="submit"
                                class="inline-block rounded-lg focus:outline-none text-primary-500 hover:bg-blue-200 hover:text-gray-900 bg-transparent border border-blue-300 shadow shadow-blue-200 dark:bg-transparent dark:text-white dark:hover:text-white dark:border-gray-700 dark:hover:bg-blue-300 text-sm font-medium py-1 px-3 w-24 my-3">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
