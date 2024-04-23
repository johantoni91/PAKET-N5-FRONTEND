{{-- UPDATE USER --}}
<div id="update{{ $item['id'] }}" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-4xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Ubah User
                </h3>
                <button type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-hide="update{{ $item['id'] }}">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="px-4 pb-4">
                <form class="space-y-4" action="{{ route('user.update', [$item['users_id']]) }}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="flex flex-row profile items-center justify-evenly">
                        <div class="flex flex-col">
                            <img src="{{ $item['users']['photo'] != null ? env('API_IMG', '') . $item['users']['photo'] : 'https://placehold.co/400' }}"
                                id="photo{{ $item['id'] }}" alt="photos"
                                class="mx-auto h-56 w-56 rounded-full inline-block justify-center my-3">
                            <input type="file" name="photo" id="photos{{ $item['id'] }}" accept="image/*"
                                class="bg-gray-50 mx-auto text-sm block w-auto border border-gray-300 rounded-lg dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                onchange="loadFile{{ $item['id'] }}(event)">
                            <script>
                                var loadFile{{ $item['id'] }} = function(event) {
                                    var photo = document.getElementById("photo{{ $item['id'] }}");
                                    photo.src = URL.createObjectURL(event.target.files[0]);
                                    photo.onload = function() {
                                        URL.revokeObjectURL(photo.src)
                                    }
                                };
                            </script>
                        </div>
                        <div class="flex flex-col lg:ml-20 w-full justify-between p-4 leading-normal gap-3">
                            <div class="flex flex-row gap-5">
                                <label for="nip{{ $item['id'] }}" class="my-auto w-24">NIP</label>
                                <input type="text" id="nip{{ $item['id'] }}" name="nip"
                                    value="{{ $item['users']['nip'] }}"
                                    class="bg-gray-200 border border-gray-300 shadow shadow-gray-200 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <script>
                                    function keepOnlyNumbers(input) {
                                        return input.replace(/\D/g, "");
                                    }
                                    var inputField0 = document.getElementById("nip{{ $item['id'] }}");
                                    inputField0.addEventListener("input", function() {
                                        inputField0.value = keepOnlyNumbers(inputField0.value);
                                    });
                                </script>

                            </div>
                            <div class="flex flex-row gap-5">
                                <label for="nrp{{ $item['id'] }}" class="my-auto w-24">NRP</label>
                                <input type="text" id="nrp{{ $item['id'] }}" name="nrp"
                                    value="{{ $item['users']['nrp'] }}"
                                    class="bg-gray-200 border border-gray-300 shadow shadow-gray-200 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <script>
                                    function keepOnlyNumbers(input) {
                                        return input.replace(/\D/g, "");
                                    }
                                    var inputField8 = document.getElementById("nrp{{ $item['id'] }}");
                                    inputField8.addEventListener("input", function() {
                                        inputField8.value = keepOnlyNumbers(inputField8.value);
                                    });
                                </script>

                            </div>
                            <div class="flex flex-row gap-5">
                                <label for="username{{ $item['id'] }}" class="my-auto w-24">Username</label>
                                <input type="text" id="username{{ $item['id'] }}" name="username"
                                    value="{{ $item['users']['username'] }}"
                                    class="bg-gray-200 border border-gray-300 shadow shadow-gray-200 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

                            </div>
                            <div class="flex flex-row gap-5">
                                <label for="name{{ $item['id'] }}" class="my-auto w-24">Name</label>
                                <input type="text" id="name{{ $item['id'] }}" name="name"
                                    value="{{ $item['users']['name'] }}"
                                    class="bg-gray-200 border border-gray-300 shadow shadow-gray-200 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            </div>
                            <div class="flex flex-row gap-5">
                                <label for="roles{{ $item['id'] }}" class="my-auto w-24">Pilih roles</label>
                                <select id="roles{{ $item['id'] }}" name="roles" required
                                    class="bg-gray-200 border border-gray-300 shadow shadow-gray-200 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    @foreach ($roles as $role)
                                        <option {{ $item['roles'] == $role['role'] ? 'selected' : '' }}
                                            value="{{ $role['role'] }}">
                                            {{ $role['role'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="flex flex-row gap-5">
                                <label for="satker{{ $item['id'] }}" class="my-auto w-24">Pilih Satker</label>
                                <select id="satker{{ $item['id'] }}" name="satker" required
                                    class="bg-gray-200 border border-gray-300 shadow shadow-gray-200 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    @foreach ($satker as $data)
                                        @if (
                                            $data['satker_name'] ==
                                                Illuminate\Support\Facades\Http::withToken(App\Helpers\profile::getToken())->get(env('API_URL', '') . '/satker' . '/' . $item['satker'] . '/code')->json()['data']['satker_name']
                                        )
                                            <option selected value="{{ $data['satker_code'] }}">
                                                {{ $data['satker_name'] }}</option>
                                        @endif
                                        <option value="{{ $data['satker_code'] }}">{{ $data['satker_name'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="flex flex-row gap-5">
                                <label for="email{{ $item['id'] }}" class="my-auto w-24">Email</label>
                                <input type="email" id="email{{ $item['id'] }}" name="email"
                                    value="{{ $item['users']['email'] }}"
                                    class="bg-gray-200 border border-gray-300 shadow shadow-gray-200 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">


                            </div>
                            <div class="flex flex-row gap-5">
                                <label for="phone{{ $item['id'] }}" class="my-auto w-24">Telepon</label>
                                <input type="text" id="phone{{ $item['id'] }}" name="phone"
                                    value="{{ $item['users']['phone'] }}"
                                    class="bg-gray-200 border border-gray-300 shadow shadow-gray-200 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <script>
                                    function keepOnlyNumbers(input) {
                                        return input.replace(/\D/g, "");
                                    }
                                    var inputField11 = document.getElementById("phone{{ $item['id'] }}");
                                    inputField11.addEventListener("input", function() {
                                        inputField11.value = keepOnlyNumbers(inputField11.value);
                                    });
                                </script>

                            </div>
                            <div class="flex flex-row gap-5">
                                <label for="password{{ $item['id'] }}" class="my-auto w-24">Password</label>
                                <input type="password" id="password{{ $item['id'] }}" name="password"
                                    class="bg-gray-200 border border-gray-300 shadow shadow-gray-200 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            </div>
                            <div class="flex flex-row gap-2 ms-28">
                                <input type="checkbox" id="checkbox{{ $item['id'] }}" class="rounded-full shadow">
                                <label for="checkbox{{ $item['id'] }}">Lihat password</label>
                            </div>
                            <script>
                                $(document).ready(function() {
                                    $("#checkbox{{ $item['id'] }}").change(function() {
                                        if (this.checked) {
                                            $("#password{{ $item['id'] }}").attr("type", "text")
                                        } else {
                                            $("#password{{ $item['id'] }}").attr("type", "password")
                                        }
                                    });
                                })
                            </script>
                        </div>
                    </div>
                    <div class="flex flex-row justify-end">
                        <button type="submit"
                            class="w-24 me-4 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
