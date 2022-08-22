<?php
include('header.php');
?>
<style>
    input.color-bg.btn.btn-primary {
    width: 200px;
    background-color: #2e3f6e;
    height: 55px;
    font-size: 20px;
}
    </style>
            <!-- wrapper-->
            <div id="wrapper">
                <!-- content-->
                <div class="content">
                    <section class="gray-bg no-top-padding-sec" id="sec1">
                        <div class="container">
                            <div class="breadcrumbs inline-breadcrumbs fl-wrap block-breadcrumbs">
                                <a href="#">Home</a><a href="#">Visa Application</a> <span>Visa Application Form</span> 
                            </div>
                            <div class="list-main-wrap-title single-main-wrap-title fl-wrap">
                                <h2>Visa Application Form :</h2>
                            </div>
                            <div class="fl-wrap ">
                                <div class="row">
                                    <div class="col-md-8">
                                        <ul id="progressbar" class="no-list-style">
                                       <!--      <li class="active"><span class="tolt" data-microtip-position="top" data-tooltip="Personal Info">01.</span></li>
                                            <li><span class="tolt" data-microtip-position="top" data-tooltip="Billing Address">02.</span></li>
                                            <li><span class="tolt" data-microtip-position="top" data-tooltip="Payment Method">03.</span></li>
                                            <li><span class="tolt" data-microtip-position="top" data-tooltip="Confirm">04.</span></li>
                                        </ul> -->
                                        <div class="bookiing-form-wrap block_box fl-wrap">
                                            <!--   list-single-main-item -->
                                            <div class="list-single-main-item fl-wrap hidden-section tr-sec">
                                                <div class="profile-edit-container">
                                                    <div class="custom-form">
                                                        <form>
                                                            <!-- <fieldset class="fl-wrap">
                                                                <div class="list-single-main-item-title fl-wrap">
                                                                    <h3>Your personal Information</h3>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-sm-6">
                                                                        <label class="vis-label">First Name <i class="far fa-user"></i></label>
                                                                        <input type="text" placeholder="Your Name" value=""/>                                                  
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <label class="vis-label">Last Name <i class="far fa-user"></i></label>
                                                                        <input type="text" placeholder="Your Last Name" value=""/> 
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <label class="vis-label">Email Address<i class="far fa-envelope"></i>  </label>
                                                                        <input type="text" placeholder="yourmail@domain.com" value=""/>                                                  
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <label class="vis-label">Phone<i class="far fa-phone"></i>  </label>
                                                                        <input type="text" placeholder="87945612233" value=""/>
                                                                    </div>
                                                                </div>
                                                                <div class="log-massage">Existing Customer? <a href="#" class="modal-open">Click here to login</a></div>
                                                                <div class="log-separator fl-wrap"><span>or</span></div>
                                                                <div class="soc-log fl-wrap">
                                                                    <p>For faster login or register use your social account.</p>
                                                                    <a href="#" class="facebook-log"> Connect with Facebook</a>
                                                                </div>
                                                                <div class="filter-tags">
                                                                    <input id="check-a" type="checkbox" name="check">
                                                                    <label for="check-a">By continuing, you agree to the<a href="#" target="_blank">Terms and Conditions</a>.</label>
                                                                </div>
                                                                <span class="fw-separator"></span>
                                                                <div class="clearfix"></div>
                                                                <a  href="#"  class="next-form action-button color-bg">Billing Address</a>
                                                            </fieldset> -->
                                                            <fieldset class="fl-wrap">
                                                                <div class="list-single-main-item-title fl-wrap">
                                                                    <h3>Visa processes</h3>
                                                                </div>


                                                                   <div class="row">
                                                    <div class="col-sm-6">
                                                    <label class="vis-label">Passport No <i class="fal fa-globe-asia"></i></label>
                                                    <input type="text" placeholder="Passport No" value=""/>                     </div>

                                                     <div class="col-sm-6">
                                                    <label class="vis-label">Past Countries Visit <i class="fal fa-globe-asia"></i></label>
                                                    <input type="text" placeholder="Past Countries Visit" value=""/>                     </div>
                                                                </div>

                                                        <div class="row">
                                                    <div class="col-sm-6">
                                                    <label class="vis-label">Visa Type to apply for<i class="fal fa-globe-asia"></i></label>
                                                    <input type="text" placeholder="Visa Type to apply for" value=""/>                     </div>

                                                     <div class="col-sm-6">
                                                    <label class="vis-label">Duration of Stay <i class="fal fa-globe-asia"></i></label>
                                                    <input type="text" placeholder="Duration of Stay" value=""/>                     </div>
                                                                </div>

                                                                  <div class="row">
                                                    <div class="col-sm-6">
                                                    <label class="vis-label"> Place of Stay<i class="fal fa-globe-asia"></i></label>
                                                    <input type="text" placeholder=" Place of Stay" value=""/>                     </div>

                                                     <div class="col-sm-6">
                                                    <label class="vis-label"> Financial statements<i class="fal fa-globe-asia"></i></label>
                                                    <input type="text" placeholder=" Financial statements" value=""/>                     </div>
                                                                </div>


                                                                <div class="row">
                                                                    <div class="col-sm-12">
                                                                        <label class="vis-label">Street <i class="fal fa-road"></i> </label>
                                                                        <input type="text" placeholder="Your Street" value=""/>                                                  
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                    <div class="col-sm-6">
                                                    <label class="vis-label">City <i class="fal fa-globe-asia"></i></label>
                                                    <input type="text" placeholder="Your city" value=""/>                     </div>
                                                         <div class="col-sm-6">
                                                    <label class="vis-label">Country </label>
                                                <div class="listsearch-input-item ">
                                <select data-placeholder="Your Country" class="chosen-select no-search-select" >
                                                     <option>United states</option>
                                                         <option>Asia</option>
                                                        <option>Australia</option>
                                                            <option>Europe</option>
                                                           <option>South America</option>
                                                          <option>Africa</option>
                                                                 </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-sm-12">
                                                                        <label class="vis-label">Street <i class="fal fa-road"></i> </label>
                                                                        <input type="text" placeholder="Your Street" value=""/>                                                  
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-sm-8">
                                                                        <label class="vis-label">State<i class="fal fa-street-view"></i></label>
                                                                        <input type="text" placeholder="Your State" value=""/>                                                  
                                                                    </div>
                                                                    <div class="col-sm-4">
                                                                        <label class="vis-label">Postal code<i class="fal fa-barcode"></i> </label>
                                                                        <input type="text" placeholder="123456" value=""/>
                                                                    </div>
                                                                </div>
                                                                <div class="list-single-main-item-title fl-wrap">
                                                                    <h3>Addtional Notes</h3>
                                                                </div>
                                                                <textarea cols="40" rows="3" placeholder="Notes"></textarea>
                                                                <span class="fw-separator"></span>
                                                               <!--  <a  href="#"  class="previous-form action-button back-form   color2-bg">Back</a> -->
                                                                <!-- <a  href="#"  class="next-form   action-button color-bg">Payment Step</a> -->
                                                                <input type="submit" name="Submit" value="submit" class="color-bg btn btn-primary">
                                                            </fieldset>
                                                          <!--   <fieldset class="fl-wrap">
                                                                <div class="list-single-main-item-title fl-wrap">
                                                                    <h3>Payment method</h3>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-sm-6">
                                                                        <label class="vis-label">Cardholder's Name<i class="far fa-user"></i></label>
                                                                        <input type="text" placeholder="" value="Adam Kowalsky"/>                                                  
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <label class="vis-label">Card Number <i class="fal fa-credit-card-front"></i></label>
                                                                        <input type="text" placeholder="xxxx-xxxx-xxxx-xxxx" value=""/> 
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-sm-3">
                                                                        <label class="vis-label">Expiry Month<i class="fal fa-calendar"></i></label>
                                                                        <input type="text" placeholder="MM" value=""/>                                                  
                                                                    </div>
                                                                    <div class="col-sm-3">
                                                                        <label class="vis-label">Expiry Year<i class="fal fa-calendar"></i></label>
                                                                        <input type="text" placeholder="YY" value=""/>                                                  
                                                                    </div>
                                                                    <div class="col-sm-2">
                                                                        <label class="vis-label">CVV / CVC *<i class="fal fa-credit-card"></i></label>
                                                                        <input type="password" placeholder="***" value=""/> 
                                                                    </div>
                                                                    <div class="col-sm-4">
                                                                        <p style="padding-top:20px;">*Three digits number on the back of your card</p>
                                                                    </div>
                                                                </div>
                                                                <div class="log-separator fl-wrap"><span>or</span></div>
                                                                <div class="soc-log fl-wrap">
                                                                    <p>Select Other Payment Method</p>
                                                                    <a href="#" class="paypal-log"> Pay With Paypal</a>
                                                                </div>
                                                                <span class="fw-separator"></span>
                                                                <a  href="#"  class="previous-form  back-form action-button    color2-bg">Back</a>
                                                                <a  href="#"  class="next-form  action-button   color-bg">Confirm and Pay</a>                                               
                                                            </fieldset>
                                                            <fieldset class="fl-wrap">
                                                                <div class="list-single-main-item-title fl-wrap">
                                                                    <h3>Confirmation</h3>
                                                                </div>
                                                                <div class="success-table-container">
                                                                    <div class="success-table-header fl-wrap">
                                                                        <i class="fal fa-check-circle decsth"></i>
                                                                        <h4>Thank you. Your reservation has been received.</h4>
                                                                        <div class="clearfix"></div>
                                                                        <p>Your payment has been processed successfully.</p>
                                                                        <a href="invoice.html" target="_blank" class="color-bg">View Invoice</a>
                                                                    </div>
                                                                </div>
                                                                <span class="fw-separator"></span>
                                                                <a  href="#"  class="previous-form action-button  back-form   color2-bg">Back</a>
                                                            </fieldset> -->
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--   list-single-main-item end -->
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                    <!--     <div class="cart-details-wrap fl-wrap">
                                            <div class="cart-details-item-header">
                                                <h3> Your Booking Cart</h3>
                                            </div>
                                         
                                            <div class="cart-details fl-wrap block_box">
                                               
                                                <div class="cart-details_header">
                                                    <a href="#"  class="widget-posts-img"><img src="images/all/48.jpg" class="respimg" alt=""></a>
                                                    <div class="widget-posts-descr">
                                                        <h4><a href="listing-single.html">Iconic Cafe</a></h4>
                                                        <div class="geodir-category-location fl-wrap"><a href="#">40 Journal Square Plaza, NJ, USA</a></div>
                                                        <div class="widget-posts-descr-link"><a href="listing.html" >Restaurants </a>   <a href="listing.html">Cafe</a></div>
                                                    </div>
                                                </div>
                                                     
                                                <div class="cart-details_text">
                                                    <ul class="cart_list no-list-style">
                                                        <li>Date <span>04.11.19</span></li>
                                                        <li>Hour <span>5:30 PM</span></li>
                                                        <li>Guests<span>2 Adults</span></li>
                                                    </ul>
                                                </div>
                                                
                                            </div>
                                         lor2-bg fl-wrap">
                                                <span class="cart-total_item_title">Total Cost</span>
                                                <strong>$190</strong>                                
                                            </div>
                                            
                                        </div>
                                      
                                        <div class="box-widget-item fl-wrap">
                                            <div class="banner-wdget fl-wrap">
                                                <div class="overlay"></div>
                                                <div class="bg"  data-bg="images/bg/12.jpg"></div>
                                                <div class="banner-wdget-content fl-wrap">
                                                    <h4>Still need help in filling out the form  ? Visit our help page. </h4>
                                                    <a href="help.html" class="color-bg" > Visit now</a>
                                                </div>
                                            </div>
                                        </div> -->
                                        <!--box-widget-item end -->                                     
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
                <!--content end-->
            </div>
            <!-- wrapper end-->
           <?php

include('footer.php');

?>