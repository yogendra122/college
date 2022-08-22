
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
						<li class="active-bre"><a href="#"> Add User</a> </li>
						<!-- <li class="page-back"><a href="#"><i class="fa fa-backward" aria-hidden="true"></i> Back</a> </li> -->
					</ul>
				</div>
				<div class="tz-2 tz-2-admin">
					<div class="tz-2-com tz-2-main">
						<h4>Add New User</h4> 
						<!-- Dropdown Structure -->
						<div class="split-row">
							<div class="col-md-12">
								<div class="box-inn-sp ad-inn-page">
									<div class="tab-inn ad-tab-inn">
						<div class="hom-cre-acc-left hom-cre-acc-right">
							<div class="">
								<form id="registerform" action-attr="ActionadminAdduser" action="javascript:void(0)" method="post" enctype="multipart/form-data" >
									<div class="row">
										<div class="input-field col s6">
											<input id="user_name" name="user_name" placeholder="Name" type="text" class="validate" >
											<label for="user_name"></label>
											
										</div>
										<div class="input-field col s6">
											<input id="user_first_name" name="user_first_name" placeholder="First Name" type="text" class="validate">
											<label for="user_first_name"></label>
										</div>
									</div>
									<div class="row">
										<div class="input-field col s12">
											<input id="user_last_name"  name="user_last_name"  type="text" class="validate">
											<label for="user_last_name">Last Name</label>
										</div>
									</div>
									<div class="row">
										<div class="input-field col s12">
											<input id="user_email" type="email" name="user_email" class="validate">
											<label for="user_email">Email</label>
										</div>
									</div>
									<div class="row">
										<div class="input-field col s12">
											<input id="user_phone" name="user_phone" type="text" class="validate">
											<label for="user_phone">Phone</label>
										</div>
									</div>
									<div class="row">
										<div class="input-field col s12">
											<input id="user_address" name="user_address" type="text" class="validate">
											<label for="user_address">Address</label>
										</div>
									</div>

									<div class="row">
										<div class="input-field col s12">
											<textarea id="user_aboutme" name="user_aboutme" type="text" class="validate"></textarea>
											<label for="user_aboutme">Notes</label>
										</div>
									</div>


									<div class="row">
										<div class="input-field col s12">
											<input id="password" name="password" placeholder="Password" type="password" class="validate">
											
											<label for="password"></label>
										</div>
									</div>


									<div class="row">
										<div class="input-field col s12">
											<input type="password" name="rnpassword" placeholder="Confirm password" autocomplete="new-password">
							 				<label for="password"></label>
										</div>
									</div>
									
									<div class="row tz-file-upload">
										<div class="file-field input-field">
											<div class="tz-up-btn"> <span>Profile Image</span>
												<input type="file" name="user_img" multiple> </div>
											<div class="file-path-wrapper db-v2-pg-inp">
												<input class="file-path validate" readonly="" type="text"> 
											</div>
										</div>
									</div>									
									
									
																									
									<div class="row">
										<div class="input-field col s12"> 
										 <button type="submit" class="waves-effect waves-light btn-large full-btn"> Register</button>
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