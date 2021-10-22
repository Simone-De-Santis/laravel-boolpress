@extends('layouts.app')

@section('content')
  <div class="container">
    <h1>{{ $post->title }}</h1>
    <p>{{ $post->content }}</p>
    <address>creato il :{{ $post->getFormattedDate('created_at') }}</address>
    <address>
      ultima modifica il
      :{{ $post->getFormattedDate('updated_at') }}
    </address>
    <div class="d-flex justify-content-between">

      <form action="{{ route('admin.posts.destroy', $post->id) }}" method="POST" class='delete-button'>
        @csrf
        @method('DELETE')

        <button type="submit" class="btn btn-danger ">Delete</button>
      </form>
      <div>

        <a href="{{ route('admin.posts.edit', $post->id) }}" class="btn btn-warning mx-5"> Edit </a>

        <a href="{{ route('admin.posts.index') }}" class="btn btn-secondary"> Return to index </a>
      </div>
    </div>
  </div>
@endsection
