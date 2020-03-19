<div class="form-group">
    <label for="name">Name</label>
    <input
        type="text"
        class="form-control  @error('name') is-invalid @enderror"
        id="name"
        name="name"
        autocomplete="name"
        required
        value="{{ old('name', $category->name) }}"
        aria-describedby="nameHelp">
    <small id="nameHelp" class="form-text text-muted">Category for the products</small>
    @error('name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
<div class="form-group">
    <label for="password_confirmation">Description</label>
    <textarea
        class="form-control"
        id="description"
        name="description"
        aria-describedby="descriptionHelp"
        class="form-control  @error('description') is-invalid @enderror"
        rows="3">{{ old('description', $category->description) }}</textarea>
    <small id="descriptionHelp" class="form-text text-muted">Short description.</small>
    @error('description')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
