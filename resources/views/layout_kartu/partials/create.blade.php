<div class="flex flex-col gap-2 hidden" id="layout_kartu">
    <h1 class="font-bold mb-3 text-center dark:text-white">Posisi Tampilan kartu</h1>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 w-42">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr class="border-b-2 border-gray-600 dark:border-white">
                    <th scope="col" class="px-6 py-3 border-r text-center">
                        Atribut
                    </th>
                    <th scope="col" class="px-6 py-3 border-r text-center">
                        Status
                    </th>
                    <th scope="col" class="px-6 py-3 text-center">
                        Keterangan
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr class="bg-white dark:bg-gray-900 border-b dark:border-gray-700">
                    <th scope="row"
                        class="px-6 py-4 border-r font-semibold text-gray-900 whitespace-nowrap dark:text-white">
                        Ukuran / Bentuk kartu
                    </th>
                    <td class="px-6 py-4 border-r">
                        <div class="flex flex-row gap-2 justify-center items-center underline font-bold">
                            Aktif
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex justify-center flex-row gap-8">
                            <div class="flex flex-row gap-2 items-center">
                                <input type="radio" name="size" id="size1" value="w-24" checked>
                                <label for="size1">Potrait</label>
                            </div>
                            <div class="flex flex-row gap-2 items-center">
                                <input type="radio" name="size" id="size2" value="w-32">
                                <label for="size2">Landscape</label>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr class="bg-gray-50 dark:bg-gray-800 border-b dark:border-gray-700">
                    <th scope="row"
                        class="px-6 py-4 border-r font-semibold text-gray-900 whitespace-nowrap dark:text-white">
                        Latar belakang (depan)
                    </th>
                    <td class="px-6 py-4 border-r">
                        <div class="flex flex-row gap-2 justify-center items-center">
                            <input type="checkbox" class="rounded" name="check_latar_depan" id="check_latar_depan">
                            <label for="check_latar_depan">Aktif</label>
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <input
                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                            id="file_input" type="file">
                    </td>
                </tr>
                <tr class="bg-white dark:bg-gray-900 border-b dark:border-gray-700">
                    <th scope="row"
                        class="px-6 py-4 border-r font-semibold text-gray-900 whitespace-nowrap dark:text-white">
                        Latar belakang (belakang)
                    </th>
                    <td class="px-6 py-4 border-r">
                        <div class="flex flex-row gap-2 justify-center items-center">
                            <input type="checkbox" class="rounded" name="check_latar_depan" id="check_latar_depan">
                            <label for="check_latar_depan">Aktif</label>
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <input
                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                            id="file_input" type="file">
                    </td>
                </tr>
                <tr class="bg-gray-50 dark:bg-gray-800 border-b dark:border-gray-700">
                    <th scope="row"
                        class="px-6 py-4 border-r font-semibold text-gray-900 whitespace-nowrap dark:text-white">
                        Foto
                    </th>
                    <td class="px-6 py-4 border-r">
                        <div class="flex flex-row gap-2 justify-center items-center">
                            <input type="checkbox" class="rounded" name="check_foto" id="check_foto">
                            <label for="check_foto">Aktif</label>
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex justify-center flex-row gap-2 hidden" id="form_foto">
                            <div class="flex flex-row gap-2 items-center">
                                <input type="radio" name="foto" id="foto1">
                                <label for="foto1">Atas</label>
                            </div>
                            <div class="flex flex-row gap-2 items-center">
                                <input type="radio" name="foto" id="foto2">
                                <label for="foto2">Tengah</label>
                            </div>
                            <div class="flex flex-row gap-2 items-center">
                                <input type="radio" name="foto" id="foto3">
                                <label for="foto3">Kiri</label>
                            </div>
                            <div class="flex flex-row gap-2 items-center">
                                <input type="radio" name="foto" id="foto4">
                                <label for="foto4">Kanan</label>
                            </div>
                            <div class="flex flex-row gap-2 items-center">
                                <input type="radio" name="foto" id="foto5">
                                <label for="foto5">Bawah</label>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr class="bg-white dark:bg-gray-900 border-b dark:border-gray-700">
                    <th scope="row"
                        class="px-6 py-4 border-r font-semibold text-gray-900 whitespace-nowrap dark:text-white">
                        NIP
                    </th>
                    <td class="px-6 py-4 border-r">
                        <div class="flex flex-row gap-2 justify-center items-center">
                            <input type="checkbox" class="rounded" name="check_nip" id="check_nip">
                            <label for="check_nip">Aktif</label>
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex justify-center flex-row gap-2">
                            <div class="flex flex-row gap-2 items-center">
                                <input type="radio" name="nip" id="nip1">
                                <label for="nip1">Atas</label>
                            </div>
                            <div class="flex flex-row gap-2 items-center">
                                <input type="radio" name="nip" id="nip2">
                                <label for="nip2">Tengah</label>
                            </div>
                            <div class="flex flex-row gap-2 items-center">
                                <input type="radio" name="nip" id="nip3">
                                <label for="nip3">Kiri</label>
                            </div>
                            <div class="flex flex-row gap-2 items-center">
                                <input type="radio" name="nip" id="nip4">
                                <label for="nip4">Kanan</label>
                            </div>
                            <div class="flex flex-row gap-2 items-center">
                                <input type="radio" name="nip" id="nip5">
                                <label for="nip5">Bawah</label>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr class="bg-gray-50 dark:bg-gray-800 border-b dark:border-gray-700">
                    <th scope="row"
                        class="px-6 py-4 border-r font-semibold text-gray-900 whitespace-nowrap dark:text-white">
                        Nama
                    </th>
                    <td class="px-6 py-4 border-r">
                        <div class="flex flex-row gap-2 justify-center items-center">
                            <input type="checkbox" class="rounded" name="check_nama" id="check_nama">
                            <label for="check_nama">Aktif</label>
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex justify-center flex-row gap-2">
                            <div class="flex flex-row gap-2 items-center">
                                <input type="radio" name="nama" id="nama1">
                                <label for="nama1">Atas</label>
                            </div>
                            <div class="flex flex-row gap-2 items-center">
                                <input type="radio" name="nama" id="nama2">
                                <label for="nama2">Tengah</label>
                            </div>
                            <div class="flex flex-row gap-2 items-center">
                                <input type="radio" name="nama" id="nama3">
                                <label for="nama3">Kiri</label>
                            </div>
                            <div class="flex flex-row gap-2 items-center">
                                <input type="radio" name="nama" id="nama4">
                                <label for="nama4">Kanan</label>
                            </div>
                            <div class="flex flex-row gap-2 items-center">
                                <input type="radio" name="nama" id="nama5">
                                <label for="nama5">Bawah</label>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr class="bg-white dark:bg-gray-900 border-b dark:border-gray-700">
                    <th scope="row"
                        class="px-6 py-4 border-r font-semibold text-gray-900 whitespace-nowrap dark:text-white">
                        Golongan
                    </th>
                    <td class="px-6 py-4 border-r">
                        <div class="flex flex-row gap-2 justify-center items-center">
                            <input type="checkbox" class="rounded" name="check_golongan" id="check_golongan">
                            <label for="check_golongan">Aktif</label>
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex justify-center flex-row gap-2">
                            <div class="flex flex-row gap-2 items-center">
                                <input type="radio" name="jabatan" id="jabatan1">
                                <label for="jabatan1">Atas</label>
                            </div>
                            <div class="flex flex-row gap-2 items-center">
                                <input type="radio" name="jabatan" id="jabatan2">
                                <label for="jabatan2">Tengah</label>
                            </div>
                            <div class="flex flex-row gap-2 items-center">
                                <input type="radio" name="jabatan" id="jabatan3">
                                <label for="jabatan3">Kiri</label>
                            </div>
                            <div class="flex flex-row gap-2 items-center">
                                <input type="radio" name="jabatan" id="jabatan4">
                                <label for="jabatan4">Kanan</label>
                            </div>
                            <div class="flex flex-row gap-2 items-center">
                                <input type="radio" name="jabatan" id="jabatan5">
                                <label for="jabatan5">Bawah</label>
                            </div>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <button type="button" data-modal-target="create" data-modal-toggle="create"
        class="self-end m-3 focus:outline-none bg-primary-500 text-white border border-primary-500 hover:bg-transparent hover:text-primary-500 dark:bg-transparent dark:text-primary-500 dark:hover:text-white dark:border-gray-700 dark:hover:bg-primary-500 text-sm font-medium py-1 px-3 rounded w-24">
        Lihat hasil
    </button>
    @include('layout_kartu.partials.tampilan_kartu')
</div>
