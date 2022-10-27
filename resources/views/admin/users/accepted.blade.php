@extends('template.main')
@section('content')

<div id="enrollment-applications-container-base">

  <div id="enrollment-table-container">

    <span id="enrollment-applications-container-base-header">Accepted Enrolment Applications<small id="enrolemt-application-updated-at"><i class="fi fi-rr-calendar"></i> Latest update: <?php echo date('m/d/y'); ?></small></span>
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
            <th scope="col">LRN</th>

            <th scope="col">First Name</th>
            <th scope="col">Middle Name</th>
            <th scope="col">Last Name</th>
             <th scope="col">Grade</th>

            <th scope="col">PSA/Birth Certificate/NSO</th>
            <th scope="col">SF9/Report Card</th>
            <th scope="col">Grade Level</th>
            <th scope="col">Strand</th>
                  <th scope="col">Section</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach($users as $user)
          <tr>
            <td scope="row">{{$user->lrnnumber}}</td>
            <td>{{$user ->name}}</th>
            <td>{{$user ->middlename}}</td>
            <td>{{$user ->lastname}}</td>
            <td>{{$user ->generalaverage}}</td>



            <td>
              <a class="btn btn-outline-secondary" href="{{url('admin/birthcertificate',$user->id) }}" role="button">View Requirement</a>
            </td>
            <td>
              <a class="btn btn-outline-secondary" href="{{url('admin/reportcard',$user->id) }}" role="button">View Requirement</a>
            </td>
             <td>{{$user->gradeleveltoenrolin}}</td>
             <td>{{$user->strandtoenrolin}}</td>



@php


@endphp

 <td>


@php
 $adviser =  DB::table('teachers')->where('advisory',$user->section)->first();

@endphp

Section Number {{$user->section}}<br> @isset($adviser)Adviser :{{$adviser->firstname}} {{$adviser->middlename}} {{$adviser->lastname}} @endisset()




           </td>
            <td>


              {{-- <form action="{{route('admin.users.destroy',$user->id) }}" method ="POST" >
              @method("DELETE")--}}
              @csrf


              <div class="btn-toolbar mb-3" role="toolbar" aria-label="Toolbar with button groups">
                <div class="btn-group me-2" role="group" aria-label="First group">
                  <a class="btn btn-md btn-warning" href="{{route('admin.users.show',$user->id) }}" role="button">View</a>
                  <a class="btn btn-md btn-success" href="{{route('admin.users.edit',$user->id) }}" role="button">Accept</a>
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