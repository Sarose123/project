@extends('dashboard.layouts')
@section('dashboardcontent')
<h1>Add Testimonials</h1>
{!! Form::open(['action'=>'TestimonialsController@store','enctype'=>'multipart/form-data'])!!}
    <div class="form-group">
        {{ Form::label('name','Name')}}
        {{ Form::text('name','',['class'=> 'form-control'])}}
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