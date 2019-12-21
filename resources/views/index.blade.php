@extends('layouts.master')
@section('title')
Add Record
@endsection
@section('content')
<div class="container">
<h3 style="text-align: center;margin: 20px;">Laravel 5.8 Crud</h3>
<div align="right" style="margin: 20px;">
	<!-- <a href="{{ url('create') }}" class="btn btn-primary">Add</a> -->
	<a href="javascript:void(0);" id="addBtn" data-toggle="modal" data-target="#myModal" class="btn btn-primary">Add</a>
</div>

@if($message=Session::get('success'))
<div class="alert alert-success">
	<p id="success">{{ $message }}</p>
</div>
@endif
 
	<p id="success" class="alert alert-success" style="display: none;"></p>
 
<table class="table table-bordered table-striped">
	<thead>
		<tr>
			<td>First Name</td>
			<td>Last Name</td>
			<td>Image</td>
			<td>Created Date</td>
			<td>Action</td>
			
		</tr>
	</thead>
	<tbody>
		@if(!empty($data))
		@foreach($data as $row)
		<tr>
			<td>{{ $row->first_name }}</td>
			<td>{{ $row->last_name }}</td>
			<td><img src="{{ URL::to('/') }}/public/images/{{ $row->image}}" class="img-responsive" width="75"></td>
			<td>{{ $row->created_at }}</td>
			<td>
				<!-- <a href="{{ url('/show') }}/{{ $row->id }}"><button type="button" name="show" class="btn btn-info btn-sm"> Show</button></a> | -->
				<a href="javascript:void(0);" id="show{{ $row->id }}" data-id="{{ $row->id }}" class="btn btn-info btn-sm showBtn"> Veiw</a> |
				<!-- <a href="{{ url('/edit') }}/{{ $row->id }}"><button type="button" name="edit" class="btn btn-primary btn-sm">Edit</button></a> | -->
				<a href="javascript:void(0);" data-id="{{ $row->id }}" class="btn btn-primary btn-sm editBtn">Edit</a> | 
				<!-- <a href="{{ url('/delete') }}/{{ $row->id }}" onclick="return confirm('Are you sure want to delete this item?');"><button type="submit" name="delete" class="btn btn-danger btn-sm">Delete</button></a> -->
				<a href="javascript:void(0);" id="delete{{ $row->id }}" data-id="{{ $row->id }}" class="btn btn-danger btn-sm dltBtn">Delete</a>
				 
			</td> 
		</tr>
		@endforeach
		@else
       <tr><td colspan="4">No Record Found</td></tr>
		@endif 
	</tbody>
</table> 
{!! $data->links() !!}
<!-- The Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Add Record</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
      	<p id="successmsg" style="display: none;" class="alert alert-success"></p>
      	<p id="errormsg" style="display: none;" class="alert alert-danger"></p>
       <form method="post" id="Form1" enctype="multipart/form-data">
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
  <button type="button" id="btnSub" class="btn btn-primary btn-sm submit">Submit</button>
</form>
      </div> 
    </div>
  </div>
</div>
<div class="modal" id="showModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Show Record</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body"> 
      	 <p id="successmsg" style="display: none;" class="alert alert-success"></p>
        <p id="errormsg" style="display: none;" class="alert alert-danger"></p>
      	<div id="resultData"></div>
      </div> 
    </div>
  </div>
</div>
</div>
@endsection
@section('script')
<!-- Add record -->

<script type="text/javascript">
	$('#btnSub').click(function(event) {
		event.preventDefault();
		var errorFlag=false;
		var fname=$('#first_name').val();
		var lname=$('#last_name').val();
		var image=$('#image').val();
		if (fname=='' || fname=='null' || lname=='' || lname=='null' || image=='' || image=='null') {
			$('#errormsg').css({'display':'block'});
			$('#errormsg').html('OOPS!! All field is required');
			errorFlag=true;
		}
		if (errorFlag) 	return false
			$('#errormsg').css({'display':'none'});
			$.ajax({
                method:'post',
                // data:$('#Form1').serialize(),
                data:new FormData($("#Form1")[0]),
                url:'{{url("/store")}}', 
                cache:  false,
                dataType:'text',
                contentType: false, 
                processData: false,
                beforeSend:function(){
                 $('.submit').prop('disabled',true);
                 $('.submit').html('Please Wait....');
                },
                success:function(responce){  
                     $('#successmsg').css({'display':'block'});
                     $('#successmsg').html('Record Save Successfully');
                     $('#successmsg').fadeOut(3000);
                     setTimeout(function(){location.reload();},4000); 
                }
			});
	});
</script>

<!-- delete record -->

<script type="text/javascript">
	$('.dltBtn').click(function(){
       var id = $(this).attr('data-id'); 
       $.ajax({
         method:'get',
         url:'{{url("delete")}}/'+id,
         data:{id:id},
         beforeSend:function(){
         	document.getElementById('delete'+id).innerHTML='Deleting.....';
         },
         success:function(){
            $('#success').css({'display':'block'});
            $('#success').html('Record Has been deleted');
            $('#success').fadeOut(3000);
            setTimeout(function(){location.reload();},4000); 
         },
         errer:function(){
         	alert('Something went wrong!!');
         }

       });
	});
</script>

<!-- show record -->

<script type="text/javascript">
	$('.showBtn').click(function(){
       var id = $(this).attr('data-id'); 
       $.ajax({
         method:'get',
         url:'{{url("show")}}/'+id,
         data:{id:id}, 
         success:function(responce){  
            $('#resultData').html(responce); 
            $('#showModal').modal('show');
         },
         errer:function(){
         	alert('Something went wrong!!');
         }

       });
	});
</script>
<script type="text/javascript">
	$('.editBtn').click(function(){
       var id = $(this).attr('data-id'); 
       $.ajax({
         method:'get',
         url:'{{url("editrec")}}/'+id,
         data:{id:id}, 
         success:function(responce){  
         	$('.modal-title').html('Update Record');
            $('#resultData').html(responce); 
            $('#showModal').modal('show');
         },
         errer:function(){
         	alert('Something went wrong!!');
         }

       });
	});
</script>

<!-- edit record -->
<script type="text/javascript">
	// $('#btnUp').click(function() {
	$(document).on('click', '#btnUp', function(){   
		var errorFlag=false;
		var fname=document.getElementById('first_name').value;
		var lname=$('#last_name').val(); 
		if (fname=='' || fname=='null' || lname=='' || lname=='null') {
			$('#errormsg').css({'display':'block'});
			$('#errormsg').html('OOPS!! All field is required');
			errorFlag=true;
		}
		 
		// if (errorFlag) 	return false
			$('#errormsg').css({'display':'none'});
		alert('first_name');
			$.ajax({
                method:'post', 
                data:new FormData($("#Form2")[0]),
                url:'{{url("/ajaxupdate")}}', 
                cache:  false,
                dataType:'text',
                contentType: false, 
                processData: false,
                beforeSend:function(){
                 $('.submit').prop('disabled',true);
                 $('.submit').html('Updatig..., Please Wait....');
                },
                success:function(responce){   
                     $('#successmsg').css({'display':'block'});
                     $('#successmsg').html('Record Update Successfully');
                     $('#successmsg').fadeOut(3000);
                     setTimeout(function(){location.reload();},4000); 
                },
                errer:function(){
                	alert('Something went wrong');
                }
			});
	});
</script>
@endsection