
 <div id="home-page-wrapper">
    <div id="main-content">
        <div class="content-header">
            
       
        
        <div id="enrollnow-container">
                   <div style=" background-color: transparent;">
                <img id='enrollnowbasecontainer_admin' src={{URL::asset('images/288533529_1286310252180725_5192055439551634249_n.png')}} alt="BNHS Logo" id='enrollnowimage'> 
            <div>
            </div>
            <div class="bg-img-title">
 @include('template.schoolyear')
            </div>
        </div>   
        
        
@php

$enrolled = DB::table('role_user')->where('role_id','2')->count();
$pending = DB::table('role_user')->where('role_id','4')->count();
$declined = DB::table('role_user')->where('role_id','5')->count();
$appeals = DB::table('appeals')->count();
$issues = DB::table('issue_reports')->where('status','unsolved')->count();
@endphp
    <div id="aside-content">
        <div class="content-header">
            <span class="content-header-text">General Report<br>
            </span>
<small id="enrolemt-application-updated-at"><i class="fi fi-rr-calendar"></i> Latest update: <?php echo date('m/d/y'); ?></small>
        </div>   
        <hr>
        <div class="aside-component">
             <div id="search-table" class="form-field">
 <a href="{{url('admin/accepted') }}"   id="refresh">Accepted Enrolment Forms: <br>{{$enrolled}}</a>
        </div>
             <div id="search-table" class="form-field">
 <a href="{{route('admin.users.index') }}"  id="refresh">Pending/Updated Enrolment Forms: <br>{{$pending}}</a>
        </div>
            <div id="search-table" class="form-field">
  <a href="{{url('admin/rejected') }}"  id="refresh">Rejected Enrolment Forms: {{$declined}} </a>
        </div>
             <div id="search-table" class="form-field">
<a href="{{route('admin.appeals.index') }}" id="refresh">Appeals Received: <br>{{$appeals}} </a>
        </div>
        <div id="search-table" class="form-field">
     <a href="{{route('admin.issue_reports.index') }}" id="refresh">Open Threads: <br>{{$issues}} </a>
        </div>
    <div id="search-table" class="form-field">
 <a href="{{url('admin/statistics') }}"  id="refresh">View Statistical <br> Report</a>
        </div>
      </div> 
    </div>

</div>