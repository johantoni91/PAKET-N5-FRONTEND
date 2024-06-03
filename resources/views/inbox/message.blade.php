<ul id="refresh">
    @foreach ($data as $i)
        <input type="hidden" id="room_id" name="room_id" value="{{ $i['room_id'] }}">
        <li class="p-2">
            @if ($i['from'] == $profile['id'])
                <div class="flex gap-3 items-center">
                    <div class="flex-shrink-0">
                        <img class="w-8 h-8 rounded-full" src="{{ asset('assets/images/5856.jpg') }}" alt="5856">
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                            {{ $profile['username'] }} &nbsp;&nbsp;&nbsp;<small
                                class="text-gray-500 dark:text-gray-300">({{ Carbon\Carbon::parse($i['created_at'])->diffForHumans() }})</small>
                        </p>
                        <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                            {{ $i['from'] == $profile['id'] ? $i['message'] : '' }}
                        </p>
                    </div>
                </div>
            @else
                <div class="flex flex-row items-center justify-end gap-3">
                    <div class="">
                        <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                            <small
                                class="text-gray-500 dark:text-gray-300">({{ Carbon\Carbon::parse($i['created_at'])->diffForHumans() }})</small>&nbsp;&nbsp;&nbsp;
                            {{ $i['from'] }}
                        </p>
                        <p class="text-sm text-end text-gray-500 truncate dark:text-gray-400">
                            {{ $i['message'] }}
                        </p>
                    </div>
                    <div class="flex-shrink-0">
                        <img class="w-8 h-8 rounded-full" src="{{ asset('assets/images/5856.jpg') }}" alt="5856">
                    </div>
                </div>
            @endif
        </li>
    @endforeach
</ul>
<form action="{{ route('inbox.store') }}" method="post">
    @csrf
    <div class="sticky bottom-0 flex flex-row items-center rounded-lg">
        <input type="text" name="message" class="w-full py-2 ps-2 border-0 dark:bg-slate-400" autofocus />
        <input type="hidden" id="room_id_value" name="room">
        <button type="submit" class="absolute right-2 hover:cursor-pointer text-blue"><svg
                xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="lucide lucide-send-horizontal cursor-hover">
                <path d="m3 3 3 9-3 9 19-9Z" />
                <path d="M6 12h16" />
            </svg></button>
    </div>
</form>
<script>
    $(function() {
        $("#room_id_value").attr('value', $("#room_id").val())
    })
</script>
