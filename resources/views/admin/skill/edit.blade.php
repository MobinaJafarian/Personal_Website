@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-3">
           <div class="card">
               <div class="card-header">
                   edit skill page
               </div>
               @include('layouts.side-card')
           </div>
        </div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">edit skill page</div>

                <div class="card-body">

                      <form action="{{ route('skill.update', $skill->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                          

                        <div class="form-group mt-3">
                            <label for="">Skill</label>
                            <input type="text" value="{{ old('title' , $skill->title )}}" class="form-control" name="title">
                            @error('title')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mt-3">
                            <label for="">Skill percentage</label>
                            <input type="text" value="{{ old('precentage' , $skill->precentage) }}" class="form-control" name="precentage">
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
