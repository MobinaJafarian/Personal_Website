@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">
                        edit home page main setting
                    </div>
                    @include('layouts.side-card')
                </div>
            </div>
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">edit home page setting</div>

                    <div class="card-body">
                        <form action="{{ route('home.update', $home->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                              <div class="form-group mt-3" >
                                  <label for="">title</label>
                                  <input type="text" value="{{ old('title', $home->title) }}" class="form-control" name="title">
                                  @error('title')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                              </div>
                              <div class="form-group mt-3">
                                <label for="">subject</label>
                                <input type="text" class="form-control" value="{{ old('subject' , $home->subject) }}" name="subject">
                                @error('subject')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group mt-3">
                                <label for="">position</label>
                                <input type="text" class="form-control" value="{{ old('job' , $home->job) }}" name="job">
                                @error('job')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group mt-3">
                                <label for="">description</label>
                                <textarea type="text" class="form-control" value="{{ old('description' , $home->description) }}" name="description">{{ old('description' , $home->description) }}</textarea>
                                @error('description')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group mt-3">
                                <label for="">link</label>
                                <input type="text" class="form-control" value="{{ old('link' , $home->link) }}" name="link">
                                @error('link')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group mt-3">
                                <label for="">pictrue</label>
                                <input type="file" class="form-control" name="image">
                                <img src="{{ asset($home->image) }}" alt="" width="100" height="50" class="mt-3">
                                @error('image')
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

@section('js')

    {{-- <script>
        function destroyUser(event,id){
            event.preventDefault();
            document.querySelector('#userdelete-'+id).submit();
        }
    </script> --}}

@endsection
