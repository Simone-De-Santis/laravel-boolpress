@if ($post->exists)
  <form method='POST' action="{{ route('admin.posts.update', $post->id) }}">
    @method('PATCH')
  @else
    <form method='POST' action="{{ route('admin.posts.store') }}">
@endif


@csrf
<div class=" form-group">
  <label for="title">Titile</label>
  <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $post->title) }}"
    placeholder="Write the title">
</div>
<div class="form-group">
  <label for="image">Url image</label>
  <input type="text" class="form-control" id="image" name='image' value="{{ old('image', $post->image) }}"
    placeholder="write the URL of the image">
</div>
<div class="form-group">
  <label for="content">Content text</label>
  <textarea class="form-control" id="content" name='content' placeholder="Write the content"
    rows="5">{{ old('content', $post->content) }}</textarea>
</div>
<div class="d-flex justify-content-between">
  <button type="reset" class="btn btn-secondary">Reset</button>

  <button type="submit" class="btn btn-success">Save</button>
</div>
</form>
