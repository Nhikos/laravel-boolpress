@extends('layouts.app')

@section('content')
<div class="container">
    <h1>pagina create</h1>
    <form action="{{route('admin.posts.update', $post)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
          <label for="title" class="form-label">Titolo</label>
          <input type="text" class="form-control" id="title" name="title" placeholder="Inserisci il titolo" value="{{old('title', $post->title)}}">
          @error('title')
              <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </div>
        <div class="form-group">
          <label for="author" class="form-label">Autore</label>
          <input type="text" class="form-control" id="author" name="author" placeholder="Inserisci l'autore" value="{{old('author', $post->author)}}">
          @error('author')
              <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </div>
        <div class="mb-3">
          <label for="category" class="form-label">Categoria:</label>
          <select class="form-control" name="category_id" id="category">
            <option value="">Seleziona una categoria</option>
            @foreach ($categories as $category)
            <option value="{{$category->id}}"{{old('category_id', $post->category_id) == $category->id?'selected':''}} >{{$category->name}}</option>
            @endforeach
          </select>
          @error('category_id')
              <div class="alert alert-danger mt-1">{{ $message }}</div>
          @enderror
        </div>
        <div class="mb-3">
          <label class="form-label mb-2">Tags:</label>
          <div class="form-check form-check-inline">
            @foreach ($tags as $tag)
              <input class="form-check-input" type="checkbox" id="tags" value={{$tag->id}} name="tags_id[]">
              <label class="form-check-label mr-3" for="tags">{{$tag->name}}</label>   
            @endforeach
          </div>
        <div class="mb-3">
            <textarea class="form-control" placeholder="Inserisci il contenuto" id="content" name="content" rows="10">{{old('content', $post->content)}}</textarea>
            @error('content')
              <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
</div> 
@endsection