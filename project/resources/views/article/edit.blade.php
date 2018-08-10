@extends('dashboard.layouts')
@section('dashboardcontent')
<h1>Edit Articles</h1>
{!! Form::open(['action'=>['ArticleController@update',$data->id],'enctype'=>'multipart/form-data'])!!}
{!! Form::hidden('_method','PUT')!!}
    <div class="form-group">
        {{ Form::label('title','Title')}}
        {{ Form::text('title',$data->title,['class'=> 'form-control'])}}
    </div>
    <div class="form-group">
        {{ Form::label('description','Description')}}
        {{ Form::text('description',$data->description,['class'=>'form-control'])}}
    </div>
    <div class="form-group">
        {!!Form::submit('Submit',['class'=>'btn btn-primary'])!!}
        </div>
{!! Form::close()!!}
@endsection