@extends('template.main')
@section('content')

@php

$count =  DB::table('users')->where('section', $section->id)->count();
$adviser =  DB::table('teachers')->where('advisory', $section->id)->first();

@endphp

<div id="enrollment-applications-container-base">
  <div id="enrollment-table-container">

    <span id="enrollment-applications-container-base-header">Are you sure you want to delete {{$section->grade}} - {{$section->strand}} - {{$section->section_number}} ?

      <small id="enrolemt-application-updated-at">Adviser - @isset($adviser){{$adviser->firstname}} {{$adviser->middlename}} {{$adviser->lastname}} @endisset</small>

    <small id="enrolemt-application-updated-at">Number of students - {{$count}} </small>

      <small id="enrolemt-application-updated-at">Grade Criteria - {{$section->lower_gwa }} -{{$section->upper_gwa }}</small>

    </span>
  <span id="enrollment-applications-container-base-header">Warning: 
    <small id="enrolemt-application-updated-at">
     Removing the section's data from the database may cause discreapancies to data below. Editing is highly suggested.
    </small>

  </span>
 <form method="POST" action=" {{route('faculty.sections.destroy',$section->id) }}">
      @method('DELETE') 
  @csrf
   <div class="enrollment-form-field" style="display: flex; flex-direction: flex-end; justify-content: flex-end; align-items: center;">
      <button type="submit" class="btn btn-md btn-danger" >Delete</button>
        <a class="btn btn-md btn-warning" href="{{ URL::previous() }}"  onclick="hide2();">Cancel</a>
    </div>

  </form>
    <div class="container-fluid p-0 m-0">





      <table class="table table-hover" id="table">
        <thead>
          <tr>
             <th scope="col"></th>
             <th scope="col">LRN</th>

            <th scope="col">First Name</th>
            <th scope="col">Middle Name</th>
            <th scope="col">Last Name</th>
            <th scope="col">Grade</th>
            <th scope="col">PSA/Birth Certificate/NSO</th>
            <th scope="col">SF9/Report Card</th>
         
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach($students as $student)

          <tr>
       <td>{{$loop ->iteration}}</td>
       <td>{{$student ->lrnnumber}}</td>
       <td>{{$student ->name}}</td>
       <td>{{$student ->middlename}}</td>
       <td>{{$student ->lastname}}</td>
       <td>{{$student ->generalaverage}}</td>

     <td>
        <a class="btn btn-outline-secondary" href="{{url('admin/birthcertificate',$student->id) }}" role="button">View Requirement</a>
      </td>
      <td>
        <a class="btn btn-outline-secondary" href="{{url('admin/reportcard',$student->id) }}" role="button">View Requirement</a>
      </td>

          
         
     

           

               <td>
        
          
              <div class="btn-toolbar mb-3" role="toolbar" aria-label="Toolbar with button groups">
                <div class="btn-group me-2" role="group" aria-label="First group">
   <a class="btn btn-md btn-warning" href="{{route('admin.users.show',$student->id) }}" role="button">View</a>         </div>
              </div>


            </td>
          </tr>
          @endforeach
        </tbody>
      </table>

  
    </div>
      <div class="enrollment-form-field">
            <a class="btn btn-md btn-warning" href="{{route('faculty.sections.edit',$section->id) }}" role="button">Edit</a>

     
      <a style="font-size: 14px;" class="btn btn-warning" href="{{ URL::previous() }}" role="button">Back</a>
    </div>
  </div>

</div>


</div>

<br>

@endsection