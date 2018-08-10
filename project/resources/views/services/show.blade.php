@extends('dashboard.layouts')
@section('dashboardcontent')

<h1>Services</h1>
    <table class="table table-stripped">
        <tr>
            <th>Title</th>
            <th>Description</th>
            <th>Number of Articles</th>
            <th>Number of Words</th>
            <th>Type of Article</th>
        </tr>
    
@foreach($data as $d)
    <tr>
    <td>{{$d->title}}</td>
    <td>{{$d->description}}</td>
    <td>{{$d->numberofarticle}}</td>
    <td>{{$d->numberofwords}}</td>
    <td>{{$d->type}}</td>
    </tr>

@endforeach
</table>
@endsection