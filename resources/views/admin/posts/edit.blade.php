@extends('layouts.app')
@section('content')
  <div class="container">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif
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
