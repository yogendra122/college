
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
						<li class="active-bre"><a href="#"> Edit User</a> </li>
						<!-- <li class="page-back"><a href="#"><i class="fa fa-backward" aria-hidden="true"></i> Back</a> </li> -->
					</ul>
				</div>
				<div class="tz-2 tz-2-admin">
					<div class="tz-2-com tz-2-main">
						<h4> Edit User</h4> 
						<!-- Dropdown Structure -->
						<div class="split-row">
							<div class="col-md-12">
								<div class="box-inn-sp ad-inn-page">
									<div class="tab-inn ad-tab-inn">
						<div class="hom-cre-acc-left hom-cre-acc-right">
							<div class="">
								<form id="updateregisterform" action-attr="Actionadminupdateuser" action="javascript:void(0)" method="post" enctype="multipart/form-data" >

									<div class="row">
										<div class="input-field col s6">
											<input id="user_name" name="user_name"  placeholder="Name" type="text" value="<?php echo $data['user_name'];?>"class="validate">
											<label for="user_name"></label>
											
										</div>
										<div class="input-field col s6">
											<input id="user_first_name" name="user_first_name" placeholder="First Name" type="text" value="<?php echo $data['user_first_name'];?>" class="validate">
											<label for="user_first_name"></label>
										</div>
									</div>
									<div class="row">
										<div class="input-field col s12">
											<input id="user_last_name" value="<?php echo $data['user_last_name'];?>"  name="user_last_name"  type="text" class="validate">
											<label for="user_last_name">Last Name</label>
										</div>
									</div>
									<div class="row">
										<div class="input-field col s12">
											<input id="user_email" value="<?php echo $data['user_email'];?>" type="email" name="user_email" class="validate">
											<label for="user_email">Email</label>
										</div>
									</div>
									<div class="row">
										<div class="input-field col s12">
											<input id="user_phone" value="<?php echo $data['user_phone'];?>" name="user_phone" type="text" class="validate">
											<label for="user_phone">Phone</label>
										</div>
									</div>
									<div class="row">
										<div class="input-field col s12">
											<input id="user_address" value="<?php echo $data['user_address'];?>" name="user_address" type="text" class="validate">
											<label for="user_address">Address</label>
										</div>
									</div>

									<div class="row">
										<div class="input-field col s12">
											<textarea id="user_aboutme"  name="user_aboutme" type="text" class="validate"><?php echo $data['user_aboutme'];?></textarea>
											<label for="user_aboutme">Notes</label>
										</div>
									</div>


									
									<div class="row">
										
											<div class="input-field col s6">	
													<input  type="file" id="imgInp" name="user_img" value="upload">
											</div>

											 <div class="input-field col s6"> 
											  	<img  style="width: 149px;"src="upload/<?php echo $data['user_img'];?>" id="blah" class="setwidthhight" onerror="this.src='upload/user_placeholder.png'">         
											  </div>    
												   
											
											
											</div>
										
									</div>									
									
									
																									
									<div class="row">
										<div class="input-field col s12"> 
										 <button type="submit" class="waves-effect waves-light btn-large full-btn"> Register</button>
										 </div>
									</div>
									<input type="hidden" name="user_id" value="<?php echo $data['user_id'];?>">
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
     
    function readURL(input) {
      if (input.files && input.files[0]) {
          var reader = new FileReader();

          reader.onload = function (e) {
              $('#blah').attr('src', e.target.result);
          }

          reader.readAsDataURL(input.files[0]);
      }
    }

    $("#imgInp").change(function(){
      readURL(this);
    });

    </script>
	<?php

	include 'footer.php';
	?>