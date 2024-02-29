<table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
    <thead class="text-xs text-gray-700 uppercase dark:text-gray-400 border-b-2 border-slate-500">
        <tr class="text-center">
            <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                Nama
            </th>
            <th scope="col" class="px-6 py-3">
                Jabatan
            </th>
            <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                Jenis Kelamin
            </th>
            <th scope="col" class="px-6 py-3">
                Golongan
            </th>
            <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                Satker
            </th>
            <th scope="col" class="px-6 py-3">
                Status Pegawai
            </th>
            <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                Aksi
            </th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data['data'] as $item)
            <tr class="border-b border-gray-200 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <th scope="row"
                    class="px-6 py-4 text-black whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                    @if ($item['foto_pegawai'])
                        <img src="{{ $item['foto_pegawai'] }}" class="w-6 h-6 rounded-full shadow me-1 inline-block">
                    @else
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6 me-1 inline-block">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                        </svg>
                    @endif
                    {{ $item['nama'] }}
                </th>
                <td class="px-6 py-4">
                    {{ $item['jabatan'] }}
                </td>
                <td class="px-6 py-4 bg-gray-50 dark:bg-gray-800 text-center">
                    {{ $item['jenis_kelamin'] }}
                </td>
                <td class="px-6 py-4">
                    {{ $item['golpang'] }}
                </td>
                <td class="px-6 py-4 bg-gray-50 text-black dark:bg-gray-800 font-bold">
                    {{ $item['nama_satker'] }}
                </td>
                <td class="px-6 py-4">
                    {{ $item['status_pegawai'] }}
                </td>
                <td class="px-10 py-4 bg-gray-50 dark:bg-gray-800">
                    <div class="flex flex-row">
                        <a href="" class="text-blue-600 hover:text-blue-400">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                            </svg>
                        </a>
                        <a href="" class="text-red-600 hover:text-red-400">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                            </svg>
                        </a>
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
    <tfoot class="text-lg">
        <tr>
            <th class="text-center">
                Halaman {{ $data['current_page'] }}
            </th>
            <th colspan="3" class="text-center">
                @if (reset($data['links'])['url'] == null && end($data['links'])['url'] == null)
                    <small class="text-blue-500">Hanya ada 1 halaman</small>
                @else
                    <div class="flex flex-row justify-evenly">
                        @if (reset($data['links'])['url'] != null)
                            <a class="hover:text-blue-500 flex flex-row"
                                href="{{ route('pagination.search', ['kepegawaian.index', encrypt('http://localhost:8001/api/pegawai?page=1'), $route1, $route2, $title, $category, $search]) }}">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="m18.75 4.5-7.5 7.5 7.5 7.5m-6-15L5.25 12l7.5 7.5" />
                                </svg>
                                1
                            </a>
                        @endif
                        @if (reset($data['links'])['url'] != null)
                            <a class="hover:text-blue-500"
                                href="{{ route('pagination.search', ['kepegawaian.index', encrypt(reset($data['links'])['url'] ?? $data['first_page_url']), $route1, $route2, $title, $category, $search]) }}">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15.75 19.5 8.25 12l7.5-7.5" />
                                </svg>
                            </a>
                        @endif
                        <a class="hover:text-blue-500"
                            href="{{ route('pagination.search', ['kepegawaian.index', encrypt(end($data['links'])['url'] ?? $data['last_page_url']), $route1, $route2, $title, $category, $search]) }}">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                            </svg>
                        </a>
                        @if (end($data['links'])['url'] != null)
                            <a class="flex flex-row hover:text-blue-600"
                                href="{{ route('pagination.search', ['kepegawaian.index', encrypt($data['last_page_url']), $route1, $route2, $title, $category, $search]) }}">
                                {{ $data['last_page'] }}
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="m5.25 4.5 7.5 7.5-7.5 7.5m6-15 7.5 7.5-7.5 7.5" />
                                </svg>
                            </a>
                        @endif
                    </div>
                @endif
            </th>
            <th colspan="3" class="text-sm text-end font-normal">
                Berhasil
                mendapatkan
                <span class="text-green-500">{{ $data['total'] }}</span>
                data.
            </th>
        </tr>
    </tfoot>
</table>
