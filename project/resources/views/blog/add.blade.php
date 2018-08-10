@extends('dashboard.layouts')
@section('dashboardcontent')
<h1>Add Blogs</h1>
{!! Form::open(['action'=>'BlogController@store','enctype'=>'multipart/form-data'])!!}
    <div class="form-group">
        {{ Form::label('title','Title')}}
        {{ Form::text('title','',['class'=> 'form-control'])}}
    </div>
    <div class="form-group">
        {{ Form::label('description','Description')}}
        {{ Form::text('description','',['class'=>'form-control'])}}
    </div>
    {!! Form::file('image') !!}
    <div class="form-group">
        {!!Form::submit('Submit',['class'=>'btn btn-primary'])!!}
        </div>
{!! Form::close()!!}
@endsection