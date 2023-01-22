@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-3">
           <div class="card">
               <div class="card-header">
                   create skill page 
               </div>
               @include('layouts.side-card')
           </div>
        </div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">create skill page</div>

                <div class="card-body">

                      <form action="{{ route('skill.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                          
                        <div class="form-group mt-3">
                            <label for="">Skill</label>
                            <input type="text" class="form-control" value="{{ old('title')}}" name="title">
                            @error('title')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mt-3">
                            <label for="">Skill percentage</label>
                            <input type="text" class="form-control" value="{{ old('precentage') }}" name="precentage">
                            @error('precentage')
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
