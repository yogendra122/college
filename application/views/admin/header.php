<!-- <!DOCTYPE html> -->

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en">

<head>

	<title>Directory</title>
	<!-- META TAGS -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- FAV ICON(BROWSER TAB ICON) -->
	
	<link rel="shortcut icon" href="assets/admin/images/fav.ico" type="image/x-icon">
	<!-- GOOGLE FONT -->
	<link href="https://fonts.googleapis.com/css?family=Poppins%7CQuicksand:500,700" rel="stylesheet">
	<!-- FONTAWESOME ICONS -->
	<link rel="stylesheet" href="assets/admin/css/font-awesome.min.css">
	<!-- ALL CSS FILES -->
	<link href="assets/admin/css/materialize.css" rel="stylesheet">
	<link href="assets/admin/css/style.css" rel="stylesheet">
	<link href="assets/admin/css/fileup.css" rel="stylesheet">

	<link href="assets/admin/css/bootstrap.css" rel="stylesheet" type="text/css" />
	<!-- RESPONSIVE.CSS ONLY FOR MOBILE AND TABLET VIEWS -->
	<link href="assets/admin/css/responsive.css" rel="stylesheet">

	<link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">

	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.23/datatables.min.css" />


</head>

<body>
	<div id="preloader">
		<div id="status">&nbsp;</div>
	</div>
	<!--== MAIN CONTRAINER ==-->
	<div class="container-fluid sb1">
		<div class="row">
			<!--== LOGO ==-->
			<div class="col-md-2 col-sm-3 col-xs-6 sb1-1"> <a href="#" class="btn-close-menu"><i class="fa fa-times" aria-hidden="true"></i></a> <a href="#" class="atab-menu"><i class="fa fa-bars tab-menu" aria-hidden="true"></i></a>
				<a href="#" class="logo"><img src="assets/admin/images/logo1.png" alt="" /> </a>
			</div>
			<!--== SEARCH ==-->
			<div class="col-md-6 col-sm-6 mob-hide">
				<!-- <form class="app-search">
					<input type="text" placeholder="Search..." class="form-control"> <a href="#"><i class="fa fa-search"></i></a> </form> -->
			</div>
			<!--== NOTIFICATION ==-->
			<div style="visibility:hidden" class="col-md-2 tab-hide">
				<div class="top-not-cen"> <a class='waves-effect btn-noti' href='#'><i class="fa fa-commenting-o" aria-hidden="true"></i><span>5</span></a> <a class='waves-effect btn-noti' href='#'><i class="fa fa-envelope-o" aria-hidden="true"></i><span>5</span></a> <a class='waves-effect btn-noti' href='#'><i class="fa fa-tag" aria-hidden="true"></i><span>5</span></a> </div>
			</div>
			<!--== MY ACCCOUNT ==-->
			<div class="col-md-2 col-sm-3 col-xs-6">
				<!-- Dropdown Trigger -->
				<a class='waves-effect dropdown-button top-user-pro' href='#' data-activates='top-menu'><img src="<?php base_url()?>upload/<?php echo $_SESSION['admin_img']; ?>" alt="" />My Account <i class="fa fa-angle-down" aria-hidden="true"></i> </a>
				<!-- Dropdown Structure -->
				<ul id='top-menu' class='dropdown-content top-menu-sty'>
					<!-- <li><a href="admin-setting.html" class="waves-effect"><i class="fa fa-cogs"></i>Admin Setting</a> </li> -->
					
					<li><a href="superadmin_profile"><i class="fa fa-user"></i> Profile</a> </li>
					<li class="divider"></li>
					<li><a href="adminChangePassword" class="ho-dr-con-last waves-effect"><i class="fa fa-sign-in" aria-hidden="true"></i> Change Password</a> </li>
					<li><a href="logout" class="ho-dr-con-last waves-effect"><i class="fa fa-sign-in" aria-hidden="true"></i> Logout</a> </li>
				</ul>
			</div>
		</div>
	</div>
	<!--== BODY CONTNAINER ==-->
	<div class="container-fluid sb2">
		<div class="row">
			<div class="sb2-1">
				<!--== USER INFO ==-->
				<div class="sb2-12">
					<ul>
						<li><img src="upload/<?php echo $_SESSION['admin_img']; ?>" onerror="this.src='upload/user_placeholder.png'"> </li>
						<li>
							<h5><?php echo $_SESSION['admin_name']; ?> </h5>
						</li>
						<li></li>
					</ul>
				</div>
				<!--== LEFT MENU ==-->

				<div class="sb2-13">
					<ul class="collapsible" data-collapsible="accordion">
						<?php
						if ($_SESSION['admin_type'] == 'superadmin') {
						?>
							<li><a href="dashboard" class="menu-active"><i class="fa fa-tachometer" aria-hidden="true"></i> Dashboard</a> </li>
							<li><a href="javascript:void(0)" class="collapsible-header"><i class="fa fa-list-ul" aria-hidden="true"></i> Form</a>
								<div class="collapsible-body left-sub-menu">
									<ul>
										<li><a href="UniversityViewlist">All List </a> </li>
										<li><a href="showlistingForm">Add New Form</a> </li>
										<!-- <li><a href="admin-listing-category.html">All listing Categories</a> </li>
									<li><a href="admin-list-category-add.html">Add listing Categories</a> </li> -->
									</ul>
								</div>
							</li>

							<li><a href="javascript:void(0)" class="collapsible-header"><i class="fa fa-user" aria-hidden="true"></i> Users</a>
								<div class="collapsible-body left-sub-menu">
									<ul>
										<li><a href="adminAlluserlist">All Users</a> </li>
										<li><a href="adminAdduser">Add New user</a> </li>
									</ul>
								</div>
							</li>

							<li><a href="javascript:void(0)" class="collapsible-header"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-square" viewBox="0 0 16 16">
										<path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
										<path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm12 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1v-1c0-1-1-4-6-4s-6 3-6 4v1a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12z" />
									</svg></i> Admin</a>
								<div class="collapsible-body left-sub-menu">
									<ul>
										<li><a href="Allsub_adminlist">All  admin</a> </li>
										<li><a href="Add_sub_admin">Add New  admin</a> </li>
									</ul>
								</div>
							</li>

								<li><a href="javascript:void(0)" class="collapsible-header"><i class="fa fa-flag" aria-hidden="true"></i> Location management</a>
								<div class="collapsible-body left-sub-menu">
									<ul>
										<li><a href="Allcountry">Manage country</a> </li><!-- admin-all-users.html -->
										<li><a href="Allstate">Manage state</a> </li>
										<li><a href="Allcity">Manage city</a> </li>
									</ul>
								</div>
							</li>

							<li><a href="javascript:void(0)" class="collapsible-header"><i class="fa fa-code-fork" aria-hidden="true"></i> Category</a>
								<div class="collapsible-body left-sub-menu">
									<ul>
										<li><a href="AllcategoryView">All Category</a> </li><!-- admin-all-users.html -->
										<li><a href="Addcategory">Add Category</a> </li>
									</ul>
								</div>
							</li>

							<li><a href="javascript:void(0)" class="collapsible-header"><i class="fa fa-question-circle" aria-hidden="true"></i>User Inquiry Manage</a>
								<div class="collapsible-body left-sub-menu">
									<ul>
										<li><a href="UserInquiryList">All User Enquiry</a> </li><!-- admin-all-users.html -->
										<!-- <li><a href="Addcity">Add New City & Country</a> </li> -->
									</ul>
								</div>
							</li>

							<li><a href="javascript:void(0)" class="collapsible-header"><i class="fa fa-star" aria-hidden="true"></i>User Review Manage</a>
								<div class="collapsible-body left-sub-menu">
									<ul>
										<li><a href="UserReviewList">All User Review</a> </li><!-- admin-all-users.html -->
										<!-- <li><a href="Addcity">Add New City & Country</a> </li> -->
									</ul>
								</div>
							</li>

							<li><a href="javascript:void(0)" class="collapsible-header"><i class="fa fa-wrench" aria-hidden="true"></i>Manage Form</a>
								<div class="collapsible-body left-sub-menu">
									<ul>
										<li><a href="FormManageList">Manage Form</a> </li><!-- admin-all-users.html -->
										<!-- <li><a href="Addcity">Add New City & Country</a> </li> -->
									</ul>
								</div>
							</li>

							<li><a href="javascript:void(0)" class="collapsible-header"><i class="fa fa-wrench" aria-hidden="true"></i>Manage Language</a>
								<div class="collapsible-body left-sub-menu">
									<ul>
										<li><a href="languageView">Manage Language</a> </li><!-- admin-all-users.html -->
										<!-- <li><a href="Addcity">Add New City & Country</a> </li> -->
									</ul>
								</div>
							</li>

							<li><a href="javascript:void(0)" class="collapsible-header"><i class="fa fa-home" aria-hidden="true"></i> Home Page Manage</a>
								<div class="collapsible-body left-sub-menu">
									<ul>
										<li><a href="HomepageMange"> Home Page</a> </li>
										<li><a href="managecontactus"> Contact page</a> </li>
										<li><a href="manageaboutus">About page</a> </li>
										<!-- <li><a href="manageservice"> service Page</a> </li> -->
										<!-- admin-all-users.html -->
										<!-- <li><a href="Addcity">Add New City & Country</a> </li> -->
									</ul>
								</div>
							</li>
						<?php
						}else{
							
							$customday = explode(",",$_SESSION['Permissions']);
								
							if(in_array("2", $customday) == true || in_array("10", $customday) == true)
							{

							?>
						
							<li><a href="javascript:void(0)" class="collapsible-header"><i class="fa fa-list-ul" aria-hidden="true"></i> Form</a>
								<div class="collapsible-body left-sub-menu">
									<ul>
										<li><a href="UniversityViewlist">All List </a> </li>
										<li><a href="showlistingForm">Add New Form</a> </li>
										<!-- <li><a href="admin-listing-category.html">All listing Categories</a> </li>
									<li><a href="admin-list-category-add.html">Add listing Categories</a> </li> -->
									</ul>
								</div>
							</li>
							<?php
							}
							if(in_array("9", $customday) == true || in_array("10", $customday) == true)
							{
							?>

							<li><a href="javascript:void(0)" class="collapsible-header"><i class="fa fa-user" aria-hidden="true"></i> Users</a>
								<div class="collapsible-body left-sub-menu">
									<ul>
										<li><a href="adminAlluserlist">All Users</a> </li>
										<li><a href="adminAdduser">Add New user</a> </li>
									</ul>
								</div>
							</li>

							<?php
							}
							if(in_array("11", $customday) == true || in_array("10", $customday) == true)
							{
							?>

							<li><a href="javascript:void(0)" class="collapsible-header"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-square" viewBox="0 0 16 16">
										<path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
										<path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm12 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1v-1c0-1-1-4-6-4s-6 3-6 4v1a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12z" />
									</svg></i>Admin</a>
								<div class="collapsible-body left-sub-menu">
									<ul>
										<li><a href="Allsub_adminlist">All  admin</a> </li>
										<li><a href="Add_sub_admin">Add New  admin</a> </li>
									</ul>
								</div>
							</li>
							<?php
							}
							if(in_array("4", $customday) == true || in_array("10", $customday) == true)
							{
							?>

							<li><a href="javascript:void(0)" class="collapsible-header"><i class="fa fa-flag" aria-hidden="true"></i> City & Country</a>
								<div class="collapsible-body left-sub-menu">
									<ul>
										<li><a href="Allcity">All City & Country</a> </li><!-- admin-all-users.html -->
										<li><a href="Addcity">Add New City & Country</a> </li>
									</ul>
								</div>
							</li>
							<?php
							}
							 if(in_array("5", $customday) == true || in_array("10", $customday) == true)
							{
							?>

							<li><a href="javascript:void(0)" class="collapsible-header"><i class="fa fa-code-fork" aria-hidden="true"></i> Category</a>
								<div class="collapsible-body left-sub-menu">
									<ul>
										<li><a href="AllcategoryView">All Category</a> </li><!-- admin-all-users.html -->
										<li><a href="Addcategory">Add Category</a> </li>
									</ul>
								</div>
							</li>
								<?php
							}
							if(in_array("6", $customday) == true || in_array("10", $customday) == true)
							{
								?>
							<li><a href="javascript:void(0)" class="collapsible-header"><i class="fa fa-question-circle" aria-hidden="true"></i>User Inquiry Manage</a>
								<div class="collapsible-body left-sub-menu">
									<ul>
										<li><a href="UserInquiryList">All User Enquiry</a> </li><!-- admin-all-users.html -->
										<!-- <li><a href="Addcity">Add New City & Country</a> </li> -->
									</ul>
								</div>
							</li>
							<?php
							}
							if(in_array("7", $customday) == true || in_array("10", $customday) == true)
							{
							?>

							<li><a href="javascript:void(0)" class="collapsible-header"><i class="fa fa-star" aria-hidden="true"></i>User Review Manage</a>
								<div class="collapsible-body left-sub-menu">
									<ul>
										<li><a href="UserReviewList">All User Review</a> </li><!-- admin-all-users.html -->
										<!-- <li><a href="Addcity">Add New City & Country</a> </li> -->
									</ul>
								</div>
							</li>
							<?php
							}
							if(in_array("8", $customday) == true || in_array("10", $customday) == true)
							{
							?>

							<li><a href="javascript:void(0)" class="collapsible-header"><i class="fa fa-star" aria-hidden="true"></i>Manage Form</a>
								<div class="collapsible-body left-sub-menu">
									<ul>
										<li><a href="FormManageList">Manage Form</a> </li><!-- admin-all-users.html -->
										<!-- <li><a href="Addcity">Add New City & Country</a> </li> -->
									</ul>
								</div>
							</li>
							<?php
							}
							if(in_array("3", $customday) == true || in_array("10", $customday) == true)
							{
							?>

							<li><a href="javascript:void(0)" class="collapsible-header"><i class="fa fa-home" aria-hidden="true"></i> Home Page Manage</a>
								<div class="collapsible-body left-sub-menu">
									<ul>
										<li><a href="HomepageMange"> Home Page</a> </li>
										<!-- <li><a href="managecontactus"> Contact page</a> </li>
										<li><a href="manageaboutus">About page</a> </li>
										<li><a href="manageservice"> service Page</a> </li> -->
										<!-- admin-all-users.html -->
										<!-- <li><a href="Addcity">Add New City & Country</a> </li> -->
									</ul>
								</div>
							</li>
							
							
						

							<?php
							}
						}
						?>

					</ul>
				</div>

			</div>
			<!--== BODY INNER CONTAINER ==-->