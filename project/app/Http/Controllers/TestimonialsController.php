<?php

namespace App\Http\Controllers;

use App\testimonials;
use Illuminate\Http\Request;

class TestimonialsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data= Testimonials::all();
        return view('testimonials.show')->with('data',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('testimonials.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $store= new Testimonials;
        $store->name = $request->input('name');
        $store->description = $request->input('description');
        
            $filenameWithExt=$request->file('image')->getClientOriginalName();
            $filename=pathinfo($filenameWithExt,PATHINFO_FILENAME);
            $extension=$request->file('image')->getClientOriginalExtension();
            $fileNameToStore=$filename.'_'.time().'.'.$extension;
            $path=$request->file('image')->storeAs('public/images',$fileNameToStore);
       
        $store->image=$fileNameToStore;
        $store->save();
        return redirect('\testimonials');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\testimonials  $testimonials
     * @return \Illuminate\Http\Response
     */
    public function show(testimonials $testimonials)
    {
      
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\testimonials  $testimonials
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Testimonials::findorFail($id);
        return view('testimonials.edit')->with('data',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\testimonials  $testimonials
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name'=>'required',
            'description'=>'required',
        ]);
        $filenameWithExt=$request->file('image')->getClientOriginalName();
        $filename=pathinfo($filenameWithExt,PATHINFO_FILENAME);
        $extension=$request->file('image')->getClientOriginalExtension();
        $fileNameToStore=$filename.'_'.time().'.'.$extension;
        $path=$request->file('image')->storeAs('public/images',$fileNameToStore);
        
        $data->image=$fileNameToStore;
        $data=Testimonials::findorFail($id);
        $data->name=$request->input('name');
        $data->description= $request->input('description');
        $data->save();
        return redirect('/testimonials');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\testimonials  $testimonials
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data= Testimonials::findorFail($id);
        $data->delete();
        return redirect('/testimonials');   
    }
}
