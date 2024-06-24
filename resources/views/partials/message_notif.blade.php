@foreach ($notif as $item)
    <li class="py-2 px-4">
        <div class="flex flex-row justify-between items-center">
            <a href="{{ route('notif.message.read', $item['id']) }}" class="dropdown-item flex">
                <div class="h-8 w-8 rounded-full bg-primary-500/20 inline-flex m-auto align-middle justify-center me-4">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="lucide lucide-message-square-text w-6 h-6 mt-1 dark:text-white">
                        <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z" />
                        <path d="M13 8H7" />
                        <path d="M17 12H7" />
                    </svg>
                </div>
                <div class="flex-col flex-1 ms-0.5 items-center align-middle">
                    <small
                        class="dark:text-white">{{ Illuminate\Support\Facades\Http::withToken(session('data')['token'])->get(env('API_URL', '') . '/user' . '/' . $item['from'] . '/find')->json()['data']['name'] }}
                        ({{ Carbon\Carbon::parse($item['created_at'])->diffForHumans() }})
                    </small>
                    <p class="text-gray-500 text-xs text-pretty truncate dark:text-gray-400">
                        {{ $item['message'] }}
                    </p>
                </div>
            </a>
        </div>
    </li>
@endforeach
