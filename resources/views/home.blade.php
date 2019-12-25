@extends('layouts.app')
@section('title') Welcome! {{ $record->name }}@endsection

@section('css')
<style type="text/css">
  .error{color: red;}
</style>
@endsection
@section('content')
<div class="container">
       @if($errors->any())
     <div class="alert alert-danger">
    <ul class="error">
      @foreach($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
    </ul>
     </div>
    @endif

    @if(session()->has('error_message'))
    <div class="alert alert-danger" role='alert'>
        {{session('error_message')}}
    </div>
    @endif
    @if(session()->has('success_message'))
    <div class="alert alert-success" role='alert'>
        {{session('success_message')}}
    </div>
    @endif
    <div class="container main-secction">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12 image-section">
                @if(!isset($record->profile->back_profile))
                <img src="{{ url('public/images/img.jpg')}}">
                @else
                <img src="{{ url('public/user_image')}}/{{ $record->profile->back_profile }}" class="img-responsive">
                @endif

            </div>
            <div class="row user-left-part">
                <div class="col-md-3 col-sm-3 col-xs-12 user-profil-part pull-left">
                    <div class="row ">
                        <div class="col-md-12 col-md-12-sm-12 col-xs-12 user-image text-center">
                            @if(!isset($record->profile->back_profile))
                            <img src="{{ url('public/images/generic-user-purple.png')}}" class="rounded-circle">
                            @else
                            <img src="{{ url('public/user_image')}}/{{ $record->profile->profile_image }}" class="rounded-circle img-responsive">
                            @endif
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12 user-detail-section1 text-center">
                            <button id="btn-contact" (click)="clearModal()" data-toggle="modal" data-target="#contact" class="btn btn-success btn-block follow">Contact-Us</button> 
                            <button class="btn btn-warning btn-block">Descargar Curriculum</button>                               
                        </div>
                        <div class="row user-detail-row">
                            <div class="col-md-12 col-sm-12 user-detail-section2 pull-left">
                                <div class="border"></div>
                                <p>FOLLOWER</p>
                                <span>320</span>
                            </div>                           
                        </div>
                       
                    </div>
                </div>
                <div class="col-md-9 col-sm-9 col-xs-12 pull-right profile-right-section">
                    <div class="row profile-right-section-row">
                        <div class="col-md-12 profile-header">
                            <div class="row">
                                <div class="col-md-8 col-sm-6 col-xs-6 profile-header-section1 pull-left">
                                    <h1>{{ $record->name }}</h1>
                                    <h5>Developer</h5>
                                </div>
                                <div class="col-md-4 col-sm-6 col-xs-6 profile-header-section1 text-right pull-rigth">
                                    <a href="javascript:void(0);" class="btn btn-primary btn-block">Complete Profile</a>

                                     <!-- Large modal -->
                              <button type="button" class="btn btn-warning btn-block my-2" data-toggle="modal" data-target=".bd-example-modal-lg">Edit Profile</button>
                                </div>
                               
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-8">
                                        <ul class="nav nav-tabs" role="tablist">
                                                <li class="nav-item">
                                                  <a class="nav-link active" href="#profile" role="tab" data-toggle="tab"><i class="fa fa-user-circle"></i> Perfile Info</a>
                                                </li>
                                                <li class="nav-item">
                                                  <a class="nav-link" href="#buzz" role="tab" data-toggle="tab"><i class="fa fa-info-circle"></i> Create Post</a>
                                                </li>                                                
                                              </ul>
                                              
                                              <!-- Tab panes -->
                                              <div class="tab-content">
                                                <div role="tabpanel" class="tab-pane fade show active" id="profile">
                                                        <div class="row">
                                                                <div class="col-md-2">
                                                                    <label>ID</label>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <p>{{ $record->id }}</p>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-2">
                                                                    <label>Role</label>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <p>{{ Auth()->user()->role->name}}</p>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-2">
                                                                    <label>Email</label>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <p>{{ $record->email }}</p>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-2">
                                                                    <label>Phone</label>
                                                                </div>
                                                                <div class="col-md-6">
                                                              <p>{{ (Auth()->user()->profile->phone) ? Auth()->user()->profile->phone: 'Not Defined' }}</p>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-2">
                                                                    <label>Profesion</label>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <p>Developer</p>
                                                                </div>
                                                            </div>
                                                </div>
                                                <div role="tabpanel" class="tab-pane fade" id="buzz">
                                                        <div class="row">
                                                                <div class="col-md-6">
                                                                    <label>Experience</label>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <p>Expert</p>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <label>Hourly Rate</label>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <p>10$/hr</p>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <label>Total Projects</label>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <p>230</p>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <label>English Level</label>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <p>Expert</p>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                        <label>Availability</label>
                                                             </div>
                                                              <div class="col-md-6">
                                                                    <p>6 months</p>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                             <div class="col-md-12">
                                                             <label>Your Bio</label>
                                                                  <br/>
                                                      <p>Your detail description</p>
                                                                </div>
                                                            </div>
                                                </div>
                                                
                                              </div>
                          
                                </div>
                                <div class="col-md-4 img-main-rightPart">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="row image-right-part">
                                                <div class="col-md-6 pull-left image-right-detail">
                                                    <h6>PUBLICIDAD</h6>
                                                </div>
                                            </div>
                                        </div>
                                        <a href="http://camaradecomerciozn.com/">
                                            <div class="col-md-12 image-right">
                                                <img src="http://pluspng.com/img-png/bootstrap-png-bootstrap-512.png">
                                            </div>
                                        </a>
                                        <div class="col-md-12 image-right-detail-section2">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="contact" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="contact">Leave A Message</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <p for="msj">Se enviará este mensaje a la persona que desea contactar, indicando que te quieres comunicar con el. Para esto debes de ingresar tu información personal.</p>
                    </div>
                    <div class="form-group">
                        <label for="txtFullname">Your Name </label>
                        <input type="text" id="txtFullname" value="" placeholder="Enter Your Name.." class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="txtEmail">Email</label>
                        <input type="text" id="txtEmail" placeholder="Email..." class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="txtPhone">Contact no</label>
                        <input type="text" id="txtPhone" placeholder="Contact.." class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" (click)="openModal()" data-dismiss="modal">Submit</button>
                </div>
            </div>
        </div>
    </div>
 </div>
 
<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">{{ Auth::user()->name }}</h5>
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
@endsection

@section('script')
<script type="text/javascript">
    // $('#country_id').select2({
    //     placeholder: "Search country..",
    //     allowClear: true,
    // }).trigger('change');
    // $('#state_id').select2({
    //     placeholder: "Search State...",
    //     allowClear: true,
    // });
  $(document).ready(function(){
    $('#country_id').on('change', function(){
    var stateSelect = $('#state_id'); 
    var country_id  = $(this).val();
    $('#state_id').val(null);
    $('#state_id option').remove();
    if (country_id =='' || country_id==='undefined' || country_id=='null') {
        alert('Please Select a valid Country!!');
        stateSelect.append('<option value="">Please Select Country First</option>')
    }else{ 
        $.ajax({
        method: 'GET',
        data  :  new FormData($('#profileForm')[0]),
        url   : '{{route("user.state")}}/' + country_id,
        cache:  false,
        dataType:'json',
        async:false,
        contentType: false, 
        processData: false,
        beforeSend:function(){
          $('#loading').css("display", "inline-block");
         },
        success:function(result){
        // console.log('fine'); 
          // console.log(result.state);
          setTimeout(function () {
            $("#loading").css("display", "none");
        }, 1000);
             switch(result.status){
              case 'success': 
              // .then(function (result) {
                // create the option and append to Select2
                for(i=0; i< result.state.length; i++){
                    var item = result.state[i]
                    var option = new Option(item.name, item.id, true, false);
                    stateSelect.append(option);
                }
                stateSelect.trigger('change');
                // });
              break;
              case 'errer':
                 alert('Whoops!!, Somthing Went Worng!!')
              break;
              default:
              alert('Invalid Responce!!!');   
              break;   
          };
          $('#btn_blogpost').prop('disabled',false);
          // setTimeout(function(){location.reload();},4000);
        },
        errer:function() {
          alert('Something Went Worng!!');
        }
        });
    }
   });

    // $('#country_id').on('change', function(){
    var stateSelect = $('#state_id'); 
    var country_id  = $('#country_id').val();
    $('#state_id').val(null);
    $('#state_id option').remove();
    if (country_id =='' || country_id==='undefined' || country_id=='null') {
        alert('Please Select a valid Country!!');
        stateSelect.append('<option value="">Please Select Country First</option>')
    }else{ 
        $.ajax({
        method: 'GET',
        data  :  new FormData($('#profileForm')[0]),
        url   : '{{route("user.state")}}/' + country_id,
        cache:  false,
        dataType:'json',
        async:false,
        contentType: false, 
        processData: false,
        beforeSend:function(){
          $('#loading').css("display", "inline-block");
         },
        success:function(result){
        // console.log('fine'); 
          // console.log(result.state);
          setTimeout(function () {
            $("#loading").css("display", "none");
        }, 1000);
             switch(result.status){
              case 'success': 
              // .then(function (result) {
                // create the option and append to Select2
                for(i=0; i< result.state.length; i++){
                    var item = result.state[i]
                    var option = new Option(item.name, item.id, true, false);
                    stateSelect.append(option);
                }
                stateSelect.trigger('change');
                // });
              break;
              case 'errer':
                 alert('Whoops!!, Somthing Went Worng!!')
              break;
              default:
              alert('Invalid Responce!!!');   
              break;   
          };
          $('#btn_blogpost').prop('disabled',false);
          // setTimeout(function(){location.reload();},4000);
        },
        errer:function() {
          alert('Something Went Worng!!');
        }
        });
    }
   // }); 
    //Update Profile
  });
  

    $(document).ready(function () {
     $('#profileForm').validate({ // initialize the plugin
        rules: {
            phone: {
                 number  :true                
            },
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
            about: {
                 minlength:20                 
            }  
        },
         
    });

        $('#btnProfile').on('click', function(){
            if (!$("#profileForm").valid()) { // Not Valid
                return false;
            }  
     });

});
</script>
@endsection
