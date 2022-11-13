@php
use Carbon\Carbon;
$schoolyear =  DB::table('schoolyear')->where('status','active')->orWhere('status','paused')->first();
$now = Carbon::now();
$current = $now->year;
	$p = 0;
$a = 0;

@endphp


    <span id="enrollment-applications-container-base-header">
    	School Year: {{$schoolyear->year_start}} - {{$schoolyear->year_end}}

   <div class="form-field" id="semester" >
  
            <form method="POST" action=" {{route('faculty.schoolyear.update',$schoolyear->id) }}">
            	@method('PATCH') 
            	        @csrf
        <div class="btn-group" role="group">

     

    	<input type="hidden" name="status" value="{{$schoolyear->status}}">

        <button name= "label" type="submit"
        @if($schoolyear->status == 'active')
        class="btn btn-success"
        {{$label = 'Active'}}
        {{$note = 'We are accepting enrolment request'}}
        @endif 
        @if($schoolyear->status == 'paused')
        class="btn btn-warning"
        {{$label = 'Paused'}}
        {{$note = 'We are currently not accepting enrolment request'}}
        @endif
        > {{$label}}</button>


        </div>
         </form>
      </div>
      <small id="enrolemt-application-updated-at">
    	 <b>Note: {{$note}} </b>
    	</small>

    	<small id="enrolemt-application-updated-at"><i class="fi fi-rr-calendar"></i>
    	<b> Starts/Started at {{$schoolyear->enrolment_start}} </b>
    	</small>

    	<small id="enrolemt-application-updated-at"><i class="fi fi-rr-calendar"></i>
    	<b> Ends/Ended at {{$schoolyear->enrolment_end}} </b>
    	</small>

    	<small id="enrolemt-application-updated-at">
     
    	</small>

        <div class="btn-group" role="group">


        <button name= "label" type="button" class="btn btn-success"  onclick="show3();">New School Year</button>

        <button name= "label" type="button" class="btn btn-warning" onclick="show4();">Edit School Year</button>


        </div>
   </span>

