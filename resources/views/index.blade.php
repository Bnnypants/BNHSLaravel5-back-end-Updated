@extends('template.main')
@section('content')
   @if (Auth::guest())
<div id="home-page-wrapper">
    <div id="main-content">
        <div id="enrollnow-container">
            <div id='enrollnowbasecontainer'>
       
                <!-- <img src={{URL::asset('images/288533529_1286310252180725_5192055439551634249_n.png')}} alt="BNHS Logo" id='enrollnowimage'> -->
                <a href={{route('student.check.create') }}  id="enroll-now-btn">Enroll Now</a>
            </div>
            <div id='reqs'>
                <span id='reqs-header'>
                    HOW TO ENROLL?
                </span>
                <br>
                <ul id="req-list">
                     <li class="req-list-text">
                        Verify your email and LRN(Learner's Reference Number)
                    </li>
                    <li class="req-list-text">
                        Fill out the enrolment form and provide necessary documents: <br>
                        SF9 Report Card and NSO/PSA/Birthcertificate
                    </li>
                   
                    <li class="req-list-text">
                        Await for your enrolment form's assesment. If your enrolment form is rejected we will send you an email to inform you with instructions on how to fix your enrolment form.
                    </li>
                    <li class="req-list-text">
                        If your enrolment form is approved you will receive an email containing the link to activate your account. Please present the physical copy of your enrolment for and requirements to BNHS within 15 days.
                    </li>
                </ul>
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
        
    @endif
    @can('is-student')
@include('student-index')
@endcan

@can('is-admin')
@include('admin-index')
@endcan


@endsection