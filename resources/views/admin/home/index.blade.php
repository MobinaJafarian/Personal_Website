@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">
                        home page main setting
                    </div>
                    <div class="card-body">
                        <ul>
                            <li><a href="{{ route('home') }}">Dashboard</a></li>
                            <li><a href="{{ route('home.index') }}">home</a></li>
                            <li><a href="">about me</a></li>
                            <li><a href="">my skills</a></li>
                            <li><a href="">social</a></li>
                            <li><a href="">blogs </a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">home page setting</div>

                    <div class="card-body">
                        <table id="customers">
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
                            <tr>
                                <td>developer</td>
                                <td>back-end developer</td>
                                <td>developer</td>
                                <td>developer test developer</td>
                                <td>developher http://</td>
                                <td>dev</td>
                                <td>developer</td>
                                <td>developer</td>
                            </tr>
                            {{-- @foreach ($home as $item)
                                <tr>
                                    <td>{{ $item->title }}</td>
                                    <td>{{ $item->subject }}</td>
                                    <td>{{ $item->job }}</td>
                                    <td>{{ $item->description }}</td>
                                    <td>{{ $item->link }}</td>
                                    <td><img src="{{ asset('admin/images/home/'.$item->image) }}" width="80" alt=""></td>
                                    <td><a href="{{ route('home.edit', ['id'=> $item->id]) }}">ویرایش</a></td>
                                    <td>
                                        <a href="" onclick="destroyUser(event,{{ $item->id }})">حذف</a>

                                        <form action="{{ route('home.destroy', $item->id) }}" id="userdelete-{{ $item->id }}" method="POST">
                                            @csrf
                                            @method('delete')
                                        </form>
                                    </td>
                                </tr>
                            @endforeach --}}

                        </table>

                        <a href="{{ route('home.create') }}" class="btn btn-success px-4 mt-3">Set home page</a>

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
