@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Add new Navigation Link') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('admin.menuitem.store') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="link" class="col-md-4 col-form-label text-md-right">{{ __('Link') }}</label>

                            <div class="col-md-6">
                                <input
                                  id="link"
                                  type="link"
                                  class="form-control @error('link') is-invalid @enderror"
                                  name="link"
                                  value="{{old('link')}}@if(isset($_GET['link'])){{$_GET['link']}}@endif"
                                  required
                                  autocomplete="link"
                                >

                                @error('link')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="icon" class="col-md-4 col-form-label text-md-right">{{ __('Icon') }}</label>

                            <div class="col-md-6">
                                <input id="icon" type="icon" class="form-control @error('icon') is-invalid @enderror" name="icon" value="{{ old('icon') }}" required autocomplete="icon">

                                @error('icon')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="status" class="col-md-4 col-form-label text-md-right">{{ __('Status') }}</label>

                            <div class="col-md-6">
                                <!-- <input id="status" type="status" class="form-control @error('status') is-invalid @enderror" name="status" value="{{ old('status') }}" required autocomplete="status"> -->

                                <div class="form-check">
                                  <input class="form-check-input" id="radio1" type="radio" value="1" name="status">
                                  <label class="form-check-label" for="radio1">Active</label>
                                </div>
                                <div class="form-check">
                                  <input class="form-check-input" id="radio2" type="radio" value="2" name="status">
                                  <label class="form-check-label" for="radio2">No Active</label>
                                </div>
                                @error('status')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="menu" class="col-md-4 col-form-label text-md-right">{{ __('Menu') }}</label>

                            <div class="col-md-6">

                                <div class="form-check">
                                  <input class="form-check-input" id="radio1" type="radio" value="1" name="menu">
                                  <label class="form-check-label" for="radio1">Upper Left</label>
                                </div>
                                <div class="form-check">
                                  <input class="form-check-input" id="radio2" type="radio" value="2" name="menu">
                                  <label class="form-check-label" for="radio2">Upper Right</label>
                                </div>
                                <div class="form-check">
                                  <input class="form-check-input" id="radio3" type="radio" value="3" name="menu">
                                  <label class="form-check-label" for="radio3">Lower Left</label>
                                </div>
                                <div class="form-check">
                                  <input class="form-check-input" id="radio4" type="radio" value="4" name="menu">
                                  <label class="form-check-label" for="radio4">Lower Right</label>
                                </div>

                                @error('menu')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="target" class="col-md-4 col-form-label text-md-right">{{ __('Target') }}</label>

                            <div class="col-md-6">

                                <div class="form-check">
                                  <input class="form-check-input" id="radio1" type="radio" value="1" name="target">
                                  <label class="form-check-label" for="radio1">Interne Seite (z.b. /home)</label>
                                </div>
                                <div class="form-check">
                                  <input class="form-check-input" id="radio2" type="radio" value="2" name="target">
                                  <label class="form-check-label" for="radio2">Externe Seite (z.b. www.url.de)</label>
                                </div>

                                @error('target')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Save') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
