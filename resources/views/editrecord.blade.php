@extends('layouts.master')
@section('title')
Edit Record
@endsection
@section('content')
<div class="container" style="margin-top:20px; ">
	<a  href="javascript:void(0);" class="btn btn-primary">Edit Record</a>
<div align="right">
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
    <input type="text" class="form-control" id="first_name" value="{{ $editdata[0]->first_name}}" name="first_name" aria-describedby="emailHelp" placeholder="Enter First Name">
     <input type="hidden" class="form-control" id="id" value="{{ $editdata[0]->id}}" name="id" aria-describedby="emailHelp" placeholder="Enter First Name"> 
  </div>
  <div class="form-group">
    <label for="last_name">Last name</label>
    <input type="text" class="form-control" id="last_name" value="{{ $editdata[0]->last_name}}" name="last_name" placeholder="Last Name">
  </div>
  <div class="form-group ">  	
    <label for="image">Select Profile</label>
    <input type="file" name="image" class="form-control" id="image">
  </div>
  <img src="{{ url('public/images')}}/{{ $editdata[0]->image }}" class="img-responsive" width="100">
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
 
</div>

@endsection