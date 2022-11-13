<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="shortcut icon" href={{URL::asset('logo.png')}} type="image/x-icon">
  <link href="{{asset('css/bootstrap.css') }}" rel="stylesheet">
  <link href="{{asset('css/app.css') }}" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-1.12.3.js"></script>
  <script src="htpps://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>

  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css">
  <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-rounded/css/uicons-regular-rounded.css'>
  <script src="{{asset('js/app.js') }}" defer> </script>
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css">
  <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-rounded/css/uicons-regular-rounded.css'>
  <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-straight/css/uicons-regular-straight.css'>
  <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-brands/css/uicons-brands.css'>
<link rel="stylesheet" href="https://www.cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="https://code.jquery.com/jquery-1.8.2.min.js"></script>
 <link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;600;700;800&display=swap" rel="stylesheet">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
   <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet"> 
  <title>BNHS Enrolment System</title>
</head>
 
<body>
  <div id="page-content-wrapper">
    <div id='rss'>
      <span>
        <i class="fi fi-rs-marker"></i> Basista, Pangasinan, Philippines
      </span>
      <span>
             @php
          $id = Auth::id();
          $login = DB::table('users')->where('id', $id)->first();
          @endphp
 
                    @isset($login )<b>Logged in as, {{$login->name}} {{$login->lastname}} </b>@endisset()
      </span>
    </div>  

  <div id="page-content-wrapper">
    <nav id="navbar">
      <a href={{ url('index')}} id="navbar-logo-brand">
        <img src={{URL::asset('logo.png')}} alt="" id="logo">
        <span id="system-name">
          <span>Basista National High School</span>
          <small>Enrollment System</small>

        </span>
      </a>

      @if (Route::has('login'))
      <div id="navlink-container-base">
        <ul id="navlink-container">
          @if (Auth::guest())
          <li class="navlinks">
            <a href={{ url('index')}} class="navlinks-anchor {{ Request::is('index*') ? 'active' : '' }}">Home</a>
          </li>
          <li class="navlinks">
            <a href={{url('user/about') }} class="navlinks-anchor {{ Request::is('user/about*') ? 'active' : '' }}">About</a>
          </li>
          <li class="navlinks">
            <a href={{url('user/contact') }} class="navlinks-anchor {{ Request::is('user/contact*') ? 'active' : '' }}">Contact</a>
          </li>
          @endif
          @auth
  @can('is-student')
   <li class="navlinks">
            <a href={{url('enrolledstudent/studentprofile') }} class="navlinks-anchor {{ Request::is('user/contact*') ? 'active' : '' }}">Student Profile</a>
          </li>
      <li class="navlinks">
            <a href={{url('enrolledstudent/studentsectionview') }} class="navlinks-anchor {{ Request::is('user/contact*') ? 'active' : '' }}">Schedule</a>
          </li>

           <li class="navlinks">
            <a href={{route('enrolledstudent.student_announcement.index') }} class="navlinks-anchor {{ Request::is('user/contact*') ? 'active' : '' }}">Announcements</a>
          </li>
             <li class="navlinks">
            <a href={{route('enrolledstudent.student_issue_report.index') }} class="navlinks-anchor {{ Request::is('user/contact*') ? 'active' : '' }}">Talk with Us</a>
          </li>

  @endcan()
          @can('is-admin')
     <li class="navlinks">
            <a href={{url('admin/users') }} class="navlinks-anchor {{ Request::is('admin/users*') ||  Request::is('admin/updated*') || Request::is('admin/rejected*') || Request::is('admin/accepted*') || Request::is('admin/reason*') || Request::is('admin/reportcard*') || Request::is('admin/birthcertificate*') ? 'active' : '' }}" id="applications"> Enrolment Applications</a>
          </li>
 
    <li class="navlinks">
            <a href={{route('faculty.teachers.index') }} class="navlinks-anchor {{ Request::is('admin/users/create*') ? 'active' : '' }}">Teachers</a>
          </li>

      <li class="navlinks">
            <a href={{route('faculty.subjects.index') }} class="navlinks-anchor {{ Request::is('admin/users/create*') ? 'active' : '' }}">Subjects</a>
          </li>

          <li class="navlinks">
            <a href={{route('faculty.sections.index') }} class="navlinks-anchor {{ Request::is('admin/users/create*') ? 'active' : '' }}">Sections</a>
          </li>
  
  
     
               <li class="navlinks">
            <a href={{route('admin.announcements.index') }} class="navlinks-anchor {{ Request::is('admin/users/create*') ? 'active' : '' }}">Announcements</a>
          </li>
          <li class="navlinks">
            <a href={{route('admin.management.index') }} class="navlinks-anchor {{ Request::is('admin/users/create*') ? 'active' : '' }}">Admin Management</a>
          </li>
          @endcan
          <li class="navlinks">
            <a href={{ url('logout') }} class="navlinks-anchor" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
          </li>
          <form id="logout-form" action="{{route('logout')}}" method="POST" style="display:none">
            @csrf
          </form>
          @else
          <li class="navlinks">
            <a href={{ route('login') }} class="navlinks-anchor {{ Request::is('login*') || Request::is('forgot-password*') || Request::is('user/verify*') ? 'active' : '' }}">Login</a>
          </li>
          @if (Route::has('register'))
          <li class="navlinks">
            <a href={{route('student.check.create') }} class="navlinks-anchor {{ Request::is('register*') ? 'active' : '' }}">Enroll</a>
          </li>



          @endif   
          @endauth
        </ul>
      </div>
      @endif
    </nav>

    <main id="main">
      @include('partials.alerts')
      @yield('content') 
      @can('logged-in')
      @endcan()
    </main>
  <footer>
      <img src={{URL::asset('logo.png')}} alt="" id="footer-logo">
      <span id="copyright">
        &copy; Copyright 2022 <br> Basista National High School
      </span>
    </footer>
  </div>
  @if (Request::is('admin/users/create*'))
  <script>
    document.getElementById('applications').classList.remove('active');
  </script>
  @endif
  <script>
    $(document).ready(() => {
      $('.alert').delay(4000).fadeOut('slow');
    });

    const displayChange = () => {
      let ic1 = document.getElementById('yesCheck1').value;
      let ic2 = document.getElementById('noCheck1').value;
      let ir = document.getElementById('indigencyradio').value;
      let glsi = document.getElementById('glsi');

      if(ic1.checked && ir.checked) {
        glsi.style.gridTemplateColumns = '2fr 1fr';
      } else if (ic1.checked && !ir.checked || !ic1.checked && ir.checked) {
        glsi.style.gridTemplateColumns = '3fr';
      }
    }

    $(function() {
      var mothertongue = [
              'AKLANON',
              'BIKOL',
              'CEBUANO',
              'CHAVACANO',
              'ENGLISH',
              'FILIPINO',
              'HILIGAYNON',
              'IBINAG',
              'ILOKANO',
              'IVATAN',
              'KAPAMPANGAN',
              'KINARAY-A',
              'MAGUINDANAO',
              'MARANAO',
              'PANGASINAN'

      ];
      $("#mothertongue").autocomplete({
        source: mothertongue
      });
    });

    $(function() {
      var IndegenousCommunitySpecification = [
            "TAGALOG",
            "ILOKANO",
            "KAPAMPANGAN",
            "BIKOLANO",
            "AETA",
            "IGOROT",
            "IVATAN",
            "MANGYAN",
            "CEBUANO",
            "WARAY",
            "ILONGGO",
            "ATI",
            "SALUDNON",
            "BADJAO",
            "YAKAN",
            "B'LAAN",
            "MARANAO",
            "T'BOLI",
            "TAUSUG",
            "BAGOBO"
      ];
      $("#IndegenousCommunitySpecification").autocomplete({
        source: IndegenousCommunitySpecification
      });
    });

        $(function() {
      var currentbaranggay = [
       "ANAMBONGAN",
       "BAYOYONG",
       "CABELDETAN",
       "DUMPAY",
       "MALIMPEC EAST",
       "MAPOLOPOLO",
       "NALNERAN",
       "NAVATAT",
       "OBONG",
       "OSMENA SR.",
       "PALMA",
       "PATACBO",
       "POBLACION"

      ];
      $("#currentbaranggay").autocomplete({
        source: currentbaranggay
      });
    });

        $(function() {
      var permanentbaranggay = [
       "ANAMBONGANAN",
       "BAYOYONG",
       "CABELDATAN",
       "DUMPAY",
       "MALIMPEC EAST",
       "MAPOLOPLO",
       "NALNERAN",
       "NAVATAT",
       "OBONG",
       "OSMENA SR.",
       "PALMA",
       "PATACBO",
       "POBLACION"

      ];
      $("#permanentbaranggay").autocomplete({
        source: permanentbaranggay
      });
    });
    $(function() {
      var birthplace = [

      "AGNO",
      "AGUILAR",
      "ALCALA",
      "ANDA",
      "ASINGAN",
      "BALUNGAO",
      "BANI",
      "BASISTA",
      "BAUTISTA",
      "BAYAMBANG",
      "BINALONAN",
      "BINMALEY",
      "BOLINAO",
      "BUGALLON",
      "BURGOS",
      "CALASIAO",
      "DASOL",
      "INFANTA",
      "LABRADOR",
      "LAOAC",
      "LINGAYEN",
      "MABINI",
      "MALASIQUI",
      "MANAOAG",
      "MANGALDAN",
      "MANGATAREM",
      "MAPANDAN",
      "NATIVIDAD",
      "POZORRUBIO",
      "ROSALES",
      "SAN FABIAN",
      "SAN JACINTO",
      "SAN MANUEL",
      "SAN NICOLAS",
      "SAN QUINTIN",
      "SANTA BARBARA",
      "SANTA MARIA",
      "SANTO TOMAS",
      "SAN CARLOS",
      "SISON",
      "SUAL",
      "TAYUG",
      "UMINGAN",
      "URBIZTONDO",
      "VILLASIS"
      ];
      $("#birthplace").autocomplete({
        source: birthplace,
      });
    });

