@if ($item['status'] == 1)
    <div class="flex flex-row gap-3 justify-center">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" data-tooltip-target="tooltip-setuju" stroke-linecap="round"
            stroke-linejoin="round" id="approve{{ $item['id'] }}"
            class="lucide lucide-circle-check text-green-500 hover:drop-shadow-green hover:cursor-pointer">
            <circle cx="12" cy="12" r="10" />
            <path d="m9 12 2 2 4-4" />
            <div id="tooltip-setuju" role="tooltip"
                class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                Terima pengajuan
                <div class="tooltip-arrow" data-popper-arrow></div>
            </div>
        </svg>
        <script>
            $(document).ready(function() {
                $("#approve{{ $item['id'] }}").on('click', function(e) {
                    e.preventDefault()
                    var id = "{{ $item['id'] }}"
                    Swal.fire({
                        title: "PERINGATAN",
                        text: "Pengajuan akan disetujui",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#3085d6",
                        cancelButtonColor: "#d33",
                        confirmButtonText: "Ya"
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $.ajax({
                                url: "{{ route('pengajuan.approve') }}",
                                type: "POST",
                                headers: {
                                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                                },
                                data: {
                                    id: id
                                },
                                success: function(data) {
                                    Swal.fire({
                                        title: "Token pencetakan",
                                        text: data['token'],
                                        icon: "success",
                                        confirmButtonText: "Save",
                                        footer: 'Harap simpan token di atas untuk melakukan pencetakan!',
                                        showClass: {
                                            popup: `animate__animated
                                                    animate__fadeInUp
                                                    animate__faster`
                                        },
                                        hideClass: {
                                            popup: `animate__animated
                                                    animate__fadeOutDown
                                                    animate__faster`
                                        }
                                    }).then((result) => {
                                        if (result.isConfirmed) {
                                            location.reload()
                                        }
                                    });
                                },
                                error: function(xhr) {

                                }
                            })
                        }
                    });

                })
            })
        </script>
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
            id="reject{{ $item['id'] }}" data-tooltip-target="tooltip-tolak"
            class="lucide lucide-circle-x text-red-500 hover:drop-shadow-red hover:cursor-pointer">
            <circle cx="12" cy="12" r="10" class="cursor-hover" />
            <path d="m15 9-6 6" />
            <path d="m9 9 6 6" />
            <div id="tooltip-tolak" role="tooltip"
                class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                Tolak Pengajuan
                <div class="tooltip-arrow" data-popper-arrow></div>
            </div>
        </svg>
        <script>
            $(document).ready(function() {
                $("#reject{{ $item['id'] }}").on('click', function(e) {
                    e.preventDefault()
                    var id = "{{ $item['id'] }}"
                    Swal.fire({
                        title: "PERINGATAN",
                        text: "Apakah anda yakin menolak pengajuan ?",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#3085d6",
                        cancelButtonColor: "#d33",
                        confirmButtonText: "Ya"
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $.ajax({
                                url: "{{ route('pengajuan.reject') }}",
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
    </div>
@elseif($item['status'] == 2)
    <div class="flex flex-row justify-center gap-2 items-center">
        <h1 class="font-bold dark:text-green-500 text-green-500">Telah disetujui</h1>
        |
        <button class="font-bold" id="token{{ $item['id'] }}">
            Token
        </button>
        <script>
            $(document).ready(function() {
                $("#token{{ $item['id'] }}").click(function(e) {
                    Swal.fire({
                        title: "Token pencetakan",
                        text: "{{ $item['token'] }}",
                        icon: "success"
                    })
                })
            })
        </script>
    </div>
@elseif($item['status'] == 3)
    <small>Selesai</small>
@else
    <h1 class="text-red-500 font-bold text-center">ditolak</h1>
@endif
