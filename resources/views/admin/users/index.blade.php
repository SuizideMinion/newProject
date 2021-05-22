@extends('layouts.app') @section('content')
<div class="container-fluid">
  <div class="fade-in">
    <div class="card">
      <ul wire:sortable="updateTaskOrder">
          @foreach ($users as $user)
              <li style="
                margin-top: 20px;
                display:flex;" wire:sortable.item="{{ $user->user_id }}" wire:key="task-{{ $user->user_id }}">
                <div style="
                  border-width: 1px;
                  height:25px;
                  width:30px;
                  border-color:lightblue;
                  border-top-style: solid;
                  border-bottom-style: solid;
                  border-left-style: solid;
                  border-top-left-radius:10px;
                  border-bottom-left-radius: 10px;
                  ">
                  <!-- <i class="bi-list" style="font-size: 15px;color:green;"></i> -->
                </div>
                <div style="
                  border-width: 1px;
                  height:25px;
                  width:30%;
                  border-color:lightblue;
                  border-top-style: solid;
                  border-bottom-style: solid;
                  ">
                    {{ $user->name }}
                </div>
                <div style="
                  border-width: 1px;
                  width:30%;
                  height:25px;
                  border-color:lightblue;
                  border-top-style: solid;
                  border-bottom-style: solid;
                  ">{{ $user->email }}</div>
                <div style="
                  display:flex;
                  border-width: 1px;
                  height:25px;
                  width:30%;
                  border-color:lightblue;
                  border-top-style: solid;
                  border-bottom-style: solid;
                  border-right-style: solid;
                  border-top-right-radius:10px;
                  border-bottom-right-radius: 10px;
                  "><!--<a style="margin-left: auto!important;" href="#{{ $user->user_id }}" data-toggle="collapse" data-target="#{{ $user->user_id }}">
                     <i class="bi-pencil" style="font-size: 15px;color:green;"></i>
                  </a><form action="" method="POST">
                    @csrf
                    @method('DELETE')
                    <button style="padding-top: 0px;padding-bottom: 0px;" class="btn btn-text" type="submit">
                      <i class="bi-trash" style="font-size: 15px;color:red;"></i>
                    </button>
                  </form> -->
                </div>
              </li>
          @endforeach
      </ul>

    </div>
  </div>
</div>
@endsection
