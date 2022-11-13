@extends('template.main')
@section('content')

<div id="enrollment-applications-container-base">
  <div id="enrollment-table-container">
    <span id="enrollment-applications-container-base-header">
      {{$student->name}} {{$student->middlename}} {{$student->lastname}}
 <small id="enrolemt-application-updated-at">Accepted as: {{$student->accepted_as}} </small>
 <small id="enrolemt-application-updated-at">@isset($back_section)Back subject/s to be taken at :{{$back_section->grade}} - {{$back_section->strand}} | {{$back_section->section_number}}@endisset() </small>
      <small id="enrolemt-application-updated-at">@isset($section){{$section->grade}} - {{$section->strand}} | {{$section->section_number}}@endisset </small>

      <small id="enrolemt-application-updated-at">Adviser: @isset($adviser) {{$adviser->firstname}} {{$adviser->lastname}} @endisset</small>

    </span>

 @isset($adviser)
    <span id="enrollment-applications-container-base-header">
    Adviser: {{$adviser->firstname}} {{$adviser->lastname}}

    <small id="enrolemt-application-updated-at"> Contact Number: {{$adviser->phonenumber}}</small>

   <small id="enrolemt-application-updated-at">Email: {{$adviser->email}}</small>
    </span>

@endisset
      <table class="table table-hover" id="table">
        <thead>
          <tr>
            <th scope="col">Subject Name</th>
            <th scope="col">Teacher</th>
            <th scope="col">Teacher's Contact Details</th>
            <th scope="col">Schedule</th>
      
          </tr>
        </thead>
        <tbody>
  @isset($subjects)      
    @foreach($subjects as $subject)
          <tr>
@php

$subjectteacher = DB::table('subjects_teachers')->where('id',$subject->subjects_teachers_id)->first();

$subjectname = DB::table('subjects')->where('id',$subjectteacher->subjects_id)->first();

$teacher = DB::table('teachers')->where('id',$subjectteacher->teachers_id)->first();

@endphp
            <td scope="row">{{$subjectname->name}}</td>
  
           <td scope="row">{{$teacher->firstname}} {{$teacher->lastname}}</td>

           <td scope="row">{{$teacher->email}} | {{$teacher->phonenumber}}</td>
        
           <td scope="row">{{$subject->day}} | {{$subject ->start}} - {{$subject ->end}}</td>
 
          </tr>
          @endforeach
@isset($back_subject_datas)
   <thead>
          <tr>
            <th scope="col"> Back Subject Name</th>
            <th scope="col">Teacher</th>
            <th scope="col">Teacher's Contact Details</th>
            <th scope="col">Schedule</th>
      
          </tr>
        </thead>

        @foreach($back_subject_datas as $back_subject_data)
 <tr>
@php

$back = DB::table('subjects_teachers_schedule')->where('id',$back_subject_data->subjects_teachers_schedule_id)->first();

$subjectteacher = DB::table('subjects_teachers')->where('id',$back->subjects_teachers_id)->first();

$subjectname = DB::table('subjects')->where('id',$subjectteacher->subjects_id)->first();

$teacher = DB::table('teachers')->where('id',$subjectteacher->teachers_id)->first();
@endphp
      <td scope="row">{{$subjectname->name}}</td>
      <td scope="row">{{$teacher->firstname}} {{$teacher->lastname}}</td>
      <td scope="row">{{$teacher->email}} | {{$teacher->phonenumber}}</td>
      <td scope="row">{{$back->day}} | {{$back ->start}} - {{$back ->end}}</td>

</tr>
        @endforeach
@endisset
@endisset
        </tbody>
      </table>


    </div>

  </div>
</div>


</div>

<br>

@endsection