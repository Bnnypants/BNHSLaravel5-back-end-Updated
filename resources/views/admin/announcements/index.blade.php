@extends('template.main')
@section('content')

<div id="enrollment-applications-container-base">

  <div id="enrollment-table-container">

    <span id="enrollment-applications-container-base-header">Announcements<small id="enrolemt-application-updated-at"><i class="fi fi-rr-calendar"></i> Latest update: <?php echo date('m/d/y'); ?></small></span>
  
    <div class="container-fluid p-0 m-0">
      <div id="search-table" class="form-field">
        <input type="search" placeholder="Search Queries" class="form-control search-input" data-table="table" />
        <a href={{route('admin.announcements.create') }} id="refresh">Create Announcement</a>
      </div>
      <table class="table table-hover" id="table">
        <thead>
          <tr>
            <th scope="col">Title</th>
                 <th scope="col"></th>
              <th scope="col">Content</th>
          <th scope="col">Delivered to:</th>
           <th scope="col">Action</th>
        
          </tr>
        </thead>
        <tbody>
          @foreach($announcements as $announcement)

          <tr>
    
    <td>{{$announcement->title}}</td>
<td><div class="text-center">
        <img src="{{asset('requirements/'.$announcement->image)}}" style="max-width:80%;" class="img-thumbnail"> 
    </div>  </td>
</td>
   <td>

    @php
$grades = DB::table('announcements_grades')->where('announcements_id',$announcement->id)->get();
    @endphp
            <div class="form-field">
      <div class="form-group">
        <textarea class="form-control" rows="5"  name="specification" style=" width: 500px;" >{{$announcement->content}}</textarea>
      </div>
    </div>
   </td>

<td>     
      <div class="enrollment-form-field" style="grid-template-columns:  3fr;">
      <div class="form-field">
     
        <div class="enrollment-form-field" style="grid-template-columns: 1fr 1fr 1fr 1fr; padding-left: 1.4rem;" >
          <div class="form-field" style="margin-right: 3rem;">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="1" name="gradelevel[]" id="modality" 
              @foreach($grades as $grade)

              @if($grade->grades_id == '1')

              checked 

              @endif

              @endforeach>
              <label class="form-check-label" for="flexRadioDefault1">
                Grade 7
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="2" name="gradelevel[]" id="modality"
               @foreach($grades as $grade)

              @if($grade->grades_id == '2')

              checked 

              @endif

              @endforeach>
              <label class="form-check-label" for="flexRadioDefault1">
                Grade 8
              </label>
            </div>
          </div>
          <div class="form-field" style="margin-right: 3rem;">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="3" name="gradelevel[]" id="modality"
               @foreach($grades as $grade)

              @if($grade->grades_id == '3')

              checked 

              @endif

              @endforeach>
              <label class="form-check-label" for="flexRadioDefault1">
                Grade 9
              </label>
            </div>

            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="4" name="gradelevel[]" id="modality"
               @foreach($grades as $grade)

              @if($grade->grades_id == '4')

              checked 

              @endif

              @endforeach>
              <label class="form-check-label" for="flexRadioDefault1">
                Grade 10
              </label>
            </div>
          </div>
          <div class="form-field" style="margin-right: 3rem;">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="5" name="gradelevel[]" id="grade11"
               onclick="Strands();" readonly 
                @foreach($grades as $grade)

              @if($grade->grades_id == '5')

              checked 

              @endif

              @endforeach>
              <label class="form-check-label" for="flexRadioDefault1">
                Grade 11
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="6" name="gradelevel[]" id="grade12"
              onclick="Strands();" 

              @foreach($grades as $grade)

              @if($grade->grades_id == '6')

              checked 

              @endif

              @endforeach >
              <label class="form-check-label" for="flexRadioDefault1">
                Grade 12 
              </label>
            </div>
          </div>


      </div>
    </div>
      </div></td>

            
           <td>

              <div class="btn-toolbar mb-3" role="toolbar" aria-label="Toolbar with button groups">
                <div class="btn-group me-2" role="group" aria-label="First group">
                  <a class="btn btn-md btn-warning" href="{{route('admin.announcements.show',$announcement->id) }}" role="button">View</a>
                  <a class="btn btn-md btn-success" href="{{route('admin.announcements.edit',$announcement->id) }}" role="button">Edit</a>
              
                </div>
              </div>


            </td>
          </tr>
          @endforeach
        </tbody>
      </table>

      {{$announcements->links()}}
    </div>

  </div>
</div>


</div>

  

@endsection