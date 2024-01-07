<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    {{-- Favicon --}}
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <!-- Vendor CSS -->
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/fontawesome-6/css/all.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/fakeloader/css/fakeLoader.css') }}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

</head>

<body>
    @include('sweetalert::alert')
    
    @yield('body')
    <div class="fakeLoader"></div>
    {{-- Header --}}
    @include('partials.navbar')
    {{-- Header End --}}

    {{-- Main Content --}}
    <main>
        @yield('main')
    </main>
    {{-- Main Content End --}}

    {{-- Footer --}}
    @include('partials.footer')
    {{-- Footer End --}}

    
    <!-- Vendor JS -->
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/fakeloader/js/fakeLoader.js') }}"></script>
    <script>
        $(document).ready(function(){
            $.fakeLoader({
                timeToHide:100,
                bgColor:"#fff",
                spinner:"spinner6"
            });
        });
    </script>

    {{-- Main JS --}}
    <script src="{{ asset('assets/js/script.js') }}"></script>
</body>

</html>
