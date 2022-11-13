@extends('template.main')

@section('content')
<div class="form-container-base" style="display: grid; place-items: center;">
  <span id="form-header">Activate Account</span>
  <br>
  <form method="POST" action="{{route('student.reset')}}">
    @method('PUT')
    @csrf
    <div class="form-field">
      <label for="email">Email</label>
      <input type="email" name="email" id="email" class="form-control @error('email') is-invalid |@enderror" value="{{$email}}">
      @error('email')
      <span class="invalid-feedback" role="alert">
        {{$message}}
      </span>
      @enderror
    </div>
    <div class="form-field">
      <label for="password">Password <br></label>
      <input type="password" name="password" id="password" class="form-control @error('password') is-invalid |@enderror" value="" placeholder="Password">
      @error('password')
      <span class="invalid-feedback" role="alert">
        {{$message}}
      </span>
      @enderror
    </div>
    <div class="form-field">
      <label for="password">Confim Password</label>
      <input type="password" name="password_confirmation" id="password_confirmation" class="form-control @error('password_confirmation') is-invalid |@enderror" value="" placeholder="Confirm Password">
      @error('password')
      <span class="invalid-feedback" role="alert">
        {{$message}}
      </span>
      @enderror
    </div>
        <small>
       ( Password must contain <br>one uppercase letter, one symbol <br>and a number )
    </small>
   
    <br>
     
    <br>
    <div class="form-field">
      <button type="submit" id="activate">Activate Account</button>
    </div>
  </form>
</div>

@endsection