<ul wire:sortable="updateTaskOrder">
    @foreach ($tasks as $task)
        <li style="
          margin-top: 20px;
          display:flex;" wire:sortable.item="{{ $task->id }}" wire:key="task-{{ $task->id }}">
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
            "><i class="bi-list" style="font-size: 15px;color:green;"></i></div>
          <div style="
            border-width: 1px;
            height:25px;
            width:30%;
            border-color:lightblue;
            border-top-style: solid;
            border-bottom-style: solid;
            ">
              {{ $task->name }}
          </div>
          <div style="
            border-width: 1px;
            width:30%;
            height:25px;
            border-color:lightblue;
            border-top-style: solid;
            border-bottom-style: solid;
            ">{{$task->description}}</div>
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
            "><a style="margin-left: auto!important;" href="#{{ $task->id }}" data-toggle="collapse" data-target="#{{$task->id}}">
              <i class="bi-pencil" style="font-size: 15px;color:green;"></i>
            </a><form action="{{ route('admin.checklists.tasks.destroy', [$checklist, $task]) }}" method="POST">
              @csrf
              @method('DELETE')
              <button style="padding-top: 0px;padding-bottom: 0px;" class="btn btn-text" type="submit">
                <i class="bi-trash" style="font-size: 15px;color:red;"></i>
              </button>
            </form>
        </li>


        <div id="{{$task->id}}" class="collapse" >
          DADDADSA
        </div>
    @endforeach
    <form action="{{ route('admin.checklists.tasks.store', [$checklist]) }}" method="POST">
      @csrf
      <li style="
        margin-top: 20px;
        display:flex;">
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
          "><i class="bi-list" style="font-size: 15px;color:green;"></i></div>
        <div style="
          border-width: 1px;
          height:25px;
          width:30%;
          border-color:lightblue;
          border-top-style: solid;
          border-bottom-style: solid;
          ">
            <input style="height: 23px;" value="{{ old('name') }}" class="form-control" name="name" type="text" placeholder="New Name">
        </div>
        <div style="
          border-width: 1px;
          width:30%;
          height:25px;
          border-color:lightblue;
          border-top-style: solid;
          border-bottom-style: solid;
          "><input style="height: 23px;" value="{{ old('description') }}" class="form-control" name="description" type="text" placeholder="New Description">
        </div>
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
          <a type="submit" style="margin-left:auto;"><button class="btn btn-text" type="submit" style="padding-top: 0px;padding-bottom: 0px;"><i class="bi-save" style="font-size: 15px;color:green;"></i></button></a>
        </div>
      </li>
    </form>

</ul>
