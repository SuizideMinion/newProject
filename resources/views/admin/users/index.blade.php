@extends('admin.layouts.app')
@section('content')
<div class="container-fluid">
  <div class="fade-in">
    <div class="card">
      <div class="card-body">
        <ul class="nav nav-tabs">
          <? $i = 0 ?>
          @foreach($arrays as $arr)
            @if($arr == '0')
            @else
              @if($array[$i]=='@')
              <li class="nav-item" style="margin-left: 8px;">
                <a class="nav-link @if($id==$array[$i]) active @endif" href="/admin/users/" style="padding-left: 9px;">{{ $array[$i] }}<br><font size="1">{{ $arr }}</font></a>
              </li>
              @else
              <li class="nav-item" style="margin-left: 8px;">
                <a class="nav-link @if($id==$array[$i]) active @endif" href="/admin/users/{{ $array[$i] }}" style="padding-left: 9px;">{{ $array[$i] }}<br><font size="1">{{ $arr }}</font></a>
              </li>
              @endif
            @endif

          <? $i++ ?>
          @endforeach
        </ul>
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
                  @if($user->closed)
                    @if($user->reason=='0')
                      <form action="/admin/users/update/{{$user->id}}" method="POST">
                        @csrf
                        @method('PATCH')
                        <input type="text" name="reason" placeholder="Begründung?">
                        <button style="padding: 0px;margin-left:10px;" class="btn btn-text" type="submit">
                          <i class="bi-check" style="font-size: 15px;color:red;"></i>
                        </button>
                      </form>
                    @else
                    Gesperrt wegen: {{ $user->reason }}
                    <a style="margin-left: auto!important;" href="/admin/users/unlock/{{$user->id}}" data-toggle="collapse" data-target="">
                      <i class="bi-unlock" style="font-size: 15px;color:green;"></i>
                    </a>
                  @endif
                  @else
                  <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button style="padding: 0px;margin-left:10px;" class="btn btn-text" type="submit">
                      <i class="bi-lock" style="font-size: 15px;color:red;"></i>
                    </button>
                  </form>
                  @endif
                </span>
              </li>
          @endforeach
      </ul>
    </div>
    <div class="card-footer" style="margin:auto">
      <ul class="pagination">
        {{ $users->links() }}
      </ul>
    </div>
  </div>
</div>
@endsection
