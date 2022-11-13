@extends('template.main')
@section('content')
<div class="card text-center">
  <div class="card-header">
    
 <center id="form-top-header">
      <img src={{URL::asset('logo.png')}} alt="Logo" id="form-school-logo">
      <span id="school-name">Basista National High School</span>
      <span id="school-location">Basista, Pangasinan</span>
      <span id="acadyear">Academic Year 2022 - 2023</span>
    </center>

  </div>

   <form action="{{route('admin.announcements.update',$announcement->id) }}" method ="POST" enctype="multipart/form-data" >
              @method("PATCH")
              @csrf
  <div class="card-body">

    <div class="text-center">
        <img src="{{asset('requirements/'.$announcement->image)}}" style="max-width:20%;" class="img-thumbnail"> 
    </div>
    <div class="form-field">
      <label for="title">Title</label>
        <input name="title" type="text" class="form-control @error('title') is-invalid |@enderror" id="title" aria-describedby="title" value="{{$announcement->title}}" required>
        @error('title')
        <span class="invalid-feedback" role="alert">
          {{$message}}
        </span>
        @enderror

      </div>
          <div class="enrollment-form-field" style="grid-template-columns: 2fr 2fr">
      <div class="form-field">
        <label for="documents">Announcement Photo:</label>
        <div style="width: 100%;" class="file-upload" id="file-upload">
          <div class="file-select">
            <div class="file-select-button" id="fileName">Upload Photo</div>
            <div class="file-select-name" id="noFile">No file chosen...</div>
            <input name="chooseFile" type="file" class="@error('chooseFile') is-invalid |@enderror" id="chooseFile" aria-describedby="chooseFile" value="{{$announcement->image}}" >
            @error('chooseFile')
            <span class="invalid-feedback" role="alert">
              {{$message}}
            </span>
            @enderror
          </div>
        </div>
      </div>
   
    </div>
     <div class="form-field" id="semester" >
      <div class="form-info-header">
      <span>Assign Grade Level</span>
    </div>

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
              <input class="form-check-input" type="checkbox" value="4" name="gradelevel[]" id="modality"  @foreach($grades as $grade)

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

              @endforeach> 
              <label class="form-check-label" for="flexRadioDefault1">
                Grade 12 
              </label>
            </div>
          </div>


      </div>
    </div>
      </div>

 </div>

        <div class="form-group">
          <label for="specification">Content:</label>
        <textarea class="form-control" id="specification" rows="20"  name="specification" style=" width:1500px;" required>{{$announcement->content}}</textarea>
      </div>
  
  </div>
  <div class="card-footer text-muted">
    <div class="enrollment-form-field">
      <button style="font-size: 14px;" class="btn btn-success">Submit</button>
      <a style="font-size: 14px;" class="btn btn-warning" href="{{ URL::previous() }}" role="button">Back</a>
    </div>
  </div>
</div>

</form>
@endsection