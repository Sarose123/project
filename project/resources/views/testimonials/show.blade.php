@extends('dashboard.layouts')
@section('dashboardcontent')
<h1>This is testimonials</h1>
<button class="btn btn-primary"><a href="{{ url('/testimonials/create')}}" style="color:white">Add testimonials</a></button>
<table class="table">
    <thead>
        <th>ID</th>
        <th>Name</th>
        <th>Description</th>
        <th>Image</th>
    </thead>
@foreach($data as $d)
    <tbody>
        <tr>
            <td>{{$d->id}}</td>
            <td>{{$d->name}}</td>
            <td><p>{{$d->description}}</p></td>    
            <td><img src="{{url('/storage/images').'/'.$d->image}}" alt="" style="width:200px; height:200px"></td>
            <td><a href="{{ url('testimonials/'.$d->id.'/edit')}}"><button class="btn btn-primary">Edit</button></a>
            {!! Form::open(['action' => ['TestimonialsController@destroy',$d->id]]) !!}
            {!! Form::hidden('_method','DELETE')!!}
            {!! Form::submit('Delete',['class'=>'btn btn-danger'])!!}
            {!! Form::close()!!}
            </td>
        </tr>
    </tbody>
@endforeach
</table>
@endsection