        <!--=============== scripts  ===============-->
        <script src="assets/website/js/jquery.min.js"></script>
        <script src="assets/website/js/plugins.js"></script>
        <script src="assets/website/js/scripts.js"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDwJSRi0zFjDemECmFl9JtRj1FY7TiTRRo&amp;libraries=places&amp;callback=initAutocomplete"></script>
        <script src="assets/website/js/map-single.js"></script>  
        <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script> 

        <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script> 

       
        
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
                                       
                                        toastr.success(response.message,'Success', {timeOut: 3000});
                                        console.log(response.url);
                                        setTimeout(function(){
                                         window.location = base_url; 
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