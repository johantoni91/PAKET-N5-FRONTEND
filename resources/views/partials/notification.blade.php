@foreach ($notif as $item)
    <li class="py-2 px-4">
        <div class="flex flex-row justify-between items-center">
            <a href="{{ route('notif.direct', $item['id']) }}" class="dropdown-item flex">
                <div class="h-8 w-8 rounded-full bg-primary-500/20 inline-flex m-auto align-middle justify-center me-4">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1"
                        stroke="currentColor" class="w-6 h-6 mt-1 dark:text-white">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0M3.124 7.5A8.969 8.969 0 0 1 5.292 3m13.416 0a8.969 8.969 0 0 1 2.168 4.5" />
                    </svg>
                </div>
                <div class="flex-grow flex-1 ms-0.5 items-center align-middle">
                    <small class="text-gray-500 text-xs text-pretty truncate dark:text-gray-400">
                        {{ $item['notifikasi'] }}
                    </small>
                </div>
            </a>
            <button type="button" id="delete{{ $item['id'] }}"
                class="rounded-full bg-red-800 text-white px-1.5 hover:shadow dark:hover:shadow-red dark:bg-white dark:text-red">X</button>
            <script>
                $(function() {
                    $("#delete{{ $item['id'] }}").on('click', function(e) {
                        e.preventDefault()
                        $.get("{{ route('notif.destroy', $item['id']) }}", function(data) {
                            $("#notif_count").html(data.count)
                            $("#notif").html(data.view)
                        })
                    })
                })
            </script>
        </div>
    </li>
@endforeach
