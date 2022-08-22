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
                    <li class="active-bre"><a href="#"> Edit Category</a> </li>
                </ul>
            </div>
            <div class="tz-2 tz-2-admin">
                <div class="tz-2-com tz-2-main">
                    <h4>Edit Category</h4>

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

                                            <form action="action_addcategory" method="post" enctype="multipart/form-data">
                                                <input type="hidden" name="eid" value="<?php echo $data['cat_id'] ;?>">
                                                <div class="row">
                                                    <!-- <div class="input-field col s6">
                                                        <select id="result"> -->
                                                            <!-- <option value=""> -- category -- </option> -->
                                                            <!-- <option value="Pass">Category</option>
                                                            <option value="Fail">Subcategory</option>
                                                        </select>
                                                    </div> -->
                                                    <div class="input-field col s6">
                                                        <select name="cat_parent_id">
                                                            <!-- <option value=""> -- Select Parent Category -- </option> -->

                                                            <?php
                                                            if (!empty($data['cat_parent_id'])) {
                                                                foreach ($category as $key => $value_contryy) {
                                                                    if ($value_contryy->cat_id == $data['cat_parent_id']) {

                                                            ?>
                                                                        <option value="<?php echo $value_contryy->cat_id; ?>"><?php echo $value_contryy->cat_name; ?></option>
                                                                    <?php
                                                                    }
                                                                }
                                                            }

                                                            foreach ($category as $key => $value_contry) {
                                                                if (empty($value_contry->cat_parent_id)) {
                                                                    ?>
                                                                    <option value="<?php echo $value_contry->cat_id; ?>"><?php echo $value_contry->cat_name; ?></option>
                                                            <?php
                                                                }
                                                            }
                                                            ?>

                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="input-field col s6">
                                                        <input id="ttt" placeholder="Category Name" style="margin-top: 40px;" type="text" name="cname" value="<?php echo $data['cat_name']; ?>" required>
                                                    </div>

                                                    <div style="margin-top: 49px;" class="input-field col s6">

                                                    <select  name="status" required>
						                                 	<?php
						                                 		if($data['cat_status'] == 1)
						                                 		{
						                                 		?>
						                                 		<option value="1">Active</option>
						                                 		<option value="0">Block</option>
						                                 	<?php
						                                 		}else{
						                                 			?>
						                                 		<option value="0">Block</option>
						                                 		<option value="1">Active</option>
						                                 		<?php
						                                 		}
						                                 	?>
                                                    </select>
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

<script type="text/javascript">
    $('#result').on('change', function() {
        $('#fail').css('display', 'none');
        if ($(this).val() === 'Fail') {
            $('#fail').css('display', 'block');
            $('#ttt').attr("placeholder", "City Name");
        }

        if ($(this).val() === 'Pass') {

            $('#ttt').attr("placeholder", "Country Name");
        }
    });
</script>