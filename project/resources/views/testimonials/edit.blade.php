@extends('dashboard.layouts')
@section('dashboardcontent')
<h1>this is edit page of Testimonials</h1>
{!! Form::open(['action'=>['TestimonialsController@update',$data->id],'enctype'=>'multipart/form-data'])!!}
    <div class="form-group">
        {{ Form::label('name','Name')}}
        {{ Form::text('name',$data->name,['class'=> 'form-control'])}}
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