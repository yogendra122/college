<?php
$where = array('cat_parent_id' => $_GET['id'], 'cat_delete_status' => 0, 'cat_status' => 1);
$category = $this->Admin_model->getAll('category', $where);
//  echo"<pre>";
//  print_r($category);
//  die;
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
                    <li class="active-bre"><a href="#">Manage Form</a> </li>

                </ul>
            </div>
            <div class="tz-2 tz-2-admin">
                <div class="tz-2-com tz-2-main">
                    <h4>Manage Form</h4>
                    <!-- Dropdown Structure -->
                    <div class="split-row">
                        <div class="col-md-12">
                            <div class="box-inn-sp ad-inn-page">
                                <div class="tab-inn ad-tab-inn">
                                    <div class="hom-cre-acc-left hom-cre-acc-right">
                                        <div class="">
                                            <form id="Action_addmanageform" action-attr="Action_addmanageform" action="javascript:void(0)" method="post" enctype="multipart/form-data">
                                                <input type="hidden" id="form_id" name="form_id" value="<?php echo $form_id; ?>">

                                                <input type="hidden" value="1" id="counter" />
                                                <div class="col s12">
                                                    <label>Select Category</label>
                                                    <select id="form_cat" name="form_category" class="select_field_type">
                                                        <option value="">Select Form category</option>
                                                        <?php
                                                        foreach ($category as $state) {
                                                        ?>
                                                            <option value="<?php echo $state->cat_id; ?>"><?php echo $state->cat_name ?></option>
                                                        <?php
                                                        }
                                                        ?>
                                                    </select>
                                                </div>

                                                <div id="select_field" class="row">
                                                    <button id="add" class="btn add-more button-yellow uppercase" type="button">+ Add More</button>
                                                    <!-- <button  class="btn delete button-yellow uppercase" type="button">Remove</button> -->


                                                    <div>
                                                        <div id="for_remove" class="col s12">
                                                            <label>*Field type:</label>
                                                            <select id="1" class="select_field_type">
                                                                <option value="">Select Field type</option>
                                                                <option value="1">Text Box</option>
                                                                <option value="2">Textarea</option>
                                                                <option value="3">Radio</option>
                                                                <option value="4">checkbox</option>
                                                            </select>
                                                        </div>
                                                        <div id="file_added_1" class="col s12 colors 1">
                                                        </div>
                                                    </div>





                                                </div>




                                                <div class="row">
                                                    <div class="input-field col s12">
                                                        <button type="submit" class="waves-effect waves-light btn-large full-btn">submit</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <?php

                                        // foreach ($form_field as $v) {


                                        //     $labe_name = json_decode($v->lable_name);

                                        //     $form_type = json_decode($v->form_type);

                                        //     foreach ($form_type as $key => $v2) {

                                        // ?>
                                                <!-- <input type="hidden" value="<?php echo $v2; ?>" name="form_type[]"> -->

                                                <?php

                                                //$lablename =  $labe_name[$key];
                                                ?>
                                                <div id="catee" style="margin: 20px;" class="row">
                                                    <!-- <div class="row">
                                                        <div class="col s3"><label for="un_contactno">*Field type: </label></div>
                                                        <div class="col s9"><label for="un_contactno"><?php echo  $v2; ?> </label></div>

                                                    </div> -->
                                                    <!-- <div class="row">
                                                        <div class="col s3"><label for="un_contactno">*Label Name : </label></div>
                                                        <div class="col s9"><label for="un_contactno"><?php echo $lablename; ?></label></div>
                                                        <a type="button" href="Action_EditMange_form?id= <?php echo $v->id; ?>&key=<?php echo  $key; ?>"><button type="button" class="btn btn-primary">Edit</button></a></td>
                                                        <a type="button"><button type="button" key_attr="<?php echo  $key; ?>" id="<?php echo $v->id; ?>" class="btn btn-danger deleteFormfield">Delete</button></a></td>

                                                    </div> -->
                                                </div>

                                        <?php
                                        //     }
                                        // }
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

<?php
include 'footer.php';
?>
<script>
    $(function() {
        $('#category1').change(function() {
            $('.colors').hide();

            // console.log($(this).val());
            $('.' + $(this).val()).show();
        });
    });
    // [forked from](http://jsfiddle.net/FvMYz/)
    // [show-hide-based-on-select-option-jquery)(http://stackoverflow.com/questions/2975521/show-hide-div-based-on-select-option-jquery/2975565#2975565)
</script>
<script>
    $(document).ready(function() {
        $('#form_cat').change(function() {

            var formcat_id = $('#form_cat').val();
            var form_id = $('#form_id').val();
            if (formcat_id != '') {
                $.ajax({
                    url: "<?php echo base_url(); ?>fetch_category_from",
                    method: "POST",
                    data: {
                        formcat_id: formcat_id,
                        form_id: form_id
                    },
                    success: function(data) {
                      
                        data = JSON.parse(data);
                        data.forEach(function(element) {

                         
                           
                            var formtypeone = JSON.parse(element.form_type);
                            var lable_name   = JSON.parse(element.lable_name);
                            $('#catee').html('');
                           
                            $.each(formtypeone, function(index,value) {
                                var lablename =  lable_name[index];   
                                // console.log(index);

                                $('#catee').append('<div class="row"><div class="col s3"><label for="un_contactno">*Field type: </label></div><div class="col s9"><label for="un_contactno">'+value+' </label></div></div><div class="row"> <div class="col s3"><label for="un_contactno">*Label Name : </label></div><div class="col s9"><label for="un_contactno">'+lablename+'</label></div><a type="button" href="Action_EditMange_form?id= '+element.id+' ?>&key='+index+'"><button type="button" class="btn btn-primary">Edit</button></a></td><a type="button"><button type="button" key_attr="'+index+'" id="'+element.id+'" class="btn btn-danger deleteFormfield">Delete</button></a></td></div>');
                              
                            });


                        });
                    
                    }
                });
            } else {
                $('#catee').html('<p value="">Empty</p>');
                
            }
        });
    });
</script>