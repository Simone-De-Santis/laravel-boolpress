@if ($category->exists)
  <form method='POST' action="{{ route('admin.categories.update', $category->id) }}">
    @method('PATCH')
  @else
    <form method='POST' action="{{ route('admin.categories.store') }}">
@endif


@csrf
<div class=" form-group">
  <label for="name">Name</label>
  <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
    value="{{ old('name', $category->name) }}" placeholder="Write the name">
  @error('name')
    <div class="invalid-feedback">
      {{ $message }}
    </div>
  @enderror
</div>
<div class="form-group">
  <div class="form-group">
    <label for="color">Color</label>
    <select class="form-control  @error('color')is-invalid @enderror" id="color" name="color">
      <option value="">Not category</option>
      <option @if (old('color', $category->color) && old('color', $category->color) == $category->color) selected @endif value="primary">Blue</option>
      <option @if (old('color', $category->color) && old('color', $category->color) == $category->color) selected @endif value="secondary">Gray</option>
      <option @if (old('color', $category->color) && old('color', $category->color) == $category->color) selected @endif value="success">Green</option>
      <option @if (old('color', $category->color) && old('color', $category->color) == $category->color) selected @endif value="danger">Red</option>
      <option @if (old('color', $category->color) && old('color', $category->color) == $category->color) selected @endif value="warning">Yellow</option>
      <option @if (old('color', $category->color) && old('color', $category->color) == $category->color) selected @endif value="info">Heavenly</option>
      @error('color')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
      @enderror


    </select>
  </div>
</div>

<div class="d-flex justify-content-between">
  <button type="reset" class="btn btn-secondary">Reset</button>

  <button type="submit" class="btn btn-success">Save</button>
</div>
</form>
