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
                    <li class="active-bre"><a href="#">Edit Manage Form</a> </li>

                </ul>
            </div>
            <div class="tz-2 tz-2-admin">
                <div class="tz-2-com tz-2-main">
                    <h4>Edit Manage Form</h4>
                    <!-- Dropdown Structure -->
                    <div class="split-row">
                        <div class="col-md-12">
                            <div class="box-inn-sp ad-inn-page">
                                <div class="tab-inn ad-tab-inn">
                                    <div class="hom-cre-acc-left hom-cre-acc-right">
                                        <div class="">
                                            <form id="updatemanageform" action-attr="updatemanageform" action="javascript:void(0)" method="post" enctype="multipart/form-data">
                                                  
                                                    <input type="hidden" name="id"  value="<?php echo $data['id'];?>" >
                                                    <input type="hidden" name="key"  value="<?php  echo $key_name;?>" >

                                                    
                                                <div class="row">
                                                    <div class="col s12 colors text">
                                                        <label for="un_contactno">*Field type: </label>
                                                        <label for="un_contactno"><?php echo $fieldtype;?> </label>
                                                    </div>
                                                    <div class="col s6 colors text">
                                                        <label for="un_contactno">*Text Box Label : </label>
                                                        <input id="lable_name" name="lable_name" value="<?php echo $lableName;?>" placeholder="Text Box Label Name" type="text" class="validate">
                                                        <label for="lable_name"></label>

                                                    </div>



                                                </div>




                                                <div class="row">
                                                    <div class="input-field col s6">
                                                        <button type="submit" class="waves-effect waves-light btn-large full-btn">submit</button>
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