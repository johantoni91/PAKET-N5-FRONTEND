<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<table class="w-full border-collapse" width="100%" id="datatable_1">
    <thead class="bg-slate-100 dark:bg-slate-700/20">
        <tr>
            <th scope="col"
                class="p-3 text-xs font-medium tracking-wider text-left text-gray-700 dark:text-gray-400 uppercase">
                Nama
            </th>
            <th scope="col"
                class="p-3 text-xs font-medium tracking-wider text-left text-gray-700 dark:text-gray-400 uppercase">
                Username
            </th>
            <th scope="col"
                class="p-3 text-xs font-medium tracking-wider text-left text-gray-700 dark:text-gray-400 uppercase">
                Email
            </th>
            <th scope="col"
                class="p-3 text-xs font-medium tracking-wider text-left text-gray-700 dark:text-gray-400 uppercase">
                Phone
            </th>
            <th scope="col"
                class="p-3 text-xs font-medium tracking-wider text-left text-gray-700 dark:text-gray-400 uppercase">
                Role
            </th>
            <th scope="col"
                class="p-3 text-xs font-medium tracking-wider text-left text-gray-700 dark:text-gray-400 uppercase">
                Aksi
            </th>
            <th scope="col"
                class="p-3 text-xs font-medium tracking-wider text-left text-gray-700 dark:text-gray-400 uppercase">
                Status <small>(Klik icon untuk mengubah status)</small>
            </th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $item)
            <tr class="bg-white border-b border-dashed dark:bg-gray-900 dark:border-gray-700">
                <td class="align-baseline p-3 text-sm font-medium whitespace-nowrap dark:text-white">
                    @if ($item['users']['photo'])
                        <img src="{{ env('API_IMG', '') . $item['users']['photo'] }}" alt=""
                            class="mr-2 h-6 rounded-full inline-block">{{ $item['users']['name'] }}
                    @else
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6 mr-2 rounded-full inline-block">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                        </svg> {{ $item['users']['name'] }}
                    @endif
                </td>
                <td class="align-baseline p-3 text-sm font-medium whitespace-nowrap dark:text-white">
                    {{ $item['users']['username'] }}
                </td>
                <td class="align-baseline p-3 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                    {{ $item['users']['email'] }}
                </td>
                <td class="align-baseline p-3 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                    {{ $item['users']['phone'] }}
                </td>
                <td class="align-baseline p-3 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                    {{ $item['roles'] }}
                </td>
                <td class="p-3 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                    <a href="{{ route('user.update.view', $item['users_id']) }}"><i
                            class="align-baseline icofont-edit text-lg text-gray-500 dark:text-gray-400"></i></a>
                    @if ($item['users_id'] != $profile['users_id'])
                        <input type="hidden" id="del{{ $item['id'] }}" value="{{ $item['users_id'] }}">
                        <button type="button" id="delete{{ $item['id'] }}"
                            onclick="eventDelete{{ $item['id'] }}()">
                            <i class="align-baseline icofont-ui-delete text-lg text-red-500 dark:text-red-400"></i>
                        </button>
                        <script>
                            const eventDelete{{ $item['id'] }} = () => {
                                var id = $("#del{{ $item['id'] }}").val()
                                Swal.fire({
                                    title: "PERINGATAN",
                                    text: "Apakah anda yakin menghapus user {{ $item['users']['name'] }} ?",
                                    icon: "warning",
                                    showCancelButton: true,
                                    confirmButtonColor: "#3085d6",
                                    cancelButtonColor: "#d33",
                                    confirmButtonText: "Hapus"
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        $.ajax({
                                            url: "{{ route('user.destroy') }}",
                                            type: "POST",
                                            headers: {
                                                'X-CSRF-TOKEN': "{{ csrf_token() }}"
                                            },
                                            data: {
                                                id: id
                                            },
                                            success: function(data) {
                                                location.reload();
                                            },
                                            error: function(xhr) {

                                            }
                                        })
                                    }
                                });
                            }
                        </script>
                    @endif
                </td>
                <td>
                    <a href="{{ route('user.status', [$item['users_id'], $item['status']]) }}"
                        class="align-baseline flex flex-row {{ $item['status'] == '1' ? 'hover:drop-shadow-green' : 'hover:drop-shadow-red' }}">
                        @if ($item['status'] == '1')
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-green-500">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>
                            <span class="text-sm text-green-500 ms-2 mt-0.5">
                                Aktif</span>
                        @else
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-red-500">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>
                            <span class="text-sm text-red-500 ms-2 mt-0.5">
                                Nonaktif</span>
                        @endif
                    </a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
