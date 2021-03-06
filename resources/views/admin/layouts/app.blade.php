<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="{{ asset('js/app.js') }}" defer></script>

  <!-- CoreUI CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
  <link rel="stylesheet" href="https://unpkg.com/@coreui/coreui/dist/css/coreui.min.css" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery.perfect-scrollbar/1.5.0/css/perfect-scrollbar.min.css" integrity="sha512-n+g8P11K/4RFlXnx2/RW1EZK25iYgolW6Qn7I0F96KxJibwATH3OoVCQPh/hzlc4dWAwplglKX8IVNVMWUUdsw==" crossorigin="anonymous" />

  <title>{{ config('app.name', 'Laravel') }}</title>
  @livewireStyles
</head>

<body class="c-app">
  @include('admin.layouts.sidebar')

  <div class="c-wrapper c-fixed-components">
    <header class="c-header c-header-light c-header-fixed c-header-with-subheader">
      <button class="c-header-toggler c-class-toggler d-lg-none mfe-auto" type="button" data-target="#sidebar" data-class="c-sidebar-show">
        <i class="bi-list" style="font-size:1.2rem;color:grey;width:32px;"></i>
      </button>
      <!-- <a class="c-header-brand d-lg-none" href="#">
        <svg width="118" height="46" alt="CoreUI Logo">
          <use xlink:href="assets/brand/coreui.svg#full"></use>
        </svg>
      </a> -->
      <button class="c-header-toggler c-class-toggler mfs-3 d-md-down-none" type="button" data-target="#sidebar" data-class="c-sidebar-lg-show" responsive="true">
        <i class="bi-list" style="font-size:1.2rem;color:grey;width:32px;"></i>
      </button>
      <ul class="c-header-nav d-md-down-none">
        <li class="c-header-nav-item px-3"><a class="c-header-nav-link" href="#"><i class="bi-clipboard-data" style="font-size:1.5rem;color:grey;width:32px;"></i> Dashboard</a></li>
        <li class="c-header-nav-item px-3"><a class="c-header-nav-link" href="/admin/users"><i class="bi-people" style="font-size:1.2rem;color:grey;width:32px;"></i> Users</a></li>
        <li class="c-header-nav-item px-3"><a class="c-header-nav-link" href="#"><i class="bi-gear" style="font-size:1.5rem;color:grey;width:32px;"></i> Settings</a></li>
      </ul>
      <ul class="c-header-nav ml-auto mr-4">
        <li class="c-header-nav-item d-md-down-none mx-2">
          <a class="c-header-nav-link" href="#">
            <i class="bi-bell" style="font-size:1.2rem;color:grey;width:32px;"></i>
          </a>
        </li>
        <li class="c-header-nav-item d-md-down-none mx-2">
          <a class="c-header-nav-link" href="#">
            <i class="bi-menu-up" style="font-size:1.2rem;color:grey;width:32px;"></i>
          </a>
        </li>
        <li class="c-header-nav-item d-md-down-none mx-2">
          <a class="c-header-nav-link" href="#">
            <i class="bi-envelope-open" style="font-size:1.2rem;color:grey;width:32px;"></i>
          </a>
        </li>

        <li class="c-header-nav-item d-md-down-none mx-2">
          <a class="c-header-nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
            <i class="bi-door-closed" style="font-size:1.2rem;color:grey;width:32px;"></i>
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
          </form>
        </li>
        <!-- ---------------------------- TODO:: Profile ansicht ?? brauchen wa jetzt nicht -->
        <!-- <li class="c-header-nav-item dropdown">
          <a class="c-header-nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
            <div class="c-avatar"><img class="c-avatar-img" src="/img/no_img.png" alt="user@email.com"></div>
          </a>
          <div class="dropdown-menu dropdown-menu-right pt-0">
            <div class="dropdown-header bg-light py-2"><strong>Account</strong></div>
            <a class="dropdown-item" href="#">
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
              <i class="bi-lock" style="font-size:1.2rem;color:grey;width:32px;"></i> Lock Account</a>
            <a class="dropdown-item" href="#">
              <i class="bi-door-closed" style="font-size:1.2rem;color:grey;width:32px;"></i> Logout</a>
          </div>
        </li>-->
      </ul>
      <!-- ---------------------------- TODO:: 2. Zeile Navigation brauchen wa jetzt auch nicht -->
      <!-- <div class="c-subheader px-3">

        <ol class="breadcrumb border-0 m-0">
          <li class="breadcrumb-item">Home</li>
          <li class="breadcrumb-item"><a href="#">Admin</a></li>
          <li class="breadcrumb-item active">Dashboard</li>

        </ol>
      </div> -->

    </header>

    <div class="c-body">
      <main class="c-main">
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
