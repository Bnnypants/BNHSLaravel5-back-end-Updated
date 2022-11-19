@csrf

<div id="activate-student-account-details" class="container-fluid">
  <div class="enrollment-form-field">
    <div class="form-field">
      <label for="name" class="form-label">First Name</label>
      <input name="name" type="name" class="form-control @error('email') is-invalid |@enderror" id="name" aria-describedby="name" value="{{old('name')}} @isset($user){{$user->name}} @endisset" readonly>
    </div>
    <div class="form-field">
      <label for="middlename" class="form-label">Middle Name</label>
      <input name="middlename" type="text" class="form-control @error('middlename') is-invalid |@enderror" id="middlename" aria-describedby="middlename" value="{{old('middlename')}} @isset($user){{$user->middlename}} @endisset " readonly>
    </div>
    <div class="form-field">
      <label for="lastname" class="form-label">Last Name</label>
      <input name="lastname" type="text" class="form-control @error('lastname') is-invalid |@enderror" id="lastname" aria-describedby="lastname" value="{{old('lastname')}} @isset($user){{$user->lastname}} @endisset " readonly>
    </div>
  </div>
  <div class="enrollment-form-field" style="grid-template-columns: 1fr 1fr;">
    <div class="form-field">
      <label for="email" class="form-label">Email address</label>
      <input name="email" type="email" class="form-control @error('email') is-invalid |@enderror" id="email" aria-describedby="email" value="{{old('email')}} @isset($user){{$user->email}} @endisset" readonly>
    </div>
    <div class="form-field">
      <label for="phonenumber" class="form-label">PhoneNumber</label>
      <input name="phonenumber" type="text" class="form-control @error('phonenumber') is-invalid |@enderror" id="phonenumber" aria-describedby="phonenumber" value="{{old('phonenumber')}} @isset($user){{$user->phonenumber}} @endisset" readonly>
    </div>
  </div>
  <div class="enrollment-form-field" style="grid-template-columns:  1fr 1fr 1fr 1fr 1fr;">
          <div class="form-field">
      <label for="gradeleveltoenrolin" class="form-label">Student Type</label>
      <input name="gradeleveltoenrolin" type="text" class="form-control @error('gradeleveltoenrolin') is-invalid |@enderror" id="gradeleveltoenrolin" aria-describedby="gradeleveltoenrolin" value="{{old('gradeleveltoenrolin')}} @isset($user){{$user->studenttype}} @endisset" readonly>
    </div>
       <div class="form-field">
      <label for="gradeleveltoenrolin" class="form-label">General Average</label>
      <input name="gradeleveltoenrolin" type="text" class="form-control @error('gradeleveltoenrolin') is-invalid |@enderror" id="gradeleveltoenrolin" aria-describedby="gradeleveltoenrolin" value="{{old('gradeleveltoenrolin')}} @isset($user){{$user->generalaverage}} @endisset" readonly>
    </div>
      <div class="form-field">
      <label for="gradeleveltoenrolin" class="form-label">Last Grade Level Completed</label>
      <input name="gradeleveltoenrolin" type="text" class="form-control @error('gradeleveltoenrolin') is-invalid |@enderror" id="gradeleveltoenrolin" aria-describedby="gradeleveltoenrolin" value="{{old('gradeleveltoenrolin')}} @isset($user){{$user->lastgradelevelcompleted}} @endisset" readonly>
    </div>
    <div class="form-field">
      <label for="gradeleveltoenrolin" class="form-label">Grade Level Requested</label>
      <input name="gradeleveltoenrolin" type="text" class="form-control @error('gradeleveltoenrolin') is-invalid |@enderror" id="gradeleveltoenrolin" aria-describedby="gradeleveltoenrolin" value="{{old('gradeleveltoenrolin')}} @isset($user){{$user->gradeleveltoenrolin}} @endisset" readonly>
    </div>
    <div class="form-field">
      <label for="strandtoenrolin" class="form-label">Strand Requested</label>
      <input name="strandtoenrolin" type="text" class="form-control @error('strandtoenrolin') is-invalid |@enderror" id="strandtoenrolin" aria-describedby="strandtoenrolin" value="{{old('strandtoenrolin')}} @isset($user){{$user->strandtoenrolin}} @endisset" readonly>
    </div>
  </div>
  @if($section_current != Null)
  @php
 $adviser =  DB::table('teachers')->where('advisory',$section_current->id)->first();
