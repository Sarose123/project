@extends('dashboard.layouts')
@section('dashboardcontent')
<h1 style="color:aqua">Articles</h1>
<table class="table table-striped">
        <thead class="thead-dark">
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Title</th>
            <th scope="col">Description</th>
          </tr>
        </thead>
@foreach($data as $d)
        <tbody>
          <tr>
            <td>{{$d->id}}</td>
            <td>{{$d->title}}</td>
            <td>{{$d->description}}</td>
            <td><a href="{{url('dasharticle/'.$d->id.'/edit')}}"><button class="btn btn-primary">Edit</button></a>
                {!! Form::open(['action'=> ['ArticleController@destroy',$d->id]])!!}
                {!! Form::hidden('_method','DELETE')!!}
                {!! Form::submit('Delete',['class'=>'btn btn-danger'])!!}
                {!! Form::close()!!}</td>
          
          </tr>
        </tbody>
      
@endforeach
</table>
@endsection