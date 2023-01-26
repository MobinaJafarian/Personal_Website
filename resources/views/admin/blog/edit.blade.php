@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-3">
           <div class="card">
               <div class="card-header">
                   Edit Blog
               </div>
               @include('layouts.side-card')
           </div>
        </div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">Edit Blog</div>

                <div class="card-body">

                      <form action="{{ route('blog.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                            <div class="form-group mt-3">
                                <label for="">title</label>
                                <input type="text" value="{{ old( 'title' , $blog->title) }}" class="form-control" name="title">
                                @error('title')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group mt-3">
                                <label for="">description</label>
                                <textarea type="text"  value="{{ $blog->description }}" class="form-control" name="description"> {{ old('description', $blog->description )}}</textarea>
                                @error('description')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mt-3">
                                <label for="">image</label>
                                <input type="file" class="form-control" name="image">
                                <p><img src="{{ asset($blog->image) }}" width="100" height="50" class="mt-3" alt="image"></p>
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
