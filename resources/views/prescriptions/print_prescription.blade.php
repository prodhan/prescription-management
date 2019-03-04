@extends('layouts.print_master')

@section('custom-css')
    <style>
        .main{
            width: 960px;
            margin: 0 auto;
            height: 1350px;
            background-image: url({{asset('files/pad.jpg')}});
            background-size: cover;
        }
        .dr_name{
            height: 180px;
        }
        .patient{
            margin-top: 10px;
            height: 40px;
            line-height: 40px;
            font-size: 20px;
            font-weight: bold;
        }
        .prescribe{
           margin-top: 65px;

        }


    </style>
@endsection

@php
$medi=$data->p_medicines;
$first=str_replace('","', '', $medi);
$medicine=str_replace('"', '', $first);
@endphp

@section('main-content')
    <div class="main">
        <div class="row dr_name">
            <div class="col-md-12"></div>
        </div>

        <div class="row patient">

            <div class="col-md-5 offset-2">{{$data->name}}</div>
            <div class="col-md-1 offset-1">{{$data->age}}</div>
            <div class="col-md-2 offset-1">{{$data->date}}</div>

        </div>

        <div class="row prescribe">
            <div class="col-md-4">

                <div class="row">
                    <div class="col-md-12">
                        <h4> <i class="icofont-stethoscope-alt"></i> Diseases</h4>
                        {!! $data->diseases !!}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <h4> <i class="icofont-medical-sign-alt"></i>  Tests</h4>
                        {!! $data->tests !!}
                    </div>
                </div>

                <h4> <i class="icofont-dna-alt-1"></i>  Investigations</h4>
                 <div class="row">
                    <div class="col-md-4 offset-1">Height </div>
                    <div class="col-md-2">:</div>
                    <div class="col-md-5"> {{$data->height}} </div>
                </div>
                 <div class="row">
                    <div class="col-md-4 offset-1">Wight </div>
                    <div class="col-md-2">:</div>
                    <div class="col-md-5"> {{$data->weight}} </div>
                </div>
                 <div class="row">
                    <div class="col-md-4 offset-1">BP </div>
                    <div class="col-md-2">:</div>
                    <div class="col-md-5"> {{$data->b_pressure}} </div>
                </div>

            </div>


            <div class="col-md-8">
                <table class="table">
                   <thead>
                     <tr>
                       <th>Name of Medicine</th>
                       <th>Dose</th>
                       <th>Note</th>
                     </tr>
                   </thead>
                   <tbody>
                        {!! $medicine !!}

                   </tbody>
                 </table>
                <br>
                <hr>
                <br>

                <h4>Advices</h4>
                {!! $data->advices !!}
                <p><b>Not to eat: </b> {{$data->food}}</p>
                <h4>Next Appointment {{date('d-M-Y, l', strtotime($data->follow_up))}}</h4>

            </div>
        </div>

    </div>

    {{--@javascript('key', 'value')--}}

    {{--<script>--}}
        {{--var data=@javascript--}}
        {{--var medicines=[++];--}}
        {{--medicines.push('{{$data->p_medicine}}');--}}
        {{--medicines.toString();--}}
        {{--alert(medicines);--}}
        {{--document.getElementById("medi").innerHTML = medicines;--}}
    {{--</script>--}}

@endsection


