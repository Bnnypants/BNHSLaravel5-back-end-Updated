
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    
    <style type="text/css">
        @page {
            margin: 0px;
        }
        body {
            margin: 0px;
        }
        * {
            font-family: Verdana, Arial, sans-serif;
        }
        a {
            color: #fff;
            text-decoration: none;
        }
        table {
            font-size: x-small;
        }
        tfoot tr td {
            font-weight: bold;
            font-size: x-small;
        }
        .invoice table {
            margin: 15px;
        }
        .invoice h3 {
            margin-left: 15px;
        }
        .information {
            background-color: #60A7A6;
            color: #FFF;
        }
        .information .logo {
            margin: 5px;
        }
        .information table {
            padding: 10px;
        }
    </style>

</head>
<body>

@if(isset($name))

<div class="information">
    <table width="100%">
        <tr>
                  <td align="left" style="width: 40%;">

                <h3>Student Information</h3>
                <pre>
                   First Name : {{$name}}
                   Middle Name : {{$middlename}}
                   Last Name : {{$lastname}}
                   Extension Name : {{$extensionname}}
                   <br>
                   Age : {{$age}}
                   Birthday : {{$birthday}}
                   <br>
                   Phone Number : {{$phonenumber}}
                   Email : {{$email}}
                  <br>
                   General Average : {{$generalaverage}}
                   Learner's Referrence Number : {{$lrnnumber}}

                </pre>
            </td>


                  <td align="right" style="width: 40%;">
        <h3>Grade level and School Information</h3>       
                <pre>
Grade Level to Enrol in : {{strtoupper($gradeleveltoenrolin)}}
Strand to Enrol in : {{strtoupper($strandtoenrolin)}}
Semester to Enrol in : {{$semester}}
<br>
Student Type : {{strtoupper($studenttype)}}
Indegenous Community belonging in : {{$indegenouscommunity}}
4Ps ID Number : {{$indigency}}
PSA    Number : {{$psanumber}}
</pre>
Modality Chosen : 
 @foreach($modalities as $modality)

 @php
  $chosen_modality = 'None';
 @endphp

@if($modality->modality_id == 1)

 @php 
 $chosen_modality = 'Modular(Print)' ;
 @endphp

@endif

 @if($modality->modality_id == 2)

 @php
 $chosen_modality = 'Modular(Digital)';
 @endphp
 
@endif

 @if($modality->modality_id == 3)

 @php
 $chosen_modality = 'Online';
 @endphp
 
@endif

 @if($modality->modality_id == 4)

 @php
 $chosen_modality = 'Educational Televison';
 @endphp
 
@endif

 @if($modality->modality_id == 5)

 @php
 $chosen_modality = 'Radio-Based Instruction';
 @endphp
 
@endif

 @if($modality->modality_id == 6)
@php
 $chosen_modality = 'Homeschooling';
 @endphp
 
@endif

 @if($modality->modality_id == 7)

 @php 
 $chosen_modality = 'Blended'
 @endphp
 
@endif

 @if($modality->modality_id == 8)

 @php
 $chosen_modality = 'Face to Face';
 @endphp
 
@endif

@isset($chosen_modality)  {{strtoupper($chosen_modality)}} <br>@endisset
  @endforeach

      </div>




            </td>
        </tr>

    </table>
</div>


<br/>

<div class="invoice">
        <table width="100%">
      
        <tbody>
        <tr>
            <td>Current Address</td>

            <td>  House Number :{{$currenthousenumber}}<br>
                 Street : {{$currentstreet}} <br>
                Baranggay : {{$currentbaranggay}} <br>
                 Municipality : {{$currentmunicipality}} <br>
                Zip Code : {{$currentzipcode}} <br>
                Province : {{$currentprovince}} <br>
                 Country : {{$currentcountry}} <br>
            </td>
               <td>Permanent Address</td>

                   <td>  House Number :{{$permanenthousenumber}}<br>
                 Street : {{$permanentstreet}} <br>
                Baranggay : {{$permanentbaranggay}} <br>
                 Municipality : {{$permanentmunicipality}} <br>
                 Zip Code : {{$permanentzipcode}} <br>
                Province : {{$permanentprovince}} <br>
                 Country : {{$permanentcountry}} <br>
            </td>
            <td></td>
       
        </tr>
        <br>
        <tr>
            <td>Mother's</td>
            <td> First Name : {{$motherfirstname}} <br>
             Middle Name : {{$mothermiddlename}} <br>
             Last Name : {{$motherlastname}} <br>
              Phone Number : {{$motherphonenumber}} <br></td>
            <td> Balik / Aral or Transferee/Moving In Data</td>
            @if($studenttype != "Old Student")
            <td>Last Grade Level Completed : {{$lastgradelevelcompleted}} <br>
             Last School Year Completed : {{$lastschoolyearattended}} <br>
             Last School Attended : {{$lastschoolattended}} <br>
             School ID of  Last School Attended : {{$schoolid}} <br>
          </td>
          @endif
        </tr>
        <br>
           <tr> 
            <td>Father's</td>
            <td> First Name : {{$fatherfirstname}} <br>
             Middle Name : {{$fathermiddlename}} <br>
             Last Name : {{$fatherlastname}} <br>
              Phone Number : {{$fatherphonenumber}} <br></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr> 
            <td>Guardian's</td>
            <td> First Name : {{$guardianfirstname}} <br>
             Middle Name : {{$guardianmiddlename}} <br>
             Last Name : {{$guardianlastname}} <br>
              Phone Number : {{$guardianphonenumber}} <br></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        </tbody>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
        <tfoot>
             <tr>
            <td> </td>
            <td>____________________________</td>
           <td> </td>
            <td colspan="1" align="left">{{$date}}</td>
         
        </tr>
        <tr>
            <td> </td>
            <td>Signature Over Printed Name of Parent/Guardian/Student </td>
           <td> </td>
            <td colspan="1" align="left">Date</td>
         
        </tr>
        </tfoot>
    </table>
