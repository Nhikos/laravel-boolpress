@extends('layouts.app')

@section('content')
<div class="container">
    @if (session('created'))
    <div class="alert alert-success">Il post {{session('created')}} è stato creato con successo</div>
    @endif

    @if (session('deleted'))
    <div class="alert alert-success">Il post {{session('deleted')}} è stato cancellato con successo</div>
    @endif

    @if (session('update'))
    <div class="alert alert-success">Il post {{session('updated')}} è stato modificato con successo</div>
    @endif

    <a class="btn btn-primary" href="{{route('admin.posts.create')}}">Crea un nuovo post</a>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Author</th>
            <th scope="col">Categoria</th>
            <th scope="col">Content</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
                <tr>
                    <th scope="row">{{$post->id}}</th>
                    <td>{{substr($post->title,0,50).'...'}}</td>
                    <td>{{$post->author}}</td>
                    <td>
                        @if ($post->category)
                            {{$post->category->name}}
                        @else
                            Nessuna categoria.
                        @endif
                    </td>
                    <td>{{substr($post->content,0,50).'...'}}</td>
                    <td><a href="{{route('admin.posts.show', $post)}}" class="btn btn-success">Mostra</a></td>
                    <td><a class="btn btn-warning" href="{{route('admin.posts.edit', $post)}}" >Modifica</a></td>
                    {{-- <td><a href="" class="btn btn-danger">Cancella</a></td> --}}
                    <td>
                        <form action="{{route('admin.posts.destroy', $post)}}" method="POST" onsubmit="return confirm('Sei sicuro di voler eliminare il post?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Cancella</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
    {{$posts->links()}}
@endsection