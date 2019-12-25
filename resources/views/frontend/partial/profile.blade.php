<div class="modal fade bd-example-modal-lg" id="profileModal" tabindex="-1" role="dialog" aria-labelledby="profileModalTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="profileModalTitle">{{ Auth::user()->name }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="profileForm" action="{{route('profile.update', $record->id)}}" method="post" enctype="multipart/form-data">
           @csrf     
           @if(isset(Auth::user()->name))
           @method('PUT')
           @endif
      <div class="modal-body">
        <div id="loading" class="loading style-2" style="display: none;"><div class="loading-wheel"></div></div>             
          <div class="form-group">
            <label for="recipient-name" id="name" class="col-form-label">Name:</label>
            <input type="text" name="name" value="{{ $record->profile->name}}" class="form-control" id="name"  @if(isset($record->profile->name)) required="requred" @endif >
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Address:</label>
            <input type="text" name="address" value="{{ $record->profile->address}}" id="address" class="form-control" @if(isset($record->profile->address)) required="requred" @endif>
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Phone:</label>
            <input type="text" id="phone" value="{{ $record->profile->phone }}" name="phone" class="form-control" @if(isset($record->profile->phone)) required="requred" @endif >
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Country:</label>
            <select class="form-control" name="country" id="country_id">
              <option value="" title="Please Select One">Please Select One</option>
              @if(!empty($country))
              @foreach($country as $row)
              <option value="{{ $row->id }}" @if($record->profile->country==$row->id){{ "selected=='selected'" }} @endif title="{{ $row->description}}">{{ $row->name }}</option>
              @endforeach
              @endif 
            </select>
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">State:</label>
            <select class="form-control" name="state" id="state_id">
            <option value="">Please Select Country First</option>
             
            </select>
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">City:</label>
            <input type="text" name="city" value="{{ $record->profile->city  }}" class="form-control" id="city" @if(isset($record->profile->city)) required="requred" @endif >
          </div>
          <div class="form-group">
            <label for="image" class="col-form-label">Profiel Image: @if($record->profile->profile_image)<i class="fa fa-check-circle" title="Change Profile" style="font-size:20px;color:green"></i> @else <i class="fa fa-times-circle-o" title="Upload Profile" aria-hidden="true" style="font-size:20px;color:red"></i> @endif</label>
            <input type="file" name="image" class="form-control" id="profile_image">
          </div>
          <div class="form-group">
            <label for="image" class="col-form-label">Background Profiel Image: @if(isset($record->profile->back_profile))<i class="fa fa-check-circle" style="font-size:20px;color:green" title="Change Background Image"></i> @else <i class="fa fa-times-circle-o" title="Upload Background Image" aria-hidden="true" style="font-size:20px;color:red"></i> @endif</label>
            <input type="file" name="back_profile" class="form-control" id="back_profile">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">About:</label>
            <textarea class="form-control" name="about" id="message-text"> {{ $record->profile->about }}</textarea>
          </div>
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" id="btnProfile" class="btn btn-primary">Save changes</button>
      </div>
    </form>
    </div>
  </div>
</div>