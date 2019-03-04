@extends('layouts.master')

@section('title', 'Make Prescription')


@section('content')

    <div class='col-md-12'>
        <div class="row">
            <div class="col-md-4"><h2><i class='icofont-prescription'></i> Add Prescription</h2></div>
            <div class="col-md-4">
                <div class="input-group">
                <input type="text" id="serial" class="form-control" placeholder="Enter Serial ID" autofocus>
                    <button id="search" class="btn btn-info" type="button">Search</button>
                </div>
            </div>
            <div class="col-md-4"><a href="{{ url()->previous() }}" class="btn btn-light pull-right">Back</a></div>
        </div>

        <hr>

        {!! Form::open(array('route'=> 'prescriptions.store', 'class'=>'form-horizontal', 'files'=>true, 'autocomplete'=>'off')) !!}


        <div class="row form-group">
            <div class="col-md-2">{{ Form::label('name', 'Name *') }}</div>
            <div class="col-md-4">{{ Form::text('name', '', array('class' => 'form-control', 'required')) }}</div>
            <div class="col-md-2">{{ Form::label('phone', 'Mobile No *') }}</div>
            <div class="col-md-4">{{ Form::text('phone', '', array('class' => 'form-control'  ,'required')) }}</div>
        </div>

        <div class="row form-group">
            <div class="col-md-2">{{ Form::label('gender', 'Gender*') }}</div>
            <div class="col-md-4">{{ Form::select('gender',[''=>'Select','Male'=>'Male', 'Female'=>'Female'],null, ['class' => 'form-control',  'required']) }}</div>
            <div class="col-md-2">{{ Form::label('age', 'Age*') }}</div>
            <div class="col-md-2">{{ Form::text('age', '', array('class' => 'form-control',  'required')) }}</div>
            <div class="col-md-2">{{ Form::number('fee', '', array('class' => 'form-control'  ,'required', 'placeholder'=>'Dr. Fee')) }}</div>

        </div>


        <div class="row form-group">
            <div class="col-md-2">{{ Form::label('dr_name', 'Name of Doctor') }}</div>
            <div class="col-md-4">{{ Form::select('dr_name',$doctors,null, ['class' => 'form-control',  'required']) }}</div>
            <div class="col-md-2">{{ Form::label('date', 'Date') }}</div>
            <div class="col-md-4">{{ Form::text('date', now()->toDateString(), array('class' => 'form-control')) }}</div>
        </div>
        {{ Form::hidden('patient_id', '') }}

    </div>
        <hr>


        <div class="row">
            <div class="col-md-4" style="border-right: 1px solid #000000">

                <div class="row form-group">
                    <div class="col-md-4">{{ Form::label('height', 'Height') }}</div>
                    <div class="col-md-8">{{ Form::text('height', '', array('class' => 'form-control', 'placeholder'=>'e.g 5.6 inc')) }}</div>
                </div>
                <div class="row form-group">
                    <div class="col-md-4">{{ Form::label('weight', 'Weight') }}</div>
                    <div class="col-md-8">{{ Form::text('weight', '', array('class' => 'form-control', 'placeholder'=>' e.g 60 kg')) }}</div>
                </div>
                <div class="row form-group">
                    <div class="col-md-4">{{ Form::label('b_pressure', 'B. Pressure') }}</div>
                    <div class="col-md-8">{{ Form::text('b_pressure', '', array('class' => 'form-control', 'placeholder'=>'e.g 80-120 ')) }}</div>
                </div>
                <div class="row form-group">
                    <div class="col-md-4">{{ Form::label('food', 'Problem To Eat') }}</div>
                    <div class="col-md-8">{{ Form::text('food', '', array('class' => 'form-control', 'placeholder'=>'')) }}</div>
                </div>
                <div class="row form-group">
                    <div class="col-md-4">{{ Form::label('follow_up', 'Next Appointment') }}</div>
                    <div class="col-md-8">{{ Form::date('follow_up', now()->addDay(15)->toDateString(), array('class' => 'form-control', 'placeholder'=>'')) }}</div>
                </div>
                <div class="row form-group">
                    <div class="col-md-4">{{ Form::label('d_name', 'Disease Name') }}</div>
                    <div class="col-md-6">{{ Form::text('disease', '', array('id'=>'disease','class' => 'form-control text-primary')) }}</div>
                    <div class="col-md-2"> <p name="add_disease" id="add_disease" class="btn btn-primary">+</p> </div>
                </div>

                <div class="row form-group">

                    <div class="col-md-12">
                        <h3><i class="icofont-stethoscope-alt"></i> Diseases</h3>
                        {{ Form::text('diseases', '', array('class' => 'form-control', 'id'=>'diseases')) }}
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col-md-4">{{ Form::label('test', 'Test Name') }}</div>
                    <div class="col-md-6">{{ Form::text('test', '', array('class' => 'form-control text-primary')) }}</div>
                    <div class="col-md-2"> <p name="add_test" id="add_test" class="btn btn-primary">+</p> </div>
                </div>


                <div class="row form-group">

                    <div class="col-md-12">
                        <h3><i class="icofont-"></i> Diagnosis</h3>
                        {{ Form::text('tests', '', array('class' => 'form-control', 'id'=>'tests')) }}
                    </div>
                </div>


            </div>


            <div class="col-md-8">
               <div class="row form-group">
                   <div class="col-md-2">Medicine</div>
                   <div class="col-md-4">{{ Form::text('medicine_type', '', array('class' => 'form-control','id'=>'medicine_type', 'list'=>'medicine-type' ,'placeholder'=>'Medicine Type')) }}</div>
                   <div class="col-md-6">{{ Form::text('medicine_name', '', array('class' => 'form-control','id'=>'medicine_name','placeholder'=>'Medicine Name')) }}</div>

               </div>

               <div class="row form-group">
                   <div class="col-md-2">Dose</div>
                   <div class="col-md-4">{{ Form::text('dose', '', array('class' => 'form-control', 'id'=>'dose',  'list'=>'dose-type','placeholder'=>'Dose Type')) }}</div>
                   <div class="col-md-4">{{ Form::text('note', '', array('class' => 'form-control', 'id'=>'note', 'placeholder'=>'Extra Note')) }}</div>
                   <div class="col-md-2"><p class="btn btn-primary pull-right" id="add_medicine">ADD</p></div>
               </div>


                <div class="row form-group">

                    <div class="col-md-12">
                        <h3><i class="icofont-prescription"></i> Prescription</h3>
                        <div class="table-responsive">

                        <table class="table table-bordered table-striped" id="medicineTable">
                           <thead>
                             <tr>
                               <th>X</th>
                               {{--<th>Type</th>--}}
                               <th>Medicine Name</th>
                               <th>Dose</th>
                               <th>Note</th>
                             </tr>
                           </thead>
                           <tbody>


                           </tbody>
                         </table>
                        </div>

                        <input type="text" name="p_medicines" id="pres" style="display: none">

                        <br>
                        <hr>

                        <div class="row form-group">
                            <div class="col-md-2">{{ Form::label('advice', 'Advice') }}</div>
                            <div class="col-md-10">{{ Form::text('advices', '', array('class' => 'form-control', 'id'=>'advices')) }}</div>
                        </div>

