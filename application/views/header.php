<!DOCTYPE HTML>
<html lang="en" <?php if ($_SESSION['language'] == 'ar') { ?>dir="rtl"<?php }
?> >

<head>

    <meta charset="UTF-8">
    <title>plzconfirm.com</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="robots" content="index, follow" />
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <!--=============== css  ===============-->
    <?php
    if ($_SESSION['language'] == 'ar') { ?>
        <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/website/rtl/css/reset.css">
        <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/website/rtl/css/plugins.css">
        <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/website/rtl/css/style.css">
        <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/website/rtl/css/color.css">
        <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/website/rtl/css/dashboard-style.css">
    <?php
    } else {
    ?>
        <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/website/css/reset.css">
        <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/website/css/plugins.css">
        <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/website/css/style.css">
        <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/website/css/color.css">
        <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/website/css/dashboard-style.css">
    <?php
    }
    ?>


    <!--=============== favicons ===============-->
    <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/website/images/favicon.ico">
    <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">

    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
</head>

<body>
    <!--loader-->
    <div class="loader-wrap">
        <div class="loader-inner">
            <div class="loader-inner-cirle"></div>
        </div>
    </div>
    <!--loader end-->
    <!-- main start  -->
    <div id="main">
        <!-- header -->
        <header class="main-header dsh-header">
            <!-- logo-->
            <a style="margin-top: 6px;" href="<?php echo base_url(); ?>" class="logo-holder">
                <h2 style="color:#e7e8ea">plzconfirm.com</h2>
            </a>
            <!-- logo end-->
            <!-- header-search_btn-->
            <!-- <div class="header-search_btn show-search-button"><i class="fal fa-search"></i><span>Search</span></div> -->
            <!-- header-search_btn end-->
            <!-- header opt -->
            <!-- <a href="#" class="add-list color-bg">Add Listing <span><i class="fal fa-layer-plus"></i></span></a>
                <div class="cart-btn   show-header-modal" data-microtip-position="bottom" role="tooltip" aria-label="Your Wishlist"><i class="fal fa-heart"></i><span class="cart-counter green-bg"></span> </div> -->

            <?php
            if (isset($_SESSION['user_session']['user_id'])) {
                $a = $this->db->get_where('users', array('user_id' => $_SESSION['user_session']['user_id']))->result();
                if (empty($a[0]->user_login_type)) {

                    $image = 1;
                } else {
                    $image = 0;
                }

            ?>
                <!-- header opt end-->
                <div class="header-user-menu">
                    <div class="header-user-name">
                        <?php
                        if ($image == '1') {
                        ?>
                            <span><img src="<?php echo base_url('upload/' . $_SESSION['user_session']['user_img']); ?>" alt="" onerror="this.src='<?php echo base_url('upload/user_placeholder.png'); ?>'"></span>
                        <?php
                        } else {
                        ?>
                            <span><img src="<?php echo $_SESSION['user_session']['user_img']; ?>" alt="" onerror="this.src='<?php echo base_url('upload/user_placeholder.png'); ?>'"></span>
                        <?php
                        }
                        ?>

                        <?php echo $_SESSION['user_session']['user_name']  ?>
                    </div>
                    <ul>
                        <li><a href="<?php echo base_url('user_profile'); ?>"><?php echo (lang('Edit profile')); ?></a></li>
                        <!-- <li><a href="#"> Add Listing</a></li>
                                <li><a href="#">  Bookings  </a></li>
                                <li><a href="#"> Reviews </a></li> -->
                        <li><a href="user_logout"><?php echo (lang('Log Out')); ?></a></li>
                    </ul>
                </div>

            <?php } else { ?>
                <div class="show-reg-form modal-open avatar-img" data-srcav="<?php echo base_url('assets/website/images/avatar/3.jpg'); ?>"><i class="fal fa-user"></i>
                    <?php echo (lang('SIGN IN')); ?></div>
            <?php }
            ?>


            <style type="text/css">
                .translated-ltr {
                    margin-top: -40px;
                }

                .translated-ltr {
                    margin-top: -40px;
                }

                .goog-te-banner-frame {
                    display: none;
                    margin-top: -20px;
                }

                .goog-logo-link {
                    display: none !important;
                }

                .goog-te-gadget {
                    color: transparent !important;
                }

                option {
                    color: #000;
                }

                select.goog-te-combo {
                    border-radius: 17px;
                    background: #f0f8ff24;
                    color: #fff;
                    margin: 6px 13px 0 0 !important;
                    padding: 5px 9px 5px 13px;
                }

                }
            </style>
            <!-- lang-wrap-->
            <!-- <div class="lang-wrap">
                    <div id="google_translate_element"></div>
                </div> -->

            <div class="lang-wrap">
                <div class="show-lang"><span><i class="fal fa-globe-europe"></i><strong>En</strong></span><i class="fa fa-caret-down arrlan"></i></div>
                <ul class="lang-tooltip lang-action no-list-style">
                    <li><a href="#" class="<?php
                                            if ($_SESSION['language'] == 'en') {
                                                echo 'current-lan';
                                            }
                                            ?> " onclick="theFunction();">English</a></li>
                    <li><a href="#" class="languageid <?php
                                                        if ($_SESSION['language'] == 'ar') {
                                                            echo 'current-lan';
                                                        }
                                                        ?>" onclick="theFunction();">Arabic</a></li>
                </ul>
            </div>

            <!-- <ul class="lang-tooltip lang-action no-list-style" >
                       
                    </ul>-->


            <!-- nav-button-wrap-->
            <div class="nav-button-wrap color-bg">
                <div class="nav-button">
                    <span></span><span></span><span></span>
                </div>
            </div>
            <!-- nav-button-wrap end-->
            <!--  navigation -->
            <div class="nav-holder main-menu">
                <nav>
                    <ul class="no-list-style">
                        <!-- <li> -->

                        <li><a href="Home"><?php echo (lang('HOME')); ?></a></li>
                        <li><a href="about-us"> <?php echo (lang('ABOUT_US')); ?></a></li>
                        <li><a href="services"><?php echo (lang('SERVICES')); ?></a></li>
                        <!-- <li><a href="faq">FAQ</a></li> -->
                        <li><a href="contact-us"><?php echo (lang('CONTACT_US')); ?></a></li>
                        <!--second level -->
                        <!-- <ul>
                                    <li><a href="#">Parallax Image</a></li>
                                    <li><a href="#">Slider</a></li>
                                    <li><a href="#">Slideshow</a></li>
                                    <li><a href="#">Video</a></li>
                                    <li><a href="#">Map</a></li>
                                    <li><a href="#" target="_blank">RTL Version</a></li>
                                </ul> -->
                        <!--second level end-->
                        <!-- </li> -->
                        <!-- <li>
                                <a href="#">Listings <i class="fa fa-caret-down"></i></a> -->
                        <!--second level -->
                        <!-- <ul> -->
                        <!-- <li><a href="#">Column map</a></li>
                                    <li><a href="#">Column map 2</a></li>
                                    <li><a href="#">Fullwidth Map</a></li>
                                    <li><a href="#">Fullwidth Map 2</a></li>
                                    <li><a href="#">Without Map</a></li>
                                    <li><a href="#">Without Map 2</a></li>
                                    <li>
                                        <a href="#">Single <i class="fa fa-caret-down"></i></a> -->
                        <!--third  level  -->
                        <!-- <ul>
                                            <li><a href="#">Style 1</a></li>
                                            <li><a href="#">Style 2</a></li>
                                            <li><a href="#">Style 3</a></li>
                                            <li><a href="#">Style 4</a></li>
                                        </ul> -->
                        <!--third  level end-->
                        <!-- </li>
                                </ul> -->
                        <!--second level end-->
                        <!-- </li> -->
                        <!-- <li>
                                <a href="blog.html">News</a>
                            </li> -->
                        <!-- <li>
                                <a href="#" class="act-link">Pages <i class="fa fa-caret-down"></i></a> -->
                        <!--second level -->
                        <!-- <ul>
                                    <li>
                                        <a href="#">Shop<i class="fa fa-caret-down"></i></a> -->
                        <!--third  level  -->
                        <!-- <ul>
                                            <li><a href="#">Products</a></li>
                                            <li><a href="#">Product single</a></li>
                                            <li><a href="#">Cart</a></li>
                                        </ul> -->
                        <!--third  level end-->
                        <!-- </li>
                                    <li><a href="#">About</a></li>
                                    <li><a href="#">Contacts</a></li>
                                    <li><a href="#">User single</a></li>
                                    <li><a href="#">How it Works</a></li>
                                    <li><a href="#">Booking</a></li>
                                    <li><a href="#">Pricing</a></li>
                                    <li><a href="#">User Dasboard</a></li>
                                    <li><a href="#">Blog Single</a></li>
                                    <li><a href="#">Add Listing</a></li>
                                    <li><a href="#">Invoice</a></li>
                                    <li><a href="#">login Sign</a></li>
                                    <li><a href="#">404</a></li> -->
                        <!-- </ul> -->
                        <!--second level end-->
                        <!-- </li> -->
                    </ul>
                </nav>
            </div>
            <!-- navigation  end -->
            <!-- header-search_container -->
            <div class="header-search_container header-search vis-search">
                <div class="container small-container">
                    <div class="header-search-input-wrap fl-wrap">
                        <!-- header-search-input -->
                        <div class="header-search-input">
                            <label><i class="fal fa-keyboard"></i></label>
                            <input type="text" placeholder="What are you looking for ?" value="" />
                        </div>
                        <!-- header-search-input end -->
                        <!-- header-search-input -->
                        <div class="header-search-input location autocomplete-container">
                            <label><i class="fal fa-map-marker"></i></label>
                            <input type="text" placeholder="<?php echo (lang('LOCATION')); ?>" class="autocomplete-input" id="autocompleteid2" value="" />
                            <a href="#"><i class="fal fa-dot-circle"></i></a>
                        </div>
                        <!-- header-search-input end -->
                        <!-- header-search-input -->
                        <div class="header-search-input header-search_selectinpt ">
                            <select data-placeholder="Category" class="chosen-select no-radius">
                                <option>All Categories</option>
                                <option>All Categories</option>
                                <option>Shops</option>
                                <option>Hotels</option>
                                <option>Restaurants</option>
                                <option>Fitness</option>
                                <option>Events</option>
                            </select>
                        </div>
                        <!-- header-search-input end -->
                        <button class="header-search-button green-bg" onclick="window.location.href='#'"><i class="far fa-search"></i> <?php echo (lang('SEARCH')); ?> </button>
                    </div>
                    <div class="header-search_close color-bg"><i class="fal fa-long-arrow-up"></i></div>
                </div>
            </div>
            <!-- header-search_container  end -->
            <!-- wishlist-wrap-->
            <div class="header-modal novis_wishlist">
                <!-- header-modal-container-->
                <div class="header-modal-container scrollbar-inner fl-wrap" data-simplebar>
                    <!--widget-posts-->
                    <div class="widget-posts  fl-wrap">
                        <ul class="no-list-style">
                            <li>
                                <div class="widget-posts-img"><a href="#"><img src="images/gallery/thumbnail/1.png" alt=""></a>
                                </div>
                                <div class="widget-posts-descr">
                                    <h4><a href="#">Iconic Cafe</a></h4>
                                    <div class="geodir-category-location fl-wrap"><a href="#"><i class="fas fa-map-marker-alt"></i> 40 Journal Square Plaza, NJ, USA</a></div>
                                    <div class="widget-posts-descr-link"><a href="#">Restaurants </a> <a href="listing.html">Cafe</a></div>
                                    <div class="widget-posts-descr-score">4.1</div>
                                    <div class="clear-wishlist"><i class="fal fa-times-circle"></i></div>
                                </div>
                            </li>
                            <li>
                                <div class="widget-posts-img"><a href="#"><img src="images/gallery/thumbnail/2.png" alt=""></a>
                                </div>
                                <div class="widget-posts-descr">
                                    <h4><a href="#">MontePlaza Hotel</a></h4>
                                    <div class="geodir-category-location fl-wrap"><a href="#"><i class="fas fa-map-marker-alt"></i> 70 Bright St New York, USA </a></div>
                                    <div class="widget-posts-descr-link"><a href="listing.html">Hotels </a> </div>
                                    <div class="widget-posts-descr-score">5.0</div>
                                    <div class="clear-wishlist"><i class="fal fa-times-circle"></i></div>
                                </div>
                            </li>
                            <li>
                                <div class="widget-posts-img"><a href="listing-single.html"><img src="images/gallery/thumbnail/3.png" alt=""></a>
                                </div>
                                <div class="widget-posts-descr">
                                    <h4><a href="listing-single.html">Rocko Band in Marquee Club</a></h4>
                                    <div class="geodir-category-location fl-wrap"><a href="#"><i class="fas fa-map-marker-alt"></i>75 Prince St, NY, USA</a></div>
                                    <div class="widget-posts-descr-link"><a href="listing.html">Events</a> </div>
                                    <div class="widget-posts-descr-score">4.2</div>
                                    <div class="clear-wishlist"><i class="fal fa-times-circle"></i></div>
                                </div>
                            </li>
                            <li>
                                <div class="widget-posts-img"><a href="listing-single.html"><img src="images/gallery/thumbnail/4.png" alt=""></a>
                                </div>
                                <div class="widget-posts-descr">
                                    <h4><a href="listing-single.html">Premium Fitness Gym</a></h4>
                                    <div class="geodir-category-location fl-wrap"><a href="#"><i class="fas fa-map-marker-alt"></i> W 85th St, New York, USA</a></div>
                                    <div class="widget-posts-descr-link"><a href="listing.html">Fitness</a> <a href="listing.html">Gym</a> </div>
                                    <div class="widget-posts-descr-score">5.0</div>
                                    <div class="clear-wishlist"><i class="fal fa-times-circle"></i></div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <!-- widget-posts end-->
                </div>
                <!-- header-modal-container end-->
                <div class="header-modal-top fl-wrap">
                    <h4>Your Wishlist : <span><strong></strong> Locations</span></h4>
                    <div class="close-header-modal"><i class="far fa-times"></i></div>
                </div>
            </div>
            <!--wishlist-wrap end -->
        </header>
        <!-- header end-->

        <script>
            function theFunction() {
                $.ajax({
                    url: "<?php echo base_url() ?>changeLanguage",
                    type: "GET",
                    success: function(response) {
                        toastr.success('Language changed successfull', 'Success', {
                            timeOut: 3000
                        });
                        setTimeout(function() {
                            location.reload();
                        }, 2500);
                    },
                });
            }
        </script>

        <script type="text/javascript">
            var base_url = "<?php echo base_url() ?>";
            if ($('#user_forgot_newgepass').length > 0) {
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
                                    console.log(base_url + response.url);
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