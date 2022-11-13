@extends('template.main')
@section('content')
  
<div id="home-page-wrapper">
    <div id="main-content">
        <div id="enrollnow-container">
            <div id='enrollnowbasecontainer'>
       
                <!-- <img src={{URL::asset('images/288533529_1286310252180725_5192055439551634249_n.png')}} alt="BNHS Logo" id='enrollnowimage'> -->
             
            </div>
       
               
                @php 
            $user = DB::table('users')->where('id', Auth::id())->first();

        
    if($user->gradeleveltoenrolin == 'Grade 7'){

$announcements =DB::table('announcements_grades')->where('grades_id' ,'1')->orderBy('id','DESC')->get();

    }
    
    if($user->gradeleveltoenrolin == 'Grade 8'){

$announcements =DB::table('announcements_grades')->where('grades_id' ,'2')->orderBy('id','DESC')->get();
        
    }

     if($user->gradeleveltoenrolin == 'Grade 9'){

$announcements =DB::table('announcements_grades')->where('grades_id' ,'3')->orderBy('id','DESC')->get();
        
    }

     if($user->gradeleveltoenrolin == 'Grade 10'){

$announcements =DB::table('announcements_grades')->where('grades_id' ,'4')->orderBy('id','DESC')->get();
        
    }

     if($user->gradeleveltoenrolin == 'Grade 11'){

$announcements =DB::table('announcements_grades')->where('grades_id' ,'5')->orderBy('id','DESC')->get();
        
    }

     if($user->gradeleveltoenrolin == 'Grade 12'){

$announcements =DB::table('announcements_grades')->where('grades_id' ,'6')->orderBy('id','DESC')->get();
        
    }
    

                @endphp
                
                  <div id="aside-content">
        <div class="content-header">
            <span class="content-header-text">Announcements<br>
            </span>
<small id="enrolemt-application-updated-at"><i class="fi fi-rr-calendar"></i> Latest update: <?php echo date('m/d/y'); ?></small>
        </div>   
        <hr>
        <div class="aside-component">
            
@foreach($announcements as $announcement)

@php

$data = DB::table('announcements')->where('id', $announcement->announcements_id)->first();

@endphp
    <div id="search-table" class="form-field">
 <a href="{{route('enrolledstudent.student_announcement.show',$data->id) }}"  id="refresh">@isset($data){{$data->title}} @endisset</a>
        </div>

        @endforeach
      </div> 
    </div>
            </div>
            </div>
       <span id='school-updates-text'>
        <span id="system-name">
                        School  <img src={{URL::asset('images/update-1672353_640.png')}} style="width:13%">
                    </span>
                <div class="slideshow-container">
                    <div class="mySlides fade">
                        <div class="numbertext">1 / 3</div>
                        <img src={{URL::asset('images/T.jpg')}} style="width:60%">
                    </div>
                    <div class="mySlides fade">
                        <div class="numbertext">2 / 3</div>
                        <img src={{URL::asset('images/H.jpg')}} style="width:60%">
                    </div>
                    <div class="mySlides fade">
                        <div class="numbertext">3 / 3</div>
                        <img src={{URL::asset('images/P.jpg')}} style="width:60%">
                    </div>

                    <a class="prev" onclick="plusSlides(-1)">❮</a>
                    <a class="next" onclick="plusSlides(1)">❯</a>
                </div>
                <br>
                <div style="text-align:center">
                    <span class="dot" onclick="currentSlide(1)"></span>
                    <span class="dot" onclick="currentSlide(2)"></span>
                    <span class="dot" onclick="currentSlide(3)"></span>
                </div>
            </div>

@endsection