@extends('layouts.app')
@section('content')
  <div class="container">
    @include('includes.errors_allert')
    <div class="container">
      <header class="d-flex justify-content-between align-items-center">
        <h1>Edit Category</h1>
        <a href="{{ route('admin.posts.index') }}" class="btn btn-secondary">List</a>
      </header>
      <section id="form">
        @include('includes.admin.categories.form')
      </section>
    </div>
  @endsection
