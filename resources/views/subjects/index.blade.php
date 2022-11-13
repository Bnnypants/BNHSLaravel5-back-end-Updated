@extends('template.main')
@section('content')

<div id="enrollment-applications-container-base">
  <div id="enrollment-table-container">
    <span id="enrollment-applications-container-base-header">BNHS Faculty Subjects<small id="enrolemt-application-updated-at"><i class="fi fi-rr-calendar"></i> Latest update: <?php echo date('m/d/y'); ?></small></span>


    <div class="container-fluid p-0 m-0">
      <div id="search-table" class="form-field">
        <input type="search" placeholder="Search Queries" class="form-control search-input" data-table="table" />
        <a href={{route('faculty.teachers.index') }} id="refresh"><i class="fi fi-rr-refresh"></i> Refresh Data</a>
    </div>
<div class="card">
   <div class="container-fluid p-0 m-0" id="AddOn">
      <a class="btn btn-md btn-success"  onclick="show2();">Add New Subject</a>
  </div> 


<div class="container-fluid" style="display:none;" id="add_teacher">
      <form method="POST" action=" {{route('faculty.subjects.store') }}">
  
              @csrf

 
    <div class="enrollment-form-field" style="grid-template-columns: 1fr 1fr 1fr 1fr;">
      <div class="form-field">
        <label for="subjectname">Subject Name</label>
        <input placeholder="Subject Name" name="name" type="text" class="@error('subjeectname') is-invalid |@enderror" id="subjeectname" aria-describedby="subjeectname" value="{{old('subjeectname')}}" required>
        @error('subjeectname')
        <span class="invalid-feedback" role="alert">
          {{$message}}
         
          @enderror
      </div>
    
    </div>


    <div class="form-info-header">
      <span>Assign Teacher</span>
    </div>
    <div class="enrollment-form-field" style="grid-template-columns:  3fr;">
      <div class="form-field">

        <div class="enrollment-form-field" style="grid-template-columns: 1fr 1fr 1fr 1fr; padding-left: 1.4rem;">
          
           
@foreach($availableteachers as $availableteacher)

 @if($loop->iteration % 3 == 0 )
    
    <div class="form-field" style="margin-right: 3rem;">
           
@endif

  @php

  $loads =  DB::table('subjects_teachers')->where('teachers_id', $availableteacher->id)->get();

  @endphp

 <div class="form-check"> 
              <input class="form-check-input" type="checkbox" value="{{$availableteacher->id}}" name="teachers[]" id="modality">
              <label class="form-check-label" for="flexRadioDefault1">
                {{$availableteacher->firstname}}  {{$availableteacher->middlename}} {{$availableteacher->lastname}}</label>
               
@foreach($loads as $load)
 
 @php 
 
$names = DB::table('subjects')->where('id', $load->subjects_id)->get();

@endphp


@foreach($names as $name)

<small>{{$name->name}} </small> |
@endforeach

@endforeach     
         

  </div>

 @if($loop->iteration % 3 == 0 )

      </div>

@endif  

@endforeach

          </div>


        </div>
   
  
    </div>

     <div class="form-info-header">
      <span>Assign Grade Level</span>
    </div>

      <div class="enrollment-form-field" style="grid-template-columns:  3fr;">
      <div class="form-field">
     
        <div class="enrollment-form-field" style="grid-template-columns: 1fr 1fr 1fr 1fr; padding-left: 1.4rem;" >
          <div class="form-field" style="margin-right: 3rem;">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="1" name="gradelevel[]" id="modality">
              <label class="form-check-label" for="flexRadioDefault1">
                Grade 7
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="2" name="gradelevel[]" id="modality">
              <label class="form-check-label" for="flexRadioDefault1">
                Grade 8
              </label>
            </div>
          </div>
          <div class="form-field" style="margin-right: 3rem;">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="3" name="gradelevel[]" id="modality">
              <label class="form-check-label" for="flexRadioDefault1">
                Grade 9
              </label>
            </div>

            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="4" name="gradelevel[]" id="modality">
              <label class="form-check-label" for="flexRadioDefault1">
                Grade 10
              </label>
            </div>
          </div>
          <div class="form-field" style="margin-right: 3rem;">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="5" name="gradelevel[]" id="grade11"
               onclick="Strands();">
              <label class="form-check-label" for="flexRadioDefault1">
                Grade 11
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="6" name="gradelevel[]" id="grade12"
              onclick="Strands();" >
              <label class="form-check-label" for="flexRadioDefault1">
                Grade 12 
              </label>
            </div>
          </div>


      </div>
    </div>
      </div>

