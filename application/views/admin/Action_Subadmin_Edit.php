<?php
include('header.php');
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
                    <li class="active-bre"><a href="#"> Edit Admin</a> </li>

                </ul>
            </div>
            <div class="tz-2 tz-2-admin">
                <div class="tz-2-com tz-2-main">
                    <h4>Edit Admin</h4>
                    <!-- Dropdown Structure -->
                    <div class="split-row">
                        <div class="col-md-12">
                            <div class="box-inn-sp ad-inn-page">
                                <div class="tab-inn ad-tab-inn">
                                    <div class="hom-cre-acc-left hom-cre-acc-right">
                                        <div class="">
                                            <form id="Action_Edit_Subadmin" action-attr="Action_Edit_Subadmin" action="javascript:void(0)" method="post" enctype="multipart/form-data">
                                                <input type="hidden" name="admin_id" value="<?php echo $data['admin_id'];?>">
                                                <div class="row">
                                                    <div class=" col s6">
                                                    <label for="admin_name">Name</label>
                                                        <input id="admin_name" name="admin_name" placeholder="Name" type="text" value="<?php echo $data['admin_name'];?>" class="validate">
                                                    </div>
                                                    <div class="col s6">
                                                    <label for="first_name">First Name</label>
                                                        <input id="first_name" name="first_name" placeholder="First Name" value="<?php echo $data['first_name'];?>" type="text" class="validate">
                                                        
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col s12">
                                                    <label for="last_name">Last Name</label>
                                                        <input id="last_name" name="last_name" type="text" value="<?php echo $data['last_name'];?>" class="validate">
                                                        
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col s12">
                                                    <label for="admin_email">Email</label>
                                                        <input id="admin_email" type="email" name="admin_email" value="<?php echo $data['admin_email'];?>" class="validate">
                                                       
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col s12">
                                                        <label for="phone">Phone</label>
                                                        <input id="phone" name="phone" type="text" value="<?php echo $data['phone'];?>" class="validate">
                                                       
                                                    </div>
                                                </div>
                                                <label class="bmd-label-floating">Allow Permissions</label>
                                                <div style="margin-top: 10px;" class="row">
                                                <?php $customday=explode(",",$data['Permissions']); ?>

														<div  class="col-md-2">
															<input type="checkbox" id="hostel" name="Permissions[]" value="1"  <?=(in_array("1",$customday) ? 'checked=""' : '')?> />
															<label for="hostel"> Update Profile</label>
														</div>
                                                        <div  class="col-md-2">
															<input type="checkbox" id="changepassword" name="Permissions[]" value="12"  <?=(in_array("12",$customday) ? 'checked=""' : '')?> />
															<label for="changepassword"> Change Password</label>
														</div>

														<div  class="col-md-2">
															<input type="checkbox" id="Form" name="Permissions[]" value="2"  <?=(in_array("1",$customday) ? 'checked=""' : '')?> />
															<label for="Form">Form menu</label>
														</div>

														<div class="col-md-3">
															<input type="checkbox" id="Home" name="Permissions[]" value="3" <?=(in_array("3",$customday) ? 'checked=""' : '')?> />
															<label for="Home">Home page  menu</label>
														</div>

													   <div  class="col-md-3">
															<input type="checkbox" id="Country" name="Permissions[]" value="4" <?=(in_array("4",$customday) ? 'checked=""' : '')?> />
															<label for="Country"> City & Country menu</label>
														</div>

														<div  class="col-md-2">
															<input type="checkbox" id="internet" name="Permissions[]" value="5" <?=(in_array("5",$customday) ? 'checked=""' : '')?> />
															<label for="internet">Category menu</label>
														</div>

														<div  class="col-md-2">
															<input type="checkbox" id="Water" name="Permissions[]" value="6" <?=(in_array("6",$customday) ? 'checked=""' : '')?> />
															<label for="Water">User Enquiry menu</label>
														</div>

														<div  class="col-md-2">
															<input type="checkbox" id="Light" name="Permissions[]" value="7" <?=(in_array("7",$customday) ? 'checked=""' : '')?> />
															<label for="Light">User Review</label>
														</div>

														<div  class="col-md-3">
															<input type="checkbox" id="Furniture" name="Permissions[]" value="8" <?=(in_array("8",$customday) ? 'checked=""' : '')?> />
															<label for="Furniture">Manage Form menu</label>
														</div> 
                                                        <div  class="col-md-3">
															<input type="checkbox" id="User" name="Permissions[]" value="9" <?=(in_array("9",$customday) ? 'checked=""' : '')?> />
															<label for="User">User menu</label>
														</div>
                                                        <div  class="col-md-2">
															<input type="checkbox" id="Subadmin" name="Permissions[]" value="11" <?=(in_array("11",$customday) ? 'checked=""' : '')?> />
															<label for="Subadmin">Subadmin menu</label>
														</div>
                                                        <div  class="col-md-3">
															<input type="checkbox" id="All_Permissions" name="Permissions[]" value="10" <?=(in_array("10",$customday) ? 'checked=""' : '')?> />
															<label for="All_Permissions">All Permissions</label>
														</div> 


													</div>



                                                <div class="row">
                                                    <div class="col s12">
                                                       <label for="aboutme">Notes</label>
                                                        <textarea id="aboutme" name="aboutme" type="text" value="<?php echo $data['aboutme'];?>" class="validate"><?php echo $data['aboutme'];?></textarea>
                                                       
                                                    </div>
                                                </div>



                                                <div class="row">
                                                    <div class="col s12">
                                                    <label for="aboutme">Password</label>
                                                        <input id="admin_password" name="admin_password" value="<?php echo $data['pwd'];?>" placeholder="Password" type="text" class="validate">
                                                    </div>
                                                </div>


                                                <div class="row">

                                                    <div class="input-field col s6">
                                                        <input type="file" id="imgInp" name="profile" value="upload">
                                                    </div>

                                                    <div class="input-field col s6">
                                                        <img style="width: 149px;" src="upload/<?php echo $data['profile'];?>"  id="blah" class="setwidthhight" onerror="this.src='upload/user_placeholder.png'">
                                                    </div>



                                                </div>


                                                <div class="row">
                                                    <div class="input-field col s12">
                                                        <button type="submit" class="waves-effect waves-light btn-large full-btn"> Submit</button>
                                                    </div>
                                                </div>
                                            </form>
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