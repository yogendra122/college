<?php


include('header.php');

?>

<div id="wrapper">
    <!-- content-->
    <div class="content">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="dashboard-title fl-wrap">
                <h3>Enquiry Form</h3>
            </div>
            <?php
            if ($form_id == 2) {
            ?>
                <!-- university Enquiry Form-->
                <div style="margin-bottom: 35px !important" class="profile-edit-container fl-wrap block_box">
                    <div class="custom-form">
                        <form id="inquireyform" action-attr="action_addinquirey" action="javascript:void(0)" method="post" enctype="multipart/form-data" class="add-comment custom-form">
                            <!--                                 <form action="" method="post" enctype="multipart/form-data"> -->
                            <input type="hidden" name="in_form_cat" value="<?php echo $form_id; ?>">
                            <input type="hidden" name="in_userid" value="<?php echo $in_userid; ?>">
                            <input type="hidden" name="in_universityid" value="<?php echo $in_universityid; ?>">
                            <div class="row">


                                <div class="col-sm-6">
                                    <label>First Name<i class="fal fa-user"></i></label>
                                    <input type="text" name="in_first_name" placeholder="First Name" value="" required />
                                </div>
                                <div class="col-sm-6">
                                    <label>Last Name <i class="fal fa-user"></i></label>
                                    <input type="text" name="in_last_name" placeholder="Last Name" value="" />
                                </div>
                                <div class="col-sm-6">
                                    <label>Email Address<i class="far fa-envelope"></i> </label>
                                    <input type="email" name="in_email" value="" placeholder="Email" required/>
                                </div>
                                <div class="col-sm-6">
                                    <label>Phone<i class="far fa-phone"></i> </label>
                                    <input type="text" value="" name="in_phone" placeholder="Phone" required />
                                </div>
                                <div class="col-sm-6">
                                    <label> Address <i class="fas fa-map-marker"></i> </label>
                                    <input type="text" name="in_address" value="" placeholder="Adress" required value="" />

                                </div>

                                <style>
                                    .hom-cre-acc-right1 {
                                        height: 45px;
                                        position: relative;
                                        padding: 5px 24px;
                                        box-sizing: border-box;
                                        box-shadow: none;
                                        border: 1px solid #e8e8e8;
                                        text-indent: 0;
                                        line-height: 12px;
                                        -webkit-transition: border-color .4s, color .4s;
                                        transition: border-color .4s, color .4s;
                                        /* -webkit-appearance: none; */
                                        width: 100%;
                                        font-size: 14px;
                                        background: #fff;
                                    }
                                </style>
                                <div class="col-sm-6">
                                    <label> Birthday Date <i class="fas fa-map-marker "></i> </label>
                                    <input type="Date" class="hom-cre-acc-right1" name="in_BirthdayDate" value="" placeholder=" Birthday Date" value="" />

                                </div>

                                <div class="col-sm-6">

                                </div>

                                <div class="col-sm-6">
                                    <label>May we send text messages to this mobile number?</label>
                                    <select class="hom-cre-acc-right1" name="in_send_Text_permi">

                                        <option value="Yes">Yes</option>
                                        <option value="No">No</option>

                                    </select>
                                </div>
                                <div class="col-sm-6">
                                    <label>Sex Assigned at Birth</label>
                                    <select class="hom-cre-acc-right1" name="in_Sex_birth">

                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                        <option value="Other">Other</option>
                                    </select>
                                </div>
                                <div class="col-sm-12">
                                    <label>Country</label>
                                    <select class="hom-cre-acc-right1" id="country" name="in_country">

                                        <?php
                                        foreach ($country as $row) {
                                            echo '<option value="' . $row->id . '">' . $row->name . '</option>';
                                        }
                                        ?>

                                    </select>
                                </div>
                                <div class="col-sm-6">
                                    <label>State</label>
                                    <select class="hom-cre-acc-right1" id="state" name="in_state">
                                    </select>
                                </div>
                                <div class="col-sm-6">
                                    <label>City</label>
                                    <select class="hom-cre-acc-right1" id="city" name="in_city">
                                        <option value="2">Indore</option>
                                        <option value="3">Darglned</option>
                                    </select>
                                </div>
                                <div class="col-sm-6">
                                    <label>Primary Percentage(%)<i class="far fa-phone"></i> </label>
                                    <input type="number" class="hom-cre-acc-right1" value="" name="in_primary_percent" placeholder="Primary Percentage(%)" />
                                </div>
                                <div class="col-sm-6">
                                    <label> Secondary Percentage(%) <i class="fas fa-map-marker"></i> </label>
                                    <input type="number" class="hom-cre-acc-right1" name="in_Secondary_percent" value="" placeholder="Secondary Percentage(%)" value="" />

                                </div>



                                
                                <div class="col-sm-12">
                                    <label> Questions or Queries *</label>
                                    <textarea cols="40" rows="3" name="in_message" placeholder="Questions or Queries *" style="margin-bottom:20px;"></textarea>
                                </div>

                                <div  class="col-sm-12">
                                    <label for="internet">Passport Upload</label>
                                   
                                        <div style="float: left;" > <span>File</span>
                                            <input type="file" name="in_document" multiple>
                                        </div>
                                      
                                  
                                </div>


                                <?php
                                foreach ($new_form as $v) {
                                    $labe_name = json_decode($v->lable_name);
                                    $form_type = json_decode($v->form_type);

                                    foreach ($form_type as $key => $v2) {
                                ?>
                                        <input type="hidden" value="<?php echo $v2; ?>" name="form_type[]">
                                        <?php

                                        $lablename =  $labe_name[$key];
                                        if ($v2 == 'text') { ?>
                                            <div class="col-sm-6">
                                                <label> <?php echo $lablename; ?> <i class="fas fa-map-marker"></i> </label>
                                                <input type="text" class="hom-cre-acc-right1" name="input_value[]" value="" />
                                                <input type="hidden" class="hom-cre-acc-right1" name="form_lable[]" value="<?php echo $lablename; ?>" />

                                            </div>

                                        <?php
                                        } else if ($v2 == 'textarea') {
                                        ?>

                                            <div class="col-sm-12">
                                                <label><?php echo $lablename; ?></label>
                                                <textarea cols="40" rows="3" name="input_value[]" style="margin-bottom:20px;"></textarea>
                                                <input type="hidden" class="hom-cre-acc-right1" name="form_lable[]" value="<?php echo $lablename; ?>" />

                                            </div>
                                        <?php

                                        } else if ($v2 == 'radio') {
                                        ?>
                                            <label id="ssradio"> <?php echo $lablename; ?> </label>
                                            <input type="checkbox" checked style="height: 11px !important;" class="hom-cre-acc-right1 add-more-radio" name="input_value[]" value="1" />
                                            <input type="hidden" class="hom-cre-acc-right1" name="form_lable[]" value="<?php echo $lablename; ?>" />


                                        <?php
                                        } else if ($v2 == 'checkbox') {
                                        ?>
                                            <label id="ss"> <?php echo $lablename; ?> </label>
                                            <input type="checkbox" id="set" checked style="height: 11px !important;" class="add-more-check" name="input_value[]" value="1" />
                                            <input type="hidden" class="hom-cre-acc-right1" name="form_lable[]" value="<?php echo $lablename; ?>" />

                                <?php
                                        }
                                    }
                                }
                                ?>

                                <div class="custom-form">
                                    <button type="submit" class="btn    color2-bg  float-btn">Submit<i class="fal fa-save"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- university Enquiry Form End-->
            <?php
            }
            if ($form_id == 3) {
            ?>
                <!-- accomodation Enquiry Form-->
                <div style="margin-bottom: 35px !important" class="profile-edit-container fl-wrap block_box">
                    <div class="custom-form">
                        <form id="inquireyform" action-attr="action_addinquirey" action="javascript:void(0)" method="post" enctype="multipart/form-data" class="add-comment custom-form">
                            <!--                                 <form action="" method="post" enctype="multipart/form-data"> -->

                            <input type="hidden" name="in_form_cat" value="<?php echo $form_id; ?>">
                            <input type="hidden" name="in_userid" value="<?php echo $in_userid; ?>">
                            <input type="hidden" name="in_universityid" value="<?php echo $in_universityid; ?>">
                            <div class="row">


                                <div class="col-sm-6">
                                    <label>First Name<i class="fal fa-user"></i></label>
                                    <input type="text" name="in_first_name" placeholder="First Name" value="" required/>
                                </div>
                                <div class="col-sm-6">
                                    <label>Last Name <i class="fal fa-user"></i></label>
                                    <input type="text" name="in_last_name" placeholder="Last Name" value="" />
                                </div>
                                <div class="col-sm-6">
                                    <label>Email Address<i class="far fa-envelope"></i> </label>
                                    <input type="email" name="in_email" value="" placeholder="Email" required />
                                </div>
                                <div class="col-sm-6">
                                    <label>Phone<i class="far fa-phone"></i> </label>
                                    <input type="text" value="" name="in_phone" placeholder="Phone" />
                                </div>
                                <div class="col-sm-6">
                                    <label> Address <i class="fas fa-map-marker"></i> </label>
                                    <input type="text" name="in_address" value="" placeholder="Address" required value="" />

                                </div>

                                <style>
                                    .hom-cre-acc-right1 {
                                        height: 45px;
                                        position: relative;
                                        padding: 5px 24px;
                                        box-sizing: border-box;
                                        box-shadow: none;
                                        border: 1px solid #e8e8e8;
                                        text-indent: 0;
                                        line-height: 12px;
                                        -webkit-transition: border-color .4s, color .4s;
                                        transition: border-color .4s, color .4s;
                                        /* -webkit-appearance: none; */
                                        width: 100%;
                                        font-size: 14px;
                                        background: #fff;
                                    }
                                </style>
                                <div class="col-sm-6">
                                    <label> Birthday Date <i class="fas fa-map-marker "></i> </label>
                                    <input type="Date" class="hom-cre-acc-right1" name="in_BirthdayDate" value="" placeholder=" Birthday Date" value="" />

                                </div>

                                <div class="col-sm-6">

                                </div>

                                <div class="col-sm-6">
                                    <label>May we send text messages to this mobile number?</label>
                                    <select class="hom-cre-acc-right1" name="in_send_Text_permi">

                                        <option value="1">Yes</option>
                                        <option value="0">No</option>

                                    </select>
                                </div>
                                <div class="col-sm-6">
                                    <label>Sex Assigned at Birth</label>
                                    <select class="hom-cre-acc-right1" name="in_Sex_birth">

                                        <option value="1">Male</option>
                                        <option value="2">Female</option>
                                        <option value="3">Other</option>
                                    </select>
                                </div>
                                <div class="col-sm-12">
                                    <label>Country</label>
                                    <select class="hom-cre-acc-right1" id="country" name="in_country">

                                        <?php
                                        foreach ($country as $row) {
                                            echo '<option value="' . $row->id . '">' . $row->name . '</option>';
                                        }
                                        ?>

                                    </select>
                                </div>
                                <div class="col-sm-6">
                                    <label>State</label>
                                    <select class="hom-cre-acc-right1" id="state" name="in_state">
                                    </select>
                                </div>
                                <div class="col-sm-6">
                                    <label>City</label>
                                    <select class="hom-cre-acc-right1" id="city" name="in_city">
                                        <option value="2">Indore</option>
                                        <option value="3">Darglned</option>
                                    </select>
                                </div>
                                <div class="col-sm-6">
                                    <label>Maximum amount of rent payable you wish to pay(Monthly):<i class="far fa-phone"></i> </label>
                                    <input type="text" class="hom-cre-acc-right1" value="$" name="in_ac_payable_rent" placeholder="" />
                                </div>
                                <div class="col-sm-6">
                                    <label>Type of property your require</label>
                                    <select class="hom-cre-acc-right1" name="in_ac_room_type">
                                        <!-- <option value="">Select Type of property your require</option> -->
                                        <option value="1">Standard Room</option>
                                        <option value="2">Family Room</option>
                                        <option value="3">Private Room</option>
                                        <option value="4">Mix Dorm Room(6 people)</option>
                                        <option value="5">Female Dorm Room(6 people)</option>
                                        <option value="6">Male Dorm (6 people)</option>
                                    </select>

                                </div>




                                <div class="col-sm-12">
                                    <label> Questions or Details of property requirements, requests and preferences: *</label>
                                    <textarea cols="40" rows="3" name="in_message" placeholder="Questions or Queries *" style="margin-bottom:20px;"></textarea>
                                </div>

                                <div  class="col-sm-12">
                                    <label for="internet">Passport Upload</label>
                                   
                                        <div style="float: left;" > <span>File</span>
                                            <input type="file" name="in_document" multiple>
                                        </div>
                                      
                                  
                                </div>


                                <?php
                                foreach ($new_form as $v) {
                                    $labe_name = json_decode($v->lable_name);
                                    $form_type = json_decode($v->form_type);

                                    foreach ($form_type as $key => $v2) {
                                ?>
                                        <input type="hidden" value="<?php echo $v2; ?>" name="form_type[]">
                                        <?php

                                        $lablename =  $labe_name[$key];
                                        if ($v2 == 'text') { ?>
                                            <div class="col-sm-6">
                                                <label> <?php echo $lablename; ?> <i class="fas fa-map-marker"></i> </label>
                                                <input type="text" class="hom-cre-acc-right1" name="input_value[]" value="" />
                                                <input type="hidden" class="hom-cre-acc-right1" name="form_lable[]" value="<?php echo $lablename; ?>" />

                                            </div>

                                        <?php
                                        } else if ($v2 == 'textarea') {
                                        ?>

                                            <div class="col-sm-12">
                                                <label><?php echo $lablename; ?></label>
                                                <textarea cols="40" rows="3" name="input_value[]" style="margin-bottom:20px;"></textarea>
                                                <input type="hidden" class="hom-cre-acc-right1" name="form_lable[]" value="<?php echo $lablename; ?>" />

                                            </div>
                                        <?php

                                        } else if ($v2 == 'radio') {
                                        ?>
                                            <label id="ssradio"> <?php echo $lablename; ?> </label>
                                            <input type="checkbox" checked style="height: 11px !important;" class="hom-cre-acc-right1 add-more-radio" name="input_value[]" value="1" />
                                            <input type="hidden" class="hom-cre-acc-right1" name="form_lable[]" value="<?php echo $lablename; ?>" />


                                        <?php
                                        } else if ($v2 == 'checkbox') {
                                        ?>
                                            <label id="ss"> <?php echo $lablename; ?> </label>
                                            <input type="checkbox" id="set" checked style="height: 11px !important;" class="add-more-check" name="input_value[]" value="1" />
                                            <input type="hidden" class="hom-cre-acc-right1" name="form_lable[]" value="<?php echo $lablename; ?>" />

                                <?php
                                        }
                                    }
                                }
                                ?>

                                <div class="custom-form">
                                    <button type="submit" class="btn    color2-bg  float-btn">Submit<i class="fal fa-save"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- accomodation Enquiry Form End-->

            <?php
            }
            if ($form_id == 6) {
            ?>
                <!-- Tourism Enquiry Form-->
                <div style="margin-bottom: 35px !important" class="profile-edit-container fl-wrap block_box">
                    <div class="custom-form">
                        <form id="inquireyform" action-attr="action_addinquirey" action="javascript:void(0)" method="post" enctype="multipart/form-data" class="add-comment custom-form">
                            <!--                                 <form action="" method="post" enctype="multipart/form-data"> -->

                            <input type="hidden" name="in_form_cat" value="<?php echo $form_id; ?>">
                            <input type="hidden" name="in_userid" value="<?php echo $in_userid; ?>">
                            <input type="hidden" name="in_universityid" value="<?php echo $in_universityid; ?>">
                            <div class="row">


                                <div class="col-sm-6">
                                    <label>First Name<i class="fal fa-user"></i></label>
                                    <input type="text" name="in_first_name" placeholder="First Name" value="" />
                                </div>
                                <div class="col-sm-6">
                                    <label>Last Name <i class="fal fa-user"></i></label>
                                    <input type="text" name="in_last_name" placeholder="Last Name" value="" />
                                </div>
                                <div class="col-sm-6">
                                    <label>Email Address<i class="far fa-envelope"></i> </label>
                                    <input type="email" name="in_email" value="" placeholder="Email" />
                                </div>
                                <div class="col-sm-6">
                                    <label>Phone<i class="far fa-phone"></i> </label>
                                    <input type="text" value="" name="in_phone" placeholder="Phone" />
                                </div>
                                <div class="col-sm-6">
                                    <label> Address <i class="fas fa-map-marker"></i> </label>
                                    <input type="text" name="in_address" value="" placeholder="Adress" value="" />

                                </div>

                                <style>
                                    .hom-cre-acc-right1 {
                                        height: 45px;
                                        position: relative;
                                        padding: 5px 24px;
                                        box-sizing: border-box;
                                        box-shadow: none;
                                        border: 1px solid #e8e8e8;
                                        text-indent: 0;
                                        line-height: 12px;
                                        -webkit-transition: border-color .4s, color .4s;
                                        transition: border-color .4s, color .4s;
                                        /* -webkit-appearance: none; */
                                        width: 100%;
                                        font-size: 14px;
                                        background: #fff;
                                    }
                                </style>
                                <div class="col-sm-6">
                                    <label> Birthday Date <i class="fas fa-map-marker "></i> </label>
                                    <input type="Date" class="hom-cre-acc-right1" name="in_BirthdayDate" value="" placeholder=" Birthday Date" value="" />

                                </div>

                                <div class="col-sm-6">

                                </div>

                                <div class="col-sm-6">
                                    <label>May we send text messages to this mobile number?</label>
                                    <select class="hom-cre-acc-right1" name="in_send_Text_permi">

                                        <option value="1">Yes</option>
                                        <option value="0">No</option>

                                    </select>
                                </div>
                                <div class="col-sm-6">
                                    <label>Sex Assigned at Birth</label>
                                    <select class="hom-cre-acc-right1" name="in_Sex_birth">

                                        <option value="1">Male</option>
                                        <option value="2">Female</option>
                                        <option value="3">Other</option>
                                    </select>
                                </div>
                                <div class="col-sm-12">
                                    <label>Country</label>
                                    <select class="hom-cre-acc-right1" id="country" name="in_country">

                                        <?php
                                        foreach ($country as $row) {
                                            echo '<option value="' . $row->id . '">' . $row->name . '</option>';
                                        }
                                        ?>

                                    </select>
                                </div>
                                <div class="col-sm-6">
                                    <label>State</label>
                                    <select class="hom-cre-acc-right1" id="state" name="in_state">
                                    </select>
                                </div>
                                <div class="col-sm-6">
                                    <label>City</label>
                                    <select class="hom-cre-acc-right1" id="city" name="in_city">
                                        <option value="2">Indore</option>
                                        <option value="3">Darglned</option>
                                    </select>
                                </div>
                                <div class="col-sm-6">
                                    <label>Where would you like to Travel?<i class="far fa-phone"></i> </label>
                                    <input type="text" class="hom-cre-acc-right1" value="" name="in_tur_travelPlace" placeholder="Where would you like to Travel?" />
                                </div>
                                <div class="col-sm-6">
                                    <label>What is your budget for this trip(per person)? **Please enter a Dollar Amount*** <i class="fas fa-map-marker"></i> </label>
                                    <input type="text" class="hom-cre-acc-right1" name="in_tur_bud_amoutn" value="$" placeholder="Amount" value="" />

                                </div>
                                <div class="col-sm-6">
                                    <label>What is your Departure Date?<i class="far fa-phone"></i> </label>
                                    <input type="date" class="hom-cre-acc-right1" value="" name="in_tur_Departure_date" placeholder="What is your Departure Date?" />
                                </div>
                                <div class="col-sm-6">
                                    <label>What is your Return Date? <i class="fas fa-map-marker"></i> </label>
                                    <input type="date" class="hom-cre-acc-right1" name="in_tur_Return_date" value="" placeholder="What is your Return Date?" value="" />

                                </div>




                                <div class="col-sm-12">
                                    <label> Questions or Queries *</label>
                                    <textarea cols="40" rows="3" name="in_message" placeholder="Questions or Queries *" style="margin-bottom:20px;"></textarea>
                                </div>
                                <div  class="col-sm-12">
                                    <label for="internet">Passport Upload</label>
                                   
                                        <div style="float: left;" > <span>File</span>
                                            <input type="file" name="in_document" multiple>
                                        </div>
                                      
                                  
                                </div>

                                <?php
                                foreach ($new_form as $v) {
                                    $labe_name = json_decode($v->lable_name);
                                    $form_type = json_decode($v->form_type);

                                    foreach ($form_type as $key => $v2) {
                                ?>
                                        <input type="hidden" value="<?php echo $v2; ?>" name="form_type[]">
                                        <?php

                                        $lablename =  $labe_name[$key];
                                        if ($v2 == 'text') { ?>
                                            <div class="col-sm-6">
                                                <label> <?php echo $lablename; ?> <i class="fas fa-map-marker"></i> </label>
                                                <input type="text" class="hom-cre-acc-right1" name="input_value[]" value="" />
                                                <input type="hidden" class="hom-cre-acc-right1" name="form_lable[]" value="<?php echo $lablename; ?>" />

                                            </div>

                                        <?php
                                        } else if ($v2 == 'textarea') {
                                        ?>

                                            <div class="col-sm-12">
                                                <label><?php echo $lablename; ?></label>
                                                <textarea cols="40" rows="3" name="input_value[]" style="margin-bottom:20px;"></textarea>
                                                <input type="hidden" class="hom-cre-acc-right1" name="form_lable[]" value="<?php echo $lablename; ?>" />

                                            </div>
                                        <?php

                                        } else if ($v2 == 'radio') {
                                        ?>
                                            <label id="ssradio"> <?php echo $lablename; ?> </label>
                                            <input type="checkbox" checked style="height: 11px !important;" class="hom-cre-acc-right1 add-more-radio" name="input_value[]" value="1" />
                                            <input type="hidden" class="hom-cre-acc-right1" name="form_lable[]" value="<?php echo $lablename; ?>" />


                                        <?php
                                        } else if ($v2 == 'checkbox') {
                                        ?>
                                            <label id="ss"> <?php echo $lablename; ?> </label>
                                            <input type="checkbox" id="set" checked style="height: 11px !important;" class="add-more-check" name="input_value[]" value="1" />
                                            <input type="hidden" class="hom-cre-acc-right1" name="form_lable[]" value="<?php echo $lablename; ?>" />

                                <?php
                                        }
                                    }
                                }
                                ?>
                                <div class="custom-form">
                                    <button type="submit" class="btn    color2-bg  float-btn">Submit<i class="fal fa-save"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- Tourism Enquiry Form End-->
            <?php
            }
            ?>


        </div>
    </div>

</div>
<div class="limit-box fl-wrap"></div>
<?php
include('footer.php');
?>
<script>
    $(document).ready(function() {
        $('#country').change(function() {

            var country_id = $('#country').val();
            if (country_id != '') {
                $.ajax({
                    url: "<?php echo base_url(); ?>fetch_state",
                    method: "POST",
                    data: {
                        country_id: country_id
                    },
                    success: function(data) {
                        $('#state').html(data);
                        $('#city').html('<option value="">Select City</option>');
                    }
                });
            } else {
                $('#state').html('<option value="">Select State</option>');
                $('#city').html('<option value="">Select City</option>');
            }
        });

        $('#state').change(function() {
            var state_id = $('#state').val();
            if (state_id != '') {
                $.ajax({
                    url: "<?php echo base_url(); ?>fetch_city",
                    method: "POST",
                    data: {
                        state_id: state_id
                    },
                    success: function(data) {
                        $('#city').html(data);
                    }
                });
            } else {
                $('#city').html('<option value="">Select City</option>');
            }
        });

    });
</script>