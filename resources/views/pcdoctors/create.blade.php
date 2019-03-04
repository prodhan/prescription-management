@extends('layouts.master')

@section('title', 'Add PC Doctor')

@section('content')

    <div class='col-lg-8 col-lg-offset-4'>

        <h2><i class='fa fa-user-md'></i> Add PC Doctor
            <a href="{{ url()->previous() }}" class="btn btn-light pull-right">Back</a></h2>
        <hr>

        {!! Form::open(array('route'=> 'pcdoctors.store', 'class'=>'form-horizontal', 'files'=>true)) !!}

        <div class="row form-group">
            <div class="col-md-4">{{ Form::label('name', 'Name *') }}</div>
            <div class="col-md-8"> {{ Form::text('name', '', array('class' => 'form-control', 'required')) }}</div>
        </div>

        <div class="row form-group">
            <div class="col-md-4">{{ Form::label('designation', 'Designation *') }}</div>
            <div class="col-md-8"> {{ Form::text('designation', '', array('class' => 'form-control')) }}</div>
        </div>


        <div class="row form-group">
            <div class="col-md-4">{{ Form::label('phone', 'Mobile No *') }}</div>
            <div class="col-md-8"> {{ Form::text('phone', '', array('class' => 'form-control',  'required')) }}</div>
        </div>


        <div class="row form-group">
            <div class="col-md-4">{{ Form::label('sex', 'Gender') }}</div>
            <div class="col-md-8"> {{ Form::select('sex',[''=>'Select','Male'=>'Male', 'Female'=>'Female'],null, ['class' => 'form-control',  'required']) }}</div>
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
            <div class="col-md-4">{{ Form::label('org_name', 'Organization Name') }}</div>
            <div class="col-md-8"> {{ Form::textarea('org_name', '', array('class' => 'form-control')) }}</div>
        </div>
        <div class="row form-group">
            <div class="col-md-4">{{ Form::label('address', 'Address') }}</div>
            <div class="col-md-8"> {{ Form::textarea('address', '', array('class' => 'form-control')) }}</div>
        </div>

        <div class="row form-group">
            <div class="col-md-4">{{ Form::label('email', 'E-mail') }}</div>
            <div class="col-md-8"> {{ Form::email('email', '', array('class' => 'form-control')) }}</div>
        </div>


        <div class="row form-group">
            <div class="col-md-4">{{ Form::label('nid', 'National ID') }}</div>
            <div class="col-md-8"> {{ Form::number('nid', '', array('class' => 'form-control')) }}</div>
        </div>

        <div class="row form-group">
            <div class="col-md-4">{{ Form::label('photo', 'Photo') }}</div>
            <div class="col-md-8">
                <span class="btn btn-default btn-file">{{ Form::file('photo', array('class'=>'btn btn-default btn-file')) }}

                @if($errors->has('photo'))
                    <span class="help-block" style="display:block">
          <strong>{{ $errors->first('photo') }}</strong>
                   </span>
                @endif
            </div>
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