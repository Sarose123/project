@extends('dashboard.layouts')
@section('dashboardcontent')
<h1 style="color:aqua">Blog</h1>
<table class="table table-striped">
        <thead class="thead-dark">
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Title</th>
            <th scope="col">Description</th>
            <th scope="col">Image</th>
          </tr>
        </thead>
@foreach($data as $d)
        <tbody>
          <tr>
            <td>{{$d->id}}</td>
            <td>{{$d->title}}</td>
            <td>{{$d->description}}</td>
            <td><img src="{{url('/storage/images').'/'.$d->image}}" alt="image" style="width:200px; height:200px;"></td>
            @if(!Auth::guest())
            <td><a href="{{url('blogs/'.$d->id.'/edit')}}"><button class="btn btn-primary">Edit</button></a>
                {!! Form::open(['action'=> ['BlogController@destroy',$d->id]])!!}
                {!! Form::hidden('_method','DELETE')!!}
                {!! Form::submit('Delete',['class'=>'btn btn-danger'])!!}
                {!! Form::close()!!}</td>
            @endif
          </tr>
        </tbody>
      
@endforeach
</table>
@endsection