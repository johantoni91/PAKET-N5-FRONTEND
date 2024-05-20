<div id="belakang{{ $item['id'] }}" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-5 w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Ubah Latar Belakang Kartu
                </h3>
                <button type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-hide="belakang{{ $item['id'] }}">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>

            <form action="{{ route('layout.kartu.back', $item['id']) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="p-4 space-y-4">
                    <label for="back" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Latar
                        Belakang Kartu</label>
                    <img src="{{ env('APP_IMG', '') . $item['back'] }}" id="back{{ $item['id'] }}" alt="back"
                        class="mx-auto h-24 w-24 rounded-full inline-block justify-center my-3">
                    <input type="file" name="belakang" accept="image/*"
                        class="bg-gray-50 mx-auto text-sm block w-auto border border-gray-300 rounded-lg dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                        onchange="backBg(event)">
                    <script>
                        var backBg = function(event) {
                            var back = document.getElementById("back{{ $item['id'] }}");
                            back.src = URL.createObjectURL(event.target.files[0]);
                            back.onload = function() {
                                URL.revokeObjectURL(back.src)
                            }
                        };
                    </script>
                </div>

                <div
                    class="flex justify-end items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                    <button type="submit"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Ubah</button>
                </div>
            </form>
        </div>
    </div>
</div>
