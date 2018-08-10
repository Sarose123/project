@extends('dashboard.layouts')
@section('dashboardcontent')
<p>Add Article</p>
{!! Form::open(['action'=>'ArticleController@store'])!!}
    <div class="form-group">
    {!! Form::label('title','Title')!!}
    {!! Form::text('title','',['class'=>"form-control"])!!}
    </div>
    <div class="form-group">
        {!! Form::label('description','Description')!!}
        {!! Form::text('description','',['class'=>"form-control"])!!}
    </div>
    {!! Form::submit('submit',['class'=>"btn btn-primary"])!!}
{!! Form::close()!!}
@endsection