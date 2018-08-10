@extends('main')
@section('content')
<div class="container ">
@if(isset($details))

@foreach($details as $dat)
<p style="padding-top:100px;">The search Results of<b> {{$query}} </b>are:</p>
<div class="jumbotron">
<h2>{{$dat->title}}</h2> 
<p>{{$dat->description}}</p> 
<button class="btn btn-primary" >Buy</button>
</div> 
@endforeach
 
@endif
</div>
@endsection