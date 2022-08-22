<!--footer -->
<?php
$where  = array('home_id' => 1);
$result  = $this->Admin_model->getAll('home', $where);


?>
<footer class="main-footer fl-wrap">
    <!-- footer-header-->
    <!-- <div class="footer-header fl-wrap grad ient-dark">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <div class="subscribe-header">
                        <h3>Subscribe For a <span>Newsletter</span></h3>
                        <p>Whant to be notified about new locations ? Just sign up.</p>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="subscribe-widget">
                        <div class="subcribe-form">
                            <form id="subscribe">
                                <input class="enteremail fl-wrap" name="email" id="subscribe-email" placeholder="Enter Your Email" spellcheck="false" type="text">
                                <button type="submit" id="subscribe-button" class="subscribe-button"><i class="fal fa-envelope"></i></button>
                                <label for="subscribe-email" class="subscribe-message"></label>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- footer-header end-->
    <!--footer-inner-->
    <div class="footer-inner   fl-wrap">
        <div class="container">
            <div class="row">
                <!-- footer-widget-->
                <div class="col-md-3">
                    <div class="footer-widget fl-wrap">
                        <div class="footer-logo"><a href="index.html"><img src="<?php echo base_url('upload/' . $result[0]->logo_img) ?>" alt=""></a></div>
                        <div class="footer-contacts-widget fl-wrap">
                            <p><?php echo $result[0]->home_footer_desc ?></p>

                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="footer-widget fl-wrap">

                        <div class="footer-contacts-widget fl-wrap">

                            <ul class="footer-contacts fl-wrap no-list-style">
                                <li><span><a href="term_and_conditions">
                                            <?php echo (lang('TERMS AND CONDITION')); ?> </a></li>
                                <li><span><a href="privacy_policy"><?php echo (lang('PRIVACY POLICY')); ?>
                                        </a></li>

                            </ul>

                        </div>
                    </div>
                </div>
                <!-- footer-widget end-->
                <!-- footer-widget-->
                <div class="col-md-3">
                    <div class="footer-widget fl-wrap">

                        <div class="footer-contacts-widget fl-wrap">

                            <ul class="footer-contacts fl-wrap no-list-style">
                                <li><span><?php echo (lang('MAIL')); ?><i class="fal fa-envelope"></i>
                                    </span><a href="#" target="_blank"><?php echo $result[0]->home_email ?></a></li>
                                <li> <span><?php echo (lang('ADDRESS')); ?><i class="fal fa-map-marker"></i> :</span><a href="#" target="_blank"><?php echo $result[0]->home_address ?></a></li>
                                <li><span><?php echo (lang('PHONE')); ?><i class="fal fa-phone"></i> :</span><a href="#"><?php echo $result[0]->home_phone ?></a></li>
                            </ul>

                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="footer-widget fl-wrap">

                        <div class="footer-social">
                            <span><?php echo (lang('FIND US ON')); ?>: </span>
                            <ul class="no-list-style">
                                <li><a href="<?php echo $result[0]->home_fb_url ?>" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="<?php echo $result[0]->home_insta_url ?>" target="_blank"><i class="fab fa-instagram"></i></a></li>
                                <li><a href="<?php echo $result[0]->home_twitter_url ?>" target="_blank"><i class="fab fa-twitter"></i></a></li>


                            </ul>
                        </div>

                    </div>
                </div>


                <!-- footer-widget end-->
                <!-- footer-widget  -->
                <!-- <div class="col-md-4">
                    <div class="footer-widget fl-wrap ">
                        <h3>Our Twitter</h3>
                        <div class="twitter-holder fl-wrap scrollbar-inner2" data-simplebar data-simplebar-auto-hide="false">
                            <div id="footer-twiit"></div>
                        </div>
                        <a href="#" class="footer-link twitter-link" target="_blank">Follow us <i class="fal fa-long-arrow-right"></i></a>
                    </div>
                </div> -->
                <!-- footer-widget end-->
            </div>
        </div>
        <!-- footer bg-->
        <div class="footer-bg" data-ran="4"></div>
        <div class="footer-wave">
            <svg viewbox="0 0 100 25">
                <path fill="#fff" d="M0 30 V12 Q30 17 55 12 T100 11 V30z" />
            </svg>
        </div>
        <!-- footer bg  end-->
    </div>
    <!--footer-inner end -->
    <!--sub-footer-->
    <div class="sub-footer  fl-wrap">
        <div class="container">
            <div class="copyright"> &#169; Directory 2021 . All rights reserved.</div>
            <!-- <div class="lang-wrap">
                <div class="show-lang"><span><i class="fal fa-globe-europe"></i><strong>En</strong></span><i class="fa fa-caret-down arrlan"></i></div>
                <ul class="lang-tooltip lang-action no-list-style">
                    <li><a href="#" class="current-lan" data-lantext="En">English</a></li>
                    <li><a href="#" data-lantext="Fr">Franais</a></li>
                    <li><a href="#" data-lantext="Es">Espaol</a></li>
                    <li><a href="#" data-lantext="De">Deutsch</a></li>
                </ul>
            </div> -->

        </div>
    </div>
    <!--sub-footer end -->
