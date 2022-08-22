<?php

include('header.php');

$this->db->select('AVG(rat_rating) as average');
$this->db->where('rat_university_id', $university['un_id']);
$this->db->from('rating');
$query = $this->db->get()->row();
// echo"<pre>";
// print_r($query->average);
// die;
?>
<?php
if ($university['category'] == '2') {
?>
    <!-- wrapper-->
    <div id="wrapper">
        <!-- content-->
        <div class="content">
            <section class="listing-hero-section hidden-section" data-scrollax-parent="true" id="sec1">
                <div class="bg-parallax-wrap">
                    <div class="bg par-elem " data-bg="upload/<?php echo $university['un_media'] ?>" data-scrollax="properties: { translateY: '30%' }"></div>
                    <div class="overlay"></div>
                </div>
                <div class="container">
                    <div class="list-single-header-item  fl-wrap">
                        <div class="row">
                            <div class="col-md-9">
                                <h1><?php echo $university['un_name'] ?><span class="verified-badge"><i class="fal fa-check"></i></span></h1>
                                <div class="geodir-category-location fl-wrap"><a href="#"><i class="fas fa-map-marker-alt"></i><?php echo $university['un_address'] ?></a> <a href="#"> <i class="fal fa-phone"></i><?php echo $university['un_contactno'] ?></a> <a href="#"><i class="fal fa-envelope"></i><?php echo $university['un_email'] ?></a></div>
                            </div>
                            <div class="col-md-3">
                                <a class="fl-wrap list-single-header-column custom-scroll-link " href="#sec5">
                                    <div class="listing-rating-count-wrap single-list-count">
                                        <div class="review-score"><?php echo floatval($query->average) ?></div>
                                        <div class="listing-rating card-popup-rainingvis" data-starrating2="<?php echo $query->average ?>"></div>
                                        <br>
                                        <div class="reviews-count"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="list-single-header_bottom fl-wrap">
                        <a class="listing-item-category-wrap" href="#">
                            <div class="listing-item-category  red-bg"><i class="fas fa-graduation-cap"></i></div>
                            <span></span>
                        </a>
                        <!--  <div class="list-single-author"> <a href="author-single.html"><span class="author_avatar"> <img alt='' src='images/avatar/5.jpg'>  </span>By  Alisa Noory</a></div>
<div class="geodir_status_date gsd_open"><i class="fal fa-lock-open"></i>Open Now</div> -->
                        <div class="list-single-stats">
                            <ul class="no-list-style">
                                <!-- <li><span class="viewed-counter"><i class="fas fa-eye"></i> Viewed -  156 </span></li> -->
                                <!--  <li><span class="bookmark-counter"><i class="fas fa-heart"></i> Bookmark -  24 </span></li> -->
                            </ul>
                        </div>
                    </div>
                </div>
            </section>
            <!-- scroll-nav-wrapper-->
            <div class="scroll-nav-wrapper fl-wrap">
                <div class="container">
                    <nav class="scroll-nav scroll-init">
                        <ul class="no-list-style">
                            <li><a class="act-scrlink" href="#sec1"><i class="fal fa-images"></i> Top</a></li>
                            <li><a href="#sec2"><i class="fal fa-info"></i>Details</a></li>
                            <li><a href="#sec3"><i class="fal fa-image"></i>Gallery</a></li>
                            <!-- <li><a href="#sec4"><i class="fal fa-utensils"></i>Menu</a></li> -->
                            <li><a href="#sec5"><i class="fal fa-comments-alt"></i>Reviews</a></li>
                        </ul>
                    </nav>
                    <div class="scroll-nav-wrapper-opt">
                        <!-- <a href="#" class="scroll-nav-wrapper-opt-btn"> <i class="fas fa-heart"></i> Save </a>
<a href="#" class="scroll-nav-wrapper-opt-btn showshare"> <i class="fas fa-share"></i> Share </a> -->
                        <div class="share-holder hid-share">
                            <div class="share-container  isShare"></div>
                        </div>
                        <!-- <div class="show-more-snopt"><i class="fal fa-ellipsis-h"></i></div> -->
                        <!-- <div class="show-more-snopt-tooltip">
                            <a href="#"> <i class="fas fa-comment-alt"></i> Write a review</a>
                            <a href="#"> <i class="fas fa-flag-alt"></i> Report </a>
                        </div> -->
                    </div>
                </div>
            </div>
            <!-- scroll-nav-wrapper end-->
            <section class="gray-bg no-top-padding">
                <div class="container">
                    <!-- <div class="breadcrumbs inline-breadcrumbs fl-wrap">
                        <a href="#">Home</a><a href="#">Listings</a><a href="#">New York</a><span>Listing Single</span>
                    </div> -->
                    <div class="clearfix"></div>
                    <div class="row">
                        <!-- list-single-main-wrapper-col -->
                        <div class="col-md-8">
                            <!-- list-single-main-wrapper -->
                            <div class="list-single-main-wrapper fl-wrap" id="sec2">
                                <div class="list-single-main-media fl-wrap">
                                    <img src="images/all/48.jpg" class="respimg" alt="">
                                    <a href="https://vimeo.com/70851162" class="promo-link   image-popup"><i class="fal fa-video"></i><span>Promo Video</span></a>
                                </div>
                                <!-- list-single-main-item -->
                                <div class="list-single-main-item fl-wrap block_box">
                                    <div class="list-single-main-item-title">
                                        <h3>Description</h3>
                                    </div>
                                    <div class="list-single-main-item_content fl-wrap">
                                        <p><?php echo $university['un_description'] ?></p>

                                        <a href="#" class="btn color2-bg    float-btn">Visit Website<i class="fal fa-chevron-right"></i></a>
                                    </div>
                                </div>
                                <!-- list-single-main-item end -->
                                <!-- list-single-main-item -->
                                <div class="list-single-main-item fl-wrap block_box">
                                    <div class="list-single-main-item-title">
                                        <h3> Facility</h3>
                                    </div>
                                    <div class="list-single-main-item_content fl-wrap">
                                        <div class="listing-features fl-wrap">
                                            <ul class="no-list-style">
                                                <?php
                                                $customday = explode(",", $university['un_facility']);
                                                if (in_array("1", $customday)) {
                                                ?>
                                                    <li><a href="#"><i class="fas fa-hotel"></i>UNIVERSITY HOSTEL</a></li>
                                                <?php
                                                }
                                                if (in_array("2", $customday)) {
                                                ?>
                                                    <li><a href="#"><i class="far fa-bus"></i>TRANSPORT FACILITY</a></li>
                                                <?php
                                                }
                                                if (in_array("3", $customday)) {
                                                ?>
                                                    <li><a href="#"><i class="fas fa-coffee"></i>CAFETERIA</a></li>
                                                <?php
                                                }
                                                if (in_array("4", $customday)) {
                                                ?>
                                                    <li><a href="#"><i class="fas fa-utensils-alt"></i>UNIVERSITY CANTEEN</a></li>
                                                <?php
                                                }
                                                if (in_array("4", $customday)) {
                                                ?>
                                                    <li><a href="#"><i class="fa fa-wifi"></i>INTERNET CENTRE</a></li>
                                                <?php
                                                }
                                                ?>

                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- list-single-main-item end -->
                                <!-- list-single-main-item-->
                                <div class="list-single-main-item fl-wrap block_box" id="sec3">
                                    <div class="list-single-main-item-title">
                                        <h3>Gallery / Photos</h3>
                                    </div>
                                    <div class="list-single-main-item_content fl-wrap">
                                        <div class="single-carousel-wrap fl-wrap lightgallery">
                                            <div class="sc-next sc-btn color2-bg"><i class="fas fa-caret-right"></i></div>
                                            <div class="sc-prev sc-btn color2-bg"><i class="fas fa-caret-left"></i></div>
                                            <div class="single-carousel fl-wrap full-height">
                                                <div class="swiper-container">
                                                    <div class="swiper-wrapper">

                                                        <?php
                                                        foreach ($university_gallary as $gallary) {
                                                        ?>

                                                            <!-- swiper-slide-->
                                                            <div class="swiper-slide">
                                                                <div class="box-item">
                                                                    <img src="upload/preview/<?php echo $gallary->file_name ?>" alt="">
                                                                    <a href="upload/preview/<?php echo $gallary->file_name ?>" class="gal-link popup-image"><i class="fa fa-search"></i></a>
                                                                </div>
                                                            </div>
                                                            <!-- swiper-slide end-->

                                                        <?php
                                                        }
                                                        ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- list-single-main-item end -->
                                <!-- list-single-facts -->
                                <div class="list-single-facts fl-wrap">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <!-- inline-facts -->
                                            <div class="inline-facts-wrap gradient-bg ">
                                                <div class="inline-facts">
                                                    <i class="fal fa-smile-plus"></i>
                                                    <div class="milestone-counter">
                                                        <div class="stats animaper">
                                                            <div class="num" data-content="0" data-num="<?php echo $university['un_teaching_staff'] ?>">0</div>
                                                        </div>
                                                    </div>
                                                    <h6>Total Faculty</h6>
                                                </div>
                                                <div class="stat-wave">
                                                    <svg viewbox="0 0 100 25">
                                                        <path fill="#fff" d="M0 30 V12 Q30 17 55 2 T100 11 V30z" />
                                                    </svg>
                                                </div>
                                            </div>
                                            <!-- inline-facts end -->
                                        </div>
                                        <div class="col-md-4">
                                            <!-- inline-facts  -->
                                            <div class="inline-facts-wrap gradient-bg ">
                                                <div class="inline-facts">
                                                    <i class="fal fa-users"></i>
                                                    <div class="milestone-counter">
                                                        <div class="stats animaper">
                                                            <div class="num" data-content="0" data-num="<?php echo $university['un_student'] ?>">0</div>
                                                        </div>
                                                    </div>
                                                    <h6>Total student</h6>
                                                </div>
                                                <div class="stat-wave">
                                                    <svg viewbox="0 0 100 25">
                                                        <path fill="#fff" d="M0 30 V12 Q30 17 55 12 T100 11 V30z" />
                                                    </svg>
                                                </div>
                                            </div>
                                            <!-- inline-facts end -->
                                        </div>
                                        <div class="col-md-4">
                                            <!-- inline-facts  -->
                                            <div class="inline-facts-wrap gradient-bg ">
                                                <div class="inline-facts">
                                                    <i class="fal fa-award"></i>
                                                    <div class="milestone-counter">
                                                        <div class="stats animaper">
                                                            <div class="num" data-content="0" data-num="<?php echo $university['un_award'] ?>">0</div>
                                                        </div>
                                                    </div>
                                                    <h6>Won Awards</h6>
                                                </div>
                                                <div class="stat-wave">
                                                    <svg viewbox="0 0 100 25">
                                                        <path fill="#fff" d="M0 30 V12 Q30 12 55 5 T100 11 V30z" />
                                                    </svg>
                                                </div>
                                            </div>
                                            <!-- inline-facts end -->
                                        </div>
                                    </div>
                                </div>
                                <!-- list-single-facts end -->
                                <!-- list-single-main-item-->

                                <!-- list-single-main-item end -->
                                <!-- list-single-main-item -->
                                <div class="list-single-main-item fl-wrap block_box" id="sec5">
                                    <div class="list-single-main-item-title">
                                        <h3> Reviews <span> </span></h3>
                                    </div>
                                    <!--reviews-score-wrap-->
                                    <div class="reviews-score-wrap fl-wrap">

                                    </div>
                                    <!-- reviews-score-wrap end -->
                                    <div class="list-single-main-item_content fl-wrap">
                                        <div class="reviews-comments-wrap">
                                            <!-- reviews-comments-item -->
                                            <?php
                                            foreach ($rating as $key => $value_rat) {

                                                $this->db->where('user_id', $value_rat->rat_userid);
                                                $rat_user = $this->db->get('users')->result();
                                            ?>
                                                <div class="reviews-comments-item">
                                                    <div class="review-comments-avatar">
                                                        <img src="upload/<?php echo $rat_user[0]->user_img ?>" onerror="this.src='upload/user_placeholder.png'">
                                                    </div>
                                                    <div class="reviews-comments-item-text fl-wrap">
                                                        <div class="reviews-comments-header fl-wrap">

                                                            <h4><a href="#"><?php echo $rat_user[0]->user_name ?></a></h4>
                                                            <div class="review-score-user">
                                                                <!-- <span class="review-score-user_item">4.2</span> -->
                                                                <div class="listing-rating card-popup-rainingvis" data-starrating2="<?php echo $value_rat->rat_rating ?>"></div>
                                                            </div>
                                                        </div>
                                                        <p><?php echo $value_rat->rat_comment ?></p>
                                                        <div class="reviews-comments-item-footer fl-wrap">
                                                            <?php

                                                            $date1 = date_create($value_rat->rat_createdate);
                                                            $date =  date_format($date1, "Y M d");
                                                            ?>
                                                            <div class="reviews-comments-item-date"><span><i class="far fa-calendar-check"></i><?php echo $date ?></span></div>
                                                            <!--  <a href="#" class="rate-review"><i class="fal fa-thumbs-up"></i>  Helpful Review  <span>2</span> </a> -->
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php
                                            }
                                            ?>
                                            <!--reviews-comments-item end-->

                                        </div>
                                    </div>
                                </div>
                                <!-- list-single-main-item end -->
                                <!-- list-single-main-item -->
                                <div class="list-single-main-item fl-wrap block_box" id="sec6">
                                    <div class="list-single-main-item-title fl-wrap">
                                        <h3>Add Review</h3>
                                    </div>
                                    <style type="text/css">
                                        /* component */

                                        .star-rating {
                                            /*border:solid 1px #ccc;*/
                                            display: flex;
                                            flex-direction: row-reverse;
                                            font-size: 1.5em;
                                            justify-content: space-around;
                                            padding: 9px .2em;
                                            text-align: center;
                                            width: 11em;
                                        }

                                        .star-rating input {
                                            display: none;
                                        }

                                        .star-rating label {
                                            color: #ccc;
                                            font-size: 40px;
                                            cursor: pointer;
                                        }

                                        .star-rating :checked~label {
                                            color: #f90;
                                        }

                                        .star-rating label:hover,
                                        .star-rating label:hover~label {
                                            color: #fc0;
                                        }

                                        /* explanation */

                                        article {
                                            background-color: #ffe;
                                            box-shadow: 0 0 1em 1px rgba(0, 0, 0, .25);
                                            color: #006;
                                            font-family: cursive;
                                            font-style: italic;
                                            margin: 4em;
                                            max-width: 30em;
                                            padding: 2em;
                                        }
                                    </style>
                                    <!-- Add Review Box -->
                                    <div id="add-review" class="add-review-box">
                                        <!-- Review Comment -->
                                        <form id="add-comment" class="add-comment  custom-form" action-attr="addcomment" action="javascript:void(0)">

                                            <fieldset>




                                                <div class="list-single-main-item_content fl-wrap">
                                                    <div class="listsearch-input-item fl-wrap">

                                                        <div class="star-rating">
                                                            <input type="radio" id="5-stars" name="rat_rating" value="5" />
                                                            <label for="5-stars" class="star">&#9733;</label>
                                                            <input type="radio" id="4-stars" name="rat_rating" value="4" />
                                                            <label for="4-stars" class="star">&#9733;</label>
                                                            <input type="radio" id="3-stars" name="rat_rating" value="3" />
                                                            <label for="3-stars" class="star">&#9733;</label>
                                                            <input type="radio" id="2-stars" name="rat_rating" value="2" />
                                                            <label for="2-stars" class="star">&#9733;</label>
                                                            <input type="radio" id="1-star" name="rat_rating" value="1" />
                                                            <label for="1-star" class="star">&#9733;</label>
                                                        </div>
                                                    </div>
                                                    <textarea cols="40" rows="3" name="rat_comment" required placeholder="Your Review:"></textarea>
                                                    <label id="rat_comment-error" class="error" style="color: red;" for="rat_comment"></label>
                                                    <div class="clearfix"></div>

                                                    <input type="hidden" name="rat_university_id" value="<?php echo $university['un_id'] ?>">
                                                    <input type="hidden" name="rat_userid" value="<?php
                                                                                                    if (isset($_SESSION['user_session']['user_id'])) {
                                                                                                        echo $_SESSION['user_session']['user_id'];
                                                                                                    }
                                                                                                    ?>">
                                                    <div class="clearfix"></div>
                                                    <button class="btn  color2-bg  float-btn">Submit Review <i class="fal fa-paper-plane"></i></button>
                                                </div>
                                            </fieldset>
                                        </form>
                                    </div>
                                    <!-- Add Review Box / End -->
                                </div>
                                <!-- list-single-main-item end -->
                            </div>
                        </div>
                        <!-- list-single-main-wrapper-col end -->
                        <!-- list-single-sidebar -->
                        <div class="col-md-4">
                            <div class="list-single-main-item_content fl-wrap">
                            <a href="Apply_from?id=<?php echo $university['category'];?>&&un_id=<?php echo $university['un_id'];?>&&formcat_id=<?php echo $university['sub_category'];?>" class="btn color2-bg    float-btn">Apply  Form<i class="fal fa-chevron-right"></i></a>
                          
                               </div>
                            <!--box-widget-item end -->
                            <!--box-widget-item -->
                            <!-- <div class="box-widget-item fl-wrap block_box">
                                <div class="box-widget-item-header">
                                    <h3>University Inquiry Form</h3>
                                </div>
                                <div class="box-widget">
                                    <div class="box-widget-content">
                                        <form id="inquireyform" action-attr="action_addinquirey" action="javascript:void(0)" method="post" enctype="multipart/form-data" class="add-comment custom-form">
                                            <label>University Name<span>*</span> </label>
                                            <input name="in_categories" readonly="" value="<?php echo $university['un_name'] ?>" type="text" value="">
                                            <label>Message<span>*</span></label>
                                            <textarea name="in_message" type="text" value=""></textarea>
                                            <input type="hidden" name="in_userid" value="<?php
                                                                                            if (isset($_SESSION['user_session']['user_id'])) {
                                                                                                echo $_SESSION['user_session']['user_id'];
                                                                                            }
                                                                                            ?>">
                                            <input type="hidden" name="in_universityid" value="<?php echo $university['un_id'] ?>">
                                            <button type="submit" class="btn float-btn color2-bg">Submit<i class="fas fa-caret-right"></i></button>
                                        </form>
                                    </div>
                                </div>
                            </div> -->
                            <!--box-widget-item end -->
                            <!--box-widget-item -->
                            <div class="box-widget-item fl-wrap block_box">
                                <div class="box-widget-item-header">
                                    <h3>Location / Contacts </h3>
                                </div>
                                <div class="box-widget">
                                    <div class="map-container">
                                        <div id="singleMap" data-latitude="<?php echo $university['un_latitude'] ?>" data-longitude="<?php echo $university['un_longitude'] ?>" data-mapTitle="Our Location"></div>
                                    </div>
                                    <div class="box-widget-content bwc-nopad">
                                        <div class="list-author-widget-contacts list-item-widget-contacts bwc-padside">
                                            <ul class="no-list-style">
                                                <li><span><i class="fal fa-map-marker"></i> Adress :</span> <a href="#"><?php echo $university['un_address'] ?></a></li>
                                                <li><span><i class="fal fa-phone"></i> Phone :</span> <a href="#"><?php echo $university['un_contactno'] ?></a></li>
                                                <li><span><i class="fal fa-envelope"></i> Mail :</span> <a href="#"><?php echo $university['un_email'] ?></a></li>
                                                <!-- <li><span><i class="fal fa-browser"></i> Website :</span> <a href="#">themeforest.net</a></li> -->
                                            </ul>
                                        </div>
                                        <div class="list-widget-social bottom-bcw-box  fl-wrap">
                                            <ul class="no-list-style">
                                                <li><a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                                                <li><a href="#" target="_blank"><i class="fab fa-twitter"></i></a></li>
                                                <li><a href="#" target="_blank"><i class="fab fa-vk"></i></a></li>
                                                <li><a href="#" target="_blank"><i class="fab fa-instagram"></i></a></li>
                                            </ul>
                                            <!-- <div class="bottom-bcw-box_link"><a href="#" class="show-single-contactform tolt" data-microtip-position="top" data-tooltip="Write Message"><i class="fal fa-envelope"></i></a></div> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--box-widget-item end -->

                            <!--box-widget-item -->
                            <div class="box-widget-item fl-wrap block_box">
                                <div class="box-widget-item-header">
                                    <h3>Similar listings :</h3>
                                </div>
                                <div class="box-widget  fl-wrap">
                                    <div class="box-widget-content">
                                        <!--widget-posts-->
                                        <div class="widget-posts  fl-wrap">
                                            <ul class="no-list-style">
                                                <?php
                                                foreach ($similer_university as  $similer) {
                                                    $this->db->where('rat_university_id', $similer->un_id);
                                                    $rating =  $this->db->get('rating')->result();
                                                ?>
                                                    <li>
                                                        <div class="widget-posts-img"><a href="UniversitysingleDetail?id=<?php echo $similer->un_id ?>"><img src="upload/<?php echo $similer->un_media ?>" alt=""></a>
                                                        </div>
                                                        <div class="widget-posts-descr">
                                                            <h4><a href="UniversitysingleDetail?id=<?php echo $similer->un_id ?>"><?php echo $similer->un_name ?></a></h4>
                                                            <div class="geodir-category-location fl-wrap"><a href="UniversitysingleDetail?id=<?php echo $similer->un_id ?>"><i class="fas fa-map-marker-alt"></i><?php echo $similer->un_address ?></a></div>
                                                            <div class="widget-posts-descr-link"><a href="UniversitysingleDetail?id=<?php echo $similer->un_id ?>">University </a></div>

                                                            <?php
                                                            if (!empty($rating)) {
                                                            ?>
                                                                <div class="widget-posts-descr-score"><?php echo $rating[0]->rat_rating ?></div>
                                                            <?php
                                                            } else {
                                                            ?>
                                                                <div class="widget-posts-descr-score">0</div>
                                                            <?php
                                                            }
                                                            ?>
                                                        </div>
                                                    </li>

                                                <?php
                                                }
                                                ?>

                                            </ul>
                                        </div>
                                        <!-- widget-posts end-->
                                    </div>
                                </div>
                            </div>
                            <!--box-widget-item end -->
                            <!--box-widget-item -->

                            <!--box-widget-item end -->
                        </div>
                        <!-- list-single-sidebar end -->
                    </div>
                </div>
            </section>
            <div class="limit-box fl-wrap"></div>
        </div>
        <!--content end-->
    </div>

    <!-- wrapper end-->
<?php
}
?>
<!-- --------------------------------------------accomodation detail ------------------------------- -->
<?php
if ($university['category'] == '3') {
?>
    <!-- wrapper-->
    <div id="wrapper">
        <!-- content-->
        <div class="content">
            <section class="listing-hero-section hidden-section" data-scrollax-parent="true" id="sec1">
                <div class="bg-parallax-wrap">
                    <div class="bg par-elem " data-bg="upload/<?php echo $university['un_media'] ?>" data-scrollax="properties: { translateY: '30%' }"></div>
                    <div class="overlay"></div>
                </div>
                <div class="container">
                    <div class="list-single-header-item  fl-wrap">
                        <div class="row">
                            <div class="col-md-9">
                                <?php
                                $where_type = array('id' => $university['acc_room_type']);
                                $room_type = $this->Admin_model->getAll('acco_room_type', $where_type);
                                ?>
                                <h1><?php echo $room_type[0]->room_type  ?><span class="verified-badge"><i class="fal fa-check"></i></span></h1>


                                <div class="geodir-category-location fl-wrap"><a href="#"><i class="fas fa-map-marker-alt"></i><?php echo $university['un_address'] ?></a> <a href="#"> <i class="fal fa-phone"></i><?php echo $university['un_contactno'] ?></a> <a href="#"><i class="fal fa-envelope"></i><?php echo $university['un_email'] ?></a></div>
                            </div>

                            <div class="col-md-3">
                                <a class="fl-wrap list-single-header-column custom-scroll-link " href="#sec5">
                                    <div class="listing-rating-count-wrap single-list-count">
                                        <div class="review-score"><?php echo floatval($query->average) ?></div>
                                        <div class="listing-rating card-popup-rainingvis" data-starrating2="<?php echo $query->average ?>"></div>
                                        <br>
                                        <div class="reviews-count"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="list-single-header_bottom fl-wrap">
                        <a class="listing-item-category-wrap" href="#">
                            <div class="listing-item-category  red-bg"><i class="fas fa-dollar-sign"></i></div>
                            <span><?php
                            
                            $price =   $this->Admin_model->asDollars($university['acc_rent']);
                            echo $price;
                           ?></span>
                            <div><a href="#">
                                    <h1></h1>
                                </a></div>
                        </a>
                        <!--  <div class="list-single-author"> <a href="author-single.html"><span class="author_avatar"> <img alt='' src='images/avatar/5.jpg'>  </span>By  Alisa Noory</a></div>
<div class="geodir_status_date gsd_open"><i class="fal fa-lock-open"></i>Open Now</div> -->
                        <div class="list-single-stats">
                            <ul class="no-list-style">
                                <!-- <li><span class="viewed-counter"><i class="fas fa-eye"></i> Viewed -  156 </span></li> -->
                                <!--  <li><span class="bookmark-counter"><i class="fas fa-heart"></i> Bookmark -  24 </span></li> -->
                            </ul>
                        </div>
                    </div>
                </div>
            </section>
            <!-- scroll-nav-wrapper-->
            <div class="scroll-nav-wrapper fl-wrap">
                <div class="container">
                    <nav class="scroll-nav scroll-init">
                        <ul class="no-list-style">
                            <li><a class="act-scrlink" href="#sec1"><i class="fal fa-images"></i> Top</a></li>
                            <li><a href="#sec2"><i class="fal fa-info"></i>Details</a></li>
                            <li><a href="#sec3"><i class="fal fa-image"></i>Gallery</a></li>
                            <!-- <li><a href="#sec4"><i class="fal fa-utensils"></i>Menu</a></li> -->
                            <li><a href="#sec5"><i class="fal fa-comments-alt"></i>Reviews</a></li>
                        </ul>
                    </nav>
                    <div class="scroll-nav-wrapper-opt">
                        <!-- <a href="#" class="scroll-nav-wrapper-opt-btn"> <i class="fas fa-heart"></i> Save </a>
<a href="#" class="scroll-nav-wrapper-opt-btn showshare"> <i class="fas fa-share"></i> Share </a> -->
                        <div class="share-holder hid-share">
                            <div class="share-container  isShare"></div>
                        </div>
                        <!-- <div class="show-more-snopt"><i class="fal fa-ellipsis-h"></i></div>
                        <div class="show-more-snopt-tooltip">
                            <a href="#"> <i class="fas fa-comment-alt"></i> Write a review</a>
                            <a href="#"> <i class="fas fa-flag-alt"></i> Report </a>
                        </div> -->
                    </div>
                </div>
            </div>
            <!-- scroll-nav-wrapper end-->
            <section class="gray-bg no-top-padding">
                <div class="container">
                    <!-- <div class="breadcrumbs inline-breadcrumbs fl-wrap">
                        <a href="#">Home</a><a href="#">Listings</a><a href="#">New York</a><span>Listing Single</span>
                    </div> -->
                    <div class="clearfix"></div>
                    <div class="row">
                        <!-- list-single-main-wrapper-col -->
                        <div class="col-md-8">
                            <!-- list-single-main-wrapper -->
                            <div class="list-single-main-wrapper fl-wrap" id="sec2">
                                <div class="list-single-main-media fl-wrap">
                                    <img src="images/all/48.jpg" class="respimg" alt="">
                                    <a href="https://vimeo.com/70851162" class="promo-link   image-popup"><i class="fal fa-video"></i><span>Promo Video</span></a>
                                </div>
                                <!-- list-single-main-item -->
                                <div class="list-single-main-item fl-wrap block_box">
                                    <div class="list-single-main-item-title">
                                        <h3>Description</h3>
                                    </div>
                                    <div class="list-single-main-item_content fl-wrap">
                                        <p><?php echo $university['un_description'] ?></p>

                                        <a href="#" class="btn color2-bg    float-btn">Visit Website<i class="fal fa-chevron-right"></i></a>
                                    </div>
                                </div>
                                <!-- list-single-main-item end -->
                                <!-- list-single-main-item -->
                                <div class="list-single-main-item fl-wrap block_box">
                                    <div class="list-single-main-item-title">
                                        <h3>Facility</h3>
                                    </div>
                                    <div class="list-single-main-item_content fl-wrap">
                                        <div class="listing-features fl-wrap">
                                            <ul class="no-list-style">
                                                <?php
                                                $customday = explode(",", $university['un_facility']);
                                                if (in_array("6", $customday)) {
                                                ?>
                                                    <li><a href="#"><i class="fas fa-water"></i>Water</a></li>
                                                <?php
                                                }
                                                if (in_array("7", $customday)) {
                                                ?>
                                                    <li><a href="#"><i class="fas fa-lightbulb-on"></i>Light</a></li>
                                                <?php
                                                }
                                                if (in_array("8", $customday)) {
                                                ?>
                                                    <li><a href="#"><i class="fas fa-couch"></i>Furniture</a></li>
                                                <?php
                                                }
                                                if (in_array("3", $customday)) {
                                                ?>
                                                    <li><a href="#"><i class="fas fa-utensils-alt"></i>CAFETERIA</a></li>
                                                <?php
                                                }
                                                ?>


                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- list-single-main-item end -->
                                <!-- list-single-main-item-->
                                <div class="list-single-main-item fl-wrap block_box" id="sec3">
                                    <div class="list-single-main-item-title">
                                        <h3>Gallery / Photos</h3>
                                    </div>
                                    <div class="list-single-main-item_content fl-wrap">
                                        <div class="single-carousel-wrap fl-wrap lightgallery">
                                            <div class="sc-next sc-btn color2-bg"><i class="fas fa-caret-right"></i></div>
                                            <div class="sc-prev sc-btn color2-bg"><i class="fas fa-caret-left"></i></div>
                                            <div class="single-carousel fl-wrap full-height">
                                                <div class="swiper-container">
                                                    <div class="swiper-wrapper">

                                                        <?php
                                                        foreach ($university_gallary as $gallary) {
                                                        ?>

                                                            <!-- swiper-slide-->
                                                            <div class="swiper-slide">
                                                                <div class="box-item">
                                                                    <img src="upload/preview/<?php echo $gallary->file_name ?>" alt="">
                                                                    <a href="upload/preview/<?php echo $gallary->file_name ?>" class="gal-link popup-image"><i class="fa fa-search"></i></a>
                                                                </div>
                                                            </div>
                                                            <!-- swiper-slide end-->

                                                        <?php
                                                        }
                                                        ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- list-single-main-item end -->

                                <!-- list-single-main-item-->

                                <!-- list-single-main-item end -->
                                <!-- list-single-main-item -->
                                <div class="list-single-main-item fl-wrap block_box" id="sec5">
                                    <div class="list-single-main-item-title">
                                        <h3> Reviews <span> </span></h3>
                                    </div>
                                    <!--reviews-score-wrap-->
                                    <div class="reviews-score-wrap fl-wrap">

                                    </div>
                                    <!-- reviews-score-wrap end -->
                                    <div class="list-single-main-item_content fl-wrap">
                                        <div class="reviews-comments-wrap">
                                            <!-- reviews-comments-item -->
                                            <?php
                                            foreach ($rating as $key => $value_rat) {

                                                $this->db->where('user_id', $value_rat->rat_userid);
                                                $rat_user = $this->db->get('users')->result();
                                            ?>
                                                <div class="reviews-comments-item">
                                                    <div class="review-comments-avatar">
                                                        <img src="upload/<?php echo $rat_user[0]->user_img ?>" onerror="this.src='upload/user_placeholder.png'">
                                                    </div>
                                                    <div class="reviews-comments-item-text fl-wrap">
                                                        <div class="reviews-comments-header fl-wrap">

                                                            <h4><a href="#"><?php echo $rat_user[0]->user_name ?></a></h4>
                                                            <div class="review-score-user">
                                                                <!-- <span class="review-score-user_item">4.2</span> -->
                                                                <div class="listing-rating card-popup-rainingvis" data-starrating2="<?php echo $value_rat->rat_rating ?>"></div>
                                                            </div>
                                                        </div>
                                                        <p><?php echo $value_rat->rat_comment ?></p>
                                                        <div class="reviews-comments-item-footer fl-wrap">
                                                            <?php

                                                            $date1 = date_create($value_rat->rat_createdate);
                                                            $date =  date_format($date1, "Y M d");
                                                            ?>
                                                            <div class="reviews-comments-item-date"><span><i class="far fa-calendar-check"></i><?php echo $date ?></span></div>
                                                            <!--  <a href="#" class="rate-review"><i class="fal fa-thumbs-up"></i>  Helpful Review  <span>2</span> </a> -->
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php
                                            }
                                            ?>
                                            <!--reviews-comments-item end-->

                                        </div>
                                    </div>
                                </div>
                                <!-- list-single-main-item end -->
                                <!-- list-single-main-item -->
                                <div class="list-single-main-item fl-wrap block_box" id="sec6">
                                    <div class="list-single-main-item-title fl-wrap">
                                        <h3>Add Review</h3>
                                    </div>
                                    <style type="text/css">
                                        /* component */

                                        .star-rating {
                                            /*border:solid 1px #ccc;*/
                                            display: flex;
                                            flex-direction: row-reverse;
                                            font-size: 1.5em;
                                            justify-content: space-around;
                                            padding: 9px .2em;
                                            text-align: center;
                                            width: 11em;
                                        }

                                        .star-rating input {
                                            display: none;
                                        }

                                        .star-rating label {
                                            color: #ccc;
                                            font-size: 40px;
                                            cursor: pointer;
                                        }

                                        .star-rating :checked~label {
                                            color: #f90;
                                        }

                                        .star-rating label:hover,
                                        .star-rating label:hover~label {
                                            color: #fc0;
                                        }

                                        /* explanation */

                                        article {
                                            background-color: #ffe;
                                            box-shadow: 0 0 1em 1px rgba(0, 0, 0, .25);
                                            color: #006;
                                            font-family: cursive;
                                            font-style: italic;
                                            margin: 4em;
                                            max-width: 30em;
                                            padding: 2em;
                                        }
                                    </style>
                                    <!-- Add Review Box -->
                                    <div id="add-review" class="add-review-box">
                                        <!-- Review Comment -->
                                        <form id="add-comment" class="add-comment  custom-form" action-attr="addcomment" action="javascript:void(0)">

                                            <fieldset>




                                                <div class="list-single-main-item_content fl-wrap">
                                                    <div class="listsearch-input-item fl-wrap">

                                                        <div class="star-rating">
                                                            <input type="radio" id="5-stars" name="rat_rating" value="5" />
                                                            <label for="5-stars" class="star">&#9733;</label>
                                                            <input type="radio" id="4-stars" name="rat_rating" value="4" />
                                                            <label for="4-stars" class="star">&#9733;</label>
                                                            <input type="radio" id="3-stars" name="rat_rating" value="3" />
                                                            <label for="3-stars" class="star">&#9733;</label>
                                                            <input type="radio" id="2-stars" name="rat_rating" value="2" />
                                                            <label for="2-stars" class="star">&#9733;</label>
                                                            <input type="radio" id="1-star" name="rat_rating" value="1" />
                                                            <label for="1-star" class="star">&#9733;</label>
                                                        </div>
                                                    </div>
                                                    <textarea cols="40" rows="3" name="rat_comment" required placeholder="Your Review:"></textarea>
                                                    <label id="rat_comment-error" class="error" style="color: red;" for="rat_comment"></label>
                                                    <div class="clearfix"></div>

                                                    <input type="hidden" name="rat_university_id" value="<?php echo $university['un_id'] ?>">
                                                    <input type="hidden" name="rat_userid" value="<?php
                                                                                                    if (isset($_SESSION['user_session']['user_id'])) {
                                                                                                        echo $_SESSION['user_session']['user_id'];
                                                                                                    }
                                                                                                    ?>">
                                                    <div class="clearfix"></div>
                                                    <button class="btn  color2-bg  float-btn">Submit Review <i class="fal fa-paper-plane"></i></button>
                                                </div>
                                            </fieldset>
                                        </form>
                                    </div>
                                    <!-- Add Review Box / End -->
                                </div>
                                <!-- list-single-main-item end -->
                            </div>
                        </div>
                        <!-- list-single-main-wrapper-col end -->
                        <!-- list-single-sidebar -->
                        <div class="col-md-4">

                        <div class="list-single-main-item_content fl-wrap">
                            <a href="Apply_from?id=<?php echo $university['category'];?>&&un_id=<?php echo $university['un_id'];?>&&formcat_id=<?php echo $university['sub_category'];?>" class="btn color2-bg    float-btn"> Apply  Form<i class="fal fa-chevron-right"></i></a>
                          
                               </div>
                            <div class="box-widget-item fl-wrap block_box">
                                <div class="box-widget-item-header">
                                    <h3>Location / Contacts </h3>
                                </div>
                                <div class="box-widget">
                                    <div class="map-container">
                                        <div id="singleMap" data-latitude="<?php echo $university['un_latitude'] ?>" data-longitude="<?php echo $university['un_longitude'] ?>" data-mapTitle="Our Location"></div>
                                    </div>
                                    <div class="box-widget-content bwc-nopad">
                                        <div class="list-author-widget-contacts list-item-widget-contacts bwc-padside">
                                            <ul class="no-list-style">
                                                <li><span><i class="fal fa-map-marker"></i> Adress :</span> <a href="#"><?php echo $university['un_address'] ?></a></li>
                                                <li><span><i class="fal fa-phone"></i> Phone :</span> <a href="#"><?php echo $university['un_contactno'] ?></a></li>
                                                <li><span><i class="fal fa-envelope"></i> Mail :</span> <a href="#"><?php echo $university['un_email'] ?></a></li>
                                                <!-- <li><span><i class="fal fa-browser"></i> Website :</span> <a href="#">themeforest.net</a></li> -->
                                            </ul>
                                        </div>
                                        <div class="list-widget-social bottom-bcw-box  fl-wrap">
                                            <ul class="no-list-style">
                                                <li><a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                                                <li><a href="#" target="_blank"><i class="fab fa-twitter"></i></a></li>
                                                <li><a href="#" target="_blank"><i class="fab fa-vk"></i></a></li>
                                                <li><a href="#" target="_blank"><i class="fab fa-instagram"></i></a></li>
                                            </ul>
                                            <!-- <div class="bottom-bcw-box_link"><a href="#" class="show-single-contactform tolt" data-microtip-position="top" data-tooltip="Write Message"><i class="fal fa-envelope"></i></a></div> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--box-widget-item end -->

                            <!--box-widget-item -->
                            <div class="box-widget-item fl-wrap block_box">
                                <div class="box-widget-item-header">
                                    <h3>Similar listings :</h3>
                                </div>
                                <div class="box-widget  fl-wrap">
                                    <div class="box-widget-content">
                                        <!--widget-posts-->
                                        <div class="widget-posts  fl-wrap">
                                            <ul class="no-list-style">
                                                <?php
                                                foreach ($similer_accomodation as  $similer) {
                                                    $this->db->where('rat_university_id', $similer->un_id);
                                                    $rating =  $this->db->get('rating')->result();
                                                ?>
                                                    <li>
                                                        <div class="widget-posts-img"><a href="UniversitysingleDetail?id=<?php echo $similer->un_id ?>"><img src="upload/<?php echo $similer->un_media ?>" alt=""></a>
                                                        </div>
                                                        <div class="widget-posts-descr">
                                                            <h4><a href="UniversitysingleDetail?id=<?php echo $similer->un_id ?>"><?php echo $similer->un_name ?></a></h4>
                                                            <div class="geodir-category-location fl-wrap"><a href="UniversitysingleDetail?id=<?php echo $similer->un_id ?>"><i class="fas fa-map-marker-alt"></i><?php echo $similer->un_address ?></a></div>
                                                            <div class="widget-posts-descr-link"><a href="UniversitysingleDetail?id=<?php echo $similer->un_id ?>">Accomodation </a></div>
                                                            <?php
                                                            if (!empty($rating)) {
                                                            ?>
                                                                <div class="widget-posts-descr-score"><?php echo $rating[0]->rat_rating ?></div>
                                                            <?php
                                                            } else {
                                                            ?>
                                                                <div class="widget-posts-descr-score">0</div>
                                                            <?php
                                                            }
                                                            ?>
                                                        </div>
                                                    </li>

                                                <?php
                                                }
                                                ?>

                                            </ul>
                                        </div>
                                        <!-- widget-posts end-->
                                    </div>
                                </div>
                            </div>
                            <!--box-widget-item end -->
                            <!--box-widget-item -->

                            <!--box-widget-item end -->
                        </div>
                        <!-- list-single-sidebar end -->
                    </div>
                </div>
            </section>
            <div class="limit-box fl-wrap"></div>
        </div>
        <!--content end-->
    </div>

    <!-- wrapper end-->
<?php
}
?>
<!-- -----------------------------------------End ---------accomodation detail ------------------------------- -->

