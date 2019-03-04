<?php

namespace App\Http\Controllers;

use App\Patient;
use Illuminate\Http\Request;


class PatientController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $patients=Patient::all();
        return view('patients.index', compact('patients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('patients.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input=$request->all();
        try {
            $data=Patient::create($input);
            $bug=0;
        }
        catch (\Exception $e) {
            $bug=1;

            return $e;
        }
        if($bug==0){
            return redirect('/patients')->with('success', 'New Patient has been added');
        }
        else
        {
            return redirect()->back()->with('error', 'Something went wrong!')->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data=Patient::findOrFail($id);
        return view('patients.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data=Patient::findOrFail($id);


        $input=$request->all();

        try {
            $data->update($input);
            $bug=0;
        }
        catch(\Exception $e){
            $bug=$e->errorInfo[1];
        }
        if($bug==0){
            return redirect('/patients')->with('success', 'Information has been updated!');
        }
        else
        {
            return redirect()->back()->with('error', 'Something went wrong!')->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data=Patient::findOrFail($id);
        $data->delete();
        return redirect()->back()->with('info', 'Info has been Deleted!');
    }


    public function get_patient_data($phone){
        $data=Patient::where('phone', $phone)->first();
        return json_encode($data);
    }

}