</footer>
<!--footer end -->

<!-- Modal forgot password model -->


<div class="main-register-wrap modal1" id="modal2">
    <div class="reg-overlay"></div>
    <div class="main-register-holder tabs-act">
        <div class="main-register fl-wrap  modal_main1">
            <div class="main-register_title">Welcome to Forgot </div>
            <div class="close-regs"><i class="fal fa-times"></i></div>

            <!--tabs -->
            <div class="tabs-container">
                <div class="tab">
                    <!--tab -->
                    <div id="tab-21" class="tab-content first-tab">
                        <div class="custom-form">
                            <form action-attr="userforgotPassword" id="smart-form-forgotpass" action="javascript:void(0)">
                                <label>Enter Your Email <span>*</span> </label>
                                <input type="email" id="username" name="email" maxlength="100" size="100">

                                <button type="submit" class="btn float-btn color2-bg"> Submit<i class="fas fa-caret-right"></i></button>


                            </form>

                        </div>
                    </div>
                    <!--tab end -->

                </div>
                <!--tabs end -->


            </div>
        </div>
    </div>
</div>

<!-- Modal forgot password model close -->
<!--map-modal -->
<div class="map-modal-wrap">
    <div class="map-modal-wrap-overlay"></div>
    <div class="map-modal-item">
        <div class="map-modal-container fl-wrap">
            <div class="map-modal fl-wrap">
                <div id="singleMap" data-latitude="40.7" data-longitude="-73.1"></div>
            </div>
            <h3><span>Location for : </span><a href="#">Listing Title</a></h3>
            <div class="map-modal-close"><i class="fal fa-times"></i></div>
        </div>
    </div>
