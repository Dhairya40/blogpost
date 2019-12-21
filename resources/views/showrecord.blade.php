@extends('layouts.master')
@section('title')
Show Record
@endsection
@section('content')
 
<div class="container">
	First Name: {{ $editdata[0]['first_name'] }}<br><br>
	Last Name: {{ $editdata[0]['last_name'] }}<br><br>
	Profile Image: <img src="{{ url('public/images')}}/{{ $editdata[0]['image'] }}" class="img-responsive">
</div>
 
@endsection