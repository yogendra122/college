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
                    <li class="active-bre"><a href="#"> Add Admin</a> </li>

                </ul>
            </div>
            <div class="tz-2 tz-2-admin">
                <div class="tz-2-com tz-2-main">
                    <h4>Add New Admin</h4>
                    <!-- Dropdown Structure -->
                    <div class="split-row">
                        <div class="col-md-12">
                            <div class="box-inn-sp ad-inn-page">
                                <div class="tab-inn ad-tab-inn">
                                    <div class="hom-cre-acc-left hom-cre-acc-right">
                                        <div class="">
                                            <form id="Add_subadmin" action-attr="ActionaddSubadmin" action="javascript:void(0)" method="post" enctype="multipart/form-data">
                                                <input type="hidden" name="admin_type" value="admin">
                                                <div class="row">
                                                    <div class="input-field col s6">
                                                        <input id="admin_name" name="admin_name" placeholder="Name" type="text" class="validate">
                                                        <label for="admin_name"></label>

                                                    </div>
                                                    <div class="input-field col s6">
                                                        <input id="first_name" name="first_name" placeholder="First Name" type="text" class="validate">
                                                        <label for="first_name"></label>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="input-field col s12">
                                                        <input id="last_name" name="last_name" type="text" class="validate">
                                                        <label for="last_name">Last Name</label>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="input-field col s12">
                                                        <input id="admin_email" type="email" name="admin_email" class="validate">
                                                        <label for="admin_email">Email</label>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="input-field col s12">
                                                        <input id="phone" name="phone" type="text" class="validate">
                                                        <label for="phone">Phone</label>
                                                    </div>
                                                </div>
                                                <label class="bmd-label-floating">Allow Permissions</label>
                                                <div style="margin-top: 10px;" class="row">
                                                                

														<div  class="col-md-2">
															<input type="checkbox" id="hostel" name="Permissions[]" value="1" />
															<label for="hostel"> Update Profile</label>
														</div>
                                                        <div  class="col-md-2">
															<input type="checkbox" id="changepassword" name="Permissions[]" value="12" />
															<label for="changepassword"> Change Password</label>
														</div>

														<div  class="col-md-2">
															<input type="checkbox" id="transport" name="Permissions[]" value="2" />
															<label for="transport">Form menu</label>
														</div>

														<div class="col-md-3">
															<input type="checkbox" id="cafeteria" name="Permissions[]" value="3" />
															<label for="cafeteria">Home page  menu</label>
														</div>

													   <div  class="col-md-3">
															<input type="checkbox" id="canteen" name="Permissions[]" value="4" />
															<label for="canteen"> City & Country menu</label>
														</div>

														<div  class="col-md-2">
															<input type="checkbox" id="internet" name="Permissions[]" value="5" />
															<label for="internet">Category menu</label>
														</div>

														<div  class="col-md-2">
															<input type="checkbox" id="Water" name="Permissions[]" value="6" />
															<label for="Water">User Enquiry menu</label>
														</div>

														<div  class="col-md-2">
															<input type="checkbox" id="Light" name="Permissions[]" value="7" />
															<label for="Light">User Review</label>
														</div>

														<div  class="col-md-3">
															<input type="checkbox" id="Furniture" name="Permissions[]" value="8" />
															<label for="Furniture">Manage Form menu</label>
														</div> 
                                                        <div  class="col-md-3">
															<input type="checkbox" id="User" name="Permissions[]" value="9" />
															<label for="User">User menu</label>
														</div>
                                                        <div  class="col-md-2">
															<input type="checkbox" id="Subadmin" name="Permissions[]" value="11" />
															<label for="Subadmin">Subadmin menu</label>
														</div>
                                                        <div  class="col-md-3">
															<input type="checkbox" id="All_Permissions" name="Permissions[]" value="10" />
															<label for="All_Permissions">All Permissions</label>
														</div> 


													</div>



                                                <div class="row">
                                                    <div class="input-field col s12">
                                                        <textarea id="aboutme" name="aboutme" type="text" class="validate"></textarea>
                                                        <label for="aboutme">Notes</label>
                                                    </div>
                                                </div>



                                                <div class="row">
                                                    <div class="input-field col s12">
                                                        <input id="admin_password" name="admin_password" placeholder="Password" type="password" class="validate">
                                                      
                                                       
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col s12">
                                                        <input type="password" name="admin_rnpassword" placeholder="Confirm password" autocomplete="new-password">
                                                     
                                                    </div>
                                                </div>



                                                <div class="row">

                                                    <div class="input-field col s6">
                                                        <input type="file" id="imgInp" name="profile" value="upload">
                                                    </div>

                                                    <div class="input-field col s6">
                                                        <img style="width: 149px;"  id="blah" class="setwidthhight" onerror="this.src='upload/user_placeholder.png'">
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