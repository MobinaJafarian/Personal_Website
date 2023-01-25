@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">{{ __('Seeting') }}</div>
                @include('layouts.side-card')
            </div>
        </div>

        <div class="col-md-9">
            <div class="card">
                <div class="card-header">Hello there!</div>

                <div class="card-body">
                    you can change the setting from left section . preview::
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