</div>
<!--map-modal end -->
<!--register form -->
<div class="main-register-wrap modal">
    <div class="reg-overlay"></div>
    <div class="main-register-holder tabs-act">
        <div class="main-register fl-wrap  modal_main">
            <div class="main-register_title"><?php echo (lang('Welcome to')); ?> <span><strong>plzconfirm.com</strong><strong></strong></span></div>
            <div class="close-reg"><i class="fal fa-times"></i></div>
            <ul class="tabs-menu fl-wrap no-list-style">
                <li class="current"><a href="#tab-1"><i class="fal fa-sign-in-alt"></i> <?php echo (lang('Login')); ?></a></li>
                <li><a href="#tab-2"><i class="fal fa-user-plus"></i><?php echo (lang('Register')); ?></a></li>
            </ul>
            <!--tabs -->
            <div class="tabs-container">
                <div class="tab">
                    <!--tab -->
                    <div id="tab-1" class="tab-content first-tab">
                        <div class="custom-form">
                            <form action-attr="actionuser_login" action="javascript:void(0)" id="user-login-form">
                                <label>
                                    <?php echo (lang('USER_NAME_AND_EMAIL')); ?><span>*</span> </label>
                                <input type="email" id="username" name="email" maxlength="100" size="100" placeholder="<?php echo (lang('USER_NAME_AND_EMAIL')); ?>">

                                <label><?php echo (lang('Password')); ?><span>*</span> </label>
                                <input type="password" name="npassword" id="npassword" placeholder="<?php echo (lang('Password')); ?>" autocomplete="new-password">

                                <button type="submit" class="btn float-btn color2-bg"> <?php echo (lang('Login')); ?><i class="fas fa-caret-right"></i></button>

                                <div class="clearfix"></div>
                                <!-- <div class="filter-tags">
                                    <input id="check-a3" type="checkbox" name="check">
                                    <label for="check-a3">Remember me</label>
                                </div> -->
                            </form>
                            <div class="lost_password">
                                <a class="btn btn-primary modal-open-password" data-toggle="modal" data-target="#exampleModal1"><?php echo (lang('Lost Your Password')); ?>?</a>
                            </div>
                        </div>
                    </div>
                    <!--tab end -->
                    <!--tab -->
                    <div class="tab">
                        <div id="tab-2" class="tab-content">
                            <div class="custom-form">
                                <form id="registerform" action-attr="action_adduser" action="javascript:void(0)" method="post" enctype="multipart/form-data">
                                    <label><?php echo (lang('Full Name')); ?><span>*</span> </label>
                                    <input name="name" type="text" value="" placeholder="<?php echo (lang('Full Name')); ?>">
                                    <label><?php echo (lang('Email')); ?> <span>*</span></label>
                                    <input name="email" type="email" value="" placeholder="<?php echo (lang('Email')); ?>">
                                    <label><?php echo (lang('Password')); ?> <span>*</span></label>
                                    <input name="password" id="password" type="password" value="" placeholder="<?php echo (lang('Password')); ?>">
                                    <label><?php echo (lang('Confirm Password')); ?> <span>*</span></label>
                                    <input type="password" name="rnpassword" placeholder="<?php echo (lang('Confirm Password')); ?>" autocomplete="new-password">
                                    <!-- <div class="filter-tags ft-list">
                                        <input id="check-a2" type="checkbox" name="check">
                                        <label for="check-a2">I agree to the <a href="#">Privacy Policy</a></label>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="filter-tags ft-list">
                                        <input id="check-a" type="checkbox" name="check">
                                        <label for="check-a">I agree to the <a href="#">Terms and Conditions</a></label>
                                    </div> -->
                                    <div class="clearfix"></div>
                                    <button type="submit" class="btn float-btn color2-bg"><?php echo (lang('Register')); ?><i class="fas fa-caret-right"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!--tab end -->
                </div>
                <!--tabs end -->
                <div class="log-separator fl-wrap"><span>or</span></div>
                <div class="soc-log fl-wrap">
                    <p>
                        <?php echo (lang('FOR_FAST_LOGIN')); ?>
                    </p>
                    <a href="<?php echo $this->facebook->login_url(); ?>" class="facebook-log"> Facebook</a>
                </div>
                <div class="soc-log fl-wrap">
                    <p><?php echo (lang('FOR_FAST_LOGIN')); ?></p>
                    <a href="<?php echo $this->googleplus->loginURL(); ?>" class="facebook-log"> Google</a>
                </div>
                <div class="wave-bg">
                    <div class='wave -one'></div>
                    <div class='wave -two'></div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--register form end -->
<a class="to-top"><i class="fas fa-caret-up"></i></a>
</div>
<!-- Main end -->
<!--=============== scripts  ===============-->
<script src="<?php echo base_url(); ?>assets/website/js/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>assets/website/js/plugins.js"></script>
<script src="<?php echo base_url(); ?>assets/website/js/scripts.js"></script>
<!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBgB_nChuRAOTHaINp67o1H7CHoC5bP1uk&amp;libraries=places&amp;callback=initAutocomplete"></script> -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBT127pXDxsaFzKaG7zNFK8NXQGesUobJA&libraries=places&callback=initAutocomplete"></script>
<script src="<?php echo base_url(); ?>assets/website/js/map-single.js"></script>

<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>
<!-- <script src="assets/website/js/map-listing.js"></script> -->
<script src="<?php echo base_url(); ?>assets/website/rtl/js/map-listing.js"></script>
<script src="<?php echo base_url(); ?>assets/website/js/map-plugins.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script type="text/javascript">
    $('input.typeahead').typeahead({
        source: function(query, process) {
            return $.get('<?php echo base_url() ?>autocomplete_uni', {
                query: query
            }, function(data) {
                //console.log(data);
                data = $.parseJSON(data);
                console.log(data);
                return process(data);
            });
        }
    });
</script>
<script type="text/javascript">
    $('input.agencyname').typeahead({
        source: function(query, process) {
            return $.get('<?php echo base_url() ?>autocomplete_agency', {
                query: query
            }, function(data) {
                //console.log(data);
                data = $.parseJSON(data);
                console.log(data);
                return process(data);
            });
        }
    });
</script>

