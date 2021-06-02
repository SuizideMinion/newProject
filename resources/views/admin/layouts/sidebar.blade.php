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
      </a>
    </li>
    <li class="c-sidebar-nav-title">Admin</li>



    <li class="c-sidebar-nav-item c-sidebar-nav-dropdown">
      <a class="c-sidebar-nav-link" href="{{ route('admin.pages.index')}}">
        <i class="bi-layout-text-window-reverse" style="margin-right: 20px;font-size:1.2rem;color:grey;width:32px;"></i>Sites
      </a>
    </li>
    <li class="c-sidebar-nav-item c-sidebar-nav-dropdown">
      <a class="c-sidebar-nav-link" href="{{ route('admin.menuitem.index')}}">
        <i class="bi-layout-text-window-reverse" style="margin-right: 20px;font-size:1.2rem;color:grey;width:32px;"></i>Navigation
      </a>
    </li>

    <li class="c-sidebar-nav-divider"></li>
    <li class="c-sidebar-nav-title">Extras</li>
    <!-- -----------------------------------------------------------------------------------------------------------------------------------Pages -->
    <li class="c-sidebar-nav-item c-sidebar-nav-dropdown">
      <a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle" href="#">
        <i class="bi-star" style="margin-right: 20px;font-size:1.2rem;color:grey;width:32px;"></i> Pages</a>
      <ul class="c-sidebar-nav-dropdown-items">

        <li class="c-sidebar-nav-item">
          <a class="c-sidebar-nav-link" href="{{route('admin.dogs.index')}}" target="_top">
            <i class="bi-award" style="font-size:1.2rem;color:grey;width:32px;"></i> Dogs</a>
        </li>
      </ul>
      <!-- ---------------------------------------------------------------------------------------------------------------------------------BASE -->
      <li class="c-sidebar-nav-item c-sidebar-nav-dropdown">
        <a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle" href="#">
          <i class="bi-puzzle" style="margin-right: 20px;font-size:1.2rem;color:grey;width:32px;"></i> Base</a>
          <ul class="c-sidebar-nav-dropdown-items">
            <li class="c-sidebar-nav-item">
              <a class="c-sidebar-nav-link" href="/chats/68287fc94fb4aa98ea86f452ababae2e">
                <i class="bi-chat" style="margin-right: 20px;font-size:1.5rem;color:grey;width:32px;"></i>Chat
              </a>
            </li>
            <li class="c-sidebar-nav-item">
              <a class="c-sidebar-nav-link"
              href="{{ route('admin.checklist_groups.create') }}"><span class="c-sidebar-nav-icon"></span>
              <i class="bi-card-checklist" style="font-size:1.2rem;color:grey;width:32px;"></i> {{ __('Create Checklist')}}</a>
            </li>
            <li class="c-sidebar-nav-item">
              <a class="c-sidebar-nav-link"
              href="/admin/logfiles/all"><span class="c-sidebar-nav-icon"></span>
              <i class="bi-card-list" style="font-size:1.2rem;color:grey;width:32px;"></i> {{ __('Logs')}}</a>
            </li>
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
          </ul>
        </li>
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
