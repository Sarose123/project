@extends('dashboard.layouts')
@section('dashboardcontent')
<h1 style="color:aqua">Samples</h1>
<table class="table table-striped">
    <thead>
        <th>ID</th>
        <th>Title</th>
        <th>Description</th>
        <th>Image</th>
    </thead>
@foreach($data as $d)
<tbody>
    <th>{{$d->id}}</th>
    <th>{{$d->title}}</th>
    <td>{{$d->description}}</td>
    <td><img src="{{url('/storage/images').'/'.$d->image}}" alt="" style="width:200px; height:200px;"></td>

    <td><a href="{{url('dashsample/'.$d->id.'/edit')}}"><button class="btn btn-primary">Edit</button></a>
    {!! Form::open(['action' => ['SampleController@destroy',$d->id]]) !!}
    {!! Form::hidden('_method','DELETE')!!}
    {!! Form::submit('Delete',['class'=>'btn btn-danger'])!!}
    {!! Form::close()!!}
    </td>
</tbody>
@endforeach
</table>
@endsection