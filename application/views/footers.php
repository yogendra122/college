<!--=============== scripts  ===============-->
<script src="assets/website/js/jquery.min.js"></script>
<script src="assets/website/js/plugins.js"></script>
<script src="assets/website/js/scripts.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDwJSRi0zFjDemECmFl9JtRj1FY7TiTRRo&amp;libraries=places&amp;callback=initAutocomplete"></script>
<script src="assets/website/js/map-single.js"></script>  
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script> 

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  

<script src="assets/admin/js/jquery.dataTables.min.js"></script>  
<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>            

<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script> 

<script type="text/javascript">
    
        if ($("#registerform").length > 0) {
            $("#registerform").validate({
                errorClass: 'errors',
                rules: {
                    name: {
                        required: true,
                        minlength: 3,
                    },
                 rnpassword : {
                        required  : true,
                        equalTo   : "#password",
                    },
                },
                messages: {
                    name: {
                        required: "Please enter name",
                        minlength: "The name should be greater than 3 characters"
                    },
                rnpassword : {
                        required  : 'Please enter Confirm password'
                            },  
                  },
                submitHandler: function(form) {
                    toastr.clear();
                    let action = $('#registerform').attr('action-attr');
                    var formData = new FormData(form);
                    $.ajax({
                        url: "<?php echo base_url() ?>" + action,
                        type: "POST",
                        data: formData,
                        dataType: 'json',
                        processData: false,
                        contentType: false,
                        success: function(response) {
                            if(response.status == true)
                            {
                                toastr.success(response.message,'Success', {timeOut: 3000});
                            }else{
                                toastr.error(response.message,'Error', {timeOut: 3000});
                            }
                            
                        }
                    });
                }
            })
        }        
</script>


<script type="text/javascript">
        var base_url  = "<?php echo base_url() ?>"; // Base url
        if ($("#user-login-form").length > 0) {
            $("#user-login-form").validate({
            // Rules for form validation
              rules : {
                  email : {
                    required  : true,
                    email     : true
                  },
                  npassword : {
                    required  : true,
                    minlength : 1,
                    maxlength : 15,
                  },
                },
                  messages : {
                    email : {
                        required  : 'Please enter your email address',
                        email     : 'Please enter a valid email address'
                    },
                    npassword : {
                        required  : 'Please enter passsword',
                        minlength : "Password should have minimum 1 characters.",
                        maxlength : "Password should have Maxlength 15 characters.",
                      }
                    },  

                    submitHandler: function(form) {
                    toastr.clear();
                    let action = $('#user-login-form').attr('action-attr');
                    var formData = new FormData(form);
                    $.ajax({
                        url: "<?php echo base_url() ?>" + action,
                        type: "POST",
                        data: formData,
                        dataType: 'json',
                        processData: false,
                        contentType: false,
                         success: function (res) {
                                  console.log(base_url+res.url)
                                  if(res.status == true ){
                                    toastr.success(res.message, 'Success', {timeOut: 3000});
                                    setTimeout(function(){ window.location = base_url+res.url; },4000);
                                  }else{
                                    toastr.error(res.message, 'Alert!', {timeOut: 3000});
                                  }
                                }  
                         });
                }
            })
        }        
</script>

<script type="text/javascript">
        var base_url  = "<?php echo base_url() ?>"; // Base url
        if ($("#edit_profile_user").length > 0) {
            $("#edit_profile_user").validate({
            // Rules for form validation
              rules : {
                  user_email : {
                    required  : true,
                    email     : true
                  },

                
                },
                  messages : {
                    email : {
                        required  : 'Please enter your email address',
                        email     : 'Please enter a valid email address'
                    },
                    
                   },  

                    submitHandler: function(form) {
                    toastr.clear();
                    let action = $('#edit_profile_user').attr('action-attr');
                    var formData = new FormData(form);
                    $.ajax({
                        url: "<?php echo base_url() ?>" + action,
                        type: "POST",
                        data: formData,
                        dataType: 'json',
                        processData: false,
                        contentType: false,
                         success: function (res) {
                                  
                                  if(res.status == true ){
                                    toastr.success(res.message, 'Success', {timeOut: 3000});
                                     window.location.reload();
                                   // setTimeout(function(){ window.location = base_url+res.url; },4000);
                                  }else{
                                    toastr.error(res.message, 'Alert!', {timeOut: 3000});
                                  }
                                }  
                         });
                }
            })
        }        
