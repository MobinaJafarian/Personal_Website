@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">
                       about me setting
                    </div>
                    @include('layouts.side-card')
                </div>
            </div>
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">about me setting</div>

                    <div class="card-body">
                        <table id="customers">
                            <tr>
                                <th>title</th>
                                <th>description</th>
                                <th>link</th>
                                <th>edit</th>
                                <th>delete</th>
                            </tr>
                            @foreach ($about as $item)
                                <tr>
                                    <td>{{ $item->title }}</td>
                                    <td>{{ $item->description }}</td>
                                    <td>{{ $item->link }}</td>

                                    <td><a class="btn btn-info btn-sm" href="{{ route('about.edit', ['id'=> $item->id]) }}">edit</a></td>
                                    <td>
                                        <form class="d-inline" action="{{ route('about.destroy', $item->id) }}"  method="post">
                                            @csrf
                                            {{ method_field('delete') }}
                                        <button class="btn btn-danger btn-sm" type="submit">delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach

                        </table>

                        <a href="{{ route('about.create') }}" class="btn btn-success px-4 mt-3">create about me </a>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
