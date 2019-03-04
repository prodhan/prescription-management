<?php

namespace App\Http\Controllers;

use App\Doctor;
use Illuminate\Support\Facades\Input;
use Validator;
use Illuminate\Http\Request;

class DoctorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $doctors=Doctor::all();
        return view('doctors.index', compact('doctors'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('doctors.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator=Validator::make($request->all(),[
            'photo'=> 'mimes:jpeg,jpg,png,ico,JPG',

        ]);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $input=$request->all();
        if ($request->hasFile('photo')) {
            $file=$request->file('photo');
            $input['photo']=image_upload($file);
        }
        try {
            $data=Doctor::create($input);
            $bug=0;
        }
        catch (\Exception $e) {
            $bug=$e->errorInfo[1];
        }
        if($bug==0){
            return redirect('/doctors')->with('success', 'New Doctor has been added');
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
        $data=Doctor::findOrFail($id);
        return view('doctors.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data=Doctor::findOrFail($id);
        return view('doctors.edit', compact('data'));
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
        $data=Doctor::findOrFail($id);

        $validator=Validator::make($request->all(),[
            'photo'=> 'mimes:jpeg,bmp,png,jpg'
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $input=$request->all();
        if($request->hasFile('photo')){
            $file=$request->file('photo');
            $input['photo']=image_upload($file);
            $file_path='uploads'.$data['photo'];
            if($data['photo']!=null and file_exists($file_path)){
                unlink($file_path);
            }
        }
        try {
            $data->update($input);
            $bug=0;
        }
        catch(\Exception $e){
            $bug=$e->errorInfo[1];
        }
        if($bug==0){
            return redirect('/doctors')->with('success', 'Information has been updated!');
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
        $data=Doctor::findOrFail($id);
        $data->delete();
        return redirect()->back()->with('info', 'Info has been Deleted!');
    }
}
