@if(session('success'))
<div id='alert-success'>
	<div class="alert alert-success" style="color: #000000" role="alert">
 	{{session('success') }}
	</div>
@endif

@if(session('error'))
	<div class="alert alert-danger"  style="color: #000000" le="alert">
 	{{session('error') }}
	</div>
@endif

@if(session('status'))
	<div class="alert alert-success" role="alert">
 	{{session('status') }}
	</div>

@endif