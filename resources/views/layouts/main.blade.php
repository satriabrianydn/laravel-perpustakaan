<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    {{-- Favicon --}}
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <!-- Bootstrap CSS -->
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Animate CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/fontawesome-6/css/all.css') }}" />

</head>

<body>
  
    {{-- Header --}}
    <header>
        @yield('header')
    </header>
    {{-- Header End --}}

    {{-- Main Content --}}
    <main>
        @yield('main')
    </main>
    {{-- Main Content End --}}

    {{-- Footer --}}
    <footer>
        @yield('footer')
    </footer>
    {{-- Footer End --}}

    @yield('sub-footer')

    {{-- Main JS --}}
    <script src="{{ asset('assets/js/script.js') }}"></script>
    <!-- Bootstrap JS -->
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    
</body>

</html>
