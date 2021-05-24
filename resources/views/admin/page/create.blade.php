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
        action="{{ route('admin.pages.store')}}"
        method="POST">
        @csrf
        <div class="card-header"> {{ __('New Page') }}</div>
        <div class="card-body">
          <div class="row">
            <div class="col-sm-12">
              <div class="form-group">
                <label for="name">Name</label>
                <input type="hidden" name="last_edit_from" value="{{ Auth::id() }}">
                <input value="{{ old('name') }}" class="form-control" name="name" type="text">
                <label for="description">Description</label>
                <input value="{{ old('description') }}" class="form-control" name="description" type="text">
                <label for="navigation">Naviagtion</label>
                <input value="{{ old('navigation') }}" class="form-control" name="navigation" type="text">
                <label for="navigation">Inhalt</label>
                <textarea name="markdowntext" rows="8" style="width:100%;">{{ old('markdowntext') }}</textarea>
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
