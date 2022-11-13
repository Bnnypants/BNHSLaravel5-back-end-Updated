@extends('template.main')
@section('content')

<div id="enrollment-applications-container-base">

  <div id="enrollment-table-container">
    <span id="enrollment-applications-container-base-header">Rejected Enrolment Applications<small id="enrolemt-application-updated-at"><i class="fi fi-rr-calendar"></i> Latest update: <?php echo date('m/d/y'); ?></small></span>
    <div id="sort-div">
      <!-- <label for="buttongroup" class="form-label">Sort by:</label> -->
      <div class="btn-group" id="buttongroup" role="group">
        <a type="button" class="btn {{ Request::is('admin/users*') ? 'active-tab' : '' }}" href="{{route('admin.users.index') }}" data-bs-toggle="button" autocomplete="off" aria-pressed="true">New</a>
        <a type="button" class="btn {{ Request::is('admin/updated*') ? 'active-tab' : '' }}" href="{{url('admin/updated') }}" data-bs-toggle="button" autocomplete="off" aria-pressed="true">Updated</a>
        <a type="button" class="btn {{ Request::is('admin/rejected*') ? 'active-tab' : '' }}" href="{{url('admin/rejected') }}" data-bs-toggle="button" autocomplete="off" aria-pressed="true">Rejected</a>
        <a type="button" class="btn {{ Request::is('admin/accepted*') ? 'active-tab' : '' }}" href="{{url('admin/accepted') }}" data-bs-toggle="button" autocomplete="off" aria-pressed="true">Accepted</a>
        
      </div>
    </div>

    <div class="container-fluid p-0 m-0">
      <div id="search-table" class="form-field">
        <input type="search" placeholder="Search Queries" class="form-control search-input" data-table="table" />
        <div>
        <a href="{{route('admin.appeals.index') }}" id="refresh"><i class="fa fa-warning"></i>Appeals</a>
  <a href="{{route('admin.issue_reports.index') }}" id="refresh"><i class="fa fa-warning"></i>Messages</a>
   </div>
      </div>
      <table class="table table-hover" id="table">
        <thead>
          <tr>
             <th scope="col">Enrolled at:</th>
            <th scope="col">LRN</th>
            <th scope="col">Name</th>
            <th scope="col">Grade</th>
            <th scope="col">PSA/Birth Certificate/NSO</th>
            <th scope="col">SF9/Report Card</th>
            <th scope="col">Grade Level to Enrol Into</th>
            <th scope="col">Strand</th>
            <th scope="col">Section to be Enrolled Into</th>
              <th scope="col">Last Reviewed By</th>

            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach($users as $user)
          <tr>
            <td scope="row">{{$user ->email_verified_at}}</td>
            <td scope="row">{{$user ->lrnnumber}}</td>
            <td>{{$user ->name}} {{$user ->lastname}}</td>
            <td>{{$user ->generalaverage}}</td>

            <td>
              <a class="btn btn-outline-secondary" href="{{url('admin/birthcertificate',$user->id) }}" role="button">View Requirement</a>
            </td>
            <td>
              <a class="btn btn-outline-secondary" href="{{url('admin/reportcard',$user->id) }}" role="button">View Requirement</a>
            </td>

            <td>{{$user ->gradeleveltoenrolin}}</td>
            <td>{{$user ->strandtoenrolin}}</td>

 <td>
  

@php

if(($user->gradeleveltoenrolin == 'Grade 11') ||($user->gradeleveltoenrolin == 'Grade 12')){
  $section =  DB::table('sections')->where('grade',$user->gradeleveltoenrolin)->where('strand',$user->strandtoenrolin)->where('lower_gwa','<=',$user->generalaverage)->where('upper_gwa','>=',$user->generalaverage)->where('admission_status','Yes')->first();
}
else{
   $section =  DB::table('sections')->where('grade',$user->gradeleveltoenrolin)->where('lower_gwa','<=',$user->generalaverage)->where('upper_gwa','>=',$user->generalaverage)->where('admission_status','Yes')->first();
}

  $reviewed_by = DB::table('users')->where('id',$user->last_reviewed_by)->first();
@endphp

@isset($section)

@php
 $adviser =  DB::table('teachers')->where('advisory',$section->id)->first();
@endphp

@isset($adviser)
 Section Number : {{$section->section_number}}<br> Adviser :{{$adviser->firstname}} {{$adviser->middlename}} {{$adviser->lastname}} 
 @endisset

@endisset

  </td>

   <td>@isset( $reviewed_by){{$reviewed_by->name}} {{$reviewed_by->lastname}} @endisset</td>
            <td>


              {{-- <form action="{{route('admin.users.destroy',$user->id) }}" method ="POST" >
              @method("DELETE")--}}
              @csrf


              <div class="btn-toolbar mb-3" role="toolbar" aria-label="Toolbar with button groups">
                <div class="btn-group me-2" role="group" aria-label="First group">
                  <a class="btn btn-md btn-warning" href="{{route('admin.users.show',$user->id) }}" role="button">View</a>
                   @isset($section)
                  <a class="btn btn-md btn-success" href="{{route('admin.users.edit',$user->id) }}" role="button">Accept</a>
                  @endisset
                  <a class="btn btn-md btn-danger" href="{{url('admin/reason',$user->id) }}" role="button">Reject</a>
                </div>
              </div>


            </td>
          </tr>
          @endforeach
        </tbody>
      </table>

      {{$users->links()}}
    </div>

  </div>
</div>


</div>

<br>

@endsection