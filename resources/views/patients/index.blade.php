@extends('layouts.master')

@section('title', 'Patients')

@section('content')

    <div class="col-lg-12 col-lg-offset-1">
        <h2><i class="fa fa-user-md"></i> Patients
            <a href="{{ route('patients.create') }}" class="btn btn-success pull-right">Add Patient</a></h2>
        <hr>
        <div class="table-responsive">
            <table class="table table-bordered table-striped" id="doctors">

                <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Gender</th>
                    <th>Age</th>
                    <th>Added</th>
                    <th>Operations</th>
                </tr>
                </thead>

                <tbody>
                @foreach ($patients as $patient)
                    <tr>
                        <td>{{$patient->id}}</td>
                        <td><a href="{{route('patients.show', $patient->id)}}">{{ $patient->name }}</a> </td>
                        <td>{{ $patient->phone }}</td>
                        <td>{{ $patient->gender}}</td>
                        <td>{{ $patient->age}}</td>
                        <td>{{ $patient->created_at}}</td>


                        <td>
                            <a href="{{ route('patients.edit', $patient->id) }}" class="btn-sm btn-info pull-left" style="margin-right: 3px;">Edit</a>

                            {!! Form::open(['method' => 'DELETE', 'route' => ['patients.destroy', $patient->id] ]) !!}
                            {!! Form::submit('Delete', ['class' => 'btn-sm btn-danger pull-left']) !!}
                            {!! Form::close() !!}

                        </td>
                    </tr>
                @endforeach
                </tbody>

            </table>
        </div>




    </div>

@endsection
@section('custom-js')
    <script>
        $(document).ready(function() {
            $('#doctors').DataTable();
        } );



    </script>


@endsection