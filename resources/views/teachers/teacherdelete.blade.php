@extends('template.main')
@section('content')

<div id="enrollment-applications-container-base">
  <div id="enrollment-table-container">
<div class="container-fluid"  id="add_teacher">
 <form method="POST" action=" {{route('faculty.teachers.destroy',$teacher->id) }}">
      @method('DELETE')
  @csrf
 
    <div class="enrollment-form-field" style="grid-template-columns: 1fr 1fr 1fr 1fr;">
      <div class="form-field">
        <label for="fatherfirstname">First Name</label>
        <input placeholder="First Name" name="firstname" type="text" class="@error('firstname') is-invalid |@enderror" id="firstname" aria-describedby="firstname" value="{{$teacher->firstname}}" required>
        @error('firstname')
        <span class="invalid-feedback" role="alert">
          {{$message}}
          FatherMiddleName
          @enderror
      </div>
      <div class="form-field">
        <label for="middlename">Middle Name</label>
        <input placeholder="Middle Name" name="middlename" type="text" class="@error('middlename') is-invalid |@enderror" id="middlename" aria-describedby="MiddleName" value="{{$teacher->middlename}}" required>
        @error('middlename')
        <span class="invalid-feedback" role="alert">
          {{$message}}
        </span>
        @enderror
      </div>
      <div class="form-field">
        <label for="lastname">Last Name</label>
        <input placeholder="Last Name" name="lastname" type="text" class="@error('lastname') is-invalid |@enderror" id="lastname" aria-describedby="lastname" value="{{$teacher->lastname}}">
        @error('lastname')
        <span class="invalid-feedback" role="alert" required>
          {{$message}}
        </span>
        @enderror
      </div>
         <div class="form-field">
        <label for="email">Email</label>
        <input placeholder="example@gmail.com" name="email" type="email" class="@error('email') is-invalid |@enderror" id="email" aria-describedby="email" value="{{$teacher->email}}" required>
        @error('email')
        <span class="invalid-feedback" role="alert">
          {{$message}}
        </span>
        @enderror
      </div>
      <div class="form-field">
        <label for="phonenumber">Contact Number</label>
        <input placeholder="###########" name="phonenumber" type="number" class="@error('phonenumber') is-invalid |@enderror" id="phonenumber" aria-describedby="phonenumber" value="{{$teacher->phonenumber}}" required>
        @error('phonenumber')
        <span class="invalid-feedback" role="alert">
          {{$message}}
        </span>
        @enderror
      </div>

    </div>

    <div class="enrollment-form-field" style="display: flex; flex-direction: flex-end; justify-content: flex-end; align-items: center;">
      <button type="submit" class="btn btn-md btn-danger" >Submit</button>
        <a class="btn btn-md btn-warning" href="{{ URL::previous() }}" role="button">Cancel</a>
    </div>

  </form>
    </div>

        @php

             $section =  DB::table('sections')->where('id', $teacher->advisory)->first();
             $students =  DB::table('users')->where('section', $teacher->advisory)->get();
             $students = $students->count();
         
        @endphp

    <span id="enrollment-applications-container-base-header">Advisory: 
    @isset ($section)
    {{$section->grade}}
    {{$section->strand}}
      Section -
    {{$section->section_number}}
   @endisset ($section)
    <small id="enrolemt-application-updated-at">
     Numbers of students in the section: {{$students}}
    </small>




  </span>

    <div class="container-fluid p-0 m-0">
      

    <table class="table table-hover" id="table">
        <thead>
          <tr>
            <th scope="col">Subjects Assigned </th>

          </tr>
         </thead>    

   
        <tbody>

{{-- Itong $subjects is yung mga subject na naka assign sa teacher na nakuha natin using the id ng teacher na nasa teachers table. (Pinass yung $subjects galing sa TeacherController.php)

NOTE: Sadyang ginagawang singular yung variable pag nasa for loop

for example = $bananas 

      @foreach($bananas as $banana)
      
      Maglolo-loop tong for statement na to depende sa kung ilang banana meron ka. 

      If you have 4 bananas  4 times din to maglo-loop

      @endforeach

 --}}

             @foreach($subjects as $subject)
            @php

//"Pangkuha ng pangalan ng subject yung $subjectnames sa subjects table kasi yung id niya ang ipinapass natin sa subject_teachers table kapag nag-aassign tayo ng teacher sa subject and vice versa (Kinukuha din natin yung id  sa teachers table pag nag-aassign tayo ng subject sa teachers)"

             $subjectnames =  DB::table('subjects')->where('id', $subject->subjects_id)->first();

//"Pangkuha ng schedules sa subject_teachers_table gamit yung id  na kinuha natin galing sa subject_teachers"

             $schedules =  DB::table('subjects_teachers_schedule')->where('subjects_teachers_id', $subject->id)->get();
         
            @endphp
    
         
     
      
          <tr>
        @isset ($subjectnames)
               <td scope="col">{{$subjectnames->name}}</td>
        @endisset
        @isset ($schedules)

             @foreach($schedules as $schedule)
            @php

//"Need natin itong code nato dahil ang nasa section_id ay ang id na nasa section. So kailangan pa nating kunin yung mga variable na nasa sections table with the corresponding id na meron tayo."

//Note: Iba yung id sa section_number. Yung section number is editable while yung id is hindi. Hindi pwedeng mabago ang id dahil ito ang identity ng isang row. Pag-pinass  natin ang isang row from sections na may id na "1" and inedit mo yung id ginawa mong "2". Yung id lang sa sections table is magiging "2" pero di mababago yung section_id sa subjects_teachers_schedule it will still be "1".

             $section =  DB::table('sections')->where('id', $schedule->section_id)->first();
         
            @endphp
    
             @isset($section)  
             <td scope="col">
                {{$section->grade}} - {{$section->strand}} - {{$section->section_number}} | {{$schedule->day}} | {{$schedule->start}} - {{$schedule->end}} 
                
                    </td>

  @endisset()

        @endforeach
    
         @endisset
          </tr>

        @endforeach

        </tbody>
      </table>

    </div>

  </div>

</div>


</div>

<br>

@endsection