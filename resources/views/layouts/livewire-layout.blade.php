<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name') }}</title>

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    {{-- CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('vandor/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="/theme/css/vertical-layout-light/style.css">
    @livewireStyles
</head>

<body style="background-color: #F5F7FF;">

    {{ $slot }}

    {{-- SCRIPTS --}}
    @livewireScripts
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <script src="{{ asset('vandor/fontawesome/js/all.min.js') }}"></script>
    <!-- plugins:js -->
    <script src="/theme/vendors/js/vendor.bundle.base.js"></script>
    <script src="/theme/js/off-canvas.js"></script>
    <script src="/theme/js/hoverable-collapse.js"></script>
    <script src="/theme/js/template.js"></script>
    <script src="/theme/js/settings.js"></script>
    <script src="/theme/js/todolist.js"></script>
    @stack('scripts')
</body>

</html>