{{--                        {{ Form::text('medicines', '', array('class' => 'form-control', 'id'=>'medicines')) }}--}}
                    </div>



                <datalist id="medicine-type">
                    <option value="Tablet"></option>
                    <option value="Capsule"></option>
                    <option value="Syrup"></option>
                    <option value="Mixture"></option>
                    <option value="Solution"></option>
                    <option value="Cream"></option>
                    <option value="Suppository"></option>
                    <option value="Inhaler"></option>
                    <option value="Injection"></option>
                </datalist>

                <datalist id="dose-type">
                    <option value="1+1+1">1+1+1</option>
                    <option value="1+1+0">1+1+0</option>
                    <option value="1+0+1">1+0+1</option>
                    <option value="0+1+1">0+1+1</option>
                    <option value="1+0+0">1+0+0</option>
                    <option value="0+1+0">0+1+0</option>
                    <option value="0+0+1">0+0+1</option>
                </datalist>




                <div class="row form-group pull-right">
                    <div class="col-md-4 offset-4">
                        {{ Form::reset('Clear', array('class'=> 'btn btn-warning')) }}
                    </div>
                    <div class="col-md-4">

                        {{ Form::submit('Save Prescription', array('class' => 'btn btn-primary')) }}
                    </div>
                </div>


             </div>
            </div>
        </div>





@endsection

@section('custom-js')

    <script type="text/javascript" src="{{asset('admin/js/prescription.js')}}"></script>

    <script>
        var presa=[];
        var pres=$('#pres');

        $(document).ready(function() {
            $('#students').DataTable();


            $('#search').click(function () {
                var phone = $('#serial').val();
                if(phone){
                    $.ajax({
                        url: "{!! url('getserial') !!}" + "/" + phone,
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
                                $('#phone').val(data.phone);
                                $('#age').val(data.age);
                                $('#gender').val(data.gender);
                                $('#patient_id').val(data.name);
                                $('#dr_name').val(data.dr_name);
                                $('#date').val(data.date);
                            }

                        },

                        complete: function () {

                        }




                    });
                }

                else
                    alert("Please Enter Mobile No or Serial ID");


            });



        });

    </script>

@endsection