<?php

namespace App\Http\Controllers;

use App\faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data= Faq::all();
        return view('faq.show')->with('data',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('faq.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $store = new faq;
        $store->title= $request->input('title');
        $store->description= $request->input('description');
        $store->save();
        return redirect('\faq');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function show(faq $faq)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Faq::findorFail($id);
        return view('faq.edit')->with('data',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $this->validate($request,[
            'title'=>'required',
            'description'=>'required',
        ]);
        $data = Faq::findorFail($id);
        $data->title= $request->input('title');
        $data->description= $request->input('description');
        $data->save();
        return redirect('/faq');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data=Faq::findorFail($id);
        $data->delete();
        return redirect('/faq')->withSuccess('Data Deleted.');
    }
}
