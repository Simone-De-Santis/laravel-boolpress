{{-- estendiamo il layout creato da laravel --}}

@extends('layouts.app')


{{-- andiamo a pendere la sezione dove è presentre il segnaposto e lo riempiamo con il nostro contenuto personale --}}
@section('content')
  <div class="container">
    @if (session('alert-message'))
      <div class="alert alert-{{ session('alert-type') }}">
        {{ session('alert-message') }}
      </div>
    @endif
    <header class="my-5 d-flex justify-content-between align-items-center">
      <h1>Post list</h1>
      <a href="{{ route('admin.posts.create') }}" class="btn btn-success"> Created new post</a>


    </header>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Title</th>
          <th scope="col">Category</th>
          <th scope="col">Created</th>
          <th scope="col">Author</th>
          <th scope="col"></th>
        </tr>
      </thead>
      <tbody>
        @forelse($posts as $post)
          <tr>

            <td>{{ $post->id }}</td>
            <td>{{ $post->title }}</td>
            <td>
              @if ($post->category)<span
                class="badge badge-pill badge-{{ $post->category->color ?? 'light' }}">{{ $post->category->name }}</span>@else-
              @endif
            </td>
            {{-- usiamo la funzione per stampare la data formattata ' funzione proviene dal model ' --}}
            <td>{{ $post->getFormattedDate('created_at', 'd-m-Y') }}</td>
            <td>@if ($post->author){{ $post->author->name }}@else --- @endif</td>

            <td>
              <div class="d-flex justify-content-end">
                <a href="{{ route('admin.posts.show', $post->id) }}" class="btn btn-primary">Detail</a>
                <a href="{{ route('admin.posts.edit', $post->id) }}" class="btn btn-warning ml-2">Edit</a>
                <form action="{{ route('admin.posts.destroy', $post->id) }}" method="POST" class='delete-button'>
                  @csrf
                  @method('DELETE')

                  <button type="submit" class="btn btn-danger ml-2">Delete</button>

                </form>
              </div>
            </td>
          </tr>
        @empty
          <tr>
            <td colspan="4" class="text-center"> Not items found </td>
          </tr>
        @endforelse
      </tbody>
    </table>
    <div class="d-flex justify-content-center">
      {{ $posts->links() }}
    </div>
    {{-- raccoglitore di post per categoria --}}
    <section id="post-category" class=" mt-5 d-flex justify-content-center">

      <div class="row">
        @foreach ($categories as $category)
          <div class="col-md-4 mb-3">
            <div class="d-flex">
              <h2>{{ $category->name }}</h2>
              <p class="text-muted">({{ count($category->posts) }})</p>

            </div>

            @forelse($category->posts as $post)
              <h5 class='my-2'> <a href="{{ route('admin.posts.show', $post->id) }}">{{ $post->title }}</a></h5>

            @empty
              <h5>non ci sono post in questa categoria</h5>
            @endforelse
          </div>
        @endforeach
      </div>

    </section>


  </div>



@endsection

@section('scripts')
  <script src="{{ asset('js/confirm-delete.js') }}"></script>


@endsection
