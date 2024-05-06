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
                                    <h1 class="font-medium text-3xl block dark:text-slate-100">{{ $title }}</h1>
                                    <p class="ms-1 text-slate-600"> <a href="{{ route('perangkat') }}"
                                            class="text-blue-600 font-semibold">Data Perangkat </a> > Peralatan
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="xl:w-full  min-h-[calc(100vh-138px)] relative pb-14">
                <div class="xl:w-full  min-h-[calc(100vh-138px)] relative pb-14">
                    <div class="grid md:grid-cols-12 lg:grid-cols-12 xl:grid-cols-12 gap-4 mb-4">

                        <div class="sm:col-span-12  md:col-span-12 lg:col-span-12 xl:col-span-12 xl:col-start-0 ">
                            <div
                                class="bg-white dark:bg-gray-900 border border-slate-200 dark:border-slate-700/40  rounded-md w-full relative mb-4">
                                <div
                                    class="border-b border-slate-200 dark:border-slate-700/40 py-3 px-4 dark:text-slate-300/70">
                                    <div class="flex-row justify-between md:flex">
                                        <h4 class="font-medium text-lg flex-1 self-center mb-2 md:mb-0">Peralatan
                                        </h4>
                                        <a href="{{ route('perangkat') }}"
                                            class="pt-2 px-3 border align-bottom border-b-0 dark:border-slate-700/40 rounded-t-md -mb-3 hover:bg-gradient-to-b hover:from-violet-800 hover:to-red-500 hover:text-white dark:hover:bg-gradient-to-b dark:hover:from-cyan-300 dark:hover:to-zinc-500">Kembali
                                        </a>
                                    </div>
                                </div>
                                <div class="grid grid-cols-1 p-4 overflow-scroll">
                                    <div class="sm:-mx-6 lg:-mx-8">
                                        <form action="{{ route('perangkat.tc.store', [$id]) }}" method="post"
                                            enctype="multipart/form-data">
                                            @csrf
                                            @foreach ($perangkat as $item)
                                                <div
                                                    class="relative overflow-x-auto block w-full sm:px-6 lg:px-10 dark:text-white">
                                                    <div class="grid grid-cols-4 gap-4 mb-3">
                                                        <div class="text-start font-semibold">
                                                            <label for="perangkat">{{ $item['perangkat'] }}</label>
                                                            <input type="hidden" value="{{ $item['id'] }}"
                                                                name="id_perangkat[]">
                                                        </div>
                                                    </div>
                                                    <div class="grid grid-cols-4 gap-4 mb-3">
                                                        <div class="col-span-2 flex items-end">
                                                            <label for="serial_number">Nomor Seri</label>
                                                        </div>
                                                        <div class="col-span-2 text-start font-bold">
                                                            <div class="relative z-0">
                                                                <input type="text" id="sn" name="serial_number[]"
                                                                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                                                    placeholder="" />
                                                                <label for="sn"
                                                                    class="absolute text-sm text-gray-500 dark:text-gray-400 duration-700 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Nomor
                                                                    Seri</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="grid grid-cols-4 gap-4 mb-3 pb-4 border-b-2 dark:border-gray-600">
                                                        <div class="col-span-2 text-start">
                                                            <label for="photo">Foto Alat</label>
                                                        </div>
                                                        <div class="col-span-2 text-start">
                                                            <input name="photo[]"
                                                                class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                                                id="file_input" type="file">
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                            <div class="flex justify-end me-10">
                                                <button type="submit"
                                                    class="focus:outline-none bg-gradient-to-r from-violet-800 to-red-500 text-white dark:bg-gradient-to-r dark:from-zinc-500 dark:to-cyan-300 dark:hover:from-cyan-300 dark:hover:to-zinc-500 dark:text-white text-sm font-medium py-1 px-3 rounded hover:from-red-500 hover:to-violet-800">Simpan</button>
                                            </div>
                                        </form>
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
