@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">
                    Application Tracker setting
                    </div>
                    @include('layouts.side-card')
                </div>
            </div>
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Application Tracker setiing</div>

                    <div class="card-body">
                        <table id="customers">
                            <tr>
                                <th>Company Name</th>
                                <th>Job Title</th>
                                <th>Salary</th>
                                <th>Location</th>
                                <th>Link</th>
                                <th>Status</th>
                                <th>Note</th>
                                <th>Todo</th>
                                <th>File</th>
                                <th>edit</th>
                                <th>delete</th>
                            </tr>
                            @foreach ($applications as $application)
                                <tr>
                                    <td>{{ $application->company_name }}</td>
                                    <td>{{ $application->job_title }}</td>
                                    <td>{{ $application->salary }}</td>
                                    <td>{{ $application->location }}</td>
                                    <td>{{ $application->link }}</td>
                                    <td>{{ $application->status }}</td>
                                    <td>{{ $application->note }}</td>
                                    <td>{{ $application->todo }}</td>
                                    <td>{{ $application->file }}</td>

                                    <td><a class="btn btn-edit btn-sm" href="{{ route('applicationTracker.edit', ['id'=> $application->id]) }}">edit</a></td>
                                    <td>
                                        <form class="d-inline" action="{{ route('applicationTracker.destroy', $application->id) }}"  method="post">
                                            @csrf
                                            {{ method_field('delete') }}
                                        <button class="btn btn-delete btn-sm" type="submit">delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach

                        </table>

                        <a href="{{ route('applicationTracker.create') }}" class="btn btn-save px-4 mt-3">Create new application</a>

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
