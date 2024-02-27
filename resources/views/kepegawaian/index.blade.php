@extends('partials.main')
@section('content')
    @include('partials.sidebar')
    @include('partials.topbar')
    <style>
        .datatable-input {
            border: 1px solid rgb(203 213 225 / .6);
            border-radius: 0.25rem;
        }
    </style>
    <div class="ltr:flex flex-1 rtl:flex-row-reverse">
        <div class="page-wrapper relative ltr:ml-auto rtl:mr-auto rtl:ml-0 w-[calc(100%-260px)] px-4 pt-[64px] duration-300">
            <div class="xl:w-full">
                <div class="flex flex-wrap">
                    <div class="flex items-center py-4 w-full">
                        <div class="w-full">
                            <div class="flex flex-wrap justify-between">
                                <div class="items-center ">
                                    <h1 class="font-medium text-3xl block dark:text-slate-100">{{ $title }}</h1>
                                    {{-- <ol class="list-reset flex text-sm">
                                    <li><button type="button" class="text-gray-500 dark:text-slate-400">Robotech</button></li>
                                    <li><span class="text-gray-500 dark:text-slate-400 mx-2">/</span></li>
                                    <li class="text-gray-500 dark:text-slate-400">Tables</li>
                                    <li><span class="text-gray-500 dark:text-slate-400 mx-2">/</span></li>
                                    <li class="text-primary-500 hover:text-primary-600 dark:text-primary-400">Datatable
                                    </li>
                                </ol> --}}
                                </div><!--end /div-->
                                {{-- <div>
                                    <input type="date" name="date" id="date" value="{{ now()->format('Y-m-d') }}"
                                        max="{{ now()->format('Y-m-d') }}"
                                        class="rounded-lg bg-blue-300 z-10 border-0 text-transparent focus:border-0 dark:border-slate-700 dark:text-white dark:bg-slate-700">
                                    <span
                                        class="absolute right-[2.8rem] px-5 rounded-lg top-[5.1rem] bg-blue-300 p-2 dark:text-white dark:bg-slate-700"
                                        id="now"></span>
                                </div>
                                <script>
                                    var dateString = $("#date").val();
                                    var date = new Date(dateString);

                                    var options = {
                                        year: 'numeric',
                                        month: 'short',
                                        day: 'numeric'
                                    };
                                    var humanDate = date.toLocaleDateString('id-ID', options);
                                    $("#now").text(humanDate);
                                    $(document).ready(function() {
                                        $("#date").on('change', function(e) {
                                            e.preventDefault()
                                            var dateString = $("#date").val();
                                            var date = new Date(dateString);

                                            var options = {
                                                year: 'numeric',
                                                month: 'short',
                                                day: 'numeric'
                                            };
                                            var humanDate = date.toLocaleDateString('id-ID', options);
                                            $("#now").text(humanDate);
                                        })
                                    })
                                </script> --}}
                            </div><!--end /div-->
                        </div><!--end /div-->
                    </div><!--end /div-->
                </div><!--end /div-->
            </div><!--end container-->
            <div class="xl:w-full  min-h-[calc(100vh-138px)] relative pb-14">
                <div class="xl:w-full  min-h-[calc(100vh-138px)] relative pb-14">
                    <div class="grid md:grid-cols-12 lg:grid-cols-12 xl:grid-cols-12 gap-4 mb-4">

                        <div class="sm:col-span-12  md:col-span-12 lg:col-span-12 xl:col-span-12 xl:col-start-0 ">
                            <div
                                class="bg-white dark:bg-gray-900 border border-slate-200 dark:border-slate-700/40  rounded-md w-full relative mb-4">
                                <div
                                    class="border-b border-slate-200 dark:border-slate-700/40 py-3 px-4 dark:text-slate-300/70">
                                    <div class="flex-none md:flex">
                                        <h4 class="font-medium text-lg flex-1 self-center mb-2 md:mb-0">Data Pegawai</h4>
                                        <div class="gap-5">
                                            <a href="{{ route('excel.users') }}"
                                                class="inline-block focus:outline-none text-green-500 hover:bg-green-500 hover:text-white bg-transparent border border-green-500 dark:bg-transparent dark:text-green-500 dark:hover:text-white dark:border-gray-700 dark:hover:bg-green-500 text-sm font-medium py-1 px-3 rounded mb-1 lg:mb-0 csv">Export
                                                Excel</a>
                                            <a href="{{ route('pdf.users') }}"
                                                class="inline-block focus:outline-none text-red-400 hover:bg-red-500 hover:text-white bg-transparent border border-red-400 dark:bg-transparent dark:text-red-500 dark:hover:text-white dark:border-gray-700 dark:hover:bg-red-500 text-sm font-medium py-1 px-3 rounded mb-1 lg:mb-0 sql">Export
                                                PDF</a>
                                        </div>
                                    </div>
                                </div><!--end header-title-->
                                <div class="grid grid-cols-1 p-4 overflow-scroll">
                                    <div class="sm:-mx-6 lg:-mx-8">
                                        <div class="relative overflow-x-auto block w-full sm:px-6 lg:px-8">
                                            <div class="flex flex-col gap-3 mb-5">
                                                <button type="button" data-modal-target="create" data-modal-toggle="create"
                                                    style="margin-left: 9px"
                                                    class="focus:outline-none ms-2.5 text-primary-500 hover:bg-primary-500 hover:text-white bg-transparent border border-primary-500 dark:bg-transparent dark:text-primary-500 dark:hover:text-white dark:border-gray-700 dark:hover:bg-primary-500 text-sm font-medium py-1 px-3 rounded mb-1 w-24">+
                                                    Pegawai</button>
                                                @include('partials.modals.createUser')
                                                <div class="flex flex-row md:gap-x-5 flex-wrap md:flex-nowrap">
                                                    <div>
                                                        <select id="category"
                                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm font-medium ms-2.5 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                            <option value="0" disabled selected>Cari
                                                                berdasarkan
                                                                kategori &nbsp; &nbsp;
                                                            </option>
                                                            <option value="username">Username</option>
                                                            <option value="name">Nama</option>
                                                            <option value="email">Email</option>
                                                            <option value="phone">Telepon</option>
                                                            <option value="role">Role</option>
                                                            <option value="status">Status</option>
                                                        </select>
                                                    </div>
                                                    <input type="text" id="search" placeholder="Cari ..."
                                                        class="w-1/2 me-2.5 md:ms-0 ms-2.5 mt-3 md:mt-0 bg-gray-200 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                </div>
                                            </div>
                                            <div class="flex flex-col gap-5">
                                                <div class="datatable_1">
                                                    <table class="w-full border-collapse" width="100%" id="datatable_1">
                                                        <thead class="bg-slate-100 dark:bg-slate-700/20">
                                                            <tr>
                                                                <th scope="col"
                                                                    class="p-3 text-xs font-medium tracking-wider text-left text-gray-700 dark:text-gray-400 uppercase">
                                                                    Nama
                                                                </th>
                                                                <th scope="col"
                                                                    class="p-3 text-xs font-medium tracking-wider text-left text-gray-700 dark:text-gray-400 uppercase">
                                                                    Jabatan
                                                                </th>
                                                                <th scope="col"
                                                                    class="p-3 text-xs font-medium tracking-wider text-left text-gray-700 dark:text-gray-400 uppercase">
                                                                    Golongan
                                                                </th>
                                                                <th scope="col"
                                                                    class="p-3 text-xs font-medium tracking-wider text-left text-gray-700 dark:text-gray-400 uppercase">
                                                                    Agama
                                                                </th>
                                                                <th scope="col"
                                                                    class="p-3 text-xs font-medium tracking-wider text-left text-gray-700 dark:text-gray-400 uppercase">
                                                                    Satker
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
                                                            @if ($data == null)
                                                                <tr>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td><small class="text-red-600 italic"> -- Belum ada
                                                                            pegawai --
                                                                        </small></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                </tr>
                                                            @else
                                                                @foreach ($data as $item)
                                                                    <tr
                                                                        class="bg-white border-b border-dashed dark:bg-gray-900 dark:border-gray-700">
                                                                        <td
                                                                            class="align-baseline whitespace-nowrap p-3 text-sm font-medium dark:text-white">
                                                                            <img src="{{ $item['foto_pegawai'] }}"
                                                                                alt=""
                                                                                class="mr-2 h-6 rounded-full inline-block">{{ $item['nama'] }}
                                                                        </td>
                                                                        <td
                                                                            class="align-baseline whitespace-nowrap p-3 text-sm text-gray-500 dark:text-gray-400">
                                                                            {{ $item['jabatan'] }}
                                                                        </td>
                                                                        <td
                                                                            class="align-baseline whitespace-nowrap p-3 text-sm text-gray-500 dark:text-gray-400">
                                                                            {{ $item['golpang'] }}
                                                                        </td>
                                                                        <td
                                                                            class="align-baseline whitespace-nowrap p-3 text-sm text-gray-500 dark:text-gray-400">
                                                                            {{ $item['agama'] }}
                                                                        </td>
                                                                        <td
                                                                            class="align-baseline whitespace-nowrap p-3 text-sm text-gray-500 dark:text-gray-400">
                                                                            {{ $item['nama_satker'] }}
                                                                        </td>
                                                                        <td
                                                                            class="align-baseline whitespace-nowrap p-3 text-sm text-gray-500 dark:text-gray-400">
                                                                            {{ $item['status_pegawai'] }}
                                                                        </td>
                                                                        <td
                                                                            class="p-3 text-sm text-gray-500 dark:text-gray-400">
                                                                            <button type="button"
                                                                                data-modal-target="update{{ $item['nip'] }}"
                                                                                data-modal-toggle="update{{ $item['nip'] }}"><i
                                                                                    class="align-baseline icofont-edit text-lg text-gray-500 dark:text-gray-400"></i></button>

                                                                            <input type="hidden"
                                                                                value="{{ $item['nip'] }}"
                                                                                id="del{{ $item['nip'] }}">
                                                                            <button type="button"
                                                                                id="delete{{ $item['nip'] }}"><i
                                                                                    class="align-baseline icofont-ui-delete text-lg text-red-500 dark:text-red-400"></i></button>
                                                                            <script>
                                                                                $(document).ready(function() {
                                                                                    $("#delete{{ $item['nip'] }}").on('click', function(e) {
                                                                                        e.preventDefault()
                                                                                        var id = $("#del{{ $item['nip'] }}").val()
                                                                                        Swal.fire({
                                                                                            title: "PERINGATAN",
                                                                                            text: "Apakah anda yakin menghapus user {{ $item['nama'] }} ?",
                                                                                            icon: "warning",
                                                                                            showCancelButton: true,
                                                                                            confirmButtonColor: "#3085d6",
                                                                                            cancelButtonColor: "#d33",
                                                                                            confirmButtonText: "Hapus"
                                                                                        }).then((result) => {
                                                                                            if (result.isConfirmed) {
                                                                                                $.ajax({
                                                                                                    url: "{{ route('user.destroy') }}",
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
                                                                            {{-- @include('partials.modals.users') --}}
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                            @endif
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="datatable_2">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div><!--end card-body-->
                            </div> <!--end card-->
                        </div><!--end col-->
                    </div>
                </div>
                @include('partials.footer')
            </div><!--end page-wrapper-->
        </div><!--end /div-->
    </div>
    <script>
        $(document).ready(function() {
            $('#search').addClass('hidden')
            $('#category').on('change', function() {
                if ($(this).val() != '0') {
                    $('#search').removeClass('hidden')
                }
            })

            $('#search').keyup(function() {
                var search = $(this).val();
                var category = $('#category').val();
                $.get("{{ route('user.search') }}", {
                    category: category,
                    search: search
                }, function(data) {
                    if ($('#search').val() != '') {
                        $('.datatable_1').addClass('hidden')
                        $('.datatable_2').removeClass('hidden')
                        $('.datatable_2').html(data)
                    } else {
                        $('.datatable_1').removeClass('hidden')
                        $('.datatable_2').addClass('hidden')
                    }
                });
            });
        })
    </script>
@endsection