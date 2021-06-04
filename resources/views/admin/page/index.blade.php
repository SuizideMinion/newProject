@extends('admin.layouts.app')
@section('content')
<div class="container-fluid">
  <div class="fade-in">
    <div class="card">
      <ul wire:sortable="updateTaskOrder">
          @foreach ($pages as $page)
              <li style="
                margin-top: 20px;
                display:flex;" wire:sortable.item="{{ $page->id }}" wire:key="task-{{ $page->id }}">
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
                    {{ $page->name }} | {{ $page->description }}
                </div>
                <div style="
                  border-width: 1px;
                  width:30%;
                  height:25px;
                  border-color:lightblue;
                  border-top-style: solid;
                  border-bottom-style: solid;
                  ">Link: <a href="/getsite/{{ $page->navigation }}">{{ $page->navigation }}</a> | Alternative Link: <a href="/getsite/{{ $page->md5id }}">{{ $page->md5id }}</a></div>
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
                  ">
                  <i class="bi-star" style="font-size: 15px;color:green;" title="Createt by"></i> {{ auth()->user($page->owner)->name }}
                  <i class="bi-pencil-fill" style="font-size: 15px;color:green;margin-left:10px" title="Last Chance by"></i> {{ auth()->user($page->last_edit_from)->name }}
                  <a style="margin-left: auto!important;" href="/admin/pages/{{ $page->id }}/edit" data-toggle="collapse" data-target="#{{ $page->id }}">
                     <i class="bi-pencil" style="margin-right: 10px;font-size: 15px;color:green;"></i>
                  </a>

                  <form action="{{ route('admin.menuitem.create', $page->navigation) }}" method="GET">
                    @csrf
                    <input type="hidden" name="link" value="s/{{ $page->navigation }}">
                    <button style="padding: 0px;" class="btn btn-text" type="submit">
                      <i class="bi-chevron-compact-down" style="font-size: 15px;color:green;"></i>
                    </button>
                  </form>
                  <form action="{{ route('admin.submenuitem.create', $page->navigation) }}" method="GET">
                    @csrf
                    <input type="hidden" name="link" value="s/{{ $page->navigation }}">
                    <button style="padding: 0px;" class="btn btn-text" type="submit">
                      <i class="bi-chevron-double-down" style="font-size: 15px;color:green;"></i>
                    </button>
                  </form>
                    <form action="{{ route('admin.pages.destroy', $page) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button style="padding: 0px;" class="btn btn-text" type="submit" onclick="return confirm('{{ __('Are you Sure') }}')"><i class="bi-trash" style="font-size: 15px;color:red;"></i></button>
                  </form>
                </div>
              </li>
          @endforeach
      </ul>
      <a href="/admin/pages/create/">Create New Page</a>

    </div>
  </div>
</div>
@endsection
