@extends('layouts.app')
@section('content')
  <div class="container">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
          <li>Compilation error</li>
        </ul>
      </div>
    @endif
    <header class="d-flex justify-content-between align-items-center">
      <h1>Created new Post</h1>
      <a href="{{ url()->previous() }}" class="btn btn-secondary"> Return</a>
    </header>
    <section id="form">
      @include('includes.admin.posts.form')
    </section>
  </div>

@endsection
