@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="w-100">
            <div class="card">
                <div class="card-header">{{ $beschreibung }}</div>

                <div class="card-body">
                    {!! $markdown !!}
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://coreui.io/demo/free/3.4.0/vendors/@coreui/coreui/js/coreui.bundle.min.js"></script>
<script src="https://coreui.io/demo/free/3.4.0/js/popovers.js"></script>

@endsection
