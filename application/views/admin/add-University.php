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
					<li class="active-bre"><a href="#"> Add Form</a> </li>

				</ul>
			</div>
			<div class="tz-2 tz-2-admin">
				<div class="tz-2-com tz-2-main">
					<h4>Add New Form</h4>
					<!-- Dropdown Structure -->
					<div class="split-row">

						<div class="col-md-12">

							<div class="box-inn-sp ad-inn-page">
								<div class="tab-inn ad-tab-inn">
									<div class="hom-cre-acc-left hom-cre-acc-right">

										<div class="">

											<form id="universityform" action-attr="universityform" action="javascript:void(0)" method="post" enctype="multipart/form-data">
												<div style="padding: 0 0 71px;" class="col s12">
													<select name="category" id="category1">

														<?php
														foreach ($select_cat as $row) {
															echo '<option value="' . $row->cat_id . '" >' . $row->cat_name . '</option>';
														}
														?>
													</select>
												</div>
												<div>

												</div>
												<div class="row">
													<div style="display:none;" class="col s6 colors 2">
														<label for="un_contactno">Education Name</label>
														<input id="un_name" name="un_name" placeholder="Education	 Name" type="text" class="validate">
														<label for="un_name"></label>

													</div>

													<div style="display:none;" class="colors  6">

														<div class="col s6">
															<label for="tur_place">Travel Place</label>
															<input placeholder="Place"  id="pac-input" name="tur_place" type="text" class="validate">
															<div id="map" class="map2"></div>
														
														</div>
													</div>
													

													<div style="display:none;" class="colors  3 ">

														<div class="col s6">
															<label for="acc_rent">Room Rent</label>
															<input id="acc_rent" name="acc_rent" type="text" class="validate">

														</div>
													</div>
													<div style="display:none;" class="colors 2 3 6">

														<div class="col s6">
															<label for="un_contactno">Contact Number</label>
															<input id="un_contactno" name="un_contactno" type="text" class="validate">

														</div>
													</div>




												</div>
											

													<div style="display:none;" class="row colors  3">

														<div class="col s12">
															<label for="acc_room_size">Room Size(sq ft)</label>
															<input id="acc_room_size" name="acc_room_size" type="text" class="validate">

														</div>
													</div>


													<div style="display:none;" class="row colors  3 ">
														<div class="col s12">
															<label>Room Type</label>
															<select name="acc_room_type">
															   <option value="">Select Room Type</option>
																<option value="1">Standard Room</option>
																<option value="2">Family Room</option>
																<option value="3">Private Room</option>
																<option value="4">Mix Dorm Room(6 people)</option>
																<option value="5">Female Dorm Room(6 people)</option>
																<option value="6">Male Dorm (6 people)</option>
															</select>
														</div>
													</div>

													<div style="display:none;" class="row colors 6">

														<div class="col s12">
															<label for="tur_travel_by">Travel By</label>
															<input id="tur_travel_by" name="tur_travel_by" type="text" class="validate">

														</div>
													</div>

													<div style="display:none;" class="row colors 6">

														<div class="col s12">
															<label for="tur_agency">Travel Agency</label>
															<input id="tur_agency" name="tur_agency" type="text" class="validate">

														</div>
													</div>


													<div style="display:none;" class="row colors  6">

														<div class="col s12">
															<label for="tur_price">Travel Price</label>
															<input id="tur_price" name="tur_price" type="text" class="validate">

														</div>
													</div>

													<div style="display:none;" class="row colors  6">

														<div class="col s12">
															<label for="tur_Inclusions">Travel Inclusions</label>
															<input id="tur_Inclusions" name="tur_Inclusions" type="text" class="validate">

														</div>
													</div>

													<div style="display:none;" class="row colors  6">

														<div class="col s6">
															<label for="tur_discount">Travel discount</label>
															<input id="tur_discount" name="tur_discount" type="text" class="validate">

														</div>
														<div class="col s6">
															<label for="tur_duration">Travel Duration</label>
															<input id="tur_duration" name="tur_duration" type="text" class="validate">

														</div>
													</div>



													<div style="display:none;" class="row colors 2 3 6">
														<label for="un_email"> Select Country</label>
														<div class="col s12">
															<select name="country" id="country">
																<!-- <option value=""> -- category -- </option> -->
																<option value="">Select Country</option>

																<?php
																foreach ($contry as $row) {
																	echo '<option value="' . $row->country_id . '">' . $row->country_name . '</option>';
																}
																?>
															</select>
														</div>
													</div>


													<div style="display:none;" class="row colors 2 3 6">
														<div class="col s12">
															<label>Select City</label>
															<select name="city" id="categt">
																<option value="">Select City</option>
															</select>
														</div>
													</div>
													<div style="display:none;" class="row colors 2 3 6">
														<div class="col s12">
															<label>Select Subcategory</label>
															<select name="sub_category" id="subcategt">
																<option value="">Select subcategory</option>
															</select>
														</div>
													</div>

													<div style="display:none;" class="row colors 2 3 6">
														<div class=" col s12">
															<label>Email</label>
															<input id="un_email" name="un_email" type="email" class="validate">

														</div>
													</div>


													<div style="display:none;" class="row colors 2 3 6">
														<label for="un_address">Address</label>
														<div id="map-container2" class="col s12">
															<input placeholder="Address"  id="pac-input" name="un_address" type="text" class="validate">
															<div id="map" class="map2"></div>
														</div>
													

													</div>

													<!--<div style="display:none;" class="row colors 2 3 6">-->
													<!--	<label>Start Date</label>-->
													<!--	<div class="input-field col s12">-->

													<!--		<input id="un_startdate" type="date" name="un_startdate" class="validate">-->

													<!--	</div>-->
													<!--</div>-->

													<!--<div style="display:none;" class="row colors  6">-->
													<!--	<label>End Date</label>-->
													<!--	<div class="input-field col s12">-->

													<!--		<input id="tur_enddate" type="date" name="tur_enddate" class="validate">-->

													<!--	</div>-->
													<!--</div>-->

													<!--<div style="display:none;" class="row colors 2">-->
													<!--	<label for="un_achivement">Achivement</label>-->
													<!--	<div class="col s12">-->
													<!--		<input id="un_achivement" name="un_achivement" type="text" class="validate">-->

													<!--	</div>-->
													<!--</div>-->
													<!--<div style="display:none;" class="row colors 2">-->
													<!--	<label for="un_course">Course</label>-->
													<!--	<div class="col s12">-->
													<!--		<input id="un_course" name="un_course" type="text" class="validate">-->

													<!--	</div>-->
													<!--</div>-->


													<!-- <div style="display:none;" class="row colors 2 3 6">
														<label for="un_latitude">Latitude</label>
														<div class="col s12">
															<input id="un_latitude" name="un_latitude" type="text" class="validate">

														</div>
													</div>


													<div style="display:none;" class="row colors 2 3 6">
														<label for="un_longitude">Longitude</label>
														<div class="col s12">
															<input id="un_longitude" name="un_longitude" type="text" class="validate">

														</div>
													</div> -->


													<!--<div style="display:none;" class="row colors 2">-->
													<!--	<label>Total Student</label>-->
													<!--	<div class="col s12">-->
													<!--		<input id="un_student" name="un_student" type="Number" class="validate">-->
													<!--		<label for="un_student"></label>-->
													<!--	</div>-->
													<!--</div>-->



													<!--<div style="display:none;" class="row colors 2">-->

													<!--	<label>Total STAFF </label>-->
													<!--	<div class="col s12">-->
													<!--		<input id="un_teaching_staff" name="un_teaching_staff" type="Number" class="validate">-->
													<!--		<label for="un_teaching_staff"></label>-->
													<!--	</div>-->
													<!--</div>-->



													<!--<div style="display:none;" class="row colors 2">-->
													<!--	<label for="un_award">Total Award</label>-->
													<!--	<div class=" col s12">-->
													<!--		<input id="un_award" name="un_award" type="Number" class="validate">-->

													<!--	</div>-->
													<!--</div>-->

													<div style="display:none;" class="row colors 2 3 6">
														<label for="un_description">Description</label>
														<div class="col s12">
															<textarea id="un_description" name="un_description" placeholder="University Description " type="text" class="validate"></textarea>

														</div>
													</div>



													<div style="display:none;" class="row colors 2 3 6">
														<div class="db-v2-list-form-inn-tit">
															<h5>Social Media Informations:</h5>
														</div>
													</div>
													<div style="display:none;" class="row colors 2 3 6">
														<div class="input-field col s12">
															<input type="text" name="facebook_url" class="validate">
															<label>www.facebook.com/directory</label>
														</div>
													</div>
													<div style="display:none;" class="row colors 2 3 6">
														<div class="input-field col s12">
															<input name="instagram_url" type="text" class="validate">
															<label>https://www.instagram.com/</label>
														</div>
													</div>
													<div style="display:none;" class="row colors 2 3 6">
														<div class="input-field col s12">
															<input type="text" name="twitter_url" class="validate">
															<label>www.twitter.com/directory</label>
														</div>
													</div>

													<div class="row colors 2 3 6" style="margin-top: 20px;display:none;">
														<div class="col-md-5">
															<label>Facility</label>
														</div>
													</div>
													<div style="margin-top: 20px;" class="row">


														<div style="display:none;" class="col-md-2 colors 2">
															<input type="checkbox" id="hostel" name="un_facility[]" value="1" />
															<label for="hostel"> HOSTEL</label>
														</div>

														<div style="display:none;" class="col-md-2 colors 2">
															<input type="checkbox" id="transport" name="un_facility[]" value="2" />
															<label for="transport">TRANSPORT FACILITY</label>
														</div>

														<div style="display:none;" class="col-md-2 colors 2 3 6">
															<input type="checkbox" id="cafeteria" name="un_facility[]" value="3" />
															<label for="cafeteria">CAFETERIA</label>
														</div>

														<div style="display:none;" class="col-md-2 colors 2">
															<input type="checkbox" id="canteen" name="un_facility[]" value="4" />
															<label for="canteen"> CANTEEN</label>
														</div>

														<div style="display:none;" class="col-md-2 colors 2">
															<input type="checkbox" id="internet" name="un_facility[]" value="5" />
															<label for="internet">INTERNET CENTRE</label>
														</div>

														<div style="display:none;" class="col-md-2 colors 3">
															<input type="checkbox" id="Water" name="un_facility[]" value="6" />
															<label for="Water">Water</label>
														</div>

														<div style="display:none;" class="col-md-2 colors 3">
															<input type="checkbox" id="Light" name="un_facility[]" value="7" />
															<label for="Light">Light</label>
														</div>

														<div style="display:none;" class="col-md-2 colors 3">
															<input type="checkbox" id="Furniture" name="un_facility[]" value="8" />
															<label for="Furniture">Furniture</label>
														</div>


													</div>



													<div style="display:none;" class="row tz-file-upload colors 2 3 6">
														<label for="internet">Cover Image</label>
														<div class="file-field input-field">
															<div class="tz-up-btn"> <span>File</span>
																<input type="file" name="user_img" multiple>
															</div>
															<div class="file-path-wrapper db-v2-pg-inp">
																<input readonly="" class="file-path validate" type="text">
															</div>
														</div>
													</div>


													<div style="display:none;" class="row tz-file-upload colors 2 3 6">
														<label for="internet">Cover Video</label>
														<div class="file-field input-field">
															<div class="tz-up-btn"> <span>Video File</span>
																<input type="file" name="un_video" multiple>
															</div>
															<div class="file-path-wrapper db-v2-pg-inp">
																<input readonly="" class="file-path validate" type="text">
															</div>
														</div>
													</div>




													<!-- gallay image -->
													<div style="display:none;" class="row colors 2 3 6">
														<label for="internet">Photo Gallery</label>
														<div class="file-field input-field">
															<div style="margin-left: 8px;" class="tz-up-btn"> <span>Gallary</span>
																<input type="file" name="fileUpload[]" id="upload-2" multiple>
															</div>
														</div>
													</div>


													<input type="hidden" name="all_docs" id="all_docs" value="" />
													<input type="hidden" name="all_docs1" id="all_docs1" value="" />
													<a class="control-button btn btn-link" style="display: none" href="javascript:$.fileup('upload-2', 'upload', '*')">Upload all</a>
													<a class="control-button btn btn-link" style="display: none" href="javascript:$.fileup('upload-2', 'remove', '*')">Remove all</a>
													<div style="margin-top: 15px;" id="upload-2-queue" class="queue"></div>

													<!-- gallay end image -->

													<div style="display:none;" class="row 2 6 3 ">
														<div class="input-field col s12">
															<button type="submit" name="Public" value="Public" class="waves-effect waves-light btn-large "> Public</button>
															<button type="submit" name="Public" value="Draft" class="btn-large waves-effect waves-light" style="background-color: red;"> Draft</button>
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
<script>
$( document ).ready(function() {
   newvalue= $('#category1').val();
	$('.colors').hide();
	$('.' + newvalue).show();
});
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
  function initAutocomplete() {
    var map = new google.maps.Map(document.getElementById('map'), {});

    // Create the search box and link it to the UI element.
    var input = document.getElementById('pac-input');
  
    var searchBox = new google.maps.places.SearchBox(input);

    map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
 
    // Bias the SearchBox results towards current map's viewport.
    map.addListener('bounds_changed', function() {
      searchBox.setBounds(map.getBounds());
    });

  }
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBT127pXDxsaFzKaG7zNFK8NXQGesUobJA&libraries=places&callback=initAutocomplete"></script>  
