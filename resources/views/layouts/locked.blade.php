@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Du wurdest Gesperrt!') }}</div>

                <div class="card-body">
                    Du wurdest von einem Admin Gesperrt Begründung: {{ $reason }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