@endphp

    <div class="enrollment-form-field" style="grid-template-columns:   1fr 1fr ;">
       
      <div class="form-field">
      <label for="gradeleveltoenrolin" class="form-label">Section to be Enrolled In</label>
      <input name="gradeleveltoenrolin" type="text" class="form-control @error('gradeleveltoenrolin') is-invalid |@enderror" id="gradeleveltoenrolin" aria-describedby="gradeleveltoenrolin" value="{{$section_current->grade}} - {{$section_current->strand}} - {{$section_current->section_number}} " readonly>
    </div>
    <div class="form-field">
      <label for="gradeleveltoenrolin" class="form-label">Adviser</label>
      <input name="gradeleveltoenrolin" type="text" class="form-control @error('gradeleveltoenrolin') is-invalid |@enderror" id="gradeleveltoenrolin" aria-describedby="gradeleveltoenrolin" value="@isset($adviser){{$adviser->firstname}} {{$adviser->lastname}}  @endisset" readonly>
    </div>
  </div>
  @endif
        <div class="form-field" id="semester" >
        <label for="semester" class="form-label">Accept as:</label>
        <div class="btn-group" role="group">
          <input type="radio" class="btn-check" name="accepted_as" value="Promoted" id="btnradio1" autocomplete="off" checked onclick="hide2();">
          <label class="semestral-btn btn btn-outline-success" for="btnradio1">Promoted</label>

          <input type="radio" class="btn-check" name="accepted_as" value="Conditionally Promoted" id="btnradio2" autocomplete="off" onclick="show2();">
          <label class="semestral-btn btn btn-outline-warning" for="btnradio2">Conditionally Promoted</label>

          <input type="radio" class="btn-check" name="accepted_as" value="Failed" id="btnradio3" autocomplete="off" onclick="hide2();">
          <label class="semestral-btn btn btn-outline-danger" for="btnradio3">Failed</label>
        </div>
      </div>
  <div class="form-field" style="display:none;" id="add_teacher" >
  @isset($warning)
     <label for="semester" class="form-label">Warning: Student isn't qualified for any section for any of his/her back subject</label>
  @endisset()  
@isset($section)
   <label for="semester" class="form-label">Student is qualified to take "back subjects" at <br> 
   {{$section->grade}} @isset($section->strand) {{$section->strand}} @endisset() - {{$section->section_number}}
  with @isset($adviser){{$adviser->firstname}} {{$adviser->lastname}} as the student's adviser @endisset()</label>
<br>
  <div class="enrollment-form-field" style="grid-template-columns: 1fr 1fr;">
          @foreach($subjects as $subject)

<div class="form-check" id="semester">
            @php   

$subject_teacher_data = DB::table('subjects_teachers')->where('id',$subject->subjects_teachers_id)->first();

$teacher_data = DB::table('teachers')->where('id',$subject_teacher_data->teachers_id)->first();

$subject_data = DB::table('subjects')->where('id',$subject_teacher_data->subjects_id)->first();

  @endphp

 <input type="checkbox" class="btn-check" id="{{$subject->id}}" value = "{{$subject->id}}" autocomplete="off" name="subjects[]">

<label  class="btn btn-outline-secondary" for="{{$subject->id}}">
 {{$subject_data->name}} || {{$teacher_data->firstname}} {{$teacher_data->lastname}}
  </label>

  
 </div>
  
  @endforeach
 </div>
  @endisset()
 </div>

  <hr>
  <div class="enrollment-form-field">
   @if($section_current != Null) <button style="font-size: 14px;" type="submit" class="btn btn-success">Send Activation Request</button> @endif
    <a style="font-size: 14px;" class="btn btn-warning" href="{{route('admin.users.show',$user->id) }}" role="button">View Enrolment Form</a>
    <a style="font-size: 14px;" class="btn btn-warning" href="{{route('admin.users.index',$user->id) }}" role="button">Back</a>
  </div>
</div>