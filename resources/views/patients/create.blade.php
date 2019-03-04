@extends('layouts.master')

@section('title', 'Add Patient')

@section('content')

    <div class='col-lg-8 col-lg-offset-4'>

        <h2><i class='fa fa-user-md'></i> Add Patients
            <a href="{{ url()->previous() }}" class="btn btn-light pull-right">Back</a></h2>
        <hr>

        {!! Form::open(array('route'=> 'patients.store', 'class'=>'form-horizontal', 'files'=>true)) !!}

        <div class="row form-group">
            <div class="col-md-4">{{ Form::label('name', 'Name *') }}</div>
            <div class="col-md-8"> {{ Form::text('name', '', array('class' => 'form-control', 'required')) }}</div>
        </div>

        <div class="row form-group">
            <div class="col-md-4">{{ Form::label('phone', 'Mobile No *') }}</div>
            <div class="col-md-8"> {{ Form::text('phone', '', array('class' => 'form-control', 'required')) }}</div>
        </div>

        <div class="row form-group">
            <div class="col-md-4">{{ Form::label('address', 'Address') }}</div>
            <div class="col-md-8"> {{ Form::text('address', '', array('class' => 'form-control')) }}</div>
        </div>

        <div class="row form-group">
            <div class="col-md-4">{{ Form::label('age', 'Age*') }}</div>
            <div class="col-md-8"> {{ Form::text('age', '', array('class' => 'form-control',  'required')) }}</div>
        </div>


        <div class="row form-group">
            <div class="col-md-4">{{ Form::label('gender', 'Gender') }}</div>
            <div class="col-md-8"> {{ Form::select('gender',[''=>'Select','Male'=>'Male', 'Female'=>'Female'],null, ['class' => 'form-control',  'required']) }}</div>
        </div>

        <div class="row form-group">
            <div class="col-md-4">{{ Form::label('blood_group', 'Blood Group') }}</div>
            <div class="col-md-8"> {{ Form::select('blood_group',[
            ''=>'Select Blood Group',
            'A+'=>'A+',
            'A-'=>'A-',
            'B+'=>'B+',
            'B-'=>'B-',
            'O+'=>'O+',
            'O-'=>'O-',
            'AB+'=>'AB+',
            'AB-'=>'AB-',

            ],null, ['class' => 'form-control']) }}</div>
        </div>

        <div class="row form-group">
            <div class="col-md-4">{{ Form::label('refer_type', 'Refer Type') }}</div>
            <div class="col-md-8"> {{ Form::select('refer_type',[
            ''=>'Self',
            'pc'=>'PC Doctor',
            'w'=>'Worker',
            'c'=>'Card',
            's'=>'Share Holder',
            ],null, ['class' => 'form-control']) }}</div>
        </div>



        <div class="row form-group">
            <div class="col-md-4">{{ Form::label('refer_by', 'Refer By') }}</div>
            <div class="col-md-8"> {{ Form::text('refer_by', '', array('class' => 'form-control', 'list'=>'referer')) }}</div>
        </div>

        <datalist id="referer">
            <option value="hello">
        </datalist>

        <div class="row form-group">
            <div class="col-md-4">{{ Form::label('relation_referer', 'Relation with Referer') }}</div>
            <div class="col-md-8"> {{ Form::text('relation_referer', '', array('class' => 'form-control')) }}</div>
        </div>


        <div class="row form-group">
            <div class="col-md-4"></div>
            <div class="col-md-8">
                {{ Form::reset('Clear', array('class'=> 'btn btn-warning')) }}
                {{ Form::submit('Add', array('class' => 'btn btn-primary')) }}</div>
        </div>

        {!! Form::close() !!}

    </div>

@endsection

@section('custom-js')


    <script>
        $(document).ready(function() {
            $('#students').DataTable();

            //Sectios

            $('select[name="refer_type"]').on('change', function () {
                var refer_type = $(this).val();
                if (refer_type) {
                    $.ajax({
                        url: "{!! url('getreferer') !!}" + "/" + refer_type,
                        type: "GET",
                        dataType: "json",
                        beforeSend: function () {

                        },

                        success: function (data) {

                            $('datalist[id="referer"]').empty();

                            $.each(data, function (key, value) {

                                $('datalist[id="referer"]').append('<option value="' + value + ' #'+ key +'">');

                            });
                        },
                        complete: function () {

                        }
                    });
                } else {
                    $('datalist[id="referer"]').empty();
                }

            });


        });



    </script>


@endsection