@extends('template.main')
@section('content')

<div id="form-container-base">
  <span id="form-header">Send Request</span>
  <br>

  <form method="POST" action="{{route('user.email_update.store') }}">
    @csrf
    <div class="form-field">
      <label for="email">Old Email address</label>
      <input type="email" name="email" id="email" class="@error('email') is-invalid |@enderror" id="email" aria-describedby="email" value={{old('email')}}>
      @error('email')
      <span class="invalid-feedback" role="alert">
        {{$message}}
      </span>
      @enderror
    </div>
        <div class="form-field">
      <label for="new_email">New Email address</label>
      <input type="email" name="new_email" id="new_email" class="@error('new_email') is-invalid |@enderror" id="new_email" aria-describedby="email" value={{old('new_email')}}>
      @error('new_email')
      <span class="invalid-feedback" role="alert">
        {{$message}}
      </span>
      @enderror
    </div>
        <div class="form-field">
      <label for="password">Password</label>
      <input type="password" name="password" id="password" class="@error('password') is-invalid |@enderror" id="password" aria-describedby="password" value={{old('password')}}>
      @error('password')
      <span class="invalid-feedback" role="alert">
        {{$message}}
      </span>
      @enderror
    </div>
    <div class="form-field-row">
      <a href={{url('login') }} id="back"><i class="fi fi-rr-angle-left"></i></a>
      <button type="submit" id="send-reset-request-btn">Send reset request</button>
    </div>
  </form>
</div>

@endsection