$(function() {
      var permanentmunicipality = [

      "AGNO",
      "AGUILAR",
      "ALCALA",
      "ANDA",
      "ASINGAN",
      "BALUNGAO",
      "BANI",
      "BASISTA",
      "BAUTISTA",
      "BAYAMBANG",
      "BINALONAN",
      "BINMALEY",
      "BOLINAO",
      "BUGALLON",
      "BURGOS",
      "CALASIAO",
      "DASOL",
      "INFANTA",
      "LABRADOR",
      "LAOAC",
      "LINGAYEN",
      "MABINI",
      "MALASIQUI",
      "MANAOAG",
      "MANGALDAN",
      "MANGATAREM",
      "MAPANDAN",
      "NATIVIDAD",
      "POZORRUBIO",
      "ROSALES",
      "SAN FABIAN",
      "SAN JACINTO",
      "SAN MANUEL",
      "SAN NICOLAS",
      "SAN QUINTIN",
      "SANTA BARBARA",
      "SANTA MARIA",
      "SANTO TOMAS",
      "SAN CARLOS",
      "SISON",
      "SUAL",
      "TAYUG",
      "UMINGAN",
      "URBIZTONDO",
      "VILLASIS"
      ];
      $("#permanentmunicipality").autocomplete({
        source: permanentmunicipality,
      });
    });