</div>
@endisset

@isset($lists)
<style type="text/css">
        table {
            font-size: xx-small;
        }
</style>
<div class="information">
    <table width="100%">
        <tr>
                  <td align="left" style="width: 40%;">

                <h3>{{$title}}</h3>
        </td>


 
      </div>
      <div class="invoice">
        <table width="90%">

    <thead>
        <tr>
    
            <td>Name</td>
             <td>Sex</td>
              <td>Age</td>
                  <td>Baranggay</td>
              <td>Municipality</td>
                <td>LRN</td>
            <td>PSA</td>
             <td>4Ps ID</td>
                <td>General Average</td>
            <td>Grade Level</td>
            <td>Strand</td>
            <td>Section</td>
           
             <td>Student Type</td>
          
      
 
      </tr>
        </thead>  
        <tbody> 

@foreach($lists as $list) 
   <tr>
@php
$student = DB::table('users')->where('id', $list)->first();

@endphp

  <td>{{$student ->name}} {{$student->lastname}}</th>

           <td>{{strtoupper($student->sex)}}</td>
           <td>{{$student->age}}</td>
            <td>{{$student->currentbaranggay}}</td>
            <td>{{$student->currentmunicipality}}</td>
            <td >{{$student->lrnnumber}} </td>
           <td>{{$student->psanumber}}</td>
            <td>{{$student->indigency}}</td>
            <td>{{$student->generalaverage}}</td>
             <td>{{strtoupper($student->gradeleveltoenrolin)}}</td>
             <td>{{strtoupper($student->strandtoenrolin)}}</td>
          <td>{{$student->section}}</td>
            <td>{{strtoupper($student->studenttype)}}</td>

      </tr>
    @endforeach 

    
  </tbody>
        </tfoot>
    </table>
</div>
@endisset
<div class="information" style="position: absolute; bottom: 0;">
    <table width="100%">
        <tr>
            <td align="left" style="width: 50%;">
                &copy; {{ date('Y') }} {{ config('app.url') }} - All rights reserved.
            </td>
            <td align="right" style="width: 50%;">
  
            </td>
        </tr>

    </table>
</div>

@isset($present_g7)

<style type="text/css">
        table {
            font-size: xx-small;
        }
</style>
<div class="information">
    <table width="100%">
        <tr>
                  <td align="left" style="width: 40%;">

                <h3>S.Y. Data Analysis</h3>
        </td>


 
      </div>
      <div class="invoice">
        <table width="90%">

    <thead>
        <tr>
    
            <td>Present S.Y</td>
            <td># of Students</td>
             <td>Old S.Y.</td>
              <td># of Students</td>
       
          
      
 
      </tr>
        </thead>  
        <tbody> 

   <tr>
<td>
 Grade 7 
</td>
<td> {{$present_g7}}</td>
<td>
 Grade 7 
</td>
<td>{{$past_g7}}</td>
      </tr>
   <tr>
<td>
 Grade 8 
</td>
<td>{{$present_g8}}</td>
<td>
 Grade 8 
</td>
<td>{{$past_g8}}</td>
      </tr> 
   <tr>
<td>
 Grade 9 
</td>
<td> {{$present_g9}}</td>
<td>
 Grade 9 
</td>
<td> {{$past_g9}}</td>
      </tr> 
   <tr>
<td>
 Grade 10
</td>
<td>  {{$present_g10}}</td>
<td>
 Grade 10 
</td>
<td> {{$past_g10}}</td>
      </tr> 
   <tr>
<td>
 Grade 11 
</td>
<td> {{$present_g11}}</td>
<td>
 Grade 11 
