<table class="w-full border-collapse" width="100%" id="datatable_1">
    <thead class="bg-slate-100 dark:bg-slate-700/20">
        <tr>
            <th scope="col"
                class="p-3 text-xs font-medium tracking-wider text-left text-gray-700 dark:text-gray-400 uppercase">
                Satuan Kerja
            </th>
            <th scope="col"
                class="p-3 text-xs font-medium tracking-wider text-left text-gray-700 dark:text-gray-400 uppercase">
                Telepon
            </th>
            <th scope="col"
                class="p-3 text-xs font-medium tracking-wider text-left text-gray-700 dark:text-gray-400 uppercase">
                Email
            </th>
            <th scope="col"
                class="p-3 text-xs font-medium tracking-wider text-left text-gray-700 dark:text-gray-400 uppercase">
                Alamat
            </th>
            <th scope="col"
                class="p-3 text-xs font-medium tracking-wider text-left text-gray-700 dark:text-gray-400 uppercase">
                Status
            </th>
            <th scope="col"
                class="p-3 text-xs font-medium tracking-wider text-left text-gray-700 dark:text-gray-400 uppercase">
                Aksi
            </th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $item)
            <tr>
                <td>{{ $item['satker_name'] }}</td>
                <td class="text-start">{{ $item['satker_phone'] }}
                </td>
                <td>{{ $item['satker_email'] }}</td>
                <td>{{ $item['satker_address'] }}</td>
                <td class="align-baseline">
                    <a href="{{ route('satker.status', [$item['id'], $item['satker_status']]) }}"
                        class="align-baseline flex flex-row {{ $item['satker_status'] == '1' ? 'hover:drop-shadow-green' : 'hover:drop-shadow-red' }}">
                        @if ($item['satker_status'] == '1')
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
                <td>
                    <button type="button" data-modal-target="update{{ $item['id'] }}"
                        data-modal-toggle="update{{ $item['id'] }}"><i
                            class="align-baseline icofont-edit text-lg text-gray-500 dark:text-gray-400"></i></button>
                    @include('partials.modals.satker.update')
                    <input type="hidden" value="{{ $item['id'] }}" id="del{{ $item['id'] }}">
                    <button type="button" id="delete{{ $item['id'] }}"><i
                            class="align-baseline icofont-ui-delete text-lg text-red-500 dark:text-red-400"></i></button>
                    <script>
                        $(document).ready(function() {
                            $("#delete{{ $item['id'] }}").on('click', function(e) {
                                e.preventDefault()
                                var id = $("#del{{ $item['id'] }}").val()
                                Swal.fire({
                                    title: "PERINGATAN",
                                    text: "Apakah anda yakin menghapus satker {{ $item['satker_name'] }} ?",
                                    icon: "warning",
                                    showCancelButton: true,
                                    confirmButtonColor: "#3085d6",
                                    cancelButtonColor: "#d33",
                                    confirmButtonText: "Hapus"
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        $.ajax({
                                            url: "{{ route('satker.destroy') }}",
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

                            })
                        })
                    </script>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