$(function() {
      var currentmunicipality = [
      "AGNO",
      "AGUILAR",
      "ALCALA",
      "ANDA",
      "ASINGAN",
      "BALUNGAO",
      "BANI",
      "BASISTA",
      "BAUTISTA",
      "BAYAMBANG",
      "BINALONAN",
      "BINMALEY",
      "BOLINAO",
      "BUGALLON",
      "BURGOS",
      "CALASIAO",
      "DASOL",
      "INFANTA",
      "LABRADOR",
      "LAOAC",
      "LINGAYEN",
      "MABINI",
      "MALASIQUI",
      "MANAOAG",
      "MANGALDAN",
      "MANGATAREM",
      "MAPANDAN",
      "NATIVIDAD",
      "POZORRUBIO",
      "ROSALES",
      "SAN FABIAN",
      "SAN JACINTO",
      "SAN MANUEL",
      "SAN NICOLAS",
      "SAN QUINTIN",
      "SANTA BARBARA",
      "SANTA MARIA",
      "SANTO TOMAS",
      "SAN CARLOS",
      "SISON",
      "SUAL",
      "TAYUG",
      "UMINGAN",
      "URBIZTONDO",
      "VILLASIS"
     
      ];
      $("#currentmunicipality").autocomplete({
        source: currentmunicipality
      });
    });



    function yesnoCheck() {
      if (document.getElementById('yesCheck').checked) {
        document.getElementById('ifYes').style.visibility = 'visible';
      } else document.getElementById('ifYes').style.visibility = 'hidden';

      if (document.getElementById('yesCheck').checked) {
        document.getElementById('ifYes2').style.visibility = 'visible';
      } else document.getElementById('ifYes2').style.visibility = 'hidden';
      document.getElementById('ifYes3').style.visibility = 'hidden';

    }

    function yesnoCheck1() {
      if (document.getElementById('yesCheck1').checked) {
        document.getElementById('ifYes1').style.visibility = 'visible';
      } else document.getElementById('ifYes1').style.visibility = 'hidden';

    }

    function yesnoCheck2() {
      if (document.getElementById('yesCheck2').checked) {
        document.getElementById('ifYes3').style.visibility = 'visible';
      } else document.getElementById('ifYes3').style.visibility = 'hidden';

    }

    function LRNyesnoCheck() {
      if (document.getElementById('lrn').checked) {
        document.getElementById('LRNyes').style.display = 'grid';
      } else document.getElementById('LRNyes').style.display = 'none';

    }

    function PSAyesnoCheck() {
      if (document.getElementById('psastatus').checked) {
        document.getElementById('PSAyes').style.display = 'grid';
      } else document.getElementById('PSAyes').style.display = 'none';

    }

     function IndigencyyesnoCheck() {
      if (document.getElementById('indigencyradio').checked) {
        document.getElementById('indigencynumber').style.visibility = 'visible';
      } else document.getElementById('indigencynumber').style.visibility = 'hidden';

    }

         function TransferyesnoCheck() {
      if (document.getElementById('indigencyradio').checked) {
        document.getElementById('indigencynumber').style.visibility = 'visible';
      } else document.getElementById('indigencynumber').style.visibility = 'hidden';

    }



    $(document).ready(function() {
      $('#lastgradelevelcompleted').on('change', function() {

        var textBox = document.getElementById("lastrandattended2");


        var check = document.getElementById("gradeleveltoenrolin");

        if (this.value == 'Grade 10') {
          document.getElementById('laststrandattended').style.visibility = 'visible';
          document.getElementById('strandtoenrolin').style.visibility = 'visible';
          document.getElementById('semester').style.visibility = 'visible';
          textBox.value = "Not Applicable";
          $("#1").hide();
          $("#2").hide();
          $("#3").hide();
          $("#4").hide();
          $("#5").hide();
          $("#6").hide();
          $("#7").hide();
        }
        if ((this.value == 'Grade 11') || (this.value == 'Grade 12')) {
          document.getElementById('laststrandattended').style.visibility = 'visible';
          document.getElementById('strandtoenrolin').style.visibility = 'visible';
          document.getElementById('semester').style.visibility = 'visible';
          $("#1").show();
          $("#2").show();
          $("#3").show();
          $("#4").show();
          $("#5").show();
          $("#6").show();
          $("#7").show();

        } else {
          document.getElementById('laststrandattended').style.visibility = 'hidden';
          document.getElementById('strandtoenrolin').style.visibility = 'hidden';
          document.getElementById('semester').style.visibility = 'hidden'
          $("#1").hide();
          $("#2").hide();
          $("#3").hide();
          $("#4").hide();
          $("#5").hide();
          $("#6").hide();
          $("#7").hide();
        }

      });

    });










   /* $(document).ready(function() {
      $('#gradeleveltoenrolin').on('change', function() {

        var textBox = document.getElementById("lastrandattended2");

        if (this.value == 'Grade 10') {
          document.getElementById('laststrandattended').style.visibility = 'hidden';
          document.getElementById('strandtoenrolin').style.visibility = 'hidden';
          document.getElementById('semester').style.visibility = 'hidden'
          $("#1").hide();
          $("#2").hide();
          $("#3").hide();
          $("#4").hide();
          $("#5").hide();
          $("#6").hide();
          $("#7").hide();

        }


      });

    });*/

