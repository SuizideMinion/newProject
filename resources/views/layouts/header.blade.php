<ul class="c-header-nav ">
  @foreach (\App\Models\admin\MenuItem::where('status', '1')->where('menu', '1')->get() as $MenuItem)
  <li class="c-header-nav-item px-3">
    <a class="c-header-nav-link" href="{{ $MenuItem->link }}">
      <i class="bi-{{ $MenuItem->icon }}" style="font-size:1.5rem;color:darkgoldenrod;width:32px;"></i> <span class="headeremail">{{ $MenuItem->name }}</span>
    </a>
  </li>
  @endforeach
</ul>
<ul class="c-header-nav ml-auto" style="pointer-events: none;margin: auto;position: absolute;z-index: 99;width: 100%;">
  <li class="c-header-nav-item px-3" style="margin:auto;">
    <img src="/img/logo.png" width="150px">
  </li>
</ul>
<ul class="c-header-nav ml-auto mr-3">
  @foreach (\App\Models\admin\MenuItem::where('status', '1')->where('menu', '2')->get() as $MenuItem)
  <li class="c-header-nav-item  mx-2" style="margin: 0px !important;">
    <a class="c-header-nav-link" href="{{ $MenuItem->link }}" style="margin: 0px !important;padding: 0px;">
      <i class="bi-{{ $MenuItem->icon }}" style="font-size:1.6rem;color:darkgoldenrod;width:32px;"></i>
    </a>
  </li>
  @endforeach
</ul>
