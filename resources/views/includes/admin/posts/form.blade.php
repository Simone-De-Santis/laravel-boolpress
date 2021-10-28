@if ($post->exists)
  <form method='POST' action="{{ route('admin.posts.update', $post->id) }}">
    @method('PATCH')
  @else
    <form method='POST' action="{{ route('admin.posts.store') }}">
@endif


@csrf
<div class=" form-group">
  <label for="title">Titile</label>
  <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title"
    value="{{ old('title', $post->title) }}" placeholder="Write the title">
  @error('title')
    <div class="invalid-feedback">
      {{ $message }}
    </div>
  @enderror
</div>
<div class="form-group">
  <label for="image">Url image</label>
  <input type="text" class="form-control @error('image') is-invalid @enderror" id="image" name='image'
    value="{{ old('image', $post->image) }}" placeholder="write the URL of the image">
  @error('image')
    <div class="invalid-feedback">
      {{ $message }}
    </div>
  @enderror
  <div class="form-group">
    <label for="category_id">Catecory</label>
    <select class="form-control  @error('category_id')is-invalid @enderror" id="category_id" name="category_id">
      <option value="">Not Category</option>
      @foreach ($categories as $category)
        <option @if (old('category_id', $post->category_id) == $category->id) selected @endif value="{{ $category->id }}">{{ $category->name }}</option>
      @endforeach
      @error('category_id')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
      @enderror


    </select>
  </div>
</div>
<div class="form-group">
  <label for="content">Content text</label>
  <textarea class="form-control @error('content') is-invalid @enderror" id="content" name='content'
    placeholder="Write the content" rows="5">{{ old('content', $post->content) }}</textarea>
  @error('content')
    <div class="invalid-feedback">
      {{ $message }}
    </div>
  @enderror
</div>
<div class="d-flex justify-content-between">
  <button type="reset" class="btn btn-secondary">Reset</button>

  <button type="submit" class="btn btn-success">Save</button>
</div>
</form>
