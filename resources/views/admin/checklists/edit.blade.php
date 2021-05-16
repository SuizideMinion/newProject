@extends('layouts.app') @section('content')
<div class="container-fluid">
  <div class="fade-in">
    <div class="card">
      @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
      @endif
      <form action="{{ route('admin.checklist_groups.checklists.update', [$checklistGroup, $checklist]) }}" method="POST">
        @csrf @method('PUT')
        <div class="card-header">{{ __('Edit Checklist') }}</div>

        <div class="card-body">
          <div class="row">
            <div class="col-sm-12">
              <div class="form-group">
                <label for="name">{{ __('Name') }}</label>
                <input value="{{ $checklist->name }}" class="form-control" name="name" type="text">
                <!-- <div class="input-group">
<input class="form-control" id="appendedInputButtons" size="16" type="text" control-id="ControlID-98"><span class="input-group-append">
<button class="btn btn-secondary" type="button" control-id="ControlID-99">Search</button>
<button class="btn btn-secondary" type="button" control-id="ControlID-100">Options</button></span>
</div> -->
              </div>
            </div>
          </div>
        </div>
        <div class="card-footer">
          <button class="btn btn-sm btn-primary" type="submit"> {{ __('Save')}}</button>
      </form>
      <button class="btn btn-sm btn-danger" type="reset"> {{ __('Reset') }}</button>
      <form action="{{ route('admin.checklist_groups.checklists.destroy', [$checklistGroup, $checklist]) }}" method="POST">
        @csrf @method('DELETE')
        <button class="btn btn-sm btn-danger" type="submit" onclick="return confirm('{{ __('Are you Sure') }}')"> {{ __('Delete this Checklist')}}</button>
      </form>
      </div>
    </div>
    <div class="card">
      @if ($errors->storetask->any())
      <div class="alert alert-danger">
        <ul>
          @foreach ($errors->storetask->all() as $error)
          <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
      @endif

        <div class="card-header">{{ __('Tasklist') }}</div>

        <div class="card-body">
          <table class="table table-responsive-sm table-bordered table-striped table-sm">
            <thead>
              <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Admin</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($checklist->tasks as  $task)
              <tr>
                <td>{{$task->name}}</td>
                <td>{{$task->description}}</td>
                <td style="display: flex;">
                  @csrf @method('DELETE')
                  <a href="{{ route('admin.checklists.tasks.edit', [$checklist, $task]) }}"><i class="bi-pencil" style="font-size: 15px;color:green;"></i></a><form action="{{ route('admin.checklists.tasks.destroy', [$checklist, $task]) }}" method="POST"><button style="padding-top: 0px;padding-bottom: 0px;" class="btn btn-text" type="submit"><i class="bi-trash" style="font-size: 15px;color:red;"></i></button></form>
                </td>
              </tr>
              @endforeach
              <form action="{{ route('admin.checklists.tasks.store', [$checklist]) }}" method="POST">
                @csrf
                <tr>
                  <td><input value="{{ old('name') }}" class="form-control" name="name" type="text" placeholder="New Name"></td>
                  <td><input value="{{ old('description') }}" class="form-control" name="description" type="text" placeholder="New Description"></td>
                  <td><a type="submit"><button class="btn btn-text" type="submit"><i class="bi-save" style="font-size: 15px;color:green;"></i></button></a></td>
                </tr>
              </form>
            </tbody>
          </table>
        </div>
        <!-- <div class="card-footer"></div> -->
    </div>
  </div>
  @endsection
