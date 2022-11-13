@extends('template.main')
@section('content')

<div id="enrollment-applications-container-base">
  <div id="enrollment-table-container">
    <span id="enrollment-applications-container-base-header">BNHS Faculty Sections<small id="enrolemt-application-updated-at"><i class="fi fi-rr-calendar"></i> Latest update: <?php echo date('m/d/y'); ?></small></span>


    <div class="container-fluid p-0 m-0">
      <div id="search-table" class="form-field">
        <input type="search" placeholder="Search Queries" class="form-control search-input" data-table="table" />
        <a href={{route('faculty.sections.index') }} id="refresh"><i class="fi fi-rr-refresh"></i> Refresh Data</a>

      </div>
<div class="card">
   <div class="container-fluid p-0 m-0" id="AddOn">
      <a class="btn btn-md btn-success"    onclick="show2();">Create new section</a>
  </div> 

<div class="container-fluid" style="display:none;" id="add_teacher">
      <form method="POST" action=" {{route('faculty.sections.create') }}">
         @method('GET') 
   @csrf
     
     <div class="form-info-header">
      <span>What grade level do you want to create a section in?</span>
    </div>

      <div class="enrollment-form-field" style="grid-template-columns:  3fr;">
      <div class="form-field">
     
        <div class="enrollment-form-field" style="grid-template-columns: 1fr 1fr 1fr 1fr; padding-left: 1.4rem;" >
          <div class="form-field" style="margin-right: 3rem;">
            <div class="form-check">
              <input class="form-check-input" type="radio" value="1" name="gradelevel" id="modality" onclick="Strands2()" checked>
              <label class="form-check-label" for="flexRadioDefault1">
                Grade 7
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" value="2" name="gradelevel" id="modality" onclick="Strands2()">
              <label class="form-check-label" for="flexRadioDefault1">
                Grade 8
              </label>
            </div>
          </div>
          <div class="form-field" style="margin-right: 3rem;">
            <div class="form-check">
              <input class="form-check-input" type="radio" value="3" name="gradelevel" id="modality" onclick="Strands2()">
              <label class="form-check-label" for="flexRadioDefault1">
                Grade 9
              </label>
            </div>

            <div class="form-check">
              <input class="form-check-input" type="radio" value="4" name="gradelevel" id="modality" onclick="Strands2()">
              <label class="form-check-label" for="flexRadioDefault1">
                Grade 10
              </label>
            </div>
          </div>
          <div class="form-field" style="margin-right: 3rem;">
            <div class="form-check">
              <input class="form-check-input" type="radio" value="5" name="gradelevel" id="grade11"
               onclick="Strands2();">
              <label class="form-check-label" for="flexRadioDefault1">
                Grade 11
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" value="6" name="gradelevel" id="grade12"
              onclick="Strands2();" >
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
              <input class="form-check-input" type="radio" value="1" name="strand" id="modality">
              <label class="form-check-label" for="flexRadioDefault1">
                HUMMS
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" value="2" name="strand" id="modality">
              <label class="form-check-label" for="flexRadioDefault1">
                GAS
              </label>
            </div>
          </div>
          <div class="form-field" style="margin-right: 3rem;">
            <div class="form-check">
              <input class="form-check-input" type="radio" value="3" name="strand" id="modality">
              <label class="form-check-label" for="flexRadioDefault1">
                TVL
              </label>
            </div>

            <div class="form-check">
              <input class="form-check-input" type="radio" value="4" name="strand" id="modality">
              <label class="form-check-label" for="flexRadioDefault1">
                COOKERY
              </label>
            </div>
          </div>
          <div class="form-field" style="margin-right: 3rem;">
            <div class="form-check">
              <input class="form-check-input" type="radio" value="5" name="strand" id="modality">
              <label class="form-check-label" for="flexRadioDefault1">
                ICT
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" value="6" name="strand" id="modality">
              <label class="form-check-label" for="flexRadioDefault1">
                ABM 
              </label>
            </div>
          </div>
         <div class="form-field" style="margin-right: 3rem;">
            <div class="form-check">
              <input class="form-check-input" type="radio" value="7" name="strand" id="modality">
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
</div>
      <table class="table table-hover" id="table">
        <thead>
          <tr>
            <th scope="col">Grade</th>
            <th scope="col">Strand</th>
            <th scope="col">Section Number</th>
        
            <th scope="col">Grade Criteria</th>
            <th scope="col">Adviser</th>
                <th scope="col">Admission Limit</th>
           <th scope="col">Number of Students</th>
         
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach($sections as $section)
@php

$students =  DB::table('users')->where('section', $section->id)->count();
$adviser =  DB::table('teachers')->where('advisory', $section->id)->first();

@endphp
          <tr>
            <td>{{$section ->grade}}</td>
            <td>{{$section ->strand}}</td>
            <td scope="row">{{$section->section_number}}</td>
           
            <td>{{$section ->upper_gwa}} - {{$section ->lower_gwa}}</th>
        <td>@isset($adviser){{$adviser ->firstname}} {{$adviser ->middlename}} {{$adviser ->lastname}}@endisset</td>
         <td scope="row">{{$section->admission_limit}}</td>
            <td>{{$students}}</th>
          
         
     

           

               <td>
        
          
              <div class="btn-toolbar mb-3" role="toolbar" aria-label="Toolbar with button groups">
                <div class="btn-group me-2" role="group" aria-label="First group">
                   <a class="btn btn-md btn-warning" href="{{route('faculty.sections.show',$section->id) }}" role="button">View</a>
                  <a class="btn btn-md btn-success" href="{{route('faculty.sections.edit',$section->id) }}" role="button">Edit</a>


      <a class="btn btn-md btn-danger" href="{{route('faculty.deletesection',$section->id) }}" role="button">Delete</a>
                    </div>
              </div>


            </td>
          </tr>
          @endforeach
        </tbody>
      </table>

      {{$sections->links()}}
    </div>

  </div>
</div>


</div>

<br>

@endsection