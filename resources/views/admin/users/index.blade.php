@extends('layouts.app') @section('content')
<div class="container-fluid">
  <div class="fade-in">
    <div class="card">
      <div class="card-header">Users</div>
      <div class="card-body">
        <ul class="group" wire:sortable="updateTaskOrder"  style="padding-left: 20px;padding-right: 20px;padding-top: 20px;">
          @foreach ($users as $user)
          @if($user->is_admin)
              <li
                class="list-group-item d-flex list-group-item-action justify-content-between align-items-center list-group-item-danger"
                wire:sortable.item="{{ $user->user_id }}"
                wire:key="task-{{ $user->user_id }}"
              >
          @else
              <li class="list-group-item d-flex list-group-item-action justify-content-between align-items-center list-group-item-success"
                wire:sortable.item="{{ $user->user_id }}"
                wire:key="task-{{ $user->user_id }}"
              >
          @endif
                {{ $user->name }} | {{ $user->email }}
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
        <? $i = 0 ?>
        @foreach($arrays as $arr)
          @if($arr == '0')

          @else
            <li class="page-item"><a class="page-link" href="/admin/users/{{ $array[$i] }}">{{ $array[$i] }}<br>{{ $arr }}</a></li>
          @endif

        <? $i++ ?>
        @endforeach
      </ul>
    </div>
  </div>
</div>
@endsection
