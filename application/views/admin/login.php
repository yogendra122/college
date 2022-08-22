<!DOCTYPE html>
<html lang="en">
<head>
	<title>login</title>
	<!-- META TAGS -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- FAV ICON(BROWSER TAB ICON) -->
	<link rel="shortcut icon" href="images/fav.ico" type="image/x-icon">
	<!-- GOOGLE FONT -->
	<link href="https://fonts.googleapis.com/css?family=Poppins%7CQuicksand:500,700" rel="stylesheet">
	<!-- FONTAWESOME ICONS -->
	<link rel="stylesheet" href="assets/admin/css/font-awesome.min.css">
	<!-- ALL CSS FILES -->
	<link href="assets/admin/css/materialize.css" rel="stylesheet">
	<link href="assets/admin/css/style.css" rel="stylesheet">
	<link href="assets/admin/css/bootstrap.css" rel="stylesheet" type="text/css" />
	<!-- RESPONSIVE.CSS ONLY FOR MOBILE AND TABLET VIEWS -->
	<link href="assets/admin/css/responsive.css" rel="stylesheet">
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
	<style type="text/css">
		.errorcolor {
    color: red;
    margin: 10px;
    font-size: 12px;
}
	</style>
</head>

<body data-ng-app="" class="tz-register">
	<div id="preloader">
		<div id="status">&nbsp;</div>
	</div>
	
	<section class="tz-register">
			<div class="log-in-pop">
				<div class="log-in-pop-left">
					<h1>Directory  <span>Admin</span></h1>
					<p>Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century</p>
				
				</div>
				<div class="log-in-pop-right">
					<a href="#" class="pop-close" data-dismiss="modal"><img src="assets/admin/images/cancel.html" alt="" />
					</a>
					<h4>Admin login</h4>
					<p>Don't have an account? Create your account. It's take less then a minutes</p>
					 <?php if($this->session->flashdata('error')):   ?>

                <?php echo '<div class="errorcolor">'.$this->session->flashdata('error').'</div>'; ?>

                  <?php endif; ?> 
					<form class="s12" method="post" action="actionLogin">
						<div>
							<div class="input-field s12">
								<input type="email" data-ng-model="name1" class="validate" name="email" required>
								<label>User Email</label>
							</div>
						</div>
						<div>
							<div class="input-field s12">
								<input type="password" class="validate" name="password" required>
								<label>Password</label>
							</div>
						</div>
						<div>
							<div class="input-field s4">
								<input type="submit" value="Login" class="waves-effect waves-light log-in-btn"> </div>
						</div>
						
					</form>
				</div>
			</div>
	</section>
	
	
	
	<!--SCRIPT FILES-->
	<script src="assets/admin/js/jquery.min.js"></script>
	<script src="assets/admin/js/angular.min.js"></script>
	<script src="assets/admin/js/bootstrap.js" type="text/javascript"></script>
	<script src="assets/admin/js/materialize.min.js" type="text/javascript"></script>
	<script src="assets/admin/js/custom.js"></script>
</body>



</html>