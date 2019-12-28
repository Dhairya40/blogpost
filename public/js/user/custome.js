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
 
// <!-- Submit Blogpost -->


    
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
 
 $(document).ready(function(){
    $('a[data-toggle="tab"]').on('show.bs.tab', function(e) {
        localStorage.setItem('activeTab', $(e.target).attr('href'));
    });
    var activeTab = localStorage.getItem('activeTab');
    if(activeTab){
        $('#myTab a[href="' + activeTab + '"]').tab('show');
    }
});
 