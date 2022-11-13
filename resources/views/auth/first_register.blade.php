@extends('template.main')
@section('content')


 <center id="form-top-header">
      <img src={{URL::asset('logo.png')}} alt="Logo" id="form-school-logo">
      <span id="school-name">Basista National High School</span>
      <span id="school-location">Basista, Pangasinan</span>
      <span id="acadyear">Academic Year 2022 - 2023</span>
    </center>

<div id="form-container-base">
  <span id="form-header">@if($status == 'true') BNHS is accepting enrollment applications @endif @if($status == 'false') BNHS is not accepting enrollment applications @endif</span>
   <small id="enrolemt-application-updated-at"> Enrolment starts/started at {{$schoolyear->enrolment_start}}</small>
   <small id="enrolemt-application-updated-at"> Enrolment ends at {{$schoolyear->enrolment_start}}</small>
  <br>

@if($status == 'true')
  <form method="POST" action="{{route('student.check.store')}}">

    @csrf
    <div class="form-field">
      <label for="email">Email address</label>
      <input type="email" name="email" id="email" class="@error('email') is-invalid | @enderror" id="email" aria-describedby="email" value="{{old('email')}}">
      @error('email')
      <span class="invalid-feedback" role="alert">
        {{$message}}
      </span>
      @enderror
    </div>

   <div class="form-field" id="LRNyes">
        <label for="lrnnumber">Learner's Reference Number(LRN)</label>
        <input placeholder="12 Digits" name="lrnnumber" type="number" class="@error('lrnnumber') is-invalid |@enderror" id="lrnnumber" aria-describedby="lrnnumber" value="{{old('lrnnumber')}}" maxlength="12" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" required>
        @error('lrnnumber')
        <span class="invalid-feedback" role="alert">
          {{$message}}
        </span>
        @enderror
      </div>
 <div class="form-info-header">
      <div class="form-check" style="margin-left: 1.5rem;">
        <input class="form-check-input" type="checkbox" name="existing_account" value="yes" {{ old('existing_account') ? 'checked' : ''}} id="existing_account"  onload="Password();" onclick="Password();">
        <label class="form-check-label" for="flexRadioDefault1">
        I have an existing account
        </label>
      </div>   
      <br>
       <div class="form-field" id="enrolment_password_view" style="display: none;">
      <label for="enrolment_password">Password</label>
      <input type="password" name="password" id="enrolment_password" class="@error('enrolment_password') is-invalid | @enderror" id="enrolment_password" aria-describedby="password" value="{{old('enrolment_password')}}">
      @error('enrolment_password')
      <span class="invalid-feedback" role="alert">
        {{$message}}
      </span>
      @enderror
    </div>
    <div class="form-field">
      <button type="submit" id="login-btn">Enroll</button>
    </div>
  </form>
@endif()
</div>
@endsection
 