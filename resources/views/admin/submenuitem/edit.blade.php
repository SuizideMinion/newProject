@extends('admin.layouts.app')
<!-- ---------TODO:: EDIT übernimmt den wert vom menu_item_id nicht!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! _------------------------ -->
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Edit Navigation Link') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('admin.submenuitem.update', $SubMenuItem->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('SubMenuName') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $SubMenuItem->name }}" required autocomplete="name" autofocus>

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
                                <input id="link" type="link" class="form-control @error('link') is-invalid @enderror" name="link" value="{{ $SubMenuItem->link }}" required autocomplete="link">
                                Einen Trenner kann man mit --- einfügen

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
                                <input id="icon" type="icon" class="form-control @error('icon') is-invalid @enderror" name="icon" value="{{ $SubMenuItem->icon }}" autocomplete="icon">

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
                                  <input class="form-check-input" id="radio1" type="radio" value="1" name="status"
                                  @if ( $SubMenuItem->status == 1 )
                                    checked
                                  @endif
                                  >
                                  <label class="form-check-label" for="radio1" >Active</label>
                                </div>
                                <div class="form-check">
                                  <input class="form-check-input" id="radio2" type="radio" value="0" name="status"
                                  @if ( $SubMenuItem->status == 0 )
                                    checked
                                  @endif
                                  >
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
                            <label for="target" class="col-md-4 col-form-label text-md-right">{{ __('Target') }}</label>

                            <div class="col-md-6">

                                <div class="form-check">
                                  <input class="form-check-input" id="radio1" type="radio" value="1" name="target"
                                  @if ( $SubMenuItem->target == 1 )
                                    checked
                                  @endif
                                  >
                                  <label class="form-check-label" for="radio1">Interne Seite (z.b. /home)</label>
                                </div>
                                <div class="form-check">
                                  <input class="form-check-input" id="radio2" type="radio" value="2" name="target"
                                  @if ( $SubMenuItem->status == 2 )
                                    checked
                                  @endif
                                  >
                                  <label class="form-check-label" for="radio2">Externe Seite (z.b. www.url.de)</label>
                                </div>

                                @error('target')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="menu_item_id" class="col-md-4 col-form-label text-md-right">{{ __('Kategorie') }}</label>

                            <div class="col-md-6">

                              <div class="col-md-9">
                                <select class="form-control" id="menu_item_id" name="menu_item_id" control-id="ControlID-7">
                                  <option value="0">Please select</option>
                                  @foreach (\App\Models\admin\MenuItem::get() as $MenuItem)
                                  <option value="{{ $MenuItem->id }}"
                                    @if( $MenuItem->id == $SubMenuItem->id)
                                    selected
                                    @endif
                                  >{{ $MenuItem->name }}</option>
                                  @endforeach
                                </select>
                              </div>

                                @error('menu_item_id')
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