<script type="text/javascript">
    if ($("#registerform").length > 0) {
        $("#registerform").validate({
            errorClass: 'errors',
            rules: {
                name: {
                    required: true,
                    minlength: 3,
                },
                rnpassword: {
                    required: true,
                    equalTo: "#password",
                },
            },
            messages: {
                name: {
                    required: "Please enter name",
                    minlength: "The name should be greater than 3 characters"
                },
                rnpassword: {
                    required: 'Please enter Confirm password'
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
                        if (response.status == true) {
                            toastr.success(response.message, 'Success', {
                                timeOut: 3000
                            });

                            setTimeout(function() {
                                window.location = base_url;
                            }, 3000);
                        } else {
                            toastr.error(response.message, 'Error', {
                                timeOut: 3000
                            });
                        }

                    }
                });
            }
        })
    }
</script>
<script type="text/javascript">
    if ($("#universitysearch").length > 0) {
        $("#universitysearch").validate({

            submitHandler: function(form) {
                toastr.clear();
                let action = $('#universitysearch').attr('action-attr');
                var formData = new FormData(form);
                $.ajax({
                    url: "<?php echo base_url() ?>" + action,
                    type: "POST",
                    data: formData,
                    dataType: 'json',
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        if (response.status == true) {
                            toastr.success(response.message, 'Success', {
                                timeOut: 3000
                            });

                            setTimeout(function() {
                                window.location = base_url;
                            }, 3000);
                        } else {
                            toastr.error(response.message, 'Error', {
                                timeOut: 3000
                            });
                        }

                    }
                });
            }
        })
    }
</script>

<script type="text/javascript">
    if ($("#inquireyform").length > 0) {



        $("#inquireyform").validate({

            submitHandler: function(form) {


                toastr.clear();
                let action = $('#inquireyform').attr('action-attr');
                var formData = new FormData(form);
                $.ajax({
                    url: "<?php echo base_url() ?>" + action,
                    type: "POST",
                    data: formData,
                    dataType: 'json',
                    processData: false,
                    contentType: false,
                    success: function(response) {

                        if (response.status == true) {
                            toastr.success(response.message, 'Success', {
                                timeOut: 3000
                            });
                            // setTimeout(function(){
                            //  window.location = base_url; 
                            //  },3000);
                        } else {
                            toastr.error(response.message, 'Error', {
                                timeOut: 3000
                            });
                        }

                    }
                });
            }
        })
    }
</script>
<script type="text/javascript">
    // when page is ready
    $(document).ready(function() {
        // on form submit
        $('.add-more-check').on('click', function() {


            if ($(this).is(':checked')) {
                alert('1');
                $('#ss').append('<input type="hidden" id="tee" style="height: 11px !important;" class="hom-cre-acc-right1" name="input_value[]" value="1" />');
                $('#bee').remove();
                $('#set').remove();
            } else {
                alert('2');
                $('#ss').append('<input type="hidden" id = "bee" style="height: 11px !important;" class="hom-cre-acc-right1" name="input_value[]" value="0" />');
                $('#tee').remove();


            }


        })

        $('.add-more-radio').on('click', function() {


            if ($(this).is(':checked')) {
                alert('1');
                $('#ssradio').append('<input type="hidden" id="radiotee" style="height: 11px !important;" class="hom-cre-acc-right1" name="input_value[]" value="1" />');
                $('#radiobee').remove();
            } else {
                alert('2');
                $('#ssradio').append('<input type="hidden" id = "radiobee" style="height: 11px !important;" class="hom-cre-acc-right1" name="input_value[]" value="0" />');
                $('#radiotee').remove();
            }


        })



    })
</script>

<script type="text/javascript">
    if ($("#add-comment").length > 0) {
        $("#add-comment").validate({

            submitHandler: function(form) {
                toastr.clear();
                let action = $('#add-comment').attr('action-attr');
                var formData = new FormData(form);
                $.ajax({
                    url: "<?php echo base_url() ?>" + action,
                    type: "POST",
                    data: formData,
                    dataType: 'json',
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        if (response.status == true) {
                            toastr.success(response.message, 'Success', {
                                timeOut: 3000
                            });
                            setTimeout(function() {
                                window.location.reload();
                            }, 2000);

                        } else {
                            toastr.error(response.message, 'Error', {
                                timeOut: 3000
                            });
                        }

                    }
                });
            }
        })
    }
