<link href="{{public_path('css/bootstrap.css') }}" rel="stylesheet">
<style type="text/css">
  $main-color: #5cb85c;
$white: #ffffff;
$background-white: $white;
$background-light: #f8f9fc;
$dark: #181818;
$border: #d9d9d9;

    .morris-hover {
  position:absolute;
  z-index:1000;
}

.morris-hover.morris-default-style {     border-radius:10px;
  padding:6px;
  color:#666;
  background:rgba(255, 255, 255, 0.8);
  border:solid 2px rgba(230, 230, 230, 0.8);
  font-family:sans-serif;
  font-size:12px;
  text-align:center;
}

.morris-hover.morris-default-style .morris-hover-row-label {
  font-weight:bold;
  margin:0.25em 0;
}

.morris-hover.morris-default-style .morris-hover-point {
  white-space:nowrap;
  margin:0.1em 0;
}

svg { width: 100%; }

@font-face {
    font-family: "Diploma";
    src: url("../fonts/Diploma/Diploma\ Regular.ttf") format("truetype");
     font-size:12px;
}

@font-face {
    font-family: "Montserrat";
    src: url("../fonts/Montserrat/static/Montserrat-Regular.ttf")
        format("truetype");
         font-size:12px;
}


* {
    box-sizing: border-box;
    user-select: none;
    user-zoom: none;
    font-family: "Montserrat", sans-serif;

    &:focus,
    &:hover {
        outline: none;
    }
}

html {
    scroll-behavior: smooth !important;
    font-family: "Montserrat", sans-serif;
}

body {
    padding: 0;
    margin: 0;
    background: $background-light;
    font-family: "Montserrat", sans-serif;
    overflow: hidden;
    background-image: url("../../public/background.jpg");
    background-attachment: fixed;
    background-repeat: no-repeat;
    background-size: cover;
    background-blend-mode: overlay;
}

footer {
    display: grid;
    place-items: center;
    padding: 2rem 10rem;
    background-color: rgba(92, 184, 92, 0.5);

    #footer-logo {
        width: 10rem;
        height: 10rem;
        margin-bottom: 3rem;
    }

    #copyright {
        font-size: 12px;
        text-align: center;
        color: $dark;
    }
}

.file-upload {
    display: block;
    text-align: center;
    font-family: Helvetica, Arial, sans-serif;
    font-size: 12px;
}
.file-upload .file-select {
    display: block;
    border: 2px solid #dce4ec;
    color: #34495e;
    cursor: pointer;
    height: 40px;
    line-height: 40px;
    text-align: left;
    background: #ffffff;
    overflow: hidden;
    position: relative;
    width: 100% !important;
}
.file-upload .file-select .file-select-button {
    background: #dce4ec;
    padding: 0 10px;
    display: inline-block;
    height: 40px;
    line-height: 40px;
}
.file-upload .file-select .file-select-name {
    line-height: 40px;
    display: inline-block;
    text-align: left;
    padding: 0 10px;
    width: auto;
}
.file-upload .file-select:hover {
    border-color: #34495e;
    transition: all 0.2s ease-in-out;
    -moz-transition: all 0.2s ease-in-out;
    -webkit-transition: all 0.2s ease-in-out;
    -o-transition: all 0.2s ease-in-out;
}
.file-upload .file-select:hover .file-select-button {
    background: #34495e;
    color: #ffffff;
    transition: all 0.2s ease-in-out;
    -moz-transition: all 0.2s ease-in-out;
    -webkit-transition: all 0.2s ease-in-out;
    -o-transition: all 0.2s ease-in-out;
}
.file-upload.active .file-select {
    border-color: $main-color;
    transition: all 0.2s ease-in-out;
    -moz-transition: all 0.2s ease-in-out;
    -webkit-transition: all 0.2s ease-in-out;
    -o-transition: all 0.2s ease-in-out;
}
.file-upload.active .file-select .file-select-button {
    background: $main-color;
    color: #ffffff;
    transition: all 0.2s ease-in-out;
    -moz-transition: all 0.2s ease-in-out;
    -webkit-transition: all 0.2s ease-in-out;
    -o-transition: all 0.2s ease-in-out;
}
.file-upload .file-select input[type="file"] {
    z-index: 100;
    cursor: pointer;
    position: absolute;
    height: 100%;
    width: 100%;
    top: 0;
    left: 0;
    opacity: 0;
    filter: alpha(opacity=0);
}
.file-upload .file-select.file-select-disabled {
    opacity: 0.65;
}
.file-upload .file-select.file-select-disabled:hover {
    cursor: default;
    display: block;
    border: 2px solid #dce4ec;
    color: #34495e;
    cursor: pointer;
    height: 40px;
    line-height: 40px;
    margin-top: 5px;
    text-align: left;
    background: #ffffff;
    overflow: hidden;
    position: relative;
}
.file-upload .file-select.file-select-disabled:hover .file-select-button {
    background: #dce4ec;
    color: #666666;
    padding: 0 10px;
    display: inline-block;
    height: 40px;
    line-height: 40px;
}
.file-upload .file-select.file-select-disabled:hover .file-select-name {
    line-height: 40px;
    display: inline-block;
    padding: 0 10px;
}

