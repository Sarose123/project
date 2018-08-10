@extends('main')
@section('content')
<h1>this is blog page</h1>
<div class="container">
    @foreach($data as $d)
    <div class="row">
        <div class="col-md-4">
            <div class="jumbotron">
             <img src="{{ url('/storage/images')}}/{{$d->image}}" alt="pic" class="img-responsive img-thumbnail" width="250px;"  height="250px;"align="right" vspace="5px" hspace="5px">
            <h2>{{$d->title}}</h2>
            <p>{{$d->description}}</p>
            </div>
        </div>
        
    </div>
    @endforeach
</div>
@endsection