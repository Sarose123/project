<?php

namespace App\Http\Controllers;

use App\Sample;
use Illuminate\Http\Request;

class SampleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=Sample::all();
        return view('sample.show')->with('data',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sample.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data= new Sample;
        $data->title = $request->input('title');
        $data->description = $request->input('description');
        
            $filenameWithExt=$request->file('image')->getClientOriginalName();
            $filename=pathinfo($filenameWithExt,PATHINFO_FILENAME);
            $extension=$request->file('image')->getClientOriginalExtension();
            $files=$filename.'_'.time().'.'.$extension;
            $path=$request->file('image')->storeAs('public/images',$files);

        $data->image=$files;
        $data->save();
        return redirect('/dashsample');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sample  $sample
     * @return \Illuminate\Http\Response
     */
    public function show(Sample $sample)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sample  $sample
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Sample::findorFail($id);
        return view('sample.edit')->with('data',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sample  $sample
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $this->validate($request,[
            'title'=>'required',
            'description'=>'required',
            'image'=>'nullable',
        ]);
        if($request->hasFile('image')){
        $filenameWithExt=$request->file('image')->getClientOriginalName();
        $filename=pathinfo($filenameWithExt,PATHINFO_FILENAME);
        $extension=$request->file('image')->getClientOriginalExtension();
        $files=$filename.'_'.time().'.'.$extension;
        $path=$request->file('image')->storeAs('public/images',$files);
        }
        
        $data=Sample::findorFail($id);
        $data->title=$request->input('title');
        $data->description= $request->input('description');
        if($request->hasFile('image')){
            $store->image=$files;
        }
        $data->save();
        return redirect('/dashsample');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sample  $sample
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data=Sample::findorFail($id);
        $data->delete();
        return redirect('/dashsample');
    }
}
