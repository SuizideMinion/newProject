@extends('admin.layouts.app')
@section('content')
<div class="container-fluid">
  <div class="fade-in">
    <div class="card">
      <div class="card-body">
        <a href="{{ route('admin.menuitem.create') }}">Create New Link</a>
        <table class="table table-responsive-sm table-bordered table-striped table-sm">
          <!-- <thead>
            <tr>
              <th>name</th>
              <th>link</th>
              <th>status</th>
              <th>menu</th>
              <th>target</th>
              <th>icon</th>
              <th>options</th>
            </tr>
          </thead> -->
            @foreach (\App\Models\admin\MenuItem::orderby('menu', 'DESC')->get() as $MenuItem)
            @if ( !isset($bevore) OR $bevore != $MenuItem->menu)
              <thead>
                <tr>
                  <th>name</th>
                  <th>link</th>
                  <th>menu</th>
                  <th>icon</th>
                  <th>options</th>
                </tr>
              </thead>
            @endif
            <tbody>
            <tr>
              <td>{{ $MenuItem->name }}</td>
              <td>{{ $MenuItem->link }}</td>
              <td>
                @if($MenuItem->menu == '1')
                <i class="bi-arrow-up-left-square" style="margin-right: 20px;font-size:1.2rem;color:grey;width:32px;"></i>
                @elseif($MenuItem->menu == '2')
                <i class="bi-arrow-up-right-square" style="margin-right: 20px;font-size:1.2rem;color:grey;width:32px;"></i>
                @elseif($MenuItem->menu == '3')
                <i class="bi-arrow-left-square" style="margin-right: 20px;font-size:1.2rem;color:grey;width:32px;"></i>
                @elseif($MenuItem->menu == '4')
                <i class="bi-arrow-right-square" style="margin-right: 20px;font-size:1.2rem;color:grey;width:32px;"></i>
                @endif
              </td>
              <td><i class="bi-{{ $MenuItem->icon }}" style="margin-right: 20px;font-size:1.2rem;color:grey;width:32px;"></i></td>
              <td style="display:flex;">
                @if ( $MenuItem->status == 1 )
                <form action="{{ route('admin.menuitem.update', $MenuItem->id) }}" method="POST">
                  @csrf
                  @method('PUT')
                  <input type="hidden" name="id" value="{{ $MenuItem->id }}">
                  <input type="hidden" name="status" value="off">
                  <button style="padding: 0px;" class="btn btn-text" type="submit" title="Link Aktiv">
                    <i class="bi-circle-fill" style="font-size: 15px;color:green;"></i>
                  </button>
                </form>
                @else
                <form action="{{ route('admin.menuitem.update', $MenuItem->id) }}" method="POST">
                  @csrf
                  @method('PUT')
                  <input type="hidden" name="id" value="{{ $MenuItem->id }}">
                  <input type="hidden" name="status" value="on">
                  <button style="padding: 0px;" class="btn btn-text" type="submit" title="Link Inaktiv">
                    <i class="bi-circle-fill" style="font-size: 15px;color:red;"></i>
                  </button>
                </form>
                @endif
                <a style="margin-left: auto!important;" href="/admin/menuitem/{{ $MenuItem->id }}/edit" data-toggle="collapse" data-target="#{{ $MenuItem->id }}">
                   <i class="bi-pencil" style="margin-right: 10px;font-size: 15px;color:green;"></i>
                </a>
                <form action="{{ route('admin.submenuitem.create', $MenuItem->id) }}" method="GET">
                  @csrf
                  <input type="hidden" name="menu_item_id" value="{{ $MenuItem->id }}">
                  <button style="padding: 0px;" class="btn btn-text" type="submit"><i class="bi-bookmark-plus" style="font-size: 15px;color:green;"></i></button>
                </form>
                <form action="{{ route('admin.menuitem.destroy', $MenuItem->id) }}" method="POST">
                  @csrf
                  @method('DELETE')
                  <button style="padding: 0px;" class="btn btn-text" type="submit" onclick="return confirm('{{ __('Are you Sure') }}')"><i class="bi-trash" style="font-size: 15px;color:red;"></i></button>
                </form>
              </td>
            </tr>
            @if (count($MenuItem->submenusadmin) > 0)
                <? $c = 0; ?>
                @foreach ($MenuItem->submenusadmin as $SubMenu)
                  <? $c++; ?>
                  <tr id="Nav{{ $MenuItem->id }}" style="">
                    <td>SUB: {{ $SubMenu->name }}</td>
                    <td>{{ $SubMenu->link }}</td>
                    <td></td>
                    <td><i class="bi-{{ $SubMenu->icon }}" style="margin-right: 20px;font-size:1.2rem;color:grey;width:32px;"></i></td>
                    <td style="display:flex;">
                      @if ( $SubMenu->status == 1 )
                      <form action="{{ route('admin.submenuitem.update', $MenuItem->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="id" value="{{ $SubMenu->id }}">
                        <input type="hidden" name="status" value="off">
                        <button style="padding: 0px;" class="btn btn-text" type="submit" title="Link Aktiv">
                          <i class="bi-circle-fill" style="font-size: 15px;color:green;"></i>
                        </button>
                      </form>
                      @else
                      <form action="{{ route('admin.submenuitem.update', $MenuItem->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="id" value="{{ $SubMenu->id }}">
                        <input type="hidden" name="status" value="on">
                        <button style="padding: 0px;" class="btn btn-text" type="submit" title="Link Inaktiv">
                          <i class="bi-circle-fill" style="font-size: 15px;color:red;"></i>
                        </button>
                      </form>
                      @endif
                      @if( $c != '1' AND $c <= ( count($MenuItem->submenusadmin) ) )
                      <form action="{{ route('admin.submenuitem.update', $MenuItem->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="id" value="{{ $SubMenu->id }}">
                        <input type="hidden" name="sort" value="up">
                        <input type="hidden" name="menu_item_id" value="{{ $MenuItem->id }}">
                        <button style="padding: 0px;" class="btn btn-text" type="submit">
                          <i class="bi-caret-up" style="font-size: 15px;color:green;"></i>
                        </button>
                      </form>
                      @endif
                      @if( $c <= ( count($MenuItem->submenusadmin) - 1) )
                        <form action="{{ route('admin.submenuitem.update', $MenuItem->id) }}" method="POST">
                          @csrf
                          @method('PUT')
                          <input type="hidden" name="id" value="{{ $SubMenu->id }}">
                          <input type="hidden" name="sort" value="down">
                          <button style="padding: 0px;" class="btn btn-text" type="submit">
                            <i class="bi-caret-down" style="font-size: 15px;color:green;"></i>
                          </button>
                        </form>
                      @endif
                      <a style="margin-left: auto!important;" href="/admin/submenuitem/{{ $SubMenu->id }}/edit" data-toggle="collapse" data-target="#{{ $SubMenu->id }}">
                         <i class="bi-pencil" style="margin-right: 10px;font-size: 15px;color:green;"></i>
                      </a>
                      <form action="{{ route('admin.submenuitem.destroy', $SubMenu->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button style="padding: 0px;" class="btn btn-text" type="submit" onclick="return confirm('{{ __('Are you Sure') }}')"><i class="bi-trash" style="font-size: 15px;color:red;"></i></button>
                      </form>
                    </td>
                  </tr>
                @endforeach
            @endif
            <? $bevore = $MenuItem->menu ?>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection
