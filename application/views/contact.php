<?php
include('header.php');
?>
            <!-- wrapper-->
            <div id="wrapper">
                <!-- content-->
                <div class="content">
                    <!--  section  -->
                    <section class="parallax-section single-par" data-scrollax-parent="true">
                        <div class="bg par-elem "  data-bg="<?php echo base_url();?>assets/website/images/bg/19.jpg" data-scrollax="properties: { translateY: '30%' }"></div>
                        <div class="overlay op7"></div>
                        <div class="container">
                            <div class="section-title center-align big-title">
                                <h2><span>Our Contacts</span></h2>
                                <span class="section-separator"></span>
                                <div class="breadcrumbs fl-wrap"><a href="#">Home</a><a href="#">Pages</a><span>Contacts</span></div>
                            </div>
                        </div>
                        <div class="header-sec-link">
                            <a href="#sec1" class="custom-scroll-link"><i class="fal fa-angle-double-down"></i></a> 
                        </div>
                    </section>
                    <!--  section  end-->               
                    <!--  section  -->
                    <section   id="sec1" data-scrollax-parent="true">
                        <div class="container">
                            <!--about-wrap -->
                            <div class="about-wrap">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="ab_text-title fl-wrap">
                                            <h3>Get in Touch</h3>
                                            <span class="section-separator fl-sec-sep"></span>
                                        </div>
                                        <!--box-widget-item -->                                       
                                        <div class="box-widget-item fl-wrap block_box">
                                            <div class="box-widget">
                                                <div class="box-widget-content bwc-nopad">
                                                    <div class="list-author-widget-contacts list-item-widget-contacts bwc-padside">
                                                        <ul class="no-list-style">
                                                            <li><span><i class="fal fa-map-marker"></i> Address :</span> <a href="#singleMap" class="custom-scroll-link">535 Thurlow st ,Vancouver Canada</a></li>
                                                            <li><span><i class="fal fa-phone"></i> Phone :</span> <a href="#">+16044284499</a></li>
                                                            <li><span><i class="fal fa-envelope"></i> Mail :</span> <a href="#">orservices.info@gmail.com</a></li>
                                                        </ul>
                                                    </div>
                                                    <div class="list-widget-social bottom-bcw-box  fl-wrap">
                                                        <ul class="no-list-style">
                                                           <!--  <li><a href="#" target="_blank" ><i class="fab fa-facebook-f"></i></a></li> -->
                                                            <li><a href="https://mobile.twitter.com/ors_education" target="_blank"><i class="fab fa-twitter"></i></a></li>
                                                           <!--  <li><a href="#" target="_blank" ><i class="fab fa-vk"></i></a></li> -->
                                                            <li><a href="https://www.instagram.com/ors_education/?hl=en" target="_blank" ><i class="fab fa-instagram"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--box-widget-item end -->  
                                        <!--box-widget-item -->
                                      <!--   <div class="box-widget-item fl-wrap" style="margin-top:20px;">
                                            <div class="banner-wdget fl-wrap">
                                                <div class="overlay op4"></div>
                                                <div class="bg"  data-bg="images/bg/18.jpg"></div>
                                                <div class="banner-wdget-content fl-wrap">
                                                    <h4>Participate in our loyalty program. Refer a friend and get a discount.</h4>
                                                    <a href="#" class="color-bg">Read more</a>
                                                </div>
                                            </div>
                                        </div> -->
                                        <!--box-widget-item end -->                                            
                                    </div>
                                    <div class="col-md-8">
                                        <div class="ab_text">
                                            <div class="ab_text-title fl-wrap">
                                                <h3>Drop us a line</h3>
                                                <span class="section-separator fl-sec-sep"></span>
                                            </div>
                                           <!--  <p>Ut euismod ultricies sollicitudin. Curabitur sed dapibus nulla. Nulla eget iaculis lectus. Mauris ac maximus neque. Nam in mauris quis libero sodales eleifend. Morbi varius, nulla sit amet rutrum elementum, est elit finibus tellus, ut tristique elit risus at metus. In ut odio libero, at vulputate urna. Nulla tristique mi a massa convallis cursus. Nulla eu mi magna. Etiam suscipit commodo gravida.</p> -->
                                            <div id="contact-form">
                                                <div id="message"></div>
                                                <form  class="custom-form" action="https://townhub.kwst.net/php/contact.php" name="contactform" id="contactform">
                                                    <fieldset>
                                                        <label><i class="fal fa-user"></i></label>
                                                        <input type="text" name="name" id="name" placeholder="Your Name *" value=""/>
                                                        <div class="clearfix"></div>
                                                        <label><i class="fal fa-envelope"></i>  </label>
                                                        <input type="text"  name="email" id="email" placeholder="Email Address*" value=""/>
                                                        <textarea name="comments"  id="comments" cols="40" rows="3" placeholder="Your Message:"></textarea>
                                                    </fieldset>
                                                    <button class="btn float-btn color2-bg" id="submit">Send Message<i class="fal fa-paper-plane"></i></button>
                                                </form>
                                            </div>
                                            <!-- contact form  end--> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- about-wrap end  --> 
                        </div>
                    </section>
                    <section class="no-padding-section">
                        <div class="map-container">
                            <div id="singleMap" data-latitude="40.7427837" data-longitude="-73.11445617675781" data-mapTitle="Our Location"></div>
                        </div>
                    </section>
                </div>
                <!--content end-->
            </div>
            <!-- wrapper end-->
            <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDwJSRi0zFjDemECmFl9JtRj1FY7TiTRRo&amp;libraries=places&amp;callback=initAutocomplete"></script>
            <?php

include('footer.php');

?>