.alert {
    border-radius: 0;
    color: $white;
    position: fixed !important;
    bottom: 0;
    width: 15rem !important;
    right: 1rem;
    z-index: 9;
    font-size: 14px;
    transition: all 0.8s ease-in-out;
    animation: slideLeft 0.8s ease-in-out 1;
    font-weight: normal;
}

@keyframes slideLeft {
    0% {
        right: -20rem;
        opacity: 0;
    }
    100% {
        right: 1rem;
        opacity: 1;
    }
}

.fi {
    line-height: 0 !important;
    margin-top: 2.5px;
    font-size: 12px;
    display: inline-block;
}

#page-content-wrapper {
    padding: 0;
    margin: 0;
    width: 100vw;
    height: 100vh;
    display: grid;
    grid-template-rows: auto 1fr auto;
    position: relative;
    overflow-y: scroll;
}

#navbar {
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    align-items: center;
    padding: 1rem 10rem;
    box-shadow: 0 0 40px rgba(0, 0, 0, 0.1);
    position: sticky;
    top: 0;
    z-index: 99999;
    background-color: $background-white;
}

#navbar-logo-brand {
    display: flex;
    flex-direction: row;
    justify-content: flex-start;
    text-decoration: none;
    color: #181818;

    #logo {
        width: 3rem;
        height: 3rem;
    }

    #system-name {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: flex-start;
        margin-left: 10px;

        span {
            font-family: "Diploma";
            font-size: 22px;
            color: $main-color;
        }

        small {
            display: block;
            font-family: "Montserrat";
            font-size: 14px;
            margin-top: -10px;
            color: $dark;
        }
    }
}

#navlink-container {
    display: flex;
    flex-direction: row;
    justify-content: flex-end;
    align-items: center;
    padding: 0;
    margin: 0;
    list-style-type: none;
}

.navlinks {
    margin-left: 10px;

    .active {
        color: $main-color !important;
        font-weight: 900;
    }

    .navlinks-anchor {
        text-decoration: none;
        padding: 8px 16px;
        font-size: 14px;
        color: $dark;
        position: relative;
        transition: all 0.25s ease-in-out;
        color: $dark;

        &:hover {
            font-weight: 900;
        }

        &:hover::after {
            content: "";
            display: block;
            width: 100%;
            height: 2px;
            background-color: $main-color;
            position: absolute;
            left: 0;
            bottom: 0;
            animation: scale 0.25s ease-in-out 1;
        }

        @keyframes scale {
            from {
                opacity: 0;
                width: 0;
            }
            to {
                opacity: 1;
                width: 100%;
            }
        }
    }
}

#main {
    padding: 3rem 10rem;
    height: 100%;
}

// Form

#form-container-base {
    display: grid;
    place-items: center;
    padding: 2rem;
    position: relative;
}

#form-header {
    font-size: 30px;
    font-weight: 900;
}

