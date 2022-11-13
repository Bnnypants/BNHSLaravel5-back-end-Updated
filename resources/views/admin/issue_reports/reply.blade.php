@extends('template.main')
@section('content')

<div id="form-container-base">
  <form method="POST" action="{{route('admin.issue_reports.update',$message->id) }}">
     
    @method('PUT')
   @csrf


  <div class="form-field">
      <div class="form-group">
        <label for="comment">Latest Student Reply:</label>
        <textarea class="form-control" rows="5" id="comment" name="reply" readonly required >{{$message->message}}</textarea>
      </div>
    </div>
    <div class="form-field">
      <div class="form-group">
        <label for="comment">Reply:</label>
        <textarea class="form-control" rows="5" id="comment" name="specification" required></textarea>
      </div>
    </div>
    <div class="form-field">
      <button type="submit" id="login-btn">Submit</button>
    </div>


  </form>
</div>
@endsection
