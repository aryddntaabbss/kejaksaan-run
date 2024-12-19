<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>{{ @$title != '' ? "$title - " : '' }} {{ $websiteTitle }}</title>

        {{-- --}}
        <meta content="{!! $websiteDeskripsi !!}" name="description">
        <meta content="{{ $websiteKeyword }}" name="keywords">

        <!-- Favicons -->
        <link href="{{ asset('storage/' . $websiteLogo) }}" rel="icon">
        <link href="{{ asset('storage/' . $websiteLogo) }}" rel="apple-touch-icon">
        <meta name="author" content="TongIt">

        <!-- Google Fonts -->
        <link href="https://fonts.gstatic.com" rel="preconnect">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
        <link
            href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
            rel="stylesheet">

        <!-- FontAwesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Vendor CSS Files -->
        <link href="{{ asset('backend/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('backend/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
        <link href="{{ asset('backend/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
        <link href="{{ asset('backend/vendor/quill/quill.snow.css') }}" rel="stylesheet">
        <link href="{{ asset('backend/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
        <link href="{{ asset('backend/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
        <link href="{{ asset('backend/vendor/simple-datatables/style.css') }}" rel="stylesheet">

        <!-- Template Main CSS File -->
        <link href="{{ asset('backend/css/style.css') }}" rel="stylesheet">

        @notifyCss


        <style>
            .notify {
                position: fixed;
                /* Ensure it is fixed */
                top: 20px;
                /* Adjust as needed */
                right: 20px;
                /* Adjust as needed */
                z-index: 9999;
                /* Make sure this is a high value */
            }

            /* .datatable-dropdown .datatable-selector {
            display: none;
        } */

            /* Styling untuk input pencarian */
            .datatable-search .datatable-input {
                display: none;
            }

            /* Border saat elemen berada dalam keadaan focus (diklik) */
            /* .datatable-search .datatable-input:focus,
        .datatable-dropdown .datatable-selector:focus {
            display: none;
        } */
        </style>
        @yield('head')

        <!-- PWA  -->
        <meta name="theme-color" content="#ffffff">
        <link rel="apple-touch-icon" href="{{ asset('logo.png') }}">
        <link rel="manifest" href="{{ asset('/manifest.json') }}">
    </head>

    <body class="min-h-screen  flex flex-col bg-gray-100 overflow-x-hidden">

        <main class="flex-grow">
            @yield('body')
        </main>

        @include('frontend.layouts.footer')

        <script src="https://cdn.tailwindcss.com"></script>

        <!-- Vendor JS Files -->
        <script src="{{ asset('backend/vendor/apexcharts/apexcharts.min.js') }}"></script>
        <script src="{{ asset('backend/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('backend/vendor/chart.js/chart.umd.js') }}"></script>
        <script src="{{ asset('backend/vendor/echarts/echarts.min.js') }}"></script>
        <script src="{{ asset('backend/vendor/quill/quill.js') }}"></script>
        <script src="{{ asset('backend/vendor/simple-datatables/simple-datatables.js') }}"></script>
        <script src="{{ asset('backend/vendor/tinymce/tinymce.min.js') }}"></script>
        <script src="{{ asset('backend/vendor/php-email-form/validate.js') }}"></script>




        <!-- Template Main JS File -->
        <script src="{{ asset('backend/js/main.js') }}"></script>

        <x-notify::notify />
        @notifyJs

        @yield('js')

        <script src="{{ asset('/sw.js') }}"></script>
        <script>
            if ("serviceWorker" in navigator) {
            // Register a service worker hosted at the root of the
            // site using the default scope.
            navigator.serviceWorker.register("/sw.js").then(
                (registration) => {
                    console.log("Service worker registration succeeded:", registration);
                },
                (error) => {
                    console.error(`Service worker registration failed: ${error}`);
                },
            );
        } else {
            console.error("Service workers are not supported.");
        }
        </script>
    </body>

</html>