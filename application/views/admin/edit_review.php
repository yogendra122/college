<?php
include('header.php');
foreach ($data as $key => $value_data) 
{
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
                    <li class="active-bre"><a href="#"> Update review</a> </li>

                </ul>
            </div>
            <div class="tz-2 tz-2-admin">
                <div class="tz-2-com tz-2-main">
                    <h4>Update review</h4>
                    <!-- Dropdown Structure -->
                    <div class="split-row">
                        <div class="col-md-12">
                            <div class="box-inn-sp ad-inn-page">
                                <div class="tab-inn ad-tab-inn">
                                    <div class="hom-cre-acc-left hom-cre-acc-right">
                                        <div class="">
                                            <form  action="actionEditrevew"  method="post" enctype="multipart/form-data">
                                                <input type="hidden" name="id" value="<?php echo $_GET['id'];?>">
                                               
                                                <div class="row">
                                                    <div class="input-field col s12">
                                                       
                                                        <label for="last_name">Rating</label>
                                                        <select name="ratingno">
                                                        <option value="<?php echo $value_data->rat_rating;?>"><?php echo $value_data->rat_rating;?></option>
                                                             <option value="2">2</option>
                                                             <option value="3">3</option>
                                                             <option value="4">4</option>
                                                             <option value="5">5</option>
                                                             <option value="1">1</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="input-field col s12">
                                                      

<textarea id="w3review" name="comment" rows="4" cols="50"><?php echo $value_data->rat_comment ;?>
</textarea> <label for="w3review">comment</label>
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
}
include 'footer.php';
?>