@extends('layouts.app')
@section('title') Welcome! {{ $record->name }}@endsection

@section('css')
<style type="text/css">
    body{ margin-top: auto;background-color: #f1f1f1;}
  .border{border-bottom:1px solid #F1F1F1;margin-bottom:10px;}
  .main-secction{   box-shadow: 10px 10px 10px;}
  .image-section{    padding: 0px;}
  .image-section img{ width: 100%;height:250px;position: relative; }
  .user-image{position: absolute;margin-top:-50px;}
  .user-left-part{margin: 0px;}
  .user-image img{width:100px;height:100px; }
  .user-profil-part{padding-bottom:30px;background-color:#FAFAFA;}
  .follow{margin-top:70px;   }
  .user-detail-row{margin:0px; }
  .user-detail-section2 p{font-size:12px;padding: 0px;margin: 0px; }
  .user-detail-section2{ margin-top:10px;}
  .user-detail-section2 span{  color:#7CBBC3;font-size: 20px;  }
  .user-detail-section2 small{font-size:12px;color:#D3A86A;  }
  .profile-right-section{padding: 20px 0px 10px 15px;background-color: #FFFFFF;  }
  .profile-right-section-row{margin: 0px;}
  .profile-header-section1 h1{font-size: 25px;  margin: 0px;  }
  .profile-header-section1 h5{color: #0062cc; }
  .req-btn{height:30px; font-size:12px; }
  .profile-tag{padding: 10px;border:1px solid #F6F6F6; }
  .profile-tag p{font-size: 12px; color:black; }
  .profile-tag i{color:#ADADAD; font-size: 20px; }
  .image-right-part{background-color: #FCFCFC; margin: 0px;  padding: 5px;}
  .img-main-rightPart{ background-color: #FCFCFC;   margin-top: auto; }
  .image-right-detail{  padding: 0px;}
  .image-right-detail p{font-size: 12px;}
  .image-right-detail a:hover{text-decoration: none;}
  .image-right img{width: 100%;}
  .image-right-detail-section2{margin: 0px;}
  .image-right-detail-section2 p{color:#38ACDF;margin:0px;}
  .image-right-detail-section2 span{color:#7F7F7F;}
  .nav-link{font-size: 1.2em;    }
  
</style>
@endsection
@section('content')
<div class="container">
    @if(session()->has('error_message'))
    <div class="alert alert-danger" role='alert'>
        {{session('error_message')}}
    </div>
    @endif
    <div class="container main-secction">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12 image-section">
                <img src="{{ url('public/images/img.jpg')}}">
            </div>
            <div class="row user-left-part">
                <div class="col-md-3 col-sm-3 col-xs-12 user-profil-part pull-left">
                    <div class="row ">
                        <div class="col-md-12 col-md-12-sm-12 col-xs-12 user-image text-center">
                            <img src="https://www.jamf.com/jamf-nation/img/default-avatars/generic-user-purple.png" class="rounded-circle">
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
                                                  <a class="nav-link active" href="#profile" role="tab" data-toggle="tab"><i class="fas fa-user-circle"></i> Perfile Info</a>
                                                </li>
                                                <li class="nav-item">
                                                  <a class="nav-link" href="#buzz" role="tab" data-toggle="tab"><i class="fas fa-info-circle"></i> Create Post</a>
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
                        <input type="text" id="txtFullname" placeholder="Enter Your Name.." class="form-control">
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
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="profileForm" action="" enctype="multiform/form-data">
          <div class="form-group">
            <label for="recipient-name" id="name" class="col-form-label">Name:</label>
            <input type="text" name="name" class="form-control" id="recipient-name">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Address:</label>
            <input type="text" name="address" id="address" class="form-control">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Phone:</label>
            <input type="text" id="phone" name="phone" class="form-control" >
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Country:</label>
            <select class="form-control" name="country_id" id="country_id">
              <option value="1">India</option>
              <option>US</option>
              <option>Noida</option>
              <option>Delhi</option>
            </select>
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">State:</label>
            <select class="form-control" name="state" id="state_id">
            <option value="1">India</option>
            <option>US</option>
            <option>Noida</option>
            <option>Delhi</option>
            </select>
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">City:</label>
            <input type="text" name="city" class="form-control" id="city">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">About:</label>
            <textarea class="form-control" id="message-text"></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
@endsection
