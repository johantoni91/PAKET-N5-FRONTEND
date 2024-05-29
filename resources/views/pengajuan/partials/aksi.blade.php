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
                                        title: "Pengajuan telah disetujui",
                                        text: data['token'],
                                        icon: "success",
                                        confirmButtonText: "Ok",
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
        <button
            class="font-bold flex flex-row items-center gap-2 text-yellow-500 hover:text-orange-400 hover:animate-pulse"
            id="token{{ $item['id'] }}">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M20.25 6.375c0 2.278-3.694 4.125-8.25 4.125S3.75 8.653 3.75 6.375m16.5 0c0-2.278-3.694-4.125-8.25-4.125S3.75 4.097 3.75 6.375m16.5 0v11.25c0 2.278-3.694 4.125-8.25 4.125s-8.25-1.847-8.25-4.125V6.375m16.5 0v3.75m-16.5-3.75v3.75m16.5 0v3.75C20.25 16.153 16.556 18 12 18s-8.25-1.847-8.25-4.125v-3.75m16.5 0c0 2.278-3.694 4.125-8.25 4.125s-8.25-1.847-8.25-4.125" />
            </svg>
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
@else
    <h1 class="text-red-500 font-bold text-center">ditolak</h1>
@endif
