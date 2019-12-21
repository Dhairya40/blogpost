@extends('layouts.master')

@section('content')
<div class="container" style="margin-top:20px; ">
<div align="right" style="margin: 20px;">
	<a href="{{ url('/crud') }}" class="btn btn-primary">Back</a>
</div>

	@if($errors->any())	
	<div class="alert alert-danger">
		<ul class="error">
			@foreach($errors->all() as $error)
			<li>{{ $error }}</li>
			@endforeach
		</ul>
	</div> 
	@endif
<form method="post" action="{{ url('store')}}" enctype="multipart/form-data">
 @csrf
  <div class="form-group">
    <label for="first_name">First Name</label>
    <input type="text" class="form-control" id="first_name" name="first_name" aria-describedby="emailHelp" placeholder="Enter First Name"> 
  </div>
  <div class="form-group">
    <label for="last_name">Last name</label>
    <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Last Name">
  </div>
  <div class="form-group ">  	
    <label for="image">Select Profile</label>
    <input type="file" name="image" class="form-control" id="image">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
 
</div>

@endsection