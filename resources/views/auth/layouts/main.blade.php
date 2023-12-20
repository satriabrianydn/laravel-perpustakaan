<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title')</title>
  <link rel="icon" href="favicon.ico" type="image/x-icon">
  <link rel="stylesheet" href="{{ asset('assets/vendor/modernize/css/styles.min.css') }}" />
</head>

<body>
 
  @yield('body')


  <script src="{{ asset('assets/vendor/modernize/libs/jquery/dist/jquery.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/modernize/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>