function show1(){
     document.getElementById('transfer').style.display = 'grid';
}
function hide1(){
     document.getElementById('transfer').style.display = 'none';
}

function show2(){
     document.getElementById('add_teacher').style.display = 'grid';

}
function hide2(){
     document.getElementById('add_teacher').style.display = 'none';

}

function show3(){
     document.getElementById('new_schoolyear').style.display = 'grid';
      document.getElementById('update_schoolyear').style.display = 'none';

}
function hide3(){
     document.getElementById('new_schoolyear').style.display = 'none';

}

function show4(){
     document.getElementById('update_schoolyear').style.display = 'grid';
          document.getElementById('new_schoolyear').style.display = 'none';

}
function hide4(){
     document.getElementById('update_schoolyear').style.display = 'none';

}

function Strands() {
  var checkBox = document.getElementById("grade11");
  var checkBox2 = document.getElementById("grade12");

  var text = document.getElementById("strands_subject");
  if ((checkBox.checked == true)||(checkBox2.checked == true)){
   text.style.display = "block";
  } 

  else {
     text.style.display = 'none';
  }
}



function Strands2() {
  var checkBox = document.getElementById("grade11");
  var checkBox2 = document.getElementById("grade12");

  var text = document.getElementById("strands_subject");
 if ((checkBox.checked == true)||(checkBox2.checked == true)){
   text.style.display = "block";
  } 

  else {
     text.style.display = 'none';
  }
}

