@extends('layout')

@section('content')


<h1>{{$Headings}}</h1>

@if (count($listings) !== 0 )
@foreach ($listings as $listing)
    <a href="listings/{{$listing['id']}}">{{$listing['title']}}></a>
    <p>{{$listing['description']}}</p>

@endforeach
    
@else
<h2>No List Found</h2>
@endif

@endsection