<form method="POST" action=" {{route('faculty.schoolyear.edit',$schoolyear->id) }}"id="update_schoolyear" style="display:none;">
        @method('GET')
     @csrf
    
    <span id="enrollment-applications-container-base-header" >
      Update School Year
    	   <div class="form-field">
        <label for="lastgradelevelcompleted"> Year</label>
        <select name="year" id="lastgradelevelcompleted" >

  
    	 @while($p<10)
	     <option value="{{$year = $current++}}"

       @if($year == $schoolyear->year_start)

       selected 

       @endif

       >{{$year}} - {{$year + 1}}</option>
         @php $p++; @endphp

          @endwhile

     </select>
      </div>
 <div class="enrollment-form-field" >  

       <div class="enrollment-form-field">  
        <div class="form-field">
        <label for="lastgradelevelcompleted">Starts At Month:</label>
        <select name="month_start" id="lastgradelevelcompleted" >
   {{$month = Carbon::parse($schoolyear->enrolment_start)->format('m')}}
	     <option @if($month == "01") selected @endif value="01">January</option>
	     <option @if($month == "02") selected @endif value="02">Febuary</option>
	     <option @if($month == "03") selected @endif value="03">March</option>
	     <option @if($month == "04") selected @endif value="04">April</option>
	     <option @if($month == "05") selected @endif value="05">May</option>
	     <option @if($month == "06") selected @endif value="06">June</option>
	     <option @if($month == "07") selected @endif value="07">July</option>
	     <option @if($month == "08") selected @endif value="08">August</option>
	     <option @if($month == "09") selected @endif value="09">September</option>
	     <option @if($month == "10") selected @endif value="10">October</option>
	     <option @if($month == "11") selected @endif value="11">November</option>
	     <option @if($month == "12") selected @endif value="12">December</option>


     </select>
      </div>
      <div class="form-field">
        <span style="display:none;">
              {{$day_start = Carbon::parse($schoolyear->enrolment_start)->format('d')}}
          {{ $day_end = Carbon::parse($schoolyear->enrolment_end)->format('d')}}
        </span>
       
        <label for="generalaverage">Starts at Date:</label>
        <input name="date_start" type="number" class="@error('date_start') is-invalid |@enderror" id="date_start" aria-describedby="date_start" value="{{$day_start}}" maxlength="2" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength); " min="1" max="31" onchange="
        if (this.value < 1 || this.value > 31) { 
          this.style.borderColor = 'red'; 
          document.getElementById('ga-alert').style.display = 'block' 
          }
          else { 
            this.style.borderColor = '#d9d9d9'; 
            document.getElementById('ga-alert').style.display = 'none' 
            } 
        " required>
        @error('date_start')
        <span id="ga-alert" class="invalid-feedback" role="alert">
          {{$message}}
        </span>
        @enderror
        <span style="display: none;" id="ga-alert" class="invalid-feedback" role="alert">
          Invalid Date
        </span>
      </div>
       </div>
  </div>
    <div class="enrollment-form-field">  


  <div class="form-field">
        <label for="lastgradelevelcompleted">Ends At Month:</label>
        <select name="month_end" id="lastgradelevelcompleted" >
   
   {{$month = Carbon::parse($schoolyear->enrolment_end)->format('m')}}
       <option @if($month == "01") selected @endif value="01">January</option>
       <option @if($month == "02") selected @endif value="02">Febuary</option>
       <option @if($month == "03") selected @endif value="03">March</option>
       <option @if($month == "04") selected @endif value="04">April</option>
       <option @if($month == "05") selected @endif value="05">May</option>
       <option @if($month == "06") selected @endif value="06">June</option>
       <option @if($month == "07") selected @endif value="07">July</option>
       <option @if($month == "08") selected @endif value="08">August</option>
       <option @if($month == "09") selected @endif value="09">September</option>
       <option @if($month == "10") selected @endif value="10">October</option>
       <option @if($month == "11") selected @endif value="11">November</option>
       <option @if($month == "12") selected @endif value="12">December</option>


     </select>
      </div>

      <div class="form-field">
        <label for="generalaverage">Ends at Date</label>
        <input placeholder="##" name="date_end" type="number" class="@error('date_end') is-invalid |@enderror" id="date_end" aria-describedby="date_end" value="{{$day_end}}" maxlength="2" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength); " min="1" max="31" onchange="
        if (this.value < 1 || this.value > 31) { 
          this.style.borderColor = 'red'; 
          document.getElementById('ga-alert').style.display = 'block' 
          }
          else { 
            this.style.borderColor = '#d9d9d9'; 
            document.getElementById('ga-alert').style.display = 'none' 
            } 
        " required>
        @error('date_end')
        <span id="ga-alert" class="invalid-feedback" role="alert">
          {{$message}}
        </span>
        @enderror
        <span style="display: none;" id="ga-alert" class="invalid-feedback" role="alert">
          Invalid Date
        </span>
      </div>
  </div>
      <div class="enrollment-form-field" style="display: justify-content: flex-end; align-items: center;">
      <button type="submit"  class="btn btn-success"  >Update School Year</button>
  <button type="button"  class="btn btn-warning" onclick="hide4();">Cancel</button>
    </div>
      <small id="enrolemt-application-updated-at">
      Note: Starting a new schoolyear will end the current schoolyear. <br>
      This will cause all new, updated ,rejected and accepted enrolment forms to be deleted from the system.
      </small>
   </span>

  </form>

  @php


$now = Carbon::now();
$current = $now->year;

$a = 0;

@endphp


