
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
						<li class="active-bre"><a href="#">Change Password</a> </li>
						
					</ul>
				</div>
				<div class="tz-2 tz-2-admin">
					<div class="tz-2-com tz-2-main">
						<h4>Change Password</h4> 
						<!-- Dropdown Structure -->
						<div class="split-row">
							<div class="col-md-12">
								<div class="box-inn-sp ad-inn-page">
									<div class="tab-inn ad-tab-inn">
						<div class="hom-cre-acc-left hom-cre-acc-right">
							<div class="">
								<form action-attr="Action_adminChangePassword" id="adminChangePassword"  enctype="multipart/form-data" novalidate="" autocomplete="off" >
									<div class="row">
										<div class="input-field col s12">
											<input type="password"  name="password" class="pass-input" placeholder="Current Password" value="">
											
											
										</div>
									</div>
									<div class="row">
										<div class="input-field col s12">
											<input type="password" name="npassword" id="npassword" class="pass-input" placeholder="New Password" value="">
											
										</div>
									</div>
									<div class="row">
										<div class=" col s12">
											<input  type="password" name="cpassword" class="pass-input" placeholder="Confirm Password" value="">
											
										</div>
									</div>
									
									
																									
									<div class="row">
										<div class="input-field col s12"> 
										 <button type="submit" class="waves-effect waves-light btn-large full-btn">Save</button>
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