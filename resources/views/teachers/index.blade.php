@extends('template.main')
@section('content')

<div id="enrollment-applications-container-base">
  <div id="enrollment-table-container">
    <span id="enrollment-applications-container-base-header">BNHS Faculty Teachers<small id="enrolemt-application-updated-at"><i class="fi fi-rr-calendar"></i> Latest update: <?php echo date('m/d/y'); ?></small></span>


    <div class="container-fluid p-0 m-0">
      <div id="search-table" class="form-field">
        <input type="search" placeholder="Search Queries" class="form-control search-input" data-table="table" />
        <a href={{route('faculty.teachers.index') }} id="refresh"><i class="fi fi-rr-refresh"></i> Refresh Data</a>

      </div>

   <div class="container-fluid p-0 m-0" id="AddOn">
      <a class="btn btn-md btn-success"  onclick="show2();">Add</a>
  </div> 


<div class="container-fluid" style="display: none;" id="add_teacher">
      <form method="POST" action=" {{route('faculty.teachers.store') }}">
  
              @csrf

 
    <div class="enrollment-form-field" style="grid-template-columns: 1fr 1fr 1fr 1fr;">
      <div class="form-field">
        <label for="fatherfirstname">First Name</label>
        <input placeholder="First Name" name="firstname" type="text" class="@error('firstname') is-invalid |@enderror" id="firstname" aria-describedby="firstname" value="{{old('firstname')}}" required>
        @error('firstname')
        <span class="invalid-feedback" role="alert">
          {{$message}}
          FatherMiddleName
          @enderror
      </div>
      <div class="form-field">
        <label for="middlename">Middle Name</label>
        <input placeholder="Middle Name" name="middlename" type="text" class="@error('middlename') is-invalid |@enderror" id="middlename" aria-describedby="MiddleName" value="{{old('middlename')}}" required>
        @error('middlename')
        <span class="invalid-feedback" role="alert">
          {{$message}}
        </span>
        @enderror
      </div>
      <div class="form-field">
        <label for="lastname">Last Name</label>
        <input placeholder="Last Name" name="lastname" type="text" class="@error('lastname') is-invalid |@enderror" id="lastname" aria-describedby="lastname" value="{{old('lastname')}}">
        @error('lastname')
        <span class="invalid-feedback" role="alert" required>
          {{$message}}
        </span>
        @enderror
      </div>
         <div class="form-field">
        <label for="email">Email</label>
        <input placeholder="example@gmail.com" name="email" type="email" class="@error('email') is-invalid |@enderror" id="email" aria-describedby="email" value="{{old('email')}}" required>
        @error('email')
        <span class="invalid-feedback" role="alert">
          {{$message}}
        </span>
        @enderror
      </div>
      <div class="form-field">
        <label for="phonenumber">Contact Number</label>
        <input placeholder="###########" name="phonenumber" type="number" class="@error('phonenumber') is-invalid |@enderror" id="phonenumber" aria-describedby="phonenumber" value="{{old('phonenumber')}}" required>
        @error('phonenumber')
        <span class="invalid-feedback" role="alert">
          {{$message}}
        </span>
        @enderror
      </div>

    </div>

    <div class="enrollment-form-field" style="display: flex; flex-direction: flex-end; justify-content: flex-end; align-items: center;">
      <button type="submit" class="btn btn-md btn-success" >Submit</button>
        <a class="btn btn-md btn-warning"  onclick="hide2();">Cancel</a>
    </div>

  </form>
    </div>


      <table class="table table-hover" id="table">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">First Name</th>
            <th scope="col">Middle Name</th>
            <th scope="col">Last Name</th>

            <th scope="col">Email</th>
            <th scope="col">Contact Number</th>
         
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach($teachers as $teacher)
          <tr>
            <td scope="row">{{$teacher ->id}}</td>
            <td>{{$teacher ->firstname}}</th>
            <td>{{$teacher ->middlename}}</td>
            <td>{{$teacher ->lastname}}</td>
            <td>{{$teacher ->email}}</td>
            <td>{{$teacher ->phonenumber}}</td>
     

           

               <td>
        
          
              <div class="btn-toolbar mb-3" role="toolbar" aria-label="Toolbar with button groups">
                <div class="btn-group me-2" role="group" aria-label="First group">
                   <a class="btn btn-md btn-warning" href="{{route('faculty.teachers.show',$teacher->id) }}" role="button">View</a>
                  <a class="btn btn-md btn-success" href="{{route('faculty.teachers.edit',$teacher->id) }}" role="button">Edit</a>

      <a class="btn btn-md btn-danger" href="{{route('faculty.delete',$teacher->id) }}" role="button">Delete</a>
                    </div>
              </div>


            </td>
          </tr>
          @endforeach
        </tbody>
      </table>

      {{$teachers->links()}}
    </div>

  </div>
</div>


</div>

<br>

@endsection