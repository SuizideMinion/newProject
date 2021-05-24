@extends('admin.layouts.app')
@section('content')
<div class="container-fluid">
  <div class="fade-in">
    <div class="card">
      <div class="card-header">Users</div>
      <div class="card-body">
        <ul class="group" wire:sortable="updateTaskOrder"  style="padding-left: 20px;padding-right: 20px;padding-top: 20px;">
          @foreach ($logs as $log)
              <li class="list-group-item d-flex list-group-item-action justify-content-between align-items-center list-group-item-success"
                wire:sortable.item="{{ $log->id }}"
                wire:key="task-{{ $log->id }}"
              >
              <? $user = DB::table('users')->where('id', $log->owner)->first() ?>
                {{ $log->created_at->format('H:i:s d.m.Y') }} | {{ $user->name }} | {{ $log->text }}
                <span style="display:flex">
                  <a style="margin-left: auto!important;" href="" data-toggle="collapse" data-target="">
                    <i class="bi-pencil" style="font-size: 15px;color:green;"></i>
                  </a>
                  <form action="" method="POST">
                    @csrf
                    @method('DELETE')
                    <button style="padding: 0px;margin-left:10px;" class="btn btn-text" type="submit">
                      <i class="bi-trash" style="font-size: 15px;color:red;"></i>
                    </button>
                  </form>
                </span>
              </li>
          @endforeach
      </ul>
    </div>
    <div class="card-footer">
      <ul class="pagination">
        <li class="page-item"><a class="page-link" href="/admin/logfiles/check">Check</a></li>
        <li class="page-item"><a class="page-link" href="/admin/logfiles/cheGr">cheGr</a></li>
        <li class="page-item"><a class="page-link" href="/admin/logfiles/Page">Page</a></li>
        <li class="page-item"><a class="page-link" href="/admin/logfiles/user">User</a></li>
        <li class="page-item"><a class="page-link" href="/admin/logfiles">all</a></li>

      </ul>
    </div>
  </div>
</div>
@endsection
