<div class="form-group">
    <label for="name">Firt name</label>
    <input
        type="text"
        class="form-control  @error('name') is-invalid @enderror"
        id="name"
        name="name"
        value="{{ old('name') }}"
        aria-describedby="nameHelp">
    <small id="nameHelp" class="form-text text-muted">Nomplete name, please.</small>
    @error('name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
    <div class="form-group">
    <label for="email">Email address</label>
    <input
        type="email"
        class="form-control  @error('email') is-invalid @enderror"
        id="email"
        name="email"
        value="{{ old('email') }}"
        aria-describedby="emailHelp">
    <small id="emailHelp" class="form-text text-muted">Well never share your email with anyone else.</small>
    @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
<div class="form-group">
    <label for="password">Password</label>
    <input
        type="password"
        class="form-control  @error('password') is-invalid @enderror"
        id="password"
        name="password"
        aria-describedby="passwordHelp">
    <small id="passwordHelp" class="form-text text-muted">Well never share your email with anyone else.</small>
    @error('password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
<div class="form-group">
    <label for="password_confirmation">Password</label>
    <input
        type="password"
        class="form-control  @error('password_confirmation') is-invalid @enderror"
        id="password_confirmation"
        name="password_confirmation"
        aria-describedby="password_confirmationHelp">
    <small id="password_confirmationHelp" class="form-text text-muted">Well never share your email with anyone else.</small>
    @error('password_confirmation')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
