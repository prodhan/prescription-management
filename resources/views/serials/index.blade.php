@extends('layouts.master')

@section('title', 'Serials')

@section('content')

    <div class="col-lg-12 col-lg-offset-1">
        <h2><i class="fa fa-user-md"></i> Today's Serial
            <a href="{{ route('serials.create') }}" class="btn btn-success pull-right">Add Serial</a></h2>
        <hr>
        <div class="table-responsive">
            <table class="table table-bordered table-striped" id="doctors">

                <thead>
                <tr>
                    <th>SL</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Age</th>
                    <th>Dr Name</th>
                    <th>Status</th>
                    <th>Operations</th>
                </tr>
                </thead>

                <tbody>
                @foreach ($serials as $serial)
                    <tr>
                        <td>{{$serial->serial}}</td>
                        <td><a href="{{route('patients.show', $serial->patient_id)}}">{{ $serial->name }}</a> </td>
                        <td>{{ $serial->phone }}</td>
                        <td>{{ $serial->age}}</td>
                        <td><a href="{{route('doctors.show', $serial->dr_name)}}">{{ get_doctor($serial->dr_name) }}</a></td>
                        <td>{{ $serial->status}}</td>


                        <td>
                            {{--<a href="{{ route('serials.edit', $serial->id) }}" class="btn-sm btn-info pull-left" style="margin-right: 3px;">Edit</a>--}}
                            <a href="{{ route('serials.show', $serial->id) }}" target="_blank" class="btn-sm btn-info pull-left" style="margin-right: 3px;">Print</a>

                            {!! Form::open(['method' => 'DELETE', 'route' => ['serials.destroy', $serial->id] ]) !!}
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