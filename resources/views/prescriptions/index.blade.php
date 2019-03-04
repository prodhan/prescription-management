@extends('layouts.master')

@section('title', 'Prescriptions')

@section('content')

    <div class="col-lg-12 col-lg-offset-1">
        <h2><i class="fa fa-user-md"></i> Prescriptions
            <a href="{{ route('prescriptions.create') }}" class="btn btn-success pull-right">Add Prescription</a></h2>
        <hr>
        <div class="table-responsive">
            <table class="table table-bordered table-striped" id="doctors">

                <thead>
                <tr>
                    <th>Date</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Age</th>
                    <th>Dr Name</th>
                    <th>Fee</th>
                    <th>Operations</th>
                </tr>
                </thead>

                <tbody>
                @foreach ($prescriptions as $prescription)
                    <tr>
                        <td>{{$prescription->date}}</td>
                        <td>{{$prescription->name}}</td>
                        <td>{{ $prescription->phone }}</td>
                        <td>{{ $prescription->age}}</td>
                        <td><a href="{{route('doctors.show', $prescription->dr_name)}}">{{ get_doctor($prescription->dr_name) }}</a></td>
                        <td>{{ $prescription->fee}}</td>


                        <td>
                            {{--<a href="{{ route('serials.edit', $serial->id) }}" class="btn-sm btn-info pull-left" style="margin-right: 3px;">Edit</a>--}}
                            <a href="{{ route('prescriptions.show', $prescription->id) }}" target="_blank" class="btn-sm btn-info pull-left" style="margin-right: 3px;">Print</a>

                            {!! Form::open(['method' => 'DELETE', 'route' => ['prescriptions.destroy', $prescription->id] ]) !!}
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