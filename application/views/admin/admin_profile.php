<?php

include('header.php');
?>
<div class="container-fluid sb2">
    <div class="row">

        <!--== BODY INNER CONTAINER ==-->
        <div class="sb2-2">
            <!--== breadcrumbs ==-->
            <div class="sb2-2-2">
                <ul>
                    <li><a href="#"><i class="fa fa-home" aria-hidden="true"></i> Home</a> </li>
                    <li class="active-bre"><a href="#">Edit Profile</a> </li>

                </ul>
            </div>
            <div class="tz-2 tz-2-admin">
                <div class="tz-2-com tz-2-main">
                    <h4>Edit Profile</h4>
                    <!-- Dropdown Structure -->
                    <div class="split-row">
                        <div class="col-md-12">
                            <div class="box-inn-sp ad-inn-page">
                                <div class="tab-inn ad-tab-inn">
                                    <div class="hom-cre-acc-left hom-cre-acc-right">
                                        <div class="">
                                            <form id="Edit_admin_profile" action-attr="Edit_admin_profile" action="javascript:void(0)" method="post" enctype="multipart/form-data">
                                                <input type="hidden" name="admin_id" value="<?php echo $data['admin_id'] ;?>">
                                                <div class="row">
                                                    <div class=" col s12">
                                                        <input id="admin_name" name="admin_name" value="<?php echo $data['admin_name']; ?>" placeholder="Full Name" type="text" class="validate">
                                                        <!-- <label for="user_name"></label> -->

                                                    </div>

                                                </div>

                                                <div class="row">
                                                    <div class=" col s12">
                                                        <input id="admin_email" readonly type="email" value="<?php echo $data['admin_email']; ?>" name="admin_email" class="validate">
                                                   
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class=" col s12">
                                                        <input id="phone" name="phone" value="<?php echo $data['phone']; ?>" type="text" class="validate">
                                                        <!-- <label for="user_phone">Phone</label> -->
                                                    </div>
                                                </div>






                                                <div class="row">

                                                    <div class="input-field col s6">
                                                        <input type="file" id="imgInp" name="profile" value="upload">
                                                    </div>

                                                    <div class="input-field col s6">
                                                        <img style="width: 149px;" src="upload/<?php echo $data['profile']; ?>" id="blah" class="setwidthhight" onerror="this.src='upload/user_placeholder.png'">
                                                    </div>



                                                </div>

                                        </div>



                                        <div class="row">
                                            <div class="input-field col s12">
                                                <button type="submit" class="waves-effect waves-light btn-large full-btn"> Save</button>
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
 <script type="text/javascript">
     
     function readURL(input) {
       if (input.files && input.files[0]) {
           var reader = new FileReader();
 
           reader.onload = function (e) {
               $('#blah').attr('src', e.target.result);
           }
 
           reader.readAsDataURL(input.files[0]);
       }
     }
 
     $("#imgInp").change(function(){
       readURL(this);
     });
 
     </script>