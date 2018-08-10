@extends('dashboard.layouts')
@section('dashboardcontent')
<h1>FAQ</h1>
<button class="btn btn-primary"><a href="{{ url('/faq/create')}}" style="color:white">Add FAQ</a></button>
<table class="table table-striped">
    <thead>
        <tr>
            <th>id</th>
            <th>Title</th>
            <th>description</th>
        </tr>
    </thead>
@foreach($data as $d)
    <tbody>
        <tr>
            <td>{{$d->id}}</td>
            <td>{{$d->title}}</td>
            <td><p>{{$d->description}}</p></td>
            <td><a href="{{ url('/faq/'.$d->id.'/edit')}}"><button class="btn btn-primary">Edit</button></a>
            {!! Form::open(['action' => ['FaqController@destroy',$d->id]]) !!}
                        {!! Form::hidden('_method','DELETE')!!}
                        {!! Form::submit('Delete',['class'=>'btn btn-danger'])!!}
            {!! Form::close()!!}
            </td>
        </tr>
    </tbody>
@endforeach
</table>
@endsection