.form-field,
.form-field-row {
    display: flex;
    flex-direction: column;
    justify-content: flex-start;
    align-items: baseline !important;
    margin-bottom: 1rem;
    position: relative;


    .invalid-feedback {
        color: red;
        font-size: 12px;
        padding: 3px 0;
    }

    .is-invalid {
        border-color: red;
    }

    label {
        display: block;
        font-size: 14px;
        color: $dark;
        margin-bottom: 5px;
    }

    input,
    select,
    #login-btn,
    #send-reset-request-btn,
    #back,
    #resend-verification-email-btn,
    .file-select,
    #reset-password,
    #refresh,
    #resend-verification,
    #create,
    #activate {
        padding: 8px 1rem;
        border: 1px solid $border;
        border-radius: 5px;
        width: 15rem;
        font-size: 14px;
        transition: all 0.25s ease-in-out;

        &:focus {
            border-color: transparent;
            box-shadow: 0 0 0 5px rgba(92, 184, 92, 0.3);
        }
    }

    #activate {
        background-color: $main-color;
        border: 1px solid $main-color;
        color: $white;
    }

    button {
        border-color: transparent;
    }

    #resend-verification,
    #create {
        background: $main-color;
        color: $white;
        border: 0;
    }

    #refresh {
        width: auto !important;
        color: $main-color;
        text-decoration: none;

        i {
            padding-top: 2px;
            margin-right: 3px;
        }

        &:hover {
            background-color: $main-color !important;
            color: $white;
            border: 1px solid $main-color;

            i {
                color: $white;
            }
        }
    }

    .file-select {
        padding: 0;
    }

    select {
        appearance: none;
        -moz-appearance: none;
        -webkit-appearance: none;
        position: relative;

        &::after {
            content: "\f11c";
            font-family: "uicons-regular-rounded" !important;
            color: $dark;
            display: block;
            position: absolute;
            top: 0;
            z-index: 99999999;
            right: 1rem;
            font-size: 22px;
            width: 1rem;
            height: 1rem;
            border: 1px solid red;
        }
    }

    #login-btn,
    #reset-password,
    #send-reset-request-btn,
    #back,
    #resend-verification-email-btn {
        background-color: $main-color;
        color: $white;
        font-size: 14px;

        &:hover {
            border-color: transparent;
            box-shadow: 0 0 0 5px rgba(92, 184, 92, 0.3);
        }
    }

    #reset-password {
        width: 100%;
        border: 0;
    }

    #back {
        width: auto;
        text-decoration: none;
        background-color: $background-white;
        color: $dark;
    }
}

.form-field-row {
    flex-direction: row;
    justify-content: flex-start;
    align-items: center;

    #send-reset-request-btn,
    #resend-verification-email-btn {
        width: 100% !important;
        margin-left: 10px;
    }
}

#help-sec {
    margin-top: 1rem;
    display: flex;
    flex-direction: column;
    justify-content: flex-start;
    align-items: flex-start;

    a {
        font-size: 12px;
        text-decoration: none;
    margin-bottom: 3px;

    &:hover {
      color:  $main-color !important;
    }
    }
}





#home-page-wrapper {
    display: grid;
    grid-template-columns: 1fr 15rem;
    grid-gap: 4rem;
}

.content-header {
    margin-bottom: 1rem;
    &-text {
        font-size: 22px;
        color: $dark;
        font-weight: 900;
    }
}

#main-content,
#aside-content {
    border: 0;
}

.aside-component {
    width: 100%;
    height: 10rem;
    background-color: $white;
    margin-bottom: 1rem;
}

#enrollnow-container {
    background-image: url("../../public/enrollnow.png");
    background-position: center;
    background-size: cover;
    height: 25rem;
    padding: 2rem 4rem;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    align-items: flex-start;
}

#enrollnow-school-logo {
    width: 5rem;
    height: 5rem;
    margin-bottom: 2rem;
}

#admission-text {
    font-family: "Montserrat";
    font-weight: 900;
    color: $dark;
}

#enroll-now-btn {
    padding: 12px 1rem;
    background: #10376b;
    color: $white;
    text-decoration: none;
    font-size: 14px;
    transition: all 0.25s ease-in-out;

    &:hover {
        box-shadow: 0 0 0 5px rgba(16, 55, 107, 0.3);
    }
}

// Enrollment Application Form

#form-top-header {
    display: flex;
    flex-direction: column;
    justify-content: flex-start;
    align-items: center;

    #school-name {
        font-family: "Diploma";
        font-size: 25px;
        margin-top: 1rem;
    }

    #school-location {
        font-size: 13px;
        font-weight: 900;
    }

    #acadyear {
        font-size: 12px;
    }
}

