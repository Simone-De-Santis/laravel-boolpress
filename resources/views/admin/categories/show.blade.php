@extends('layouts.app')

@section('content')
  <div class="container">
    <h1>Name: {{ $category->name }}</h1>
    <p>Color: {{ $category->color }}</p>

    <div class="d-flex justify-content-between">
      <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" class='delete-button'>
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger ">Delete</button>
      </form>
      <div>
        <a href="{{ route('admin.categories.edit', $category->id) }}" class="btn btn-warning mx-5"> Edit </a>
        <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary"> Return to index </a>
      </div>
    </div>
  </div>
@endsection

@section('scripts')
  <script src="{{ asset('js/confirm-delete.js') }}"></script>

@endsection