function Strands3() {
  var checkBox = document.getElementById("grade11");
  var checkBox2 = document.getElementById("grade12");

  var text = document.getElementById("strands_subject");
  if (checkBox2.checked == true){
   text.style.display = "block";
  } 

  else {
     text.style.display = 'none';
  }
}




    function update() {
      var ddl = document.getElementById("lastgradelevelcompleted");
      var selectedOption = ddl.options[ddl.selectedIndex];
      var lastgradelevelcompleted = selectedOption.getAttribute("data");
      var textBox = document.getElementById("gradeleveltoenrolin");
      if (lastgradelevelcompleted == "Grade 7") {
        textBox.value = "Grade 7";
        document.getElementById('strandtoenrolin').style.visibility = 'hidden';
        document.getElementById('semester').style.visibility = 'hidden';
        $("#grade7").show();
        $("#grade8").hide();

        $("#grade9").hide();
        $("#grade10").hide();
        $("#grade11").hide();
        $("#grade12").hide();



      } else if (lastgradelevelcompleted  == "Grade 8") {
        textBox.value = "Grade 8";
        document.getElementById('strandtoenrolin').style.visibility = 'hidden';
        document.getElementById('semester').style.visibility = 'hidden';
        $("#grade7").show();
        $("#grade8").show();
        $("#grade9").hide();

 
        $("#grade10").hide();
        $("#grade11").hide();
        $("#grade12").hide();

      } else if (lastgradelevelcompleted  == "Grade 9") {
        textBox.value = "Grade 9";
        document.getElementById('strandtoenrolin').style.visibility = 'hidden';
        document.getElementById('semester').style.visibility = 'hidden';
        $("#grade7").show();
        $("#grade8").show();
        $("#grade9").show();
        $("#grade10").hide();
   
        $("#grade11").hide();
        $("#grade12").hide();

      } else if (lastgradelevelcompleted  == "Grade 10") {
        textBox.value = "Grade 10";
        document.getElementById('strandtoenrolin').style.visibility = 'hidden';
        document.getElementById('semester').style.visibility = 'hidden';
       
        $("#grade7").show();
        $("#grade8").show();
        $("#grade9").show();
        $("#grade10").show();
        $("#grade11").hide();
 
        $("#grade12").hide();

      } else if (lastgradelevelcompleted == "Grade 11") {
        textBox.value = "Grade 11";
        document.getElementById('strandtoenrolin').style.visibility = 'visible';
        document.getElementById('semester').style.visibility = 'visible';
      
        $("#grade11").show();

        $("#grade9").show();
        $("#grade10").show();
        $("#grade7").show();
        $("#grade8").show();
  $("#grade12").hide();
      } else if (lastgradelevelcompleted == "Grade 12") {
        textBox.value = "Grade 12";
       document.getElementById('strandtoenrolin').style.visibility = 'visible';
        document.getElementById('semester').style.visibility = 'visible';
        $("#grade7").show();
        $("#grade8").show();
        $("#grade9").show();
        $("#grade10").show();
        $("#grade11").show();
        $("#grade12").show();
      }
    }





function myFunction() {
  var checkBox = document.getElementById("myCheck");
  var text = document.getElementById("text1");
  if (checkBox.checked == true){
   text.style.display = "block";
  } else {
     text.style.display = "none";
  }
}

function myFunction2() {
  var checkBox = document.getElementById("banana");
  var text = document.getElementById("extension_name");
  if (checkBox.checked == true){
    text.style.display = "block";
  } else {
   text.style.display = "none"; 
  }
}

