@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-3">
           <div class="card">
               <div class="card-header">
                   create new application  
               </div>
               @include('layouts.side-card')
           </div>
        </div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">create new application</div>

                <div class="card-body">

                      <form action="{{ route('applicationTracker.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                          
                        <div class="form-group mt-3">
                            <label for="">Company Name</label>
                            <input type="text" class="form-control" value="{{ old('company-name')}}" name="company-name">
                            @error('company-name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="form-group mt-3">
                            <label for="">Job Tiltle</label>
                            <input type="text" class="form-control" value="{{ old('job-title')}}" name="job-title">
                            @error('jb-title')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mt-3">
                            <label for="">Location</label>
                            <input type="text" class="form-control" value="{{ old('location')}}" name="location">
                            @error('location')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mt-3">
                            <label for="">link</label>
                            <input type="text" class="form-control" value="{{ old('link')}}" name="link">
                            @error('link')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mt-3">
                            <label for="">Salary</label>
                            <input type="text" class="form-control" value="{{ old('salary')}}" name="salary">
                            @error('salary')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mt-3" data-select2-id="23">
                            <label for="">Status</label>
                            <div>
                                <select class="form-select" name="status" value="{{ old('status')}}" style="width: 100%;" data-select2-id="2" tabindex="-1" aria-hidden="true">
                                    @foreach($applicationStatus as $key => $status) 
                                        <option value="{{$key}}">{{$status}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group mt-3">
                            <label for="">Note</label>
                            <input type="text" class="form-control" value="{{ old('note')}}" name="note">
                            @error('note')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mt-3">
                            <label for="">Todo</label>
                            <input type="text" class="form-control" value="{{ old('todo')}}" name="todo">
                            @error('todo')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>


                        <div class="form-group mt-3">
                            <label for="">File</label>
                            <input type="file" class="form-control" value="{{ old('file') }}" name="file">
                            @error('file')
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
