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
          @livewire('tasks-table', ['checklist' => $checklist])

        </div>
        <!-- <div class="card-footer"></div> -->
    </div>
  </div>
  @endsection