<!-- --------------------------------------------Tourism detail ------------------------------- -->
<?php
if ($university['category'] == '6') {
?>
    <!-- wrapper-->
    <div id="wrapper">
        <!-- content-->
        <div class="content">
            <section class="listing-hero-section hidden-section" data-scrollax-parent="true" id="sec1">
                <div class="bg-parallax-wrap">
                    <div class="bg par-elem " data-bg="upload/<?php echo $university['un_media'] ?>" data-scrollax="properties: { translateY: '30%' }"></div>
                    <div class="overlay"></div>
                </div>
                <div class="container">
                    <div class="list-single-header-item  fl-wrap">
                        <div class="row">
                            <div class="col-md-9">

                                <h1><?php echo $university['tur_place'] ?><span class="verified-badge"><i class="fal fa-check"></i></span></h1>
                                <h2 style="color: aquamarine;font-size: 25px;text-align: left;"><?php echo $university['tur_duration'] ?><span class="verified-badge"><i class="fas fa-suitcase-rolling"></i></span></h2>
                                <div class="geodir-category-location fl-wrap"><a href="#"><i class="fas fa-map-marker-alt"></i><?php echo $university['tur_place'] ?></a> <a href="#"> <i class="fal fa-phone"></i><?php echo $university['un_contactno'] ?></a> <a href="#"><i class="fal fa-envelope"></i><?php echo $university['un_email'] ?></a></div>
                            </div>
                            <div class="col-md-3">
                                <a class="fl-wrap list-single-header-column custom-scroll-link " href="#sec5">
                                    <div class="listing-rating-count-wrap single-list-count">
                                        <div class="review-score"><?php echo floatval($query->average) ?></div>
                                        <div class="listing-rating card-popup-rainingvis" data-starrating2="<?php echo $query->average ?>"></div>
                                        <br>
                                        <div class="reviews-count"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="list-single-header_bottom fl-wrap">
                        <a class="listing-item-category-wrap" href="#">
                            <div class="listing-item-category  red-bg"><i class="fas fa-plane-departure"></i></div>
                            <span><?php
                                    $price =   $this->Admin_model->asDollars($university['tur_price']);
                                    echo $price;
                                    ?></span>
                        </a>

                        <div class="list-single-stats">
                            <ul class="no-list-style">

                            </ul>
                        </div>
                    </div>
                </div>
            </section>
            <!-- scroll-nav-wrapper-->
            <div class="scroll-nav-wrapper fl-wrap">
                <div class="container">
                    <nav class="scroll-nav scroll-init">
                        <ul class="no-list-style">
                            <li><a class="act-scrlink" href="#sec1"><i class="fal fa-images"></i> Top</a></li>
                            <li><a href="#sec2"><i class="fal fa-info"></i>Details</a></li>
                            <li><a href="#sec3"><i class="fal fa-image"></i>Gallery</a></li>
                            <!-- <li><a href="#sec4"><i class="fal fa-utensils"></i>Menu</a></li> -->
                            <li><a href="#sec5"><i class="fal fa-comments-alt"></i>Reviews</a></li>
                        </ul>
                    </nav>
                    <div class="scroll-nav-wrapper-opt">
                        <!-- <a href="#" class="scroll-nav-wrapper-opt-btn"> <i class="fas fa-heart"></i> Save </a>
<a href="#" class="scroll-nav-wrapper-opt-btn showshare"> <i class="fas fa-share"></i> Share </a> -->
                        <div class="share-holder hid-share">
                            <div class="share-container  isShare"></div>
                        </div>
                        <!-- <div class="show-more-snopt"><i class="fal fa-ellipsis-h"></i></div>
                        <div class="show-more-snopt-tooltip">
                            <a href="#"> <i class="fas fa-comment-alt"></i> Write a review</a>
                            <a href="#"> <i class="fas fa-flag-alt"></i> Report </a>
                        </div> -->
                    </div>
                </div>
            </div>
            <!-- scroll-nav-wrapper end-->
            <section class="gray-bg no-top-padding">
                <div class="container">
                    <!-- <div class="breadcrumbs inline-breadcrumbs fl-wrap">
                        <a href="#">Home</a><a href="#">Listings</a><a href="#">New York</a><span>Listing Single</span>
                    </div> -->
                    <div class="clearfix"></div>
                    <div class="row">
                        <!-- list-single-main-wrapper-col -->
                        <div class="col-md-8">
                            <!-- list-single-main-wrapper -->
                            <div class="list-single-main-wrapper fl-wrap" id="sec2">
                                <div class="list-single-main-media fl-wrap">
                                    <img src="images/all/48.jpg" class="respimg" alt="">
                                    <a href="https://vimeo.com/70851162" class="promo-link   image-popup"><i class="fal fa-video"></i><span>Promo Video</span></a>
                                </div>
                                <!-- list-single-main-item -->
                                <div class="list-single-main-item fl-wrap block_box">
                                    <div class="list-single-main-item-title">
                                        <h3>Description</h3>
                                    </div>
                                    <div class="list-single-main-item_content fl-wrap">
                                        <p><?php echo $university['un_description'] ?></p>

                                        <a href="#" class="btn color2-bg    float-btn">Visit Website<i class="fal fa-chevron-right"></i></a>
                                    </div>
                                </div>
                                <!-- list-single-main-item end -->
                                <div class="list-single-main-item fl-wrap block_box">
                                    <div class="list-single-main-item-title">
                                        <h3>Things To Carry</h3>
                                    </div>
                                    <div class="list-single-main-item_content fl-wrap">
                                        <p><?php echo $university['tur_Inclusions'] ?></p>

                                      
                                    </div>
                                </div>
                                <!-- list-single-main-item end -->
                                <!-- list-single-main-item -->
                                <div class="list-single-main-item fl-wrap block_box">
                                    <div class="list-single-main-item-title">
                                        <h3> Facility</h3>
                                    </div>
                                    <div class="list-single-main-item_content fl-wrap">
                                        <div class="listing-features fl-wrap">
                                            <ul class="no-list-style">
                                                <?php
                                                $customday = explode(",", $university['un_facility']);
                                                if (in_array("1", $customday)) {
                                                ?>
                                                    <li><a href="#"><i class="fas fa-hotel"></i>UNIVERSITY HOSTEL</a></li>
                                                <?php
                                                }
                                                if (in_array("2", $customday)) {
                                                ?>
                                                    <li><a href="#"><i class="far fa-bus"></i>TRANSPORT FACILITY</a></li>
                                                <?php
                                                }
                                                if (in_array("3", $customday)) {
                                                ?>
                                                    <li><a href="#"><i class="fas fa-coffee"></i>CAFETERIA</a></li>
                                                <?php
                                                }
                                                if (in_array("4", $customday)) {
                                                ?>
                                                    <li><a href="#"><i class="fas fa-utensils-alt"></i>UNIVERSITY CANTEEN</a></li>
                                                <?php
                                                }
                                                if (in_array("4", $customday)) {
                                                ?>
                                                    <li><a href="#"><i class="fa fa-wifi"></i>INTERNET CENTRE</a></li>
                                                <?php
                                                }
                                                ?>

                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- list-single-main-item end -->
                                <!-- list-single-main-item-->
                                <div class="list-single-main-item fl-wrap block_box" id="sec3">
                                    <div class="list-single-main-item-title">
                                        <h3>Gallery / Photos</h3>
                                    </div>
                                    <div class="list-single-main-item_content fl-wrap">
                                        <div class="single-carousel-wrap fl-wrap lightgallery">
                                            <div class="sc-next sc-btn color2-bg"><i class="fas fa-caret-right"></i></div>
                                            <div class="sc-prev sc-btn color2-bg"><i class="fas fa-caret-left"></i></div>
                                            <div class="single-carousel fl-wrap full-height">
                                                <div class="swiper-container">
                                                    <div class="swiper-wrapper">

                                                        <?php
                                                        foreach ($university_gallary as $gallary) {
                                                        ?>

                                                            <!-- swiper-slide-->
                                                            <div class="swiper-slide">
                                                                <div class="box-item">
                                                                    <img src="upload/preview/<?php echo $gallary->file_name ?>" alt="">
                                                                    <a href="upload/preview/<?php echo $gallary->file_name ?>" class="gal-link popup-image"><i class="fa fa-search"></i></a>
                                                                </div>
                                                            </div>
                                                            <!-- swiper-slide end-->

                                                        <?php
                                                        }
                                                        ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- list-single-main-item end -->
                             
                                <!-- list-single-main-item-->

                                <!-- list-single-main-item end -->
                                <!-- list-single-main-item -->
                                <div class="list-single-main-item fl-wrap block_box" id="sec5">
                                    <div class="list-single-main-item-title">
                                        <h3> Reviews <span> </span></h3>
                                    </div>
                                    <!--reviews-score-wrap-->
                                    <div class="reviews-score-wrap fl-wrap">

                                    </div>
                                    <!-- reviews-score-wrap end -->
                                    <div class="list-single-main-item_content fl-wrap">
                                        <div class="reviews-comments-wrap">
                                            <!-- reviews-comments-item -->
                                            <?php
                                            foreach ($rating as $key => $value_rat) {

                                                $this->db->where('user_id', $value_rat->rat_userid);
                                                $rat_user = $this->db->get('users')->result();
                                            ?>
                                                <div class="reviews-comments-item">
                                                    <div class="review-comments-avatar">
                                                        <img src="upload/<?php echo $rat_user[0]->user_img ?>"  onerror="this.src='upload/user_placeholder.png'">
                                                    </div>
                                                    <div class="reviews-comments-item-text fl-wrap">
                                                        <div class="reviews-comments-header fl-wrap">

                                                            <h4><a href="#"><?php echo $rat_user[0]->user_name ?></a></h4>
                                                            <div class="review-score-user">
                                                                <!-- <span class="review-score-user_item">4.2</span> -->
                                                                <div class="listing-rating card-popup-rainingvis" data-starrating2="<?php echo $value_rat->rat_rating ?>"></div>
                                                            </div>
                                                        </div>
                                                        <p><?php echo $value_rat->rat_comment ?></p>
                                                        <div class="reviews-comments-item-footer fl-wrap">
                                                            <?php

                                                            $date1 = date_create($value_rat->rat_createdate);
                                                            $date =  date_format($date1, "Y M d");
                                                            ?>
                                                            <div class="reviews-comments-item-date"><span><i class="far fa-calendar-check"></i><?php echo $date ?></span></div>
                                                            <!--  <a href="#" class="rate-review"><i class="fal fa-thumbs-up"></i>  Helpful Review  <span>2</span> </a> -->
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php
                                            }
                                            ?>
                                            <!--reviews-comments-item end-->

                                        </div>
                                    </div>
                                </div>
                                <!-- list-single-main-item end -->
                                <!-- list-single-main-item -->
                                <div class="list-single-main-item fl-wrap block_box" id="sec6">
                                    <div class="list-single-main-item-title fl-wrap">
                                        <h3>Add Review</h3>
                                    </div>
                                    <style type="text/css">
                                        /* component */

                                        .star-rating {
                                            /*border:solid 1px #ccc;*/
                                            display: flex;
                                            flex-direction: row-reverse;
                                            font-size: 1.5em;
                                            justify-content: space-around;
                                            padding: 9px .2em;
                                            text-align: center;
                                            width: 11em;
                                        }

                                        .star-rating input {
                                            display: none;
                                        }

                                        .star-rating label {
                                            color: #ccc;
                                            font-size: 40px;
                                            cursor: pointer;
                                        }

                                        .star-rating :checked~label {
                                            color: #f90;
                                        }

                                        .star-rating label:hover,
                                        .star-rating label:hover~label {
                                            color: #fc0;
                                        }

                                        /* explanation */

                                        article {
                                            background-color: #ffe;
                                            box-shadow: 0 0 1em 1px rgba(0, 0, 0, .25);
                                            color: #006;
                                            font-family: cursive;
                                            font-style: italic;
                                            margin: 4em;
                                            max-width: 30em;
                                            padding: 2em;
                                        }
                                    </style>
                                    <!-- Add Review Box -->
                                    <div id="add-review" class="add-review-box">
                                        <!-- Review Comment -->
                                        <form id="add-comment" class="add-comment  custom-form" action-attr="addcomment" action="javascript:void(0)">

                                            <fieldset>




                                                <div class="list-single-main-item_content fl-wrap">
                                                    <div class="listsearch-input-item fl-wrap">

                                                        <div class="star-rating">
                                                            <input type="radio" id="5-stars" name="rat_rating" value="5" />
                                                            <label for="5-stars" class="star">&#9733;</label>
                                                            <input type="radio" id="4-stars" name="rat_rating" value="4" />
                                                            <label for="4-stars" class="star">&#9733;</label>
                                                            <input type="radio" id="3-stars" name="rat_rating" value="3" />
                                                            <label for="3-stars" class="star">&#9733;</label>
                                                            <input type="radio" id="2-stars" name="rat_rating" value="2" />
                                                            <label for="2-stars" class="star">&#9733;</label>
                                                            <input type="radio" id="1-star" name="rat_rating" value="1" />
                                                            <label for="1-star" class="star">&#9733;</label>
                                                        </div>
                                                    </div>
                                                    <textarea cols="40" rows="3" name="rat_comment" required placeholder="Your Review:"></textarea>
                                                    <label id="rat_comment-error" class="error" style="color: red;" for="rat_comment"></label>
                                                    <div class="clearfix"></div>

                                                    <input type="hidden" name="rat_university_id" value="<?php echo $university['un_id'] ?>">
                                                    <input type="hidden" name="rat_userid" value="<?php
                                                                                                    if (isset($_SESSION['user_session']['user_id'])) {
                                                                                                        echo $_SESSION['user_session']['user_id'];
                                                                                                    }
                                                                                                    ?>">
                                                    <div class="clearfix"></div>
                                                    <button class="btn  color2-bg  float-btn">Submit Review <i class="fal fa-paper-plane"></i></button>
                                                </div>
                                            </fieldset>
                                        </form>
                                    </div>
                                    <!-- Add Review Box / End -->
                                </div>
                                <!-- list-single-main-item end -->
                            </div>
                        </div>
                        <!-- list-single-main-wrapper-col end -->
                        <!-- list-single-sidebar -->
                        <div class="col-md-4">

                        <div class="list-single-main-item_content fl-wrap">
                            <a href="Apply_from?id=<?php echo $university['category'];?>&&un_id=<?php echo $university['un_id'];?>&&formcat_id=<?php echo $university['sub_category'];?>" class="btn color2-bg    float-btn">Apply  Form<i class="fal fa-chevron-right"></i></a>
                          
                               </div>
                            <div class="box-widget-item fl-wrap block_box">
                                <div class="box-widget-item-header">
                                    <h3>Location / Contacts </h3>
                                </div>
                                <div class="box-widget">
                                    <div class="map-container">
                                        <div id="singleMap" data-latitude="<?php echo $university['un_latitude'] ?>" data-longitude="<?php echo $university['un_longitude'] ?>" data-mapTitle="Our Location"></div>
                                    </div>
                                    <div class="box-widget-content bwc-nopad">
                                        <div class="list-author-widget-contacts list-item-widget-contacts bwc-padside">
                                            <ul class="no-list-style">
                                                <li><span><i class="fal fa-map-marker"></i> Adress :</span> <a href="#"><?php echo $university['un_address'] ?></a></li>
                                                <li><span><i class="fal fa-phone"></i> Phone :</span> <a href="#"><?php echo $university['un_contactno'] ?></a></li>
                                                <li><span><i class="fal fa-envelope"></i> Mail :</span> <a href="#"><?php echo $university['un_email'] ?></a></li>
                                                <!-- <li><span><i class="fal fa-browser"></i> Website :</span> <a href="#">themeforest.net</a></li> -->
                                            </ul>
                                        </div>
                                        <div class="list-widget-social bottom-bcw-box  fl-wrap">
                                            <ul class="no-list-style">
                                                <li><a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                                                <li><a href="#" target="_blank"><i class="fab fa-twitter"></i></a></li>
                                                <li><a href="#" target="_blank"><i class="fab fa-vk"></i></a></li>
                                                <li><a href="#" target="_blank"><i class="fab fa-instagram"></i></a></li>
                                            </ul>
                                            <!-- <div class="bottom-bcw-box_link"><a href="#" class="show-single-contactform tolt" data-microtip-position="top" data-tooltip="Write Message"><i class="fal fa-envelope"></i></a></div> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--box-widget-item end -->

                            <!--box-widget-item -->
                            <div class="box-widget-item fl-wrap block_box">
                                <div class="box-widget-item-header">
                                    <h3>Similar listings :</h3>
                                </div>
                                <div class="box-widget  fl-wrap">
                                    <div class="box-widget-content">
                                        <!--widget-posts-->
                                        <div class="widget-posts  fl-wrap">
                                            <ul class="no-list-style">
                                                <?php
                                                foreach ($similer_tourism as  $similer) {
                                                    $this->db->where('rat_university_id', $similer->un_id);
                                                    $rating =  $this->db->get('rating')->result();
                                                ?>
                                                    <li>
                                                        <div class="widget-posts-img"><a href="UniversitysingleDetail?id=<?php echo $similer->un_id ?>"><img src="upload/<?php echo $similer->un_media ?>" alt=""></a>
                                                        </div>
                                                        <div class="widget-posts-descr">
                                                            <h4><a href="UniversitysingleDetail?id=<?php echo $similer->un_id ?>"><?php echo $similer->tur_place ?></a></h4>
                                                            <div class="geodir-category-location fl-wrap"><a href="UniversitysingleDetail?id=<?php echo $similer->un_id ?>"><i class="fas fa-map-marker-alt"></i><?php echo $similer->tur_place ?></a></div>
                                                            <div class="widget-posts-descr-link"><a href="UniversitysingleDetail?id=<?php echo $similer->un_id ?>"><?php echo $similer->tur_duration ?> </a></div>

                                                            <?php
                                                            if (!empty($rating)) {
                                                            ?>
                                                                <div class="widget-posts-descr-score"><?php echo $rating[0]->rat_rating ?></div>
                                                            <?php
                                                            } else {
                                                            ?>
                                                                <div class="widget-posts-descr-score">0</div>
                                                            <?php
                                                            }
                                                            ?>
                                                        </div>
                                                    </li>

                                                <?php
                                                }
                                                ?>

                                            </ul>
                                        </div>
                                        <!-- widget-posts end-->
                                    </div>
                                </div>
                            </div>
                            <!--box-widget-item end -->
                            <!--box-widget-item -->

                            <!--box-widget-item end -->
                        </div>
                        <!-- list-single-sidebar end -->
                    </div>
                </div>
            </section>
            <div class="limit-box fl-wrap"></div>
        </div>
        <!--content end-->
    </div>

    <!-- wrapper end-->
<?php
}
?>
<!-- -----------------------------------------End ---------Tourism detail ------------------------------- -->
<?php
include('footer.php');
?>