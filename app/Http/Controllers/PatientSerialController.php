<?php

namespace App\Http\Controllers;

use App\Doctor;
use App\Patient;
use App\PatientSerial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class PatientSerialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $serials=PatientSerial::where('date', now()->toDateString())->get();
        return view('serials.index', compact('serials'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $doctors=Doctor::pluck('name', 'id');
        return view('serials.create', compact('doctors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


//        return $input['serial'];


        $id=Input::get('id');
        if($id==0){
            $patient['name']=Input::get('name');
            $patient['phone']=Input::get('phone');
            $patient['address']=Input::get('address');
            $patient['age']=Input::get('age');
            $patient['gender']=Input::get('gender');
            $patient['blood_group']=Input::get('blood_group');
            $patient['refer_type']=Input::get('refer_type');
            $patient['refer_by']=Input::get('refer_by');
            $patient['relation_referer']=Input::get('relation_referer');

            $data=Patient::create($patient);

            $input['patient_id']=$data->id;
            $input['serial']=get_serial(Input::get('date'));
            $input['name']=$data->name;
            $input['age']=$data->age;
            $input['gender']=$data->gender;
            $input['dr_name']=Input::get('dr_name');
            $input['date']=Input::get('date');
            $input['phone']=$data->phone;
            $input['time']=Input::get('time');
            $input['room_no']=Input::get('room');
            $input['added_by']=Auth::user()->id;
            $input['status']=0;

            $appointment=PatientSerial::create($input);

        }

        elseif ($id>0){
            $data=Patient::findOrFail($id);
            $input['patient_id']=$data->id;
            $input['serial']=get_serial(Input::get('date'));
            $input['name']=$data->name;
            $input['age']=$data->age;
            $input['gender']=$data->gender;
            $input['dr_name']=Input::get('dr_name');
            $input['date']=Input::get('date');
            $input['phone']=$data->phone;
            $input['time']=Input::get('time');
            $input['room_no']=Input::get('room');
            $input['added_by']=Auth::user()->id;
            $input['status']=0;

            $appointment=PatientSerial::create($input);

        }
        $msg="Dear ".$input['name'].", Your Serial No #".$appointment->serial.". of ".get_doctor($input['dr_name'])." --SHEFA";

        send_sms($input['phone'], $msg);
        $data['serial']=$appointment->serial;
        $data['name']=$appointment->name;
        $data['id']=$appointment->id;
        $data['dr_name']=get_doctor($appointment->dr_name);


        return view('serials.print_slip', compact('data'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PatientSerial  $patientSerial
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data=PatientSerial::findOrFail($id);
        return view('serials.print_slip', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PatientSerial  $patientSerial
     * @return \Illuminate\Http\Response
     */
    public function edit(PatientSerial $patientSerial)
    {
        return abort('404');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PatientSerial  $patientSerial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PatientSerial $patientSerial)
    {
        return abort('404');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PatientSerial  $patientSerial
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data=PatientSerial::findOrFail($id);
        $data->delete();
        return redirect()->back()->with('info', 'Info has been Deleted!');
    }

    public function get_serial_data($phone){
        $data=PatientSerial::where('phone', $phone)->orWhere('id', $phone)->first();
        return json_encode($data);
    }
}
