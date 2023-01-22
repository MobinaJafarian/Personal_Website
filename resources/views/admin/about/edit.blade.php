@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-3">
           <div class="card">
               <div class="card-header">
                   edit about me
               </div>
               @include('layouts.side-card')
           </div>
        </div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">edit about me</div>

                <div class="card-body">

                      <form action="{{ route('about.update', $about->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                          <div class="form-group mt-3">
                              <label for="">title</label>
                              <input type="text" value="{{ old('title' , $about->title) }}" class="form-control" name="title">
                              @error('title')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                          </div>

                        <div class="form-group mt-3">
                            <label for="">description</label>
                            <textarea type="text"  value={{ old('title' , $about->description) }} class="form-control" name="description">{{ old('title' , $about->description) }}</textarea>
                            @error('description')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mt-3">
                            <label for="">link</label>
                            <input type="text" value="{{ old('title' , $about->link) }}" class="form-control" name="link">
                            @error('link')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mt-3">
                          <button type="submit" class="btn btn-success px-5">save</button>
                        </div>
                      </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
