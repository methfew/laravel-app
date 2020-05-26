<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- meta descriptions -->
    <title>auto SAMI @yield('title')</title>
    <meta name="description" content="@yield('description')">
    <meta name="keywords" content="@yield('keywords')">

    <!-- favicon -->
    <link rel="icon" href="/images/s_favicon.png" type="image/gif" sizes="32x32">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    
    <script src="{{ asset('js/script.js') }}" defer></script>
    <script src="{{ asset('js/calc.js') }}" defer></script>
    <script src="{{ asset('js/chart.js') }}" defer></script>
    <script src="{{ asset('js/quill.js') }}" defer></script>
    <script src="{{ asset('js/quillconverter.js') }}" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.js"></script>
    

    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/51c88a48e7.js" crossorigin="anonymous"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    
    <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.0/min/dropzone.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/quill/2.0.0-dev.4/quill.snow.css">


</head>
<body>

    @include('cookieConsent::index')


    <div id="app">     
        <main>       
                @include('inc.navbar')
            <div class="container-fluid p-0">
                @yield('content')
            </div>
        </main>
    </div>
    
    <!-- app.js file -->
    <script src="{{ asset('js/app.js') }}" ></script>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <!-- Dropzone -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.0/min/dropzone.min.js"></script>
    <!-- Chart.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
    <!-- Quill.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/quill/2.0.0-dev.4/quill.min.js"></script>
    <!-- jQuery-sortable file -->
    <script src="{{ asset('js/jquery-sortable.js') }}" ></script>
</body>
</html>
