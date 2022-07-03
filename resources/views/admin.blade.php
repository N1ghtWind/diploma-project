<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.1.1/css/all.css">


    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <link rel="stylesheet" href="{{ asset('css/animate.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

    <link rel="stylesheet" href="{{ asset('css/main.css') }}">

    <!-- Scripts -->

    {{-- JQUERY --}}
    <script src="{{ asset('js/jquery.js') }}"></script>


    {{-- FONTAWSOME --}}

    <script src="https://kit.fontawesome.com/9ebe564d03.js" crossorigin="anonymous"></script>

    {{-- FLOWBITE --}}
    <script defer src="https://unpkg.com/flowbite@1.4.1/dist/flowbite.js"></script>

    {{-- JQUERY WAYPOINTS --}}
    <script defer src="{{ asset('js/jquery.waypoints.min.js') }}"></script>

    {{-- JQUERY WAYPOINTS ANIMATE --}}
    <script defer src="{{ asset('js/easy-waypoint-animate.js') }}"></script>

    {{-- APP JS --}}
    <script defer src="{{ asset('js/app.js') }}"></script>

    {{-- WOW JS --}}
    <script defer src="{{ asset('js/wow.js') }}"></script>

    {{-- AOS --}}
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    {{-- <script defer src="https://unpkg.com/aos@next/dist/aos.js"></script> --}}
    @inertiaHead
    <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet" />
    {{-- CUSTOM JS --}}
    <script defer src="{{ asset('js/custom.js') }}"></script>
    <script defer src="https://unpkg.com/@themesberg/flowbite@1.1.1/dist/flowbite.bundle.js"></script>
    <script src="https://momentjs.com/downloads/moment.min.js"></script>
</head>

<body>
    @routes
    @inertia
</body>

</html>
