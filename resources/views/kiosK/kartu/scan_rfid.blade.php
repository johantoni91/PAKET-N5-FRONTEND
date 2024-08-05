@extends('kiosK.partials.main_menu')
@section('content_kios')
    <div class="w-full h-[50%] flex flex-col justify-center items-center">
        <p id="title">Mohon Scan kartu anda dan tahan sampai proses selesai</p>
        <form class="w-[65%]" id="submit_uid" action="{{ route('kios.rfid.store') }}" method="post">
            @csrf
            <div class="flex flex-row gap-2 w-full items-center ms-4 mb-3">
                <label for="token">User : </label>
                <input type="text" id="token" name="token" value="{{ $token }}" readonly
                    class="border-none bg-transparent rounded-lg">
            </div>
            <input type="text" id="rfid" name="rfid" readonly class="w-full border rounded-lg">
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(function() {
            setInterval(() => {
                $.get("{{ route('nfc') }}", function(data) {
                    if (!(data.data == null)) {
                        let hexArrayString = data.data.match(
                            /\['0x[0-9a-fA-F]+', '0x[0-9a-fA-F]+', '0x[0-9a-fA-F]+', '0x[0-9a-fA-F]+'\]/
                        );
                        let hexArray = JSON.parse(hexArrayString[0].replace(
                            /'/g, '"'));
                        let formattedHexString = hexArray.map(hex => hex.slice(
                            2)).join('');
                        $("#rfid").val(formattedHexString)
                        $("#submit_uid").submit()
                    }
                })
            }, 3000);
        })
    </script>
@endsection