<form method="POST" action=" {{route('faculty.schoolyear.store') }}" style="display:none;" id="new_schoolyear">
     @csrf
        <input type="hidden" name="current_schoolyear" value="{{$schoolyear->id}}">
    <span id="enrollment-applications-container-base-header" >

    Add New School Year
       <div class="form-field">
        <label for="lastgradelevelcompleted"> Year</label>
        <select name="year" id="lastgradelevelcompleted" >

  
       @while($a<10)
       <option value="{{$year = $current++}}"

       @if($year == $schoolyear->year_start)

       selected 

       @endif

       >{{$year}} - {{$year + 1}}</option>
         @php $a++; @endphp

          @endwhile

     </select>
      </div>
 <div class="enrollment-form-field" >  

       <div class="enrollment-form-field">  
        <div class="form-field">
        <label for="lastgradelevelcompleted">Starts At Month:</label>
        <select name="month_start" id="lastgradelevelcompleted" >
   
       <option value="1">January</option>
       <option value="2">Febuary</option>
       <option value="3">March</option>
       <option value="4">April</option>
       <option value="5">May</option>
       <option value="6">June</option>
       <option value="7">July</option>
       <option value="8">August</option>
       <option value="9">September</option>
       <option value="10">October</option>
       <option value="11">November</option>
       <option value="12">December</option>


     </select>
      </div>
      <div class="form-field">
        <label for="generalaverage">Starts at Date:</label>
        <input placeholder="##" name="date_start" type="number" class="@error('date_start') is-invalid |@enderror" id="date_start" aria-describedby="date_start" value="{{old('date_start')}}" maxlength="2" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength); " min="1" max="31" onchange="
        if (this.value < 1 || this.value > 31) { 
          this.style.borderColor = 'red'; 
          document.getElementById('ga-alert').style.display = 'block' 
          }
          else { 
            this.style.borderColor = '#d9d9d9'; 
            document.getElementById('ga-alert').style.display = 'none' 
            } 
        " required>
        @error('date_start')
        <span id="ga-alert" class="invalid-feedback" role="alert">
          {{$message}}
        </span>
        @enderror
        <span style="display: none;" id="ga-alert" class="invalid-feedback" role="alert">
          Invalid Date
        </span>
      </div>
       </div>
  </div>
    <div class="enrollment-form-field">  


  <div class="form-field">
        <label for="lastgradelevelcompleted">Ends At Month:</label>
        <select name="month_end" id="lastgradelevelcompleted" >
   
       <option value="1">January</option>
       <option value="2">Febuary</option>
       <option value="3">March</option>
       <option value="4">April</option>
       <option value="5">May</option>
       <option value="6">June</option>
       <option value="7">July</option>
       <option value="8">August</option>
       <option value="9">September</option>
       <option value="10">October</option>
       <option value="11">November</option>
       <option value="12">December</option>


     </select>
      </div>

      <div class="form-field">
        <label for="generalaverage">Ends at Date</label>
        <input placeholder="##" name="date_end" type="number" class="@error('date_end') is-invalid |@enderror" id="date_end" aria-describedby="date_end" value="{{old('date_end')}}" maxlength="2" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength); " min="1" max="31" onchange="
        if (this.value < 1 || this.value > 31) { 
          this.style.borderColor = 'red'; 
          document.getElementById('ga-alert').style.display = 'block' 
          }
          else { 
            this.style.borderColor = '#d9d9d9'; 
            document.getElementById('ga-alert').style.display = 'none' 
            } 
        " required>
        @error('date_end')
        <span id="ga-alert" class="invalid-feedback" role="alert">
          {{$message}}
        </span>
        @enderror
        <span style="display: none;" id="ga-alert" class="invalid-feedback" role="alert">
          Invalid Date
        </span>
      </div>
  </div>
      <div class="enrollment-form-field" style="display: justify-content: flex-end; align-items: center;">
      <button type="submit"  class="btn btn-success"  >Start a new School Year</button>
  <button type="button"  class="btn btn-warning" onclick="hide3();">Cancel</button>
    </div>
      <small id="enrolemt-application-updated-at">
      Note: Starting a new schoolyear will end the current schoolyear. <br>
      This will cause all new, updated ,rejected and accepted enrolment forms to be deleted from the system.
      </small>
   </span>

  </form>


