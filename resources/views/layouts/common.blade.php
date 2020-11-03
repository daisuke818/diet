<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- <link href="{{ mix('css/app.css') }}" rel="stylesheet" type="text/css"> -->
  <link rel="stylesheet" href="/css/app.css">
  <title>@yield('title')</title>
</head>

<body>
  @include('parts.header')
  @yield('content')
  <script src="{{ mix('js/app.js') }}"></script>
</body>

</html>