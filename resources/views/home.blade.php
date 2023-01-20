@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">{{ __('Seeting') }}</div>

                <div class="card-body">
                    {{-- @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif --}}

                    <ul>
                        <li><a href="{{ route('home') }}">Dashboard</a></li>
                        <li><a href="{{ route('home.index') }}">home</a></li>
                        <li><a href="">about me</a></li>
                        <li><a href="">my skills</a></li>
                        <li><a href="">social</a></li>
                        <li><a href="">blogs </a></li>
                    </ul>

                    {{ __('You are logged in!') }}
                </div>
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
