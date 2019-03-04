@extends('layouts.master')

@section('title', 'Add Serials')

@section('content')

    <div class='col-lg-12'>

        <h2><i class='fa fa-user-md'></i> Add Patients and Serial
            <a href="{{ url()->previous() }}" class="btn btn-light pull-right">Back</a></h2>
        <hr>

        {!! Form::open(array('route'=> 'serials.store', 'class'=>'form-horizontal', 'files'=>true, 'autocomplete'=>'off')) !!}

        <div class="row form-group">
            <div class="col-md-2">{{ Form::label('name', 'Name *') }}</div>
            <div class="col-md-4">{{ Form::text('name', '', array('class' => 'form-control', 'required')) }}</div>
            <div class="col-md-2">{{ Form::label('phone', 'Mobile No *') }}</div>
            <div class="col-md-4">{{ Form::text('phone', '', array('class' => 'form-control'  ,'required')) }}</div>
        </div>

        <div class="row form-group">
            <div class="col-md-2">{{ Form::label('address', 'Address') }}</div>
            <div class="col-md-4">{{ Form::text('address', '', array('class' => 'form-control')) }}</div>
            <div class="col-md-2">{{ Form::label('age', 'Age*') }}</div>
            <div class="col-md-2">{{ Form::text('age', '', array('class' => 'form-control',  'required')) }}</div>
            <div class="col-md-2"><p class="btn btn-primary pull-right" name="search" id="search">Search</p></div>
        </div>


        <div class="row form-group">
            <div class="col-md-2">{{ Form::label('gender', 'Gender*') }}</div>
            <div class="col-md-4">{{ Form::select('gender',[''=>'Select','Male'=>'Male', 'Female'=>'Female'],null, ['class' => 'form-control',  'required']) }}</div>
            <div class="col-md-2">{{ Form::label('blood_group', 'Blood Group') }}</div>
            <div class="col-md-4">
                {{ Form::select('blood_group',[
            ''=>'Select Blood Group',
            'A+'=>'A+',
            'A-'=>'A-',
            'B+'=>'B+',
            'B-'=>'B-',
            'O+'=>'O+',
            'O-'=>'O-',
            'AB+'=>'AB+',
            'AB-'=>'AB-',

            ],null, ['class' => 'form-control']) }}
            </div>
        </div>



        <div class="row form-group">
            <div class="col-md-2">{{ Form::label('refer_type', 'Refer Type') }}</div>
            <div class="col-md-4">
                {{ Form::select('refer_type',[
            ''=>'Self',
            'pc'=>'PC Doctor',
            'w'=>'Worker',
            'c'=>'Card',
            's'=>'Share Holder',
            ],null, ['class' => 'form-control']) }}
            </div>
            <div class="col-md-2">{{ Form::label('refer_type', 'Refer By') }}</div>
            <div class="col-md-4">{{ Form::text('refer_by', '', array('class' => 'form-control', 'list'=>'referer')) }}
                <datalist id="referer">
                    <option value="Select Referer">
                </datalist>

            </div>
        </div>


        <div class="row form-group">
            <div class="col-md-2">{{ Form::label('relation_referer', 'Relation with Referer') }}</div>
            <div class="col-md-4"> {{ Form::text('relation_referer', '', array('class' => 'form-control')) }}</div>
            <div class="col-md-6"><p id="result">Please search first by Mobile No</p></div>
            {{ Form::hidden('id', 0, array('id' => 'id')) }}
        </div>

        <hr>



        <div class="row form-group">
            <div class="col-md-2">{{ Form::label('dr_name', 'Name of Doctor') }}</div>
            <div class="col-md-5">{{ Form::select('dr_name',$doctors,null, ['class' => 'form-control',  'required']) }}</div>
            <div class="col-md-2">{{ Form::label('room', 'Room No') }}</div>
            <div class="col-md-3">{{ Form::text('room', '', array('class' => 'form-control')) }}</div>
        </div>

        <div class="row form-group">
            <div class="col-md-2">{{ Form::label('date', 'Date') }}</div>
            <div class="col-md-5">{{ Form::date('date', now()->toDateString(), array('class' => 'form-control', 'required')) }}</div>
            <div class="col-md-2">{{ Form::label('time', 'Time') }}</div>
            <div class="col-md-3">{{ Form::time('time', now()->toTimeString(), array('class' => 'form-control')) }}</div>
        </div>



        <div class="row form-group">
            <div class="col-md-4"></div>
            <div class="col-md-8">
                {{ Form::reset('Clear', array('class'=> 'btn btn-warning')) }}
                {{ Form::submit('Make an Appointment', array('class' => 'btn btn-primary')) }}</div>
        </div>

        {!! Form::close() !!}

    </div>

@endsection

@section('custom-js')


    <script>
        $(document).ready(function() {
            $('#students').DataTable();


            $('#search').click(function () {
                var phone = $('#phone').val();
                if(phone){
                    $.ajax({
                        url: "{!! url('getpatient') !!}" + "/" + phone,
                        type: "GET",
                        dataType: "json",
                        beforeSend: function () {

                        },

                        success: function (data) {
                            if(data==null) {

                               $('#result').text("No search result found!");
                               $('#result').css("color", "red");
                            }
                            else
                            {
                                $('#result').text("Yes! I've found data");
                                $('#result').css("color", "green");
                                $('#name').val(data.name);
                                $('#address').val(data.address);
                                $('#age').val(data.age);
                                $('#gender').val(data.gender);
                                $('#blood_group').val(data.blood_group);
                                $('#refer_type').val(data.refer_type);
                                $('#refer_by').val(data.refer_by);
                                $('#relation_referer').val(data.relation_referer);
                                $('#id').val(data.id);
                            }

                        },

                        complete: function () {

                        }




                    });
                }

                else
                    alert("Please Enter Mobile No");


            });

            //Referer

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