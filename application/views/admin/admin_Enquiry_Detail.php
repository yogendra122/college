<?php

include('header.php');
$where_type = array('id' => $data['in_ac_room_type']);
$room_type = $this->Admin_model->getAll('acco_room_type', $where_type);

?>

<!--== BODY CONTNAINER ==-->
<div class="container-fluid sb2">
    <div class="row">

        <!--== BODY INNER CONTAINER ==-->
        <div class="sb2-2">
            <!--== breadcrumbs ==-->
            <div class="sb2-2-2">
                <ul>
                    <li><a href="#"><i class="fa fa-home" aria-hidden="true"></i> Home</a> </li>
                    <li class="active-bre"><a href="#"> Enquiry Detail</a> </li>

                </ul>
            </div>
            <div class="tz-2 tz-2-admin">
                <div class="tz-2-com tz-2-main">
                    <h4>Enquiry Detail</h4>
                    <!-- Dropdown Structure -->
                    <div class="split-row">
                        <div class="col-md-12">
                            <div class="box-inn-sp ad-inn-page">
                                <div class="tab-inn ad-tab-inn">
                                    <div class="hom-cre-acc-left hom-cre-acc-right">
                                        <div class="">
                                            <?php
                                            if ($data['in_form_cat'] == 2) {
                                            ?>
                                                <form>
                                                    <div class="row">
                                                        <div class="col s6">
                                                            <label>First Name</label>
                                                            <input type="text" readonly name="in_first_name" value="<?php echo $data['in_first_name']; ?>" placeholder="First Name">


                                                        </div>
                                                        <div class="col s6">
                                                            <label>Last Name</label>
                                                            <input type="text" readonly name="in_last_name" placeholder="Last Name" value="<?php echo $data['in_last_name']; ?>">

                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col s6">
                                                            <label>Phone</label>
                                                            <input type="text" readonly value="" name="in_phone" value="<?php echo $data['in_phone']; ?>" placeholder="Phone">

                                                        </div>
                                                        <div class="col s6">
                                                            <label>Email</label>
                                                            <input type="email" readonly name="in_email" value="<?php echo $data['in_email']; ?>" placeholder="Email">

                                                        </div>
                                                    </div>



                                                    <div class="row">
                                                        <div class="col s6">
                                                            <label>Address</label>
                                                            <input type="text" readonly name="in_address" value="<?php echo $data['in_address']; ?>" placeholder="Adress" value="">

                                                        </div>
                                                        <div class="col s6">
                                                            <label>Birthday Date</label>
                                                            <input type="Date" readonly name="in_BirthdayDate" value="<?php echo $data['in_BirthdayDate']; ?>" placeholder="Birthday Date" value="">

                                                        </div>
                                                    </div>
                                                    <div class="row">

                                                        <div class=" col s6">
                                                            <label>May we send text messages to this mobile number?</label>
                                                            <input name="in_send_Text_permi" readonly value="<?php echo $data['in_send_Text_permi']; ?>" type="text" class="validate">

                                                        </div>

                                                        <div class=" col s6">
                                                            <label>Sex Assigned at Birth</label>
                                                            <input type="text" readonly name="in_Sex_birth" value="<?php echo $data['in_Sex_birth']; ?>" placeholder="Sex Assigned at Birth">

                                                        </div>
                                                    </div>

                                                    <div class="row">

                                                        <div class=" col s6">
                                                            <label>Country</label>
                                                            <?php
                                                            $this->db->where('id', $data['in_country']);
                                                            $ab = $this->db->get('countries')->result();
                                                            if(!empty($ab))
                                                            {
                                                                $countryname =  $ab[0]->name;
                                                            }else{
                                                                $countryname =  '';
                                                            }
                                                          
                                                            ?>
                                                            <input name="Country" readonly type="text" value="<?php echo $countryname; ?>">

                                                        </div>

                                                        <div class=" col s6">
                                                            <label>City</label>
                                                            <?php
                                                           
                                                            $this->db->where('id', $data['in_city']);
                                                            $a = $this->db->get('cities')->result();
                                                            if(!empty($a))
                                                            {
                                                            $cityname = $a[0]->name;
                                                            }else{
                                                                $cityname ='';
                                                            }
                                                          
                                                            ?>
                                                            <input type="text" readonly name="City" value="<?php echo $cityname; ?>" placeholder="City">

                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col s6">
                                                            <label>Primary Percentage(%) </label>
                                                            <input type="number" readonly class="hom-cre-acc-right1" value="<?php echo $data['in_primary_percent']; ?>" name="in_primary_percent" placeholder="Primary Percentage(%)" />
                                                        </div>
                                                        <div class="col s6">
                                                            <label> Secondary Percentage(%) </label>
                                                            <input type="number" readonly class="hom-cre-acc-right1" name="in_Secondary_percent" value="<?php echo $data['in_Secondary_percent']; ?>" placeholder="Secondary Percentage(%)" value="" />

                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col s12">
                                                            <label> Questions or Queries *</label>
                                                            <textarea cols="40" readonly rows="3" name="in_message" placeholder="Questions or Queries *" style="margin-bottom:20px;"><?php echo $data['in_message']; ?></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <label> Passport Document</label>
                                                        <div class="col s12">

                                                            <?php
                                                            $document_url = base_url() . 'upload/document/' . $data['in_document'];
                                                            $filename = $data['in_document'];
                                                            $mediapath = base_url('upload/document/') . $filename;
                                                            if (@is_array(getimagesize($mediapath))) {
                                                                $image = 1;
                                                            } else {
                                                                $image = 0;
                                                            }
                                                            if ($image == 0) { ?>
                                                                <div>

                                                                    <object style="width:100%; overflow:hidden;" src="<?php echo $mediapath; ?>"><iframe style="width:450px;height:400px;" src="https://docs.google.com/viewer?url=<?php echo $mediapath; ?>&embedded=true"></iframe></object>
                                                                </div>

                                                            <?php
                                                            } else { ?>
                                                                <div>
                                                                    <img style="height:300px;width:100%;" src="<?php echo $mediapath; ?>" />

                                                                </div>

                                                            <?php
                                                            }
                                                            ?>



                                                        </div>
                                                    </div>
                                                    <div>
                                                        <div>


                                                            <?php
                                                            foreach ($new_form as $v) {
                                                                $input_value = json_decode($v->input_value);
                                                                $form_type = json_decode($v->form_type);
                                                                $form_lable = json_decode($v->form_lable);


                                                                foreach ($form_type as $key => $v2) {

                                                            ?>

                                                                    <?php

                                                                    if (!empty($input_value[$key])) {

                                                                        $input_values =  $input_value[$key];
                                                                    } else {
                                                                        $input_values =  '';
                                                                    }

                                                                    $form_lableData =  $form_lable[$key];

                                                                    if ($v2 == 'text') { ?>
                                                                        <div class="row">
                                                                            <div class="col s12">
                                                                                <label><?php echo $form_lableData; ?> </label>

                                                                                <input readonly type="text" class="hom-cre-acc-right1" name="input_value[]" value=" <?php echo $input_values; ?> " />

                                                                            </div>
                                                                        </div>

                                                                    <?php
                                                                    } else if ($v2 == 'textarea') {
                                                                    ?>
                                                                        <div class="row">
                                                                            <div class="col s12">
                                                                                <label> <?php echo $form_lableData; ?></label>
                                                                                <textarea readonly cols="40" rows="3" name="input_value[]" style="margin-bottom:20px;"> <?php echo $input_values; ?></textarea>

                                                                            </div>
                                                                        </div>

                                                                    <?php

                                                                    } else if ($v2 == 'radio') {

                                                                    ?>
                                                                        <div class="row">
                                                                            <div class="col s12">
                                                                                <label><?php echo $form_lableData; ?></label>

                                                                                <?php
                                                                                if ($input_values == '1') {
                                                                                ?>
                                                                                    <input type="checkbox" readonly checked style="height: 11px !important;opacity: 7!important;position: revert!important;" class="" name="input_value[]" value="<?php echo $input_values; ?>" />
                                                                                <?php
                                                                                } else {
                                                                                ?>
                                                                                    <input type="checkbox" readonly style="height: 11px !important;opacity: 7!important;position: revert!important;" class="" name="input_value[]" value="<?php echo $input_values; ?>" />
                                                                                <?php
                                                                                }
                                                                                ?>

                                                                            </div>
                                                                        </div>
                                                                    <?php
                                                                    } else if ($v2 == 'checkbox') {
                                                                    ?>
                                                                        <div class="row">
                                                                            <div class="col s12">
                                                                                <label><?php echo $form_lableData; ?></label>
                                                                                <label></label>
                                                                                <?php
                                                                                if ($input_values == '1') {
                                                                                ?>
                                                                                    <input type="checkbox" readonly checked style="height: 11px !important;opacity: 7!important;position: revert!important;" value="<?php echo $input_values; ?>" name="input_value[]" />
                                                                                <?php
                                                                                } else {
                                                                                ?>
                                                                                    <input type="checkbox" readonly style="height: 11px !important;opacity: 7!important;position: revert!important;" value="<?php echo $input_values; ?>" name="input_value[]" />
                                                                                <?php
                                                                                }
                                                                                ?>
                                                                                <!-- <input type="checkbox" style="height: 11px !important;opacity: 7!important;position: revert!important;" value="<?php echo $input_values; ?>"  name="input_value[]" /> -->
                                                                            </div>
                                                                        </div>

                                                            <?php
                                                                    }
                                                                }
                                                            }
                                                            ?>


                                                </form>
                                            <?php
                                            }
                                            if ($data['in_form_cat'] == 3) {
                                            ?>
                                                <form>
                                                    <div class="row">
                                                        <div class="col s6">
                                                            <label>First Name</label>
                                                            <input type="text" readonly name="in_first_name" value="<?php echo $data['in_first_name']; ?>" placeholder="First Name">


                                                        </div>
                                                        <div class="col s6">
                                                            <label>Last Name</label>
                                                            <input type="text" readonly name="in_last_name" placeholder="Last Name" value="<?php echo $data['in_last_name']; ?>">

                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col s6">
                                                            <label>Phone</label>
                                                            <input type="text" readonly value="" name="in_phone" value="<?php echo $data['in_phone']; ?>" placeholder="Phone">

                                                        </div>
                                                        <div class="col s6">
                                                            <label>Email</label>
                                                            <input type="email" readonly name="in_email" value="<?php echo $data['in_email']; ?>" placeholder="Email">

                                                        </div>
                                                    </div>



                                                    <div class="row">
                                                        <div class="col s6">
                                                            <label>Address</label>
                                                            <input type="text" readonly name="in_address" value="<?php echo $data['in_address']; ?>" placeholder="Adress" value="">

                                                        </div>
                                                        <div class="col s6">
                                                            <label>Birthday Date</label>
                                                            <input type="Date" readonly name="in_BirthdayDate" value="<?php echo $data['in_BirthdayDate']; ?>" placeholder="Birthday Date" value="">

                                                        </div>
                                                    </div>
                                                    <div class="row">

                                                        <div class=" col s6">
                                                            <label>May we send text messages to this mobile number?</label>
                                                            <input name="in_send_Text_permi" readonly value="<?php echo $data['in_send_Text_permi']; ?>" type="text" class="validate">

                                                        </div>

                                                        <div class=" col s6">
                                                            <label>Sex Assigned at Birth</label>
                                                            <input type="text" readonly name="in_Sex_birth" value="<?php echo $data['in_Sex_birth']; ?>" placeholder="Sex Assigned at Birth">

                                                        </div>
                                                    </div>

                                                    <div class="row">

                                                        <div class=" col s6">
                                                            <label>Country</label>
                                                            <?php
                                                            $this->db->where('id', $data['in_country']);
                                                            $ab = $this->db->get('countries')->result();
                                                            $countryname =  $ab[0]->name;
                                                            ?>
                                                            <input name="Country" readonly type="text" value="<?php echo $countryname; ?>">

                                                        </div>

                                                        <div class=" col s6">
                                                            <label>City</label>
                                                            <?php
                                                            $this->db->where('id', $data['in_city']);
                                                            $a = $this->db->get('cities')->result();
                                                            $cityname = $a[0]->name;
                                                            ?>
                                                            <input type="text" readonly name="City" value="<?php echo $cityname; ?>" placeholder="City">

                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col s6">
                                                            <label>Maximum amount of rent payable you wish to pay(Monthly) </label>
                                                            <input type="text" readonly class="hom-cre-acc-right1" value="<?php echo $data['in_ac_payable_rent']; ?>" name="in_ac_payable_rent" placeholder="" />
                                                        </div>
                                                        <div class="col s6">

                                                            <label>Type of property your require</label>
                                                            <input type="text" readonly class="hom-cre-acc-right1" value="<?php echo $room_type[0]->room_type ?>" name="in_ac_payable_rent" placeholder="" />
                                                        </div>
                                                    </div>



                                                    <div class="row">
                                                        <div class="col s12">
                                                            <label> Questions or Queries *</label>
                                                            <textarea cols="40" readonly rows="3" name="in_message" placeholder="Questions or Queries *" style="margin-bottom:20px;"><?php echo $data['in_message']; ?></textarea>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <label> Passport Document</label>
                                                        <div class="col s12">

                                                            <?php
                                                            $document_url = base_url() . 'upload/document/' . $data['in_document'];
                                                            $filename = $data['in_document'];
                                                            $mediapath = base_url('upload/document/') . $filename;
                                                            if (@is_array(getimagesize($mediapath))) {
                                                                $image = 1;
                                                            } else {
                                                                $image = 0;
                                                            }
                                                            if ($image == 0) { ?>
                                                                <div>

                                                                    <object style="width:100%; overflow:hidden;" src="<?php echo $mediapath; ?>"><iframe style="width:450px;height:400px;" src="https://docs.google.com/viewer?url=<?php echo $mediapath; ?>&embedded=true"></iframe></object>
                                                                </div>

                                                            <?php
                                                            } else { ?>
                                                                <div>
                                                                    <img style="height:300px;width:100%;" src="<?php echo $mediapath; ?>" />

                                                                </div>

                                                            <?php
                                                            }
                                                            ?>



                                                        </div>
                                                    </div>


                                                    <?php
                                                    foreach ($new_form as $v) {
                                                        $input_value = json_decode($v->input_value);
                                                        $form_type = json_decode($v->form_type);
                                                        $form_lable = json_decode($v->form_lable);


                                                        foreach ($form_type as $key => $v2) {

                                                    ?>

                                                            <?php

                                                            if (!empty($input_value[$key])) {

                                                                $input_values =  $input_value[$key];
                                                            } else {
                                                                $input_values =  '';
                                                            }

                                                            $form_lableData =  $form_lable[$key];

                                                            if ($v2 == 'text') { ?>
                                                                <div class="row">
                                                                    <div class="col s12">
                                                                        <label><?php echo $form_lableData; ?> </label>

                                                                        <input readonly type="text" class="hom-cre-acc-right1" name="input_value[]" value=" <?php echo $input_values; ?> " />

                                                                    </div>
                                                                </div>

                                                            <?php
                                                            } else if ($v2 == 'textarea') {
                                                            ?>
                                                                <div class="row">
                                                                    <div class="col s12">
                                                                        <label> <?php echo $form_lableData; ?></label>
                                                                        <textarea readonly cols="40" rows="3" name="input_value[]" style="margin-bottom:20px;"> <?php echo $input_values; ?></textarea>

                                                                    </div>
                                                                </div>

                                                            <?php

                                                            } else if ($v2 == 'radio') {

                                                            ?>
                                                                <div class="row">
                                                                    <div class="col s12">
                                                                        <label><?php echo $form_lableData; ?></label>

                                                                        <?php
                                                                        if ($input_values == '1') {
                                                                        ?>
                                                                            <input type="checkbox" readonly checked style="height: 11px !important;opacity: 7!important;position: revert!important;" class="" name="input_value[]" value="<?php echo $input_values; ?>" />
                                                                        <?php
                                                                        } else {
                                                                        ?>
                                                                            <input type="checkbox" readonly style="height: 11px !important;opacity: 7!important;position: revert!important;" class="" name="input_value[]" value="<?php echo $input_values; ?>" />
                                                                        <?php
                                                                        }
                                                                        ?>

                                                                    </div>
                                                                </div>
                                                            <?php
                                                            } else if ($v2 == 'checkbox') {
                                                            ?>
                                                                <div class="row">
                                                                    <div class="col s12">
                                                                        <label><?php echo $form_lableData; ?></label>
                                                                        <label></label>
                                                                        <?php
                                                                        if ($input_values == '1') {
                                                                        ?>
                                                                            <input type="checkbox" readonly checked style="height: 11px !important;opacity: 7!important;position: revert!important;" value="<?php echo $input_values; ?>" name="input_value[]" />
                                                                        <?php
                                                                        } else {
                                                                        ?>
                                                                            <input type="checkbox" readonly style="height: 11px !important;opacity: 7!important;position: revert!important;" value="<?php echo $input_values; ?>" name="input_value[]" />
                                                                        <?php
                                                                        }
                                                                        ?>
                                                                        <!-- <input type="checkbox" style="height: 11px !important;opacity: 7!important;position: revert!important;" value="<?php echo $input_values; ?>"  name="input_value[]" /> -->
                                                                    </div>
                                                                </div>

                                                    <?php
                                                            }
                                                        }
                                                    }
                                                    ?>


                                                </form>
                                            <?php
                                            }

                                            if ($data['in_form_cat'] == 6) {
                                            ?>
                                                <form>
                                                    <div class="row">
                                                        <div class="col s6">
                                                            <label>First Name</label>
                                                            <input type="text" readonly name="in_first_name" value="<?php echo $data['in_first_name']; ?>" placeholder="First Name">


                                                        </div>
                                                        <div class="col s6">
                                                            <label>Last Name</label>
                                                            <input type="text" readonly name="in_last_name" placeholder="Last Name" value="<?php echo $data['in_last_name']; ?>">

                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col s6">
                                                            <label>Phone</label>
                                                            <input type="text" readonly value="" name="in_phone" value="<?php echo $data['in_phone']; ?>" placeholder="Phone">

                                                        </div>
                                                        <div class="col s6">
                                                            <label>Email</label>
                                                            <input type="email" readonly name="in_email" value="<?php echo $data['in_email']; ?>" placeholder="Email">

                                                        </div>
                                                    </div>



                                                    <div class="row">
                                                        <div class="col s6">
                                                            <label>Address</label>
                                                            <input type="text" readonly name="in_address" value="<?php echo $data['in_address']; ?>" placeholder="Adress" value="">

                                                        </div>
                                                        <div class="col s6">
                                                            <label>Birthday Date</label>
                                                            <input type="Date" readonly name="in_BirthdayDate" value="<?php echo $data['in_BirthdayDate']; ?>" placeholder="Birthday Date" value="">

                                                        </div>
                                                    </div>
                                                    <div class="row">

                                                        <div class=" col s6">
                                                            <label>May we send text messages to this mobile number?</label>
                                                            <input name="in_send_Text_permi" readonly value="<?php echo $data['in_send_Text_permi']; ?>" type="text" class="validate">

                                                        </div>

                                                        <div class=" col s6">
                                                            <label>Sex Assigned at Birth</label>
                                                            <input type="text" readonly name="in_Sex_birth" value="<?php echo $data['in_Sex_birth']; ?>" placeholder="Sex Assigned at Birth">

                                                        </div>
                                                    </div>

                                                    <div class="row">

                                                        <div class=" col s6">
                                                            <label>Country</label>
                                                            <?php
                                                            $this->db->where('id', $data['in_country']);
                                                            $ab = $this->db->get('countries')->result();
                                                            $countryname =  $ab[0]->name;
                                                            ?>
                                                            <input name="Country" readonly type="text" value="<?php echo $countryname; ?>">

                                                        </div>

                                                        <div class=" col s6">
                                                            <label>City</label>
                                                            <?php
                                                            $this->db->where('id', $data['in_city']);
                                                            $a = $this->db->get('cities')->result();
                                                            $cityname = $a[0]->name;
                                                            ?>
                                                            <input type="text" readonly name="City" value="<?php echo $cityname; ?>" placeholder="City">

                                                        </div>
                                                    </div>


                                                    <div class="row">
                                                        <div class="col s6">
                                                            <label>Where would you like to Travel? </label>
                                                            <input type="text" readonly class="hom-cre-acc-right1" value="<?php echo $data['in_tur_travelPlace']; ?>" name="in_tur_travelPlace" placeholder="Where would you like to Travel?" />
                                                        </div>
                                                        <div class="col s6">
                                                            <label>What is your budget for this trip(per person)? **Please enter a Dollar Amount***? </label>
                                                            <input type="text" readonly class="hom-cre-acc-right1" name="in_tur_bud_amoutn" value="<?php echo $data['in_tur_bud_amoutn']; ?>" placeholder="Amount" />

                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col s6">
                                                            <label>What is your Departure Date? </label>
                                                            <input type="date" readonly class="hom-cre-acc-right1" value="<?php echo $data['in_tur_Departure_date']; ?>" name="in_tur_Departure_date" placeholder="What is your Departure Date?" />
                                                        </div>
                                                        <div class="col s6">
                                                            <label>What is your Return Date? </label>
                                                            <input type="date" readonly class="hom-cre-acc-right1" name="in_tur_Return_date" value="<?php echo $data['in_tur_Return_date']; ?>" placeholder="What is your Return Date?" value="" />

                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col s12">
                                                            <label> Questions or Queries *</label>
                                                            <textarea cols="40" readonly rows="3" name="in_message" placeholder="Questions or Queries *" style="margin-bottom:20px;"><?php echo $data['in_message']; ?></textarea>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <label> Passport Document</label>
                                                        <div class="col s12">

                                                            <?php
                                                            $document_url = base_url() . 'upload/document/' . $data['in_document'];
                                                            $filename = $data['in_document'];
                                                            $mediapath = base_url('upload/document/') . $filename;
                                                            if (@is_array(getimagesize($mediapath))) {
                                                                $image = 1;
                                                            } else {
                                                                $image = 0;
                                                            }
                                                            if ($image == 0) { ?>
                                                                <div>

                                                                    <object style="width:100%; overflow:hidden;" src="<?php echo $mediapath; ?>"><iframe style="width:450px;height:400px;" src="https://docs.google.com/viewer?url=<?php echo $mediapath; ?>&embedded=true"></iframe></object>
                                                                </div>

                                                            <?php
                                                            } else { ?>
                                                                <div>
                                                                    <img style="height:300px;width:100%;" src="<?php echo $mediapath; ?>" />

                                                                </div>

                                                            <?php
                                                            }
                                                            ?>



                                                        </div>
                                                    </div>



                                                    <?php
                                                    foreach ($new_form as $v) {
                                                        $input_value = json_decode($v->input_value);
                                                        $form_type = json_decode($v->form_type);
                                                        $form_lable = json_decode($v->form_lable);


                                                        foreach ($form_type as $key => $v2) {

                                                    ?>

                                                            <?php

                                                            if (!empty($input_value[$key])) {

                                                                $input_values =  $input_value[$key];
                                                            } else {
                                                                $input_values =  '';
                                                            }

                                                            $form_lableData =  $form_lable[$key];

                                                            if ($v2 == 'text') { ?>
                                                                <div class="row">
                                                                    <div class="col s12">
                                                                        <label><?php echo $form_lableData; ?> </label>

                                                                        <input readonly type="text" class="hom-cre-acc-right1" name="input_value[]" value=" <?php echo $input_values; ?> " />

                                                                    </div>
                                                                </div>

                                                            <?php
                                                            } else if ($v2 == 'textarea') {
                                                            ?>
                                                                <div class="row">
                                                                    <div class="col s12">
                                                                        <label> <?php echo $form_lableData; ?></label>
                                                                        <textarea readonly cols="40" rows="3" name="input_value[]" style="margin-bottom:20px;"> <?php echo $input_values; ?></textarea>

                                                                    </div>
                                                                </div>

                                                            <?php

                                                            } else if ($v2 == 'radio') {

                                                            ?>
                                                                <div class="row">
                                                                    <div class="col s12">
                                                                        <label><?php echo $form_lableData; ?></label>

                                                                        <?php
                                                                        if ($input_values == '1') {
                                                                        ?>
                                                                            <input type="checkbox" readonly checked style="height: 11px !important;opacity: 7!important;position: revert!important;" class="" name="input_value[]" value="<?php echo $input_values; ?>" />
                                                                        <?php
                                                                        } else {
                                                                        ?>
                                                                            <input type="checkbox" readonly style="height: 11px !important;opacity: 7!important;position: revert!important;" class="" name="input_value[]" value="<?php echo $input_values; ?>" />
                                                                        <?php
                                                                        }
                                                                        ?>

                                                                    </div>
                                                                </div>
                                                            <?php
                                                            } else if ($v2 == 'checkbox') {
                                                            ?>
                                                                <div class="row">
                                                                    <div class="col s12">
                                                                        <label><?php echo $form_lableData; ?></label>
                                                                        <label></label>
                                                                        <?php
                                                                        if ($input_values == '1') {
                                                                        ?>
                                                                            <input type="checkbox" readonly checked style="height: 11px !important;opacity: 7!important;position: revert!important;" value="<?php echo $input_values; ?>" name="input_value[]" />
                                                                        <?php
                                                                        } else {
                                                                        ?>
                                                                            <input type="checkbox" readonly style="height: 11px !important;opacity: 7!important;position: revert!important;" value="<?php echo $input_values; ?>" name="input_value[]" />
                                                                        <?php
                                                                        }
                                                                        ?>
                                                                        <!-- <input type="checkbox" style="height: 11px !important;opacity: 7!important;position: revert!important;" value="<?php echo $input_values; ?>"  name="input_value[]" /> -->
                                                                    </div>
                                                                </div>

                                                    <?php
                                                            }
                                                        }
                                                    }
                                                    ?>


                                                </form>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include 'footer.php';
?>