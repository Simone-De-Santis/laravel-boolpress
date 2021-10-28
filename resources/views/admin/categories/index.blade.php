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
      <h1>Categories list</h1>
      <a href="{{ route('admin.categories.create') }}" class="btn btn-success"> Created new category</a>


    </header>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Name</th>
          <th scope="col">Color</th>
          <th scope="col"></th>
        </tr>
      </thead>
      <tbody>
        @forelse($categories as $category)
          <tr>

            <td>{{ $category->id }}</td>
            <td>{{ $category->name }}</td>
            <td>{{ $category->color }}</td>
            <td>
              <div class="d-flex justify-content-end">
                <a href="{{ route('admin.categories.show', $category->id) }}" class="btn btn-primary">Detail</a>
                <a href="{{ route('admin.categories.edit', $category->id) }}" class="btn btn-warning ml-2">Edit</a>
                <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST"
                  class='delete-button'>
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




  </div>



@endsection

@section('scripts')
  <script src="{{ asset('js/confirm-delete.js') }}"></script>


@endsection
