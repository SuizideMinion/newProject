@extends('admin.layouts.app')
@section('content')
<div class="container-fluid">
  <div class="fade-in">
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
      <form action="{{ route('admin.checklists.tasks.update', [$checklist, $task]) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="card-header">{{ __('Edit Task') }}</div>

        <div class="card-body">
          <div class="row">
            <div class="col-sm-12">
              <div class="form-group">
                <label for="name">{{ __('Taskname') }}</label>
                <input value="{{ $task->name }}" class="form-control" name="name" type="text">
              </div>
              <div class="form-group">
                <label for="name">{{ __('Description') }}</label>
                <input value="{{ $task->description }}" class="form-control" name="description" type="text">
              </div>
            </div>
          </div>
        </div>
        <div class="card-footer">
          <button class="btn btn-sm btn-primary" type="submit"> {{ __('Save')}}</button>
      </form>
      </div>
    </div>
  </div>
</div>
  @endsection
