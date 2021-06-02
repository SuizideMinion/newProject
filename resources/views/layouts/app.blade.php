<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="1.Pfälzer Rassezuchtverein e.V.">
  <!-- CoreUI CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
  <link rel="stylesheet" href="https://unpkg.com/@coreui/coreui/dist/css/coreui.min.css" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery.perfect-scrollbar/1.5.0/css/perfect-scrollbar.min.css" integrity="sha512-n+g8P11K/4RFlXnx2/RW1EZK25iYgolW6Qn7I0F96KxJibwATH3OoVCQPh/hzlc4dWAwplglKX8IVNVMWUUdsw==" crossorigin="anonymous" />
  <style type="text/css">
  span.headeremail {
      visibility: hidden;
  }

  @media only screen and (min-width: 600px) {
      span.headeremail {
          visibility: inherit;
      }
  }
  </style>
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <title>{{ config('app.name', 'Laravel') }}</title>
  @livewireStyles
</head>

<body class="c-app">


  <div class="c-wrapper c-fixed-components">
    <header class="c-header c-header-light c-header-fixed c-header-with-subheader">
    @include('layouts.header')
    @include('layouts.navigation')
    </header>

    <div class="c-body">
      <main class="c-main" style="padding-top: 0px;">
        @yield('content')

        <!-- Optional JavaScript -->
        <!-- Popper.js first, then CoreUI JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.perfect-scrollbar/1.5.0/perfect-scrollbar.min.js" integrity="sha512-yUNtg0k40IvRQNR20bJ4oH6QeQ/mgs9Lsa6V+3qxTj58u2r+JiAYOhOW0o+ijuMmqCtCEg7LZRA+T4t84/ayVA==" crossorigin="anonymous"></script>
        <script src="https://unpkg.com/@popperjs/core@2"></script>
        <script src="https://unpkg.com/@coreui/coreui/dist/js/coreui.min.js"></script>
        @livewireScripts
        <script src="https://cdn.jsdelivr.net/gh/livewire/sortable@v0.x.x/dist/livewire-sortable.js"></script>
        <script src="https://cdn.ckeditor.com/ckeditor5/27.1.0/classic/ckeditor.js"></script>

</body>

</html>
