@extends('layouts.app')

@section('content')
<div class="container">
    <h1>pagina create</h1>
    <form action="{{route('admin.posts.store')}}" method="POST">
        @csrf
        @method('POST')
        <div class="form-group">
          <label for="title" class="form-label">Titolo</label>
          <input type="text" class="form-control" id="title" name="title" placeholder="Inserisci il titolo" value="{{old('title')}}">
          @error('title')
              <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </div>
        <div class="form-group">
          <label for="author" class="form-label">Autore</label>
          <input type="text" class="form-control" id="author" name="author" placeholder="Inserisci l'autore" value="{{old('author')}}">
          @error('author')
              <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </div>
        <div class="mb-3">
            <textarea class="form-control" placeholder="Inserisci il contenuto" id="content" name="content" rows="10">{{old('content')}}</textarea>
            @error('content')
              <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
</div> 
@endsection