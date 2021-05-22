<table class="table table-responsive-sm table-bordered table-striped table-sm" wire:sortable="updateTaskOrder">
  <!-- <thead>
    <tr>
      <th>Name</th>
      <th>Description</th>
      <th>Admin</th>
    </tr>
  </thead> -->
  <tbody>
    @foreach ($tasks as  $task)
    <tr wire:sortable.item="{{ $task->id }}" wire:key="task-{{ $task->id }}">
      <td><i class="bi-list" style="font-size: 15px;color:green;"></i></td>
      <td>{{$task->name}}</td>
      <td>{{$task->description}}</td>
      <td style="display: flex;">
        <a href="{{ route('admin.checklists.tasks.edit', [$checklist, $task]) }}">
          <i class="bi-pencil" style="font-size: 15px;color:green;"></i>
        </a>
        <form action="{{ route('admin.checklists.tasks.destroy', [$checklist, $task]) }}" method="POST">
          @csrf
          @method('DELETE')
          <button style="padding-top: 0px;padding-bottom: 0px;" class="btn btn-text" type="submit">
            <i class="bi-trash" style="font-size: 15px;color:red;"></i>
          </button>
        </form>
      </td>
    </tr>
    @endforeach
    <form action="{{ route('admin.checklists.tasks.store', [$checklist]) }}" method="POST">
      @csrf
      <!-- <tr>
        <td><input value="{{ old('name') }}" class="form-control" name="name" type="text" placeholder="New Name"></td>
        <td><input value="{{ old('description') }}" class="form-control" name="description" type="text" placeholder="New Description"></td>
        <td><a type="submit"><button class="btn btn-text" type="submit"><i class="bi-save" style="font-size: 15px;color:green;"></i></button></a></td>
      </tr> -->
    </form>
  </tbody>
</table>
