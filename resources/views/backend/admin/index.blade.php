@extends('backend.master')
@section('title')Welcome | Admin Dashboar!! @endsection

@section('home_active') active @endsection

@section('css')
<style type="text/css">
  .toast-header.bg-info.text-white {
    min-height: 50px;
    padding: 15px;
    background-color: #272020 !important;
}
</style>
@endsection
@section('content')
 <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group mr-2">
            <button type="button" class="btn btn-sm btn-outline-danger" id="btn_trashed">Trashed Blogpost</button>
            <button type="button" class="btn btn-sm btn-outline-info" data-toggle="modal" data-target="#exampleModalCenter">Add Blogpost</button>
          </div>
          <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
            <span data-feather="calendar"></span>
            This week
          </button>
        </div>
      </div>
   <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li> 
        <li class="breadcrumb-item active">Blogpost</li> 
        <!-- <li class="breadcrumb-item active" aria-current="page">@if(@$category){{'Edit Category'}} @else{{'Add Category'}}@endif</li> -->
      </ol>
   </nav>
      <h2>Section title</h2>
      <div class="col-md-12">
          @if($errors->any())
          <div class="alert alert-danger">
            <ul class="text-red">
              @foreach($errors->all() as $error)
              <li>{{$error}}</li>
              @endforeach
            </ul>
          </div>
          @endif
        </div>
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>Sr. No.</th>
              <th>Author</th>
              <th>Title</th>
              <th>Headding</th>
              <th>Short Desc.</th>
              <th>Long Desc.</th>
              <th>Thumbnail</th>
              <th>Ohter Thumbnail</th>
            </tr>
          </thead>
          <tbody>
            @if(!empty($allposts))
               @foreach($allposts as $post)
            <tr>
              <td>{{ ($post->id) ? $post->id:'1' }}</td>
              <td>Admin</td>
              <td>{{ str_limit(($post->title) ? $post->title:'Dummy', $limit=20, $end='...') }}</td>
              <td>{{ str_limit(($post->heading) ? $post->heading:'Dummy', $limit=20, $end='...') }}</td>
              <td>{{ str_limit(($post->short_content) ? $post->short_content:'Dummy', $limit=20, $end='...') }}</td>
              <td>{{ str_limit(($post->long_content1) ? $post->long_content1:'Dummy', $limit=20, $end='...') }}</td>
              <td><img src="{{ url('public/images/'.$post->thumbnail1) }}" class="img-responsive" width="100px"> </td>
              <td><img src="{{ url('public/images/'.$post->thumbnail2) }}" class="img-responsive" width="100px" height="150px"></td>
            </tr> 
                @endforeach
            @else
              <tr>
              <td>1,001</td>
              <td>Lorem</td>
              <td>ipsum</td>
              <td>dolor</td>
              <td>sit</td>
              <td>sit</td>
              <td>sit</td>
            </tr> 
            @endif    
          </tbody>
        </table>
      </div>
      <div class="col-md-12">
        {{ $allposts->links() }}
      </div>
    </main>
  </div>
</div>

@endsection

<!-- Button trigger modal -->
 

