@extends('layouts.app')

@section('content')
<div class="container">
    <h2>{{$post->title}}</h2>
    <small>{{$post->slug}}</small>
    <p>{{$post->content}}</p>
</div>   
@endsection