@extends('layouts.app')
@section('content')



  <div class="container">
    <header class="text-center">
      <h1>Created new Post</h1>
    </header>
    <section id="form">

      <form method='POST' action="{{ route('admin.posts.store') }}">
        @csrf
        <div class=" form-group">
          <label for="title">Titile</label>
          <input type="text" class="form-control" id="title" name="title" placeholder="Write the title">
        </div>
        <div class="form-group">
          <label for="image">Url image</label>
          <input type="text" class="form-control" id="image" name='image' placeholder="write the URL of the image">
        </div>
        <div class="form-group">
          <label for="content">Content text</label>
          <textarea class="form-control" id="content" name='content' placeholder="Write the content" rows="5"></textarea>
        </div>
        <div class="d-flex justify-content-between">
          <button type="reset" class="btn btn-secondary">Reset</button>

          <button type="submit" class="btn btn-success">Save</button>
        </div>
      </form>


    </section>
  </div>

@endsection