<!-- Modal -->
<div class="modal fade bd-example-modal-lg"  id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Add Post</h5> 
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container">

        	<form id="blogpost_form" method="post" enctype="multipart/form-data">
        		@csrf
        	
        	<div class="row">
        	@if(!empty($users))
        	<div class="col-md-6">
        	<div class="form-group">
        		<b><label>Select User</label></b>
        		<select name="user_id" class="form-control" id="user_id">
        			<option value="">Select User</option>
        			@foreach($users as $user)
        			<option value="{{ $user->id }}">{{ $user->name }}</option>
        			@endforeach 
        		</select>
            @if($errors->has('user_id'))
            {{ $errors->first('user_id')}}
            @endif
        	</div>
        	</div>
        	@endif
        	<div class="col-md-6">
        	<div class="form-group">
        		<b><label>Title</label></b>
        		 <input type="text" name="title" id="title" placeholder="Title Here..." class="form-control">
        	</div>
        	</div>
        	</div>
        	<div class="row">
        	<div class="col-md-6">
        	<div class="form-group">
        		<b><label>Heading</label></b>
        		 <input type="text" name="heading" id="heading" placeholder="Heading Here..." class="form-control">
        	</div>
        	</div>
        	<div class="col-md-6">
        	<div class="form-group">
        		<b><label>Short Description</label></b>
        		 <input type="text" name="short_content" id="short_content" placeholder="Short Description Here..." class="form-control">
        	</div>
        	</div>
        	</div>
        	<div class="form-group">
        		<b><label>Long Description(Optional)</label></b>
        		 <textarea  name="long_content1" id="long_content1" placeholder="Long Description Here..." class="form-control"></textarea> 
        	</div>
        	<div class="form-group">
        		<b><label>Long Description-2(Optional)</label></b>
        		<textarea name="lomg_content2" id="long_content2" placeholder="Long Description-2 Here..." class="form-control"></textarea>  
        	</div>
        	<div class="form-group">
        		<b><label>Blog Thumbnail</label></b>
        		 <input type="file" name="thumbnail1" id="thumbnail1" class="form-control">
        	</div>
        	<div class="form-group">
        		<b><label>Another Thumbnail(Optional)</label></b>
        		 <input type="file" name="thumbnail2" id="thumbnail2" class="form-control">
        	</div>
            <div class="form-group">
        		<b><label>Blog Video(Optional)</label></b>
        		 <input type="file" name="video1" id="video1" class="form-control">
        	</div>
        	<div class="form-group">
        		<b><label>Another Video(Optional)</label></b>
        		 <input type="file" name="video2" id="video2" class="form-control">
        	</div>

        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" id="btn_blogpost" class="btn btn-primary">Save </button>
      </div>
      </form>
    </div>
  </div>
</div>
@section('script')
<script type="text/javascript">
   
	$(document).ready(function () {
     $('#blogpost_form').validate({ // initialize the plugin
        rules: {
            // user_id: {
            //     required: true,
            //     number  :true                
            // },
            // title: {
            //     required: true, 
            //     minlength:6                 
            // },
            // heading: {
            //     required: true, 
            //     minlength:6          
            // },
            // short_content: {
            //     required: true, 
            //     minlength:6          
            // },
            // long_content1: {
            //     required: true, 
            //     minlength:6                 
            // }  
        },
        // submitHandler: function (form) { // for demo
        //      if ($(form).valid()) 
	       //     form.submit(); 
	       //     return false; // prevent normal form posting
        // }
    });

		$('#btn_blogpost').on('click', function(){
			if (!$("#blogpost_form").valid()) { // Not Valid
                return false;
            } else {
            	var data = $('#blogpost_form').serialize();
            	$.ajax({
            		method:'post',
            		data:new FormData($("#blogpost_form")[0]),
            		url:'{{route("blogpost.store")}}',
             		cache:  false,
                dataType:'json',
                contentType: false, 
                processData: false,
            		beforeSend:function(){
            			$('#btn_blogpost').prop('disabled',true);
            			$('#btn_blogpost').html('Please Wait!!');
            		},
            		success:function(result){ 
                    switch(result.status){
                      case 'success':
                			$.toast({
    		                title: result.message ,
     		                delay: 10000,
                        container: $("#my_container")
    		              });
                      break;
                      case 'errer':
                         $.toast({
                            title: result.message ,
                            delay: 10000,
                            container: $("#my_container")
                        });
                      break;
                      default:
                      alert('Invalid Responce!!!');   
                      break;   
                  };
                  $('#btn_blogpost').prop('disabled',false);
            			setTimeout(function(){location.reload();},4000);
            		},
            		errer:function() {
            			alert('Something Went Worng!!');
            		}
            	});
             }
     });

});
 </script>
@endsection