@extends('backend.master')
@section('title')Admin | Blogpost List!! @endsection

@section('post_active') active @endsection

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
        <!-- <li class="breadcrumb-item active" aria-current="page">@if(@$postegory){{'Edit Category'}} @else{{'Add Category'}}@endif</li> -->
      </ol>
   </nav>
      <h2>Blogpost List</h2>
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
              <th>Posted By</th>
              <th>Headding</th>
              <th>Short Desc.</th>
              <th>Long Desc.</th>
              <th>Thumbnail</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @if(!empty($allposts))
               @foreach($allposts as $post)
            <tr>
              <td>{{ ($post->id) ? $post->id:'1' }}</td>
              <td>Admin</td>
              <td>{{ str_limit(($post->title) ? $post->title:'Dummy', $limit=20, $end='...') }}</td>
              <td>{{ $post->user->name}} </td>
              <td>{{ str_limit(($post->heading) ? $post->heading:'Dummy', $limit=20, $end='...') }}</td>
              <td>{{ str_limit(($post->short_content) ? $post->short_content:'Dummy', $limit=20, $end='...') }}</td>
              <td>{{ str_limit(($post->long_content1) ? $post->long_content1:'Dummy', $limit=20, $end='...') }}</td>
              <td><img src="{{ url('public/images/'.$post->thumbnail1) }}" class="img-responsive" width="100px" style="max-height: 120px !important;"> </td>
              <td>
                <a href="#" type="button" id="view_{{$post->id}}" class="btn btn-success btn-sm mb-1" title="View Detail">View</a> | <a href="{{route('blogpost.edit', $post->id)}}" id="edit_{{$post->id}}" class="btn btn-info btn-sm mb-1" title="Edit Detail">Edit</a> | <a href="#" id="remove_{{$post->id}}" class="btn btn-warning btn-sm" title="Remove From List">Trash</a> | <a href="javascript:void(0);" id="delete_{{$post->id}}" onclick="conformDelete({{$post->id}});" class="btn btn-danger btn-sm mb-1" title="Delete">Delete</a> 
                <form id="delete-categpry_{{$post->id}}" action="{{route('blogpost.destroy', $post->id)}}" method="post" style="display: none;">
                  @method('DELETE')
                  @csrf
                </form>
              </td>
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
@include('backend.admin.partial.add_blog')

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

function conformDelete(id){
let choice=confirm('Are you sure want to delete this item ?');
if(choice){
  document.getElementById('delete-categpry_'+id).submit();
}
 };

  </script>
@endsection