<!DOCTYPE html>
<html lang="en" class="scroll-smooth group" data-sidebar="brand" dir="ltr">
<meta charset="utf-8" />
<title>OTENTIK | ERROR 500</title>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
<meta content="Tailwind Multipurpose Admin & Dashboard Template" name="description" />
<meta content="" name="Mannatthemes" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<!-- App favicon -->
<link rel="shortcut icon" href="assets/images/favicon.ico" />
<link rel="stylesheet" href="assets/css/tailwind.min.css">
@vite('resources/css/app.css')

<body data-layout-mode="light" data-sidebar-size="default" data-theme-layout="vertical"
    class="bg-[#EEF0FC] dark:bg-gray-900">
    @include('sweetalert::alert')
    <div class="relative flex flex-col justify-center min-h-screen overflow-hidden">
        <div
            class="w-[80%] m-auto bg-white dark:bg-slate-800/60 rounded shadow-lg ring-2 ring-slate-300/50 dark:ring-slate-700/50 sm:max-w-md">
            <div class="text-center p-6 bg-slate-900 rounded-t">
                <a href="index.html"><img src="assets/images/kejaksaan-logo.png" alt=""
                        class="w-20 h-20 mx-auto mb-2"></a>
                <h3 class="font-semibold text-white text-xl mb-1">Terjadi kesalahan</h3>
            </div>

            <form class="p-6">
                <div class="text-center">
                    <img src="assets/images/widgets/error.png" alt="" class="w-32 h-32 block mx-auto my-6">
                    <h1 class="font-bold text-7xl dark:text-slate-200">500!</h1>
                    <h5 class="font-medium text-lg text-slate-400">Internal Server Error
                    </h5>
                </div>
                <div class="mt-4">
                    <a href="{{ route('dashboard') }}"
                        class="w-full block text-center px-2 py-2 tracking-wide text-white transition-colors duration-200 transform bg-brand-500 rounded hover:bg-brand-600 focus:outline-none focus:bg-brand-600">
                        Kembali
                    </a>
                </div>
            </form>
        </div>
    </div>
</body>
<script src="{{ asset('assets/js/app.js') }}"></script>

</html>
