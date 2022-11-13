   @extends('template.main')
@section('content')
    <div id="home-page-wrapper">
    <div id="main-content">

<style type="text/css">
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
</style>

<script type="text/javascript">
    $(document).ready(function() {
  barChart();
    barChart2();
//  lineChart();
  //areaChart();
  donutChart();
  donutChart2();


  $(window).resize(function() {
    window.barChart.redraw();
    window.lineChart.redraw();
    window.areaChart.redraw();
    window.donutChart.redraw();
    window.donutChart2.redraw();
  });
});

function barChart() {
  window.barChart = Morris.Bar({
    element: 'bar-chart',
    data: [
      { y: 'Total', a:{{$present}}, b:{{$past}} },
      { y: 'Grade 7', a:{{$present_g7}}, b:{{$past_g7}} },
      { y: 'Grade 8', a:{{$present_g8}}, b:{{$past_g8}} },
      { y: 'Grade 9', a:{{$present_g9}}, b:{{$past_g9}} },
      { y: 'Grade 10', a:{{$present_g10}}, b:{{$past_g10}} },
      { y: 'Grade 11', a:{{$present_g11}}, b:{{$past_g11}} },
      { y: 'Grade 12', a:{{$present_g12}}, b:{{$past_g12}} }


    ],
    xkey: 'y',
    ykeys: ['a', 'b'],
    labels: ['Present S.Y', 'Past S.Y'],
    lineColors: ['#1e88e5','#ff3321'],
    lineWidth: '3px',
    resize: true,
    redraw: true
  });
}

function barChart2() {
  window.barChart = Morris.Bar({
    element: 'bar-chart2',
    data: [
      { y: 'GAS', a:{{$present_gas}}, b:{{$past_gas}} },
      { y: 'HUMMS', a:{{$present_humms}}, b:{{$past_humms}} },
      { y: 'TVL', a:{{$present_tvl}}, b:{{$past_tvl}} },
      { y: 'COOKERY', a:{{$present_cookery}}, b:{{$past_cookery}} },
      { y: 'ICT', a:{{$present_ict}}, b:{{$past_ict}} },
      { y: 'ABM', a:{{$present_abm}}, b:{{$past_abm}} },
      { y: 'STEM', a:{{$present_stem}}, b:{{$past_stem}} },

    ],
    xkey: 'y',
    ykeys: ['a', 'b'],
    labels: ['Present S.Y', 'Past S.Y'],
    lineColors: ['#1e88e5','#ff3321'],
    lineWidth: '3px',
    resize: true,
    redraw: true
  });
}



function donutChart() {
  window.donutChart = Morris.Donut({
  element: 'donut-chart',
  data: [
    {label: "GAS", value: {{$present_gas}}},
    {label: "HUMMS", value: {{$present_humms}}},
    {label: "TVL", value: {{$present_tvl}}},
    {label: "COOKERY", value: {{$present_cookery}}},
    {label: "ICT", value: {{$present_ict}}},
    {label: "ABM", value: {{$present_abm}}},
     {label: "STEM", value: {{$present_stem}}}

  ],
  resize: true,
  redraw: true
});
}

function donutChart2() {
  window.donutChart = Morris.Donut({
  element: 'donut-chart2',
  data: [
    {label: "Grade 7", value: {{$present_g7}}},
    {label: "Grade 8", value: {{$present_g8}}},
    {label: "Grade 9", value: {{$present_g9}}},
    {label: "Grade 10", value:{{$present_g10}}},
    {label: "Grade 11", value: {{$present_g11}}},
    {label: "Grade 12", value: {{$present_g12}}},
  ],
  resize: true,
  redraw: true
});
}

function pieChart() {
  var paper = Raphael("pie-chart");
paper.piechart(
  100, // pie center x coordinate
  100, // pie center y coordinate
  90,  // pie radius
   [18.373, 18.686, 2.867, 23.991, 9.592, 0.213], // values
   {
   legend: ["Windows/Windows Live", "Server/Tools", "Online Services", "Business", "Entertainment/Devices", "Unallocated/Other"]
   }
 );
}
</script>
<link rel="stylesheet" href="https://www.cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="https://code.jquery.com/jquery-1.8.2.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>


</head>
    <div class="row">
                        <div class="content-header">
            <span class="content-header-text">Student Census<br>
            </span>
<small id="enrolemt-application-updated-at"><i class="fi fi-rr-calendar"></i> Latest update: <?php echo date('m/d/y'); ?></small>
        </div>
             <div class="col-md-4">

    
      <div class="card" style="width: 18rem;">
  <div class="card-body">
    
<hr>
<ul class="list-group">
  <li class="list-group-item">

