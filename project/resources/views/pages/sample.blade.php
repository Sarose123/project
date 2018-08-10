@extends('main')
@section('content')
<div class="container">
    <h2>General Articles</h2>
    @foreach($data as $d)
    <div class="jumbotron">
        <div class="row">
            <div class="col-md-3">
            <img src="{{ url('/storage/images')}}/{{$d->image}}" alt="pic" class="img-responsive img-thumbnail" width="250px;"  height="250px;"align="right" vspace="5px" hspace="5px">
            </div>
            <div class="col-md-9"><p>{{$d->description}}</p></div>
            <div class="w-100"></div>
            <div class="col-md-3"><h2>{{$d->title}}</h2></div>
        </div>
    </div>
    @endforeach
    
</div>
@endsection