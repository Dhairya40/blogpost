@extends('layouts.master')
@section('title')Home | Post | {{ $blogpost->title}} @endsection
@section('home_active') active @endsection

@section('css')
<style type="text/css">

</style>
@endsection
@section('content') 
<div class="container"> 
  <div class="nav-scroller py-1 mb-2">
    <nav class="nav d-flex justify-content-between">
      @if(!empty($blogtype))
      @foreach($blogtype as $row )
      <a class="p-2 text-muted" href="{{ $row->slug }}">{{ $row->name }}</a> 
      @endforeach
      @endif 
     </nav>
  </div>  
  <div class="col-md-12">
    <img src="{{url('public/blogpost_files') }}/{{ $blogpost->thumbnail1}}" class="img-responsive" style="width: 100%; max-height: 402px;">
  </div> 
</div> 


<div class="container">
  <div class="row content"> 
    <div class="col-sm-12">
      <!-- <h4><small>RECENT POSTS</small></h4> -->
      <hr>
      <h2>{{ $blogpost->title }}</h2>
      <h5><span class="glyphicon glyphicon-time"></span> Post by: <strong class="d-inline-block mb-2 text-primary">@if(!empty($blogpost->user)) {{ $blogpost->user->name }} @else {{ 'Admin' }} @endif </strong>, {{ changeDateFormate($blogpost->created_at,'M d, Y')  }}.</h5>
      <h5><span class="label label-danger">{{ $blogpost->heading }}</span> </h5><br>
      <p> {{ $blogpost->short_content }}</p> 
      
      <hr>
      <p>{{ $blogpost->long_content1 }}</p>
      <hr>
      <div class="col-md-12">
         @if(!empty($blogpost->thumbnail1))
        <img src="{{url('public/blogpost_files') }}/{{ $blogpost->thumbnail1}}" class="img-responsive " style="max-height:250px;max-width: 250px;border: 1px solid silver;padding: 10px;     box-shadow: 0px 1px 6px 4px red;" >
        @else 
        <img src="{{url('public/blogpost_files/img.jpg') }}" class="img-responsive bd-placeholder-img card-img-right flex-auto d-none d-lg-block" width="200" height="250" title="Thumbnail Not Uploaded" style="border: 1px solid silver;padding: 10px;margin: 14px 40px;">
        @endif
          @if(!empty($blogpost->thumbnail2)) 
        <img src="{{url('public/blogpost_files') }}/{{ $blogpost->thumbnail2}}" class="img-responsive " style="max-height:250px;max-width: 250px;border: 1px solid silver;padding: 10px;margin: 14px 40px;    box-shadow: 0px 1px 6px 4px red;" >

         @endif
       </div>
       <hr>
      <p>{{ $blogpost->lomg_content2 }}</p>
      <hr>
      <h4>Leave a Comment:</h4>
      <form role="form">
        <div class="form-group">
          <textarea class="form-control" rows="3" required></textarea>
        </div>
        <button type="submit" class="btn btn-success">Submit</button>
      </form>
      <br><br>
      
      <p><span class="badge">2</span> Comments:</p><br>
      
      <div class="row">
        <div class="col-sm-2 text-center">
          <img src="{{ url('public/images/generic-user-purple.png')}}" class="img-circle" height="65" width="65" alt="Avatar">
        </div>
        <div class="col-sm-10">
          <h4>Anja <small>Sep 29, 2015, 9:12 PM</small></h4>
          <p>Keep up the GREAT work! I am cheering for you!! Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
          <br>
        </div>
        <div class="col-sm-2 text-center">
          <img src="{{ url('public/images/generic-user-purple.png')}}" class="img-circle" height="65" width="65" alt="Avatar">
        </div>
        <div class="col-sm-10">
          <h4>John Row <small>Sep 25, 2015, 8:25 PM</small></h4>
          <p>I am so happy for you man! Finally. I am looking forward to read about your trendy life. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
          <br>
          <p><span class="badge">1</span> Comment:</p><br>
          <div class="row">
            <div class="col-sm-2 text-center">
              <img src="{{ url('public/images/generic-user-purple.png')}}" class="img-circle" height="65" width="65" alt="Avatar">
            </div>
            <div class="col-xs-10">
              <h4>Nested Bro <small>Sep 25, 2015, 8:28 PM</small></h4>
              <p>Me too! WOW!</p>
              <br>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
 @endsection 
