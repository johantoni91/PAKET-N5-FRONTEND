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
                            <div class="flex flex-row flex-wrap justify-between">
                                <div class="items-center ">
                                    <h1 class="font-medium text-3xl block dark:text-slate-100">Assessment Security</h1>
                                </div>
                                <button data-modal-target="create" data-modal-toggle="create"
                                    class="me-3 {{ $starterPack['theme']['button'] }}"><svg
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="lucide lucide-upload">
                                        <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4" />
                                        <polyline points="17 8 12 3 7 8" />
                                        <line x1="12" x2="12" y1="3" y2="15" />
                                    </svg></button>
                                @include('assessment.modals.create')
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="xl:w-full h-[83dvh] relative pb-14 flex flex-col justify-between">
                <div class="flex flex-row gap-5 flex-wrap justify-center">
                    @foreach ($data['data'] as $i)
                        <div class="inline-block items-center m-5 {{ $starterPack['theme']['bubble'] }} rounded-lg">
                            <div
                                class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
                                <embed class="p-5" src="{{ $i['dokumen'] }}" type="application/pdf">
                                <div class="flex flex-col justify-around pe-4">
                                    <div class="flex flex-col self-start mb-5">
                                        <h5 class="text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                            {{ $i['title'] }}</h5>
                                        <small
                                            class="dark:text-white">{{ Carbon\Carbon::parse($i['created_at'])->diffForHumans() }}</small>
                                    </div>
                                    <h5 class="font-semibold text-gray-700 dark:text-gray-400 text-wrap">
                                        {{ Illuminate\Support\Facades\Http::withToken($starterPack['profile']['token'])->get(env('API_URL', '') . '/pegawai' . '/' . $i['nip'] . '/find')->json()['data']['nama'] }}
                                    </h5>
                                    <p class="font-normal text-gray-700 dark:text-gray-400">{{ $i['nip'] }}</p>
                                    <div class="flex flex-row justify-center items-center mt-3 gap-5">
                                        <a href="{{ $i['dokumen'] }}" target="__blank" class="dark:text-white"><svg
                                                xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-eye">
                                                <path d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z" />
                                                <circle cx="12" cy="12" r="3" />
                                            </svg></a>
                                        <button data-modal-target="del{{ $i['id'] }}"
                                            data-modal-toggle="del{{ $i['id'] }}" class="text-red-600"><svg
                                                xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round"
                                                class="lucide lucide-trash-2">
                                                <path d="M3 6h18" />
                                                <path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6" />
                                                <path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2" />
                                                <line x1="10" x2="10" y1="11" y2="17" />
                                                <line x1="14" x2="14" y1="11" y2="17" />
                                            </svg></button>
                                        @include('assessment.modals.delete')
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                @include('partials.pagination')
                <div
                    class="absolute flex flex-col justify-center items-center gap-3 bottom-16 right-3 @error('judul') bg-red-700 @enderror @error('file') bg-red-700 @enderror text-white rounded-lg p-2">
                    @error('judul')
                        <small>{{ $message }}</small>
                    @enderror
                    @error('file')
                        <small>{{ $message }}</small>
                    @enderror
                </div>
            </div>
            @include('partials.footer')
        </div>
    </div>
    @push('scripts')
        <script src="{{ asset('assets/libs/apexcharts/apexcharts.min.js') }}"></script>
        <script src="{{ asset('assets/js/pages/analytics-index.init.js') }}"></script>
    @endpush
@endsection
