@extends('template.main')
@section('content')


<div id="enrollment-form">
  <div id="enrollform-base">

        <span id="asa">Edit Admin Account</span>
    <hr>
<form method="POST" action=" {{route('admin.management.update',$user->id) }}">
@method('PUT')

@csrf
<div class="enrollment-form-field">
  <div class="form-field">
    <label for="name">First Name</label>
    <input name="name" type="name" class="@error('email') is-invalid |@enderror" id="name" aria-describedby="name" value="{{old('name')}} @isset($user){{$user->name}} @endisset">
    @error('name')
    <span class="invalid feedback" role="alert">
      {{$message}}
    </span>
    @enderror
  </div>
  <div class="form-field">
    <label for="middlename">Middle Name</label>
    <input name="middlename" type="text" class="@error('middlename') is-invalid |@enderror" id="middlename" aria-describedby="middlename" value="{{old('middlename')}} @isset($user){{$user->middlename}} @endisset ">
    @error('middlename')
    <span class="invalid feedback" role="alert">
      {{$message}}
    </span>
    @enderror
  </div>
  <div class="form-field">
    <label for="lastname">Last Name</label>
    <input name="lastname" type="text" class="@error('lastname') is-invalid |@enderror" id="lastname" aria-describedby="lastname" value="{{old('lastname')}} @isset($user){{$user->lastname}} @endisset ">
    @error('lastname')
    <span class="invalid feedback" role="alert">
      {{$message}}
    </span>
    @enderror
  </div>
</div>
<div class="enrollment-form-field" style="grid-template-columns: 1fr;">
  <div class="form-field">
    <label for="email">Email address</label>
    <input name="email" type="email" class="@error('email') is-invalid |@enderror" id="email" aria-describedby="email" value="{{old('email')}} @isset($user){{$user->email}} @endisset" readonly>
    @error('email')
    <span class="invalid feedback" role="alert">
      {{$message}}
    </span>
    @enderror
  </div>
</div>
@isset ($create)
<div class="enrollment-form-field" style="grid-template-columns: 1fr 1fr;">
  <div class="form-field">
    <label for="password">Password</label>
    <input name="password" type="password" class="@error('password') is-invalid |@enderror" id="password" aria-describedby="password" value="">
    @error('password')
    <span class="invalid feedback" role="alert">
      {{$message}}
    </span>
    @enderror
  </div>
  <div class="form-field">
    <label for="password_confirmation">Confirm Password</label>
    <input name="password_confirmation" type="password" class="@error('password_confirmation') is-invalid |@enderror" id="password_confirmation" aria-describedby="password_confirmation" value="">
    @error('password_confirmation')
    <span class="invalid feedback" role="alert">
      {{$message}}
    </span>
    @enderror
  </div>
</div>
@endisset
<hr>
<div class="enrollment-form-field" style="grid-template-columns: 1fr;">
  <div class="enrollment-form-field">
 <button style="font-size: 14px;" class="btn btn-success" role="submit">Submit</button>
   
      <a style="font-size: 14px;" class="btn btn-warning" href="{{ URL::previous() }}" role="button">Back</a>
    </div>
</div>
  </div>
</div>
  </form>
  @endsection