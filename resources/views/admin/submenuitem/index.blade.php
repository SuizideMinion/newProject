@extends('admin.layouts.app')
@section('content')
<div class="container-fluid">
  <div class="fade-in">
    <div class="card">
      <div class="card-body">
        <a href="{{ route('admin.submenuitem.create') }}">Create New Link</a>
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
            @foreach (\App\Models\admin\SubMenuItem::get() as $MenuItem)
            <tr>
              <td>{{ $MenuItem->name }}</td>
              <td>{{ $MenuItem->link }}</td>
              <td>{{ $MenuItem->status }}</td>
              <td>{{ $MenuItem->menu_item_id }}</td>
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