function  Password() {
  var checkBox = document.getElementById("existing_account");
  var text = document.getElementById("enrolment_password_view");
  if (checkBox.checked == true){
   text.style.display = "block"; 
  } else {
     text.style.display = "none";
  }
}


    $(function() {
      $("#birthday").datepicker({
        onSelect: function(value, ui) {
          var today = new Date(),
            age = today.getFullYear() - ui.selectedYear;
          $('#age').val(age);
        },

        dateFormat: 'dd-mm-yy',
        changeMonth: true,
        changeYear: true,
        yearRange: "c-100:c+0"
      });

    });

    $('#chooseFile').bind('change', function() {
      let filename = $("#chooseFile").val();
      if (/^\s*$/.test(filename)) {
        $("#file-upload").removeClass('active');
        $("#noFile").text("No file chosen...");
      } else {
        $("#file-upload").addClass('active');
        $("#noFile").text(filename.replace("C:\\fakepath\\", ""));
      }
    });

    $('#chooseFile2').bind('change', function() {
      let filename2 = $("#chooseFile2").val();
      if (/^\s*$/.test(filename2)) {
        $("#file-upload2").removeClass('active');
        $("#noFile2").text("No file chosen...");
      } else {
        $("#file-upload2").addClass('active');
        $("#noFile2").text(filename2.replace("C:\\fakepath\\", ""));
      }
    });


    (function(document) {
      'use strict';

      var TableFilter = (function(myArray) {
        var search_input;

        function _onInputSearch(e) {
          search_input = e.target;
          var tables = document.getElementsByClassName(search_input.getAttribute('data-table'));
          myArray.forEach.call(tables, function(table) {
            myArray.forEach.call(table.tBodies, function(tbody) {
              myArray.forEach.call(tbody.rows, function(row) {
                var text_content = row.textContent.toLowerCase();
                var search_val = search_input.value.toLowerCase();
                row.style.display = text_content.indexOf(search_val) > -1 ? '' : 'none';
              });
            });
          });
        }

        return {
          init: function() {
            var inputs = document.getElementsByClassName('search-input');
            myArray.forEach.call(inputs, function(input) {
              input.oninput = _onInputSearch;
            });
          }
        };
      })(Array.prototype);

      document.addEventListener('readystatechange', function() {
        if (document.readyState === 'complete') {
          TableFilter.init();
        }
      });

    })(document);

    function strand() {


      var ddl = document.getElementById("laststrandattended2");
      var selectedOption = ddl.options[ddl.selectedIndex];
      var laststrandattended = selectedOption.getAttribute("data2");
      var textBox = document.getElementById("strandtoenrolin2");





      if (laststrandattended == "HUMMS") {
        textBox.value = "HUMMS";


      } else if (laststrandattended == "GAS") {
        textBox.value = "GAS";


      } else if (laststrandattended == "TVL") {
        textBox.value = "TVL";


      } else if (laststrandattended == "ICT") {
        textBox.value = "ICT";


      } else if (laststrandattended == "ABM") {
        textBox.value = "ABM";


      } else if (laststrandattended == "COOKERY") {
        textBox.value = "COOKERY";


      } else if (laststrandattended == "STEM") {
        textBox.value = "STEM";


      }
    }

            var coll = document.getElementsByClassName("collapsible");
    var i;

    for (i = 0; i < coll.length; i++) {
      coll[i].addEventListener("click", function() {
        this.classList.toggle("active");
        var content = this.nextElementSibling;
        if (content.style.maxHeight) {
          content.style.maxHeight = null;
        } else {
          content.style.maxHeight = content.scrollHeight + "px";
        }
      });
    }



let slideIndex = 1;
    showSlides(slideIndex);

    function plusSlides(n) {
      showSlides(slideIndex += n);
    }

    function currentSlide(n) {
      showSlides(slideIndex = n);
    }

    function showSlides(n) {
      let i;
      let slides = document.getElementsByClassName("mySlides");
      let dots = document.getElementsByClassName("dot");
      if (n > slides.length) {
        slideIndex = 1
      }
      if (n < 1) {
        slideIndex = slides.length
      }
      for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
      }
      for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" activeCarousel", "");
      }
      slides[slideIndex - 1].style.display = "block";
      dots[slideIndex - 1].className += " activeCarousel";
    }

    setInterval(() => {
      document.querySelector('.next').click();
    }, 5000);

        

  </script>
</body>

</html>