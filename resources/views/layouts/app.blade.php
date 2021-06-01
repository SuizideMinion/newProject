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

      <ul class="c-header-nav ">
        <li class="c-header-nav-item px-3">
          <a class="c-header-nav-link" href="mail://info@1pvr.de">
            <i class="bi-envelope" style="font-size:1.5rem;color:green;width:32px;"></i> <span class="headeremail">info@1pvr.de</span>
          </a>
        </li>
      </ul>
      <ul class="c-header-nav ml-auto" style="pointer-events: none;margin: auto;position: absolute;z-index: 99;width: 100%;">
        <li class="c-header-nav-item px-3" style="margin:auto;">
          <img src="/img/logo.png" width="150px">
        </li>
      </ul>
      <ul class="c-header-nav ml-auto mr-4">
        <li class="c-header-nav-item  mx-2" style="width:20px;">
          <a class="c-header-nav-link" href="#">
            <i class="bi-facebook" style="font-size:1.2rem;color:grey;width:32px;"></i>
          </a>
        </li>
        <li class="c-header-nav-item  mx-2" style="width:20px">
          <a class="c-header-nav-link" href="#">
            <i class="bi-instagram" style="font-size:1.2rem;color:grey;width:32px;"></i>
          </a>
        </li>
        <li class="c-header-nav-item  mx-2" style="width:20px">
          <a class="c-header-nav-link" href="#">
            <i class="bi-twitter" style="font-size:1.2rem;color:grey;width:32px;"></i>
          </a>
        </li>
      </ul>
      <div class="c-subheader px-3" style="background-color: darkgoldenrod;color:white;display:flex;">
        <!-- <nav>
          <ol class="breadcrumb border-0" style="margin:auto;">
            <li class=""><a href="/" style="color:white;font-weight:bold;font-size: medium;">HOME</a></li>
            <li class=""><a href="#" style="color:white;font-weight:bold;font-size: medium;margin-left: 15px;">ADMIN</a></li>

            <li class="c-header-nav-item dropdown">
              <a class="c-header-nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false" style="color:white;font-weight:bold;font-size: medium;margin-left: 15px;">
                ÜBER UNS
              </a>
              <div class="dropdown-menu dropdown-menu-right pt-0">
                <a class="dropdown-item" href="/getsite/impressum">Impressum</a>
                <a class="dropdown-item" href="/getsite/test">Test</a>
              </div>
            </li>
          </ol>
        </nav> -->
          <nav class="navbar navbar-expand-lg navbar-dark">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarCollapse">
              <ul class="navbar-nav mr-auto">

                <li class="nav-item">
                  <a class="nav-link" href="/">Home</a>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false" >Über uns</a>
                  <div class="dropdown-menu dropdown-menu-right pt-0">
                    <a class="dropdown-item" href="/getsite/impressum">Impressum</a>
                    <a class="dropdown-item" href="/getsite/datenschutz">Datenschutz</a>
                  </div>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false" >Hunde</a>
                  <div class="dropdown-menu dropdown-menu-right pt-0">
                    <a class="dropdown-item" href="/dog">Rassen</a>
                  </div>
                </li>
              </ul>

            </div>
          </nav>
          <nav class="navbar navbar-expand-lg navbar-dark" style="margin-left: auto;">
            <div class="collapse navbar-collapse" id="navbarCollapse">
              <ul class="navbar-nav mr-auto">
                @guest
                @if (Route::has('login'))
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('register') }}">{{ __('Registrieren') }}</a>
                </li>
                @endif
                @else

                <li class="c-header-nav-item dropdown">
                  <a class="c-header-nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                    <div class="c-avatar"><img class="c-avatar-img" src="/img/no_img.png" alt="user@email.com"></div>
                  </a>
                  <div class="dropdown-menu dropdown-menu-right pt-0">
                    <div class="dropdown-header bg-light py-2"><strong>Account</strong></div>
                    <!-- <a class="dropdown-item" href="#">
                      <i class="bi-bell" style="font-size:1.2rem;color:grey;width:32px;"></i> Updates<span class="badge badge-info ml-auto">42</span></a>
                    <a class="dropdown-item" href="#">
                      <i class="bi-envelope" style="font-size:1.2rem;color:grey;width:32px;"></i> Messages<span class="badge badge-success ml-auto">42</span></a>
                    <a class="dropdown-item" href="#">
                      <i class="bi-list-check" style="font-size:1.2rem;color:grey;width:32px;"></i> Tasks<span class="badge badge-danger ml-auto">42</span></a>
                    <a class="dropdown-item" href="#">
                      <i class="bi-chat-right" style="font-size:1.2rem;color:grey;width:32px;"></i> Comments<span class="badge badge-warning ml-auto">42</span></a>
                    <div class="dropdown-header bg-light py-2"><strong>Settings</strong></div>
                    <a class="dropdown-item" href="#">
                      <i class="bi-person" style="font-size:1.2rem;color:grey;width:32px;"></i> Profile</a>
                    <a class="dropdown-item" href="#">
                      <i class="bi-gear" style="font-size:1.2rem;color:grey;width:32px;"></i> Settings</a>
                    <a class="dropdown-item" href="#">
                      <i class="bi-credit-card" style="font-size:1.2rem;color:grey;width:32px;"></i> Payments<span class="badge badge-secondary ml-auto">42</span></a>
                    <a class="dropdown-item" href="#">
                      <i class="bi-file-earmark-text" style="font-size:1.2rem;color:grey;width:32px;"></i> Projects<span class="badge badge-primary ml-auto">42</span></a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">
                      <i class="bi-lock" style="font-size:1.2rem;color:grey;width:32px;"></i> Lock Account</a> -->
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();">
                        <i class="bi-door-closed" style="font-size:1.2rem;color:grey;width:32px;"></i>{{ __('Logout') }}
                      </a>
                      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                      </form>
                    @if(Auth::user()->is_admin)
                    <div class="dropdown-header bg-light py-2"><strong>Administrator</strong></div>
                    <a class="dropdown-item" href="/admin/pages">
                      <i class="bi-person" style="font-size:1.2rem;color:grey;width:32px;"></i> Admin Page
                    </a>
                    @endif
                  </div>
                </li>
                @endguest
              </ul>
            </div>
          </nav>
      </div>
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
