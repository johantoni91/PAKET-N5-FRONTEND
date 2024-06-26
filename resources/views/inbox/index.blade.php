@extends('partials.main')
@section('content')
    @include('partials.sidebar')
    @include('partials.topbar')
    <div class="ltr:flex flex-1 rtl:flex-row-reverse">
        <div class="page-wrapper relative ltr:ml-auto rtl:mr-auto rtl:ml-0 w-[calc(100%-260px)] px-4 pt-[64px] duration-300">
            <div class="xl:w-full">
                <div class="flex flex-wrap">
                    <div class="flex items-center py-4 w-full">
                        <div class="w-full">
                            <div class="flex flex-wrap justify-between">
                                <div class="items-center ">
                                    <h1 class="font-medium text-3xl block dark:text-slate-100">Pesan</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="xl:w-full  min-h-[calc(100vh-138px)] relative pb-14">
                <div class="xl:w-full  min-h-[calc(100vh-138px)] relative pb-14">
                    <div class="grid md:grid-cols-12 lg:grid-cols-12 xl:grid-cols-12 gap-4 mb-4">
                        <div class="sm:col-span-12  md:col-span-12 lg:col-span-12 xl:col-span-12 xl:col-start-0">
                            <div
                                class="bg-white dark:bg-gray-900 border border-slate-200 dark:border-slate-700/40 rounded-md w-full relative mb-4 h-[screen-20dvh]">
                                <div
                                    class="border-b border-slate-200 dark:border-slate-700/40 py-3 px-4 dark:text-slate-300/70">
                                    <div class="flex-none md:flex">
                                        <h4 class="font-medium text-lg flex-1 self-center mb-2 md:mb-0">Data Pesan</h4>
                                    </div>
                                </div>
                                <div class="grid grid-cols-1 p-4 overflow-scroll">
                                    <div class="sm:-mx-6 lg:-mx-8">
                                        <div class="relative overflow-x-auto block w-full sm:px-6 lg:px-10">
                                            <div class="relative overflow-x-auto p-5">
                                                <div class="flex flex-row-reverse md:flex-nowrap flex-wrap gap-2">
                                                    <div class="w-full md:w-2/6">
                                                        <ul class="divide-y divide-gray-200 dark:divide-gray-700">
                                                            @foreach ($users as $user)
                                                                @if ($user['id'] != session('data')['id'])
                                                                    <li
                                                                        class="py-2 ps-1 hover:bg-slate-400/50 dark:hover:bg-slate-200/50 overflow-scroll">
                                                                        <button id="chat{{ $user['id'] }}"
                                                                            class="flex flex-row gap-2 items-center">
                                                                            <div class="flex flex-row items-center">
                                                                                <img class="w-8 h-8 rounded-full me-1"
                                                                                    src="{{ $user['photo'] ?? asset('assets/images/5856.jpg') }}">
                                                                                <p
                                                                                    class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                                                                    {{ Illuminate\Support\Facades\Http::withToken(session('data')['token'])->get(env('API_URL', '') . '/pegawai' . '/' . $user['nip'] . '/find')->json()['data']['nama'] ?? '(Pegawai tidak terdaftar)' }}
                                                                                </p>
                                                                            </div>
                                                                        </button>
                                                                        <script>
                                                                            $(function() {
                                                                                $("#chat{{ $user['id'] }}").on('click', function() {
                                                                                    $.ajax({
                                                                                        url: "{{ route('inbox.room') }}",
                                                                                        type: "POST",
                                                                                        data: {
                                                                                            _token: "{{ csrf_token() }}",
                                                                                            user2: "{{ $user['id'] }}"
                                                                                        },
                                                                                        success: function(data) {
                                                                                            $("#room").html(data.view)
                                                                                        }
                                                                                    })
                                                                                })
                                                                            })
                                                                        </script>
                                                                    </li>
                                                                @endif
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                    <div id="room"
                                                        class="md:w-4/6 w-full flex flex-col justify-between gap-1 bg-slate-200 rounded shadow overflow-y-scroll mb-3 rounded-lg dark:bg-slate-800"
                                                        style="min-height:60dvh; max-height: 60dvh;">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @include('partials.footer')
            </div>
        </div>
    </div>
@endsection
