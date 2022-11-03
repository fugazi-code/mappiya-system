<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('vandor/fontawesome/css/all.min.css') }}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="/theme/css/vertical-layout-light/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="/theme/images/favicon.png" />
    <style>
        html,
        body {
            height: 100%;
            margin: 0;
            padding: 0;
        }
        .navbar .navbar-brand-wrapper .navbar-brand img {
            height: 65px !important;
        }
        .navbar .navbar-brand-wrapper .brand-logo-mini img {
            height: auto !important;
        }
        .navbar .navbar-brand-wrapper {
            height: 69px !important;
        }
        .navbar .navbar-menu-wrapper {
            height: 69px !important;
        }
        #map {
            height: 65vh;
        }
        #redish {
            color: red;
        }
    </style>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    @livewireStyles
</head>
<body>
    
    <script src="{{ asset('vandor/fontawesome/js/all.min.js') }}"></script>
    <!-- plugins:js -->
    <script src="/theme/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="/theme/js/off-canvas.js"></script>
    <script src="/theme/js/hoverable-collapse.js"></script>
    <script src="/theme/js/template.js"></script>
    <script src="/theme/js/settings.js"></script>
    <script src="/theme/js/todolist.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>

    @livewireScripts
    {{-- @stack('scripts') --}}
    <script>
        window.addEventListener('closeModal', event =>{
            $('#create-cancel-btn').click();
            $('#update-cancel-btn').click();
            $('#delete-cancel-btn').click();
        });
    </script>
    <!-- endinject -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAvSLf6a8qnt9snA-bdZC48Hf9z13PKEjc&callback=initMap&v=weekly"
      defer
    ></script>

    <script>
        console.log('app blade')
        // if(Echo) {
        //     Echo.channel('mappiya')
        //     .listen('RiderMove', (e) => {
        //         updatePosition(e.lat, e.lng);
        //     });
        // }
    </script>
    {{ $slot }}
</body>
</html>
