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
						<li class="active-bre"><a href="#"> Add State </a> </li>
						<!-- <li class="page-back"><a href="#"><i class="fa fa-backward" aria-hidden="true"></i> Back</a> </li> -->
					</ul>
				</div>
				<div class="tz-2 tz-2-admin">
					<div class="tz-2-com tz-2-main">
						<h4>Add State </h4> <a class="dropdown-button drop-down-meta drop-down-meta-inn" href="#" data-activates="dr-list"><i class="material-icons">more_vert</i></a>
						<ul id="dr-list" class="dropdown-content">
							<li><a href="#!">Add New</a> </li>
							<li><a href="#!">Edit</a> </li>
							<li><a href="#!">Update</a> </li>
							<li class="divider"></li>
							<li><a href="#!"><i class="material-icons">delete</i>Delete</a> </li>
							<li><a href="#!"><i class="material-icons">subject</i>View All</a> </li>
							<li><a href="#!"><i class="material-icons">play_for_work</i>Download</a> </li>
						</ul>
						<!-- Dropdown Structure -->
						<style type="text/css">
							
						.succescolor{
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

						                  <?php if($this->session->flashdata('succes')):   ?>
						                  <?php echo '<div class="succescolor">'.$this->session->flashdata('succes').'</div>'; ?>
						                  <?php endif; ?> 
										<div class="hom-cre-acc-left hom-cre-acc-right">

											<div class="">

									<form action="action_addstate" method="post" enctype="multipart/form-data">
													<div class="row">
														<!-- <div class="input-field col s6">
															<select id="result">
								                              <option value=""> -- category -- </option> 
								                              <option value="Pass">Country</option> 
								                              <option value="Fail">City</option>
															</select>
														</div> -->
														<div class="input-field col s6">
						                                 <select name="country_parent_id">
						                                 	<option value="">-- Select Country --</option>
						                                    <?php
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
						                                  
						                                  <input id ="ttt" placeholder="State Name" style="margin-top: 40px;" type="text" name="country_name"  required>
														</div>

														<div style="margin-top: 49px;" class="input-field col s6">

						                                 <select  name="country_status" required>
						                                    <option value="1">Active</option>
						                                    <option value="0">Block</option>
						                                 </select>
														</div>
													</div>

													<div class="row">
														<div class="input-field col s12">
															<textarea id="country_desc" name="country_desc" placeholder="Country Description " type="text" class="validate"></textarea>
															<label for="country_desc">Description</label>
														</div>
													</div>

													<div class="row">
														<div class="input-field col s6">
															<input id="country_latitude" name="country_latitude" placeholder="Country Latitude" type="text" class="validate">
															
														</div>

														<div class="input-field col s6">
															<input id="country_longitude" name="country_longitude" placeholder="Country Longitude " type="text" class="validate">
															
														</div>
													</div>


													<div class="row tz-file-upload">
														<div class="file-field input-field">
															<div class="tz-up-btn"> <span>File</span>
																<input type="file"  name="country_img" multiple> </div>
															<div class="file-path-wrapper db-v2-pg-inp">
																<input  readonly="" class="file-path validate" type="text"> 
															</div>
														</div>
													</div>	

													<div class="row">
														 <button type="submit" id="register"class="input-field col s12 v2-mar-top-40 waves-effect waves-light btn-large full-btn">Save</button>
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
  if ( $(this).val() === 'Fail' ) {
    $('#fail').css('display', 'block');
    $('#ttt').attr("placeholder", "City Name");
  }

  if ( $(this).val() === 'Pass' ) {
   
    $('#ttt').attr("placeholder", "Country Name");
  }
});
   </script>