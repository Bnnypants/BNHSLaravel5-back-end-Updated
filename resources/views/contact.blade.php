@extends('template.main')

@section('content')
<div id="contact-us-page">
	<div>
		 <img src={{URL::asset('images/schol.jpg')}} style="height:10">
		<h2>Basista National High School</h2>
		<span>
			Location: Basista, Pangasinan
		</span>
		<span>
			Address: A. Perez St., Poblacion, Basista, Pangasinan
		</span>
		<br>
		<span>
			Email: deped_basistanhs@yahoo.com
		</span>
		<span>
			Phone: +63 935-8671-647
		</span>
		<a id='fb-page' href="https://www.facebook.com/BNHSupremeStudentGovernment" target="_blank" class="facebook"><i class="fi fi-brands-facebook"></i> Facebook Page</a>
	</div>
	<div id="map">
		<img src={{URL::asset('/images/map.png')}} alt="" id="mapImg">
	</div>
</div>

@endsection