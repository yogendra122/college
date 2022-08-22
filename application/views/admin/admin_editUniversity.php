<?php
include('header.php');

$where = array('country_id' => $data['un_country']);
$ab = $this->Admin_model->getAll('country', $where);
// echo"<pre>";
// print_r($ab);
// die;
$where = array('country_id' => $data['un_city']);
$city = $this->Admin_model->getAll('country', $where);
$where_type = array('id' => $data['acc_room_type']);
$room_type = $this->Admin_model->getAll('acco_room_type', $where_type);
$where_ct = array('cat_id' => $data['sub_category'], 'cat_status' => 1, 'cat_delete_status' => 0);
$categoy = $this->Admin_model->getAll('category', $where_ct);

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
					<li class="active-bre"><a href="#"> Edit Form</a> </li>

				</ul>
			</div>
			<div class="tz-2 tz-2-admin">
				<div class="tz-2-com tz-2-main">
					<h4>Edit Form</h4>
					<!-- Dropdown Structure -->
					<div class="split-row">
						<div class="col-md-12">
							<div class="box-inn-sp ad-inn-page">
								<div class="tab-inn ad-tab-inn">
									<div class="hom-cre-acc-left hom-cre-acc-right">
										<div class="">
											<form id="Edituniversityform" action-attr="Edituniversityform" action="javascript:void(0)" method="post" enctype="multipart/form-data">
												
												<?php
												if (isset($input)) {
												?>
													<input type="hidden" name="category" value="2">
													<div class="row">

														<div class="col s6 ">
															<label for="un_name">Education Name</label>
															<input id="un_name" name="un_name" value="<?php echo $data['un_name']; ?>" type="text" class="validate">


														</div>


														<div class=" col s6 colors 2">
															<label for="un_name">Education Description</label>
															<input id="un_description" name="un_description" value="<?php echo $data['un_description']; ?>" type="text" class="validate">
															<label for="un_description"></label>
														</div>
													</div>
												<?php
												}
												?>
												<?php
												if (isset($inputtorism)) {
												?>
												<input type="hidden" name="category" value="6">
													<div class="row">

														<div class="col s6">
															<label for="tur_place">Travel Place</label>
															<input placeholder="Place"  id="pac-input" name="tur_place" value="<?php echo $data['tur_place']; ?>" type="text" class="validate">
														
															<div id="map" class="map2"></div>
														</div>


														<div class="col s6">
															<label for="tur_travel_by">Travel By</label>
															<input id="tur_travel_by" name="tur_travel_by" value="<?php echo $data['tur_travel_by']; ?>" type="text" class="validate">

														</div>
													</div>

													<div class="row">

														<div class="col s6">
															<label for="tur_price">Travel Price</label>
															<input id="tur_price" name="tur_price" type="text" value="<?php echo $data['tur_price']; ?>" class="validate">

														</div>

														<div class="col s6">
															<label for="tur_Inclusions">Travel Inclusions</label>
															<input id="tur_Inclusions" name="tur_Inclusions" type="text" value="<?php echo $data['tur_Inclusions']; ?>" class="validate">

														</div>
													</div>

													<div class="row">

														<div class="col s6">
															<label for="tur_discount">Travel discount</label>
															<input id="tur_discount" name="tur_discount" value="<?php echo $data['tur_discount']; ?>" type="text" class="validate">

														</div>
														<div class="col s6">
															<label for="tur_duration">Travel Duration</label>
															<input id="tur_duration" name="tur_duration" type="text" value="<?php echo $data['tur_duration']; ?>" class="validate">

														</div>
													</div>
													<div class="row">

														<div class="col s12">
															<label for="tur_agency">Travel Agency</label>
															<input id="tur_agency" name="tur_agency" type="text" value="<?php echo $data['tur_agency']; ?>" class="validate">

														</div>
													</div>
												<?php
												}
												?>


												<?php
												if (isset($inputaccomodation)) {
												?>
												<input type="hidden" name="category" value="3">
													<div class="row">

														<div class="col s6">
															<label for="acc_rent">Room Rent</label>
															<input id="acc_rent" value="<?php echo $data['acc_rent']; ?>" name="acc_rent" type="text" class="validate">

														</div>


														<div class="col s6">
															<label for="acc_room_size">Room Size(sq ft)</label>
															<input id="acc_room_size" name="acc_room_size" value="<?php echo $data['acc_room_size']; ?>" type="text" class="validate">

														</div>
													</div>
													<div class="row">
														<div class="col s12">
															<label>Room Type</label>
															<select name="acc_room_type">
																<option value="<?php echo $room_type[0]->id ?>"><?php echo $room_type[0]->room_type ?></option>
																<option value="1">Standard Room</option>
																<option value="2">Family Room</option>
																<option value="3">Private Room</option>
																<option value="4">Mix Dorm Room(6 people)</option>
																<option value="5">Female Dorm Room(6 people)</option>
																<option value="6">Male Dorm (6 people)</option>
															</select>
														</div>
													</div>

												<?php
												}
												?>

												<div class="row">
													<label for="un_contactno colors 2">Contact Number</label>
													<div class="col s12">
														<input id="un_contactno" name="un_contactno" value="<?php echo $data['un_contactno']; ?>" type="text" class="validate">

													</div>
												</div>


												<div class="row">
													<div class="col s12">
														<label for="un_contactno">Country Name</label>
														<select name="country" id="country">
															<!-- <option value=""> -- category -- </option> -->

															<option value="<?php  if(isset($ab[0]->country_id)){echo $ab[0]->country_id;}  ?>"><?php  if(isset($ab[0]->country_name)){echo $ab[0]->country_name;} ?></option>

															<?php
															foreach ($contry as $row) {
																echo '<option value="' . $row->country_id . '">' . $row->country_name . '</option>';
															}
															?>
														</select>
													</div>
												</div>


												<div class="row">
													<label for="un_contactno">City Name</label>
													<div class="col s12">
														<select name="city" id="categt">
															<option value="<?php  if(isset($city[0]->country_id)){echo $city[0]->country_id;}  ?>"><?php if(isset($city[0]->country_name)){echo $city[0]->country_name;}?></option>
														</select>
													</div>
												</div>

												<div class="row">
													<label for="un_contactno">Select subcategory</label>

													<div class="col s12">
														<select name="sub_category">
															<option value="<?php  if(isset($categoy[0]->cat_id)){echo $categoy[0]->cat_id;}?>"><?php if(isset($categoy[0]->cat_name)){echo $categoy[0]->cat_name;}?></option>
															<?php
															foreach ($form_cat as $row) {
																echo '<option value="' . $row->cat_id . '">' . $row->cat_name . '</option>';
															}
															?>
														</select>
													</div>
												</div>

												<div class="row">
													<div class=" col s12">
														<label>Email</label>
														<input id="un_email" value="<?php echo $data['un_email']; ?>" name="un_email" type="email" class="validate">

													</div>
												</div>
												<div class="row">
													<label for="un_address">Address</label>
													<div class="col s12">
														<input placeholder="Address"  id="pac-input" name="un_address" type="text" value="<?php echo $data['un_address']; ?>" type="text" class="validate">
														<div id="map" class="map2"></div>
													</div>
												</div>

												<div class="row">


													<label>Start Date</label>

													<div class="col s12">

														<input id="un_startdate" type="date" value="<?php echo $data['un_startdate']; ?>" name="un_startdate" class="validate">

													</div>
												</div>

												<?php
												if (isset($input)) {
												?>
													<div class="row">
														<label for="un_achivement">Achivement</label>
														<div class="col s12">
															<input id="un_achivement" name="un_achivement" value="<?php echo $data['un_achivement']; ?>" type="text" class="validate">

														</div>
													</div>
													<div class="row">
														<label for="un_course">Course</label>
														<div class="col s12">
															<input id="un_course" name="un_course" value="<?php echo $data['un_course']; ?>" type="text" class="validate">

														</div>
													</div>
												<?php
												}
												?>


												<div class="row">
													<label for="un_latitude">Latitude</label>
													<div class="col s12">
														<input id="un_latitude" name="un_latitude" value="<?php echo $data['un_latitude']; ?>" type="text" class="validate">

													</div>
												</div>


												<div class="row">
													<label for="un_longitude">Longitude</label>
													<div class="col s12">
														<input id="un_longitude" name="un_longitude" value="<?php echo $data['un_longitude']; ?>" type="text" class="validate">

													</div>
												</div>

												<?php
												if (isset($input)) {
												?>

													<div class="row">
														<label for="un_student">Tatal Student</label>
														<div class="input-field col s12">
															<input id="un_student" name="un_student" value="<?php echo $data['un_student']; ?>" type="Number" class="validate">

														</div>
													</div>


													<div class="row">
														<label for="un_teaching_staff">Total STAFF</label>
														<div class="col s12">
															<input id="un_teaching_staff" name="un_teaching_staff" type="Number" value="<?php echo $data['un_teaching_staff']; ?>" class="validate">

														</div>
													</div>



													<div class="row">
														<label for="un_award">Total Award</label>
														<div class="input-field col s12">
															<input id="un_award" value="<?php echo $data['un_award']; ?>" name="un_award" type="Number" class="validate">

														</div>
													</div>
												<?php
												}
												?>


												<div class="row">
													<label for="un_description">Description</label>
													<div class="col s12">
														<textarea id="un_description" value="<?php echo $data['un_description']; ?>" name="un_description" type="text" class="validate"><?php echo $data['un_description']; ?></textarea>

													</div>
												</div>



												<div class="row">
													<div class="db-v2-list-form-inn-tit">
														<h5>Social Media Informations:</h5>
													</div>
												</div>
												<div class="row">
													<div class="input-field col s12">
														<input type="text" value="<?php echo $data['facebook_url']; ?>" name="facebook_url" class="validate">
														<label>www.facebook.com/directory</label>
													</div>
												</div>
												<div class="row">
													<div class="input-field col s12">
														<input name="instagram_url" value="<?php echo $data['instagram_url']; ?>" type="text" class="validate">
														<label>https://www.instagram.com/</label>
													</div>
												</div>
												<div class="row">
													<div class="input-field col s12">
														<input type="text" value="<?php echo $data['twitter_url']; ?>" name="twitter_url" class="validate">
														<label>www.twitter.com/directory</label>
													</div>
												</div>


												<div style="margin-top: 11px;" class="row">
													<div class="col-md-5">
														<label>Facility</label>
													</div>
												</div>
												<div class="row">
													<?php $customday = explode(",", $data['un_facility']); ?>
													<?php
													if (isset($inputaccomodation)) {
													?>
														<div class="col-md-2">
															<input type="checkbox" id="cafeteria" name="un_facility[]" value="3" <?= (in_array("3", $customday) ? 'checked=""' : '') ?> />
															<label for="cafeteria">CAFETERIA</label>
														</div>
														<div class="col-md-2 ">
															<input type="checkbox" id="Water" name="un_facility[]" value="6" <?= (in_array("6", $customday) ? 'checked=""' : '') ?> />
															<label for="Water">Water</label>
														</div>

														<div class="col-md-2">
															<input type="checkbox" id="Light" name="un_facility[]" value="7" <?= (in_array("7", $customday) ? 'checked=""' : '') ?> />
															<label for="Light">Light</label>
														</div>

														<div class="col-md-2">
															<input type="checkbox" id="Furniture" name="un_facility[]" value="8" <?= (in_array("8", $customday) ? 'checked=""' : '') ?> />
															<label for="Furniture">Furniture</label>
														</div>
													<?php
													}
													if (isset($input)) {
													?>
														<div class="col-md-2">
															<input type="checkbox" id="hostel" name="un_facility[]" value="1" <?= (in_array("1", $customday) ? 'checked=""' : '') ?> />
															<label for="hostel"> HOSTEL</label>
														</div>

														<div class="col-md-2">
															<input type="checkbox" id="transport" name="un_facility[]" value="2" <?= (in_array("2", $customday) ? 'checked=""' : '') ?> />
															<label for="transport">TRANSPORT FACILITY</label>
														</div>

														<div class="col-md-2">
															<input type="checkbox" id="cafeteria" name="un_facility[]" value="3" <?= (in_array("3", $customday) ? 'checked=""' : '') ?> />
															<label for="cafeteria">CAFETERIA</label>
														</div>

														<div class="col-md-2">
															<input type="checkbox" id="canteen" name="un_facility[]" value="4" <?= (in_array("4", $customday) ? 'checked=""' : '') ?> />
															<label for="canteen"> CANTEEN</label>
														</div>

														<div class="col-md-2">
															<input type="checkbox" id="internet" name="un_facility[]" value="5" <?= (in_array("5", $customday) ? 'checked=""' : '') ?> />
															<label for="internet">INTERNET CENTRE</label>
														</div>
													<?php
													}
													if (isset($inputtorism)) {
													?>
														<div class="col-md-2">
															<input type="checkbox" id="cafeteria" name="un_facility[]" value="3" <?= (in_array("3", $customday) ? 'checked=""' : '') ?> />
															<label for="cafeteria">CAFETERIA</label>
														</div>
													<?php
													}
													?>

												</div>

												<div class="row">

													<div class="input-field col s1">

														<div class="file-field input-field">

															<div class="tz-up-btn"> <span>File</span></div>
															<input type="file" id="imgInp" name="un_media" value="upload">

														</div>
													</div>

													<div class="input-field col s4">
														<img style="width: 149px;" src="upload/<?php echo $data['un_media']; ?>" id="blah" class="setwidthhight" onerror="this.src='upload/user_placeholder.png'">
													</div>


													<div class="input-field col s2">
														<div class="file-field input-field">
															<div class="tz-up-btn"> <span>Video File</span>
																<input type="file" id="file-input" name="un_video" value="upload">
															</div>


														</div>
														<video width="320" height="240" id="video"></video>
													</div>

													<div class="input-field col s5">
														<video id="one" width="320" height="240" controls>
															<source src="upload/<?php echo $data['un_video']; ?>" type="video/mp4">

														</video>
													</div>

												</div>



												<div class="row">
													<div class="col-md-5">
														<label> Gallery</label>
													</div>
												</div>
												<div class="row">
													<div class="col col-md-12">
														<?php
														foreach ($gallary_media as $gallary) {
															$mediapath = base_url('upload/preview/') . $gallary->file_name;
														?>
															<div class="col col-md-3" id="icenses_<?php echo $gallary->id ?>">

																<div>
																	<img style="height:206px;width:100%;" src="<?php echo $mediapath; ?>" />
																	<i onclick="deletegallery('<?php echo $gallary->id; ?>')" style="pointer:curse;color:red">Delete</i>
																</div>


															</div>
														<?php
														}
														?>
													</div>
												</div>



												<!-- gallay image -->
												<div class="row ">
													<div class="file-field input-field">
														<div style="margin-left: 8px;" class="tz-up-btn"> <span>Upload Gallary</span>
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


												<div class="row">
													<div class="input-field col s12">
														<button type="submit" name="Public" value="Public" class="waves-effect waves-light btn-large "> Public</button>
														<button type="submit" name="Public" value="Draft" class="btn-large waves-effect waves-light" style="background-color: red;"> Draft</button>
													</div>
												</div>


												<input type="hidden" name="un_id" value="<?php echo $data['un_id']; ?>">
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
<script type="text/javascript">
	function deletegallery(id) {
		$.ajax({
			url: "<?php echo site_url('deletegallary') ?>",
			method: "POST",
			data: {
				id: id
			},
			beforeSend: function() {

			},
			success: function(data) {
				$('#icenses_' + id).css('display', 'none');
			}
		});
	}
</script>
<script type="text/javascript">
	const input = document.getElementById('file-input');
	const video = document.getElementById('video');
	const videoSource = document.createElement('source');

	input.addEventListener('change', function() {
		const files = this.files || [];

		if (!files.length) return;

		const reader = new FileReader();

		reader.onload = function(e) {
			$("#one").hide();
			videoSource.setAttribute('src', e.target.result);
			video.appendChild(videoSource);
			video.load();
			// video.play();
		};

		reader.onprogress = function(e) {
			console.log('progress: ', Math.round((e.loaded * 100) / e.total));
		};

		reader.readAsDataURL(files[0]);
	});
</script>

<?php
include 'footer.php';
?>
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