</td>
<td> {{$past_g11}}</td>
      </tr> 
   <tr>
<td>
 Grade 12 
</td>
<td> {{$present_g12}}</td>
<td>
 Grade 12 
</td>
<td> {{$past_g12}}</td>
      </tr> 
  </tbody>
  <tr>
      <td>
            <div class="card-body">
    <h10 class="card-title">Data Summary</h10>
<hr>
    <h16 class="card-subtitle mb-2 text-muted">Total number of Students in Present S.Y is   
      {{$present_total_grade = $present_g7 + $present_g8 + $present_g9 + $present_g10 + $present_g11 + $present_g12 }}
</h16>
<hr>
    <h16 class="card-subtitle mb-2 text-muted">Total number of Students in Past S.Y is 
    {{$past_total_grade = $past_g7 + $past_g8 + $past_g9 + $past_g10 + $past_g11 + $past_g12 }}
</h16>
<hr>
    @if($present_total_grade < $past_total_grade)
  <h16 class="card-subtitle mb-2 text-muted">
    @php
       $total = (($present_total_grade - $past_total_grade)/$past_total_grade) * 100;
   $total =  abs($total);
   
    @endphp
    BNHS students decreased by {{round($total)}}%
</h16>
    @endif

        @if($present_total_grade > $past_total_grade)
  <h16 class="card-subtitle mb-2 text-muted">
    @php
         $total = (($present_total_grade - $past_total_grade)/$past_total_grade) * 100;
         $total = abs($total);
    @endphp
    SHS students increaseed by {{round($total)}}%
</h16>
    
    @endif
  </div>
      </td>
  </tr>
        </tfoot>
    </table>
</div>
   <div class="invoice">
        <table width="90%">

    <thead>
        <tr>
    
<td> Strand </td>

<td> # of Present S.Y. Students </td>


<td> # of Old S.Y Students </td>
          
      
 
      </tr>
        </thead>  
        <tbody> 
            <tr>
   
             <td>GAS</td> 
             <td>{{$present_gas}}</td> 
             <td>{{$past_gas}}</td> 
            </tr>
            <tr>
   
             <td>HUMMS</td> 
             <td>{{$present_humms}}</td> 
             <td>{{$past_humms}}</td> 
            </tr>

            <tr>
   
             <td>TVL</td> 
             <td>{{$present_tvl}}</td> 
             <td>{{$past_tvl}}</td> 
            </tr>
            
                     <tr>
   
             <td>COOKERY</td> 
             <td>{{$present_cookery}}</td> 
             <td>{{$past_cookery}}</td> 
            </tr>

                     <tr>
   
             <td>ICT</td> 
             <td>{{$present_ict}}</td> 
             <td>{{$past_ict}}</td> 
            </tr>
                    <tr>
   
             <td>ABM</td> 
             <td>{{$present_ict}}</td> 
             <td>{{$past_ict}}</td> 
            </tr>

                 <tr>
   
             <td>STEM</td> 
             <td>{{$present_ict}}</td> 
             <td>{{$past_ict}}</td> 
            </tr>
            <tr>
                <td>  <div class="card-body">
    <h15 class="card-title">Data Summary</h15>
<hr>
    <h16 class="card-subtitle mb-2 text-muted">Total number of SHS Students in Present S.Y is   
      {{$present_total_strand = $present_gas + $present_tvl + $present_humms + $present_abm + $present_ict + $present_cookery }}
</h16>
<hr>
    <h16 class="card-subtitle mb-2 text-muted">Total number of SHS Students in Past S.Y is 
    {{$past_total_strand = $past_gas + $past_tvl + $past_humms + $past_abm + $past_ict + $past_cookery }}
</h16>
<hr>
    @if($present_total_strand < $past_total_strand)
  <h16 class="card-subtitle mb-2 text-muted">
    @php
  $total = (($present_total_strand - $past_total_strand)/$past_total_strand) * 100;
   $total =  abs($total);
    @endphp
    SHS students decreased by {{round($total)}}%
</h16>
    @endif

        @if($present_total_strand > $past_total_strand)
  <h16 class="card-subtitle mb-2 text-muted">
    @php
  $total = (($present_total_strand - $past_total_strand)/$past_total_strand) * 100;
   $total =  abs($total);
    @endphp
    SHS students increased by {{round($total)}}%
</h6>
    
    @endif
 
  </div></td>
            </tr>
            </tbody>
        </table>
    </div>
@endisset
<div class="information" style="position: absolute; bottom: 0;">
    <table width="100%">
        <tr>
            <td align="left" style="width: 50%;">
                &copy; {{ date('Y') }} {{ config('app.url') }} - All rights reserved.
            </td>
            <td align="right" style="width: 50%;">
  
            </td>
        </tr>

    </table>
</div>

</body>
</html>