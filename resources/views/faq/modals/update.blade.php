<div id="update{{ $item['id'] }}" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                    Frequently Asked Question
                </h3>
                <button type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-toggle="update{{ $item['id'] }}">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <form class="p-4 md:p-5" action="{{ route('faq.update', $item['id']) }}" method="post"
                enctype="multipart/form-data">
                @csrf
                <div class="grid gap-4 mb-4 grid-cols-2">
                    <div class="col-span-2">
                        <label for="pertanyaan"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pertanyaan</label>
                        <input type="text" name="question" id="pertanyaan" value="{{ $item['question'] }}" required
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                    </div>
                    <div class="col-span-2">
                        <label for="jawaban"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jawaban</label>
                        <textarea id="jawaban" rows="4" name="answer" required
                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">{{ $item['answer'] }}</textarea>
                    </div>
                    <div class="col-span-2">
                        <label for="lampiran{{ $item['id'] }}"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Lampiran</label>
                        <input type="file" accept="image/*" id="lampiran{{ $item['id'] }}" name="lampiran"
                            class="bg-gray-50 mx-auto text-sm block w-auto border border-gray-300 rounded-lg dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                            onchange="newPhoto{{ $item['id'] }}(event)">
                        <div class="flex bg-slate-300 mt-3 p-2 rounded-lg">
                            <img src="{{ asset('assets/images/pattern.png') }}" id="photo{{ $item['id'] }}"
                                alt="new-photo" class="mx-auto h-40 w-40 inline-block rounded-lg justify-center my-3">
                        </div>
                        <script>
                            var newPhoto{{ $item['id'] }} = function(event) {
                                var photo = document.getElementById("photo{{ $item['id'] }}");
                                photo.src = URL.createObjectURL(event.target.files[0]);
                                photo.onload = function() {
                                    URL.revokeObjectURL(photo.src)
                                }
                            };
                        </script>
                    </div>
                </div>
                <div class="flex justify-end">
                    <button type="submit"
                        class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Ubah
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
