@extends('admin.layouts.app')
@section('content')
<div class="container-fluid">
  <div class="fade-in">
    <div class="card">
      <div class="card-body">
        <ul class="nav nav-tabs">
          <li class="nav-item"><a class="nav-link @if($group=='check') active @endif" href="/admin/logfiles/check">Checklist</a></li>
          <li class="nav-item"><a class="nav-link @if($group=='cheGr') active @endif" href="/admin/logfiles/cheGr">CheckGroup</a></li>
          <li class="nav-item"><a class="nav-link @if($group=='Page') active @endif" href="/admin/logfiles/Page">Page</a></li>
          <li class="nav-item"><a class="nav-link @if($group=='user') active @endif" href="/admin/logfiles/user">User</a></li>
          <li class="nav-item"><a class="nav-link @if($group=='all') active @endif" href="/admin/logfiles/">All</a></li>
        </ul>
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
    <div class="card-footer" style="margin:auto;">
      <ul class="pagination">
        {{ $logs->links() }}
        <!-- <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item"><a class="page-link" href="#">1</a></li>
        <li class="page-item"><a class="page-link" href="#">2</a></li> -->
      </ul>
    </div>
  </div>
</div>
@endsection
