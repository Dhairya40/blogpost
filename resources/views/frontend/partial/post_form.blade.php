<div class="col-md-12">
<div class="row">
<div class="col-md-12">
<ul class="nav nav-tabs" id="myTab">
  <li class="active">
    <a class="nav-link active" href="#profile" role="tab" data-toggle="tab"><i class="fa fa-user-circle"></i> Perfile Info</a>
  </li>
  <li>
    <a class="nav-link" href="#buzz" role="tab" data-toggle="tab"><i class="fa fa-info-circle"></i> Create Post</a>
  </li>                                                
</ul>

<!-- Tab panes -->
<div class="tab-content">
  <div role="tabpanel" class="tab-pane fade show active" id="profile">
          <div class="row">
              <div class="col-md-2"> <label>ID</label></div>
              <div class="col-md-6"> <p>{{ $record->id }}</p></div>
          </div>
          <div class="row">
              <div class="col-md-2"> <label>Role</label></div>
              <div class="col-md-6"> <p>{{ Auth()->user()->role->name}}</p></div>
          </div>
          <div class="row">
              <div class="col-md-2"> <label>Email</label></div>
              <div class="col-md-6"> <p>{{ $record->email }}</p></div>
          </div>
          <div class="row">
              <div class="col-md-2">  <label>Phone</label> </div>
              <div class="col-md-6">
                <p>{{ (Auth()->user()->profile->phone) ? Auth()->user()->profile->phone: 'Not Defined' }}</p>
              </div>
          </div>
          <div class="row">
              <div class="col-md-2"> <label>Profesion</label>  </div>
              <div class="col-md-6"> <p>Developer</p>  </div>
          </div>
  </div>
<div role="tabpanel" class="tab-pane fade" id="buzz">
<div class="row">
  <form class="form-horizontal" id="blogpost_form"  method="post" enctype="multipart/form-data">
     @csrf     
     <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
     <div class="row">    
        <div class="col">
          <b><label for="author-name" id="author" class="col-form-label">Author:</label></b>
          <input type="text" name="author" class="form-control" id="author" required="requred">
        </div>
        <div class="col">
          <b><label for="title" class="col-form-label">Title:</label></b>
          <input type="text" name="title" id="title" class="form-control" required="requred" >
        </div>
    </div>
    <div class="row">
        <div class="col">
          <b><label for="heading" class="col-form-label">Heading:</label></b>
          <input type="text" id="heading" name="heading" class="form-control" required="requred" >
        </div>
        <div class="col">
          <b><label for="blogpost_types_id" class="col-form-label">Post Type:</label></b>
          <select class="form-control" name="blogpost_type_id" id="blogpost_types_id">
            <option value="" title="Please Select One" disabled>Please Select One</option>
            @if(!empty($blogtype))
            @foreach($blogtype as $row)
            <option value="{{ $row->id }}" title="{{ $row->description}}">{{ $row->name }}</option>
            @endforeach
            @endif 
          </select>
        </div>
    </div>
    <div class="row">
          <b><label for="short_content" class="col-form-label">Short Content:</label></b>
          <input type="text" class="form-control" name="short_content" placeholder="Short Description Here...">
        </ > 
    </div>
    <div class="row">
        <!-- <div class="form-group"> -->
          <b><label>Long Description-2(Optional)</label></b>
          <textarea name="lomg_content2" id="long_content2" placeholder="Long Description-2 Here..." class="form-control"></textarea>  
        <!-- </div> -->
    </div>
    <div class="row">
        <!-- <div class="form-group"> -->
          <b><label>Long Description(Optional)</label></b>
           <textarea  name="long_content1" id="long_content1" placeholder="Long Description Here..." class="form-control"></textarea> 
         <!-- </div> -->
    </div>
    <div class="row">
        <!-- <div class="form-group"> -->
          <b><label>Blog Thumbnail</label></b>
          <input type="file" name="thumbnail1" id="thumbnail1" class="form-control"> 
        <!-- </div> -->
    </div>
    <div class="row">
        <!-- <div class="form-group"> -->
          <b><label>Another Thumbnail(Optional)</label></b>
          <input type="file" name="thumbnail2" id="thumbnail2" class="form-control">
        <!-- </div> -->
    </div>
      <div class="row">
        <!-- <div class="form-group"> -->
          <b><label>Blog Video(Optional)</label></b>
          <input type="file" name="video1" id="video1" class="form-control">
        <!-- </div> -->
    </div>
    <div class="row">
        <!-- <div class="form-group"> -->
          <b><label>Another Video(Optional)</label></b>
          <input type="file" name="video2" id="video2" class="form-control">
        <!-- </div> -->
    </div>  
    <button type="button" id="btnBlogpost" class="btn btn-info mt-3">Submit</button> 
  </form> 
</div> 
</div>
                                
  </div> 
    </div> 
</div>
</div>