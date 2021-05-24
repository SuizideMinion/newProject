<div class="c-sidebar c-sidebar-dark c-sidebar-fixed c-sidebar-lg-show" id="sidebar">
  <div class="c-sidebar-brand d-lg-down-none">
    <a class="" href="{{ route('home') }}" title="{{ __('Back to Mainpage') }}">
      <i class="bi-layout-wtf" style="font-size:1.5rem;color:grey;width:32px;"></i>
    </a>
  </div>
  <ul class="c-sidebar-nav">
    <li class="c-sidebar-nav-item">
      <a class="c-sidebar-nav-link" href="index.html">
        <i class="bi-clipboard-data" style="margin-right: 20px;font-size:1.5rem;color:grey;width:32px;"></i>Dashboard
        <!--<span class="badge badge-info">NEW</span>-->
      </a>
    </li>
    <li class="c-sidebar-nav-title">Admin</li>


    @foreach (\App\Models\ChecklistGroup::with('checklists')->get() as $group)
    <li class="c-sidebar-nav-item c-sidebar-nav-dropdown">
      <a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle"
        href="{{ route('admin.checklist_groups.edit', $group->id)}}">
        <i class="bi-list-check" style="margin-right: 20px;font-size:1.2rem;color:grey;width:32px;"></i>{{$group->name}}
      </a>
      <ul class="c-sidebar-nav-dropdown-items">
        @foreach ($group->checklists as $checklist)
        <li class="c-sidebar-nav-item">
          <a class="c-sidebar-nav-link"
            href="{{ route('admin.checklist_groups.checklists.edit', [$group, $checklist])}}">
            <span class="c-sidebar-nav-icon"></span> {{$checklist->name}}
          </a>
        </li>
        @endforeach
        <li class="c-sidebar-nav-item">
          <a class="c-sidebar-nav-link"
            href="{{ route('admin.checklist_groups.edit', $group->id)}}">
            <span class="c-sidebar-nav-icon"></span> {{__('Edit Group')}}
          </a>
        </li>
        <li class="c-sidebar-nav-item">
          <a class="c-sidebar-nav-link"
            href="{{ route('admin.checklist_groups.checklists.create', $group)}}">
            <span class="c-sidebar-nav-icon"></span> {{__('Add Checklist')}}
          </a>
        </li>
      </ul>
    </li>
    @endforeach
    <li class="c-sidebar-nav-item c-sidebar-nav-dropdown">
      <a class="c-sidebar-nav-link" href="{{ route('admin.pages.index')}}">
        <i class="bi-layout-text-window-reverse" style="margin-right: 20px;font-size:1.2rem;color:grey;width:32px;"></i>Sites
      </a>
    </li>

    <li class="c-sidebar-nav-divider"></li>
    <li class="c-sidebar-nav-title">Extras</li>
    <li class="c-sidebar-nav-item c-sidebar-nav-dropdown">
      <a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle" href="#">
        <!-- ---------------------------------------------------------------------------------------------------------------------------------BASE -->
        <i class="bi-puzzle" style="margin-right: 20px;font-size:1.2rem;color:grey;width:32px;"></i> Base</a>
      <ul class="c-sidebar-nav-dropdown-items">
        <li class="c-sidebar-nav-item">
          <a class="c-sidebar-nav-link"
            href="{{ route('admin.checklist_groups.create') }}"><span class="c-sidebar-nav-icon"></span>
            <i class="bi-card-checklist" style="font-size:1.2rem;color:grey;width:32px;"></i> {{ __('Create Checklist')}}</a>
        </li>
        <li class="c-sidebar-nav-item">
          <a class="c-sidebar-nav-link"
            href="/admin/logfiles"><span class="c-sidebar-nav-icon"></span>
            <i class="bi-card-list" style="font-size:1.2rem;color:grey;width:32px;"></i> {{ __('Logs')}}</a>
        </li>
      </ul>
    </li>
    <li class="c-sidebar-nav-item c-sidebar-nav-dropdown">
      <a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle" href="#">
        <!-- -----------------------------------------------------------------------------------------------------------------------------------Pages -->
        <i class="bi-star" style="margin-right: 20px;font-size:1.2rem;color:grey;width:32px;"></i> Pages</a>
      <ul class="c-sidebar-nav-dropdown-items">
        <li class="c-sidebar-nav-item">
          <a class="c-sidebar-nav-link" href="login.html" target="_top">
            <i class="bi-door-open" style="font-size:1.2rem;color:grey;width:32px;"></i> Login</a>
        </li>
        <li class="c-sidebar-nav-item">
          <a class="c-sidebar-nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
            <i class="bi-door-closed" style="font-size:1.2rem;color:grey;width:32px;"></i>{{ __('Logout') }}
            <!--<span class="badge badge-info">NEW</span>-->
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
          </form>
        </li>
        <li class="c-sidebar-nav-item">
          <a class="c-sidebar-nav-link" href="404.html" target="_top">
            <i class="bi-bug" style="font-size:1.2rem;color:grey;width:32px;"></i> Error 404</a>
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
