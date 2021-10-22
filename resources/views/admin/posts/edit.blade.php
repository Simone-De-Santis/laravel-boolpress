@extends('layouts.app')
@section('content')
  <div class="container">
    @include('includes.errors_allert')
    <div class="container">
      <header class="d-flex justify-content-between align-items-center">
        <h1>Edit Post</h1>
        <a href="{{ route('admin.posts.index') }}" class="btn btn-secondary">Return</a>
      </header>
      <section id="form">
        @include('includes.admin.posts.form')
      </section>
    </div>
  @endsection