</script>

<script type="text/javascript">
        var base_url  = "<?php echo base_url() ?>";
        if ($("#smart-form-changepass").length > 0) {
            $("#smart-form-changepass").validate({
                errorClass: 'errors',
                rules: {
                    password: {
                        required: true,
                        
                    },

                    npassword: {
                        required: true,
                        
                    },
                    cpassword : {
                        required  : true,
                        equalTo   : "#npassword",
                    },
                },
                messages: {
                    password: {
                        required: "Please Enter password",
                        minlength: "The name should be greater than 3 characters"
                    },
                    npassword: {
                        required: "Please Enter New password"
                              },
                    cpassword : {
                        required  : 'Please enter Confirm password'
                            },  
                  },
                submitHandler: function(form) {
                    toastr.clear();
                    let action = $('#smart-form-changepass').attr('action-attr');
                    var formData = new FormData(form);
                    $.ajax({
                        url: "<?php echo base_url() ?>" + action,
                        type: "POST",
                        data: formData,
                        dataType: 'json',
                        processData: false,
                        contentType: false,
                        success: function(response) {
                            if(response.status == true)
                            {
                               console.log(base_url+response.url);
                                toastr.success(response.message,'Success', {timeOut: 3000});
                                setTimeout(function(){
                                 window.location = base_url+response.url; 
                                 },3000);
                            }else{
                                toastr.error(response.message,'Error', {timeOut: 3000});
                            }
                            
                        }
                    });
                }
            })
        }        
</script>

<script type="text/javascript">
        var base_url  = "<?php echo base_url() ?>";
        if ($("#smart-form-forgotpass").length > 0) {
            $("#smart-form-forgotpass").validate({
                errorClass: 'errors',
                rules: {
                    email: {
                        required: true,
                        email     : true
                    },


                },
                messages: {
                    email: {
                        required: "Please Enter Email",
                        email     : 'Please enter a valid email address'
                        },
                  },
                submitHandler: function(form) {
                    toastr.clear();
                    let action = $('#smart-form-forgotpass').attr('action-attr');
                    var formData = new FormData(form);
                    $.ajax({
                        url: "<?php echo base_url() ?>" + action,
                        type: "POST",
                        data: formData,
                        dataType: 'json',
                        processData: false,
                        contentType: false,
                        success: function(response) {
                            if(response.status == true)
                            {
                               console.log(base_url+response.url);
                                toastr.success(response.message,'Success', {timeOut: 3000});
                                setTimeout(function(){
                                 window.location = base_url+response.url; 
                                 },3000);
                            }else{
                                toastr.error(response.message,'Error', {timeOut: 3000});
                            }
                            
                        }
                    });
                }
            })
        }        
</script>


<script type="text/javascript">
        var base_url  = "<?php echo base_url() ?>";
        if ($("#user_forgot_newgepass").length > 0) {
            $("#user_forgot_newgepass").validate({
                errorClass: 'errors',
                rules: {
                   
                    npassword: {
                        required: true,
                        
                    },
                    cpassword : {
                        required  : true,
                        equalTo   : "#npassword",
                    },
                },
                messages: {
                   
                    npassword: {
                        required: "Please Enter New password"
                              },
                    cpassword : {
                        required  : 'Please enter Confirm password'
                            },  
                  },
                submitHandler: function(form) {
                    toastr.clear();
                    let action = $('#user_forgot_newgepass').attr('action-attr');
                    var formData = new FormData(form);
                    $.ajax({
                        url: "<?php echo base_url() ?>" + action,
                        type: "POST",
                        data: formData,
                        dataType: 'json',
                        processData: false,
                        contentType: false,
                        success: function(response) {
                            if(response.status == true)
                            {
                               console.log(base_url+response.url);
                                toastr.success(response.message,'Success', {timeOut: 3000});
                               
                            }else{
                                toastr.error(response.message,'Error', {timeOut: 3000});
                            }
                            
                        }
                    });
                }
            })
        }        
</script>


