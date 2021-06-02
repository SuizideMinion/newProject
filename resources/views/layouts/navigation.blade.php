
<div class="c-subheader px-3" style="background-color: darkgoldenrod;color:white;display:flex;">
    <nav class="navbar navbar-expand-lg navbar-dark">

      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
          @foreach (\App\Models\admin\MenuItem::where('status', '1')->where('menu', '3')->get() as $MenuItem)
            @if (count($MenuItem->submenus) > 0)
            <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false" >{{ $MenuItem->name }} ▼</a>
              <div class="dropdown-menu dropdown-menu-right pt-0">
                @foreach ($MenuItem->submenus as $SubMenu)
                <a class="dropdown-item" href="{{ $SubMenu->link }}">{{ $SubMenu->name }}</a>
                @endforeach
              </div>
            </li>
            @else
            <li class="nav-item">
              <a class="nav-link" href="{{ $MenuItem->link }}">{{ $MenuItem->name }}</a>
            </li>
            @endif
          @endforeach

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

                  @foreach (\App\Models\admin\MenuItem::where('status', '1')->where('menu', '4')->get() as $MenuItem)
                  <a class="dropdown-item" href="{{ $MenuItem->link }}">
                    <i class="bi-{{ $MenuItem->icon }}" style="font-size:1.2rem;color:grey;width:32px;"></i> {{ $MenuItem->name }}
                    <!-- <span class="badge badge-primary ml-auto">42</span> -->
                  </a>
                  @endforeach
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