<div id="strands_subject" style="display:none;">
         <div class="form-info-header">
      <span>Assign Strand</span>
    </div>
         <div  class="enrollment-form-field" style="grid-template-columns:  3fr; "  >
      <div class="form-field">
     
        <div class="enrollment-form-field" style="grid-template-columns: 1fr 1fr 1fr 1fr; padding-left: 1.4rem;">
          <div class="form-field" style="margin-right: 3rem;">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="1" name="strands[]" id="modality">
              <label class="form-check-label" for="flexRadioDefault1">
                HUMMS
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="2" name="strands[]" id="modality">
              <label class="form-check-label" for="flexRadioDefault1">
                GAS
              </label>
            </div>
          </div>
          <div class="form-field" style="margin-right: 3rem;">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="3" name="strands[]" id="modality">
              <label class="form-check-label" for="flexRadioDefault1">
                TVL
              </label>
            </div>

            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="4" name="strands[]" id="modality">
              <label class="form-check-label" for="flexRadioDefault1">
                COOKERY
              </label>
            </div>
          </div>
          <div class="form-field" style="margin-right: 3rem;">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="5" name="strands[]" id="modality">
              <label class="form-check-label" for="flexRadioDefault1">
                ICT
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="6" name="strands[]" id="modality">
              <label class="form-check-label" for="flexRadioDefault1">
                ABMS 
              </label>
            </div>
          </div>
         <div class="form-field" style="margin-right: 3rem;">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="7" name="strands[]" id="modality">
              <label class="form-check-label" for="flexRadioDefault1">
              STEM
                        </label>
            </div>
      
          </div>


      </div>
    </div>
      </div>
 </div>  
    <div class="enrollment-form-field" style="display: flex; flex-direction: flex-end; justify-content: flex-end; align-items: center;">
      <button type="submit" class="btn btn-md btn-success" >Submit</button>
        <a class="btn btn-md btn-warning"  onclick="hide2();">Cancel</a>
    </div>

  </form>
    </div>
    </div>

      <table class="table table-hover" id="table">
        <thead>
          <tr>
      
            <th scope="col">Subject Name</th>
            <th scope="col">Junior HS</th>
            <th scope="col">Senior HS</th>
             <th scope="col">Assigned Teachers</th>
      
         
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
@foreach($subjects as $subject)
          <tr>


            <td scope="row">{{$subject ->name}} </td>

@php 

  $assignedgrades =  DB::table('grades_subjects')->where('subjects_id', $subject->id)->where('grades_id' ,'!=','5')->where('grades_id' ,'!=','6')->get();

  $withSHS11strands =  DB::table('grades_subjects')->where('subjects_id', $subject->id)->where('grades_id', '5')->get();

  $withSHS12strands =  DB::table('grades_subjects')->where('subjects_id', $subject->id)->where('grades_id', '6')->get();


@endphp
            <td scope="row">

@foreach($assignedgrades as $assignedgrade)

 @php 

       $gradelevels =  DB::table('grades')->where('id', $assignedgrade->grades_id)->get();

@endphp

@foreach($gradelevels as $gradelevel)

             {{$gradelevel->name}}

             <br>
            
@endforeach
            
 @endforeach


            </td>

            <td scope="row">
    
@foreach($withSHS11strands as $withSHS11strand)

 @php 

       $strands =  DB::table('strands_subjects')->where('subjects_id', $withSHS11strand->subjects_id)->get();


@endphp

@foreach($strands as $strand)

@php

$name =  DB::table('strands')->where('id', $strand->strands_id)->first();

@endphp

       Grade 11 - {{$name->name}} | 
            
@endforeach
            
 @endforeach

<br>

 @foreach($withSHS12strands as $withSHS12strand)

 @php 

       $strands =  DB::table('strands_subjects')->where('subjects_id', $withSHS12strand->subjects_id)->get();

@endphp

@foreach($strands as $strand)

@php

$name =  DB::table('strands')->where('id', $strand->strands_id)->first();

@endphp

           Grade 12 - {{$name->name}} |
            
@endforeach
            
 @endforeach


            </td>


<td scope="row">
  
  @php

$teachers =  DB::table('subjects_teachers')->where('subjects_id', $subject->id)->get();

@endphp

@foreach($teachers as $teacher)



@php

$teachername =  DB::table('teachers')->where('id', $teacher->teachers_id)->first();


@endphp

      {{$loop->iteration}} )  {{$teachername->firstname}}   {{$teachername->middlename}}  {{$teachername->lastname}} 
           <br>
            
@endforeach

</td>

               <td>
        
          
              <div class="btn-toolbar mb-3" role="toolbar" aria-label="Toolbar with button groups">
                <div class="btn-group me-2" role="group" aria-label="First group">
                   <a class="btn btn-md btn-warning" href="{{route('faculty.subjects.show',$subject->id) }}" role="button">View</a>
                  <a class="btn btn-md btn-success" href="{{route('faculty.subjects.edit',$subject->id) }}" role="button">Edit</a>

      <a class="btn btn-md btn-danger" href="{{route('faculty.deletesubject',$subject->id) }}" role="button">Delete</a>
                    </div>
              </div>


            </td>
          </tr>
          @endforeach
        </tbody>
      </table>

      {{$subjects->links()}}

    </div>

  </div>
</div>


</div>

<br>

@endsection