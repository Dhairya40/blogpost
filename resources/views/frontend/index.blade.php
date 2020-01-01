@extends('layouts.master')
@section('title')Home | {{ (@$title) ? @$title:'Welcome Guest!!' }} @endsection
@section('home_active') active @endsection

@section('css')
<style type="text/css">
  .blink_me {
  animation: blinker 1s linear infinite;
}

@keyframes blinker {
  50% {
    opacity: 0;
  }
  .center {text-align: center; margin-left: auto; margin-right: auto; margin-bottom: auto; margin-top: auto;}


}
</style>
@endsection
@section('content')
  <div class="container">
  <header class="blog-header py-3">
    <div class="row flex-nowrap justify-content-between align-items-center">
      <div class="col-4 pt-1">
        <a class="text-muted" href="#">Subscribe</a>
      </div>
      <div class="col-4 text-center">
        <a class="blog-header-logo text-dark" href="#">Large</a>
      </div>
      <div class="col-4 d-flex justify-content-end align-items-center">
        <a class="text-muted" href="#">
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mx-3" focusable="false" role="img"><title>Search</title><circle cx="10.5" cy="10.5" r="7.5"></circle><line x1="21" y1="21" x2="15.8" y2="15.8"></line></svg>
        </a>
        <a class="btn btn-sm btn-outline-secondary" href="#">Sign up</a>
      </div>
    </div>
  </header>

  <div class="nav-scroller py-1 mb-2">
    <nav class="nav d-flex justify-content-between">
      @if(!empty($blogtype))
      @foreach($blogtype as $row )
      <a class="p-2 text-muted" href="{{url('filter')}}/{{ $row->id }}">{{ $row->name }}</a>
      @endforeach
      @endif 
     </nav>
  </div>

  <div class="jumbotron p-3 p-md-5 text-white rounded bg-dark">
    <div class="col-md-6 px-0">
      <h1 class="display-4 font-italic">Title of a longer featured blog post</h1>
      <p class="lead my-3">Multiple lines of text that form the lede, informing new readers quickly and efficiently about what’s most interesting in this post’s contents.</p>
      <p class="lead mb-0"><a href="#" class="text-white font-weight-bold">Continue reading...</a></p>
    </div>
  </div>
  <div class="row mb-2">
     @if(count($blogpost))
    @foreach($blogpost as $post)
    <div class="col-md-6">
      <div class="card flex-md-row mb-4 shadow-sm h-md-250">
        <div class="card-body d-flex flex-column align-items-start">
          @if(!empty($post->user))
          
          <strong class="d-inline-block mb-2 text-primary"><img src="{{url('public/user_image/india.png') }}" class="img-responsive" width="40" height="40" >&nbsp;&nbsp;  {{ $post->user->name }}</strong>
          @else
          <strong class="d-inline-block mb-2 text-primary"><img src="{{url('public/user_image/india.png') }}" class="img-responsive" width="40" height="40" > <img src="{{url('public/user_image/india.png') }}" class="img-responsive" width="40" height="40" > Admin</strong>
          @endif
          <h3 class="mb-0">
            @if($post->is_featured)
            <span class="text-dark blink_me " style="background: red;color: white !important;">Featured post </span>
            @else
            <span class="text-dark">{{ str_limit($post->title, $limit=20, $end=' ...') }}</span>
            @endif
          </h3>
          <div class="mb-1 text-muted"><b>Posted On: </b>{{ changeDateFormate($post->created_at,'d M Y')  }}</div>
          <p class="card-text mb-auto"> <b>{{ str_limit($post->heading, $limit=40, $end=' ...') }} </b></p>

          <p class="card-text mb-auto">{{ str_limit($post->long_content1, $limit=100, $end=' ...') }}</p>
         
          <a href="{{ route('blogpost.show',$post) }}">Continue reading</a>
          
        </div>
        @if(!empty($post->thumbnail1))
        <img src="{{url('public/blogpost_files') }}/{{ $post->thumbnail1}}" class="img-responsive bd-placeholder-img card-img-right flex-auto d-none d-lg-block" width="200" height="250" >
        @else 
        <img src="{{url('public/blogpost_files/img.jpg') }}" class="img-responsive bd-placeholder-img card-img-right flex-auto d-none d-lg-block" width="200" height="250" title="Thumbnail Not Uploaded">
        @endif
       <!--  <svg class="bd-placeholder-img card-img-right flex-auto d-none d-lg-block" width="200" height="250" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail"><title>Placeholder</title><rect fill="#55595c" width="100%" height="100%"/><text fill="#eceeef" dy=".3em" x="50%" y="50%">Thumbnail</text></svg> -->
      </div>
    </div>
    @endforeach 
    <div class="col-md-12">
      {!! $blogpost->links() !!}
    </div>
    @else 
    <div class="container">
    <div class="row">
     <center>
      <img src="{{url('public/images/not-found.jpg') }}" class="img-responsive">
          <h1>OPPS!! No Matching Record Found!! <small><font face="Tahoma" color="red">Error 404</font></small></h1>
          <br />
          <p>The Category you requested could not be found, either contact your webmaster or try again. Use your browsers <b>Back</b> button to navigate to the page you have prevously come from</p>
          <p><b>Or you could just press this neat little button:</b></p>
          <a href="{{ url('/')}}" class="btn btn-large btn-info"><i class="icon-home icon-white"></i> Take Me Home</a>
      </center>
        <br />
      </div>
   </div>
    @endif
  </div>
</div>

 @endsection 
