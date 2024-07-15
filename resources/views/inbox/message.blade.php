<div id="refresh" class="relative" style="min-height:60dvh; height: 60dvh; max-height: 60dvh;">
    <ul id="refreshData" class="h-full relative overflow-y-scroll pb-10">
        <div
            class="sticky absolute top-0 w-full text-center bg-slate-500/50 dark:text-green-500 p-5 shadow-md shadow-[#379777] dark:shadow-[#3282B8]">
            <h1 class="font-bold text-black dark:text-white">
                {{ $receiver }}
            </h1>
        </div>
        @foreach ($data as $i)
            <input type="hidden" id="room_id" name="room_id" value="{{ $i['room_id'] }}">
            <li class="p-5">
                @if ($i['from'] != $profile['id'])
                    <div class="flex gap-3 items-center">
                        <div class="flex-shrink-0">
                            <img class="w-8 h-8 rounded-full"
                                src="{{ Illuminate\Support\Facades\Http::withToken(session('data')['token'])->get(env('API_URL', '') . '/user' . '/' . $i['from'] . '/find')->json()['data']['photo'] ?? asset('assets/images/5856.jpg') }}"
                                alt="5856">
                        </div>
                        <div class="bg-green-500 dark:bg-green-700 max-w-full md:max-w-xs lg:max-w-lg rounded-lg p-3">
                            <p class="text-sm font-semibold text-gray-900 text-wrap dark:text-black">
                                {{ Illuminate\Support\Facades\Http::withToken(session('data')['token'])->get(env('API_URL', '') . '/user' . '/' . $i['from'] . '/find')->json()['data']['name'] }}
                                &nbsp;&nbsp;&nbsp;<small
                                    class="text-white dark:text-white">({{ Carbon\Carbon::parse(strtotime($i['created_at']))->translatedFormat('l, d F Y') }})</small>
                            </p>
                            <p class="text-xs text-justify">
                                {{ Carbon\Carbon::parse(strtotime($i['created_at']))->translatedFormat('H:i:s') }}</p>
                            <p class="text-sm text-white text-wrap dark:text-white">
                                {!! nl2br(e($i['message'])) !!}
                            </p>
                        </div>
                    </div>
                @else
                    <div class="flex flex-row items-center justify-end gap-3">
                        <div class="max-w-full md:max-w-xs lg:max-w-lg bg-yellow-500 dark:bg-yellow-700 rounded-lg p-3">
                            <p class="text-sm font-semibold text-gray-900 text-wrap text-right dark:text-black">
                                <small
                                    class="text-white dark:text-white">({{ Carbon\Carbon::parse(strtotime($i['created_at']))->translatedFormat('l, d F Y') }})</small>&nbsp;&nbsp;&nbsp;
                                {{ $profile['name'] }}
                            </p>
                            <p class="text-xs text-end text-justify">
                                {{ Carbon\Carbon::parse(strtotime($i['created_at']))->translatedFormat('H:i:s') }}</p>
                            <p class="text-sm text-end text-white text-wrap text-justify dark:text-white">
                                {!! $i['from'] == $profile['id'] ? nl2br(e($i['message'])) : '' !!}
                            </p>
                        </div>
                        <div class="flex-shrink-0">
                            <img class="w-8 h-8 rounded-full"
                                src="{{ $profile['photo'] ?? asset('assets/images/5856.jpg') }}" alt="5856">
                        </div>
                    </div>
                @endif
            </li>
        @endforeach
    </ul>
    <form class="absolute bottom-0 flex flex-row items-center rounded-lg w-full">
        <input type="text" name="message" class="w-full py-2 ps-2 border-0 dark:bg-slate-400 text-wrap" />
        <input type="hidden" id="room_id_value" name="room">
        <button type="submit" class="absolute right-2 hover:cursor-pointer text-blue"><svg
                xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="lucide lucide-send-horizontal cursor-hover">
                <path d="m3 3 3 9-3 9 19-9Z" />
                <path d="M6 12h16" />
            </svg></button>
    </form>
</div>
<script>
    $(function() {
        refreshData.scrollTo(0, document.body.scrollHeight);
        $('form').on('submit', function(e) {
            e.preventDefault();
            $.ajax({
                url: "{{ route('inbox.store') }}",
                type: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    message: $("input[name=message]").val(),
                    room: $("#room_id_value").val()
                },
                success: function(data) {
                    $("#refresh").html(data.view);
                    $("input[name=message]").val('')
                    $("#room_id_value").attr('value', $("#room_id").val())
                }
            })
        })
        $("#room_id_value").attr('value', $("#room_id").val())
    })
</script>
