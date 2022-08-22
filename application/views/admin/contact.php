<?php
include('header.php');
?>
	

<div class="container-fluid sb2">
		<div class="row">
			<div class="sb2-2">
				<!--== breadcrumbs ==-->
				<div class="sb2-2-2">
					<ul>
						<li><a href="index-1.html"><i class="fa fa-home" aria-hidden="true"></i> Home</a> </li>
						<li class="active-bre"><a href="#"> Contact us</a> </li>
						<li class="page-back"><a href="#"><i class="fa fa-backward" aria-hidden="true"></i> Back</a> </li>
					</ul>
				</div>
				<div class="tz-2 tz-2-admin">
					<div class="tz-2-com tz-2-main">
						<h4>Manage contact us</h4> <a class="dropdown-button drop-down-meta drop-down-meta-inn" href="#" data-activates="dr-list"></a>
						
						<!-- Dropdown Structure -->
						<div class="split-row">
							<div class="col-md-12">
								<div class="box-inn-sp ad-mar-to-min">
									<div class="tab-inn ad-tab-inn">
										<div class="tz2-form-pay tz2-form-com ad-noto-text">
											<form>
												<div class="row">
													<div class="input-field col s12">
														<input type="text" class="validate">
														<label>Title</label>
													</div>
												</div>
												<div class="row">
													<div class="input-field col s12">
														<textarea id="textarea1" class="materialize-textarea"></textarea>
														<label for="textarea1" class="">Descriptions</label>
													</div>
												</div>
												<div class="row">
													<div class="input-field col s12">
														<select multiple>
															<option value="" disabled selected>Select Category</option>
															<option value="">Listing</option>
															<option value="">Descriptions</option>
															<option value="">Contact Info</option>
															<option value="">Photo Gallery</option>
															<option value="">Rating & Reviews</option>
															<option value="">Social Media</option>
															<option value="">SEO Optomization</option>
															<option value="">Unlimited Listing</option>
															<option value="">Listing Priority</option>
															<option value="">Video Gallery</option>
															<option value="">Verified Listing</option>
														</select>
													</div>
												</div>
												<div class="row">
													<div class="input-field col s12">
														<select>
															<option value="" disabled selected>Select Status</option>
															<option value="1">Active</option>
															<option value="2">Non-Active</option>
														</select>
													</div>
												</div>
												<div class="row">
													<div class="input-field col s12">
														<input type="submit" value="SUBMIT" class="waves-effect waves-light full-btn"> </div>
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
	
	<?php
	include 'footer.php';
	?>
