<?php

include('header.php');
?>
<style>
    
/*======================
   Set Cookies
=======================*/
#cookie-bar{
  font-family: 'Montserrat', sans-serif;
  background: #232c41;
  display:block;
  position: fixed !important;
  bottom: 0px;
  width: 100%;
  left: 0px;
  color: #fff;
  width: 100%;
 
}
#cookie-bar p{width: 85%;float: left;display: inline-block;font-size: 15px;line-height: 24px;color: #adadad;}
#cookie-bar button{float: right;background: transparent;border: 1px solid #fff;color: #fff;padding: 15px 20px;text-transform: uppercase;font-size: 16px;margin-top: 5px; border-radius: 4px;}
#cookie-bar a{color: #fff;}
#contentcookie{ padding:20px 50px; width: 80%; margin: auto; }

.clear{ clear:both; }
        

  @media(max-width: 767px){

#cookie-bar p{width: 100%;font-size: 14px;}
#cookie-bar button{width: 100%;}
#cookie-bar a{color: #fff;}
#contentcookie{padding: 20px 0px;width: 90%;margin: auto;}
  }
</style>
<!-- wrapper-->
<div id="wrapper">
    <!-- content-->
    <div class="content">
        
<div id='cookie-bar'><div id='contentcookie'><p>
<?php echo (lang('COOKIES')); ?> </p><button id='Cookie' tabindex=1 onclick='AcceptCookies();'><?php echo (lang('I accept')); ?> </button><div class='clear'></div></div></div>
        <!--section  -->
        <section class="hero-section" data-scrollax-parent="true">
            <div class="bg-tabs-wrap">
                <div class="bg-parallax-wrap" data-scrollax="properties: { translateY: '200px' }">
                    <div class="bg bg_tabs" data-bg="upload/<?php echo $homepage[0]->un_bg_img ?>"></div>
                    <div class="overlay op7"></div>
                </div>
            </div>
            <div class="container small-container">
                <div class="intro-item fl-wrap">
                    <span class="section-separator"></span>
                    <div class="bubbles">
                        <h1> <?php echo (lang('EXPLORE')); ?></h1>
                    </div>
                    <h3><?php echo $homepage[0]->home_un_desc ?></h3>
                </div>
                <!-- main-search-input-tabs-->
                <div class="main-search-input-tabs  tabs-act fl-wrap">
                    <ul class="tabs-menu change_bg no-list-style">
                        <li class="current"><a href="#tab-inpt1" data-bgtab="upload/<?php echo $homepage[0]->un_bg_img ?>"><?php echo (lang('EDUCATION')); ?> </a></li>
                        <li><a href="#tab-inpt2" data-bgtab="upload/<?php echo $homepage[0]->acc_bg_img ?>"><?php echo (lang('ACCOMODATION')); ?> </a></a></li>
                        <li><a href="#tab-inpt3" data-bgtab="upload/<?php echo $homepage[0]->tur_bg_img ?>"> <?php echo (lang('TOURISM')); ?></a></li>
                        <!-- <li><a href="#tab-inpt4" data-bgtab="images/bg/hero/4.jpg"> Hotels</a></li> -->
                    </ul>
                    <!--tabs -->
                    <div class="tabs-container fl-wrap">
                        <!--tab -->
                        <style>
                            .auto {
                                background-color: #fffdfc !important;
                            }

                            .auto li {

                                margin: 6px;
                                width: 100%;
                                padding: 6px 20px;
                                margin: 0px 0;
                                display: inline-block;
                                border: 1px solid #ccc;
                                border-radius: 4px;
                                box-sizing: border-box;
                              

                            }
                            
                        </style>
                                      <style>
                            .auto {
                                background-color: #fffdfc !important;
                            }

                            .typeahead li{

                                margin: 6px;
                                width: 100%;
                                padding: 6px 20px;
                                margin: 0px 0;
                                display: inline-block;
                                border: 1px solid #ccc;
                                border-radius: 4px;
                                box-sizing: border-box;
                                background-color: white;
                              

                            }
                            
                        </style>
                        <div class="tab">
                            <div id="tab-inpt1" class="tab-content first-tab">
                                <div class="main-search-input-wrap fl-wrap">
                                    <form action="universitysearch" method="post" enctype="multipart/form-data">
                                        <div class="main-search-input fl-wrap">
                                            <div class="main-search-input-item">
                                                <label><i class="fal fa-keyboard"></i></label>
                                                <div class="container auto">
                                                    <input type="text" class="typeahead" name="un_name" placeholder="<?php echo (lang('EDUCATION NAME')); ?>" value="" />
                                                </div>
                                            </div>
                                            <div class="main-search-input-item location autocomplete-container">
                                                <label><i class="fal fa-map-marker-check"></i></label>
                                                <input type="text" name="un_address" placeholder="<?php echo (lang('LOCATION')); ?>" class="autocomplete-input" id="autocompleteid" value="" />
                                                <a href="#"><i class="fa fa-dot-circle-o"></i></a>
                                            </div>

                                            <button class="main-search-button color2-bg"><?php echo (lang('SEARCH')); ?> <i class="far fa-search"></i></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!--tab end-->
                        <!--tab -->
                        <div class="tab">
                            <div id="tab-inpt2" class="tab-content">
                                <div class="main-search-input-wrap fl-wrap">
                                    <form action="accomodationsearch" method="post" enctype="multipart/form-data">
                                        <div class="main-search-input fl-wrap">
                                            <div class="main-search-input-item location autocomplete-container">
                                                <label><i class="fal fa-map-marker-check"></i></label>
                                                <input type="text" name="un_address" placeholder="<?php echo (lang('LOCATION')); ?>" class="autocomplete-input" id="autocompleteid" value="" />
                                                <a href="#"><i class="fa fa-dot-circle-o"></i></a>

                                            </div>
                                            <div class="main-search-input-item">

                                                <?php
                                                $where_type = array('room_status' => '1');
                                                $room_type = $this->Admin_model->getAll('acco_room_type', $where_type);
                                                ?>
                                                <select name="acc_room_type" data-placeholder="Loaction" class="chosen-select on-radius">
                                                    <?php
                                                    foreach ($room_type as $rotype) {
                                                    ?>
                                                        <option value="<?php echo $rotype->id ?>"><?php echo $rotype->room_type ?></option>
                                                    <?php
                                                    }
                                                    ?>

                                                </select>

                                                </select>
                                            </div>

                                            <button class="main-search-button color2-bg" onclick="window.location.href='#'"><?php echo (lang('SEARCH')); ?> <i class="far fa-search"></i></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!--tab end-->
                        <!--tab -->
                        <div class="tab">
                            <div id="tab-inpt3" class="tab-content">
                                <form action="tourismsearch" method="post" enctype="multipart/form-data">
                                    <div class="main-search-input-wrap fl-wrap">
                                        <div class="main-search-input fl-wrap">
                                            <div class="main-search-input-item location autocomplete-container">
                                                <label><i class="fal fa-map-marker-check"></i></label>
                                                <input type="text" name="tur_place" placeholder="<?php echo (lang('LOCATION')); ?>" class="autocomplete-input" id="autocompleteid" value="" />
                                                <a href="#"><i class="fa fa-dot-circle-o"></i></a>
                                            </div>
                                            <div class="main-search-input-item clact date-container">
                                                <span class="iconn-dec"><i class="fal fa-user-crown"></i></span>
                                                <input type="text" class="agencyname" placeholder="<?php echo (lang('Travel Agency Name')); ?>" name="tur_agency" value="" />
                                                <!-- <span class="clear-singleinput"><i class="fal fa-times"></i></span> -->
                                            </div>

                                            <button class="main-search-button color2-bg"><?php echo (lang('SEARCH')); ?> <i class="far fa-search"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!--tab end-->
                        <!--tab -->
                        <div class="tab">
                            <div id="tab-inpt4" class="tab-content">
                                <div class="main-search-input-wrap fl-wrap">
                                    <div class="main-search-input fl-wrap">
                                        <div class="main-search-input-item">
                                            <label><i class="fal fa-cheeseburger"></i></label>
                                            <input type="text" placeholder=" <?php echo (lang('Hotel Name')); ?>" value="" />
                                        </div>
                                        <div class="main-search-input-item">
                                            <label><i class="fal fa-user-friends"></i></label>
                                            <input type="number" placeholder="<?php echo (lang('Persons')); ?>" value="" />
                                        </div>
                                        <div class="main-search-input-item clact date-container3 daterangepicker_big">
                                            <span class="iconn-dec"><i class="fal fa-calendar"></i></span>
                                            <input type="text" placeholder=" <?php echo (lang('Date In Out')); ?>" name="dates" value="" />
                                            <span class="clear-singleinput"><i class="fal fa-times"></i></span>
                                        </div>
                                        <button class="main-search-button color2-bg" onclick="window.location.href='#'"><?php echo (lang('SEARCH')); ?> <i class="far fa-search"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--tab end-->
                    </div>
                    <!--tabs end-->
                </div>
                <!-- main-search-input-tabs end-->
                <div class="hero-categories fl-wrap">
                    <h4 class="hero-categories_title"><?php echo (lang('JUST LOOKING AROUND')); ?></h4>
                    <ul class="no-list-style">
                        <li><a href="ViewAlluniversityList"><i class="fas fa-graduation-cap"></i><span><?php echo (lang('EDUCATION')); ?></span></a></li>
                        <li><a href="ViewAllAccomodationList"><i class="fas fa-hotel"></i><span><?php echo (lang('ACCOMODATION')); ?></span></a></li>
                        <li><a href="ViewAllTourismList"><i class="fas fa-plane-departure"></i><span><?php echo (lang('TOURISM')); ?></span></a></li>

                    </ul>
                </div>
            </div>
            <div class="header-sec-link">
                <a href="#sec1" class="custom-scroll-link"><i class="fal fa-angle-double-down"></i></a>
            </div>
        </section>
        <!--section end-->
        <!--section  -->
      <!--   <section class="slw-sec" id="sec1">
            <div class="section-title">
                <h2>The Education Listings</h2>
                <div class="section-subtitle">Newest Listings</div>
                <span class="section-separator"></span>
                <p><?php echo $homepage[0]->home_listing_desc ?></p>
            </div>
            <div class="listing-slider-wrap fl-wrap">
                <div class="listing-slider fl-wrap">
                    <div class="swiper-container">
                        <div class="swiper-wrapper">
                            <?php
                            foreach ($university as  $value) {


                                $this->db->select('AVG(rat_rating) as average');
                                $this->db->where('rat_university_id', $value->un_id);
                                $this->db->from('rating');
                                $query = $this->db->get()->row();

                            ?>
                                <div class="swiper-slide">
                                    <div class="listing-slider-item fl-wrap">
                                       
                                        <div class="listing-item listing_carditem">
                                            <article class="geodir-category-listing fl-wrap">
                                                <div class="geodir-category-img">
                                                    <div class="geodir-js-favorite_btn"><i class="fal fa-heart"></i><span>Save</span></div>
                                                    <a style="height: 323px !important;" href="UniversitysingleDetail?id=<?php echo $value->un_id ?>" class="geodir-category-img-wrap fl-wrap">
                                                        <img src="upload/<?php echo $value->un_media ?>" alt="">
                                                    </a>
                                                    <div class="geodir_status_date gsd_open"><i class="fal fa-lock-open"></i>Open Now</div>
                                                    <div class="geodir-category-opt">
                                                        <div class="geodir-category-opt_title">
                                                            <h4><a href="UniversitysingleDetail?id=<?php echo $value->un_id ?>"><?php echo $value->un_name ?></a></h4>
                                                            <div class="geodir-category-location"><a href="#"><i class="fas fa-map-marker-alt"></i><?php echo $value->un_address ?></a></div>
                                                        </div>
                                                        <div style="margin: 0 60px;" class="listing-rating-count-wrap">
                                                            <div class="review-score"><?php echo floatval($query->average) ?></div>
                                                            <div class="listing-rating card-popup-rainingvis" data-starrating2="<?php echo $query->average ?>"></div>
                                                            <br>
                                                            
                                                        </div>
                                                        <div class="listing_carditem_footer fl-wrap">
                                                            <a class="listing-item-category-wrap" href="#">
                                                                <div class="listing-item-category red-bg"><i class="fas fa-graduation-cap"></i></div>
                                                                <span></span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </article>
                                        </div>
                                    
                                    </div>
                                </div>

                            <?php
                            }
                            ?>
                        </div>
                    </div>
                    <div class="listing-carousel-button listing-carousel-button-next2"><i class="fas fa-caret-right"></i></div>
                    <div class="listing-carousel-button listing-carousel-button-prev2"><i class="fas fa-caret-left"></i></div>
                </div>
                <div class="tc-pagination_wrap">
                    <div class="tc-pagination2"></div>
                </div>
            </div>
        </section> -->
        <!--section end-->
        <!--section accomodation -->
      <!--   <section class="slw-sec" id="sec1">
            <div class="section-title">
                <h2>The Accommodation Listings</h2>
                <div class="section-subtitle">Newest Listings</div>
                <span class="section-separator"></span>
               
            </div>
            <div class="listing-slider-wrap fl-wrap">
                <div class="listing-slider fl-wrap">
                    <div class="swiper-container">
                        <div class="swiper-wrapper">
                            <?php
                            foreach ($accomodation as  $value_acc) {


                                $this->db->select('AVG(rat_rating) as average');
                                $this->db->where('rat_university_id', $value_acc->un_id);
                                $this->db->from('rating');
                                $query = $this->db->get()->row();
                                $where_type = array('id' => $value_acc->acc_room_type);
                                $room_type = $this->Admin_model->getAll('acco_room_type', $where_type);

                            ?>
                                <div class="swiper-slide">
                                    <div class="listing-slider-item fl-wrap">
                                        
                                        <div class="listing-item listing_carditem">
                                            <article class="geodir-category-listing fl-wrap">
                                                <div class="geodir-category-img">
                                                    <div class="geodir-js-favorite_btn"><i class="fal fa-heart"></i><span>Save</span></div>
                                                    <a style="height: 323px !important;" href="UniversitysingleDetail?id=<?php echo $value_acc->un_id ?>" class="geodir-category-img-wrap fl-wrap">
                                                        <img src="upload/<?php echo $value_acc->un_media ?>" alt="">
                                                    </a>
                                                    <div class="geodir_status_date gsd_open"><i class="fal fa-lock-open"></i>Open Now</div>


                                                    <div class="geodir-category-opt">
                                                        <div class="geodir-category-opt_title">
                                                            <h4><a href="UniversitysingleDetail?id=<?php echo $value_acc->un_id ?>"><?php echo $room_type[0]->room_type ?><p><?php echo $value_acc->acc_room_size ?> Sq.ft</p></a></h4>
                                                            <div class="geodir-category-location"><a href="#"><i class="fas fa-map-marker-alt"></i><?php echo $value_acc->un_address ?></a></div>
                                                        </div>
                                                        <div>
                                                            <h4><a style="color:red;margin: 28px;" href="UniversitysingleDetail?id=<?php echo $value_acc->un_id ?>">$ <?php echo $value_acc->acc_rent ?></a></h4>
                                                        </div>
                                                        <div style="margin: 0 60px;" class="listing-rating-count-wrap">
                                                            <div class="review-score"><?php echo floatval($query->average) ?></div>
                                                            <div class="listing-rating card-popup-rainingvis" data-starrating2="<?php echo $query->average ?>"></div>
                                                            <br>
                                                         
                                                        </div>

                                                        <div class="listing_carditem_footer fl-wrap">
                                                            <a class="listing-item-category-wrap" href="#">
                                                                <div class="listing-item-category red-bg"><i class="fas fa-hotel"></i></div>
                                                               
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </article>
                                        </div>
                                        
                                    </div>
                                </div>

                            <?php
                            }
                            ?>
                        </div>
                    </div>
                    <div class="listing-carousel-button listing-carousel-button-next2"><i class="fas fa-caret-right"></i></div>
                    <div class="listing-carousel-button listing-carousel-button-prev2"><i class="fas fa-caret-left"></i></div>
                </div>
                <div class="tc-pagination_wrap">
                    <div class="tc-pagination2"></div>
                </div>
            </div>
        </section> -->
        <!--section accomodation end-->
        <!--section Tourism -->
       <!--  <section class="slw-sec" id="sec1">
            <div class="section-title">
                <h2>The Tourism Listings</h2>
                <div class="section-subtitle">Newest Listings</div>
                <span class="section-separator"></span>
               
            </div>
            <div class="listing-slider-wrap fl-wrap">
                <div class="listing-slider fl-wrap">
                    <div class="swiper-container">
                        <div class="swiper-wrapper">
                            <?php
                            foreach ($Tourism as  $value_tur) {
                                $this->db->select('AVG(rat_rating) as average');
                                $this->db->where('rat_university_id', $value_tur->un_id);
                                $this->db->from('rating');
                                $query = $this->db->get()->row();


                            ?>
                                <div class="swiper-slide">
                                    <div class="listing-slider-item fl-wrap">
                                      
                                        <div class="listing-item listing_carditem">
                                            <article class="geodir-category-listing fl-wrap">
                                                <div class="geodir-category-img">
                                                    <div class="geodir-js-favorite_btn"><i class="fal fa-heart"></i><span>Save</span></div>
                                                    <a style="height: 323px !important;" href="UniversitysingleDetail?id=<?php echo $value_tur->un_id ?>" class="geodir-category-img-wrap fl-wrap">
                                                        <img src="upload/<?php echo $value_tur->un_media ?>" alt="">
                                                    </a>
                                                    <div class="geodir_status_date gsd_open"><i class="fal fa-lock-open"></i>Open Now</div>


                                                    <div class="geodir-category-opt">

                                                        <div class="geodir-category-opt_title">
                                                            <h4><a href="UniversitysingleDetail?id=<?php echo $value_acc->un_id ?>"><i style="padding: 0 6px 0 0;color: #3b9cff;" class="fas fa-map-marker-alt"></i><?php echo $value_tur->tur_place ?><p><i style="padding: 0 6px 0 0;color: #3b9cff;" class="fas fa-suitcase-rolling"></i><?php echo $value_tur->tur_duration ?></p></a></h4>

                                                        </div>

                                                        <div style="margin: 0 60px;" class="listing-rating-count-wrap">
                                                            <div class="review-score"><?php echo floatval($query->average) ?></div>
                                                            <div class="listing-rating card-popup-rainingvis" data-starrating2="<?php echo $query->average ?>"></div>
                                                            <br>
                                                          
                                                        </div>

                                                        <div class="listing_carditem_footer fl-wrap">
                                                            <a class="listing-item-category-wrap" href="#">
                                                                <div class="listing-item-category red-bg"><i class="fas fa-plane-departure"></i></div>
                                                                
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </article>
                                        </div>
                                       
                                    </div>
                                </div>

                            <?php
                            }
                            ?>
                        </div>
                    </div>
                    <div class="listing-carousel-button listing-carousel-button-next2"><i class="fas fa-caret-right"></i></div>
                    <div class="listing-carousel-button listing-carousel-button-prev2"><i class="fas fa-caret-left"></i></div>
                </div>
                <div class="tc-pagination_wrap">
                    <div class="tc-pagination2"></div>
                </div>
            </div>
        </section> -->
        <!--section Tourism end-->
        <div class="sec-circle fl-wrap"></div>
        <!--section -->
    
        <!--  section  -->
        <!--section end-->
        <!-- <section class="parallax-section small-par" data-scrollax-parent="true">
            <div class="bg par-elem " data-bg="assets/website/images/bg/22.jpg" data-scrollax="properties: { translateY: '30%' }"></div>
            <div class="overlay  op7"></div>
            <div class="container">
                <div class=" single-facts single-facts_2 fl-wrap">
                 
                    <div class="inline-facts-wrap">
                        <div class="inline-facts">
                            <div class="milestone-counter">
                                <div class="stats animaper">
                                    <div class="num" data-content="0" data-num="1254">1254</div>
                                </div>
                            </div>
                            <h6>New Visiters Every Week</h6>
                        </div>
                    </div>
                   
                    <div class="inline-facts-wrap">
                        <div class="inline-facts">
                            <div class="milestone-counter">
                                <div class="stats animaper">
                                    <div class="num" data-content="0" data-num="12168">12168</div>
                                </div>
                            </div>
                            <h6>Happy customers every year</h6>
                        </div>
                    </div>
                    
                    <div class="inline-facts-wrap">
                        <div class="inline-facts">
                            <div class="milestone-counter">
                                <div class="stats animaper">
                                    <div class="num" data-content="0" data-num="2172">2172</div>
                                </div>
                            </div>
                            <h6>Won Amazing Awards</h6>
                        </div>
                    </div>
                  
                    <div class="inline-facts-wrap">
                        <div class="inline-facts">
                            <div class="milestone-counter">
                                <div class="stats animaper">
                                    <div class="num" data-content="0" data-num="732">732</div>
                                </div>
                            </div>
                            <h6>New Listing Every Week</h6>
                        </div>
                    </div>

                </div>
            </div>
        </section> -->
        <!--section end-->
        <!--section  -->

        <!--section end-->
        <!--section  -->

        <!--section end-->
        <!--section  -->

         <!--section Tourism end-->
        <div class="sec-circle fl-wrap"></div>
        <!--section -->
        <section class="gray-bg hidden-section particles-wrapper">
            <div class="container">
                <div class="section-title">
                <h2><?php echo(lang('EXPLORE_BEST_EDUCATION_COUNTRY')); ?></h2>
                    <div class="section-subtitle">Catalog of Categories</div>
                    <span class="section-separator"></span>
                    <p><?php echo $homepage[0]->home_country_desc ?></p>
                </div>
                <div class="listing-item-grid_container fl-wrap">
                    <div class="row">
                        <?php
                        foreach ($country as $key => $value) {
                        ?>
                            <!--  listing-item-grid  -->
                            <div class="col-sm-4">
                                <a href="CountrywiseUniversityList/<?php echo $value->country_id ?>">
                                    <div class="listing-item-grid">
                                        <div class="bg" data-bg="upload/<?php echo $value->country_img ?>"></div>
                                        <div class="d-gr-sec"></div>
                                      
                                       <div class="listing-item-grid_title">
                                            <h3><a href="CountrywiseUniversityList/<?php echo $value->country_id ?>"> <?php echo(lang('Apply in')); ?> <?php echo $value->country_name ?></a></h3>
                                            <p><?php echo $value->country_desc ?></p>
                                            <?php
                                            if(!empty($value->location)){
                                            ?>
                                            <div class="listing-counter color2-bg"><span><?php echo(lang('LOCATION')); ?> -<?php echo $value->location; ?> </span>  </div>
                                            <?php
                                            
                        }
                        ?>
                                            
                                        </div>
                                         <?php
                                            if(!empty($value->phone_number)){
                                            ?>
<div class="listing-counter color2-bg"><?php echo(lang('PHONE')); ?> - <?php echo $value->phone_number; ?> </div>
<?php
                                            
                        }
                        ?>
                                    </div>
                                </a>
                            </div>
                            <!--  listing-item-grid end  -->

                        <?php
                        }
                        ?>
                    </div>
                </div>
                <a href="ViewAllCountryList" class="btn dec_btn   color2-bg"><?php echo(lang('VIEW ALL COUNTRY')); ?><i class="fal fa-arrow-alt-right"></i></a>
            </div>

        </section>
        <!--  section  -->
        
       <!--  <section data-scrollax-parent="true">
            <div class="container">
                <div class="section-title">
                    <h2>How it works</h2>
                    <div class="section-subtitle">Discover &amp; Connect </div>
                    <span class="section-separator"></span>
                    <p><?php echo $homepage[0]->home_howit_desc ?></p>
                </div>
                <div class="process-wrap fl-wrap">
                    <ul class="no-list-style">
                        <li>
                            <div class="process-item">
                                <span class="process-count">01 </span>
                                <div class="time-line-icon"><i class="fal fa-map-marker-alt"></i></div>
                                <h4><?php echo $homepage[0]->home_title1 ?></h4>
                                <p><?php echo $homepage[0]->home_subtitle1 ?></p>
                            </div>
                            <span class="pr-dec"></span>
                        </li>
                        <li>
                            <div class="process-item">
                                <span class="process-count">02</span>
                                <div class="time-line-icon"><i class="fal fa-mail-bulk"></i></div>
                                <h4> <?php echo $homepage[0]->home_title2 ?></h4>
                                <p><?php echo $homepage[0]->home_subtitle2 ?></p>
                            </div>
                            <span class="pr-dec"></span>
                        </li>
                        <li>
                            <div class="process-item">
                                <span class="process-count">03</span>
                                <div class="time-line-icon"><i class="fal fa-layer-plus"></i></div>
                                <h4> <?php echo $homepage[0]->home_title3 ?></h4>
                                <p><?php echo $homepage[0]->home_subtitle3 ?></p>
                            </div>
                        </li>
                    </ul>
                    <div class="process-end"><i class="fal fa-check"></i></div>
                </div>
            </div>
        </section> -->
        <!--section end-->
        <!--section  -->

        <!--section end-->
        <!--section  -->
    <!--     <section>
            <div class="container">
                <div class="section-title">
                    <h2> Reviews</h2>
                    <div class="section-subtitle">Clients Reviews</div>
                    <span class="section-separator"></span>
                    <p><?php echo $homepage[0]->home_reviews_desc ?></p>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="testimonilas-carousel-wrap fl-wrap">
                <div class="listing-carousel-button listing-carousel-button-next"><i class="fas fa-caret-right"></i></div>
                <div class="listing-carousel-button listing-carousel-button-prev"><i class="fas fa-caret-left"></i></div>
                <div class="testimonilas-carousel">
                    <div class="swiper-container">
                        <div class="swiper-wrapper">
                            <?php
                            foreach ($rating_home as $key => $value_rat) {
                                $this->db->where('user_id', $value_rat->rat_userid);
                                $rat_user = $this->db->get('users')->result();
                                $this->db->where('un_id', $value_rat->rat_university_id);
                                $rat_un = $this->db->get('university')->result();
                            ?>
                                
                                <div class="swiper-slide">
                                    <div class="testi-item fl-wrap">
                                        <div class="testi-avatar"><img src="upload/<?php echo $rat_user[0]->user_img ?>" onerror="this.src='upload/user_placeholder.png'" alt=""></div>
                                        <div class="testimonilas-text fl-wrap">
                                            <div class="listing-rating card-popup-rainingvis" data-starrating2="<?php echo $value_rat->rat_rating ?>"></div>
                                            <p><?php echo $value_rat->rat_comment ?></p>
                                           
                                            <div class="testimonilas-avatar fl-wrap">
                                                <h3><?php echo $rat_user[0]->user_name ?></h3>
                                                <h4><?php echo $rat_un[0]->un_name ?>r</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                             
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="tc-pagination"></div>
            </div>
            <div class="waveWrapper waveAnimation">

                <div class="waveWrapperInner bgMiddle">
                    <div class="wave-bg-anim waveMiddle" style="background-image: url('assets/website/images/wave-top.png')"></div>
                </div>
                <div class="waveWrapperInner bgBottom">
                    <div class="wave-bg-anim waveBottom" style="background-image: url('assets/website/images/wave-top.png')"></div>
                </div>
            </div>
        </section> -->
        <!--section end-->
        <!--section  -->
    <!--     <section class="gray-bg">
            <div class="container">
                <div class="clients-carousel-wrap fl-wrap">
                    <div class="cc-btn   cc-prev"><i class="fal fa-angle-left"></i></div>
                    <div class="cc-btn cc-next"><i class="fal fa-angle-right"></i></div>
                    <div class="clients-carousel">
                        <div class="swiper-container">
                            <div class="swiper-wrapper">

                                <?php
                                foreach ($gallary_media as $gallary) {
                                    $mediapath = base_url('upload/preview/') . $gallary->file_name;
                                ?>
                                    
                                    <div class="swiper-slide">
                                        <a href="#" class="client-item"><img src="<?php echo $mediapath; ?>" alt=""></a>
                                    </div>
                                   
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> -->
        <!--section end-->
    </div>
    <!--content end-->
</div>
<!-- wrapper end-->
<?php
include('footer.php');
?>
<script type="text/javascript">


<?php 
 
  if($this->session->flashdata('warning_enquiry')){ ?>
   toastr.warning("<?php echo $this->session->flashdata('warning_enquiry'); ?>");
<?php
}
if($this->session->flashdata('googlelogin')){ ?>
    toastr.success("<?php echo $this->session->flashdata('googlelogin'); ?>");
<?php
}if($this->session->flashdata('Errors')){ ?>
    toastr.error("<?php echo $this->session->flashdata('Errors'); ?>");
<?php
}
?>


</script>