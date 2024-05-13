@extends('kiosK.partials.main')
@section('kiosk')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.26/webcam.min.js"></script>
    <div
        class="bg-slate-200 flex flex-col gap-5 justify-center items-center"style="width: 100dvw; height:100dvh; background-position: center; background-repeat: no-repeat; background-size: cover; background-image: url({{ asset('assets/images/bg-kios.jpg') }});">
        <form action="{{ route('kios.verifikasi', [$token]) }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="flex flex-row gap-5 justify-center items-center">
                <div class="flex flex-col justify-center items-center w-1/2">
                    <div class="w-42 h-42" id="my_camera"></div>
                    <input type="button" id="verif" value="Verifikasi Wajah"
                        class="cursor-pointer p-2 mt-4 bg-white font-bold border border-black rounded-lg"
                        onClick="take_snapshot()">
                    <input type="hidden" name="photo" class="image-tag">
                </div>
                <div class="w-42 h-42">
                    <div id="results"></div>
                </div>
            </div>
            <div class="w-42 h-42 text-center">
                <button type="submit" id="lanjut"
                    class="hidden p-2 bg-white rounded-lg border-2 border-black">Lanjutkan</button>
            </div>
        </form>
    </div>
    <script language="JavaScript">
        Webcam.set({
            width: 500,
            height: 380,
            image_format: 'jpeg',
            jpeg_quality: 90
        });

        Webcam.attach('#my_camera');

        function take_snapshot() {
            Webcam.snap(function(data_uri) {
                $(".image-tag").val(data_uri);
                document.getElementById('results').innerHTML = '<img style="margin-bottom: 3.2rem;" src="' +
                    data_uri + '"/>';
                $("#verif").val('Verifikasi ulang')
                $("#lanjut").removeClass('hidden')
            });
        }
    </script>
@endsection
