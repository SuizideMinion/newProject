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
      <form action="{{ route('admin.pages.update', $page) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="card-header"> {{ __('Edit Page') }}</div>
        <div class="card-body">
          <div class="row">
            <div class="col-sm-12">
              <div class="form-group">
                <label for="name">Name</label>
                <input type="hidden" name="last_edit_from" value="{{ Auth::id() }}" class="form-control">
                <input value="{{ $page->name }}" class="form-control" name="name" type="text">
                <label for="description">Description</label>
                <input value="{{ $page->description }}" class="form-control" name="description" type="text">
                <label for="navigation">Naviagtion</label>
                <input value="{{ $page->navigation }}" class="form-control" name="navigation" type="text">
                <label for="navigation">Inhalt</label>
                <div class="row" id="markdown-with-preview">
                  <div class="col">
                    <textarea data-input name="markdowntext" rows="8" style="width:100%;height:300px">{{ $page->markdowntext }}</textarea>
                  </div>
                  <div class="col">
                    <div data-output style="max-height: 300px;overflow-y: auto;"></div>
                  </div>
                </div>
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
