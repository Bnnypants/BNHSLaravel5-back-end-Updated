@extends('template.main')
@section('content')

<div id="enrollment-applications-container-base">

  <div id="enrollment-table-container">

    <span id="enrollment-applications-container-base-header">Active BNHS Enrolment System Administrators<small id="enrolemt-application-updated-at"><i class="fi fi-rr-calendar"></i> Latest update: <?php echo date('m/d/y'); ?></small></span>
    <div id="sort-div">
      <!-- <label for="buttongroup" class="form-label">Sort by:</label> -->
      <div class="btn-group" id="buttongroup" role="group">
        <a type="button" class="btn {{ Request::is('admin/users*') ? 'active-tab' : '' }}" href="{{route('admin.management.index') }}" data-bs-toggle="button" autocomplete="off" aria-pressed="true">Active</a>
        <a type="button" class="btn {{ Request::is('admin/updated*') ? 'active-tab' : '' }}" href="{{url('admin/disabled_admin') }}" data-bs-toggle="button" autocomplete="off" aria-pressed="true">Disabled</a>
        
      </div>
    </div>
    <div class="card">

        <table class="table table-hover" id="table">
          <tbody>
            <tr>
            <td>{{$current_user ->name}}</th>
            <td>{{$current_user ->middlename}}</td>
            <td>{{$current_user ->lastname}}</td>
            <td>{{$current_user ->email}}</td>
            <td>{{$current_user ->phonenumber}}</td>
            <td>


              {{-- <form action="{{route('admin.users.destroy',$user->id) }}" method ="POST" >
              @method("DELETE")--}}
      


              <div class="btn-toolbar mb-3" role="toolbar" aria-label="Toolbar with button groups">
                <div class="btn-group me-2" role="group" aria-label="First group">
                     <a class="btn btn-md btn-warning" href="{{route('admin.management.edit',$current_user->id) }}" role="button">Edit</a>
      
  
      
                
                </div>
              </div>


            </td>
          </tr>
            
          </tbody>
        </table>
      
    </div>

<br>
    <div class="container-fluid p-0 m-0">
     <div id="search-table" class="form-field">
        <input type="search" placeholder="Search Queries" class="form-control search-input" data-table="table" />
        <div>
        <a href="{{route('admin.users.create') }}" id="refresh"><i class="fa fa-warning"></i>Create Admin Account</a>
       
        </div>
      </div>
      <table class="table table-hover" id="table">
        <thead>
          <tr>

            <th scope="col">First Name</th>
            <th scope="col">Middle Name</th>
            <th scope="col">Last Name</th>
            <th scope="col">Email</th>
            <th scope="col">Phone Number</th>



            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach($users as $user)
          <tr>
            <td>{{$user ->name}}</th>
            <td>{{$user ->middlename}}</td>
            <td>{{$user ->lastname}}</td>
            <td>{{$user ->email}}</td>
            <td>{{$user ->phonenumber}}</td>
            <td>


              {{-- <form action="{{route('admin.users.destroy',$user->id) }}" method ="POST" >
              @method("DELETE")--}}
      


              <div class="btn-toolbar mb-3" role="toolbar" aria-label="Toolbar with button groups">
                <div class="btn-group me-2" role="group" aria-label="First group">
                  
      
                  <a class="btn btn-md btn-danger" href="{{route('admin.management.show',$user->id) }}" role="button">Disable</a>
      
                
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