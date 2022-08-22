<?php

include('header.php');

?>          
    
            <!-- wrapper-->
            <div id="wrapper">
                <!-- content-->
                <div class="content">
                    <?php include('sidebar.php') ?>
                            <!-- dashboard-menu  end-->
                            <!-- dashboard content-->
                            <div class="col-md-9">
                                <div class="dashboard-title   fl-wrap">
                                    <h3>Change Password</h3>
                                </div>
                                <!-- profile-edit-container-->
                <form action-attr="userUpdatePassword" id="smart-form-changepass"  enctype="multipart/form-data" novalidate="" autocomplete="off">
                                <div class="profile-edit-container fl-wrap block_box">
                                    <div class="custom-form">
                                        <div class="pass-input-wrap fl-wrap">
                                            <label>Current Password</label>
                                            <input type="password"  name="password" class="pass-input" placeholder="" value=""/>
                                            <span class="eye"><i class="far fa-eye" aria-hidden="true"></i> </span>
                                        </div>
                                        <div class="pass-input-wrap fl-wrap">
                                            <label>New Password</label>
                                            <input type="password" name="npassword" id="npassword" class="pass-input" placeholder="" value=""/>
                                            <span class="eye"><i class="far fa-eye" aria-hidden="true"></i> </span>
                                        </div>
                                        <div class="pass-input-wrap fl-wrap">
                                            <label>Confirm New Password</label>
                                            <input type="password" name="cpassword" class="pass-input" placeholder="" value=""/>
                                            <span class="eye"><i class="far fa-eye" aria-hidden="true"></i> </span>
                                        </div>
                                        <button class="btn    color2-bg  float-btn">Save Changes<i class="fal fa-save"></i></button>
                                    </div>
                                </div>
                    </form>
                                
                            </div>
                            <!-- dashboard content end-->
                    </div>
                    </section>
                    <!--  section  end-->
                    <div class="limit-box fl-wrap"></div>
                </div>
                <!--content end-->
            </div>
            <!-- wrapper end-->
           
<?php
include('footer.php');
?>