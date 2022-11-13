@extends('template.main')
@section('content')

<div id="enrollment-applications-container-base">
  <div id="enrollment-table-container">

    <span id="enrollment-applications-container-base-header">Generated List : {{$title}}<small id="enrolemt-application-updated-at"><i class="fi fi-rr-calendar"></i> Latest update: <?php echo date('m/d/y'); ?></small></span>

    <div class="container-fluid p-0 m-0">
      <div id="search-table" class="form-field">
        <input type="search" placeholder="Search Queries" class="form-control search-input" data-table="table" />
           <div>
                  <form method="POST" action=" {{url('admin/print_list') }}">
  
              @csrf
              <input type="hidden" name="title" value="{{$title}}">
           <button class="btn btn-md btn-success" type="submit" role="button">Print</button>
      
        </div>
      </div>
      <table class="table table-hover" id="table">
        <thead>
          <tr>
        
   

            <th scope="col">Name</th>
             <th scope="col">Sex</th>
              <th scope="col">Age</th>
                  <th scope="col">Baranggay</th>
              <th scope="col">Municipality</th>
                <th scope="col">LRN</th>
            <th scope="col">PSA</th>
             <th scope="col">4Ps ID</th>
                <th scope="col">General Average</th>
            <th scope="col">Grade Level</th>
            <th scope="col">Strand</th>
             <th scope="col">Section</th>
           
             <th scope="col">Student Type</th>
  
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach($users as $user)
           <input type="hidden" name="users[]" value="{{$user->id}}">
          <tr>

      
            <td>{{$user ->name}} {{$user->lastname}}</th>

               <td>{{$user->sex}}</td>
               <td>{{$user->age}}</td>
                   <td>{{$user->currentbaranggay}}</td>
                    <td>{{$user->currentmunicipality}}</td>
            <td scope="row">{{$user->lrnnumber}} </td>
           <td>{{$user ->psanumber}}</td>
            <td>{{$user ->indigency}}</td>
            <td>{{$user ->generalaverage}}</td>
             <td>{{$user->gradeleveltoenrolin}}</td>
             <td>{{$user->strandtoenrolin}}</td>
                <td>{{$user->section}}</td>
        
            <td>{{$user->studenttype}}</td>
            



  



@php


@endphp

 <td>


@php
 $adviser =  DB::table('teachers')->where('advisory',$user->section)->first();

@endphp

@isset($user->section)Section Number {{$user->section}}@endisset<br> @isset($adviser)Adviser :{{$adviser->firstname}} {{$adviser->middlename}} {{$adviser->lastname}} @endisset()




           </td>
            <td>


              {{-- <form action="{{route('admin.users.destroy',$user->id) }}" method ="POST" >
              @method("DELETE")--}}
              @csrf


              <div class="btn-toolbar mb-3" role="toolbar" aria-label="Toolbar with button groups">
                <div class="btn-group me-2" role="group" aria-label="First group">
                 
                  <a @if($title == 'LRN Based Search Results') style="display: none" @endif class="btn btn-md btn-warning" href="{{route('admin.users.show',$user->id) }}" role="button">View</a>
                  
                   @if($title == 'LRN Based Search Results')
                  <a class="btn btn-md btn-warning" href="{{url('admin/records',$user->id) }}" role="button">View</a>
                  @endif
                </div>
              </div>


            </td>
          </tr>
          @endforeach
          </form> 
        </tbody>
      </table>

      {{$users->links()}}
    </div>

  </div>
</div>


</div>

<br>

@endsection