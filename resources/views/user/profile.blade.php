@extends('template.main')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script class="jsbin" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>

<span id="enrollform-header">Enrollment Application Form</span>

<form method="POST" enctype="multipart/form-data" action="{{route('student.update_user')}}">
  
  @csrf
<input type="hidden" name="id" value="{{$user->id}}">
  <div id="enrollform-base">
    <center id="form-top-header">
      <img src={{URL::asset('logo.png')}} alt="Logo" id="form-school-logo">
      <span id="school-name">Basista National High School</span>
      <span id="school-location">Basista, Pangasinan</span>
      <span id="acadyear">Academic Year 2022 - 2023</span>
    </center>
    <br>
    <hr>
    <div class="form-info-header">
      <span>Grade level and School Information</span>
    </div>
    <div class="enrollment-form-field">
        <div class="form-field">
        <label for="lastgradelevelcompleted">Grade Level to Enrol In</label>
        <select name="gradeleveltoenrolin" id="lastgradelevelcompleted" onClick="return update();"
        >

          <option @isset($gradeleveltoenrolin) style="display:none" @endisset data="Grade 7" value="Grade 7" {{$user->gradeleveltoenrolin == 'Grade 7' ? 'selected' : ''}}>Grade 7</option>
          <option  @isset($gradeleveltoenrolin) style="display:none" @endisset  data="Grade 8" value="Grade 8" {{$user->gradeleveltoenrolin == 'Grade 8' ? 'selected' : ''}}>Grade 8</option>
          <option  @isset($gradeleveltoenrolin) style="display:none" @endisset data="Grade 9" value="Grade 9" {{$user->gradeleveltoenrolin == 'Grade 9' ? 'selected' : ''}}>Grade 9</option>
          <option  @isset($gradeleveltoenrolin) style="display:none" @endisset data="Grade 10" value="Grade 10" {{$user->gradeleveltoenrolin == 'Grade 10' ? 'selected' : ''}}>Grade 10</option>
          <option  @isset($gradeleveltoenrolin) style="display:none" @endisset data="Grade 11" value="Grade 11" {{$user->gradeleveltoenrolin == 'Grade 11' ? 'selected' : ''}}>Grade 11</option>
          <option  @isset($gradeleveltoenrolin) style="display:none" @endisset data="Grade 12" value="Grade 12" {{$user->gradeleveltoenrolin == 'Grade 12' ? 'selected' : ''}}>Grade 12</option>

        @isset($gradeleveltoenrolin)

        <option data="{{$user->gradeleveltoenrolin}}" value="{{$user->gradeleveltoenrolin}}" selected>{{$user->gradeleveltoenrolin}}</option>
        @if($gradeleveltoenrolin != 'Graduate')
          <option data="{{$gradeleveltoenrolin}}" value="{{$gradeleveltoenrolin}}" selected>{{$gradeleveltoenrolin}}</option>
         @endif 

         @endisset

        </select>
      </div>
         <div class="form-field" id="strandtoenrolin" {{$user->gradeleveltoenrolin == 'Grade 11' || $user->gradeleveltoenrolin == 'Grade 12' ? 'style="visibility: visible;"' : 'style="visibility: hidden;"'}}>
        <label for="strandtoenrolin" class="form-label">Strand to Enroll In</label>
        <select name="strandtoenrolin" id="strandtoenrolin2">
          <option data2="HUMMS" value="HUMMS" {{$user->strandtoenrolin== 'HUMMS' ? 'selected' : ''}}>Academics Track-HUMMS</option>
          <option data2="GAS" value="GAS" {{$user->strandtoenrolin== 'GAS' ? 'selected' : ''}}>Academic Track-GAS</option>
           <option data2="ABM" value="ABM" {{$user->strandtoenrolin== 'ABM' ? 'selected' : ''}}>Academics Track-ABM</option>
            <option data2="STEM" value="STEM" {{$user->strandtoenrolin== 'STEM' ? 'selected' : ''}}>Academics Track-STEM</option>
          <option data2="TVL" value="TVL" {{$user->strandtoenrolin== 'TVL' ? 'selected' : ''}}>Technical-Vocational-Livelihood Track - TVL</option>
          <option data2="COOKERY" value="COOKERY" {{$user->strandtoenrolin== 'COOKERY' ? 'selected' : ''}}>Technical-Vocational-Livelihood - COOKERY</option>
          <option data2="ICT" value="ICT" {{$user->strandtoenrolin== 'ICT' ? 'selected' : ''}}>Technical-Vocational-Livelihood - ICT</option>
         
         
        </select>
      </div>
         <div class="form-field" id="semester" {{$user->gradeleveltoenrolin == 'Grade 11' || $user->gradeleveltoenrolin == 'Grade 12' ? 'style="visibility: visible;"' : 'style="visibility: hidden;"'}}>
        <label for="semester" class="form-label">Enroll to semester:</label>
        <div class="btn-group" role="group">
          <input type="radio" class="btn-check" name="semester" value="1st" id="btnradio1" autocomplete="off" {{$user->semester == '1st' ? 'checked' : ''}}>
          <label class="semestral-btn btn btn-outline-success" for="btnradio1">1st Semester</label>

          <input type="radio" class="btn-check" name="semester" value="2nd" id="btnradio2" autocomplete="off" {{$user->semester == '2nd' ? 'checked' : ''}}>
          <label class="semestral-btn btn btn-outline-success" for="btnradio2">2nd Semester</label>
        </div>
      </div>

    </div>
    <div class="enrollment-form-field">

     <div class="form-field">
        <label for="returningstudent">Please Select One that Applies</label>
        <div class="form-field form-check @error('returningstudent') is-invalid |@enderror">
          <div>
            <input class="form-check-input" type="radio" name="studenttype" id="studenttype" value="Old Student" {{$user->studenttype == 'Old Student' ? 'checked' : ''}} onclick="hide1();">
            <label for="returningstudent">Old Student</label>
          </div>
          <div>
            <input class="form-check-input" type="radio" name="studenttype" id="studenttype" value="Transferee/Moving In" {{$user->studenttype == 'Transferee/Moving In' ? 'checked' : ''}} onclick="show1();"
                    @isset($gradeleveltoenrolin) style="display:none;" @endisset>
            <label for="returningstudent">Transferee/Moving In</label>
          </div>
          <div>
            <input class="form-check-input" type="radio" name="studenttype" id="studenttype" value="Balik Aral/Returning Student" {{$user->studenttype == 'Balik Aral/Returning Student' ? 'checked' : ''}} onclick="show1();"@isset($gradeleveltoenrolin) style="display:none;" @endisset>
            <label for="returningstudent">Balik Aral/Returning Student</label>
          </div>
        </div>
        @error('schooltype')
        <span class="invalid-feedback" role="alert">
          {{$message}}
        </span>
        @enderror
      </div>

      <div class="form-field">
        <label for="indegenouscommunityradio">Are you part of an indegenous community?</label>
        <div class="form-field form-check @error('indegenouscommunityradio') is-invalid |@enderror">
          <div>
            <input class="form-check-input" type="radio" name="indegenouscommunityradio" id="yesCheck1" value="YES" {{$user->indegenouscommunity ? 'checked' : ''}} onclick="yesnoCheck1(); displayChange()">
            <label for="returningstudent">Yes</label>
          </div>
          <div>
            <input class="form-check-input" type="radio" name="indegenouscommunityradio" id="noCheck1" value="NO" 
            {{$user->indegenouscommunity == NULL ? 'checked' : ''}} onclick="yesnoCheck1(); displayChange()" >
            <label for="indegenouscommunityradio">No</label>
          </div>
        </div>
        @error('indegenouscommunityradio')
        <span class="invalid-feedback" role="alert">
          {{$message}}
        </span>
        @enderror
      </div>

      
      <div class="form-field">
        <label for="indigencyradio">Are you a member of 4Ps?</label>
        <div class="form-field form-check @error('indigencyradio') is-invalid |@enderror">
          <div>
            <input class="form-check-input" type="radio" name="indigencyradio" id="indigencyradio" value="YES" 
              onclick="IndigencyyesnoCheck(); displayChange()" {{ $user->indigency ? 'checked' : ''}}>
            <label for="indiginceyradio">Yes</label>
          </div>
          <div>
            <input class="form-check-input" type="radio" name="indigencyradio" id="indigencyradio" value="NO" 
           onclick="IndigencyyesnoCheck(); displayChange()"
             {{$user->indigency == NULL ? 'checked' : ''}}>
            <label for="indigencyradio">No</label>
          </div>

        </div>
        @error('indigencyradio')
        <span class="invalid-feedback" role="alert">
          {{$message}}
        </span>
        @enderror
      </div>




    </div>
    <div class="enrollment-form-field" id="glsi" > 
      <div class="form-field" style="visibility:hidden;"></div>
      <div class="form-field" id="ifYes1">
        <label for="indegenouscommunity" class="form-label">If yes, please specifiy the indegenous group you belong to:</label>
        <input name="indegenouscommunity" type="text" class="form-control @error('indegenouscommunity') is-invalid |@enderror" id="IndegenousCommunitySpecification" aria-describedby="indegenouscommunity" value="{{$user->indegenouscommunity}}">
        @error('indegenouscommunity')
        <span class="invalid-feedback" role="alert">
          {{$message}}
        </span>
        @enderror

      </div>   
      <div class="form-field" id="indigencynumber" >
        <label for="indegency" class="form-label">If yes, what is your household 4Ps ID Number?</label>
        <input name="indigency" placeholder="18 Digits" type="number" class="form-control @error('indigency') is-invalid |@enderror" id="indigency" aria-describedby="indigency" value="{{$user->indigency}}"maxlength="18" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
        @error('indigency')
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
 
       
    <div class="enrollment-form-field">

      <div class="form-field">
        <label for="name">First Name</label>
        <input placeholder="Ex: Juan" name="name" type="text" class="@error('name') is-invalid |@enderror" id="name" aria-describedby="name" value="{{$user->name}}" required>
        @error('name')
        <span class="invalid-feedback" role="alert">
          {{$message}}
        </span>
        @enderror
      </div>
      <div class="form-field">
        <label for="middlename">Middle Name ( If without middlename, please skip )</label>
        <input placeholder="Ex: Tamad" name="middlename" type="text" class="@error('middlename') is-invalid |@enderror" id="middlename" aria-describedby="middlename" value="{{$user->middlename}}" >
        @error('middlename')
        <span class="invalid-feedback" role="alert">
          {{$message}}
        </span>
        @enderror
      </div>
      <div class="form-field">
        <label for="lastname">Last Name</label>
        <input placeholder="Ex: Dela Cruz" name="lastname" type="text" class="@error('lastname') is-invalid |@enderror" id="lastname" aria-describedby="lastname" value="{{$user->lastname}}" required>
        @error('lastname')
        <span class="invalid-feedback" role="alert">
          {{$message}}
        </span>
        @enderror
      </div>
       <div class="form-field">
  
      </div>
    
   <div id='extension_name' >
        <div class="form-field" >
        <label for="extension_name">Extension Name ( If without extension name, please skip )</label>
        <input placeholder="Ex: Jr." name="extension_name" type="text" class="@error('extension_name') is-invalid |@enderror" id="extension_name" aria-describedby="lastname" value="{{$user->extension_name}}">
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
        <input placeholder="##/###" style="width: 7rem;" name="currenthousenumber" type="number" class="@error('currenthousenumber') is-invalid |@enderror" id="currenthousenumber" aria-describedby="currenthousenumber" value="{{$user->currenthousenumber}}">
        @error('currenthousenumber')
        <span class="invalid-feedback" role="alert">
          {{$message}}
        </span>
        @enderror
      </div>
            <div class="form-field">
        <label for="currentbaranggay">Street</label>
        <input placeholder="Current Baranggay" name="currentstreet" type="text" class="@error('currentstreet') is-invalid |@enderror"  aria-describedby="currentstreet" value="{{$user->currentbaranggay}}">
        @error('currentstreet')
        <span class="invalid-feedback" role="alert">
          {{$message}}
        </span>
        @enderror
      </div>
      <div class="form-field">
        <label for="currentbaranggay">Baranggay</label>
        <input placeholder="Current Baranggay" name="currentbaranggay" type="text" class="@error('currentbaranggay') is-invalid |@enderror" id="currentbaranggay" aria-describedby="currentbaranggay" value="{{$user->currentbaranggay}}" required>
        @error('currentbaranggay')
        <span class="invalid-feedback" role="alert">
          {{$message}}
        </span>
        @enderror
      </div>
      <div class="form-field">
        <label for="currentmunicipality">Municipality</label>
        <input placeholder="Current Municipality" name="currentmunicipality" type="text" class="@error('currentmunicipality') is-invalid |@enderror" id="currentmunicipality" aria-describedby="currentmunicipality" value="{{$user->currentmunicipality}}" required>
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
        <input placeholder="Current Province" name="currentprovince" type="text" class="@error('currentprovince') is-invalid |@enderror" id="currentbaranggay" aria-describedby="currentprovince" value="{{$user->currentprovince}}" required>
        @error('currentprovince')
        <span class="invalid-feedback" role="alert">
          {{$message}}
        </span>
        @enderror
      </div>
       <div class="form-field">
          <label for="currentzipcode">Zip Code ( Municipality )</label>
             <input placeholder="4 Digits" name="currentzipcode" type="number" class="@error('currentzipcode') is-invalid |@enderror" id="permanentzipcode" aria-describedby="currentzipcode" value="{{$user->currentzipcode}}" maxlength="4" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" required >
          @error('currentzipcode')
          <span class="invalid-feedback" role="alert">
            {{$message}}
          </span>
          @enderror
        </div>
          <div class="form-field">
          <br>
              <a class="btn btn-outline-secondary" href="https://sites.google.com/site/departmentofphilippines/philippine-zip-codes/provincial-zip-codes/pangasinan-zip-code" role="button">View Pangasinan Municipality Zip Codes</a>
        </div>

      <div class="form-field">
        <label for="currentcountry">Country</label>
        <input placeholder="Current Country" name="currentcountry" type="text" class="@error('currentcountry') is-invalid |@enderror" id="currentprovince" aria-describedby="currentcountry  " value="{{$user->currentcountry}}" required>
        @error('currentcountry')
        <span class="invalid-feedback" role="alert">
          {{$message}}
        </span>
        @enderror
      </div>

      </div>
    <div class="form-info-header">
            <div class="enrollment-form-field">
      <div class="form-check" >
        <input class="form-check-input" type="radio" name="permanentyes" value="YES" {{$user->permanentprovince == NULL ? 'checked' : ''}} id="permanentyes" style=" width: 1rem !important;  height: 1rem !important;" onclick="hide2()";>
        <label class="form-check-label" for="flexRadioDefault1">
        My current address is my permanent address
        </label>
      </div>
           <div class="form-check" >
        <input class="form-check-input" type="radio" name="permanentyes" value="NO" {{$user->permanentprovince  ? 'checked' : ''}} style=" width: 1rem !important;  height: 1rem !important;" onclick="show2()";>
        <label class="form-check-label" for="flexRadioDefault1">
        I have a different permanent address
        </label>
      </div>
      <div class="form-field"></div>
        </div>
      <br>

    


    </div>
    <div id="add_teacher">
      <div class="enrollment-form-field" style="grid-template-columns: auto 1fr 1fr 1fr">

        <div class="form-field">
          <label for="permanenthousenumber">House Number</label>
          <input placeholder="##/###" style="width: 7rem;" name="permanenthousenumber" type="number" class="@error('permanenthousenumber') is-invalid |@enderror" id="permanenthousenumber" aria-describedby="permanenthousenumber" value="{{$user->permanenthousenumber}}">
          @error('permanenthousenumber')
          <span class="invalid-feedback" role="alert">
            {{$message}}
          </span>
          @enderror
        </div>
             <div class="form-field">
          <label for="permanentstreet">Street</label>
          <input placeholder="Permanent Street" name="permanentstreet" type="text" class="@error('permanentstreet') is-invalid |@enderror"  aria-describedby="permanentstreet" value="{{$user->permanentstreet}}">
          @error('permanentstreet')
          <span class="invalid-feedback" role="alert">
            {{$message}}
          </span>
          @enderror
        </div>
        <div class="form-field">
          <label for="permanentbaranggay">Baranggay</label>
          <input placeholder="Permanent Baranggay" name="permanentbaranggay" type="text" class="@error('permanentbaranggay') is-invalid |@enderror"  id="permanentbaranggay" aria-describedby="permanentbaranggay" value="{{$user->permanentbaranggay}}">
          @error('permanentbaranggay')
          <span class="invalid-feedback" role="alert">
            {{$message}}
          </span>
          @enderror
        </div>
        <div class="form-field">
          <label for="permanentmunicipality">Municipality</label>
          <input placeholder="Permanent Municipality" name="permanentmunicipality" type="text" class="@error('permanentmunicipality') is-invalid |@enderror" id="permanentmunicipality" aria-describedby="permanentmunicipality" value="{{$user->permanentmunicipality}}">
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
        <input placeholder="Permanent Province" name="permanentprovince" type="text" class="@error('permanentprovince') is-invalid |@enderror" id="permanentprovince" aria-describedby="permanentprovince" value="{{$user->permanentprovince}}">
        @error('permanentprovince')
        <span class="invalid-feedback" role="alert">
          {{$message}}
        </span>
        @enderror
      </div>
        <div class="form-field">
          <label for="permanentzipcode">Zip Code ( Municipality )</label>
             <input placeholder="4 Digits" name="permanentzipcode" type="number" class="@error('permanentzipcode') is-invalid |@enderror" id="permanentzipcode" aria-describedby="permanentzipcode" value="{{$user->permanentzipcode}}" maxlength="4" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" >
          @error('permanentzipcode')
          <span class="invalid-feedback" role="alert">
            {{$message}}
          </span>
          @enderror
      
        </div>
        <div class="form-field">
          <br>
              <a class="btn btn-outline-secondary" href="https://sites.google.com/site/departmentofphilippines/philippine-zip-codes/provincial-zip-codes/pangasinan-zip-code" role="button">View Pangasinan Municipality Zip Codes</a>
        </div>
        <div class="form-field">
          <label for="permanentcountry">Country</label>
          <input placeholder="Permanent Country" name="permanentcountry" type="text" class="@error('permanentcountry') is-invalid |@enderror"  aria-describedby="permanentcountry" value="{{$user->permanentcountry}}" >
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
        <label for="phonenumber">Phone Number (63*********)</label>
        <input placeholder="###########" name="phonenumber" type="number" class="@error('phonenumber') is-invalid |@enderror" id="phonenumber" aria-describedby="PhoneNumber" value="{{$user->phonenumber}}" required maxlength="11" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
        @error('phonenumber')
        <span class="invalid-feedback" role="alert">
          {{$message}}    
        </span>
        @enderror
      </div>
      <div class="form-field">
        <label for="birthday">Birthday</label>
        <input placeholder="Birthday" style="width: 10rem;" name="birthday" type="text" class="@error('birthday') is-invalid |@enderror" id="birthday" aria-describedby="birthday" value="{{$user->birthday}}" required readonly>
        @error('birthday')
        <span class="invalid-feedback" role="alert">
          {{$message}}
        </span>
        @enderror
      </div>
       <div class="form-field">
        <label for="age">Age </label>
    
        <input  readonly placeholder="##" name="age" type="number" class="@error('age') is-invalid |@enderror" id="age" aria-describedby="age" value="{{$user->age}}" maxlength="2"   required>
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
            <input class="form-check-input" type="radio" name="sex" id="sex" value="Male" {{$user->sex  == 'Male' ? 'checked' : ''}}>
            <label for="sex">Male</label>
          </div>
          <div>
            <input class="form-check-input" type="radio" name="sex" id="sex" value="Female" {{$user->sex  == 'Female' ? 'checked' : ''}}>
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
        <input placeholder="Ex: Pangasinan, Ilocano" name="mothertongue" type="text" class="@error('mothertongue') is-invalid |@enderror" id="mothertongue" aria-describedby="mothertongue" value="{{$user->mothertongue}}" required>
        @error('mothertongue')
        <span class="invalid-feedback" role="alert">
          {{$message}}
        </span>
        @enderror
      </div>
      <div class="form-field">
        <label for="birthplace">Place of Birth ( Municipality )</label>
        <input placeholder="Place of Birth ( Municipality )" name="birthplace" type="text" class="  @error('birthplace') is-invalid |@enderror" id="birthplace" aria-describedby="religion" value="{{$user->birthplace}}" required>
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
        <input placeholder="###" name="generalaverage" type="number" class="@error('generalaverage') is-invalid |@enderror" id="generalaverage" aria-describedby="generalaverage" value="{{$user->generalaverage}}" maxlength="3" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength); " min="0" max="99" onchange="
        if (this.value <= 0 || this.value > 100) { 
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
  <div class="form-check" >
        <input class="form-check-input" type="checkbox" name="banana" value="yes" {{ old('banana') ? 'checked' : ''}} id="banana" checked readonly style="    width: 1rem !important;
    height: 1rem !important;
    padding: 0;
    border-radius: 50px !important;
    display: flex;
    flex-direction: column;
    justify-content: flex-start;
    align-items: flex-start;">
        <label class="form-check-label" for="flexRadioDefault1">
          With LRN (Learner's Reference Number)
        </label>
      </div>
<br>
        
        <input placeholder="12 Digits" name="lrnnumber" type="number" class="@error('lrnnumber') is-invalid |@enderror" id="lrnnumber" aria-describedby="lrnnumber" value="{{$user->lrnnumber}}" maxlength="12" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" required>
        @error('lrnnumber')
        <span class="invalid-feedback" role="alert">
          {{$message}}
        </span>
        @enderror
      </div>
      
            <div class="form-field">
        <label for="psastatus">Do you have your PSA?</label>
        <div class="form-field form-check @error('psastatus') is-invalid |@enderror">
          <div>
            <input class="form-check-input" type="radio" name="psastatus" id="psastatus" value="YES" onclick="javascript:PSAyesnoCheck()" ; {{ $user->psastatus ? 'checked' : ''}}>
            <label for="Yes">Yes</label>
          </div>
          <div>
            <input class="form-check-input" type="radio" name="psastatus" id="psastatus" value="NO" onclick="javascript:PSAyesnoCheck()" ; {{ $user->psastatus ==  NULL ? 'checked' : ''}}>
            <label for="No">No</label>
          </div>
        </div>
        @error('psastatus')
        <span class="invalid-feedback" role="alert">
          {{$message}}
        </span>
        @enderror
      </div>
      <div class="form-field" id="PSAyes" >
        <label for="psanumber">PSA Birth Certificate no. (If available upon enrolment)</label>
        <input placeholder="12 Digits" name="psanumber" type="number" class="@error('psanumber') is-invalid |@enderror" id="psanumber" aria-describedby="psanumber" value="{{$user->psanumber}}" minlength="12" maxlength="12" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
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
          <div class="file-select">
            <div class="file-select-button" id="fileName">PSA/NSO/ Birth Certificate</div>
            <div class="file-select-name" id="noFile">No file chosen...</div>
            <input name="chooseFile" type="file" class="@error('chooseFile') is-invalid |@enderror" id="chooseFile" aria-describedby="chooseFile" required>
            @error('chooseFile')
            <span class="invalid-feedback" role="alert">
              {{$message}}
            </span>
            @enderror
          </div>
        </div>
      </div>
      <div class="form-field">
        <label for="documents">&MediumSpace;</label>
        <div style="width: 100%;" class="file-upload" id="file-upload2">
          <div class="file-select">
            <div class="file-select-button" id="fileName2">SF9/ Report Card</div>
            <div class="file-select-name" id="noFile2">No file chosen...</div>
            <input type="file" name="chooseFile2" id="chooseFile2" class="@error('chooseFile2') is-invalid |@enderror" aria-describedby="chooseFile2" required>
            @error('chooseFile2')
            <span class="invalid-feedback" role="alert">
              {{$message}}
            </span>
            @enderror
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
        <input placeholder="First Name" name="fatherfirstname" type="text" class="@error('fatherfirstname') is-invalid |@enderror" id="fatherfirstname" aria-describedby="fatherfirstname" value="{{$user->fatherfirstname}}" required>
        @error('fatherfirstname')
        <span class="invalid-feedback" role="alert">
          {{$message}}
          FatherMiddleName
          @enderror
      </div>
      <div class="form-field">
        <label for="fathermiddlename">Father's Middle Name</label>
        <input placeholder="Middle Name" name="fathermiddlename" type="text" class="@error('fathermiddlename') is-invalid |@enderror" id="fathermiddlename" aria-describedby="FatherMiddleName" value="{{$user->fathermiddlename}}" required>
        @error('fathermiddlename')
        <span class="invalid-feedback" role="alert">
          {{$message}}
        </span>
        @enderror
      </div>
      <div class="form-field">
        <label for="fatherlastname">Father's Last Name</label>
        <input placeholder="Last Name" name="fatherlastname" type="text" class="@error('fatherlastname') is-invalid |@enderror" id="fatherlastname" aria-describedby="fatherlastname" value="{{$user->fatherlastname}}">
        @error('fatherlastname')
        <span class="invalid-feedback" role="alert" required>
          {{$message}}
        </span>
        @enderror
      </div>
      <div class="form-field">
        <label for="fatherphonenumber">Father's Contact Number</label>
        <input placeholder="###########" name="fatherphonenumber" type="number" class="@error('fatherphonenumber') is-invalid |@enderror" id="fatherphonenumber" aria-describedby="fatherphonenumber" value="{{$user->fatherphonenumber}}" required required maxlength="11" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
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
        <input placeholder="First Name" name="motherfirstname" type="text" class="@error('motherfirstname') is-invalid |@enderror" id="motherfirstname" aria-describedby="motherfirstname" value="{{$user->motherfirstname}}" required>
        @error('motherfirstname')
        <span class="invalid-feedback" role="alert">
          {{$message}}
        </span>
        @enderror
      </div>
      <div class="form-field">
        <label for="mothermiddlename">Mother's Middle Name</label>
        <input placeholder="Middle Name" name="mothermiddlename" type="text" class="@error('mothermiddlename') is-invalid |@enderror" id="mothermiddlename" aria-describedby="mothermiddlename" value="{{$user->mothermiddlename}}" required>
        @error('mothermiddlename')
        <span class="invalid-feedback" role="alert">
          {{$message}}
        </span>
        @enderror
      </div>
      <div class="form-field">
        <label for="motherlastname">Mother's Last Name</label>
        <input placeholder="Last Name" name="motherlastname" type="text" class="@error('motherlastname') is-invalid |@enderror" id="motherlastname" aria-describedby="motherlastname" value="{{$user->motherlastname}}" required>
        @error('motherlastname')
        <span class="invalid-feedback" role="alert">
          {{$message}}
        </span>
        @enderror
      </div>
      <div class="form-field">
        <label for="motherphonenumber">Mother's Contact Number</label>
        <input placeholder="###########" name="motherphonenumber" type="number" class="@error('motherphonenumber') is-invalid |@enderror" id="motherphonenumber" aria-describedby="motherphonenumber" value="{{$user->motherphonenumber}}" required required maxlength="11" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
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
        <input placeholder="Middle Name" name="guardianmiddlename" type="text" class="@error('guardianmiddlename') is-invalid |@enderror" id="guardianmiddlename" aria-describedby="guardianmiddlename" value="{{$user->guardianmiddlename}}" required>
        @error('guardianmiddlename')
        <span class="invalid-feedback" role="alert">
          {{$message}}
        </span>
        @enderror
      </div>
      <div class="form-field">
        <label for="guardianlastname">Guardian's Last Name</label>
        <input placeholder="Last Name" name="guardianlastname" type="text" class="@error('guardianlastname') is-invalid |@enderror" id="guardianlastname" aria-describedby="guardianlastname" value="{{$user->guardianlastname}}" required>
        @error('guardianlastname')
        <span class="invalid-feedback" role="alert">
          {{$message}}
        </span>
        @enderror
      </div>
      <div class="form-field">
        <label for="guardianphonenumber">Guardian's Contact Number</label>
        <input placeholder="###########" name="guardianphonenumber" type="number" class="@error('guardianphonenumber') is-invalid |@enderror" id="guardianphonenumber" aria-describedby="guardianphonenumber" 
        value="{{$user->guardianphonenumber}}" required length="11"maxlength="11" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
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
         @error('modality')
        <span class="invalid-feedback" role="alert">
          {{$message}}
        </span>
        @enderror
    <div class="enrollment-form-field" style="grid-template-columns:  3fr;">
      <div class="form-field">
        <label>What distance learning modality/ies do you prefer for yourself or your child?</label>
        <div class="enrollment-form-field" style="grid-template-columns: 1fr 1fr 1fr 1fr; padding-left: 1.4rem;">
          <div class="form-field" style="margin-right: 3rem;">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="1" name="modality[]" id="modality" {{$user->modalities[0]['pivot']['modality_id'] == 1 ? 'checked' : ''}}>
              <label class="form-check-label" for="flexRadioDefault1">
                Modular(Print)
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="2" name="modality[]" id="modality" {{$user->modalities[0]['pivot']['modality_id'] == 2 ? 'checked' : ''}}>
              <label class="form-check-label" for="flexRadioDefault1">
                Modular(Digital)
              </label>
            </div>
          </div>
          <div class="form-field" style="margin-right: 3rem;">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="3" name="modality[]" id="modality" {{$user->modalities[0]['pivot']['modality_id'] == 3 ? 'checked' : ''}}>
              <label class="form-check-label" for="flexRadioDefault1">
                Online
              </label>
            </div>

            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="4" name="modality[]" id="modality" {{$user->modalities[0]['pivot']['modality_id'] == 4 ? 'checked' : ''}}>
              <label class="form-check-label" for="flexRadioDefault1">
                Educational Television
              </label>
            </div>
          </div>
          <div class="form-field" style="margin-right: 3rem;">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="5" name="modality[]" id="modality" {{$user->modalities[0]['pivot']['modality_id'] == 5 ? 'checked' : ''}}>
              <label class="form-check-label" for="flexRadioDefault1">
                Radio-Based Instruction
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="6" name="modality[]" id="modality" {{$user->modalities[0]['pivot']['modality_id'] == 6 ? 'checked' : ''}}>
              <label class="form-check-label" for="flexRadioDefault1">
                Homeschooling
              </label>
            </div>
          </div>
          <div class="form-field" style="margin-right: 3rem;">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="7" name="modality[]" id="modality" {{$user->modalities[0]['pivot']['modality_id'] == 7 ? 'checked' : ''}}>
              <label class="form-check-label" for="flexRadioDefault1">
                Blended
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="8" name="modality[]" id="modality" {{$user->modalities[0]['pivot']['modality_id'] == 8 ? 'checked' : ''}}>
              <label class="form-check-label" for="flexRadioDefault1">
                Face-to-Face
              </label>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div id="transfer" class="transferee" @isset($gradeleveltoenrolin) style="display:none" @endisset>
      <div class="form-info-header">
        <hr>
        <span>For Returning Learner(Balik-Aral) and Those Who Will Transfer/Move In</span>
      </div>
      <div class="enrollment-form-field" style="grid-template-columns: 1fr 1fr 1fr 1fr;">
        <div class="form-field" id="gradeleveltoenrolin">
          <label for="gradeleveltoenrolin">Last Grade Level Completed</label>
          <select name="lastgradelevelcompleted" id="gradeleveltoenrolin">
             <option id="grade6"  value="Kinder 1">Kinder 1</option>
            <option id="grade6"  value="Kinder 1">Kinder 2</option>
            <option id="grade6"  value="Grade 1">Grade 1</option>
            <option id="grade6"  value="Grade 2">Grade 2</option>
            <option id="grade6"  value="Grade 3">Grade 3</option>
            <option id="grade6"  value="Grade 4">Grade 4</option>
            <option id="grade6"  value="Grade 5">Grade 5</option>
            <option id="grade6"  value="Grade 6">Grade 6</option>
            <option id="grade7" style="display: none;" data="Grade 7" value="Grade 7">Grade 7</option>
            <option id="grade8" style="display: none;" data="Grade 8" value="Grade 8">Grade 8</option>
            <option id="grade9" style="display: none;" data="Grade 9" value="Grade 9">Grade 9</option>
            <option id="grade10" style="display: none;" data="Grade 10" value="Grade 10">Grade 10</option>
            <option id="grade11" style="display: none;" data="Grade 11" value="Grade 11">Grade 11</option>
            <option id="grade12" style="display: none;" data="Grade 12" value="Grade 12">Grade 12</option>
          </select>
        </div>
        <div class="form-field ">
          <label for="lastschoolyearattended">Last School Year Completed </label>
          <input placeholder="YYYY" type="number" name="lastschoolyearattended" id="lastschoolyearattended" class="@error('lastschoolyearattended') is-invalid | @enderror" id="lastschoolyearattended" aria-describedby="lastschoolyearattended" value="{{$user->lastschoolyearattended}}" maxlength="4" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
          @error('lastschoolyearattended')
          <span class="invalid-feedback" role="alert">
            {{$message}}
          </span>
          @enderror
        </div>
        <div class="form-field">
          <label for="lastschoolattended">Last School Attended</label>
          <input placeholder="Last School" type="text" name="lastschoolattended" id="lastschoolattended" class="@error('lastschoolattended') is-invalid | @enderror" id="lastschoolattended" aria-describedby="lastschoolattended" value="{{$user->lastschoolattended}}">
          @error('lastschoolattended')
          <span class="invalid-feedback" role="alert">
            {{$message}}
          </span>
          @enderror
        </div>
        <div class="form-field">
          <label for="schoolid">School ID</label>
          <input placeholder="6 Digits" type="number" name="schoolid" id="schoolid" class="@error('schoolid') is-invalid | @enderror" id="schoolid" aria-describedby="schoolid" value="{{$user->schoolid}}"maxlength="6" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
          @error('schoolid')
          <span class="invalid-feedback" role="alert">
            {{$message}}
          </span>
          @enderror
        </div>
      </div>
    </div>
    <hr>
            <div class="form-info-header">
      <span>   By clicking "Submit" you hereby certify that the above information given are true and correct to the best of your knowledge and you allow the Department of Education to use your child’s details to 
create and/or update his/her learner profile in the Learner Information System. The information herein shall be treated as confidential in compliance with the Data Privacy Act of 
2012.</span>
    </div>
    <div class="enrollment-form-field" style="display: flex; flex-direction: flex-end; justify-content: flex-end; align-items: center;">
      <button type="submit" id="submit-enrollment-application">Submit Enrollment Application</button>
    </div> 
</form>

@endsection