#enrollform-header {
    font-size: 22px;
    font-weight: 900;
    margin-bottom: 1rem;
    display: block;
}

#enrollment-form {
    background-color: $white;
}

#enrollform-base {
    height: auto;
    width: 100%;
    padding: 3rem 5rem;
    border: 1px solid $border;

    .form-field-row {
        align-items: flex-start;
        width: auto !important;

        div {
            margin-right: 1rem;
        }
    }

    hr {
        margin: 2rem 0;
    }

    .form-field {
        .btn-group {
            width: 100%;
            height: 2.75rem;

            input {
                padding-top: 5px;
            }
        }
    }
}

#submit-enrollment-application {
    padding: 8px 1rem;
    border: 1px solid $border;
    border-radius: 5px;
    width: auto;
    font-size: 14px;
    transition: all 0.25s ease-in-out;
    background-color: $main-color;
    color: $white;

    &:hover {
        border-color: transparent;
        box-shadow: 0 0 0 5px rgba(92, 184, 92, 0.3);
    }
}

.form-info-header {
    margin: 1rem 0;

    span {
        font-weight: 900;
    }
}

.enrollment-form-field {
    display: grid;
    grid-template-columns: 1fr 1fr 1fr;
    grid-gap: 1rem;

    label {
        font-weight: 600;
    }

    input,
    select {
        width: 100%;
    }
}

#schooltype,
#studenttype,
#sex,
#addressstatus,
#yesCheck1,
#noCheck1,
#indigencyradio,
#modality,
#grade11,
#grade12,
#psastatus
{
    width: 1rem !important;
    height: 1rem !important;
    padding: 0;
    border-radius: 50px !important;
    display: flex;
    flex-direction: column;
    justify-content: flex-start;
    align-items: flex-start;
}

.form-check {
    width: 100%;

    div {
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        align-items: center;
        padding-left: 1.3rem;

        input {
            margin-top: -6px;
            margin-right: 5px;
        }
    }
    margin: 0;
    padding: 0;
}

#form-school-logo {
    width: 5rem;
    height: 5rem;
}

.ui-menu {
    background-color: $background-light !important;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.05);
    border-radius: 5px !important;
    font-size: 8px;
    margin-top: 10px !important;
    overflow-x: hidden !important;
    overflow-y: scroll !important;
    max-height: 10rem;

    .ui-menu-item {
        background-color: $white !important;
        border-radius: 5px !important;
        .ui-menu-item-wrapper {
            padding: 8px 10px !important;
            background-color: transparent;
            color: $dark;
            border: 0 !important;

            &:hover {
                border: 0 !important;
                background-color: rgba(92, 184, 92, 0.5) !important;
            }
        }
    }
}

.ui-datepicker-div {
    border-radius: 5px !important;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.05) !important;
    padding: 0 !important;

    .ui-datepicker-header {
        background-color: $background-white !important;
    }
}

// admin

#enrollment-applications-container-base {
    width: 100%;
}

#enrollment-applications-container-base-header {
    font-size: 22px;
    font-weight: 900;
    padding: 0 2.4rem;
    margin-bottom: 1rem;
    display: block;
    display: flex;
    flex-direction: column;
    justify-content: flex-start;
    align-items: flex-start;

    #enrolemt-application-updated-at {
        font-size: 14px !important;
        font-weight: normal;
    }
}

#enrollment-table-container {
    width: 100%;
    height: 100%;
    padding: 2rem 0;
    background-color: $background-white;
    border: 1px solid $border;
    position: relative;
}

#sort-div {
    border: 1px solid $border;
    border-left: 0;
    border-right: 0;
    border-top: 0;
    margin-bottom: 1rem;
    width: 100%;
    position: sticky;
    top: 0 !important;

    .btn {
        border: 0;
        background: transparent;
        border-radius: 0;
        width: 7rem;
        text-align: center;
        padding: 16px;
        position: relative;

        &:hover {
            color: $main-color;
        }

        &:focus {
            outline: none !important;
            box-shadow: none !important;
        }
    }

    .active-tab {
        color: $main-color !important;
        font-weight: 900;

        &::after {
            content: "";
            position: absolute;
            bottom: 0;
            left: 0;
            width: inherit;
            height: 4px;
            border-radius: 2px 2px 0 0;
            display: block;
            background-color: $main-color;
        }
    }
}

