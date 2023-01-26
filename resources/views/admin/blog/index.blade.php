@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">
                        Blog page setting
                    </div>
                    @include('layouts.side-card')
                </div>
            </div>
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Blog page setting</div>
                    <div class="card-body">
                        <table id="customers">
                            <tr>
                                <th>title</th>
                                <th>description</th>
                                <th>image</th>
                                <th>edit</th>
                                <th>delete</th>
                            </tr>
                            @foreach ($blog as $item)
                                <tr>
                                    <td>{{ $item->title }}</td>
                                    <td>{{ $item->description }}</td>
                                    <td><img src="{{ asset($item->image) }}" alt="blog" width="100" height="50"></td>
                                    <td><a class="btn btn-edit btn-sm" href="{{ route('blog.edit', ['id'=> $item->id]) }}">edit</a></td>
                                    <td>
                                        <form class="d-inline" action="{{ route('blog.destroy', $item->id) }}"  method="post">
                                            @csrf
                                            {{ method_field('delete') }}
                                        <button class="btn btn-delete btn-sm" type="submit">delete</button>

                                        </form>
                                    </td>
                                </tr>
                            @endforeach

                        </table>

                        <a href="{{ route('blog.create') }}" class="btn btn-save px-4 mt-3">Create New Blog</a>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