</script>


<script type="text/javascript">
    var base_url = "<?php echo base_url() ?>"; // Base url
    if ($("#user-login-form").length > 0) {
        $("#user-login-form").validate({
            // Rules for form validation
            rules: {
                email: {
                    required: true,
                    email: true
                },
                npassword: {
                    required: true,
                    minlength: 2,
                    maxlength: 15,
                },
            },
            messages: {
                email: {
                    required: 'Please enter your email address',
                    email: 'Please enter a valid email address'
                },
                npassword: {
                    required: 'Please enter passsword',
                    minlength: "Password should have minimum 2 characters.",
                    maxlength: "Password should have Maxlength 15 characters.",
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
                    processData: false,
                    contentType: false,
                    success: function(response) {

                        toastr.success(response.message, 'Success', {
                            timeOut: 3000
                        });

                        setTimeout(function() {
                            location.reload();
                        }, 2500);

                    }
                });
            }
        })
    }
</script>

<script type="text/javascript">
    var base_url = "<?php echo base_url() ?>"; // Base url
    if ($("#edit_profile_user").length > 0) {
        $("#edit_profile_user").validate({
            // Rules for form validation
            rules: {
                user_email: {
                    required: true,
                    email: true
                },


            },
            messages: {
                email: {
                    required: 'Please enter your email address',
                    email: 'Please enter a valid email address'
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
                    success: function(res) {

                        if (res.status == true) {
                            toastr.success(res.message, 'Success', {
                                timeOut: 3000
                            });
                            window.location.reload();
                            // setTimeout(function(){ window.location = base_url+res.url; },4000);
                        } else {
                            toastr.error(res.message, 'Alert!', {
                                timeOut: 3000
                            });
                        }
                    }
                });
            }
        })
    }
</script>

<script type="text/javascript">
    var base_url = "<?php echo base_url() ?>";
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
                cpassword: {
                    required: true,
                    equalTo: "#npassword",
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
                cpassword: {
                    required: 'Please enter Confirm password'
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
                        if (response.status == true) {
                            console.log(base_url + response.url);
                            toastr.success(response.message, 'Success', {
                                timeOut: 3000
                            });
                            setTimeout(function() {
                                window.location = base_url + response.url;
                            }, 3000);
                        } else {
                            toastr.error(response.message, 'Error', {
                                timeOut: 3000
                            });
                        }

                    }
                });
            }
        })
    }
</script>

<script type="text/javascript">
    var base_url = "<?php echo base_url() ?>";
    if ($("#smart-form-forgotpass").length > 0) {
        $("#smart-form-forgotpass").validate({
            errorClass: 'errors',
            rules: {
                email: {
                    required: true,
                    email: true
                },


            },
            messages: {
                email: {
                    required: "Please Enter Email",
                    email: 'Please enter a valid email address'
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
                        if (response.status == true) {
                            console.log(base_url + response.url);
                            toastr.success(response.message, 'Success', {
                                timeOut: 3000
                            });
                            setTimeout(function() {
                                window.location = base_url + response.url;
                            }, 3000);
                        } else {
                            toastr.error(response.message, 'Error', {
                                timeOut: 3000
                            });
                        }

                    }
                });
            }
        })
    }
</script>


<script type="text/javascript">
    var base_url = "<?php echo base_url() ?>";
    if ($("#user_forgot_newgepass").length > 0) {
        $("#user_forgot_newgepass").validate({
            errorClass: 'errors',
            rules: {

                npassword: {
                    required: true,

                },
                cpassword: {
                    required: true,
                    equalTo: "#npassword",
                },
            },
            messages: {

                npassword: {
                    required: "Please Enter New password"
                },
                cpassword: {
                    required: 'Please enter Confirm password'
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
                        if (response.status == true) {

                            toastr.success(response.message, 'Success', {
                                timeOut: 3000
                            });


                        } else {
                            toastr.error(response.message, 'Error', {
                                timeOut: 3000
                            });
                        }

                    }
                });
            }
        })
    }
</script>




<style type="text/css">
    .close-regs {
        position: absolute;
        top: 0;
        right: 0;
        width: 54px;
        height: 54px;
        line-height: 54px;
        cursor: pointer;
        z-index: 3;
        color: #fff;
        border-left: 1px solid rgba(255, 255, 255, 0.11);
        font-size: 18px;
    }
</style>
</body>

</html>