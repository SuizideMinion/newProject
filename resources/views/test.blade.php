@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="w-100">
            <div class="card">
                <div class="card-body">
                    {!! $markdown !!}
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
