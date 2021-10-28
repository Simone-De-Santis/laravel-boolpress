@extends('layouts.app')
@section('content')
  <div class="container">
    @include('includes.errors_allert')
    <header class="d-flex justify-content-between align-items-center">
      <h1>Created new Category</h1>
      <a href="{{ url()->previous() }}" class="btn btn-secondary"> Return</a>
    </header>
    <section id="form">
      @include('includes.admin.categories.form')
    </section>
  </div>

@endsection
