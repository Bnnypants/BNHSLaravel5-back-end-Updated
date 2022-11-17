@extends('template.main')
@section('content')

<span id="enrollform-header">Enrollment Application Form</span>

  <div id="enrollform-base">
    <center id="form-top-header">
      <img src={{URL::asset('logo.png')}} alt="Logo" id="form-school-logo">
      <span id="school-name">Basista National High School</span>
      <span id="school-location">Basista, Pangasinan</span>
      <span id="acadyear">Academic Year 2022 - 2023</span>
    </center>
    <br>
    <hr>
        <div class="enrollment-form-field" style="grid-template-columns: 2fr 2fr">
     
<div class="enrollment-form-field">
        @foreach($records as $record)

         <div class="form-field">
        <label for="documents">Past Records Found :</label>
        <div style="width: 100%;" class="file-upload" id="file-upload">
                   <div class="form-field">
          <br>

           <a class="btn btn-outline-secondary" href="{{url('admin/records',$record->id) }}" role="button">S.Y. {{$record->schoolyear_start}} - {{$record->schoolyear_end}}</a>
        </div>
      
        </div>
      </div>
  
    @endforeach
    </div>
<div class="enrollment-form-field">
            @foreach($rejection_messages as $rejection_message)
         <div class="form-field">
        <label for="documents">Rejection Message:</label>
        <div style="width: 100%;" class="file-upload" id="file-upload">
                   <div class="form-field">
          <br>
           <a class="btn btn-outline-secondary"  href="{{url('admin/rejection_message',$rejection_message->id) }}" role="button"> {{$rejection_message->created_at}}</a>
        </div>
      
        </div>
      </div>
    @endforeach
    </div>
    </div>
    <div class="form-info-header">
      <span>Grade level and School Information</span>
    </div>
    <div class="enrollment-form-field">
     <div class="form-field">
          <label for="permanentstreet">Grade Level to Enrol In</label>
          <input placeholder="Permanent Street" name="permanentstreet" type="text" class="@error('permanentstreet') is-invalid |@enderror"  aria-describedby="permanentstreet" value="{{$user->gradeleveltoenrolin}}" readonly required>
          @error('permanentstreet')
          <span class="invalid-feedback" role="alert">
            {{$message}}
          </span>
          @enderror
        </div>
     <div class="form-field">
          <label for="permanentstreet">Strand to Enrol In</label>
          <input placeholder="Permanent Street" name="permanentstreet" type="text" class="@error('permanentstreet') is-invalid |@enderror"  aria-describedby="permanentstreet" value="{{$user->strandtoenrolin}}" readonly required>
          @error('permanentstreet')
          <span class="invalid-feedback" role="alert">
            {{$message}}
          </span>
          @enderror
        </div>
      <div class="form-field" id="semester" >
        <label for="semester" class="form-label">Enroll to semester:</label>
        <div class="btn-group" role="group">
          <input type="radio" class="btn-check" name="semester" value="1st" id="btnradio1" autocomplete="off" 
           @if($user->semester == '1st')checked @endif>
          <label class="semestral-btn btn btn-outline-success" for="btnradio1">1st Semester</label>

          <input type="radio" class="btn-check" name="semester" value="2nd" id="btnradio2" autocomplete="off"
           @if($user->semester == '2nd')checked @endif>
          <label class="semestral-btn btn btn-outline-success" for="btnradio2">2nd Semester</label>

           <input type="radio" class="btn-check" name="semester" value="Not Applicable" id="btnradio3" autocomplete="off"
            @if($user->semester == 'Not Applicable')checked @endif>
          <label class="semestral-btn btn btn-outline-success" for="btnradio3">Not Applicable</label>
        </div>
      </div>

    </div>
  
    <div class="enrollment-form-field">

      <div class="form-field">
        <label for="returningstudent">Please Select One that Applies</label>
        <div class="form-field form-check @error('returningstudent') is-invalid |@enderror">
          <div>
            <input class="form-check-input" type="radio" name="studenttype" id="studenttype" value="Old Student" {{ old('studenttype') ? 'checked' : ''}} onclick="hide1();" @if($user->studenttype == 'Old Student')checked @endif>
            <label for="returningstudent">Old Student</label>
          </div>
          <div>
            <input class="form-check-input" type="radio" name="studenttype" id="studenttype" value="Transferee" {{ old('studenttype') ? 'checked' : ''}} onclick="show1();" @if($user->studenttype == 'Transferee/Moving In')checked @endif>
            <label for="returningstudent">Transferee/Moving In</label>
          </div>
          <div>
            <input class="form-check-input" type="radio" name="studenttype" id="studenttype" value="Balik Aral/Returning Student" {{ old('studenttype') ? 'checked' : ''}} onclick="show1();" @if($user->studenttype == 'Balik Aral/Returning Student')checked @endif>
            <label for="returningstudent">Balik Aral/Returning Student</label>
          </div>
        </div>
        @error('schooltype')
        <span class="invalid-feedback" role="alert">
          {{$message}}
        </span>
        @enderror
      </div>





    </div>
    <div class="enrollment-form-field" id="glsi" style="grid-template-columns: 1fr 1fr !important;"> 
      <div class="form-field" id="ifYes1" >
        <label for="indegenouscommunity" class="form-label">Please specifiy the indegenous group you belong to:</label>
        <input name="indegenouscommunity" type="text" class="form-control @error('indegenouscommunity') is-invalid |@enderror" id="IndegenousCommunitySpecification" aria-describedby="indegenouscommunity" value="{{$user->indegenouscommunity}}" readonly>
        @error('indegenouscommunity')
        <span class="invalid-feedback" role="alert">
          {{$message}}
        </span>
        @enderror

      </div>
      <div class="form-field" id="indigencynumber">
        <label for="indegency" class="form-label">What is your household 4Ps ID Number?</label>
        <input name="indigency" type="number" class="form-control @error('indigency') is-invalid |@enderror" id="indigency" aria-describedby="indegency" value="{{$user->indigency}}" readonly>
        @error('indegency')
        <span class="invalid-feedback" role="alert">
          {{$message}}
        </span>
        @enderror

      </div>
    </div>
    <hr>
    <div class="form-info-header">
      <span>Student Information</span>
    </div>
   
       <br>
    <div class="enrollment-form-field">

      <div class="form-field">
        <label for="name">First Name</label>
        <input placeholder="Ex: Juan" name="name" type="text" class="@error('name') is-invalid |@enderror" id="name" aria-describedby="name" value="{{$user->name}}" readonly required>
        @error('name')
        <span class="invalid-feedback" role="alert">
          {{$message}}
        </span>
        @enderror
      </div>
      <div class="form-field">
        <label for="middlename">Middle Name ( If without middlename, please skip )</label>
        <input placeholder="Ex: Tamad" name="middlename" type="text" class="@error('middlename') is-invalid |@enderror" id="middlename" aria-describedby="middlename" value="{{$user->middlename}}" readonly required >
        @error('middlename')
        <span class="invalid-feedback" role="alert">
          {{$message}}
        </span>
        @enderror
      </div>
      <div class="form-field">
        <label for="lastname">Last Name</label>
        <input placeholder="Ex: Dela Cruz" name="lastname" type="text" class="@error('lastname') is-invalid |@enderror" id="lastname" aria-describedby="lastname" value="{{$user->lastname}}" readonly required required>
        @error('lastname')
        <span class="invalid-feedback" role="alert">
          {{$message}}
        </span>
        @enderror
      </div>
    <div class="form-field"></div>
   <div id='extension_name' >
        <div class="form-field" >
        <label for="extension_name">Extension Name</label>
        <input placeholder="Ex: Jr." name="extension_name" type="text" class="@error('extension_name') is-invalid |@enderror" id="extension_name" aria-describedby="lastname" value="{{$user->extensionname}}"readonly required>
        @error('extension_name')
        <span class="invalid-feedback" role="alert">
          {{$message}}
        </span>
        @enderror
      </div>
    </div>
    </div>
    <hr>
    <div class="form-info-header">
      <span>Current Address</span>
    </div>
    <div class="enrollment-form-field" style="grid-template-columns: auto 1fr 1fr 1fr;">
      <div class="form-field">
        <label for="currenthousenumber">House Number</label>
        <input placeholder="##/###" style="width: 7rem;" name="currenthousenumber" type="number" class="@error('currenthousenumber') is-invalid |@enderror" id="currenthousenumber" aria-describedby="currenthousenumber" value="{{$user->currenthousenumber}}" readonly required>
        @error('currenthousenumber')
        <span class="invalid-feedback" role="alert">
          {{$message}}
        </span>
        @enderror
      </div>
            <div class="form-field">
        <label for="currentbaranggay">Street</label>
        <input placeholder="Current Baranggay" name="currentstreet" type="text" class="@error('currentstreet') is-invalid |@enderror"  aria-describedby="currentstreet" value="{{$user->currentstreet}}" readonly required>
        @error('currentstreet')
        <span class="invalid-feedback" role="alert">
          {{$message}}
        </span>
        @enderror
      </div>
      <div class="form-field">
        <label for="currentbaranggay">Baranggay</label>
        <input placeholder="Current Baranggay" name="currentbaranggay" type="text" class="@error('currentbaranggay') is-invalid |@enderror" id="currentbaranggay" aria-describedby="currentbaranggay" value="{{$user->currentbaranggay}}" readonly required>
        @error('currentbaranggay')
        <span class="invalid-feedback" role="alert">
          {{$message}}
        </span>
        @enderror
      </div>
      <div class="form-field">
        <label for="currentmunicipality">Municipality</label>
        <input placeholder="Current Municipality" name="currentmunicipality" type="text" class="@error('currentmunicipality') is-invalid |@enderror" id="currentmunicipality" aria-describedby="currentmunicipality" value="{{$user->currentmunicipality}}" readonly required required>
        @error('currentmunicipality')
        <span class="invalid-feedback" role="alert">
          {{$message}}
        </span>
        @enderror
      </div>
 
    </div>
        <div class="enrollment-form-field" style="grid-template-columns: auto 1fr 1fr 1fr;">
  
             <div class="form-field">
        <label for="currentprovince">Province</label>
        <input placeholder="Current Province" name="currentprovince" type="text" class="@error('currentprovince') is-invalid |@enderror" id="currentbaranggay" aria-describedby="currentprovince" value="{{$user->currentprovince}}" readonly required>
        @error('currentprovince')
        <span class="invalid-feedback" role="alert">
          {{$message}}
        </span>
        @enderror
      </div>
       <div class="form-field">
          <label for="currentzipcode">Zip Code ( Municipality )</label>
             <input placeholder="4 Digits" name="currentzipcode" type="number" class="@error('currentzipcode') is-invalid |@enderror" id="permanentzipcode" aria-describedby="currentzipcode" maxlength="4" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" value="{{$user->currentzipcode}}" readonly required>
          @error('currentzipcode')
          <span class="invalid-feedback" role="alert">
            {{$message}}
          </span>
          @enderror
        </div>
          <div class="form-field">
          <br>
              <a class="btn btn-outline-secondary" href="https://sites.google.com/site/departmentofphilippines/philippine-zip-codes/provincial-zip-codes/pangasinan-zip-code" role="button">View Municipality Zip Codes</a>
        </div>
      
      <div class="form-field">
        <label for="currentcountry">Country</label>
        <input placeholder="Current Country" name="currentcountry" type="text" class="@error('currentcountry') is-invalid |@enderror" id="currentprovince" aria-describedby="currentcountry  "  value="{{$user->currentcountry}}" readonly required>
        @error('currentcountry')
        <span class="invalid-feedback" role="alert">
          {{$message}}
        </span>
        @enderror
      </div>

      </div>
    <div class="form-info-header">
      <span>Permanent Address</span>
      <br>
  

    </div>
    <div id="text1">
      <div class="enrollment-form-field" style="grid-template-columns: auto 1fr 1fr 1fr">

        <div class="form-field">
          <label for="permanenthousenumber">House Number</label>
          <input placeholder="##/###" style="width: 7rem;" name="permanenthousenumber" type="number" class="@error('permanenthousenumber') is-invalid |@enderror" id="permanenthousenumber" aria-describedby="permanenthousenumber" value="{{$user->permanenthousenumber}}" readonly required>
          @error('permanenthousenumber')
          <span class="invalid-feedback" role="alert">
            {{$message}}
          </span>
          @enderror
        </div>
             <div class="form-field">
          <label for="permanentstreet">Street</label>
          <input placeholder="Permanent Street" name="permanentstreet" type="text" class="@error('permanentstreet') is-invalid |@enderror"  aria-describedby="permanentstreet" value="{{$user->permanentstreet}}" readonly required>
          @error('permanentstreet')
          <span class="invalid-feedback" role="alert">
            {{$message}}
          </span>
          @enderror
        </div>
        <div class="form-field">
          <label for="permanentbaranggay">Baranggay</label>
          <input placeholder="Permanent Baranggay" name="permanentbaranggay" type="text" class="@error('permanentbaranggay') is-invalid |@enderror"  id="permanentbaranggay" aria-describedby="permanentbaranggay" value="{{$user->permanentbaranggay}}" readonly required>
          @error('permanentbaranggay')
          <span class="invalid-feedback" role="alert">
            {{$message}}
          </span>
          @enderror
        </div>
        <div class="form-field">
          <label for="permanentmunicipality">Municipality</label>
          <input placeholder="Permanent Municipality" name="permanentmunicipality" type="text" class="@error('permanentmunicipality') is-invalid |@enderror" id="permanentmunicipality" aria-describedby="permanentmunicipality" value="{{$user->permanentmunicipality}}" readonly required>
          @error('permanentmunicipality')
          <span class="invalid-feedback" role="alert">
            {{$message}}
          </span>
          @enderror
        </div>
      
      </div>
        <div class="enrollment-form-field" style="grid-template-columns: auto 1fr 1fr 1fr">

      <div class="form-field">
          <label for="permanentprovince">Province</label>
          <input placeholder="Permanent Province" name="permanentprovince" type="text" class="@error('permanentprovince  ') is-invalid |@enderror" id="permanentprovince" aria-describedby="permanentprovince  " value="{{$user->permanentprovince}}" readonly required>
          @error('permanentprovince')
          <span class="invalid-feedback" role="alert">
            {{$message}}
          </span>
          @enderror
        </div>
        <div class="form-field">
          <label for="permanentzipcode">Zip Code ( Municipality )</label>
             <input placeholder="4 Digits" name="permanentzipcode" type="number" class="@error('permanentzipcode') is-invalid |@enderror" id="permanentzipcode" aria-describedby="permanentzipcode" value="{{$user->permanentzipcode}}" readonly required >
          @error('permanentzipcode')
          <span class="invalid-feedback" role="alert">
            {{$message}}
          </span>
          @enderror
      
        </div>
        <div class="form-field">
          <br>
              <a class="btn btn-outline-secondary" href="https://sites.google.com/site/departmentofphilippines/philippine-zip-codes/provincial-zip-codes/pangasinan-zip-code" role="button">View Municipality Zip Codes</a>
        </div>
        <div class="form-field">
          <label for="permanentcountry">Country</label>
          <input placeholder="Permanent Country" name="permanentcountry" type="text" class="@error('permanentcountry') is-invalid |@enderror"  aria-describedby="permanentcountry" value = "{{$user->permanentcountry}}"readonly required>
          @error('permanentcountry')
          <span class="invalid-feedback" role="alert">
            {{$message}}
          </span>
          @enderror
        </div>
   
      </div>
    </div>
    <div class="enrollment-form-field" style="grid-template-columns: 2.5fr 1.5fr auto auto 1fr;">
      <div class="form-field">
        <label for="email">Email address</label>
        <input placeholder="email@example.com" name="email" type="email" class="@error('email') is-invalid |@enderror" id="email" aria-describedby="email" value="{{$user->email}}" readonly required>
        @error('email')
        <span class="invalid-feedback" role="alert">
          {{$message}}
        </span>
        @enderror
      </div>
      <div class="form-field">
        <label for="phonenumber">Phone Number</label>
        <input placeholder="###########" name="phonenumber" type="number" class="@error('phonenumber') is-invalid |@enderror" id="phonenumber" aria-describedby="PhoneNumber" value = "{{$user->phonenumber}}"required maxlength="11" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" readonly>
        @error('phonenumber')
        <span class="invalid-feedback" role="alert">
          {{$message}}    
        </span>
        @enderror
      </div>
      <div class="form-field">
        <label for="birthday">Birthday</label>
        <input placeholder="Birthday" style="width: 10rem;" name="birthday" type="text" class="@error('birthday') is-invalid |@enderror" id="birthday" aria-describedby="birthday" value = "{{$user->birthday}}" readonly required>
        @error('birthday')
        <span class="invalid-feedback" role="alert">
          {{$message}}
        </span>
        @enderror
      </div>
       <div class="form-field">
        <label for="age">Age</label>
    
        <input  readonly placeholder="##" name="age" type="number" class="@error('age') is-invalid |@enderror" id="age" aria-describedby="age" maxlength="2" value = "{{$user->age}}" readonly  >
        @error('age')
        <span id="ga-alert" class="invalid-feedback" role="alert">
          {{$message}}
        </span>
        @enderror
      
      </div>
      <div class="form-field">
        <label for="sex">Sex</label>
        <div class="form-field form-check @error('sex') is-invalid |@enderror">
          <div>
            <input class="form-check-input" type="radio" name="sex" id="sex" value="Male" {{ old('sex') ? 'checked' : ''}} @if($user->sex == 'Male') checked @endif>
            <label for="sex">Male</label>
          </div>
          <div>
            <input class="form-check-input" type="radio" name="sex" id="sex" value="Female" {{ old('sex') ? 'checked' : ''}}@if($user->sex == 'Female') checked @endif>
            <label for="sex">Female</label>
          </div>
        </div>
        @error('sex')
        <span class="invalid-feedback" role="alert">
          {{$message}}
        </span>
        @enderror
      </div>
    </div>
    <div class="enrollment-form-field" style="grid-template-columns: 1fr 1fr;">
      <div class="form-field">
        <label for="mothertongue">Mother Tongue</label>
        <input placeholder="Ex: Pangasinan, Ilocano" name="mothertongue" type="text" class="@error('mothertongue') is-invalid |@enderror" id="mothertongue" aria-describedby="mothertongue" value="{{$user->mothertongue}}" readonly required>
        @error('mothertongue')
        <span class="invalid-feedback" role="alert">
          {{$message}}
        </span>
        @enderror
      </div>
      <div class="form-field">
        <label for="birthplace">Place of Birth ( Municipality )</label>
        <input placeholder="Place of Birth ( Municipality )" name="birthplace" type="text" class="  @error('birthplace') is-invalid |@enderror" id="birthplace" aria-describedby="religion" value="{{$user->birthplace}}" readonly requiredrequired>
        @error('birthplace')
        <span class="invalid-feedback" role="alert">
          {{$message}}
        </span>
        @enderror
      </div>
    </div>
    <hr>
    <div class="form-info-header">
      <span>Enrollment Documents</span>
    </div>
    <div class="enrollment-form-field" style="grid-template-columns: .6fr 1fr auto 1.5fr;">
      <div class="form-field">
        <label for="generalaverage">General Weighted Average  </label>
        <br>
        <input placeholder="##" name="generalaverage" type="number" class="@error('generalaverage') is-invalid |@enderror" id="generalaverage" aria-describedby="generalaverage" value="{{$user->generalaverage}}" readonly maxlength="2" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength); " min="0" max="99" onchange="
        if (this.value <= 0 || this.value > 99) { 
          this.style.borderColor = 'red'; 
          document.getElementById('ga-alert').style.display = 'block' 
          }
          else { 
            this.style.borderColor = '#d9d9d9'; 
            document.getElementById('ga-alert').style.display = 'none' 
            } 
        " required>
        @error('generalaverage')
        <span id="ga-alert" class="invalid-feedback" role="alert">
          {{$message}}
        </span>
        @enderror
        <span style="display: none;" id="ga-alert" class="invalid-feedback" role="alert">
          Invalid Average
        </span>
      </div>

      <div class="form-field" id="LRNyes">
 

        <label for="lrnnumber">Learner's Reference Number(LRN)</label>
        <br>
        <input placeholder="12 Digits" name="lrnnumber" type="number" class="@error('lrnnumber') is-invalid |@enderror" id="lrnnumber" aria-describedby="lrnnumber"  maxlength="12" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"value="{{$user->lrnnumber}}"required readonly>
        @error('lrnnumber')
        <span class="invalid-feedback" role="alert">
          {{$message}}
        </span>
        @enderror
      </div>
      
      <div class="form-field" style="visibility: hidden;">
        <label for="psastatus">Do you have your PSA?</label>

        <div class="form-field form-check @error('psastatus') is-invalid |@enderror">
          <div>
            <input class="form-check-input" type="radio" name="psastatus" id="psastatus" value="Yes" onclick="javascript:PSAyesnoCheck()" ; {{ old('psastatus') ? 'checked' : ''}}>
            <label for="Yes">Yes</label>
          </div>
          <div>
            <input class="form-check-input" type="radio" name="psastatus" id="psastatus" value="No" onclick="javascript:PSAyesnoCheck()" ; {{ old('psastatus') ? 'checked' : ''}} checked>
            <label for="No">No</label>
          </div>
        </div>
        @error('PSA')
        <span class="invalid-feedback" role="alert">
          {{$message}}
        </span>
        @enderror
      </div>
      <div class="form-field" id="PSAyes">
        <label for="PSAnumber">PSA Birth Certificate no. (If available upon enrolment)</label>
        <br>
        <input placeholder="12 Digits" name="psanumber" type="number" class="@error('psanumber') is-invalid |@enderror" id="psanumber" aria-describedby="psanumber" value="{{$user->psanumber}}" readonly minlength="12" maxlength="12" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
        @error('psanumber')
        <span class="invalid-feedback" role="alert">
          {{$message}}
        </span>
        @enderror
      </div>
    </div>
    <div class="enrollment-form-field" style="grid-template-columns: 2fr 2fr">
      <div class="form-field">
        <label for="documents">Please submit the following documents:</label>
        <div style="width: 100%;" class="file-upload" id="file-upload">
                   <div class="form-field">
          <br>
           <a class="btn btn-outline-secondary" href="{{url('admin/reportcard',$user->id) }}" role="button">View SF9/Report Card</a>
        </div>
      
        </div>
      </div>
      <div class="form-field">
        <label for="documents">&MediumSpace;</label>
        <div style="width: 100%;" class="file-upload" id="file-upload2">
    
                     <div class="form-field">
          <br>
          <a class="btn btn-outline-secondary" href="{{url('admin/birthcertificate',$user->id) }}" role="button">View PSA/Birth Certificate/NSO</a>
       
      
          </div>
        </div>
      </div>
    </div>
    <hr>
    <div class="form-info-header">
      <span>Parent's/Guardian's Information</span>
    </div>
    <div class="enrollment-form-field" style="grid-template-columns: 1fr 1fr 1fr 1fr;">
      <div class="form-field">
        <label for="fatherfirstname">Father's First Name</label>
        <input placeholder="First Name" name="fatherfirstname" type="text" class="@error('fatherfirstname') is-invalid |@enderror" id="fatherfirstname" aria-describedby="fatherfirstname" value="{{$user->fatherfirstname}}" readonly required>
        @error('fatherfirstname')
        <span class="invalid-feedback" role="alert">
          {{$message}}
          FatherMiddleName
          @enderror
      </div>
      <div class="form-field">
        <label for="fathermiddlename">Father's Middle Name</label>
        <input placeholder="Middle Name" name="fathermiddlename" type="text" class="@error('fathermiddlename') is-invalid |@enderror" id="fathermiddlename" aria-describedby="FatherMiddleName" value="{{$user->fathermiddlename}}" readonly required>
        @error('fathermiddlename')
        <span class="invalid-feedback" role="alert">
          {{$message}}
        </span>
        @enderror
      </div>
      <div class="form-field">
        <label for="fatherlastname">Father's Last Name</label>
        <input placeholder="Last Name" name="fatherlastname" type="text" class="@error('fatherlastname') is-invalid |@enderror" id="fatherlastname" aria-describedby="fatherlastname" value="{{$user->fatherlastname}}" readonly required>
        @error('fatherlastname')
        <span class="invalid-feedback" role="alert" required>
          {{$message}}
        </span>
        @enderror
      </div>
      <div class="form-field">
        <label for="fatherphonenumber">Father's Contact Number</label>
        <input placeholder="###########" name="fatherphonenumber" type="number" class="@error('fatherphonenumber') is-invalid |@enderror" id="fatherphonenumber" aria-describedby="fatherphonenumber" value="{{$user->fatherphonenumber}}" readonly required maxlength="11" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
        @error('fatherphonenumber')
        <span class="invalid-feedback" role="alert">
          {{$message}}
        </span>
        @enderror
      </div>
    </div>
    <div class="enrollment-form-field" style="grid-template-columns: 1fr 1fr 1fr 1fr;">
      <div class="form-field">
        <label for="motherfirstname">Mother's First Name</label>
        <input placeholder="First Name" name="motherfirstname" type="text" class="@error('motherfirstname') is-invalid |@enderror" id="motherfirstname" aria-describedby="motherfirstname" value="{{$user->motherfirstname}}" readonly required>
        @error('motherfirstname')
        <span class="invalid-feedback" role="alert">
          {{$message}}
        </span>
        @enderror
      </div>
      <div class="form-field">
        <label for="mothermiddlename">Mother's Middle Name</label>
        <input placeholder="Middle Name" name="mothermiddlename" type="text" class="@error('mothermiddlename') is-invalid |@enderror" id="mothermiddlename" aria-describedby="mothermiddlename" value="{{$user->mothermiddlename}}"readonly required>
        @error('mothermiddlename')
        <span class="invalid-feedback" role="alert">
          {{$message}}
        </span>
        @enderror
      </div>
      <div class="form-field">
        <label for="motherlastname">Mother's Last Name</label>
        <input placeholder="Last Name" name="motherlastname" type="text" class="@error('motherlastname') is-invalid |@enderror" id="motherlastname" aria-describedby="motherlastname" value="{{$user->motherlastname}}"required readonly> 
        @error('motherlastname')
        <span class="invalid-feedback" role="alert">
          {{$message}}
        </span>
        @enderror
      </div>
      <div class="form-field">
        <label for="motherphonenumber">Mother's Contact Number</label>
        <input placeholder="###########" name="motherphonenumber" type="number" class="@error('motherphonenumber') is-invalid |@enderror" id="motherphonenumber" aria-describedby="motherphonenumber" value="{{$user->motherphonenumber}}" readonly required maxlength="11" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
        @error('motherphonenumber')
        <span class="invalid-feedback" role="alert">
          {{$message}}
        </span>
        @enderror
      </div>
    </div>
    <div class="enrollment-form-field" style="grid-template-columns: 1fr 1fr 1fr 1fr;">
      <div class="form-field">
        <label for="guardianfirstname">Guardian's First Name</label>
        <input placeholder="First Name" name="guardianfirstname" type="text" class="@error('guardianfirstname') is-invalid |@enderror" id="guardianfirstname" aria-describedby="guardianfirstname" value="{{$user->guardianfirstname}}" required>
        @error('guardianfirstname')
        <span class="invalid-feedback" role="alert">
          {{$message}}
        </span>
        @enderror
      </div>
      <div class="form-field">
        <label for="guardianmiddlename">Guardian's Middle Name</label>
        <input placeholder="Middle Name" name="guardianmiddlename" type="text" class="@error('guardianmiddlename') is-invalid |@enderror" id="guardianmiddlename" aria-describedby="guardianmiddlename" value="{{$user->guardianmiddlename}}" readonly required>
        @error('guardianmiddlename')
        <span class="invalid-feedback" role="alert">
          {{$message}}
        </span>
        @enderror
      </div>
      <div class="form-field">
        <label for="guardianlastname">Guardian's Last Name</label>
        <input placeholder="Last Name" name="guardianlastname" type="text" class="@error('guardianlastname') is-invalid |@enderror" id="guardianlastname" aria-describedby="guardianlastname" value="{{$user->guardianlastname}}" readonly required>
        @error('guardianlastname')
        <span class="invalid-feedback" role="alert">
          {{$message}}
        </span>
        @enderror
      </div>
      <div class="form-field">
        <label for="guardianphonenumber">Guardian's Contact Number</label>
        <input placeholder="###########" name="guardianphonenumber" type="number" class="@error('guardianphonenumber') is-invalid |@enderror" id="guardianphonenumber" aria-describedby="guardianphonenumber" value="{{$user->guardianphonenumber}}"  readonly required length="11"maxlength="11" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
        @error('guardianphonenumber')
        <span class="invalid-feedback" role="alert">
          {{$message}}
        </span>
        @enderror
      </div>
    </div> 
 
  
     <hr>
        <div class="form-info-header">
      <span>Preferred Distance Learning Modalyties</span>
    </div>
    <div class="enrollment-form-field" style="grid-template-columns:  3fr;">
      <div class="form-field">
        <div class="enrollment-form-field" style="grid-template-columns: 1fr 1fr 1fr 1fr; padding-left: 1.4rem;">
          <div class="form-field" style="margin-right: 3rem;">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" name="modality[]" id="modality" 
              @foreach($modalities as $modality)

              @if($modality->modality_id == 1)
              checked 
              @endif

              @endforeach>
              <label class="form-check-label" for="flexRadioDefault1">
                Modular(Print)
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" name="modality[]" id="modality"   
              @foreach($modalities as $modality)

              @if($modality->modality_id == 2)
              checked 
              @endif
              
              @endforeach>
              <label class="form-check-label" for="flexRadioDefault1">
                Modular(Digital)
              </label>
            </div>
          </div>
          <div class="form-field" style="margin-right: 3rem;">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" name="modality[]" id="modality" 
                @foreach($modalities as $modality)

              @if($modality->modality_id == 3)
              checked 
              @endif
              
              @endforeach>
              <label class="form-check-label" for="flexRadioDefault1">
                Online
              </label>
            </div>

            <div class="form-check">
              <input class="form-check-input" type="checkbox" name="modality[]" id="modality" 
                @foreach($modalities as $modality)

              @if($modality->modality_id == 4)
              checked 
              @endif
              
              @endforeach>
              <label class="form-check-label" for="flexRadioDefault1">
                Educational Television
              </label>
            </div>
          </div>
          <div class="form-field" style="margin-right: 3rem;">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" name="modality[]" id="modality"  
               @foreach($modalities as $modality)

              @if($modality->modality_id == 5)
              checked 
              @endif
              
              @endforeach>
              <label class="form-check-label" for="flexRadioDefault1">
                Radio-Based Instruction
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" name="modality[]" id="modality" 
                @foreach($modalities as $modality)

              @if($modality->modality_id == 6)
              checked 
              @endif
              
              @endforeach>
              <label class="form-check-label" for="flexRadioDefault1">
                Homeschooling
              </label>
            </div>
          </div>
          <div class="form-field" style="margin-right: 3rem;">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" name="modality[]" id="modality"
                @foreach($modalities as $modality)

              @if($modality->modality_id == 7)
              checked 
              @endif
              
              @endforeach>
              <label class="form-check-label" for="flexRadioDefault1">
                Blended
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" name="modality[]" id="modality" 
                @foreach($modalities as $modality)

              @if($modality->modality_id == 8)
              checked 
              @endif
              
              @endforeach>
              <label class="form-check-label" for="flexRadioDefault1">
                Face-to-Face
              </label>
            </div>
          </div>
        </div>
      </div>
    </div>

    <hr>
    <div id="transfer" class="transferee" @if($user->studenttype == 'Old Student') style="display:none;" @endif>
      <div class="form-info-header">
       
        <span>For Returning Learner(Balik-Aral) and Those Who Will Transfer/Move In</span>
      </div>
      <div class="enrollment-form-field" style="grid-template-columns: 1fr 1fr 1fr 1fr;">
           <div class="form-field">
          <label for="lastschoolattended">Last Grade Level Completed</label>
          <input placeholder="Last School" type="text" name="lastschoolattended" id="lastschoolattended" class="@error('lastschoolattended') is-invalid | @enderror" id="lastschoolattended" aria-describedby="lastschoolattended" value="{{$user->lastgradelevelcompleted}}" readonly>
          @error('lastschoolattended')
          <span class="invalid-feedback" role="alert">
            {{$message}}
          </span>
          @enderror
        </div>
        <div class="form-field ">
          <label for="lastschoolyearattended">Last School Year Completed</label>
          <input placeholder="YYYY" type="text" name="lastschoolyearattended" id="lastschoolyearattended" class="@error('lastschoolyearattended') is-invalid | @enderror" id="lastschoolyearattended" aria-describedby="lastschoolyearattended" value="{{$user->lastschoolyearattended}}" maxlength="4" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" readonly>
          @error('lastschoolyearattended')
          <span class="invalid-feedback" role="alert">
            {{$message}}
          </span>
          @enderror
        </div>
        <div class="form-field">
          <label for="lastschoolattended">Last School Attended</label>
          <input placeholder="Last School" type="text" name="lastschoolattended" id="lastschoolattended" class="@error('lastschoolattended') is-invalid | @enderror" id="lastschoolattended" aria-describedby="lastschoolattended" value="{{$user->lastschoolattended}}" readonly>
          @error('lastschoolattended')
          <span class="invalid-feedback" role="alert">
            {{$message}}
          </span>
          @enderror
        </div>
        <div class="form-field">
          <label for="schoolid">School ID </label>
          <input placeholder="School ID" type="text" name="schoolid" id="schoolid" class="@error('schoolid') is-invalid | @enderror" id="schoolid" aria-describedby="schoolid" value="{{$user->schoolid}}">
          @error('schoolid')
          <span class="invalid-feedback" role="alert">
            {{$message}}
          </span>
          @enderror
        </div>
      </div>
      <br>
      
    </div>
       <div class="enrollment-form-field" style="display: flex; flex-direction: flex-end; justify-content: flex-end; align-items: center;">
      <a href="{{url('admin/print',$user->id) }}"id="submit-enrollment-application">Print Enrolment Form</a>
    </div>
