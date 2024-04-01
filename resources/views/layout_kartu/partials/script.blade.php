<script>
    $(document).ready(function() {
        $('#check_latar_depan').change(function() {
            if ($(this).is(':checked')) {
                $("#latar_depan").append(`<div id="pilih" class="flex flex-col gap-2 justify-start">
                <select id="background"
                    class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option selected disabled>Pilih latar belakang</option>
                    <option value="warna">Warna</option>
                    <option value="gambar">Gambar</option>
                </select>
                <div id="latar_depan">
                </div>
            </div>`)
                $("#background").change(function() {
                    if ($(this).val() == 'warna') {
                        $("#latar_depan").append(`<div id='warna_depan' class="flex flex-row items-center gap-2"><label for="warna_depan">Pilih warna :</label><input
                class="block w-12 text-sm text-gray-900 cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                id="front_color_input" type="color"></div>`)
                        $("#gambar_depan").remove()
                        $("#front_color_input").change(function() {
                            console.log($(
                                    "#front_color_input")
                                .val())
                            $("#kartu_tampil_depan").css({
                                'background-color': $("#front_color_input")
                                    .val()
                            })
                        })
                    } else {
                        $("#latar_depan").append(`<div id='gambar_depan'><input
                class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                id="front_file_input" type="file"></div>`)
                        $("#warna_depan").remove()
                        $("#front_file_input").on("input", function() {
                            console.log($(this).val())
                            $("kartu_tampil_depan").css({
                                "background-image": $("#front_file_input")
                                    .val(),
                                "background-position": "center",
                                "background-size": "cover"
                            })
                        })
                    }
                })
            } else {
                $("#depan").remove()
                $("#pilih").remove()
            }
        });
        $('#check_latar_belakang').change(function() {
            if ($(this).is(':checked')) {
                $("#latar_belakang").append(`<div id='belakang'><input
                class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                id="file_input" type="file"></div>`)
            } else {
                $("#belakang").remove()
            }
        });
        $('#check_foto').change(function() {
            if ($(this).is(':checked')) {
                $("#cP").append(`<div class="flex justify-center flex-row gap-2" id="form_foto">
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
            </div>`)
            } else {
                $("#form_foto").remove()
            }
        });
        $(document).off('change', '#check_atribut').on('change', '#check_atribut', function(e) {
            e.preventDefault()
            if ($(this).is(':checked')) {
                $("#posisi_atribut").append(`<div class="flex justify-center flex-row gap-2">
                <div class="flex flex-row gap-2 items-center">
                    <input type="radio" name="atribut" id="atribut1">
                    <label for="atribut1">Horizontal</label>
                </div>
                <div class="flex flex-row gap-2 items-center">
                    <input type="radio" name="atribut" id="atribut2">
                    <label for="atribut2">Vertikal</label>
                </div>
            </div>`);

                $("#form_atribut").append(`<tr class="bg-white dark:bg-gray-900 border-b dark:border-gray-700">
        <th scope="row" class="px-6 py-4 border-r font-semibold text-gray-900 whitespace-nowrap dark:text-white">
            NIP
        </th>
        <td class="px-6 py-4 border-r">
            <div class="flex flex-row gap-2 justify-center items-center">
                <input type="checkbox" class="rounded" name="check_latar_depan" id="check_latar_depan">
                <label for="check_latar_depan">Aktif</label>
            </div>
        </td>
        <td class="px-6 py-4 text-center">
            -
        </td>
    </tr>
    <tr class="bg-gray-50 dark:bg-gray-800 border-b dark:border-gray-700">
        <th scope="row" class="px-6 py-4 border-r font-semibold text-gray-900 whitespace-nowrap dark:text-white">
            NRP
        </th>
        <td class="px-6 py-4 border-r">
            <div class="flex flex-row gap-2 justify-center items-center">
                <input type="checkbox" class="rounded" name="check_foto" id="check_foto">
                <label for="check_foto">Aktif</label>
            </div>
        </td>
        <td class="px-6 py-4 text-center">
            -
        </td>
    </tr>
    <tr class="bg-white dark:bg-gray-900 border-b dark:border-gray-700">
        <th scope="row" class="px-6 py-4 border-r font-semibold text-gray-900 whitespace-nowrap dark:text-white">
            Agama
        </th>
        <td class="px-6 py-4 border-r">
            <div class="flex flex-row gap-2 justify-center items-center">
                <input type="checkbox" class="rounded" name="check_latar_depan" id="check_latar_depan">
                <label for="check_latar_depan">Aktif</label>
            </div>
        </td>
        <td class="px-6 py-4 text-center">
            -
        </td>
    </tr>
    <tr class="bg-gray-50 dark:bg-gray-800 border-b dark:border-gray-700">
        <th scope="row" class="px-6 py-4 border-r font-semibold text-gray-900 whitespace-nowrap dark:text-white">
            Jabatan
        </th>
        <td class="px-6 py-4 border-r">
            <div class="flex flex-row gap-2 justify-center items-center">
                <input type="checkbox" class="rounded" name="check_foto" id="check_foto">
                <label for="check_foto">Aktif</label>
            </div>
        </td>
        <td class="px-6 py-4 text-center">
            -
        </td>
    </tr>`)
            } else {
                $("#posisi_atribut").remove()
                $("#form_atribut").remove()
            }
        });
    })
</script>
