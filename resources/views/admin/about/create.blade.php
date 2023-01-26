@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-3">
           <div class="card">
               <div class="card-header">
                   create about me
               </div>
               @include('layouts.side-card')
           </div>
        </div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">create about me</div>

                <div class="card-body">

                      <form action="{{ route('about.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                          <div class="form-group mt-3">
                              <label for="">title</label>
                              <input type="text" class="form-control" value="{{ old('title') }}" name="title">
                              @error('title')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                          </div>

                        <div class="form-group mt-3">
                            <label for="">description</label>
                            <textarea type="text" class="form-control" value="{{ old('description') }}" name="description">{{ old('description') }}</textarea>
                            @error('description')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mt-3">
                            <label for="">link</label>
                            <input type="text" class="form-control" value="{{ old('link') }}" name="link">
                            @error('link')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mt-3">
                          <button type="submit" class="btn btn-save px-5">save</button>
                        </div>
                      </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
