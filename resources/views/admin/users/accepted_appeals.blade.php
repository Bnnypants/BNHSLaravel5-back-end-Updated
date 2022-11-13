@extends('template.main')
@section('content')

<div id="enrollment-applications-container-base">

  <div id="enrollment-table-container">

    <span id="enrollment-applications-container-base-header">Accepted Appeals<small id="enrolemt-application-updated-at"><i class="fi fi-rr-calendar"></i> Latest update: <?php echo date('m/d/y'); ?></small></span>
       <div id="sort-div">
      <!-- <label for="buttongroup" class="form-label">Sort by:</label> -->
     <div class="btn-group" id="buttongroup" role="group">
     <a type="button" class="btn {{ Request::is('admin/updated*') ? 'active-tab' : '' }}" href="{{route('admin.appeals.index') }}" data-bs-toggle="button" autocomplete="off" aria-pressed="true">Pending</a>
        <a type="button" class="btn {{ Request::is('admin/rejected*') ? 'active-tab' : '' }}" href="{{url('admin/rejected_appeals') }}" data-bs-toggle="button" autocomplete="off" aria-pressed="true">Rejected</a>
        <a type="button" class="btn {{ Request::is('admin/accepted*') ? 'active-tab' : '' }}" href="{{url('admin/accepted_appeals') }}" data-bs-toggle="button" autocomplete="off" aria-pressed="true">Accepted</a>
      </div>
    </div>
   

    <div class="container-fluid p-0 m-0">
    <div id="search-table" class="form-field">
        <input type="search" placeholder="Search Queries" class="form-control search-input" data-table="table" />
    
      </div>
      <table class="table table-hover" id="table">
        <thead>
          <tr>
            <th scope="col">Appeal by:</th>
              <th scope="col">Email</th>
          <th scope="col">Phone Number</th>
             <th scope="col">LRN</th>
            <th scope="col">Message</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach($appeals as $appeal)

  @php
 $user = DB::table('users')->where('id',$appeal->user_id)->first();
  @endphp
          <tr>
            <td scope="row"> {{$user->name}} {{$user->middlename}} {{$user->lastname}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->phonenumber}}</td>
            <td>{{$user->lrnnumber}}</td>
   <td>
            <div class="form-field">
      <div class="form-group">
        <label for="comment">Appeal:</label>
        <textarea class="form-control" rows="5"  name="specification" style=" width: 500px;" >{{$appeal->message}}</textarea>
      </div>
    </div>
   </td>


             {{-- <form action="{{route('admin.users.destroy',$user->id) }}" method ="POST" >
              @method("DELETE")--}}
              @csrf
           <td>

              <div class="btn-toolbar mb-3" role="toolbar" aria-label="Toolbar with button groups">
                <div class="btn-group me-2" role="group" aria-label="First group">
                  <a class="btn btn-md btn-warning" href="{{route('admin.users.show',$appeal->user_id) }}" role="button">View</a>
                  <a class="btn btn-md btn-danger" href="{{route('admin.appeals.edit',$appeal->user_id) }}" role="button">Reject Appeal</a>
                </div>
              </div>


            </td>
          </tr>
          @endforeach
        </tbody>
      </table>

      {{$appeals->links()}}
    </div>

  </div>
</div>


</div>

<br>

@endsection