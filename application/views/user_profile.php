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
                                <div class="dashboard-title fl-wrap">
                                    <h3>Your Profile</h3>
                                </div>
                                <!-- profile-edit-container-->
                                <div class="profile-edit-container fl-wrap block_box">
                                    <div class="custom-form">
                                     <form action-attr="user_edit_profile" method="post" id="edit_profile_user" class="smart-form client-form" enctype="multipart/form-data" autocomplete="off">
<!--                                 <form action="" method="post" enctype="multipart/form-data"> -->
                                        <div class="row">
                                           <div class="col-sm-6">
                                                <label> Name <i class="fal fa-user"></i></label>

                                                <input type="text" name="user_name" placeholder="User Name" required="" value="<?php echo $userData['user_name']?>"/>
                                            </div>

                                            <div class="col-sm-6">
                                                <label>First Name <i class="fal fa-user"></i></label>
                                                <input type="text" name="user_first_name" required="" placeholder="First Name" value="<?php echo $userData['user_first_name']?>"/>
                                            </div>
                                            <div class="col-sm-6">
                                                <label>Last Name <i class="fal fa-user"></i></label>
                                                <input type="text" required="" name="user_last_name"  placeholder="Last Name" value="<?php echo $userData['user_last_name']?>"/>
                                            </div>
                                            <div class="col-sm-6">
                                                <label>Email Address<i class="far fa-envelope"></i>  </label>
                                                <input type="email" required="" readonly name="user_email" value="<?php echo $userData['user_email']?>" placeholder="Email"/>
                                            </div>
                                            <div class="col-sm-6">
                                                <label>Phone<i class="far fa-phone"></i>  </label>
                                                <input type="text" value="<?php echo $userData['user_phone']?>" name="user_phone" placeholder="Phone" />
                                            </div>
                                            <div class="col-sm-6">
                                                <label> Address <i class="fas fa-map-marker"></i>  </label>
                                                <input type="text" name="user_address" value="<?php echo $userData['user_address']?>" placeholder="Adress" value=""/>
                                                
                                            </div>
                                            <div class="col-sm-12">
                                                 <label>Change Avatar</label>                                       
                                                 <div class="listsearch-input-item fl-wrap">
                                                 <div class="fuzone">
                                                    
                                                        <div class="fu-text">
                                                            
                                                            <span><i class="fal fa-images"></i> Click here or drop files to upload</span>
                                                            <div class="photoUpload-files fl-wrap"></div>
                                                        </div>

                                                        <input id="profileImage_media" class="form-control" type="file" name="user_img" title="profile image" >
                                                    
                                                </div>
                                                </div>
                                            </div>

                                             <div class="col-sm-12">
                                                <label> Notes</label>
                                                <textarea cols="40" rows="3" name="user_aboutme" placeholder="About Me"  style="margin-bottom:20px;"><?php echo $userData['user_aboutme']?></textarea>
                                             </div>

                                            <div class="custom-form">
                                                    <button  type="submit"class="btn    color2-bg  float-btn">Save Changes<i class="fal fa-save"></i></button>
                                            </div>
                                         </div>
                                    </form>
                                    </div>
                                </div>
                               
                              
                           
                                <!-- profile-edit-container end-->
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