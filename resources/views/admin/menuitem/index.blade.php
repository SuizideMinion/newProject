@extends('admin.layouts.app')
@section('content')
<div class="container-fluid">
  <div class="fade-in">
    <div class="card">
      <div class="card-body">
        <a href="{{ route('admin.menuitem.create') }}">Create New Link</a>
        <table class="table table-responsive-sm table-bordered table-striped table-sm">
          <thead>
            <tr>
              <th>name</th>
              <th>link</th>
              <th>status</th>
              <th>menu</th>
              <th>target</th>
              <th>position</th>
              <th>icon</th>
              <th>options</th>
            </tr>
          </thead>
          <tbody>
            @foreach (\App\Models\admin\MenuItem::orderby('menu', 'DESC')->get() as $MenuItem)
            <tr>
              <td>{{ $MenuItem->name }}</td>
              <td>{{ $MenuItem->link }}</td>
              <td>{{ $MenuItem->status }}</td>
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
              <td>{{ $MenuItem->target }}</td>
              <td>{{ $MenuItem->position }}</td>
              <td><i class="bi-{{ $MenuItem->icon }}" style="margin-right: 20px;font-size:1.2rem;color:grey;width:32px;"></i></td>
              <td>kommen noch</td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection
