@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-3">
           <div class="card">
               <div class="card-header">
                   Create Blog Page
               </div>
               @include('layouts.side-card')
           </div>
        </div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">create blog</div>

                <div class="card-body">

                      <form action="{{ route('blog.store') }}" method="POST" enctype="multipart/form-data">
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
                            <textarea type="text" class="form-control" value="{{ old('description') }}" name="description"></textarea>
                            @error('description')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                      
                        <div class="form-group mt-3">
                            <label for="">image</label>
                            <input type="file" class="form-control" name="image">
                            @error('image')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mt-3">
                          <button type="submit" class="btn btn-save px-5">Save</button>
                        </div>
                      </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
