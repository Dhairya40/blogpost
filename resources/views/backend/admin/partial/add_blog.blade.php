<div class="modal fade bd-example-modal-lg"  id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Add Post</h5> 
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="blogpost_form" method="post" enctype="multipart/form-data">
            @csrf
          
      <div class="modal-body">
        <div class="container">

        	
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