@extends('layouts.app')
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
      <div class="card-body">

        <div class="accordion" id="accordion" role="tablist">
          @foreach($array as $dog)
            @if($dog['category'] == 'false')
            <div style="position: absolute;"><div id="collapse{{ $dog['id'] }}" style="bottom: 200px;position: absolute;"></div></div>
            <div class="card mb-0">
                <a data-toggle="collapse" href="#collapse{{ $dog['id'] }}" aria-expanded="false" aria-controls="collapse{{ $dog['id'] }}" class="collapsed">
                  <div class="card-header" id="heading{{ $dog['id'] }}" role="tab">
                    <h5 class="mb-0">
                        {{ $dog['name'] }}
                    </h5>
                  </div>
                </a>
              </div>
            @endif
            @if($dog['category'] == 'true')
            <div style="position: absolute;"><div id="collapse{{ $dog['id'] }}" style="bottom: 200px;position: absolute;"></div></div>
              <div class="card mb-0">
                <a data-toggle="collapse" href="#collapse{{ $dog['id'] }}" aria-expanded="false" aria-controls="collapse{{ $dog['id'] }}" class="">
                  <div class="card-header" id="heading{{ $dog['id'] }}" role="tab">
                    <h5 class="mb-0" style="justify-content: space-between;display: flex;">
                      {{ $dog['name'] }}
                      <span style="display:flex">
                        <i class="bi-arrow-bar-down" style="font-size:1.2rem;color:grey;margin-left: auto;"></i>
                      </span>
                    </h5>
                  </div>
                </a>
                <? $id = $dog['id']; ?>
            @endif
            @if($dog['category'] == 'FIRST')
                <div class="collapse" id="collapse{{ $id }}" role="tabpanel" aria-labelledby="heading{{ $id }}" data-parent="#accordion" style="">
                  <div class="card-body">{{ $dog['name'] }}</div>
            @endif
            @if($dog['category'] == 'NEXT')
                  <div class="card-body">{{ $dog['name'] }}</div>
            @endif
            @if($dog['category'] == 'LAST')
                  <div class="card-body">{{ $dog['name'] }}</div>
                </div>
              </div>
            @endif
            @if($dog['category'] == 'OWN')
                <div class="collapse" id="collapse{{ $id }}" role="tabpanel" aria-labelledby="heading{{ $id }}" data-parent="#accordion" style="">
                  <div class="card-body">{{ $dog['name'] }}</div>
                </div>
              </div>
            @endif
          @endforeach
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
