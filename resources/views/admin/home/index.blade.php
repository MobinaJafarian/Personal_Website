@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">
                        home page main setting
                    </div>
                    @include('layouts.side-card')
                </div>
            </div>
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">home page setting</div>

                    <div class="card-body table-responsive">
                        <table class="table table-striped table-hover" id="customers">
                            <tr>
                                <th>title</th>
                                <th>about</th>
                                <th>position</th>
                                <th>description</th>
                                <th>link</th>
                                <th>picture</th>
                                <th>edit</th>
                                <th>delete</th>
                            </tr>
                            @foreach ($home as $item)
                                
                            
                            <tr>
                                    <td>{{ $item->title }}</td>
                                    <td>{{ $item->subject }}</td>
                                    <td>{{ $item->job }}</td>
                                    <td>{{ $item->description }}</td>
                                    <td>{{ $item->link }}</td>
                                    <td><img src="{{ asset($item->image) }}" alt="" width="100" height="50"></td>
                                    <td><a class="btn btn-info btn-sm" href="{{ route('home.edit', ['id'=> $item->id]) }}">Edit</a></td>
                                    <td>
                                        <form class="d-inline" action="{{ route('home.destroy', $item->id) }}"  method="post">
                                            @csrf
                                            {{ method_field('delete') }}
                                        <button class="btn btn-danger btn-sm" type="submit">delete</button>

                                        </form>

                                    </td>
                            </tr>
                            @endforeach
                        </table>

                        <a href="{{ route('home.create') }}" class="btn btn-success px-4 mt-3">Set home page</a>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

{{-- @section('js')

    <script>
        function destroyUser(event,id){
            event.preventDefault();
            document.querySelector('#userdelete-'+id).submit();
        }
    </script>

@endsection --}}