<form method ="POST"  action="{{url('admin/list')}}">
@method('GET')
@csrf

      <div class="form-field" >

        <select name="gradelevel" style="width: 9rem;" >
          <option data="Grade 7" value="Grade 7">Grade 7</option>
          <option data="Grade 8" value="Grade 8">Grade 8</option>
          <option data="Grade 9" value="Grade 9">Grade 9</option>
          <option data="Grade 10" value="Grade 10">Grade 10</option>
          <option data="Grade 11" value="Grade 11">Grade 11</option>
          <option data="Grade 12" value="Grade 12">Grade 12</option>
        </select>
      </div>
      <div   class="form-field">

        <select name="strand" id="strandtoenrolin2" style="width: 9rem;">
    
          <option data2="HUMMS" value="HUMMS"> HUMMS</option>
          <option data2="GAS" value="GAS">GAS</option>
          <option data2="ABM" value="ABM">ABM</option>
          <option data2="STEM" value="STEM">STEM</option>
          <option data2="TVL" value="TVL"> TVL</option>
          <option data2="COOKERY" value="COOKERY">COOKERY</option>
          <option data2="ICT" value="ICT">ICT</option>

        
        </select>
      </div>

      <div   class="form-field">
 <label for="lastgradelevelcompleted">Sort by : </label>
        <select name="sortby" id="strandtoenrolin2" style="width: 9rem;">
           <option data2="HUMMS" value="Name"> Name </option>
          <option data2="HUMMS" value="Age"> Age </option>
          <option data2="GAS" value="Sex">Sex</option>
          <option data2="GAS" value="General Average">General Average</option>
          <option data2="ABM" value="Balik Aral/Returning Student">Balik Aral/Returning Student</option>
           <option data2="ABM" value="Transferee">Transferee/Moving In</option>
          <option data2="ABM" value="Old Student">Old Student</option>
          <option data2="ABM" value="Re-enrollee">Re-enrollee</option>
        
          <option data2="TVL" value="PSA"> PSA</option>
          <option data2="COOKERY" value="4Ps ID">4Ps ID</option>
       <option data2="TVL" value="Modular(Print)">Modular(Print)</option>
       <option data2="TVL" value="Modular(Digital)">Modular(Digital)</option>
        <option data2="TVL" value="Online">Online</option>
        <option data2="TVL" value="Educational Television">Educational Television</option>
        <option data2="TVL" value="Radio-Based Instruction">Radio-Based Instruction</option>
          <option data2="TVL" value="Homeschooling">Homeschooling</option>
        <option data2="TVL" value="Blended">Blended</option>
        <option data2="TVL" value="Face to Face">Face to Face</option>
        <option data2="TVL" value="Baranggay">Baranggay</option>
        <option data2="TVL" value="Municipality">Municipality</option>

        </select>
      </div>
 <button type="submit" class="btn btn-outline-secondary" > Generate Student List </button>

                </form>
</li>

</ul>
      
  </div>
</div>
<br>

     

        
    </div>
         <div class="col-md-4">

    
      <div class="card" style="width: 20rem;">
  <div class="card-body">
    
<hr>
<ul class="list-group">
  <li class="list-group-item">

<form method ="POST"  action="{{url('admin/list')}}">
@method('GET')
@csrf

    
   <div class="form-field" id="LRNyes">
        <label for="lrnnumber">Learner's Reference Number(LRN)</label>
        <input style="width: 11rem;" placeholder="12 Digits" name="lrnnumber" type="number" class="@error('lrnnumber') is-invalid |@enderror" id="lrnnumber" aria-describedby="lrnnumber" value="{{old('lrnnumber')}}" maxlength="12" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" required>
        @error('lrnnumber')
        <span class="invalid-feedback" role="alert">
          {{$message}}
        </span>
        @enderror
      </div>


 <button type="submit" class="btn btn-outline-secondary" > Find Records in Past <br>
 School Years</button>

                </form>
</li>

</ul>
      
  </div>
</div>

        </div>

</div>
<body>
  <section class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <span class="content-header-text">Student Distribution By Grade</span>
        <div id="bar-chart"></div>
      </div>
         <div class="col-md-6">
        <div id="donut-chart2"></div>
      </div>
      <div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title">Data Summary</h5>
<hr>
    <h6 class="card-subtitle mb-2 text-muted">Total number of Students in Present S.Y is   
      {{$present_total_grade = $present_g7 + $present_g8 + $present_g9 + $present_g10 + $present_g11 + $present_g12 }}
