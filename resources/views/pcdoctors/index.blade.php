@extends('layouts.master')

@section('title', 'PC Doctors')

@section('content')

    <div class="col-lg-12 col-lg-offset-1">
        <h2><i class="fa fa-user-md"></i> PC Doctors
            <a href="{{ route('pcdoctors.create') }}" class="btn btn-success pull-right">Add PC Doctor</a></h2>
        <hr>
        <div class="table-responsive">
            <table class="table table-bordered table-striped" id="doctors">

                <thead>
                <tr>
                    <th>Name</th>
                    <th>Designation</th>
                    <th>Address</th>
                    <th>Mobile</th>
                    <th>Operations</th>
                </tr>
                </thead>

                <tbody>
                @foreach ($doctors as $doctor)
                    <tr>

                        <td><a href="{{route('pcdoctors.show', $doctor->id)}}">{{ $doctor->name }}</a> </td>
                        <td>{{ $doctor->designation }}</td>
                        <td>{{ $doctor->address }}</td>
                        <td>{{ $doctor->phone}}</td>


                        <td>
                            <a href="{{ route('pcdoctors.edit', $doctor->id) }}" class="btn-sm btn-info pull-left" style="margin-right: 3px;">Edit</a>

                            {!! Form::open(['method' => 'DELETE', 'route' => ['pcdoctors.destroy', $doctor->id] ]) !!}
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