<br>
<br>
@php

if(($user->gradeleveltoenrolin == 'Grade 11') ||($user->gradeleveltoenrolin == 'Grade 12')){
  $section =  DB::table('sections')->where('grade',$user->gradeleveltoenrolin)->where('strand',$user->strandtoenrolin)->where('lower_gwa','<=',$user->generalaverage)->where('upper_gwa','>=',$user->generalaverage)->where('admission_status','Yes')->first();
}
else{

$section =  DB::table('sections')->where('grade',$user->gradeleveltoenrolin)->where('lower_gwa','<=',$user->generalaverage)->where('upper_gwa','>=',$user->generalaverage)->where('admission_status','Yes')->first();
}
$data = DB::table('users')->where('lrnnumber', $user->lrnnumber)->first();
$role = DB::table('role_user')->where('user_id', $data->id)->first();

@endphp

    <div class="enrollment-form-field">
      @if($role->role_id != 3  && $role->role_id != 7)
      @isset($section)
      <a style="font-size: 14px;" class="btn btn-success" href="{{route('admin.users.edit',$user->id) }}" role="button">Accept</a>
      @endisset
      <a style="font-size: 14px;" class="btn btn-danger" href="{{url('admin/reason',$user->id) }}" role="button">Reject</a>
      @endif
      <a style="font-size: 14px;" class="btn btn-warning" href="{{ URL::previous() }}" role="button">Back</a>
    </div>
  </div>
</div>
@endsection

