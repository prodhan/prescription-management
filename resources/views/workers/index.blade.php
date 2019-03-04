@extends('layouts.master')

@section('title', 'Workers')

@section('content')

    <div class="col-lg-12 col-lg-offset-1">
        <h2><i class="fa fa-user"></i> Workers
            <a href="{{ route('workers.create') }}" class="btn btn-success pull-right">Add Worker</a></h2>
        <hr>
        <div class="table-responsive">
            <table class="table table-bordered table-striped" id="workers">

                <thead>
                <tr>
                    <th>Name</th>
                    <th>Designation</th>
                    <th>Mobile</th>
                    <th>Operations</th>
                </tr>
                </thead>

                <tbody>
                @foreach ($workers as $worker)
                    <tr>

                        <td><a href="{{route('workers.show', $worker->id)}}">{{ $worker->name }}</a> </td>
                        <td>{{ $worker->designation }}</td>
                        <td>{{ $worker->phone}}</td>


                        <td>
                            <a href="{{ route('workers.edit', $worker->id) }}" class="btn-sm btn-info pull-left" style="margin-right: 3px;">Edit</a>

                            {!! Form::open(['method' => 'DELETE', 'route' => ['workers.destroy', $worker->id] ]) !!}
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
            $('#workers').DataTable();
        } );



    </script>


@endsection