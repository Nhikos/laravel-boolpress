@extends('layouts.app')

@section('content')
<div class="container">
    <h2>{{$post->title}}</h2>
    <small>{{$post->slug}}</small>
    <p>{{$post->content}}</p>
    <div>
        <h4>Categoria</h4>
        <p>
            @if ($post->category)
                {{$post->category->name}}
            @else
                Nessuna categoria.
            @endif
        </p>
        <p>
            <h4>tags</h4>
            @if (count($post->tags) == 0)
            <div class="mb-4">Nessun tag</div>
            @else
            <ul>
                @foreach ($post->tags as $tag)
                    <li>{{$tag->name}}</li>
                @endforeach 
            </ul>
            @endif
        </p>
    </div>

</div>  
@endsection