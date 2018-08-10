<?php

namespace App\Http\Controllers;

use App\services;
use Illuminate\Http\Request;


class ServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Services::all();
        return view('services.show')->with('data',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $store= new Services;
        $store->title = $request->input('title');
        $store->description = $request->input('description');
        $store->numberofarticle = $request->input('numberofarticle');
        $store->numberofwords = $request->input('numberofwords');
        $store->type = $request->input('type');
        // if($request->hasFile('image'))
        // {
        //     $filenameWithExt=$request->file('image')->getClientOriginalName();
        //     $filename=pathinfo($filenameWithExt,PATHINFO_FILENAME);
        //     $extension=$request->file('image')->getClientOriginalExtension();
        //     $files=$filename.'_'.time().'.'.$extension;
        //     $path=$request->file('image')->storeAs('public/images',$files);
        // }
        // $store->image=$files;
        // if($request->hasFile('image')){
        //     $store->image=$files;
        // }
        $store->save();
        return redirect('/');
        
       
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\services  $services
     * @return \Illuminate\Http\Response
     */
    public function show(services $services)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\services  $services
     * @return \Illuminate\Http\Response
     */
    public function edit(services $services)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\services  $services
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, services $services)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\services  $services
     * @return \Illuminate\Http\Response
     */
    public function destroy(services $services)
    {
        $data=Services::findorFail($id);
        $data->delete();
        return redirect('/services')->withSuccess('Data Deleted.');
    }
}
