<div id="create" data-modal-backdrop="static" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Tambah User
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
                <form action="{{ route('user.role') }}" method="post">
                    @csrf
                    <div class="flex flex-row gap-1 mb-2">
                        <label for="roles" class="my-auto w-24 dark:text-white">Pilih roles</label>
                        <select id="roles" name="roles" required
                            class="bg-gray-200 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-white dark:text-black">
                            @foreach ($roles as $item)
                                @if (session('data')['roles'] != 'superadmin')
                                    @if ($item['role'] == 'superadmin')
                                    @else
                                        <option value="{{ $item['role'] }}">{{ $item['role'] }}</option>
                                    @endif
                                @else
                                    <option value="{{ $item['role'] }}">{{ $item['role'] }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="flex flex-row justify-end">
                        <button type="submit"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Selanjutnya</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    $(function() {
        $("input[list='satker']").on('keyup', function() {
            var item = $(this).val()
            $("option[id='a']").each(function(i) {
                $("option[id='a']").slice(1).remove();
            });
            $.get(`http://127.0.0.1:8000/user/${item}/search`, function(data, status) {
                for (var i = 0; i < data['data'].length; i++) {
                    var satker_code = data['data'][i].satker_code
                    var satker_name = data['data'][i].satker_name
                    $("#satker").append(
                        `<option id="a" value='${satker_name}'>`)
                }
            })

        })
    })
</script>
