<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title')</title>
  <link rel="shortcut icon" type="image/png" href="{{ asset('favicon.ico') }}" />
  <link rel="stylesheet" href="{{ asset('assets/vendor/modernize/css/styles.css') }}" />
  <link rel="stylesheet" href="{{ asset('assets/vendor/fontawesome-6/css/all.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/vendor/modernize/css/mystyle.css') }}">
</head>

<body>
  
  {{-- Body Wrapper --}}
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    @yield('page-wrapper')

    {{-- Sidebar --}}
    @include('dashboard.partials.sidebar')

    {{-- Body Wrapper --}}
    <div class="body-wrapper">
      {{-- Navbar --}}
      @include('dashboard.partials.navbar')
      
      @yield('body-wrapper')

      <div class="container-fluid">
        @yield('container-fluid')
      </div>
    </div>





    {{-- Footer --}}
    @include('dashboard.partials.footer')
  </div>

  <script src="{{ asset('assets/vendor/modernize/libs/jquery/dist/jquery.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/modernize/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/modernize/js/sidebarmenu.js') }}"></script>
  <script src="{{ asset('assets/vendor/modernize/js/app.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/modernize/libs/apexcharts/dist/apexcharts.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/modernize/libs/simplebar/dist/simplebar.js') }}"></script>
  <script src="{{ asset('assets/vendor/modernize/js/dashboard.js') }}"></script>
</body>
</html>