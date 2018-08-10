<?php

namespace App\Http\Controllers;

use App\blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=Blog::all();
        return view('blog.show')->with('data',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blog.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data= new Blog;
        $data->title = $request->input('title');
        $data->description = $request->input('description');
        
            $filenameWithExt=$request->file('image')->getClientOriginalName();
            $filename=pathinfo($filenameWithExt,PATHINFO_FILENAME);
            $extension=$request->file('image')->getClientOriginalExtension();
            $files=$filename.'_'.time().'.'.$extension;
            $path=$request->file('image')->storeAs('public/images',$files);

        $data->image=$files;
        $data->save();
        return redirect('/blogs');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Blog::findorFail($id);
        return view('blog.edit')->with('data',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
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
        
        $data=Blog::findorFail($id);
        $data->title=$request->input('title');
        $data->description= $request->input('description');
        if($request->hasFile('image')){
            $data->image=$files;
        }
        $data->save();
        return redirect('/blogs');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Blog::findorFail($id);
        $data->delete();
        return redirect('/blogs');
    }
}
