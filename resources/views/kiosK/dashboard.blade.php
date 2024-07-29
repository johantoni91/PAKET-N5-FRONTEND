@extends('kiosK.partials.main_menu')
@section('content_kios')
    <div class="flex flex-row items-center justify-start w-full shadow-lg shadow-black rounded-lg">
        <a href="{{ route('kios.token') }}"
            class="self-start flex flex-col gap-2 justify-center items-center text-center rounded-lg bg-green-200/50 shadow shadow-green-500 hover:bg-white hover:text-black shadow-lg"
            style="min-width: 200px; height:175px;">
            <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="lucide lucide-printer mt-auto">
                <path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2" />
                <path d="M6 9V3a1 1 0 0 1 1-1h10a1 1 0 0 1 1 1v6" />
                <rect x="6" y="14" width="12" height="8" rx="1" />
            </svg>
            <p class="mt-auto uppercase font-bold" style="font-size: 1.4em;">Cetak</p>
        </a>
        <p class="ms-5 me-3" style="font-size: 1.7em;">Menu ini digunakan untuk melakukan pencetakan kartu pegawai.
        </p>
    </div>
    <div class="flex flex-row items-center justify-end w-full shadow-lg shadow-black rounded-lg">
        <p class="me-5 ms-3 text-end" style="font-size: 1.7em;">Menu ini digunakan untuk melakukan pemindaian
            kartu pegawai.</p>
        <a href="{{ route('kios.token.check') }}"
            class="self-end flex flex-col gap-2 justify-center items-center text-center rounded-lg bg-green-200/50 shadow shadow-green-500 hover:bg-white hover:text-black shadow-lg"
            style="min-width: 200px; height:175px;">
            <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="lucide lucide-credit-card mt-auto">
                <rect width="20" height="14" x="2" y="5" rx="2" />
                <line x1="2" x2="22" y1="10" y2="10" />
            </svg>
            <p class="mt-auto uppercase font-bold" style="font-size: 1.4em;">Kartu</p>
        </a>
    </div>
    <div class="flex flex-row items-center justify-start w-full shadow-lg shadow-black rounded-lg">
        <button id="profil"
            class="self-start flex flex-col gap-2 justify-center items-center text-center rounded-lg bg-green-200/50 shadow shadow-green-500 hover:bg-white hover:text-black shadow-lg"
            style="min-width: 200px; height:175px;">
            <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="lucide lucide-user mt-auto">
                <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2" />
                <circle cx="12" cy="7" r="4" />
            </svg>
            <p class="mt-auto uppercase font-bold" style="font-size: 1.4em;">Lihat</p>
        </button>
        <p class="ms-5 me-3" style="font-size: 1.7em;">Menu ini digunakan untuk melihat data pegawai.</p>
        <script>
            $(function() {
                $("#profil").click(function() {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Pemberitahuan',
                        text: 'Harap scan kartu anda dan mohon jangan lepaskan kartu pada scanner sampai proses selesai.',
                        showCancelButton: true,
                        confirmButtonText: "Sudah scan",
                        cancelButtonText: `Batal`
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $.get("{{ route('nfc') }}", function(data) {
                                if (!(data.data == null)) {
                                    let hexArrayString = data.data.match(
                                        /\['0x[0-9a-fA-F]+', '0x[0-9a-fA-F]+', '0x[0-9a-fA-F]+', '0x[0-9a-fA-F]+'\]/
                                    );
                                    let hexArray = JSON.parse(hexArrayString[0].replace(
                                        /'/g, '"'));
                                    let formattedHexString = hexArray.map(hex => hex.slice(
                                        2)).join('');

                                    window.location.href = "{{ env('APP_URL', '') }}" +
                                        `/kios/${formattedHexString}/profil`
                                } else {
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Oops...',
                                        text: 'Kartu anda tidak terdeteksi'
                                    })
                                }
                            })
                        }
                    });
                })
            })
        </script>
    </div>
@endsection
