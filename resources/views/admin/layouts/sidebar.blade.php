<div class="c-sidebar c-sidebar-dark c-sidebar-fixed c-sidebar-lg-show" id="sidebar">
  <div class="c-sidebar-brand d-lg-down-none">
    <a class="c-sidebar-nav-link" href="{{ route('home') }}" title="{{ __('Back to Mainpage') }}">
      <i class="bi-columns-gap" style="font-size:1.5rem;color:grey;width:32px;"></i> 1. Pfälzer Rassezuchtverein e.V.
    </a>
  </div>
  <ul class="c-sidebar-nav">
    <li class="c-sidebar-nav-item">
      <a class="c-sidebar-nav-link" href="index.html">
          <i class="bi-arrow-bar-left" style="font-size:1.5rem;color:grey;width:32px;"></i>Dashboard
          <!--<span class="badge badge-info">NEW</span>-->
      </a>
    </li>
    <li class="c-sidebar-nav-title">Admin</li>
    <li class="c-sidebar-nav-item c-sidebar-nav-dropdown">
      <a class="c-sidebar-nav-link"
        href="{{ route('admin.pages.index')}}">
        <i class="bi-layout-text-window-reverse" style="font-size:1.2rem;color:grey;width:32px;"></i>Sites
      </a>
      <ul class="c-sidebar-nav-dropdown-items">
        <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="base/breadcrumb.html"><span class="c-sidebar-nav-icon"></span> Breadcrumb</a></li>
        <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="base/tooltips.html"><span class="c-sidebar-nav-icon"></span> Tooltips</a></li>
      </ul>
    </li>
      <li class="c-sidebar-nav-item c-sidebar-nav-dropdown">
          <a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle" href="#">
            <svg class="c-sidebar-nav-icon">
              <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-puzzle"></use>
            </svg> Base</a>
          <ul class="c-sidebar-nav-dropdown-items">
            <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="base/breadcrumb.html"><span class="c-sidebar-nav-icon"></span> Breadcrumb</a></li>
            <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="base/tooltips.html"><span class="c-sidebar-nav-icon"></span> Tooltips</a></li>
          </ul>
        </li>
    <li class="c-sidebar-nav-divider"></li>
    <li class="c-sidebar-nav-title">Extras</li>
    <li class="c-sidebar-nav-item c-sidebar-nav-dropdown">
      <a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle" href="#">
        <svg class="c-sidebar-nav-icon">
          <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-star"></use>
        </svg> Pages</a>
      <ul class="c-sidebar-nav-dropdown-items">
        <li class="c-sidebar-nav-item">
          <a class="c-sidebar-nav-link" href="login.html" target="_top">
            <svg class="c-sidebar-nav-icon">
              <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-account-logout"></use>
            </svg> Login</a>
        </li>
        <li class="c-sidebar-nav-item">
          <a class="c-sidebar-nav-link" href="{{ route('logout') }}"
          onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
            <!--<span class="badge badge-info">NEW</span>-->
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
              @csrf
          </form>
        </li>
        <li class="c-sidebar-nav-item">
          <a class="c-sidebar-nav-link" href="404.html" target="_top">
            <svg class="c-sidebar-nav-icon">
              <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-bug"></use>
            </svg> Error 404</a>
        </li>
        <li class="c-sidebar-nav-item">
          <a class="c-sidebar-nav-link" href="500.html" target="_top">
            <svg class="c-sidebar-nav-icon">
              <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-bug"></use>
            </svg> Error 500</a>
        </li>
      </ul>
    <!-- </li>
    <li class="c-sidebar-nav-item mt-auto">
      <a class="c-sidebar-nav-link c-sidebar-nav-link-success" href="https://coreui.io" target="_top">
        <svg class="c-sidebar-nav-icon">
          <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-cloud-download"></use>
        </svg> Download CoreUI</a>
    </li>
    <li class="c-sidebar-nav-item">
      <a class="c-sidebar-nav-link c-sidebar-nav-link-danger" href="https://coreui.io/pro/" target="_top">
        <svg class="c-sidebar-nav-icon">
          <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-layers"></use>
        </svg> Try CoreUI<strong>PRO</strong></a>
    </li> -->
  </ul>
  <button class="c-sidebar-minimizer c-class-toggler" type="button" data-target="_parent" data-class="c-sidebar-minimized"></button>
</div>
