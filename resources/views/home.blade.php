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
                               <!-- Blog post form -->
                               @include('frontend.partial.post_form') 
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
@include('frontend.partial.profile')
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

<!-- Submit Blogpost -->


<script type="text/javascript">
   
    $(document).ready(function () {
     $('#blogpost_form').validate({ // initialize the plugin
        rules: {
            author: {
                required: true
             },
            title: {
                required: true, 
                minlength:6                 
            },
            heading: {
                required: true, 
                minlength:6          
            },
            short_content: {
                required: true, 
                minlength:15          
            },
            long_content1: {
                required: true, 
                minlength:6                 
            }  
        },
        // submitHandler: function (form) { // for demo
        //      if ($(form).valid()) 
           //     form.submit(); 
           //     return false; // prevent normal form posting
        // }
    });

        $('#btnBlogpost').on('click', function(){
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
                        $('#btnBlogpost').prop('disabled',true);
                        $('#btnBlogpost').html('Please Wait!!');
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

<script>
$(document).ready(function(){
    $('a[data-toggle="tab"]').on('show.bs.tab', function(e) {
        localStorage.setItem('activeTab', $(e.target).attr('href'));
    });
    var activeTab = localStorage.getItem('activeTab');
    if(activeTab){
        $('#myTab a[href="' + activeTab + '"]').tab('show');
    }
});
</script>
@endsection