#search-table {
    padding: 0 2.3rem !important;
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    align-items: center;
}

.table {
    padding: 0 !important;
    width: inherit !important;
    background-color: $background-white !important;
    border: 0 !important;

    thead,
    tr,
    th {
        white-space: nowrap;
        border: 0 !important;
    }

    thead {
        border: 0 !important;
        background-color: whitesmoke !important;
        width: 100% !important;

        tr {
            th {
                padding: 10px !important;
                border: 0 !important;
                font-size: 14px !important;
            }
        }
    }

    tbody {
        border: 0;
        margin-top: 1rem !important;
        background-color: $background-white !important;

        tr {
            padding: 0 !important;
            border-color: $border !important;

            td {
                padding-top: 19px;
                font-size: 14px !important;
                position: relative !important;
                padding: 14px !important;
                padding-bottom: 0 !important;

                a {
                    font-size: 14px !important;
                }
            }

            &:hover {
                cursor: pointer;
            }
        }
    }
}

#asa {
    font-size: 22px;
    font-weight: 900;
    display: block;
    margin-bottom: 1rem;
}

#activate-student-account-details {
    width: 100% !important;
}

.form-check-label {
    font-size: 14px;
}

#requirement-image {
    width: inherit !important;
    height: 100%;
}

#return-login-btn, #back {
    padding: 8px 1rem;
    border: 1px solid transparent;
    border-radius: 5px;
    width: 6.5rem !important;
    font-size: 14px;
    transition: all 0.25s ease-in-out;
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    align-items: center;

    &:focus {
        border-color: transparent;
        box-shadow: 0 0 0 5px rgba(92, 184, 92, 0.3);
    }
}

#return-login-btn, #back {
    background-color: $main-color;
    color: $white;
    text-decoration: none;
}
</style>

<div id="enrollment-applications-container-base">
  <div id="enrollment-table-container">

    <span id="enrollment-applications-container-base-header">Generated List<small id="enrolemt-application-updated-at"><i class="fi fi-rr-calendar"></i> Latest update: <?php echo date('m/d/y'); ?></small></span>

    <div class="container-fluid p-0 m-0">
      <div id="search-table" class="form-field">
        <input type="search" placeholder="Search Queries" class="form-control search-input" data-table="table" />
           <div>
          
  
              @csrf
           <button class="btn btn-md btn-success" type="submit" role="button">Print</button>
      
        </div>
      </div>
      <table class="table table-hover" id="table">
        <thead>
          <tr>
            <th scope="col">LRN</th>

            <th scope="col">Name</th>
            <th scope="col">PSA</th>
             <th scope="col">4Ps ID</th>
            <th scope="col">Grade Level</th>
            <th scope="col">Strand</th>
            <th scope="col">Sex</th>
             <th scope="col">Student Type</th>
              <th scope="col">Baranggay</th>
              <th scope="col">Municipality</th>
            <th scope="col">Section</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach($users as $user)
          <tr>
            <td scope="row">{{$user->lrnnumber}} <input type="hidden" name="users[]" value="{{$user->id}}"> </td>
            <td>{{$user ->name}} {{$user->lastname}}</th>
          
            <td>{{$user ->generalaverage}}</td>
             <td>{{$user->gradeleveltoenrolin}}</td>
             <td>{{$user->strandtoenrolin}}</td>
             <td>{{$user->sex}}</td>
            <td>{{$user->studenttype}}</td>
                <td>{{$user->barangay}}</td>
                    <td>{{$user->municipality}}</td>





@php


@endphp

 <td>


@php
 $adviser =  DB::table('teachers')->where('advisory',$user->section)->first();

@endphp

@isset($user->section)Section Number {{$user->section}}@endisset<br> @isset($adviser)Adviser :{{$adviser->firstname}} {{$adviser->middlename}} {{$adviser->lastname}} @endisset()




           </td>
            <td>


              {{-- <form action="{{route('admin.users.destroy',$user->id) }}" method ="POST" >
              @method("DELETE")--}}
              @csrf



            </td>
          </tr>
          @endforeach
        
        </tbody>
      </table>

    </div>

  </div>
</div>


</div>

<br>
