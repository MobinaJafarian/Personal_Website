@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">
                      my skill setting
                    </div>
                    @include('layouts.side-card')
                </div>
            </div>
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">my skill setiing</div>

                    <div class="card-body">
                        <table id="customers">
                            <tr>
                                <th>Skill percentage</th>
                                <th>Skill</th>
                                <th>edit</th>
                                <th>delete</th>
                            </tr>
                            @foreach ($skills as $item)
                                <tr>
                                    <td>{{ $item->precentage }}</td>
                                    <td>{{ $item->title }}</td>

                                    <td><a class="btn btn-edit btn-sm" href="{{ route('skill.edit', ['id'=> $item->id]) }}">edit</a></td>
                                    <td>
                                        <form class="d-inline" action="{{ route('skill.destroy', $item->id) }}"  method="post">
                                            @csrf
                                            {{ method_field('delete') }}
                                        <button class="btn btn-delete btn-sm" type="submit">delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach

                        </table>

                        <a href="{{ route('skill.create') }}" class="btn btn-save px-4 mt-3">Create Skill Page</a>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')

    <script>
        function destroyUser(event,id){
            event.preventDefault();
            document.querySelector('#userdelete-'+id).submit();
        }
    </script>

@endsection
