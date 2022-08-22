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
                    <li class="active-bre"><a href="#"> Edit Language keyword</a> </li>
                </ul>
            </div>
            <div class="tz-2 tz-2-admin">
                <div class="tz-2-com tz-2-main">
                    <h4>Edit Language keyword</h4>

                    <!-- Dropdown Structure -->
                    <style type="text/css">
                        .succescolor {
                            margin-left: 40%;
                            color: #00cd36;
                            font-size: medium;
                            font-family: ui-monospace;
                        }
                    </style>
                    <div class="split-row">
                        <div class="col-md-12">
                            <div class="box-inn-sp ad-inn-page">
                                <div class="tab-inn ad-tab-inn">

                                    <?php if ($this->session->flashdata('succes')) :   ?>
                                        <?php echo '<div class="succescolor">' . $this->session->flashdata('succes') . '</div>'; ?>
                                    <?php endif; ?>
                                    <div class="hom-cre-acc-left hom-cre-acc-right">

                                        <div class="">

                                            <form action="action_updatecategory" method="post" enctype="multipart/form-data">
                                                <input type="hidden" name="eid" value="<?php echo $data['id']; ?>">
                                                <div class="row">
                                                   

                                                </div>
                                                <div class="row">
                                                    <div class="input-field col s6">
                                                        <input id="ttt" placeholder="Constant Name" style="margin-top: 40px;" type="text" name="constantName" value="<?php echo $data['constantName']; ?>" readonly  required>
                                                    </div>
                                                    <div class="input-field col s6"><b>English</b>
                                                        <input id="value_1" placeholder="English value" style="margin-top: 40px;" type="text" name="value_1" value="<?php echo $data['value_1']; ?>" required>
                                                    </div>
                                                    <div class="input-field col s6"><B>Arabic</B>
                                                        <input id="ttt" placeholder="Arabic value" style="margin-top: 40px;" type="text" name="value_2" value="<?php echo $data['value_2']; ?>" required>
                                                    </div>

                                                </div>

                                                <div class="row">
                                                    <button type="submit" id="register" class="input-field col s12 v2-mar-top-40 waves-effect waves-light btn-large full-btn">Save</button>
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