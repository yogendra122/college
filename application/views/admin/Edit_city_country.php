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
						<li class="active-bre"><a href="#">Edit Country & city</a> </li>
						
					</ul>
				</div>
				<div class="tz-2 tz-2-admin">
					<div class="tz-2-com tz-2-main">
						<h4>Edit Country & city</h4>
						
						<!-- Dropdown Structure -->
						<style type="text/css">
							
						.succescolor{
							margin-left: 40%;
						    color: #00cd36;
						    font-size: medium;
						    }			
    			       </style>
						<div class="split-row">
							<div class="col-md-12">
								<div class="box-inn-sp ad-inn-page">
									<div class="tab-inn ad-tab-inn">

						                  <?php if($this->session->flashdata('succes')):   ?>
						                  <?php echo '<div class="succescolor">'.$this->session->flashdata('succes').'</div>'; ?>
						                  <?php endif; ?> 
										<div class="hom-cre-acc-left hom-cre-acc-right">

											<div class="">

									<form id="actionupdatecity" action-attr="actionupdatecity" action="javascript:void(0)" method="post" enctype="multipart/form-data">
													<div class="row">
														<div class="input-field col s6">

															<select id="result">
								                              <!-- <option value=""> -- category -- </option> -->
								                              <option value="Pass">Country</option>
								                              <option value="Fail">City</option>
															</select>
														</div>
														<div id="fail"  class="input-field col s6">
						                                 <select name="country_parent_id">
						                                 		<option value=""> -- Select Country -- </option>

						                                    <?php
						                                    if(!empty($data['country_parent_id']))
						                                    {
						                                       foreach ($contry as $key => $value_contryy) {
						                                         if($value_contryy->country_id==$data['country_parent_id'])
						                                         {

						                                       ?>
						                                    <option value="<?php echo $value_contryy->country_id;?>"><?php echo $value_contryy->country_name;?></option>
						                                    <?php
						                                        }
						                                       }
						                                   }

						                                       foreach ($contry as $key => $value_contry) {
						                                         if(empty($value_contry->country_parent_id))
						                                         {
						                                       ?>
						                                    <option value="<?php echo $value_contry->country_id;?>"><?php echo $value_contry->country_name;?></option>
						                                    <?php
						                                        }
						                                       }
						                                       ?>
						                                    
						                                 </select>
														</div>
													</div>
													<div class="row">
														<div class="input-field col s6">
						                                
						                                  <input style="margin-top: 40px;" type="text" name="country_name" value="<?php echo $data['country_name'];?>" required>
														</div>

														<div style="margin-top: 49px;" class="input-field col s6">

						                                 <select  name="country_status" required>
						                                 	<?php
						                                 		if($data['country_status'] == 1)
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


<div class="input-field col s6">
						                                
						                                  <input style="margin-top: 40px;" type="text" name="location" value="<?php echo $data['location'];?>" required>
														</div>

<div class="input-field col s6">
						                                
						                                  <input style="margin-top: 40px;" type="text" name="phone_number" value="<?php echo $data['phone_number'];?>" required>
														</div>

													</div>

													<div class="row">
														<div class="input-field col s12">
															<textarea id="country_desc"  name="country_desc" type="text" class="validate"><?php echo $data['country_desc'];?></textarea>
															<label for="country_desc">Describtion</label>
														</div>
													</div>


													<div class="row">
														<div class="input-field col s6">
															<input id="country_latitude" name="country_latitude" placeholder="Country Latitude" type="text" value="<?php echo $data['country_latitude'];?>" class="validate">
															
														</div>

														<div class="input-field col s6">
															<input id="country_longitude" name="country_longitude" value="<?php echo $data['country_longitude'];?>" placeholder="Country Longitude " type="text" class="validate">
															
														</div>
													</div>

													<div class="row">
													
														<div class="input-field col s6">
															
																<input  type="file" id="imgInp" name="country_img" value="upload">
														</div>

														 <div class="input-field col s6"> 
														  	<img  style="width: 149px;"src="upload/<?php echo $data['country_img'];?>" id="blah" class="setwidthhight" onerror="this.src='upload/imgpsh_fullsize_anim.png'">         
														  </div>    
														
													</div>


													<div class="row">
														 <button type="submit" id="register"class="input-field col s12 v2-mar-top-40 waves-effect waves-light btn-large full-btn">Save</button>
													</div>
											<input type="hidden" name="country_id" value="<?php echo $data['country_id'];?>">
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
  if ( $(this).val() === 'Fail' ) {
    $('#fail').css('display', 'block');
  }
});
   </script>