</h6>
<hr>
    <h6 class="card-subtitle mb-2 text-muted">Total number of Students in Past S.Y is 
    {{$past_total_grade = $past_g7 + $past_g8 + $past_g9 + $past_g10 + $past_g11 + $past_g12 }}
</h6>
<hr>
    @if($present_total_grade < $past_total_grade)
  <h6 class="card-subtitle mb-2 text-muted">
    @php
       $total = (($present_total_grade - $past_total_grade)/$past_total_grade) * 100;
   $total =  abs($total);
   
    @endphp
    BNHS students decreased by {{round($total)}}%
</h6>
    @endif

        @if($present_total_grade > $past_total_grade)
  <h6 class="card-subtitle mb-2 text-muted">
    @php
         $total = (($present_total_grade - $past_total_grade)/$past_total_grade) * 100;
         $total = abs($total);
    @endphp
    SHS students increaseed by {{round($total)}}%
</h6>
    
    @endif
          <form method ="POST"  action="{{url('admin/print_analysis')}}">

@csrf
<input type="hidden" name="present_gas" value="{{$present_gas}}">
<input type="hidden" name="present_tvl" value="{{$present_tvl}}">
<input type="hidden" name="present_humms" value="{{$present_humms}}">
<input type="hidden" name="present_abm" value="{{$present_abm}}">
<input type="hidden" name="present_stem" value="{{$present_stem}}">
<input type="hidden" name="present_ict" value="{{$present_ict}}">
<input type="hidden" name="present_cookery" value="{{$present_cookery}}">

<input type="hidden" name="present_g7" value="{{$present_g7}}">
<input type="hidden" name="present_g8" value="{{$present_g8}}">
<input type="hidden" name="present_g9" value="{{$present_g9}}">
<input type="hidden" name="present_g10" value="{{$present_g10}}">
<input type="hidden" name="present_g11" value="{{$present_g11}}">
<input type="hidden" name="present_g12" value="{{$present_g12}}">

<input type="hidden" name="past_g7" value="{{$past_g7}}">
<input type="hidden" name="past_g8" value="{{$past_g8}}">
<input type="hidden" name="past_g9" value="{{$past_g9}}">
<input type="hidden" name="past_g10" value="{{$past_g10}}">
<input type="hidden" name="past_g11" value="{{$past_g11}}">
<input type="hidden" name="past_g12" value="{{$past_g12}}">

<input type="hidden" name="past_gas" value="{{$past_gas}}">
<input type="hidden" name="past_tvl" value="{{$past_tvl}}">
<input type="hidden" name="past_humms" value="{{$past_humms}}">
<input type="hidden" name="past_abm" value="{{$past_abm}}">
<input type="hidden" name="past_stem" value="{{$past_stem}}">
<input type="hidden" name="past_ict" value="{{$past_ict}}">
<input type="hidden" name="past_cookery" value="{{$past_cookery}}">

 <button type="submit" class="btn btn-outline-secondary" > Print S.Y Data Analysis </button>
  </div>
</div>

         <div class="col-md-12">
              <span class="content-header-text">Student Distribution By Strand</span>
        <div id="bar-chart2"></div>
      </div>
        
      <div class="col-md-6">
      
        <div id="donut-chart"></div>
      </div>
    
      
     <div class="col-md-6">
        <br>
        <br>
      <div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title">Data Summary</h5>
<hr>
    <h6 class="card-subtitle mb-2 text-muted">Total number of SHS Students in Present S.Y is   
      {{$present_total_strand = $present_gas + $present_tvl + $present_humms + $present_abm + $present_ict + $present_cookery }}
</h6>
<hr>
    <h6 class="card-subtitle mb-2 text-muted">Total number of SHS Students in Past S.Y is 
    {{$past_total_strand = $past_gas + $past_tvl + $past_humms + $past_abm + $past_ict + $past_cookery }}
</h6>
<hr>
    @if($present_total_strand < $past_total_strand)
  <h6 class="card-subtitle mb-2 text-muted">
    @php
  $total = (($present_total_strand - $past_total_strand)/$past_total_strand) * 100;
   $total =  abs($total);
    @endphp
    SHS students decreased by {{round($total)}}%
</h6>
    @endif

        @if($present_total_strand > $past_total_strand)
  <h6 class="card-subtitle mb-2 text-muted">
    @php
  $total = (($present_total_strand - $past_total_strand)/$past_total_strand) * 100;
   $total =  abs($total);
    @endphp
    SHS students increased by {{round($total)}}%
</h6>
    
    @endif

 <button type="submit" class="btn btn-outline-secondary" > Print S.Y Data Analysis </button>


</form> 
  </div>
</div>
    </div>
  </section>
</body>
   
    </div>


@endsection