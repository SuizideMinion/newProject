@extends('admin.layouts.app')
@section('content')
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
      <form
        class=""
        action="{{ route('admin.checklist_groups.checklists.store', $checklistGroup)}}"
        method="POST">
        @csrf
        <div class="card-header"> {{ __('New Checklist in ') }}{{ $checklistGroup->name }}</div>
        <div class="card-body">
          <div class="row">
            <div class="col-sm-12">
              <div class="form-group">
                <label for="name">Name</label>
                <input value="{{ old('name') }}" class="form-control" name="name" type="text" placeholder="{{ _('Checklist Name') }}" control-id="ControlID-106">
              </div>
            </div>
          </div>
        </div>
        <div class="card-footer">
          <button class="btn btn-sm btn-primary" type="submit"> {{ __('Save')}}</button>
          <button class="btn btn-sm btn-danger" type="reset"> Reset</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
