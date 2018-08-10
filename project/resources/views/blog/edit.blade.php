@extends('dashboard.layouts')
@section('dashboardcontent')
<h1>Edit Blogs</h1>
{!! Form::open(['action'=>['BlogController@update',$data->id],'enctype'=>'multipart/form-data'])!!}
    <div class="form-group">
        {{ Form::label('title','Title')}}
        {{ Form::text('title',$data->title,['class'=> 'form-control'])}}
    </div>
    <div class="form-group">    
        {{ Form::label('description','Description')}}
        {{ Form::text('description',$data->description,['class'=>'form-control'])}}
    </div>
    {!! Form::file('image') !!}
    <div class="form-group">
        {!!Form::submit('Submit',['class'=>'btn btn-primary'])!!}
        </div>
{!! Form::close()!!}
@endsection