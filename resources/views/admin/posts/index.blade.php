{{-- estendiamo il layout creato da laravel --}}

@extends('layouts.app')


{{-- andiamo a pendere la sezione dove è presentre il segnaposto e lo riempiamo con il nostro contenuto personale --}}
@section('content')
  <div class="container">
    <h1>Post list</h1>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Title</th>
          <th scope="col">Created</th>
          <th scope="col"></th>
        </tr>
      </thead>
      <tbody>
        @forelse($posts as $post)
          <tr>
            <td>{{ $post->id }}</td>
            <td>{{ $post->title }}</td>
            <td>{{ $post->created_at }}</td>
            <td>
              <a href="#" class="btn btn-primary">Detail</a>
              <a href="#" class="btn btn-warning">Edit</a>
              <a href="#" class="btn btn-danger">Delete</a>
            </td>
          </tr>
        @empty
          <tr>
            <td colspan="4" class="text-center"> Not items found </td>
          </tr>
        @endforelse
      </tbody>
    </table>



  </div>



@endsection
